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
 * Date: 9/2/2017
 * Time: 7:32 PM
 */

namespace App\Components\Modules\Payment\Ewallet\ModuleCore\Support\Transaction;

use App\Components\Modules\Wallet\Ewallet\ModuleCore\Services\EwalletServices;
use App\Blueprint\Support\Transaction\Payable;

/**
 * Class EwalletPayable
 * @package App\Components\Modules\Payment\Ewallet\ModuleCore\Support\Transaction
 */
class EwalletPayable Extends Payable
{
    /**
     * Pre-Transaction logic
     *
     * @return mixed
     */
    function preTransaction()
    {
        parent::preTransaction();

        return EwalletServices::processWallet($this->getPayer(), $this->getPayee(), $this->getTotal());
    }

    /**
     * Post-Transaction logic
     */
    function postTransaction()
    {
        parent::postTransaction();
    }

    /**
     * @return string
     */
    function via()
    {
        return 'Ewallet';
    }
}
