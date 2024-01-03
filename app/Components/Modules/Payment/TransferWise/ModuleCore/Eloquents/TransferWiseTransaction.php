<?php
namespace App\Components\Modules\Payment\TransferWise\ModuleCore\Eloquents;


use Illuminate\Database\Eloquent\Model;

/**
 * Class B2BPayTransaction
 * @package App\Components\Modules\Payment\B2BPay\Eloquents
 */
class TransferWiseTransaction extends Model
{
    protected $guarded = [];

    protected $casts = [
        'data' => 'array'
    ];

    protected $table = 'transfer_transactions';
}