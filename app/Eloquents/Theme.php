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
 * Class Theme
 *
 * @package App\Eloquents
 * @property int $id
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $layout
 * @property int $installed
 * @property int $active
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Theme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Theme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Theme query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Theme whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Theme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Theme whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Theme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Theme whereInstalled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Theme whereLayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Theme whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Theme whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Theme whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Theme extends Model
{
    /**
     * Mass Assignment exceptions
     * @var $guarded
     */
    protected $guarded = [];

    /**
     * Get Active Layout
     * @return Model Active theme model
     */
    static function activeLayout()
    {
        return static::activeTheme() ? static::activeTheme()->layout : false;
    }

    /**
     * Get Active Theme
     * @return Model Active theme model
     */
    static function activeTheme()
    {
        return static::where('active', true)->first();
    }

    /**
     * Set Them Active
     * @param null $slug
     * @return void Active theme model
     */
    static function setThemeActive($slug = null)
    {
        static::where(array(['active', true]))->update(['active' => false]);
        static::where('slug', $slug)->update(['active' => true]);
    }
}
