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


/**
 * Class PaymentModuleAbstract
 * @package App\Blueprint\Interfaces\Module
 */
abstract class PaymentModuleAbstract extends ModuleBasicAbstract implements PaymentModuleInterface
{
    protected $payable;

    /**
     * @return mixed
     */
    public function getPayable()
    {
        return $this->payable;
    }

    /**
     * @param mixed $payable
     */
    public function setPayable($payable)
    {
        $this->payable = $payable;
    }

    /**
     * @return string
     */
    function txnPassRoute()
    {
        return scopeRoute(strtolower($this->getRegistry(true)->get('key')) . '.pass');
    }

    /**
     * @return string
     */
    function txnPassViewRoute()
    {
        return scopeRoute(strtolower($this->getRegistry(true)->get('key')) . '.pass.view');
    }

    /**
     */
    public function getCallback()
    {

    }
}