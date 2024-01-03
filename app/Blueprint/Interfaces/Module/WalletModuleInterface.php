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
 * Interface WalletModuleInterface
 * @package App\Blueprint\Interfaces\Module
 */
interface WalletModuleInterface
{
    /**
     * Get wallet balance
     *
     * @param User $user
     * @param bool $cached
     * @return mixed
     */
    function getBalance(User $user = null, $cached = true);

    /**
     * @param User|null $user
     * @param array $options
     * @return Builder|mixed
     */
    function credited(User $user = null, $options = []);

    /**
     * @param User|null $user
     * @param array $options
     * @return Builder|mixed
     */
    function debited(User $user = null, $options = []);

    /**
     * @param User $user
     * @return mixed
     */
    function updateCache(User $user = null);

    /**
     * @return ModuleBasicAbstract
     */
    function gateway();
}
