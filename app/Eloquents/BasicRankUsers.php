<?php


namespace App\Eloquents;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Eloquents\BasicRankUsers
 *
 * @property-read \App\Eloquents\BasicRank $rank
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\BasicRankUsers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\BasicRankUsers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\BasicRankUsers query()
 * @mixin \Eloquent
 */
class BasicRankUsers extends Model
{
    protected $table = 'basic_rank_users';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function rank()
    {
        return $this->belongsTo(BasicRank::class, 'rank_id');
    }
}
