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
 * Date: 12/20/2017
 * Time: 1:02 PM
 */

namespace App\Components\Modules\General\Payout\ModuleCore\Traits;


use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Blueprint\Services\ModuleServices;
use App\Eloquents\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Trait Validations
 * @package App\Components\Modules\General\Payout\ModuleCore\Traits
 */
trait Validations
{
    /**
     * Validate Transaction data
     *
     * @param Request $request
     * @param ModuleServices $moduleServices
     * @return mixed
     */
    function validator(Request $request, ModuleServices $moduleServices)
    {
        /** @var \Illuminate\Contracts\Validation\Validator $validator */
        $validator = Validator::make($request->all(), $this->validationRules(), $this->validationMessages(), $this->validationAttributes());

        if ($validator->fails()) return $validator;

        $validator->after(function ($validator) use ($moduleServices, $request) {
            foreach ($request->input('payout') as $userId => $amount) {
                /** @var WalletModuleInterface $wallet */
                $wallet = $moduleServices->callModule((int)$request->input('wallet'));
                if ($request->input('context') != 'ReleaseRequestedPayout') {
                    if ($amount > $wallet->getBalance(User::find($userId))) {
                        $validator->errors()->add('balance', 'Insufficient balance for ' . User::find($userId)->username);
                    }
                }

            }
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
        return [
            'payout.*' => 'required|numeric'
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
            'required' => ':attribute is not valid'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function validationAttributes()
    {
        return [
            'payout.*' => 'amount'
        ];
    }

    /**
     * @return array
     */
    public function validateSelectedWallet()
    {
        return [
            'wallet' => 'required|numeric'
        ];
    }

    /**
     * @return array
     */
    public function validatePayoutRequest()
    {
        return [
            'wallet' => 'required|numeric',
            'request_amount' => 'required|numeric',
        ];
    }
}
