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
 * Class UserRole
 *
 * @package App\Eloquents
 * @property int $user_id
 * @property int $type_id
 * @property int $sub_type_id
 * @property-read \App\Eloquents\User $userData
 * @property-read \App\Eloquents\UserSubType $userSubtype
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRole whereSubTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRole whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRole whereUserId($value)
 * @mixin \Eloquent
 */
class UserRole extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'user_roles';
    protected $primaryKey = 'user_id';

    protected static function boot()
    {
        parent::boot();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function userData()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function userSubtype()
    {
        return $this->belongsTo(UserSubType::class, 'sub_type_id');
    }
}
