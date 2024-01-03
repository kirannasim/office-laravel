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

namespace App\Components\Modules\MLMPlan\Binary;

use App\Blueprint\Facades\ConfigServer;
use App\Blueprint\Interfaces\Module\MLMPlanModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Blueprint\Query\Builder;
use App\Blueprint\Services\UserServices;
use App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Eloquents\BinaryPositionSelector;
use App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint;
use App\Components\Modules\MLMPlan\Binary\ModuleCore\Services\BinaryServices;
use App\Components\Modules\MLMPlan\Binary\ModuleCore\Traits\Hooks;
use App\Components\Modules\MLMPlan\Binary\ModuleCore\Traits\Validations;
use App\Components\Modules\System\MLM\ModuleCore\Services\Plugins;
use App\Eloquents\User;
use App\Eloquents\UserRepo;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class BinaryIndex
 * @package App\Components\Modules\MLMPlan\Binary
 */
class BinaryIndex extends BasicContract implements MLMPlanModuleInterface
{
    use Hooks, Validations;

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
     * handle admin settings
     */
    function adminConfig()
    {
        $config = collect(['upline_point_distribute' => 1, 'distribute_based_on' => 'downline_joining_count', 'placement_based_on' => 'left_right_most', 'position_selector' => 'user_choice']);
        if ($this->getModuleData()) $config = $this->getModuleData(true);

        $data = [
            'scripts' => [
                asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            ],
            'styles' => [],
            'moduleId' => $this->moduleId,
            'config' => $config
        ];

        return view('MLMPlan.Binary.Views.adminConfig', $data);
    }

    /**
     * handle module activate
     */
    function activate()
    {
        parent::activate();
        $id = ConfigServer::getConfigId('plan_configuration', 'default_plan');
        $plan_config = [
            'meta_value' => $this->moduleId,
            'status' => 1,
        ];
        ConfigServer::saveConfigData($id, $plan_config);
    }

    /**
     * handle module activate
     */
    function deactivate()
    {
        parent::deactivate();
        $id = ConfigServer::getConfigId('plan_configuration', 'default_plan');
        $plan_config = [
            'meta_value' => 0,
            'status' => 0,
        ];
        ConfigServer::saveConfigData($id, $plan_config);
    }

    /**
     * @param UserRepo $sponsor
     * @param array $args
     * @return array
     */
    function getPlacement(UserRepo $sponsor, $args = [])
    {
        $config = $this->getModuleData(true);
        if ($config->get('placement_based_on') == 'left_right_most') {
            $childUser = UserRepo::where(['parent_id' => $sponsor->user_id, 'position' => $args['position']])->first();
            if ($childUser) return $this->getPlacement($childUser, $args);

            return [
                'parent_id' => $sponsor->user_id,
                'position' => (int)$args['position'],
                'user_level' => $sponsor->user_level + 1
            ];
        } else {
            $childUser = UserRepo::where(['parent_id' => $sponsor->user_id, 'position' => $args['position']])->get();
            switch ($childUser->count()) {
                case 0:
                    return ['parent_id' => $sponsor->user_id, 'position' => $args['position']];
                case 1:
                    $position = ($childUser[0]->position == 1) ? 2 : 1;
                    return ['parent_id' => $sponsor->user_id, 'position' => $position];
                case 2:
                    return $this->getPlacement($childUser, $args);
            }
        }
    }

    /**
     * @param User $user
     * @param array $args
     * @param $scope
     * @return void
     */
    function distributePoint(User $user, $pv, $scope)
    {
        /** @var BinaryServices $binaryServices */
        $binaryServices = app(BinaryServices::class);
        $plugins = app(Plugins::class);
        $config = $this->getModuleData(true);
        
        if ($config->get('upline_point_distribute')) {
            $point = $config->get('distribute_based_on') == 'downline_joining_count' ? 1 : $pv;
            $uplineUsers = $binaryServices->getAncestorsOf($user);
            $position = $user->repoData->position;
            foreach ($uplineUsers as $each) {
                $beneficiary = User::find($each->user_id);
                $binaryServices->addPoints($beneficiary, $point, $position, $user->id, $scope);
                $position = $each->position;
            }
        }
    }

    /**
     * @return Factory|View
     */
    function placementForm()
    {
        $data = [
            'scripts' => [
                asset('global/plugins/select2/js/select2.full.min.js'),
            ],
            'styles' => [
                asset('global/plugins/select2/css/select2.min.css'),
            ]
        ];

        return view('MLMPlan.Binary.Views.placementForm', $data);
    }

    /**
     * @param $id
     * @param BinaryServices $binaryServices
     * @return Factory|View
     */
    function toolTip($id, BinaryServices $binaryServices)
    {
        $data = $binaryServices->getPoints(collect([
            'userId' => $id,
            'fullStats' => true
        ]))->first();

        $data['moduleId'] = $this->moduleId;

        return view('MLMPlan.Binary.Views.toolTip', $data);
    }

    /**
     * System refresh
     */
    function systemRefresh()
    {
        registerFilter('dataTruncate', function ($data, $args) {
            BinaryPoint::truncate();
        }, 'systemRefresh');

        registerFilter('dataSeeding', function ($data, $args) {

        }, 'systemRefresh');
    }

    /**
     * @param User $user
     * @return int|mixed
     */
    function getPosition(User $user)
    {
        $selector = BinaryPositionSelector::find($user->repoData()->first()->default_binary_position);
        switch ($selector->slug) {
            case 'default_left':
                return 1;
                break;
            case 'default_right':
                return 2;
                break;
            case 'alternate_left_right':
                return app()->call([$this, 'getAlternatePosition'], ['user' => $user]);
                break;
            case 'weakest_leg':
                return app()->call([$this, 'getWeakestLeg'], ['user' => $user]);
                break;
        }
    }

    /**
     * @param User $user
     * @param UserServices $userServices
     * @return int
     */
    function getAlternatePosition(User $user, UserServices $userServices)
    {
        $referrals = $userServices->getUsers(collect([]), '', true, ['repoData'])
            ->whereHas('repoData', function ($query) use ($user) {
                /** @var Builder $query */
                $query->where('sponsor_id', $user->id);
            })->orderBy('created_at', 'desc');

        $position = 1;
        if ($referrals->count()) $position = ($referrals->first()->repoData->position == 1) ? 2 : 1;

        return $position;
    }

    /**
     * @param User $user
     * @param BinaryServices $binaryServices
     * @return int
     */
    function getWeakestLeg(User $user, BinaryServices $binaryServices)
    {
        $binaryPoints = $binaryServices->getPoints(collect([
            'userId' => $user ? $user->id : loggedId(),
            'fullStats' => true,
        ]))->first();

        return $binaryPoints->leftpoints >= $binaryPoints->rightpoints ? 2 : 1;
    }

    /**
     * @param User $user
     * @param $position
     * @return bool
     */
    function getAppendOrPrepend(User $user, $position)
    {
        $downlines = UserRepo::where('parent_id', $user->id);

        if ($downlines->count() && $position == 1) return true;

        return false;
    }
}
