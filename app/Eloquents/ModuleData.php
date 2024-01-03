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

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ModuleData
 *
 * @package App\Eloquents
 * @property int $id
 * @property int $module_id
 * @property array $module_data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ModuleData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ModuleData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ModuleData query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ModuleData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ModuleData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ModuleData whereModuleData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ModuleData whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ModuleData whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ModuleData extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'module_data';

    protected $casts = [
        'module_data' => 'array'
    ];
}
