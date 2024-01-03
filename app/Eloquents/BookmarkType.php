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
 * Class BookmarkType
 *
 * @package App\Eloquents
 * @property int $id
 * @property mixed $label
 * @property string $slug
 * @property string|null $description
 * @property string|null $view_component
 * @property string|null $icon_font
 * @property string|null $icon_image
 * @property int|null $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\BookmarkType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\BookmarkType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\BookmarkType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\BookmarkType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\BookmarkType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\BookmarkType whereIconFont($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\BookmarkType whereIconImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\BookmarkType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\BookmarkType whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\BookmarkType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\BookmarkType whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\BookmarkType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\BookmarkType whereViewComponent($value)
 * @mixin \Eloquent
 */
class BookmarkType extends Model
{
    protected $guarded = [];

    protected $casts = [
        'label' => 'array'
    ];

    /**
     * @param $label
     * @return mixed
     */
    function getLabelAttribute($label)
    {
        $label = collect(json_decode($label));

        return $label->get(currentLocal(), $label->get(defaultLocal(), 'No title'));
    }
}
