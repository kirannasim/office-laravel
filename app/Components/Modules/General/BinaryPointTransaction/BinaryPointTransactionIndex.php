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

namespace App\Components\Modules\General\BinaryPointTransaction;

use App\Blueprint\Interfaces\Module\MLMPlanModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Components\Modules\General\BinaryPointTransaction\ModuleCore\Traits\Hooks;
use App\Components\Modules\MLMPlan\Binary\ModuleCore\Services\BinaryServices;
use App\Components\Modules\General\BinaryPointTransaction\ModuleCore\Traits\Routes;
use Throwable;

/**
 * Class BinaryIndex
 * @package App\Components\Modules\MLMPlan\Binary
 */
class BinaryPointTransactionIndex extends BasicContract implements MLMPlanModuleInterface
{
    use Hooks, Routes;

    /**
     * @param $content
     * @return string
     */
    public function getPersonalizedSettingsMenu($content)
    {
        return $content .= '<div class="nav" data-target="binaryPoint">
                <i class="fa fa-cog"></i>' . _mt($this->moduleId, "BinaryPointTransaction.distribute_binary_point") . '  
            </div>';
    }

    /**
     * @param $user
     * @return string
     * @throws Throwable
     */
    public function getPersonalizedSettingsContent($user)
    {
        /** @var BinaryServices $binaryServices */
        $binaryServices = app(BinaryServices::class);
        $data = [
            'userId' => $user,
            'moduleId' => $this->moduleId,
            'binaryPoints' => $binaryServices->getPoints(collect([
                'fullStats' => true,
            ]))->first(),
        ];

        return view('General.BinaryPointTransaction.Views.personalizedSettingsContent', $data);
    }

    /**
     * @return string
     */
    function getConfigRoute()
    {

    }
}