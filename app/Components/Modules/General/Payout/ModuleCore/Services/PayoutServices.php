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

namespace App\Components\Modules\General\Payout\ModuleCore\Services;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Blueprint\Query\Builder;
use App\Components\Modules\General\Payout\ModuleCore\Eloquents\PayoutRequest;
use App\Eloquents\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class PayoutServices
 * @package App\Components\Modules\Genera\Payout\ModuleCore\Servicesion
 */
class PayoutServices
{
    /**
     * @param array $options
     * @param null $pages
     * @param bool $showAll
     * @return PayoutRequest
     */
    function getPayoutData($options = [], $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';
        $defaults = collect([
            'sortBy' => 'created_at',
            'orderBy' => 'DESC',
            'fromDate' => PayoutRequest::min('created_at'),
            'toDate' => Carbon::now()->toDateTimeString(),
            'status' => 'requested',
        ]);
        $options = $defaults->merge($options);

        $builder = PayoutRequest::whereBetween('created_at', [$options->get('fromDate'), $options->get('toDate')])
            ->orderBy($options->get('sortBy'), $options->get('orderBy'))
            ->when($userId = $options->get('userId'), function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('user_id', $userId);
            });

        return $showAll ? $builder->{$method}($pages) : $builder;
    }

    /**
     * @param User $user
     * @param ModuleBasicAbstract|WalletModuleInterface $wallet
     * @return mixed
     */
    function balanceByWallet(User $user, ModuleBasicAbstract $wallet)
    {
        return $wallet->getBalance($user, false);
    }

    /**
     * @param array $options
     * @return PayoutRequest
     */
    function getPayoutRequests($options = [])
    {
        $defaults = collect([
            'sortBy' => 'created_at',
            'orderBy' => 'DESC',
            'fromDate' => PayoutRequest::min('created_at'),
            'toDate' => Carbon::now()->toDateTimeString(),
        ]);
        $options = $defaults->merge($options);

        return PayoutRequest::with('payoutStatus')->whereBetween('created_at', [$options->get('fromDate'), $options->get('toDate')])
            ->when($userId = $options->get('userId'), function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('user_id', $userId);
            })
            ->when($wallet = $options->get('wallet'), function ($query) use ($wallet) {
                /** @var Builder $query */
                $query->where('wallet', $wallet);
            })
            ->when($request_amount = $options->get('minimum'), function ($query) use ($request_amount) {
                /** @var Builder $query */
                $query->where('request_amount', '>=', $request_amount);
            })
            ->when($status = $options->get('status'), function ($query) use ($status) {
                /** @var Builder $query */
                $query->where('status', $status);
            })
            ->when($limit = $options->get('limit'), function ($query) use ($limit) {
                /** @var Builder $query */
                $query->take($limit);
            })
            ->orderBy($options->get('sortBy'), $options->get('orderBy'));
    }

    /**
     * @param $data
     * @return $this|Model
     */
    function savePayoutRequest($data)
    {
        return PayoutRequest::create($data->only($this->allowedFields()));
    }

    /**
     * @return array
     */
    function allowedFields()
    {
        return ['user_id', 'request_amount', 'wallet', 'gateway', 'remark', 'status', 'transaction_id', 'account'];
    }

    /**
     * @param $id
     * @return bool|null
     * @throws Exception
     */
    function cancelRequest($id)
    {
        if (!$payoutRequest = PayoutRequest::find($id)) return false;

        DB::transaction(function () use ($payoutRequest) {
            $payoutRequest->transaction()->delete();

            $payoutRequest->delete();

        });

        return getModule((int)$payoutRequest->transaction->operation->from_module)->updateCache(loggedUser());
    }

    /**
     * @param $id
     * @return Collection|mixed|static[]
     */
    function getPayoutRequest($id)
    {
        return PayoutRequest::find($id)->get()->first();
    }

}
