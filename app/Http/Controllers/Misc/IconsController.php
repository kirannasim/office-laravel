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

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class IconsController
 * @package App\Http\Controllers\Misc
 */
class IconsController extends Controller
{
    /**
     * font icons
     *
     * @return Factory|View [type] [description]
     */

    function font()
    {
        return view('Misc.Icons.font');
    }

    /**
     * image icons
     *
     * @return Factory|View [type] [description]
     */

    function image()
    {
        return view('Misc.Icons.font');
    }
}
