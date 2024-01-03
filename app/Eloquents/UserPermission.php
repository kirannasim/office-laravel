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
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class KycFields
 *
 * @package App\Components\Modules\General\Kyc\ModuleCore\Eloquents
 * @property int $id
 * @property int|null $user_id
 * @property string|null $title
 * @property string|null $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserPermission newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Eloquents\UserPermission onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserPermission query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserPermission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserPermission whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserPermission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserPermission whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserPermission whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserPermission whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserPermission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserPermission whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Eloquents\UserPermission withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Eloquents\UserPermission withoutTrashed()
 * @mixin \Eloquent
 */
class UserPermission extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $guarded = [];

}
