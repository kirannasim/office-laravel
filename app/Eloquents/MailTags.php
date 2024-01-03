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
 * Class MailTags
 *
 * @package App\Eloquents
 * @property int $id
 * @property string $tag
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\MailTags newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\MailTags newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\MailTags query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\MailTags whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\MailTags whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\MailTags whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\MailTags whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MailTags extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'mail_tags';
}
