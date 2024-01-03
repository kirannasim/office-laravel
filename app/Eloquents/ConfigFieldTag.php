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
 * Class ConfigFieldTag
 *
 * @package App\Eloquents
 * @property int $id
 * @property array $title
 * @property string $slug
 * @property array $description
 * @property int $editable
 * @property int $core
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Eloquents\ConfigFieldGroup[] $fieldGroups
 * @property-read int|null $field_groups_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldTag whereCore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldTag whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldTag whereEditable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldTag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldTag whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigFieldTag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ConfigFieldTag extends Model
{
    protected $table = 'config_field_tags';

    protected $guarded = [];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'array',
        'description' => 'array',
    ];

    /**
     * Field tag relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function fieldGroups()
    {
        return $this->hasMany(ConfigFieldGroup::class, 'tag_id')
            ->orderBy('sort_order', 'ASC');
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
}
