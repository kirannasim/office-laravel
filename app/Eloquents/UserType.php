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
 * Class UserType
 *
 * @package App\Eloquents
 * @property int $id
 * @property string $title
 * @property string $description
 * @property array $privilege
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Eloquents\UserSubType[] $subTypes
 * @property-read int|null $sub_types_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserType wherePrivilege($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserType extends Model
{
    protected $table = 'user_types';

    protected $guarded = [];

    protected $casts = [
        'privilege' => 'array'
    ];

    /**
     * User Type relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany [type] [description]
     */
    function subTypes()
    {
        return $this->hasMany(UserSubType::class, 'user_type_id');
    }

    /**
     * Get user-type ID of current scope
     *
     * @return mixed
     */
    static function currentScope()
    {
        return static::where('title', session('theScope'))->first();
    }

    /**
     * @param $title
     * @return mixed|null
     */
    static function titleToId($title)
    {
        return ($entry = static::where('title', $title)->first()) ? $entry->id : null;
    }

    /**
     * @param $id
     * @return mixed|null
     */
    static function idToTitle($id)
    {
        return ($entry = static::find($id)) ? $entry->id : null;
    }
}
