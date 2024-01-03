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

use App\Eloquents\Order;
use App\Eloquents\User;
use App\Events\postOrder;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;

/**
 * Class SendOrderMail
 * @package App\Listeners
 */
class SendOrderMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */


    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param postOrder $event
     * @return void
     */
    public function handle(postOrder $event)
    {
        $data = ['id' => $event->order_id];
        $user_id = order::find($event->order_id)->user_id;
        $user = User::find($user_id);
        Mail::to($user)->send(new OrderMail($data));
    }
}
