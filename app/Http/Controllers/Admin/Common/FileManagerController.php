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

namespace App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Controller;

/**
 * Class FileManagerController
 * @package App\Http\Controllers\Admin\Common
 */
class FileManagerController extends Controller
{
    /**
     *
     */
    function index()
    {
        include(app_path('Blueprint/Misc/Filemanager/dialog.php'));
    }
}
