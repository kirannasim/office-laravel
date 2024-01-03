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

namespace App\Components\Modules\Rank\AdvancedRank\ModuleCore\Traits;

/**
 * Trait Validations
 * @package App\Components\Modules\Rank\AdvancedRank\ModuleCore\Traits
 */
trait Validations
{
    /**
     * @return array
     */
    public function rankConfigValidationRules()
    {
        return [
            'ranks.*.id' => 'required|numeric',
            'ranks.*.name' => 'required',
            'ranks.*.is_active' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function rankConfigValidationMessages()
    {
        return [
            'ranks.*.id.*' => _mt($this->module->moduleId, 'AdvancedRank.Rank_id_is_missing'),
            'ranks.*.name.required' => _mt($this->module->moduleId, 'AdvancedRank.Please_enter_rank_name'),
            'ranks.*.is_active.required' => _mt($this->module->moduleId, 'AdvancedRank.Please_select_active_status'),
        ];
    }

    /**
     * @return array
     */
    public function rankConfigValidationAttributes()
    {
        return [
            'ranks.*.id.*' => _mt($this->module->moduleId, 'AdvancedRank.Rank_id'),
            'ranks.*.name' => _mt($this->module->moduleId, 'AdvancedRank.Rank_Name'),
            'ranks.*.referral_count' => _mt($this->module->moduleId, 'AdvancedRank.Referral_Count'),
            'ranks.*.referral_rank' => _mt($this->module->moduleId, 'AdvancedRank.referral_rank'),
            'ranks.*.referral_rank_count' => _mt($this->module->moduleId, 'AdvancedRank.referral_rank_count'),
            'ranks.*.benefit' => _mt($this->module->moduleId, 'AdvancedRank.Benefit'),
            'ranks.*.is_active' => _mt($this->module->moduleId, 'AdvancedRank.Status'),
        ];
    }

    /**
     * @return array
     */
    public function rankBenefitValidationRules()
    {
        return [
            'benefits.*.id' => 'required',
            'benefits.*.name' => 'required',
            'benefits.*.description' => 'required',
            'benefits.*.value' => 'required|numeric',
        ];
    }

    /**
     * @return array
     */
    public function rankBenefitValidationMessages()
    {
        return [
            'benefits.*.id' => _mt($this->module->moduleId, 'AdvancedRank.Rank_benefit_id_is_missing'),
            'benefits.*.name.required' => _mt($this->module->moduleId, 'AdvancedRank.Please_enter_rank_benefit_name'),
            'benefits.*.description.required' => _mt($this->module->moduleId, 'AdvancedRank.Please_enter_benefit_description'),
            'benefits.*.value.required' => _mt($this->module->moduleId, 'AdvancedRank.Please_enter_benefit_value'),
            'benefits.*.value.numeric' => _mt($this->module->moduleId, 'AdvancedRank.Invalid_benefit_value'),
        ];
    }

    /**
     * @return array
     */
    public function rankBenefitValidationAttributes()
    {
        return [
            'benefits.*.id' => _mt($this->module->moduleId, 'AdvancedRank.Benefit_id'),
            'benefits.*.name' => _mt($this->module->moduleId, 'AdvancedRank.Benefit_Name'),
            'benefits.*.description' => _mt($this->module->moduleId, 'AdvancedRank.Description'),
            'benefits.*.value' => _mt($this->module->moduleId, 'AdvancedRank.Value'),
        ];
    }

    /**
     * @return array
     */
    public function validationBenefitAttributes()
    {
        return [
            'benefits.*.id' => 'Id',
            'benefits.*.referral_count' => 'Value',
            'benefits.*.name' => 'Benefit Name',
        ];
    }

    /**
     * @return array
     */
    public function validationPersonalizedSettingsRules()
    {
        return [
            'defaultRank' => 'required|numeric',
        ];
    }

    /**
     * @return array
     */
    public function validationPersonalizedSettingsMessages()
    {
        return [
            'defaultRank' => 'Missing',
        ];
    }

    /**
     * @return array
     */
    public function validationPersonalizedSettingsAttributes()
    {
        return [
            'defaultRank' => 'Rank',
        ];
    }
}