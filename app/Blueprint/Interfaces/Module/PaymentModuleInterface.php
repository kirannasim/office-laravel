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

/**
 * Interface PaymentModuleInterface
 * @package App\Blueprint\Interfaces\Module
 */
interface PaymentModuleInterface extends TransactionPassInterface
{
    /**
     * Process Payment
     *
     * @param array $args
     * @param string $operation
     * @param TransactionServices $transactionServices
     * @return mixed
     */
    //function processPayment($args = [], $operation = 'fund_transfer', TransactionServices $transactionServices);
}
