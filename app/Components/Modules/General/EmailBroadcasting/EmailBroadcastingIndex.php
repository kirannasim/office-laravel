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

namespace App\Components\Modules\General\EmailBroadcasting;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Components\Modules\General\EmailBroadcasting\ModuleCore\Traits\Hooks;
use App\Components\Modules\General\EmailBroadcasting\ModuleCore\Traits\Routes;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class EmailBroadcastingIndex
 * @package App\Components\Modules\General\EmailBroadcasting
 */
class EmailBroadcastingIndex extends BasicContract
{
    use Routes, Hooks;

    /**
     * @param array $data
     * @return Factory|View|mixed
     */
    function adminConfig($data = [])
    {
        $config = collect([]);
        if ($this->getModuleData()) $config = $this->getModuleData(true);

        $data = [
            'styles' => [],
            'scripts' => [],
            'moduleId' => $this->moduleId,
            'config' => $config,
            'imagePath' => $this->getAssetsPath('images'),
        ];

        return view('General.EmailBroadcasting.Views.adminConfig', $data);
    }

    /**
     * @return array
     */
    function moduleDataValidationRules()
    {
        return [
            'module_data.mailserver' => 'required',
            'module_data.smtp_authentication' => 'required',
            'module_data.smtp_host' => 'required',
            'module_data.smtp_port' => 'required',
            'module_data.smtp_username' => 'required',
            'module_data.smtp_password' => 'required',
        ];
    }

    /**
     * @return array
     */
    function moduleDataValidationAttributes()
    {
        return [
            'module_data.mailserver' => 'Mail server',
            'module_data.smtp_authentication' => 'SMTP authentication',
            'module_data.smtp_host' => 'SMTP host',
            'module_data.smtp_port' => 'SMTP port',
            'module_data.smtp_username' => 'SMTP username',
            'module_data.smtp_password' => 'SMTP password',
        ];
    }
}