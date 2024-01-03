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
 * Class FeedbackOption
 *
 * @package App\Components\Modules\General\Feedback\ModuleCore\Eloquents
 * @property int $id
 * @property int $form_id
 * @property string|null $feedback_option
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackForm $feedBckForm
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackOption newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackOption onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackOption query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackOption whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackOption whereFeedbackOption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackOption whereFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackOption whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackOption whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackOption withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackOption withoutTrashed()
 * @mixin \Eloquent
 */
class FeedbackOption extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function feedBckForm()
    {
        return $this->belongsTo(FeedbackForm::class, 'form_id');
    }

}
