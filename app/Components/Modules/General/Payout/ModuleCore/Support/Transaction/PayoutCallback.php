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

namespace App\Components\Modules\General\Payout\ModuleCore\Support\Transaction;

use App\Blueprint\Support\Transaction\Callback;
use App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutStatus;
use App\Components\Modules\General\Payout\ModuleCore\Services\PayoutServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class RegistrationCallback
 * @package App\Blueprint\Support\Transaction
 */
class PayoutCallback extends Callback
{
    /**
     * Success callback
     *
     * @param $response
     * @return mixed
     */
    function success($response)
    {
        if ($response['transaction']->context == 'manualPayoutRelease')
            return app()->call([$this, 'payoutReleaseSuccess']);
        else
            return app()->call([$this, 'savePayoutRequest'], ['response' => $response]);
    }

    /**
     * Payment failure callback
     *
     * @param array $data failure data
     * @return bool data regarding failure of payment
     */
    function failure($data)
    {
        return false;
    }

    /**
     * Payment failure callback
     *
     * @return bool data regarding failure of payment
     */
    function pending()
    {
        return true;
    }


    /**
     * @param $response
     * @param Request $request
     * @param PayoutServices $payoutServices
     * @return void
     */
    function savePayoutRequest($response, Request $request, PayoutServices $payoutServices)
    {
        $request->merge([
            'transaction_id' => $response['transaction']->id,
            'user_id' => loggedId(),
            'status' => PayoutStatus::getIdFromSlug('pending')
        ]);

        return DB::transaction(function () use ($request, $payoutServices) {
            $payoutServices->savePayoutRequest($request);
        });
    }


    /**
     * @param Request $request
     * @param PayoutServices $payoutServices
     * @return void
     */
    function payoutReleaseSuccess(Request $request, PayoutServices $payoutServices)
    {
        $totalPayout = 0;
        foreach ($request->input('payout') as $userId => $amount) {
            $totalPayout += $amount;
            $transactions[$userId] = true;
        }
        return response()->json([
            'status' => true,
            'transactions' => $transactions,
            'total' => $totalPayout,
            'formattedTotal' => currency($totalPayout),
            'number' => count($transactions)
        ]);
    }
}
