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
 * Class FeedbackQuestion
 *
 * @package App\Components\Modules\General\Feedback\ModuleCore\Eloquents
 * @property int $id
 * @property int $form_id
 * @property string|null $question
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackForm $field
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackQuestion newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackQuestion onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackQuestion query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackQuestion whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackQuestion whereFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackQuestion whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackQuestion whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackQuestion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackQuestion withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackQuestion withoutTrashed()
 * @mixin \Eloquent
 */
class FeedbackQuestion extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function field()
    {
        return $this->belongsTo(FeedbackForm::class, 'form_id');
    }

}
