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

namespace App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Traits;

use App\Blueprint\Services\ModuleServices;
use App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents\User;
use App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Services\BusinessWalletServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Trait Validations
 * @package App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Traits
 */
trait Validations
{
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
        $amountRules = 'required|numeric';

        if ($this->walletConfig()->get('minimum_transfer'))
            $amountRules .= '|min:' . $this->walletConfig()->get('minimum_amount');

        if ($this->walletConfig()->get('maximum_transfer'))
            $amountRules .= '|max:' . $this->walletConfig()->get('maximum_amount');

        return [
            'payee.*.id' => 'required|numeric|exists:users,id',
            'payee.*.amount' => $amountRules,
            'payee.*.to_wallet' => 'required',
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
     * @param Request $request
     * @return JsonResponse
     */
    function validateDeduct(Request $request)
    {
        if (($validator = $this->validatorDeduct($request)) && $validator->fails())
            return response()->json($validator->errors(), 422);

        return response('true');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    function validatorDeduct(Request $request)
    {
        $moduleServices = app(ModuleServices::class);
        $businessWalletServices = app(BusinessWalletServices::class);
        $validator = Validator::make($request->all(), $this->deductValidationRules(), $this->deductValidationMessages());
        $validator->after(function ($validator) use ($moduleServices, $businessWalletServices, $request) {

            foreach ($request->payer as $req) {
                /** @var BusinessWalletServices $businessWalletServices */
                if ($req['amount'] > $businessWalletServices->balanceByWallet(User::find($req['id']), $moduleServices->getModuleById($req['from_wallet']))) {
                    $validator->errors()->add('balance', 'Insufficiant balance for ' . User::find($req['id'])->username);
                }
            }

        });

        return $validator;
    }

    /**
     * @return array
     */
    function deductValidationRules()
    {
        return [
            'payer.*.id' => 'required|numeric|exists:users,id',
            'payer.*.amount' => 'required:amount|numeric',
            'payer.*.from_wallet' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function deductValidationMessages()
    {
        return [
            'payer.*.id.*' => 'Missing or Invalid Payee ID !',
            'payer.*.amount' => 'Missing Amount !',
            'payer.*.from_wallet' => 'Wallet missing',
        ];
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    function validateDeposit(Request $request)
    {
        if (($validator = $this->depositValidator($request)) && $validator->fails())
            return response()->json($validator->errors(), 422);

        return response('true');
    }

    /**
     * Validate Transaction data
     *
     * @param Request $request
     * @return mixed
     */
    function depositValidator(Request $request)
    {
        $validator = Validator::make($request->all(), $this->depositValidationRules(), $this->depositValidationMessages());

        return $validator;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function depositValidationRules()
    {
        return [
            'remarks' => 'required',
            'amount' => 'required:amount|numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function depositValidationMessages()
    {
        return [
            'remarks' => 'Missing remarks!',
            'amount' => 'Missing Amount !',
        ];
    }

    /**
     * @return array
     */
    function moduleDataValidationRules()
    {
        return [
            'module_data.transaction_password' => 'required|confirmed',
            'module_data.transaction_password_confirmation' => 'required',
            'module_data.ip' => 'required_if:module_data.ip_status,==,1'
        ];
    }

    /**
     * @return array
     */
    function moduleDataValidationMessages()
    {
        return [
            'module_data.transaction_password.required' => _mt($this->moduleId, 'BusinessWallet.Please_enter_transaction_password'),
            'module_data.transaction_password.confirmed' => _mt($this->moduleId, 'BusinessWallet.Confirm_transaction_password_and_transaction_password_not_match'),
            'module_data.transaction_password_confirmation.required' => _mt($this->moduleId, 'BusinessWallet.Please_enter_confirm_transaction_password'),
            'module_data.ip.required_if' => _mt($this->moduleId, 'BusinessWallet.Please_enter_ip'),
        ];
    }
}