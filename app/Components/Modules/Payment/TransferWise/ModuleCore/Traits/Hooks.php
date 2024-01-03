<?php

namespace App\Components\Modules\Payment\TransferWise\ModuleCore\Traits;

use App\Blueprint\Services\PaymentServices;
use App\Blueprint\Services\ExternalMailServices;
use App\Blueprint\Services\UserServices;
use App\Components\Modules\Payment\TransferWise\ModuleCore\Eloquents\TransferWiseTransaction;
use App\Eloquents\User;
/**
 * Trait Hooks
 * @package App\Components\Modules\Payment\B2BPay\Traits
 */
trait Hooks
{

    function hooks()
    {
        return app()->call([$this, 'registerHooks']);
    }

    public function registerHooks(PaymentServices $paymentServices,ExternalMailServices $mailservice,UserServices $userservice)
    {

        registerAction('prePaymentProcessAction', function ($request) use ($paymentServices) {
            /** @var Request $request */
            if ($request->input('gateway') != $this->moduleId)
                return;
            $paymentServices->setAuthorized(true);
        }, 'root', 10);

        registerAction('postAddUser',function($data) use ($mailservice){
            $data = json_decode(json_encode($data),true);
            if(isset($data['result']['transaction']) && $data['result']['transaction']['gateway'] == $this->moduleId)
            {
                $moduledata = app()->call([$this,'getmoduledata']);
                $moduledata['username'] = $data['result']['user']['customer_id'];

                $transferwise = TransferWiseTransaction::where('reference',$data['result']['user']['username'])->first();
                if($transferwise)
                {
                    $transaction = $transferwise->data;
                    $moduledata['payment'] = $transaction['orderData']['payment'];    
                }

                $mailservice->sendmailfortransfer($data['result']['user']['id'],$moduledata,$data['result']['transaction']['amount']);
            }
        });

        registerFilter('checkuser',function($user) use ($userservice){

            $transfer  = TransferWiseTransaction::where("reference",$user->customer_id)->first();

            if($transfer)
            {
                //$userinfo = User::find($user);
                
                $datetime = new \DateTime($transfer->created_at);
                
                $currenttime = new \DateTime('now');
                $diff = $currenttime->getTimestamp() - $datetime->getTimestamp();
                
                if($diff > 60*60*7*24)
                {
                    $profile = app()->call([$this,'getprofile']);
                    if(count($profile) == 0)
                    {
                        return false;
                    }

                    $transfers = app()->call([$this,'gettransfer'],[$datetime,$currenttime,$profile[1]['id']]);

                    foreach ($transfers as $key => $transferinfo) {
                        if($transferinfo['details']['reference'] == $transfer->reference)
                        {
                            $user->update(['expiry_date'=>'']);
                            $transfer->delete();
                            return false;
                        }
                    }

                    $user->update(['expiry_date'=>$datetime->format('Y-m-d')]);
                    
                    return 'deleted';
                }
            }
            else
            {
                return false;
            }
        });

    }


}