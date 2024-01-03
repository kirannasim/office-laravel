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

namespace App\Blueprint\Interfaces\Transaction;

/**
 * Interface PayableInterface
 * @package App\Blueprint\Interfaces\Transaction
 */
interface PayableInterface
{
    /**
     * Get payer info/ID
     *
     * @return mixed
     */
    function getPayer();

    /**
     * Get payee info/ID
     *
     * @return mixed
     */
    function getPayee();

    /**
     * @return mixed
     */
    function getItems();

    /**
     * Any pre-transaction tasks can be written here.
     *
     * @return mixed
     */
    function preTransaction();

    /**
     * Any post-transaction tasks can be written here.
     *
     * @return mixed
     */
    function postTransaction();

    /**
     * Need invoice or not
     *
     * @return array
     */
    function hasInvoice();

    /**
     * Return meta data for building invoice
     *
     * @return mixed
     */
    function setInvoiceData();

    /**
     * Context of the payment such as registration, account upgrade etc.
     *
     * @return mixed
     */
    function getContext();

    /**
     * Return via which gateway/medium the transaction is going tobe fulfilled.
     *
     * @return mixed
     */
    function gateway();

    /**
     * Does the payable have items to be shipped
     *
     * @return boolean
     */
    function hasShipping();
}
