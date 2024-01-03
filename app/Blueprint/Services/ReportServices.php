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

namespace App\Blueprint\Services;

use App\Blueprint\Facades\OrderServer;
use App\Blueprint\Facades\PackageServer;
use App\Blueprint\Facades\TransactionServer;
use App\Blueprint\Facades\UserServer;

/**
 * Class ReportServices
 * @package App\Blueprint\Services
 */
class ReportServices
{

    function __construct()
    {

    }

    /**
     * get joining data based on timestamp
     *
     * @param type $options array
     * @return type collection
     */
    function getJoiningDetails($options)
    {
        return UserServer::getJoiningDetails($options);
    }

    /**
     * get joining count array for graph
     *
     * @param type $options array
     * @return type array
     */
    function getUserCountArray($options)
    {
        return UserServer::getjoiningCount($options);
    }

    /**
     * get dummy data for joining graph
     *
     * @param string $options array
     * @return array array
     */
    function getDummy($options)
    {
        if ($options['type'] == 'year') {
            $user_count_array = array();
            for ($i = 1; $i <= 12; $i++) {
                $user_count_array[] = ['month' => date('M', mktime(0, 0, 0, $i, 10)), 'count' => rand(1, 100)];
            }
        } elseif ($options['type'] = 'month') {
            for ($i = 1; $i <= date('t'); $i++) {
                $user_count_array[] = ['month' => $i, 'count' => rand(1, 100)];
            }
        }
        return $user_count_array;
    }

    /**
     * get commission details based on timestamp
     *
     * @param type $options array
     * @return type collection
     */
    function getCommissionDetails($options)
    {
        return TransactionServer::getCommissionDetails($options);
    }

    /**
     * get commission total for commission graph
     *
     * @return type array
     */
    function getCommissionTotal()
    {
        $commission_types = TransactionServer::getAmountTypes('commission');
        foreach ($commission_types as $commission) {
            $amount_type_sum = array();
            for ($i = 1; $i <= 12; $i++) {
                $amount_type_sum[] = TransactionServer::getcommissionsum(['type' => 'month', 'month' => $i, 'amount_type' => $commission]);
            }
            $commission_type_sum[] = ['name' => TransactionServer::getnameFromAmountType($commission), 'data' => $amount_type_sum];
        }
        return $commission_type_sum;
    }

    /**
     * create dummy data for commission graph
     *
     * @return array array
     */
    function TransactionDummy()
    {
        $commission_types = TransactionServer::getAmountTypes('commission');
        foreach ($commission_types as $commission) {
            $amount_type_sum = array();
            for ($i = 1; $i <= 12; $i++) {
                $amount_type_sum[] = rand(1, 10);
            }
            $commission_type_sum[] = ['name' => TransactionServer::getnameFromAmountType($commission), 'data' => $amount_type_sum];
        }
        return $commission_type_sum;
    }

    /**
     * get sale details
     *
     * @param type $options array
     * @return type collection
     */
    function getSaleDetails($options)
    {
        return OrderServer::getSaleDetails($options);
    }

    /**
     * get package wise sale sum for graphF
     *
     * @param type $options array
     * @return type array
     */
    function getSaleTotal($options)
    {
        $packages = PackageServer::getActivePackages()->pluck('id');
        foreach ($packages as $package) {
            $sale_product_sum = array();
            for ($i = 1; $i <= 12; $i++) {
                $sale_product_sum[] = OrderServer::getsalePackagesum(['type' => 'month', 'product_id' => $package, 'month' => $i]);

            }
            $sales_sum[] = ['name' => getPackageInfo($package)->name, 'data' => $sale_product_sum];
        }
        return $sales_sum;
    }
}
