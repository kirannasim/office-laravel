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

namespace App\Blueprint\ServiceProviders;

use App\Blueprint\Services\CartServices;
use App\Blueprint\Services\CommissionServices;
use App\Blueprint\Services\ConfigServices;
use App\Blueprint\Services\HookServices;
use App\Blueprint\Services\HtmlServices;
use App\Blueprint\Services\LanguageHelper;
use App\Blueprint\Services\LeadServices;
use App\Blueprint\Services\MailServices;
use App\Blueprint\Services\MenuServices;
use App\Blueprint\Services\PackageServices;
use App\Blueprint\Services\PaymentServices;
use App\Blueprint\Services\ReportServices;
use App\Blueprint\Services\RouteHelper;
use App\Blueprint\Services\TransactionServices;
use App\Blueprint\Services\UserServices;
use App\Blueprint\Services\UtilityServices;
use App\Eloquents\User;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

/**
 * Class CoreServiceProvider
 * @package App\Blueprint\ServiceProviders
 */
class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param UserServices $userServices
     * @param UtilityServices $utilityServices
     * @param Request $request
     * @param MenuServices $menuServices
     * @return void
     */
    public function boot(UserServices $userServices, UtilityServices $utilityServices, Request $request, MenuServices $menuServices)
    {
        registerAction('prePaymentProcessAction', function () use ($userServices,$request) {
            if(!$request->input('expire'))
            {
                app()->call([$userServices, 'handleRegistrationRequest']);
            }
            else
            {   
                app()->call([$userServices, 'handleExpireRegistrationRequest']);
            }
            
        }, 'registration', 0);

        registerAction('postChangeTransactionPasswordActions', function ($data) use ($utilityServices) {
            app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'change_transaction_password', 'data' => $data,'on_user_id'=>loggedId()]);
        }, 'change_transaction_password', 0);

        registerAction('postIpWhitelistActions', function ($data) use ($utilityServices) {
            app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'ip_whitelist', 'data' => $data,'on_user_id'=>loggedId()]);
        }, 'ip_whitelist', 0);

        registerFilter('pendingCallbackResponse', function ($data, $transaction) use ($userServices) {
            return app()->call([$userServices, 'pendingCallbackResponse'],['transaction' => $transaction]);
        }, 'Registration', 0);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(HookServices::class, function () {
            return new HookServices();
        });

        $this->app->singleton(HtmlServices::class, function () {
            return new HtmlServices();
        });

//        $this->app->singleton(CartServices::class, function () {
//            return new CartServices();
//        });

        $this->app->singleton(PaymentServices::class, function () {
            return new PaymentServices();
        });

        $this->app->bind(LanguageHelper::class, function () {
            return new LanguageHelper();
        });

        $this->app->bind(UserServices::class, function () {
            return new UserServices();
        });

        $this->app->singleton(MenuServices::class, function () {
            return new MenuServices();
        });

        $this->app->singleton(RouteHelper::class, function () {
            return new RouteHelper();
        });

        $this->app->bind(CartServices::class, function () {
            return new CartServices();
        });

        $this->app->bind(PackageServices::class, function () {
            return new PackageServices();
        });

        $this->app->bind(TransactionServices::class, function ($app) {
            return new TransactionServices();
        });

        $this->app->bind(ConfigServices::class, function () {
            return new ConfigServices();
        });

        $this->app->bind(MailServices::class, function () {
            return new MailServices();
        });

        $this->app->bind(ReportServices::class, function () {
            return new ReportServices();
        });

        $this->app->bind(LeadServices::class, function () {
            return new LeadServices();
        });

        $this->app->bind(CommissionServices::class, function () {
            return new CommissionServices();
        });
    }
}
