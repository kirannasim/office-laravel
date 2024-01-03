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
 * Class UserFeedback
 *
 * @package App\Components\Modules\General\Feedback\ModuleCore\Eloquents
 * @property int $id
 * @property int $user_id
 * @property int $form_id
 * @property array|null $options
 * @property int $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackForm $feedBckForm
 * @property-read \App\Components\Modules\General\Feedback\ModuleCore\Eloquents\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\UserFeedback newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\UserFeedback newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\UserFeedback onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\UserFeedback query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\UserFeedback whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\UserFeedback whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\UserFeedback whereFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\UserFeedback whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\UserFeedback whereOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\UserFeedback whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\UserFeedback whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\UserFeedback whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\UserFeedback withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Components\Modules\General\Feedback\ModuleCore\Eloquents\UserFeedback withoutTrashed()
 * @mixin \Eloquent
 */
class UserFeedback extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $guarded = [];

    protected $casts = [
        'options' => 'array'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function feedBckForm()
    {
        return $this->belongsTo(FeedbackForm::class, 'form_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function user()
    {
        return $this->belongsTo(User::class);
    }
}
