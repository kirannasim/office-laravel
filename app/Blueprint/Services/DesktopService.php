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

use App\Blueprint\Facades\TransactionServer;
use App\Blueprint\Facades\UserServer;

/**
 * Class DesktopService
 * @package App\Blueprint\Services
 */
class DesktopService
{

    function __construct()
    {

    }

    /**
     * get Downline Count based on month or day or year
     *
     * @param array
     * @return type integer
     */
    function getDownlineCount($options)
    {

        return UserServer::getDownlineJoiningCount($options);
    }

    /**
     * get wallet balance
     *
     * @param type $id integer
     * @return type integer
     */
    function getBalance($id)
    {
        return TransactionServer:: getbalance($id);
    }

    /**
     * get commission based on year date or day and amount type
     *
     * @param type $options array
     * @return type integer
     */
    function getEwalletSum($options)
    {
        return TransactionServer:: getEwalletSum($options);
    }

    /**
     * get top earners
     *
     * @param type $options array
     * @return type collection
     */
    function getTopEarners($options)
    {
        return TransactionServer:: getTopEarners($options);
    }

    /**
     * get Top Recruiters
     *
     * @param type $options array
     * @return type collection
     */
    function getTopRecruiters($options)
    {
        return UserServer::getTopREcruiters($options);
    }

}
