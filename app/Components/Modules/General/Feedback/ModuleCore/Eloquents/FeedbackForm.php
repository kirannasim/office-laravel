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

namespace App\Components\Modules\General\Feedback\ModuleCore\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FeedbackForm
 *
 * @package App\Components\Modules\General\Feedback\ModuleCore\Eloquents
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackOption[] $options
 * @property-read int|null $options_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackQuestion[] $questions
 * @property-read int|null $questions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\UserFeedback[] $userFeed
 * @property-read int|null $user_feed_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackForm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackForm newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackForm onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackForm query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackForm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackForm whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackForm whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackForm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackForm whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackForm whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackForm whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackForm withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackForm withoutTrashed()
 * @mixin \Eloquent
 */
class FeedbackForm extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function questions()
    {
        return $this->hasMany(FeedbackQuestion::class, 'form_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function options()
    {
        return $this->hasMany(FeedbackOption::class, 'form_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function userFeed()
    {
        return $this->hasMany(UserFeedback::class, 'form_id');
    }
}
