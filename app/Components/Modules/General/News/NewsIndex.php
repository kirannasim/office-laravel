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

namespace App\Components\Modules\General\News;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Components\Modules\General\News\ModuleCore\Eloquents\News;
use App\Components\Modules\General\News\ModuleCore\Traits\Routes;
use App\Components\Modules\General\News\ModuleCore\Traits\Hooks;
use Carbon\Carbon;

/**
 * Class NewsIndex
 * @package App\Components\Modules\General\News
 */
class NewsIndex extends BasicContract
{
    use Routes, Hooks;

    /**
     * handle admin settings
     */


    /**
     * handle module installations
     * @return void
     */
    function install()
    {
        ModuleCore\Schema\Setup::install();
    }

    /**
     * handle module uninstallation
     */
    function uninstall()
    {
        ModuleCore\Schema\Setup::uninstall();
    }

    function dashboardNewsTile()
    {
        $data = [
            'moduleId' => $this->moduleId,
            'news' => News::take(5)->get(),
            'style' => $this->addCss('style.css'),
        ];

        return view('General.News.Views.Partials.dashboardNewsTile', $data);
    }


}
