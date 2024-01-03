<?php
/**
 *  -------------------------------------------------
 *  Hybrid MLM  Copyright (c) 2018 All Rights Reserved
 *  -------------------------------------------------
 *
 * @author Acemero Technologies Pvt Ltd
 * @link https://www.acemero.com
 * @see https://www.hybridmlm.io
 * @version 1.00
 * @api Laravel 5.4
 */

namespace App\Blueprint\Query;

use App\Blueprint\Support\Collection;
use App\Eloquents\UserRepo;
use Illuminate\Support\Facades\DB;
use Kalnoy\Nestedset\QueryBuilder;

/**
 * Class Builder
 * @package App\Blueprint\Query
 */
class Builder extends QueryBuilder
{
    protected $inSponsorHierarchy = false;

    /**
     * @param array $dictionary
     * @param int $fixed
     * @param $parentId
     * @param int $cut
     * @param bool $inSponsorHierarchy
     * @return int
     */
    protected static function reorderNodes_backup(array &$dictionary, &$fixed, $parentId = null, $cut = 1, $inSponsorHierarchy = false)
    {
        if (!isset($dictionary[$parentId])) {
            return $cut;
        }

        /** @var Model|NodeTrait $model */
        foreach ($dictionary[$parentId] as $model) {

            if ($inSponsorHierarchy) $model->applySponsorHierarchy();

            $lft = $cut;

            $cut = static::reorderNodes($dictionary,
                $fixed,
                $model->getKey(),
                $cut + 1, $inSponsorHierarchy);

            $rgt = $cut;

            if ($model->rawNode($lft, $rgt, $parentId)->isDirty()) {
                $model->save();

                $fixed++;
            }

            ++$cut;
        }

        unset($dictionary[$parentId]);

        return $cut;
    }

    /**
     * ReIndexAll LHS , RHS
     * @return void [type] [description]
     */
    function reIndexAll()
    {
        $this->setPlacementHierarchy()->fixTree();
        $this->setSponsorHierarchy()->fixTree();
    }

    /**
     * Apply Sponsor based hierarchy
     * @return \Illuminate\Database\Eloquent\Model|\Kalnoy\Nestedset\NodeTrait
     */
    function setPlacementHierarchy()
    {
        $this->model->resetHierarchy();
        $this->inSponsorHierarchy = false;

        return $this->model;
    }

    /**
     * Apply Sponsor based hierarchy
     * @return \Illuminate\Database\Eloquent\Model|\Kalnoy\Nestedset\NodeTrait
     */
    function setSponsorHierarchy()
    {
        $this->model->applySponsorHierarchy();
        $this->inSponsorHierarchy = true;

        return $this->model;
    }

    /**
     * Fixes the tree based on parentage info.
     *
     * Nodes with invalid parent are saved as roots.
     *
     * @param null $root
     * @return int The number of fixed nodes
     */
    public function fixTree($root = null)
    {
        $columns = [
            $this->model->getKeyName(),
            $this->model->getParentIdName(),
            $this->model->getLftName(),
            $this->model->getRgtName(),
        ];

        $dictionary = $this->model->newNestedSetQuery()
            ->defaultOrder()
            ->get($columns)
            ->groupBy($this->model->getParentIdName())
            ->all();

        return $this->fixNodes($dictionary, $this->inSponsorHierarchy);
    }

    /**
     * ReIndexAll LHS , RHS
     *
     * @return void [type] [description]
     */
    function procedureReIndex()
    {
        $user = \App\Eloquents\UserRepo::first();

        DB::select('call update_user_repo(' . $user->user_id . ',' . $user->sponsor_id . ',' . $user->parent_id . ')');
    }

    /**
     * @param array $dictionary
     * @return int
     */
    protected function fixNodes_backup(array &$dictionary)
    {
        $fixed = 0;

        return true;
        $cut = static::reorderNodes($dictionary, $fixed, null, 1);

        // Save nodes that have invalid parent as roots
        while (!empty($dictionary)) {
            $dictionary[null] = reset($dictionary);

            unset($dictionary[key($dictionary)]);

            $cut = static::reorderNodes($dictionary, $fixed, null, $cut);
        }

        return $fixed;
    }

    /**
     * Execute the query as a "select" statement.
     *
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    function get($columns = ['*'])
    {
        return new Collection(parent::get($columns)->map(function ($value) {
            if ($this->model->getLftName() == 'SLHS')
                /** @var UserRepo $value */
                $value->applySponsorHierarchy();
            return $value;
        }));
    }
}
