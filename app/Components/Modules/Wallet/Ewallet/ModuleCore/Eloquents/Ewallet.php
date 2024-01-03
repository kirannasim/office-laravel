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

namespace App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ewallet
 *
 * @package App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents
 * @property int $id
 * @property int $user_id
 * @property string $transaction_password
 * @property string|null $card_number
 * @property string|null $cvv
 * @property string|null $ip
 * @property int|null $ip_status
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents\Ewallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents\Ewallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents\Ewallet query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents\Ewallet whereCardNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents\Ewallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents\Ewallet whereCvv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents\Ewallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents\Ewallet whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents\Ewallet whereIpStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents\Ewallet whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents\Ewallet whereTransactionPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents\Ewallet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\Ewallet\ModuleCore\Eloquents\Ewallet whereUserId($value)
 * @mixin \Eloquent
 */
class Ewallet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'ewallet';
}