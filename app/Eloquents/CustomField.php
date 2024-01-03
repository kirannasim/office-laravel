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
 * Class CustomField
 *
 * @package App\Eloquents
 * @property int $id
 * @property string $meta_key
 * @property string $meta_value
 * @property string $group
 * @property int $fieldable_id
 * @property string $fieldable_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Eloquents\CustomField $fieldable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CustomField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CustomField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CustomField query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CustomField whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CustomField whereFieldableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CustomField whereFieldableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CustomField whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CustomField whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CustomField whereMetaKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CustomField whereMetaValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\CustomField whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CustomField extends Model
{
    protected $guarded = [];

    /**
     * User relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    function fieldable()
    {
        return $this->morphTo();
    }
}
