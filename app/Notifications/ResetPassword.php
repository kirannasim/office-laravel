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

namespace App\Notifications;

use App\Eloquents\User;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Class ResetPassword
 * @package App\Notifications
 */
class ResetPassword extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a notification instance.
     *
     * @param  string $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $userData = User::with(['repoData', 'metaData'])->find($notifiable->id);
        $data['user'] = $userData;
        $data['loginLink'] = route('user.login');
        $emailContent = getConfig('e-mail_templates', 'forget_password');
        $emailContent = str_replace('{@firstname}', $userData->metaData->firstname, $emailContent);
        $emailContent = str_replace('{@lastname}', $userData->metaData->lastname, $emailContent);
        $emailContent = str_replace('{@loginlink}', url(route(session('theScope') . '.password.reset', $this->token, false)), $emailContent);
        $emailContent = str_replace('{@companyname}', getConfig('company_information', 'company_name'), $emailContent);
        $data['emailContent'] = $emailContent;

        return (new MailMessage)
            ->view('Mail.passwordResetEmail',$data);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
