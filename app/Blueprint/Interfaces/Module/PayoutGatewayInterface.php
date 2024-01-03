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

use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Support\Transaction\Payable;
use Illuminate\Http\Request;

/**
 * Interface PaymentModuleInterface
 * @package App\Blueprint\Interfaces\Module
 */
interface PayoutGatewayInterface
{
    /**
     * Process Payout
     *
     * @param Payable $payable
     * @param TransactionServices $transactionServices
     * @return mixed
     */
    function processPayout(Payable $payable, TransactionServices $transactionServices);

    /**
     * @param Request $request
     * @return mixed
     */
    function payoutView(Request $request = null);
}
