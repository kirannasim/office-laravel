<?php

namespace App\Components\Modules\Payment\B2BPay\Controllers;

use App\Components\Modules\Payment\B2BPay\B2BPayIndex as Module;
use App\Components\Modules\Payment\B2BPay\ModuleCore\Eloquents\B2BPayHistory;
use App\Components\Modules\Payment\B2BPay\ModuleCore\Eloquents\B2BPayTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class B2BPayController
 * @package App\Components\Modules\Payment\B2BPay\Controllers
 */
class B2BPayController extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->module = app()->make(Module::class);
    }


    function test()
    {
        $token = callModule($this->module->moduleId, 'getToken');
        callModule($this->module->moduleId, 'getpayment', ['token' => $token]);
    }


    /**
     * @return string
     * @throws \Throwable
     */
    function Success()
    {
        $plugins = app(Plugins::class);
        
        $data = [
            'moduleId' => $this->module->moduleId
        ];
        return view('Payment.B2BPay.Views.success', $data)->render();
    }


    /**
     * @return string
     * @throws \Throwable
     */
    function Cancel()
    {
        $data = [
            'moduleId' => $this->module->moduleId
        ];
        return view('Payment.B2BPay.Views.cancel', $data)->render();
    }


    function callBack(Request $request)
    {

        B2BPayHistory::create([
            'getParams' => $_GET,
            'postParams' => $_POST,
        ]);

        DB::transaction(function () use ($request) {
            $address = $request->input('address');
//        $address = '5e2697a10ee97fc79250f8c5b804390e8da280b4cf06e';
            $b2bTransactions = B2BPayTransaction::where('address', $address)->first();

            if (!$b2bTransactions->status && $request->input('status') == 1 && $request->input('tracking_id') == $b2bTransactions->local_txn_id) {
                $callback = new $b2bTransactions->callback;
                $order = app()->call([$callback, 'success'], ['response' => $b2bTransactions->data]);
                B2BPayTransaction::where('address', $address)->update(['status' => 1]);
            }

        });
    }
}