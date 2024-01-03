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

use Illuminate\Notifications\DatabaseNotification;

/**
 * Class Activity
 *
 * @package App\Eloquents
 * @property string $id
 * @property string $type
 * @property int $notifiable_id
 * @property string $notifiable_type
 * @property array $data
 * @property \Illuminate\Support\Carbon|null $read_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $notifiable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Notification whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Notification whereNotifiableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Notification whereNotifiableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Notification whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Notification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Notification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Notification extends DatabaseNotification
{

}
