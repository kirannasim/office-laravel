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

namespace App\Listeners;

use App\Eloquents\User;
use App\Events\PostRegistration;
use App\Mail\WelcomeMail;
use Mail;

/**
 * Class SendWelcomeMail
 * @package App\Listeners
 */
class SendWelcomeMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param PostRegistration $event
     * @return void
     */
    public function handle(PostRegistration $event): void
    {
        $data = ['id' => $event->user->id];
        Mail::to(User::find($data['id']))->send(new WelcomeMail($data));
    }
}
