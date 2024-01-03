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

namespace App\Components\Modules\General\News\ModuleCore\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class News
 *
 * @package App\Components\Modules\General\News\ModuleCore\Eloquents
 * @property int $id
 * @property array|null $title
 * @property array|null $content
 * @property string|null $dispatch_date
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\News\ModuleCore\Eloquents\News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\News\ModuleCore\Eloquents\News newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\News\ModuleCore\Eloquents\News onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\News\ModuleCore\Eloquents\News query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\News\ModuleCore\Eloquents\News whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\News\ModuleCore\Eloquents\News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\News\ModuleCore\Eloquents\News whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\News\ModuleCore\Eloquents\News whereDispatchDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\News\ModuleCore\Eloquents\News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\News\ModuleCore\Eloquents\News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\News\ModuleCore\Eloquents\News whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\News\ModuleCore\Eloquents\News withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\News\ModuleCore\Eloquents\News withoutTrashed()
 * @mixin \Eloquent
 */
class News extends Model
{

    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $casts = [
        'title' => 'array',
        'content' => 'array'
    ];

    protected $guarded = [];

    protected $table = 'news';
}
