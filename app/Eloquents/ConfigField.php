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
 * Class ConfigField
 *
 * @package App\Eloquents
 * @property int $id
 * @property string $field_type
 * @property string $link
 * @property string $field_name
 * @property array $placeholder
 * @property array $label
 * @property string $field_group
 * @property array $field_choices
 * @property array $field_validation
 * @property int $sort_order
 * @property array $conditional_rules
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Eloquents\ConfigFieldGroup $fieldGroup
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigField query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigField whereConditionalRules($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigField whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigField whereFieldChoices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigField whereFieldGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigField whereFieldName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigField whereFieldType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigField whereFieldValidation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigField whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigField whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigField whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigField wherePlaceholder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigField whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\ConfigField whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ConfigField extends Model
{
    protected $table = 'config_fields';

    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'field_choices' => 'array',
        'label' => 'array',
        'placeholder' => 'array',
        'field_validation' => 'array',
        'conditional_rules' => 'array'
    ];

    /**
     * Field relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function fieldGroup()
    {
        return $this->belongsTo(ConfigFieldGroup::class, 'field_group');
    }

    /**
     * Get current local title, Fallback to the default title if current local's title not exists
     *
     * @return array
     */
    public function getTitle()
    {
        $title = collect($this->label);

        return $title->get(currentLocal(), $title->get(defaultLocal(), 'No title'));
    }

    /**
     * Get current local title, Fallback to the default title if current local's title not exists
     *
     * @return array
     */
    public function getPlaceholder()
    {
        $placeholder = collect($this->placeholder);

        return $placeholder->get(currentLocal(), $placeholder->get(defaultLocal(), 'No title'));
    }
}
