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

namespace App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Eloquents;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BinaryPositionSelector
 *
 * @package App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Eloquents
 * @property int $id
 * @property string $slug
 * @property string $title
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Eloquents\BinaryPositionSelector newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Eloquents\BinaryPositionSelector newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Eloquents\BinaryPositionSelector query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Eloquents\BinaryPositionSelector whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Eloquents\BinaryPositionSelector whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\DefaultBinaryPositionSelector\ModuleCore\Eloquents\BinaryPositionSelector whereTitle($value)
 * @mixin \Eloquent
 */
class BinaryPositionSelector extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}