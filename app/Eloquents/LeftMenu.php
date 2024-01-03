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
 * Class LeftMenu
 *
 * @package App\Eloquents
 * @property int $id
 * @property mixed $label
 * @property string|null $link
 * @property int $parent_id
 * @property string $slug
 * @property int|null $sort_order
 * @property string|null $description
 * @property string|null $route
 * @property string|null $icon_font
 * @property string|null $icon_image
 * @property array|null $routeParams
 * @property int $protected
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\LeftMenu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\LeftMenu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\LeftMenu query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\LeftMenu whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\LeftMenu whereIconFont($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\LeftMenu whereIconImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\LeftMenu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\LeftMenu whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\LeftMenu whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\LeftMenu whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\LeftMenu whereProtected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\LeftMenu whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\LeftMenu whereRouteParams($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\LeftMenu whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\LeftMenu whereSortOrder($value)
 * @mixin \Eloquent
 */
class LeftMenu extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'label' => 'array',
        'routeParams' => 'array',
    ];

    /**
     * @param $value
     * @return int
     */
    function getParentIdAttribute($value)
    {
        return (int)$value;
    }

    /**
     * @param $value
     * @return int
     */
    function getIdAttribute($value)
    {
        return $this->dynamic ? $this->entity_id : $value;
    }

    /**
     * @param $label
     * @return mixed
     */
    function getLabelAttribute($label)
    {
        return is_string($label) ? json_decode($label) : $label;
    }

    /**
     * @return mixed
     */
    function getLabel()
    {
        $label = collect($this->label);

        return $label->get(currentLocal(), $label->get(defaultLocal(), 'No title'));
    }
}
