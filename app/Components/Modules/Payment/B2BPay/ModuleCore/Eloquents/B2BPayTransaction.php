<?php
namespace App\Components\Modules\Payment\B2BPay\ModuleCore\Eloquents;


use Illuminate\Database\Eloquent\Model;

/**
 * Class B2BPayTransaction
 * @package App\Components\Modules\Payment\B2BPay\Eloquents
 */
class B2BPayTransaction extends Model
{
    protected $guarded = [];

    protected $casts = [
        'data' => 'array'
    ];

    protected $table = 'b2b_transactions';
}