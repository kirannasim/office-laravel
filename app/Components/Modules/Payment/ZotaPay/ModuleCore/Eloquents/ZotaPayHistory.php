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

namespace App\Components\Modules\Payment\ZotaPay\ModuleCore\Eloquents;


/**
 * Class B2BPayHistory
 * @package App\Components\Modules\Payment\B2BPay\Eloquents
 */
class ZotaPayHistory extends \App\Eloquents\User
{

    protected $guarded = [];

    protected $casts = [
        'getParams' => 'array',
        'postParams' => 'array'
    ];

    protected $table = 'zota_history';


}
