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
 * Class ConfigFieldGroup
 *
 * @package App\Eloquents
 * @property int $id
 * @property int|null $parent
 * @property array $title
 * @property string $slug
 * @property array $description
 * @property string|null $iconFont
 * @property string|null $image
 * @property array|null $style
 * @property int|null $tag_id
 * @property int $sort_order
 * @property int $core
 * @property int $editable
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Eloquents\ConfigFieldGroup[] $children
 * @property-read int|null $children_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Eloquents\ConfigField[] $fields
 * @property-read int|null $fields_count
 * @property-read \App\Eloquents\ConfigFieldGroup|null $parentGroup
 * @property-read \App\Eloquents\ConfigFieldTag|null $tag
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldGroup whereCore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldGroup whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldGroup whereEditable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldGroup whereIconFont($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldGroup whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldGroup whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldGroup whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldGroup whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldGroup whereStyle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldGroup whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldGroup whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ConfigFieldGroup extends Model
{
    protected $table = 'config_field_groups';

    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'style' => 'array',
    ];

    /**
     * Field relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function fields()
    {
        return $this->hasMany(ConfigField::class, 'field_group')
            ->orderBy('sort_order', 'ASC');
    }

    /**
     * Field tag relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function tag()
    {
        return $this->belongsTo(ConfigFieldTag::class, 'tag_id');
    }

    /**
     * Get current local title, Fallback to the default title if current local's title not exists
     *
     * @return array
     */
    public function getTitle()
    {
        $title = collect($this->title);

        return $title->get(currentLocal(), $title->get(defaultLocal(), 'No title'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function children()
    {
        return $this->hasMany(get_class($this), 'parent');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function parentGroup()
    {
        return $this->belongsTo(get_class($this), 'parent');
    }
}
