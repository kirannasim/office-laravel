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

use App\Blueprint\Facades\ConfigServer;
use App\Blueprint\Facades\OrderServer;
use App\Blueprint\Facades\UserServer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class OrderMail
 * @package App\Mail
 */
class OrderMail extends Mailable
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
        $data['company_name'] = ConfigServer::getConfigData('company', 'company_name');
        $data['company_address'] = ConfigServer::getConfigData('company', 'company_address');
        $data['order'] = OrderServer::getOrderInfo($options['id']);
        $data['delivery_address'] = UserServer::getProfileData($data['order']->user_id)->address;
        $data['order_products'] = OrderServer::getOrderProductsInfo($data['order']->products);
        $data['order_id'] = $options['id'];
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@getoncode.com')->markdown('emails.orders.invoice', $this->data);
    }
}
