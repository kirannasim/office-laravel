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

use App\Events\postMail;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/**
 * Class sendMailNortification
 * @package App\Listeners
 */
class SendMailNortification implements ShouldBroadcast
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
     * @param postMail $event
     * @return bool
     */
    public function handle(postMail $event)
    {
        return true;
    }

    /**broadcast the event
     * @return Channel
     */
    public function broadcastOn()
    {
        return new channel('testmail');
    }
}
