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
 * Class Bookmark
 *
 * @package App\Eloquents
 * @property int $id
 * @property int|null $sort_order
 * @property int $type
 * @property string|null $entity_id
 * @property string $action
 * @property string|null $label
 * @property array $data
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Bookmark newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Bookmark newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Bookmark query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Bookmark whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Bookmark whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Bookmark whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Bookmark whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Bookmark whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Bookmark whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Bookmark whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Bookmark whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Bookmark whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Bookmark whereUserId($value)
 * @mixin \Eloquent
 */
class Bookmark extends Model
{
    protected $guarded = [];

    protected $casts = [
        'data' => 'array'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function getType()
    {
        return $this->belongsTo(BookmarkType::class, 'type');
    }
}
