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

namespace App\Components\Modules\General\EazySignup\ModuleCore\Eloquents;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EasySignupHistory
 *
 * @package App\Components\Modules\General\EazySignup\ModuleCore\Eloquents
 * @property int $id
 * @property array|null $data
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\EazySignup\ModuleCore\Eloquents\EasySignupHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\EazySignup\ModuleCore\Eloquents\EasySignupHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\EazySignup\ModuleCore\Eloquents\EasySignupHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\EazySignup\ModuleCore\Eloquents\EasySignupHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\EazySignup\ModuleCore\Eloquents\EasySignupHistory whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\EazySignup\ModuleCore\Eloquents\EasySignupHistory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\EazySignup\ModuleCore\Eloquents\EasySignupHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\EazySignup\ModuleCore\Eloquents\EasySignupHistory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EasySignupHistory extends Model
{
    public $timestamps = true;

    protected $table = 'easy_signup_history';

    protected $guarded = [];

    protected $casts = [
        'data' => 'array'
    ];

}
