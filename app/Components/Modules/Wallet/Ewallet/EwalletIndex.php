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

namespace App\Components\Modules\Wallet\Ewallet;

use App\Blueprint\Interfaces\Module\WalletModuleAbstract;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Blueprint\Services\ModuleServices;
use App\Components\Modules\Wallet\Ewallet\Controllers\EwalletController;
use App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents\Ewallet;
use App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents\User;
use App\Components\Modules\Wallet\Ewallet\ModuleCore\Traits\Hooks;
use App\Components\Modules\Wallet\Ewallet\ModuleCore\Traits\Routes;
use App\Components\Modules\Wallet\Ewallet\ModuleCore\Traits\Validations;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Throwable;

/**
 * Class EwalletIndex
 * @package App\Components\Modules\Wallet\Ewallet
 */
class EwalletIndex extends WalletModuleAbstract implements WalletModuleInterface
{
    use Routes, Hooks, Validations;

    /**
     * handle module installations
     *
     * @return void
     */
    function install()
    {
        ModuleCore\Schema\Setup::install();
    }

    /**
     * handle module un-installation
     */
    function uninstall()
    {
        ModuleCore\Schema\Setup::uninstall();
    }

    /**
     * @return Factory|View|mixed
     * @throws Throwable
     */
    function adminConfig()
    {
        $moduleServices = app(ModuleServices::class);
        $wallets = collect($moduleServices->getWalletPool('active'))->filter(function ($wallet) use ($moduleServices) {
            if ($wallet->moduleId != $moduleServices->callModule('Wallet-BusinessWallet')->moduleId) return true;
        });

        $config = collect(['fund_transfer_restricted_to' => 'all']);
        if ($this->getModuleData()) $config = $this->getModuleData(true);

        $data = [
            'scripts' => [
                asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            ],
            'wallets' => $wallets,
            'moduleId' => $this->moduleId,
            'config' => $config
        ];

        return view('Wallet.Ewallet.Views.adminConfig', $data)->render();
    }

    /**
     * Get E-wallet balance
     *
     * @param \App\Eloquents\User $user
     * @param bool $cached
     * @return mixed
     */
    function getBalance(\App\Eloquents\User $user = null, $cached = true)
    {
        $user = ($user && $user->exists) ? User::find($user->id) : User::find(loggedId());

        if (!$cached) return $user->balance();

        $vaultWallet = collect(vault($user)->get('wallet', []));
        $cachedWallet = collect($vaultWallet->get($slug = Str::camel($this->getRegistry()['key']), []));

        return $cachedWallet->get('balance', function () use ($cachedWallet, $slug, $user, $vaultWallet) {
            return fillVault($user, vault($user)->put('wallet', $vaultWallet->put($slug, [
                'balance' => $this->getBalance($user, false)
            ])))['wallet'][$slug]['balance'];
        });
    }

    /**
     * @param \App\Eloquents\User $user
     * @return mixed
     */
    function updateCache(\App\Eloquents\User $user = null)
    {
        $user = ($user && $user->exists) ? User::find($user->id) : User::find(loggedId());
        $vaultWallet = collect(vault($user)->get('wallet', []));
        $slug = Str::camel($this->registry['key']);

        return fillVault($user, vault($user)->put('wallet', $vaultWallet->put($slug, [
            'balance' => User::find($user->id)->balance()
        ])));
    }

    /**
     * @param array $data
     */
    function addUserToWallet($data = [])
    {
        Ewallet::create(['user_id' => $data['user']->id]);
    }

    /**
     * @param \App\Eloquents\User|null $user
     * @param array $options
     * @return Builder|mixed
     */
    function credited(\App\Eloquents\User $user = null, $options = [])
    {
        return (new ModuleCore\Eloquents\User)->find($user->id)->credited($options);
    }

    /**
     * @param \App\Eloquents\User|null $user
     * @param array $options
     * @return Builder|mixed
     */
    function debited(\App\Eloquents\User $user = null, $options = [])
    {
        return (new ModuleCore\Eloquents\User)->find($user->id)->debited($options);
    }


    /**
     * @param Request $request
     * @return string
     */
    function getMemberTransactionList(Request $request)
    {
        return "<div class='ewalletTranList'>" . app()->call([new EwalletController, 'getMemberTransactionList']) . '</div>';
    }
}
