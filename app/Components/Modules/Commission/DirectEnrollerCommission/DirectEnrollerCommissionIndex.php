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

namespace App\Components\Modules\Commission\DirectEnrollerCommission;

use App\Blueprint\Interfaces\Module\CommissionModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Blueprint\Services\CommissionServices;
use App\Blueprint\Services\ModuleServices;
use App\Components\Modules\Commission\DirectEnrollerCommission\ModuleCore\Support\Benefit;
use App\Components\Modules\Commission\DirectEnrollerCommission\ModuleCore\Traits\Hooks;
use App\Components\Modules\Commission\DirectEnrollerCommission\ModuleCore\Traits\Validations;
use App\Components\Modules\System\MLM\ModuleCore\Services\Plugins;
use App\Eloquents\Commission;
use App\Eloquents\Package;
use App\Eloquents\Transaction;
use App\Eloquents\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

/**
 * Class DirectEnrollerCommissionIndex
 * @package App\Components\Modules\Commission\DirectEnrollerCommission
 */
class DirectEnrollerCommissionIndex extends BasicContract implements CommissionModuleInterface
{
    use Hooks, Validations;

    public $service;

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
     * @inheritdoc
     */
    function bootMethods(CommissionServices $commissionServices)
    {
        $this->service = $commissionServices;

        schedule('Distribute Pending DEC', function () {
            $this->distributePending();
        });
    }

    /**
     * distributePending
     */
    function distributePending()
    {
        $pendingCommission = Commission::where('module_id', $this->moduleId)
            ->whereHas('transaction', function ($query) {
                /** @var Builder $query */
                $query->where('status', false);
            })->get();

        DB::transaction(function () use ($pendingCommission) {
            $pendingCommission->each(function ($transaction) {
                Transaction::where('id', $transaction->transaction_id)->update(['status' => true]);
            });
        });
    }

    /**
     * handle admin settings
     *
     * @param array $data
     * @return Factory|View
     */
    function adminConfig($data = [])
    {
        $moduleServices = app(ModuleServices::class);
        $wallets = collect($moduleServices->getWalletPool('active'))->filter(function ($wallet) use ($moduleServices) {
            if ($wallet->moduleId != $moduleServices->callModule('Wallet-BusinessWallet')->moduleId) return true;
        });

        $config = collect([]);
        if ($this->getModuleData()) $config = $this->getModuleData(true);

        $data = [
            'styles' => [
                asset('global/plugins/ladda/ladda-themeless.min.css'),
                asset('global/plugins/select2/css/select2.min.css'),
                asset('global/plugins/select2/css/select2-bootstrap.min.css'),
            ],
            'scripts' => [
                asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
                asset('global/plugins/ladda/spin.min.js'),
                asset('global/plugins/ladda/ladda.min.js'),
                asset('global/plugins/select2/js/select2.full.min.js'),
            ],
            'moduleId' => $this->moduleId,
            'wallets' => $wallets,
            'config' => $config,
            'register' => Package::where('in_registration', 1)->get(),
            'upgrade' => Package::where('in_upgrade', 1)->get(),
        ];

        return view('Commission.DirectEnrollerCommission.Views.adminConfig', $data);
    }

    /**
     * @param array $data
     * @return mixed
     */
    function process($data = [])
    {
        if ($this->getModuleData())
            return (new Benefit($data['user'], $this))->setReferenceData($data)->setBeneficiaries()->distribute();
    }

    /**
     * @param User $user
     * @return Application|mixed
     */
    function credited(User $user)
    {
        $options = [
            'user' => $user->id
        ];

        return $this->service->getTransactions($this, $options);
    }

    /**
     * @param User $user
     * @return Application|mixed
     */
    function pending(User $user)
    {
        $options = [
            'user' => $user->id,
            'status' => false
        ];

        return $this->getService()->getTransactions($this, $options);
    }

    /**
     * @return CommissionServices
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param mixed $service
     * @return DirectEnrollerCommissionIndex
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * @param User $user
     * @return bool
     */
    function isUserEligible(User $user)
    {
        $plugins = app(Plugins::class);

        if ($plugins->isAffiliate($user)) return false;

        return true;
    }


    /**
     * @param $commissions
     * @return Factory|View
     */
    function commissionTable($commissions)
    {
        $data['commissionData'] = $commissions;

        return view('Commission.DirectEnrollerCommission.Views.commissionTable', $data);
    }
}
