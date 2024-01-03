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

namespace App\Blueprint\Services;

use App\Eloquents\User;
use App\Mail\MailTemplate;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Http\Request;


/**
 * Class MailServices
 * @package App\Blueprint\Services
 */
class ExternalMailServices
{

    /**
     * @param $options
     */
    function createMailData($options)
    {
        switch ($options['type']) {
            case 'registration':
                $this->sendRegistrationMail($options);
        }
    }

    function sendRegistrationMail($options)
    {
        $userData = User::with(['repoData', 'metaData'])->find($options['userId']);
        $data['user'] = $userData;
        $data['loginLink'] = route('user.login');
        $emailContent = getConfig('e-mail_templates', 'registration_confirmation');
        $emailContent = str_replace('{@firstname}', $userData->metaData->firstname, $emailContent);
        $emailContent = str_replace('{@lastname}', $userData->metaData->lastname, $emailContent);
        $emailContent = str_replace('{@loginlink}', '<a href = "' . route('user.login') . '">' . route('user.login') . '</a>', $emailContent);
        $emailContent = str_replace('{@companyname}', getConfig('company_information', 'company_name'), $emailContent);
        
        $data['emailContent'] = $emailContent;


        $mailData = collect(    
            [
                'recipient' => $options['userId'],
                'mailBody' => draw('Mail.register', $data),
                'attachment' => null,
            ]
        );



        try {
            $this->sendMail($mailData);
        } catch (Exception $e) {
            return true;
        }

    }

    function sendmailfortransfer($userid,$data,$amount)
    {
        $emailContent = "<p>You have successfully Registered with TransferWise. But currently you can use this account for 3 days before paying to this account.</p>";

        $emailContent .= '<p> Card Number : ' . $data['card_num'] . '</p>';
        $emailContent .= '<p>Bank Code : ' . $data['bank_code'] . '</p>';
        $emailContent .= '<p>Please note that you have to use ' . $data['username'] . ' as the reference';

        $user = User::find($userid);
        $data['emailContent'] = $emailContent;
        $data['user'] =  $user;
        $data['amount'] = $amount;

        $mailData = collect(    
            [
                'recipient' => $userid,
                'mailBody' => draw('Mail.transferwise_iban', $data),
                'attachment' => null,
            ]
        );

        if($data['payment'] == 'SWIFT')
        {
            $mailData = collect(    
                [
                    'recipient' => $userid,
                    'mailBody' => draw('Mail.transferwise', $data),
                    'attachment' => null,
                ]
            );    
        }
        
        

        try {
            $this->sendMail($mailData);
        } catch (Exception $e) {
            return true;
        }
    }

    /**
     * @param array $data
     */
    public function sendMail($data = [])
    {
        $isEmailServiceEnabled = getConfig('mail_configuration', 'e-mail_service');
        if ($isEmailServiceEnabled == 'no') return;

//        $data = collect(
//            [
//                'receipient' => 1,
//                'mailBody' => 'sssssssssssssssss',
//                'attachment' => [public_path('place_holder.png')],
//                'cc' => ['vipindas2682@gmail.com'],
//                'bcc' => ['vipindas2682@gmail.com'],
//            ]
//        );

        if (strpos($data->get('recipient'), '@', 0)) {
            $reciepient = $data->get('recipient');
        } else {
            $reciepient = User::find($data->get('recipient'));
        }

        $sendMail = Mail::to($reciepient);
        if ($cc = $data->get('cc'))
            $sendMail->cc($cc);
        if ($bcc = $data->get('bcc'))
            $sendMail->bcc($bcc);

       
        $sendMail->send(new MailTemplate($data));
    }

    function sendPasswordChangeMail($options)
    {
        $userData = User::with(['repoData', 'metaData'])->find($options['userId']);
        $data['user'] = $userData;
        $data['loginLink'] = route('user.login');
        $emailContent = getConfig('e-mail_templates', 'password_change');
        $emailContent = str_replace('{@firstname}', $userData->metaData->firstname, $emailContent);
        $emailContent = str_replace('{@lastname}', $userData->metaData->lastname, $emailContent);
        $emailContent = str_replace('{@loginlink}', '<a href = "' . route('user.login') . '">' . route('user.login') . '</a>', $emailContent);
        $emailContent = str_replace('{@companyname}', getConfig('company_information', 'company_name'), $emailContent);
        $data['emailContent'] = $emailContent;

        $mailData = collect(
            [
                'recipient' => $options['userId'],
                'mailBody' => draw('Mail.passwordChange', $data),
                'attachment' => null,
            ]
        );
        $this->sendMail($mailData);

    }

}
