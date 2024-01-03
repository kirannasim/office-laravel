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

namespace App\Components\Modules\General\Faq\ModuleCore\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Faq
 *
 * @package App\Components\Modules\General\Faq\ModuleCore\Eloquents
 * @property int $id
 * @property array|null $title
 * @property array|null $content
 * @property int|null $category
 * @property int|null $sort_order
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Components\Modules\General\Faq\ModuleCore\Eloquents\FaqCategory|null $faqCategory
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\Faq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\Faq newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\Faq onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\Faq query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\Faq whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\Faq whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\Faq whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\Faq whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\Faq whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\Faq whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\Faq whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\Faq whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\Faq withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\Faq withoutTrashed()
 * @mixin \Eloquent
 */
class Faq extends Model
{

    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $casts = [
        'title' => 'array',
        'content' => 'array'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function faqCategory()
    {
        return $this->belongsTo(FaqCategory::class, 'category');
    }
}
