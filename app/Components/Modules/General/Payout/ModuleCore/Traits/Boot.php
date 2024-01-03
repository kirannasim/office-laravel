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
 * User: fayis
 * Date: 12/20/2017
 * Time: 1:02 PM
 */

namespace App\Components\Modules\General\Payout\ModuleCore\Traits;

use App\Components\Modules\General\Payout\ModuleCore\Services\PayoutServices;
use Illuminate\Support\Facades\Gate;

/**
 * Trait Boot
 * @package App\Components\Modules\General\Payout\ModuleCore\Traits
 */
trait Boot
{
    /**
     * @return mixed
     */
    function bootMethods()
    {
        return app()->call([$this, 'registerBootMethods']);
    }

    /**
     * @param PayoutServices $payoutServices
     */
    function registerBootMethods(PayoutServices $payoutServices)
    {
        Gate::define('initPayoutTransaction', function ($user) use ($payoutServices) {
            return app()->call([$payoutServices, 'checkTransactionPassword']);
        });
    }
}
