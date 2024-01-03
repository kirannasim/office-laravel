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

namespace App\Components\Modules\General\BinaryPointTransaction\ModuleCore\Services;

use App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint;
use App\Eloquents\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

/**
 * Class BinaryServices
 * @package App\Components\Modules\General\BinaryPointTransaction\ModuleCore\Services
 */
class BinaryServices
{
    /**
     * @param User $user
     * @param $point
     * @param $position
     * @param $fromUser
     * @param null $context
     * @param $orderId
     * @return BinaryPoint|Model
     */
    function addPoints(User $user, $point, $position, $fromUser, $orderId, $context = null)
    {
        return BinaryPoint::create([
            'user_id' => $user->id,
            'point' => $point,
            'position' => $position,
            'is_credit' => 1,
            'from_user' => $fromUser,
            'order_id' => $orderId,
            'context' => $context,
        ]);
    }

    /**
     * @param Collection $args
     * @return mixed
     */
    function getPoints(Collection $args = null)
    {
        //Default options
        $defaults = collect([
            'fromDate' => (new BinaryPoint)->min('created_at'),
            'toDate' => Carbon::now()->endOfDay(),
            'sortBy' => 'created_at',
            'orderBy' => 'desc',
            'userId' => loggedId(),
        ]);
        $options = $defaults->merge($args);
        $model = new BinaryPoint;
        $table = $model->getTable();
        $columns = Schema::getColumnListing($table);

        return $model->newQuery()->when($userId = $options->get('userId'), function ($query) use ($userId) {
            /** @var Builder $query */
            return $query->where('user_id', $userId);
        })->when($options->has('isCredit'), function ($query) use ($options) {
            /** @var Builder $query */
            $query->where('is_credit', $options->get('isCredit'));
        })->when($options->has('position'), function ($query) use ($options) {
            /** @var Builder $query */
            $query->where('position', $options->get('position'));
        })->when($options->get('returnCarry'), function ($query) use ($table) {
            /** @var Builder $query */
            $query->selectRaw($this->carryQuery($table));
        })->whereBetween((new BinaryPoint)->getTable() . '.created_at', [$options->get('fromDate'), $options->get('toDate')])
            ->when($options->get('fullStats'), function ($query) use ($columns, $table, $model) {
                /** @var Builder $query */
                $query->addSelect($columns)
                    ->selectRaw($this->carryQuery($table, 1))
                    ->selectRaw($this->carryQuery($table, 2))
                    ->selectRaw($this->totalPointQuery($table, 1))
                    ->selectRaw($this->totalPointQuery($table, 2));
            });
    }

    /**
     * @param $table
     * @param bool $position
     * @return string
     */
    function carryQuery($table, $position = false)
    {
        $as = $position ? ($position == 1 ? 'leftCarry' : 'rightCarry') : 'carry';
        $positionConstrain = " and $table.`position` = $position";
        $carryQuery = "sum((case when $table.`is_credit` = 1 $positionConstrain then $table.`point` when $table.`is_credit` = 0 $positionConstrain then -$table.`point` else null end)) $as";

        return $carryQuery;
    }

    /**
     * @param $table
     * @param int $position
     * @param bool $append
     * @return string
     */
    function totalPointQuery($table, $position = 1, $append = false)
    {
        $positionStr = $position == 1 ? 'left' : 'right';

        return "sum((case when ($table.`position` = $position && $table.`is_credit` = 1) then $table.`point` else 0 end)) {$positionStr}points $append";
    }
}
