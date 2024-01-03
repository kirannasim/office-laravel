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
 * Class FaqCategory
 *
 * @package App\Components\Modules\General\Faq\ModuleCore\Eloquents
 * @property int $id
 * @property array|null $title
 * @property int|null $sort_order
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\Faq[] $faqs
 * @property-read int|null $faqs_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\FaqCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\FaqCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\FaqCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\FaqCategory query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\FaqCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\FaqCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\FaqCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\FaqCategory whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\FaqCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\FaqCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\FaqCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Faq\ModuleCore\Eloquents\FaqCategory withoutTrashed()
 * @mixin \Eloquent
 */
class FaqCategory extends Model
{

    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'faq_categories';


    protected $casts = [
        'title' => 'array'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function faqs()
    {
        return $this->hasMany(Faq::class, 'category')->orderBy('sort_order');
    }

}
