<?php
/**
 *  -------------------------------------------------
 *  Hybrid MLM  Copyright (c) 2018 All Rights Reserved
 *  -------------------------------------------------
 *
 *  @author Acemero Technologies Pvt Ltd
 *  @link https://www.acemero.com
 *  @see https://www.hybridmlm.io
 *  @version 1.00
 *  @api Laravel 5.4
 */

namespace App\Mail;

use App\Blueprint\Facades\MailServer;
use App\Blueprint\Facades\UserServer;
use App\Eloquents\Wallet;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


/**
 * Class WelcomeMail
 * @package App\Mail
 */
class WelcomeMail extends Mailable
{
    public $data;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param $options
     */
    public function __construct($options)
    {
        $data['user_data'] = UserServer::getProfileData($options['id']);
        $data['login_link'] = url('/') . '/user/login';
        $current_language = app('laravellocalization')->getCurrentLocale();
        $letter_body = getConfig('welcome_mail', $current_language);
        $data['letter_body'] = MailServer::ReplaceLetterBody($options['id'], $letter_body);
        $data['tran_password'] = decrypt(Wallet::where('user_id', $options['id'])->first()->transaction_password);
        $data['logo'] = logo();
        $data['message']= (object) array('image' => logo());

        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@getoncode.com')->markdown('emails.register.welcome', $this->data);
    }
}
