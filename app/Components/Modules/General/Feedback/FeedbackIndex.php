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

namespace App\Components\Modules\General\Feedback;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Components\Modules\General\Feedback\ModuleCore\Traits\Routes;
use App\Components\Modules\General\Feedback\ModuleCore\Traits\Hooks;

/**
 * Class FeedbackIndex
 * @package App\Components\Modules\General\Feedback
 */
class FeedbackIndex extends BasicContract
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
     * Handle admin settings
     *
     * @return mixed
     */
    function adminConfig()
    {
        $data = [];
        $data['scripts'] = [
            asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
            asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            asset('global/plugins/summernote/summernote.min.js')
        ];
        $data['styles'] = [
            asset('global/plugins/summernote/summernote.css')
        ];
        $data['id'] = $this->moduleId;
        $data['FeedbackData'] = [];

        if ($this->getModuleData()) $data['FeedbackData'] = $this->getModuleData();

        $data['FeedbackData']['data'] = [];

        return view('General.Feedback.Views.adminConfig', $data);
    }
}
