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

use App\Blueprint\Traits\Model\Helpers;

/**
 * Class Package
 *
 * @package App\Eloquents
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property float $price
 * @property float $upgrade_price
 * @property float $pv
 * @property float $upgrade_pv
 * @property string $description
 * @property int $status
 * @property string $image
 * @property int $in_registration
 * @property int $in_upgrade
 * @property int $validity_in_month
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Package newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Package newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Package query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Package whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Package whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Package whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Package whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Package whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Package whereInRegistration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Package whereInUpgrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Package whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Package wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Package wherePv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Package whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Package whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Package whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Package whereUpgradePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Package whereUpgradePv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Package whereValidityInMonth($value)
 * @mixin \Eloquent
 */
class Package extends ProductAbstract
{
    use Helpers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
