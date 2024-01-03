<?php
namespace App\Components\Modules\Payment\SafeCharge\ModuleCore\Eloquents;


use Illuminate\Database\Eloquent\Model;

/**
 * Class B2BPayTransaction
 * @package App\Components\Modules\Payment\B2BPay\Eloquents
 */
class SafeChargeTransaction extends Model
{
    protected $guarded = [];

    protected $casts = [
        'data' => 'array'
    ];

    protected $table = 'SafeCharge_transactions';
}