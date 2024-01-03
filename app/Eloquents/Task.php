<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Eloquents\Task
 *
 * @property int $id
 * @property string $task_id
 * @property string $name
 * @property string|null $description
 * @property string|null $failed
 * @property string|null $success
 * @property array|null $data
 * @property string|null $started_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Task whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Task whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Task whereFailed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Task whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Task whereStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Task whereSuccess($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Task whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\Task whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Task extends Model
{
    protected $guarded = [];

    protected $casts = [
        'data' => 'array'
    ];
}