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
 * Class Mail
 *
 * @package App\Eloquents
 * @property int $id
 * @property string $subject
 * @property string $content
 * @property int $reply_to
 * @property int $status
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Eloquents\User[] $recipients
 * @property-read int|null $recipients_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Eloquents\Mail[] $replies
 * @property-read int|null $replies_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Eloquents\MailTransaction[] $transactions
 * @property-read int|null $transactions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Eloquents\User[] $users
 * @property-read int|null $users_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Mail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Mail newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Eloquents\Mail onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Mail query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Mail whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Mail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Mail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Mail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Mail whereReplyTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Mail whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Mail whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Mail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Eloquents\Mail withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Eloquents\Mail withoutTrashed()
 * @mixin \Eloquent
 */
class Mail extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'mail';

    /**
     * Replied users
     *
     * @return User|\Illuminate\Database\Eloquent\Collection|Model
     */
    function repliedUsers()
    {
        $users = [];
        $users[] = $this->mailOwner()->id;

        foreach ($this->replies()->get() as $reply) $users[] = $reply->mailOwner()->id;

        return User::find(array_unique($users));
    }

    /**
     * Mail owner
     *
     * @return mixed
     */
    function mailOwner()
    {
        return $this->users()->wherePivot('role', 'sender')->first();
    }

    /**
     * Users relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    function users()
    {
        return $this->belongsToMany(User::class, 'mail_transaction');
    }

    /**
     * Mail replies
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function replies()
    {
        return $this->hasMany(Mail::class, 'reply_to', 'id')->orderBy('created_at', 'ASC');
    }

    /**
     * User relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    function recipients()
    {
        return $this->users()->wherePivot('role', 'recipient');
    }

    /**
     * Check mail Starred
     *
     * @return boolean
     */
    function isStarred()
    {
        return $this->transactions()->where(array(['user_id', loggedId()], ['role', 'recipient'], ['starred', 1]))->exists();
    }

    /**
     * Mail transactions relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function transactions()
    {
        return $this->hasMany(MailTransaction::class);
    }
}
