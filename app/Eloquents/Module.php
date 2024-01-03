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
 * Class Module
 *
 * @package App\Eloquents
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $installed
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Module newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Module newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Module query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Module whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Module whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Module whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Module whereInstalled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Module whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Module whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Module whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Module extends Model
{

    /**
     * Mass Assignment exceptions
     */
    protected $guarded = [];

    protected $casts = [
        'module_data' => 'array'
    ];

    /**
     * module configuration relation
     *
     * @param null $data
     * @return Model|\Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function config($data = null)
    {
        if (!$data)
            return $this->hasOne(ModuleData::class);

        return $this->config()->updateOrCreate(['module_id' => $this->id], $data);
    }
}
