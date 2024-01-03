<?php
/**
 *  -------------------------------------------------
 *  RTCLab sp. z o.o.  Copyright (c) 2019 All Rights Reserved
 *  -------------------------------------------------
 *
 * @author Christopher Milkowski, Arthur Milkowski
 * @link https://www.livewebinar.com
 * @see https://www.livewebinar.com
 * @version 1.00
 * @api Laravel 5.4
 */

namespace App\Components\Modules\General\SoHo\Controllers;


use Auth;
use App\Components\Modules\General\SoHo\SoHoIndex as Module;
use App\Components\Modules\General\SoHo\ModuleCore\Traits\Validations;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Eloquents\Retortal;

/**
 * Class SoHoController
 * @package App\Components\Modules\General\SoHo\Controllers
 */
class SoHoController extends Controller
{
    use Validations;

    private $module;

    /**
     * __construct function
     */
    public function __construct()
    {
        parent::__construct();
        $this->module = app()->make(Module::class);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        session('theScope') ?: 'user';

        $moduleId = $this->module->moduleId;
        $moduleData = getModule($moduleId)->getModuleData(true);


        $data['title'] = _mt($moduleId, 'SoHo.soho');
        // $data['heading_text'] = _mt($this->module->moduleId, 'SoHo.soho');
        // $data['breadcrumbs'] = [
        //     _t('index.home') => 'user.home',
        //     _mt($this->module->moduleId, 'SoHo.soho') => $scope.'.soho'
        // ];
        $data['styles'] = array(
            asset('global/plugins/select2/css/select2.min.css'),
            asset('global/plugins/select2/css/select2-bootstrap.min.css'),
            $this->module->getCssPath() . 'style.css',
        );

        $data['scripts'] = [];
        $data['moduleId'] = $moduleId;
        $data['moduleData'] = $moduleData;


        $data['logged_id'] = loggedId();
        $data['soho_autologin_user'] = Retortal::getRetortalLoginUrl(Auth::user());

        return view('General.SoHo.Views.index', $data);
    }
}
