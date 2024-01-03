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

namespace App\Components\Modules\General\PackageUpgrade\ModuleCore\Support;

use App\Blueprint\Services\OrderServices;
use App\Blueprint\Services\PaymentServices;
use App\Blueprint\Support\Transaction\Callback;
use App\Blueprint\Support\Transaction\CommissionCallback;
use App\Blueprint\Support\Transaction\RegistrationCallback;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankAchievementHistory;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser;
use App\Components\Modules\System\MLM\ModuleCore\Eloquents\UserPlan;
use App\Components\Modules\System\MLM\ModuleCore\Services\Plugins;
use App\Eloquents\Commission;
use App\Eloquents\CommissionBasket;
use App\Eloquents\Order;
use App\Eloquents\Transaction;
use App\Eloquents\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * Class PackageUpgradeCallback
 * @package App\Components\Modules\General\PackageUpgrade\ModuleCore\Support
 */
class PackageUpgradeCallback extends Callback
{
    /**
     * @param OrderServices $orderServices
     * @param $response
     * @param Plugins $plugins
     * @return Order|Model
     * @throws Throwable
     */
    function success(OrderServices $orderServices, $response, Plugins $plugins, RegistrationCallback $registrationCallback)
    {
        return DB::transaction(function () use ($orderServices, $response, $plugins, $registrationCallback) {
            $orderData = collect($response)->get('orderData', $orderServices->getOrderData());
            $package = $orderData['products'][0]['productId'];
            $transaction = isset($response['transaction_id']) ? Transaction::find($response['transaction_id']) : Transaction::find($response['transaction']['id']);
            
            $user = $response['user'] = User::find($transaction->payer);
            $previousPackage = $user->package;
            $user->update(['package_id' => $package]);

            defineAction('postPackageUpgrade', 'package_upgrade', collect(['result' => $response, 'previousPackage' => $previousPackage]));

            $order = $orderServices->addOrder(true, $user, $transaction, 1, collect($response)->get('cartDetails'));

            //assign IB rank
            if (!$user->rank) {
                AdvancedRankUser::create([
                    'user_id' => $user->id,
                    'rank_id' => 1
                ]);

                AdvancedRankAchievementHistory::create([
                    'user_id' => $user->id,
                    'rank_id' => 1
                ]);
            }
            /*$this->creditFromCommissionBasket($user);*/

            $data = [
                'package'=>'AFFILIATE_TO_INTRODUCING BROKER - IB',
                'email' => 'htcodeninja@gmail.com',
                'firstname' => Auth::user()->metaData->firstname,
                'lastname' => Auth::user()->metaData->lastname,
                'id' => Auth::user()->id,
            ];
            app()->call([$registrationCallback, 'sendmailtoenroller'], ['data'=> collect($data),'id'=>Auth::user()->id, 'isUpgrade'=>true]);

            return ['order' => $order, 'redirectUrl' => route('user.packageUpgrade', ['status' => 'success'])];
        });
    }

    /**
     * @param User $user
     * @return bool
     */
    function creditFromCommissionBasket(User $user)
    {
        $commissions = CommissionBasket::where('user_id', $user->id)->whereDate('created_at', Carbon::now()->format('Y-m-d'))->get();

        foreach ($commissions as $commission) {

        }
        return true;
    }

    function processCommission($commissionData)
    {
        $paymentService = app(PaymentServices::class);
        $transaction = $paymentService->clean()
            ->setAuthorized(true)
            ->setCallback(app(CommissionCallback::class))
            ->setPayable($this->preparePayable($commissionData, $earningsLimit))
            ->setGateway(getModule('Payment-Ewallet'))
            ->processPayment();

        $this->addCommission([
            'transactionId' => $transaction->id,
            'moduleId' => $transaction->id,
            'ref_user_id' => $transaction->id,
        ]);

        return $transaction['result'];
    }

    /**
     * @param $earningsLimit
     * @return mixed
     */
    function preparePayable($commissionData, $earningsLimit)
    {
        $attributes = [
            'payer' => User::companyUser(),
            'payee' => $commissionData['payee'],
            'context' => 'commission',
            'actualAmount' => $actualAmount = $earningsLimit['actualAmount'],
            'total' => $actualAmount - array_sum(array_column($charges = defineFilter('PreCommissionTransaction', [], 'transactionTotal', $actualAmount), 'amount')),
            'operation' => 'commission',
            'fromModule' => callModule('Wallet-BusinessWallet')->moduleId,
            'toModule' => $this->getBeneficiary()['benefit']['wallet'],
            'gateway' => $this->getGateway(),
            'charges' => $charges,
            'remarks' => 'commission',
        ];

        if ($earningsLimit['lapsedAmount'] > 0) {
            $this->addToCommissionBasket($attributes, $earningsLimit);
            $plugin = app(Plugins::class);
            /** @var Plugins $plugin */
            $plugin->inactivatePlan($this->getBeneficiary()['user']);
        }

        return app(PaymentServices::class)->preparePayable($attributes);
    }

    /**
     * @param Transaction $transaction
     */
    function addCommission($transaction)
    {
        //save to commission history
        $attributes = [
            'transaction_id' => $transaction['id'],
            'module_id' => $transaction['moduleId'],
            'ref_user_id' => $transaction['ref_user_id'],
        ];
        $commission = new Commission($attributes);

        $commission->save();
    }

    /**
     * @param array $data
     * @return JsonResponse
     */
    function failure($data)
    {
        return parent::failure($data); // TODO: Change the autogenerated stub
    }


    /**
     * @param $response
     * @return mixed
     */
    function pending($response)
    {
        return $response;
    }

}