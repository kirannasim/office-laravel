<?php
namespace App\Components\Modules\Payment\ZotaPay\ModuleCore\Eloquents;


use Illuminate\Database\Eloquent\Model;

/**
 * Class B2BPayTransaction
 * @package App\Components\Modules\Payment\B2BPay\Eloquents
 */
class ZotaPayTransaction extends Model
{
    protected $guarded = [];

    protected $casts = [
        'data' => 'array'
    ];

    protected $table = 'zota_transactions';
}