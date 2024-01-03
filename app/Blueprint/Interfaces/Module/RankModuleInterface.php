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

namespace App\Blueprint\Interfaces\Module;

use App\Eloquents\User;

/**
 * Interface RankModuleInterface
 * @package App\Blueprint\Interfaces\Module
 */
interface RankModuleInterface
{
    /**
     * @return mixed
     */
    function process();

    /**
     * @param User $user
     * @return mixed
     */
    function calculate(User $user);

    /**
     * @param User $user
     * @param $rank
     * @return mixed
     */
    function distribute(User $user, $rank);
}
