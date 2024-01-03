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
 * User: Hybrid MLM Software
 * Date: 12/20/2017
 * Time: 1:02 PM
 */

namespace App\Components\Modules\General\Faq\ModuleCore\Traits;

use Illuminate\Http\Request;

/**
 * Trait Validations
 * @package App\Components\Modules\General\Payout\ModuleCore\Traits
 */
trait Validations
{
    /**
     * @return array
     */
    public function categoryValidationRules()
    {
        return [
            'title.*' => 'required',
            'sort_order' => 'nullable|numeric',
        ];
    }

    /**
     * @return array
     */
    public function categoryValidationMessages()
    {
        return [
            'title' => _mt($this->module->moduleId, 'Faq.Please_enter_question'),
            'sort_order.numeric' => _mt($this->module->moduleId, 'Faq.Please_enter_valid_sort_order'),
        ];
    }

    /**
     * @return array
     */
    public function categoryValidationAttributes()
    {
        return [
            'title' => _mt($this->module->moduleId, 'Faq.question'),
            'sort_order' => _mt($this->module->moduleId, 'Faq.sort_order'),
        ];
    }

    /**
     * @return array
     */
    public function faqValidationRules()
    {
        return [
            'title.*' => 'required',
            'content.*' => 'required',
            'category' => 'required',
            'sort_order' => 'nullable|numeric',
        ];
    }

    /**
     * @return array
     */
    public function faqValidationMessages()
    {
        return [
            'title' => _mt($this->module->moduleId, 'Faq.Please_enter_question'),
            'content' => _mt($this->module->moduleId, 'Faq.Please_enter_answer'),
            'category' => _mt($this->module->moduleId, 'Faq.Please_select_category'),
            'sort_order.numeric' => _mt($this->module->moduleId, 'Faq.Please_enter_valid_sort_order'),
        ];
    }

    /**
     * @return array
     */
    public function faqValidationAttributes()
    {
        return [
            'title' => _mt($this->module->moduleId, 'Faq.question'),
            'content' => _mt($this->module->moduleId, 'Faq.answer'),
            'category' => _mt($this->module->moduleId, 'Faq.category'),
            'sort_order' => _mt($this->module->moduleId, 'Faq.sort_order'),
        ];
    }
}
