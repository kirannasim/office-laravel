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

namespace App\Components\Modules\MLMPlan\Binary\ModuleCore\Traits;

use App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint;
use App\Components\Modules\System\MLM\ModuleCore\Eloquents\PendingDistributionList;
use App\Eloquents\User;
use App\Eloquents\UserRepo;

/**
 * Trait Hooks
 * @package App\Components\Modules\MLMPlan\Binary\ModuleCore\Traits
 */
trait Hooks
{
    /**
     * Registers hooks
     *
     */
    function hooks()
    {
        registerFilter('placementFilter', function ($content, $sponsor_info) {
            if (!$content) return $this->getPlacement(UserRepo::find($sponsor_info['sponsor_id']), $sponsor_info);

            return $content;
        }, 'Plan', 0);



         registerFilter('positionFilter', function ($position, $sponsorInfo) {
             $moduleData = getModule('MLMPlan-Binary')->getModuleData();
             // if ($moduleData['position_selector'] == 'sponsor_choice' && getModule('General-DefaultBinaryPositionSelector')) 
                return $this->getPosition(User::find($sponsorInfo));

             //return 2;
         }, 'Plan', 0);

        registerFilter('registerFormPlacementInfo', function ($content) {
            $moduleData = getModule('MLMPlan-Binary')->getModuleData();
            if ($moduleData['position_selector'] == 'user_choice') return $content . $this->placementForm();

            return $content;
        });

        registerFilter('appendOrPrepend', function ($content, $repoData) {
            return $this->getAppendOrPrepend(User::find($repoData['parent_id']), $repoData['position']);
        }, 'placement', 0);

         registerAction('postRegistration', function ($data) {
             $pv = getPackageInfo($data->get('result')['user']->package_id)['pv'];
             $this->distributePoint(User::find($data->get('result')['user']->id), $pv, 'registration');
         }, 'registration', 2);

        registerAction('postPackageUpgrade', function ($data) {
            $user = User::find($data->get('result')['transaction']['payer']);
            if ($user->repoData) {
                $pv = getPackageInfo($user->package_id)['pv'];
                $this->distributePoint($user, $pv, 'upgrade');
            }
        }, 'package_upgrade', 0);

        registerAction('postAddToRepo', function ($data) {
            $user = $data['user'];

            PendingDistributionList::where('user_id', $user->id)
                ->where('status', false)
                ->get()->each(function ($entry) {
                    $pv = getPackageInfo($entry->user->package_id)['pv'];
                    $this->distributePoint($entry->user, $pv, $entry->scope);
                });
        }, 'holdingTank', 0);

        registerAction("expireuser",function($response){

            $user = $response['result']['user'];
            if($user)
            {
                app()->call([$this,'distributePoint'],['user'=>$user,'pv'=>50,'scope'=>'expire']);    
            }
        });


        registerFilter('toolTip', function ($content, $data) {
            return $content . app()->call([$this, 'toolTip'], ['id' => $data['userId']]);
        }, 'tree', 1);

        app()->call([$this, 'systemRefresh']);
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
}
