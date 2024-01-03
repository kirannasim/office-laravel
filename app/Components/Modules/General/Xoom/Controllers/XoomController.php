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

namespace App\Components\Modules\General\Xoom\Controllers;

use App\Components\Modules\General\Xoom\Service\ABAPI;
use App\Components\Modules\General\Xoom\Service\XoomService;
use App\Components\Modules\General\Xoom\XoomIndex as Module;
use App\Components\Modules\General\Xoom\ModuleCore\Eloquents\XoomUser;
use App\Components\Modules\General\Xoom\ModuleCore\Traits\Validations;
use App\Eloquents\User;
use App\Eloquents\UserMeta;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class XoomController
 * @package App\Components\Modules\General\Xoom\Controllers
 */
class XoomController extends Controller
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

        // XOOM2API
        $xoomUser = XoomService::connect(
            XoomUser::where('user_id', loggedId())->first(),
            $request,
            auth()->user(),
            UserMeta::where('user_id', loggedId())->first(),
            $moduleData
        );

        $data['title'] = _mt($moduleId, 'Xoom.xoom');
        // $data['heading_text'] = _mt($this->module->moduleId, 'Xoom.xoom');
        // $data['breadcrumbs'] = [
        //     _t('index.home') => 'user.home',
        //     _mt($this->module->moduleId, 'Xoom.xoom') => $scope.'.xoom'
        // ];
        $data['styles'] = array(
            asset('global/plugins/select2/css/select2.min.css'),
            asset('global/plugins/select2/css/select2-bootstrap.min.css'),
            $this->module->getCssPath() . 'style.css',
        );

        $data['scripts'] = [];
        $data['moduleId'] = $moduleId;
        $data['moduleData'] = $moduleData;

        // TODO: checks if AT is working
//        dd($moduleData->get('packages_map')[auth()->user()->package->id]);
//        dd(ABAPI::getUserInfo($xoomUser->access_token));
//        dd(ABAPI::getAccount($xoomUser, $moduleData));


        $data['logged_id'] = loggedId();
        $data['xoom_autologin_token'] = base64_encode($xoomUser->access_token);

        return view('General.Xoom.Views.index', $data);
    }

    /**
     * xoom list
     *
     * @return Factory|View
     */
    public function xoomList()
    {
        $config = collect(getModule($this->module->moduleId)->getModuleData(true));

        $data = [
            'moduleId' => $this->module->moduleId,
            'xoom_users' => XoomUser::get(),
            'config' => $config,
        ];

        return view('General.Xoom.Views.Partials.xoomList', $data);
    }

    /**
     * @param Request $request
     * @throws Exception
     */
    public function authorizeXoom(Request $request)
    {
        $this->validate($request, ['id' => 'required']);

        $xoomUser = XoomUser::findOrFail($request->get('id'));

        if ($xoomUser) {
            XoomService::authorizeUser(
                $xoomUser,
                getModule($this->module->moduleId)->getModuleData(true),
                User::where('id', $xoomUser->user_id)->first()
            );
        }
    }

    /**
     * @return Factory|View
     */
    public function manageXoom()
    {
        $data = [
            'title' => _mt($this->module->moduleId, 'Xoom.xoom_management'),
            'heading_text' => _mt($this->module->moduleId, 'Xoom.xoom_management'),
            'breadcrumbs' => [
                _t('index.home') => getScope() . '.home',
                _mt($this->module->moduleId, 'Xoom.settings') => getScope() . '.home',
                _mt($this->module->moduleId, 'Xoom.xoom_management') => getScope() . '.xoom.manage'
            ],
            'styles' => array(
                $this->module->getCssPath() . 'style.css',
            ),
            'scripts' => [],

            'moduleId' => $this->module->moduleId
        ];

        return view('General.Xoom.Views.manageXoom', $data);
    }
}
