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

namespace App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents;

/**
 * Class UserRepo
 *
 * @package App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents
 * @property int $user_id
 * @property int $sponsor_id
 * @property int $parent_id
 * @property int $LHS
 * @property int $RHS
 * @property int $SLHS
 * @property int $SRHS
 * @property int $position
 * @property int $user_level
 * @property int $sp_user_level
 * @property int $status_id
 * @property int $package_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $expiry_date
 * @property string $default_binary_position
 * @property-read \Kalnoy\Nestedset\Collection|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo[] $children
 * @property-read int|null $children_count
 * @property-read \App\Eloquents\Package $package
 * @property-read \App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo $parent
 * @property-read \App\Eloquents\User $parentUser
 * @property-read \App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser $rank
 * @property-read \App\Eloquents\User $sponsorUser
 * @property-read \App\Eloquents\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRepo d()
 * @method static \App\Blueprint\Query\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo newModelQuery()
 * @method static \App\Blueprint\Query\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo newQuery()
 * @method static \App\Blueprint\Query\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo whereDefaultBinaryPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo whereExpiryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo whereLHS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo whereRHS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo whereSLHS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo whereSRHS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo whereSpUserLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo whereSponsorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\UserRepo whereUserLevel($value)
 * @mixin \Eloquent
 */
class UserRepo extends \App\Eloquents\UserRepo
{
    function rank()
    {

        return $this->hasOne(AdvancedRankUser::class, 'user_id', 'user_id');
    }
}