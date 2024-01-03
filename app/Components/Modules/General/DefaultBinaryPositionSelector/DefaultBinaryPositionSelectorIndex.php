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

namespace App\Components\Modules\General\DefaultBinaryPositionSelector;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Eloquents\BinaryPositionSelector;
use App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Traits\Hooks;
use App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Traits\Routes;
use App\Eloquents\User;
use Throwable;

/**
 * Class DefaultBinaryPositionSelectorIndex
 * @package App\Components\Modules\General\DefaultBinaryPositionSelector
 */
class DefaultBinaryPositionSelectorIndex extends BasicContract
{
    use Routes, Hooks;

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
     * @param $content
     * @return string
     */
    public function getPersonalizedSettingsMenu($content)
    {
        return $content .= '<div class="nav active" data-target="default_binary_position_selector">
                <i class="fa fa-sitemap"></i>' . _mt('General-DefaultBinaryPositionSelector', 'BinaryPositionSelector.binaryPosition') . '
            </div>';
    }

    /**
     * @return string
     * @throws Throwable
     */
    public function getPersonalizedSettingsContent($user)
    {
        $data['user_id'] = $user;
        $data['currentPosition'] = User::find($user)->repoData()->first()->default_binary_position;
        $data['binaryPositions'] = BinaryPositionSelector::get();
        return view('General.DefaultBinaryPositionSelector.Views.memberManagement', $data);
    }

    /**
     * @param $content
     * @return string
     */
    public function getAdminProfile($content)
    {
        return $content .= '<li class="ProfilemeuItem" data-action="default_binary_position_selector">
                                <a>
                                    <i class="fa fa-sitemap"></i> ' . _mt('General-DefaultBinaryPositionSelector', 'BinaryPositionSelector.binaryPosition') . '
                                </a>
                            </li>';
    }

    /**
     * @return string
     */
    public function getProfileContent()
    {
        $data['currentPosition'] = loggedUser()->repoData()->first()->default_binary_position;
        $data['binaryPositions'] = BinaryPositionSelector::get();
        return view('General.DefaultBinaryPositionSelector.Views.profile', $data);
    }

    /**
     * @return string
     * @throws Throwable
     */
    function binaryPositionSelector()
    {
        $data['currentPosition'] = loggedUser()->repoData()->first()->default_binary_position;
        $data['binaryPositions'] = BinaryPositionSelector::get();

        return view('General.DefaultBinaryPositionSelector.Views.dashBoardBinaryPosition', $data)->render();
    }
}