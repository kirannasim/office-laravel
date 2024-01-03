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

/**
 * Created by PhpStorm.
 * User: Fazlul Rahman EM
 * Date: 9/5/2018
 * Time: 2:26 PM
 */

namespace App\Blueprint\Traits\Graph;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;


/**
 * Trait GraphHelper
 * @package App\Blueprint\Traits\Graph
 */
trait GraphHelper
{
    /**
     * @param Collection $data
     * @param string $groupBy
     * @param string $totalColumn
     * @return Collection
     */
    function prepareShortGraphData(Collection $data, $groupBy, $totalColumn = 'total')
    {
        return $data->mapWithKeys(function ($value) use ($groupBy, $totalColumn) {
            $total = $value->{$totalColumn};

            switch ($groupBy) {
                case 'hour':
                    return [$value->created_at->format('H') => $total];
                    break;
                case 'day':
                    return [$value->created_at->format('D') => $total];
                    break;
                case 'month':
                    return [$value->created_at->format('M') => $total];
                    break;
                case 'year':
                    return [$value->created_at->format('Y') => $total];
                    break;
                default:
                    return [$value->created_at => $value];
                    break;
            }
        });
    }

    /**
     * @param Arrayable $data
     * @return array
     */
    function formatToArrayForGraph(Arrayable $data)
    {
        $dispatch = [];

        foreach ($data as $key => $value)
            $dispatch[] = [$key, $value];

        return $dispatch;
    }

    /**
     * @param Collection $data
     * @param $groupBy
     * @return mixed
     */
    function sortData(Collection $data, $groupBy)
    {
        $compareData = [];

        switch ($groupBy) {
            case 'month':
                $compareData = $this->getMonths();
                break;
            case 'day':
                $compareData = $this->getDays();
                break;
        }

        if ($groupBy == 'year') return $data->unique()->sort()->values();

        return $data->unique()->sortBy(function ($value) use ($compareData) {
            return array_search($value, $compareData);
        })->values();
    }
}
