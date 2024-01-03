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

namespace App\Components\Modules\Payment\BusinessWallet\ModuleCore\Support\Transaction;

use App\Blueprint\Facades\EwalletServer;
use App\Blueprint\Support\Transaction\Payable;

/**
 * Class BusinessWalletPayable
 * @package App\Components\Modules\Payment\BusinessWallet\ModuleCore\Support\Transaction
 */
class BusinessWalletPayable Extends Payable
{
    /**
     * Pre-Transaction logic
     *
     * @return mixed
     */
    function preTransaction()
    {
        parent::preTransaction();

        return EwalletServer::processWallet($this->getPayer(), $this->getPayee(), $this->getTotal());
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
        return 'BusinessWallet';
    }
}
