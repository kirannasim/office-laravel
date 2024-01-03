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
 * Class UserSubType
 *
 * @package App\Eloquents
 * @property int $id
 * @property string $title
 * @property int $user_type_id
 * @property array|null $privilege
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Eloquents\UserType $userType
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserSubType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserSubType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserSubType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserSubType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserSubType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserSubType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserSubType wherePrivilege($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserSubType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserSubType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserSubType whereUserTypeId($value)
 * @mixin \Eloquent
 */
class UserSubType extends Model
{
    protected $table = "user_sub_types";

    protected $guarded = [];

    protected $casts = [
        'privilege' => 'array'
    ];

    /**
     * User Type relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo [type] [description]
     */
    function userType()
    {
        return $this->belongsTo(UserType::class, 'user_type_id');
    }
}
