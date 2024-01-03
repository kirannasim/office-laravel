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

namespace App\Components\Modules\General\PaymentState\Controllers;

use App\Blueprint\Services\UserServices;
use App\Components\Modules\General\PaymentState\PaymentStateIndex as Module;
use App\Eloquents\User;
use App\Http\Controllers\Controller;
use App\Components\Modules\Payment\TransferWise\ModuleCore\Eloquents\TransferWiseTransaction;
use App\Mail\MailTemplate;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

/**
 * Class PaymentStateController
 * @package App\Components\Modules\General\PaymentState\Controllers
 */
class PaymentStateController extends Controller
{
    /**
     * PaymentStateController constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->module = app()->make(Module::class);
    }

    /**
     * @return Factory|View
     */
    function index()
    {
        $data = [
            'scripts' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.min.js'),
                asset('global/plugins/summernote/summernote.min.js'),
                asset('global/plugins/select2/js/select2.full.min.js'),
            ],
            'styles' => [
                asset('global/plugins/bootstrap-daterangepicker/daterangepicker.css'),
                asset('global/css/report-style.css'),
                asset('global/plugins/summernote/summernote.css'),
                asset('global/plugins/select2/css/select2.min.css'),
                asset('global/plugins/select2/css/select2-bootstrap.min.css'),
                $this->module->getCssPath('style.css'),
            ],
            'moduleId' => $this->module->moduleId,
            'title' => _mt($this->module->moduleId, 'PaymentState.email_broadcasting'),
            'heading_text' => _mt($this->module->moduleId, 'PaymentState.email_broadcasting'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _mt($this->module->moduleId, 'PaymentState.email_broadcasting') => getScope() . '.email.broadcast.index',
            ],
        ];

        return view('General.PaymentState.Views.userTableIndex', $data);
    }

    /**
     * @return Factory|View
     */
    function filters() 
    {
        $data = [
            'default_filter' => [
                'startDate' => User::min('created_at'),
                'endDate' => User::max('created_at')
            ],
            'moduleId' => $this->module->moduleId,
        ];

        return view('General.PaymentState.Views.Partials.filter', $data);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */

    function delete(Request $request){
        $data = $request->input('data');
        DB::table('transfer_transactions')->where('reference', $data)->delete();
        echo "success";
    }

    function paid(Request $request){
        $data = $request->input('data');
        $transactions = TransferWiseTransaction::all();
        echo json_encode($transactions);
    }

    function fetch(Request $request)
    {        
        $filters = $request->input('filters');

        $transactions = TransferWiseTransaction::all();
        $customer_id = array();

        foreach ($transactions as $key => $value) {
            array_push($customer_id, $value->reference);
        }

        $data = [
            'userData' => app()->call([$this, 'fetchUserData'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 10000)]),
            'moduleId' => $this->module->moduleId,
            'customer_id'=>$customer_id
        ];
        return view('General.PaymentState.Views.Partials.usersTable', $data);
    }

    public function fetchUserData(Collection $filters, UserServices $userServices, $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';

        return $userServices->getUsers($filters, null, true)
            ->when($email = $filters->get('email'), function ($query) use ($email) {
                /** @var Builder $query */
                $query->where('email', 'like', "%$email%");
            })
            ->when($userId = $filters->get('user_id'), function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('id', $userId);
            })
            ->when($filters->get('date'), function ($query) use ($filters) {
                /** @var Builder $query */
                $dates = explode(' - ', $filters->get('date'));
                $query->whereDate('created_at', '>=', $dates[0]);
                $query->whereDate('created_at', '<=', $dates[1]);
            })
            ->whereHas('metaData', function ($query) use ($filters) {
                /** @var Builder $query */
                if ($firstname = $filters->get('firstname')) $query->where('firstname', 'like', "%$firstname%");
                if ($lastname = $filters->get('lastname')) $query->where('lastname', 'like', "%$lastname%");
            })->{$method}($pages);
    }

    /**
     * @param Collection $filters
     * @param UserServices $userServices
     * @param null $pages
     * @param bool $showAll
     * @return mixed
     */
 

    /**
     * @param Request $request
     * @return Collection
     */
  
}