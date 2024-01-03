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

namespace App\Components\Modules\General\BinaryPointTransaction\ModuleCore\Traits;

/**
 * Trait Hooks
 * @package App\Components\Modules\General\BinaryPointTransaction\ModuleCore\Traits
 */
trait Hooks
{
    /**
     * Registers hooks
     *
     */
    function hooks()
    {
        /** Personalised setting option */
        registerFilter('personalizedSettingsMenu', function ($content) {
            return $this->getPersonalizedSettingsMenu($content);
        }, 'memberManagement', 2);

        registerFilter('personalizedSettingsContent', function ($content, $user) {
            return $content . $this->getPersonalizedSettingsContent($user);
        }, 'memberManagement', 2);

        app()->call([$this, 'systemReset']);
    }

    /**
     * System refresh
     */
    function systemReset()
    {
        registerFilter('dataTruncate', function ($data, $args) {

        }, 'systemReset');

        registerFilter('dataSeeding', function ($data, $args) {

        }, 'systemReset');
    }
}