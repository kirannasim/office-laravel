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

namespace App\Components\Modules\CartTotal\AdministrationFee;

use App\Blueprint\Interfaces\Module\CartTotalInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Components\Modules\CartTotal\AdministrationFee\ModuleCore\Traits\Hooks;
use App\Components\Modules\CartTotal\AdministrationFee\ModuleCore\Traits\Validations;

/**
 * Class AdministrationFeeIndex
 * @package App\Components\Modules\PaymentTotal\RegistrationFee
 */
class AdministrationFeeIndex extends BasicContract implements CartTotalInterface
{
    use Hooks, Validations;

    /**
     * handle admin settings
     */
    function adminConfig()
    {
        $config = collect(['amount' => 0]);
        if ($this->getModuleData()) $config = $this->getModuleData(true);

        $data = [
            'scripts' => [
                asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js')
            ],
            'styles' => [],
            'moduleId' => $this->moduleId,
            'config' => $config,
        ];

        return view('CartTotal.AdministrationFee.Views.adminConfig', $data);
    }

    /**
     * @return mixed
     */
    function cartTotal()
    {
        if (!$this->getModuleData()) return;

        $moduleData = $this->getModuleData(true);

        registerFilter('fee', function ($fee) use ($moduleData) {
            if ($registrationFee = $moduleData->get('amount') && $moduleData->get('amount') > 0)
                $fee[] = [
                    'amount' => $moduleData->get('amount'),
                    'title' => _mt($this->moduleId, 'RegistrationFee.Registration_Fee'),
                    'module' => $this->moduleId
                ];

            return $fee;
        }, 'cart');
    }

    /**
     * @return mixed
     */
    function operationType()
    {
        return 'add';
    }
}
