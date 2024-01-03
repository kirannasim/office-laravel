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

namespace App\Components\Modules\Wallet\BusinessWallet;

use App\Blueprint\Interfaces\Module\WalletModuleAbstract;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents\User;
use App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Traits\Boot;
use App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Traits\Hooks;
use App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Traits\Routes;
use App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Traits\Validations;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

/**
 * Class BusinessWalletIndex
 * @package App\Components\Modules\Wallet\BusinessWallet
 */
class BusinessWalletIndex extends WalletModuleAbstract implements WalletModuleInterface
{

    use Routes, Hooks, Boot, Validations;

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
     * @throws Exception
     */
    function uninstall()
    {
        ModuleCore\Schema\Setup::uninstall();
    }

    /**
     * handle admin settings
     */
    function adminConfig()
    {
        $config = collect([]);
        if ($this->getModuleData()) $config = $this->getModuleData(true);

        $data = [
            'scripts' => [
                asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            ],
            'moduleId' => $this->moduleId,
            'config' => $config
        ];

        return view('Wallet.BusinessWallet.Views.adminConfig', $data);
    }

    /**
     * @param array $moduleData
     * @return mixed
     */
    function preProcessModuleData($moduleData = [])
    {
        $moduleData['transaction_password'] = bcrypt($moduleData['transaction_password']);

        return $moduleData;
    }

    /**
     * Get Business-wallet balance
     *
     * @param \App\Eloquents\User $user
     * @param bool $cached
     * @return mixed
     */
    function getBalance(\App\Eloquents\User $user = null, $cached = true)
    {
        $user = User::companyUser();

        $user->balance();
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
        $user = ($user && $user->exists) ? User::find($user->id) : User::companyUser();
        $vaultWallet = collect(vault($user)->get('wallet', []));
        $slug = Str::camel($this->registry['key']);

        return fillVault($user, vault($user)->put('wallet', $vaultWallet->put($slug, [
            'balance' => User::find($user->id)->balance()
        ])));
    }

    /**
     * @param \App\Eloquents\User|null $user
     * @param array $options
     * @return Builder|mixed
     */
    function credited(\App\Eloquents\User $user = null, $options = [])
    {
        return (new ModuleCore\Eloquents\User)->credited($options);
    }

    /**
     * @param \App\Eloquents\User|null $user
     * @param array $options
     * @return Builder|mixed
     */
    function debited(\App\Eloquents\User $user = null, $options = [])
    {
        return (new ModuleCore\Eloquents\User)->debited($options);
    }
}