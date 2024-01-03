<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Attachment
 *
 * @package App\Eloquents
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property string $uri
 * @property string $context
 * @property string $type
 * @property string $mime
 * @property string $extension
 * @property float $size
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Attachment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Attachment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Attachment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Attachment whereContext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Attachment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Attachment whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Attachment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Attachment whereMime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Attachment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Attachment whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Attachment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Attachment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Attachment whereUri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Attachment whereUserId($value)
 * @mixin \Eloquent
 */
class Attachment extends Model
{
    protected $guarded = [];
}
