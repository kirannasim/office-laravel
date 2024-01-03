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

namespace App\Components\Modules\General\PackageUpgrade\ModuleCore\Traits;

use App\Blueprint\Services\CartServices;
use App\Blueprint\Services\MenuServices;
use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\OrderServices;
use App\Blueprint\Services\PaymentServices;
use App\Blueprint\Services\UserServices;
use App\Components\Modules\General\PackageUpgrade\ModuleCore\Support\PackageUpgradeCallback;
use App\Eloquents\User;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\General\PackageUpgrade\ModuleCore\Traits
 */
trait Hooks
{
    /**
     * @return mixed
     */
    function hooks()
    {
        app()->call([$this, 'packageUpgradeHooks']);

        app()->call([$this, 'leftMenus']);
    }

    /**
     * @param PaymentServices $paymentServices
     * @param PackageUpgradeCallback $packageUpgradeCallback
     * @param OrderServices $orderServices
     * @param ModuleServices $moduleServices
     */
    public function packageUpgradeHooks(PaymentServices $paymentServices, PackageUpgradeCallback $packageUpgradeCallback, OrderServices $orderServices, ModuleServices $moduleServices, CartServices $cartServices)
    {
        registerAction('prePaymentProcessAction', function ($request) use ($moduleServices, $orderServices, $packageUpgradeCallback, $paymentServices) {
            $orderServices->keepOrder(true, $request);
            $paymentServices->setGateway((int)$request->input('gateway'))
                ->setCallback($packageUpgradeCallback)
                ->setPayable($paymentServices->getPayable('cart')
                    ->setFromModule((int)$request->input('gateway'))
                    ->setToModule($moduleServices->slugToId('Wallet-BusinessWallet'))
                    ->setOperation('package_upgrade')
                    ->setPayee(User::companyUser())
                    ->setPayer(loggedUser())
                    ->setRemarks('Package Upgrading')
                    ->setContext('package_upgrade'));


            registerAction('postPaymentProcessAction', function ($response) {
                app()->call([app(UserServices::class), 'unsetRegistrationData']);
            }, 'package_upgrade');
        }, 'package_upgrade', 2);

        registerFilter('pendingCallbackResponse', function ($data, $transaction) use ($cartServices, $orderServices) {

            $orderData = $orderServices->getOrderData();

            return [
                'orderData' => $orderData,
                'cartDetails' => $cartDetails = $cartServices->cartTotal(),
                'context' => 'package_purchase',
                'transaction_id' => $transaction->id,
                'transaction' => $transaction,
            ];
        }, 'package_upgrade', 0);

    }

    public function leftMenus(MenuServices $menuServices)
    {
        // registerFilter('leftMenus', function ($menus) use ($menuServices) {
        //     /** @var Collection $menus */
        //     return $menus->merge($menuServices->menusFromRaw([
        //         [
        //             'label' => ['en' => 'Package Upgrade'],
        //             'link' => '',
        //             'permit' => ['user:defaultUser'],
        //             'route_name' => 'user.packageUpgrade',
        //             'route' => '',
        //             'icon_image' => '',
        //             'icon_font' => 'fas fa-shopping-cart',
        //             'parent_id' => '0',
        //             'sort_order' => '7',
        //             'protected' => '0',
        //             'description' => '',
        //             'attributes' => '',
        //         ]
        //     ]));
        // });
    }
}