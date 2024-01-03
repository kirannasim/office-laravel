<?php
namespace App\Components\Modules\Payment\Genome\ModuleCore\Eloquents;


use Illuminate\Database\Eloquent\Model;

/**
 * Class B2BPayTransaction
 * @package App\Components\Modules\Payment\B2BPay\Eloquents
 */
class GenomeTransaction extends Model
{
    protected $guarded = [];

    protected $casts = [
        'data' => 'array'
    ];

    protected $table = 'Genome_transactions';
}