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

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use View;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $jsVars;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->defaultJsVariables();
    }

    /**
     * Initialize Default js Variables
     */
    public function defaultJsVariables(): void
    {
        $this->jsVars = [
            'baseUrl' => url(''),
            'userApi' => route('user.api'),
            'csrfToken' => csrf_token(),
            'attachmentEndpoint' => route('attachment.add'),
            'assetPath' => asset(''),
            'socketHost' => env('SOCKET_HOST', request()->getHost()),
            'taskOperationRoute' => route('admin.task.operation.view'),
            'taskRoute' => route('admin.task.view'),
        ];

        View::share('jsVariables', $this->jsVars);
    }
}
