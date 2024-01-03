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
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MailTransaction
 *
 * @package App\Eloquents
 * @property int $id
 * @property int $mail_id
 * @property int $user_id
 * @property string $role
 * @property int $starred
 * @property int $is_read
 * @property int $tag
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Eloquents\Mail $mail
 * @property-read \App\Eloquents\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\MailTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\MailTransaction newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Eloquents\MailTransaction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\MailTransaction query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\MailTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\MailTransaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\MailTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\MailTransaction whereIsRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\MailTransaction whereMailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\MailTransaction whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\MailTransaction whereStarred($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\MailTransaction whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\MailTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\MailTransaction whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Eloquents\MailTransaction withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Eloquents\MailTransaction withoutTrashed()
 * @mixin \Eloquent
 */
class MailTransaction extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'mail_transaction';

    /**
     * Mail relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo eloquent relationship
     */
    function mail()
    {
        return $this->belongsTo(Mail::class);
    }

    /**
     * Mail relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo eloquent relationship
     */
    function user()
    {
        return $this->belongsTo(User::class);
    }
}
