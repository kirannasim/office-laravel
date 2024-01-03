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

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class mailTemplate
 * @package App\Mail
 */
class MailTemplate extends Mailable
{
    public $data;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($options)
    {
        $this->data = $options;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $options = $this->data;

        $mailTemplate = $this->view('emails.mailTemplate');

         if(isset($this->data['from']))
        {
            $user = $this->data['from'];

            $name = (isset($user->metaData) && $user->metaData)?$user->metaData->firstname . " " . $user->metaData->lastname:$user->username;
            
            $mailTemplate->replyTo($user->email,$name);
        }
        // if($this->data['from'])
        // {
        //     // $mailTemplate->from($this->data['from']);
        // }
        // else
        // {
        //     // if ($from = getConfig('email', 'from'))
        //     // $mailTemplate->from($from);    
        // }
        
        if ($this->data['attachment']) {
            foreach ($this->data['attachment'] as $attachment) {
                $mailTemplate->attach($attachment);
            }
        }
        return $mailTemplate;
    }
}
