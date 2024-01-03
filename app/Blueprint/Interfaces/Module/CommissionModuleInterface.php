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
use Illuminate\Database\Eloquent\Builder;

/**
 * Interface CommissionModuleInterface
 * @package App\Blueprint\Interfaces\Module
 */
interface CommissionModuleInterface
{
    /**
     * @param array $args
     * @return mixed
     */
    function process($args = []);

    /**
     * @param User $user
     * @return mixed|Builder
     */
    function credited(User $user);

    /**
     * @param User $user
     * @return mixed|Builder
     */
    function pending(User $user);

    /**
     * @param User $user
     * @return mixed
     */
    function isUserEligible(User $user);
}