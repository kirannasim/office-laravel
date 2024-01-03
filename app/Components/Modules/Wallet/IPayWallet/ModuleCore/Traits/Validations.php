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

namespace App\Components\Modules\Wallet\IPayWallet\ModuleCore\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Trait Validations
 * @package App\Components\Modules\Wallet\IPayWallet\ModuleCore\Traits
 */
trait Validations
{
    /**
     * Validation for ip white listing
     *
     * @param Request $request
     * @return mixed
     */
    function validatorIpWhitelist(Request $request)
    {
        if (isset($request->whitelisting))
            $rules = ['ip' => 'required|ip'];
        else
            $rules = [];

        $validator = Validator::make($request->all(), $rules);

        return $validator;
    }

    /**
     * Validation for transaction password change
     *
     * @param Request $request
     * @return mixed
     */
    function validateCurrentTransactionPass(Request $request)
    {
        $rules = [
            'transactionPass' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        return $validator;
    }

    /**
     * Validation for transaction password change
     *
     * @param Request $request
     * @return mixed
     */
    function validateCurrentLoginPass(Request $request)
    {
        $rules = [
            'loginPass' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        return $validator;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    function validateTransfer(Request $request)
    {
        if (($validator = $this->validator($request)) && $validator->fails())
            return response()->json($validator->errors(), 422);

        return response('true');
    }

    /**
     * Validate Transaction data
     *
     * @param Request $request
     * @return mixed
     */
    function validator(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validationRules(), $this->validationMessages(), $this->validationAttributes());
        $validator->after(function ($validator) use ($request) {
            if (!app()->call([$this, 'hasSufficientBalance']))
                $validator->errors()->add('balance', 'Insufficient balance!');

            if (($myWallet = $request->input('payee.' . loggedId() . '.to_wallet')) && ($myWallet == $this->module->moduleId))
                $validator->errors()->add('wallet', 'transfer not allowed with same wallet!');
        });

        return $validator;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function validationRules()
    {
        $walletId = $this->module->moduleId;
        $amountRules = 'required|numeric';
        $walletRules = "in:$walletId";

        $walletConfig = getModule($this->module->moduleId)->getModuleData(true);
        if ($walletConfig->get('minimum_transfer'))
            $amountRules .= '|min:' . $walletConfig->get('minimum_amount');

        if ($walletConfig->get('maximum_transfer'))
            $amountRules .= '|max:' . $walletConfig->get('maximum_amount');

        if ($walletConfig->get('cross_transfer'))
            $walletRules .= ',' . implode($walletConfig->get('cross_wallets'), ',');

        return [
            'payee.*.id' => 'required|numeric|exists:users,id',
            'payee.*.amount' => $amountRules,
            'payee.*.to_wallet' => $walletRules,
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function validationMessages()
    {
        return [
            'payee.*.id.*' => 'Missing or Invalid Payee ID !',
            'payee.*.amount' => 'Missing Amount !',
            'payee.*.amount.min' => 'amount is less than minimum amount',
            'payee.*.amount.max' => 'amount is greater than maximum amount',
            'payee.*.in' => 'Invalid Wallet Selected',
        ];
    }

    /**
     * @return array
     */
    public function validationAttributes()
    {
        return [
            'payee.*.id' => 'Payee',
            'payee.*.amount' => 'amount',
        ];
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    function validateChangeTransactionPassword(Request $request)
    {
        if (($validator = $this->validatorPasswordChange($request)) && $validator->fails())
            return response()->json($validator->errors(), 422);

        session(['tranPasswordData' => $request->all(), 'walletAction' => 'changeTranPassword']);
    }

    /**
     * Validation for transaction password change
     *
     * @param Request $request
     * @return mixed
     */
    function validatorPasswordChange(Request $request)
    {
        $rules = [
            'password' => 'required|confirmed|min:8'
        ];
        $validator = Validator::make($request->all(), $rules);

        return $validator;
    }

    /**
     * @return array
     */
    function moduleDataValidationRules()
    {
        return [
            'module_data.payout_provision' => 'required',
            'module_data.transfer_provision' => 'required',
            'module_data.minimum_transfer' => 'required',
            'module_data.minimum_amount' => 'required_if:module_data.minimum_transfer,==,1',
            'module_data.maximum_transfer' => 'required',
            'module_data.maximum_amount' => 'required_if:module_data.maximum_transfer,==,1',
            'module_data.cross_transfer' => 'required',
            'module_data.cross_wallets' => 'required_if:module_data.cross_transfer,==,1',
        ];
    }

    /**
     * @return array
     */
    function moduleDataValidationMessages()
    {
        return [
            'module_data.payout_provision.required' => _mt($this->moduleId, 'IPayWallet.Please_set_payout_provision'),
            'module_data.transfer_provision.required' => _mt($this->moduleId, 'IPayWallet.Please_set_transfer_provision'),
            'module_data.minimum_transfer.required' => _mt($this->moduleId, 'IPayWallet.Please_set_minimum_transfer'),
            'module_data.minimum_amount.required_if' => _mt($this->moduleId, 'IPayWallet.Please_enter_valid_amount'),
            'module_data.maximum_transfer.required' => _mt($this->moduleId, 'IPayWallet.Please_set_maximum_transfer'),
            'module_data.maximum_transfer.required_if' => _mt($this->moduleId, 'IPayWallet.Please_enter_valid_amount'),
            'module_data.cross_transfer.required' => _mt($this->moduleId, 'IPayWallet.Please_set_cross_transfer_option'),
            'module_data.cross_wallets.required_if' => _mt($this->moduleId, 'IPayWallet.Please_select_atleast_one_wallet'),
        ];
    }
}