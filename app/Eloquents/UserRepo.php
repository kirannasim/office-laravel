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

use App\Blueprint\Query\Builder;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Kalnoy\Nestedset\NodeTrait;
use Kalnoy\Nestedset\QueryBuilder;

/**
 * Class UserRepo
 *
 * @package App\Eloquents
 * @property int $user_id
 * @property int $sponsor_id
 * @property int $parent_id
 * @property int $LHS
 * @property int $RHS
 * @property int $SLHS
 * @property int $SRHS
 * @property int $position
 * @property int $user_level
 * @property int $sp_user_level
 * @property int $status_id
 * @property int $package_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $expiry_date
 * @property string $default_binary_position
 * @property-read \Kalnoy\Nestedset\Collection|\App\Eloquents\UserRepo[] $children
 * @property-read int|null $children_count
 * @property-read \App\Eloquents\Package $package
 * @property-read \App\Eloquents\UserRepo $parent
 * @property-read \App\Eloquents\User $parentUser
 * @property-read \App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser $rank
 * @property-read \App\Eloquents\User $sponsorUser
 * @property-read \App\Eloquents\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRepo d()
 * @method static \App\Blueprint\Query\Builder|\App\Eloquents\UserRepo newModelQuery()
 * @method static \App\Blueprint\Query\Builder|\App\Eloquents\UserRepo newQuery()
 * @method static \App\Blueprint\Query\Builder|\App\Eloquents\UserRepo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRepo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRepo whereDefaultBinaryPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRepo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRepo whereExpiryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRepo whereLHS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRepo wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRepo whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRepo wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRepo whereRHS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRepo whereSLHS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRepo whereSRHS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRepo whereSpUserLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRepo whereSponsorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRepo whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRepo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRepo whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserRepo whereUserLevel($value)
 * @mixin \Eloquent
 */
class UserRepo extends Model
{
    use NodeTrait;

    protected static $prepend = false;
    public $incrementing = false;
    protected $table = 'user_repo';
    protected $primaryKey = 'user_id';

    // 'parent_id' column name
    protected $makeRoot = false;

    // 'lft' column name
    protected $parentColumn = 'parent_id';

    // 'rgt' column name
    protected $leftColumn = 'LHS';

    // guard attributes from mass-assignment
    protected $rightColumn = 'RHS';
    protected $guarded = [];

    /**
     * @param bool $prepend
     * @return UserRepo
     */
    public static function setPrepend($prepend)
    {
        static::$prepend = $prepend;

        return new static;
    }

    /**
     * Get left column name
     *
     * @return string
     */
    public function getLftName()
    {
        return $this->leftColumn;
    }

    /**
     * Get right column name
     *
     * @return string
     */
    public function getRgtName()
    {
        return $this->rightColumn;
    }

    /**
     * Get parent column name
     *
     * @return string
     */
    public function getParentIdName()
    {
        return $this->parentColumn;
    }

    /**
     * User Relation
     *
     * @return BelongsTo
     */
    function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Sponsor Relation
     *
     * @return BelongsTo
     */
    function sponsorUser()
    {
        return $this->belongsTo(User::class, 'sponsor_id');
    }

    /**
     * Sponsor Relation
     *
     * @return BelongsTo
     */
    function parentUser()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    /**
     * {@inheritdoc}
     *
     * @since 2.0
     */
    public function newEloquentBuilder($query)
    {
        return new Builder($query);
    }

    /**
     * Delete Node
     * @return void
     * @throws Exception
     */
    function deleteNode()
    {
        $parentId = $this->parent_id;
        $this->children()->update(['parent_id' => $parentId]);
    }

    /**
     * Set the value of model's parent id key.
     *
     * Behind the scenes node is appended to found parent node.
     *
     * @param int $value
     *
     * @throws Exception If parent node doesn't exists
     */
    public function setSponsorIdAttribute($value)
    {
        $this->makeRoot = false;

        $this->applySponsorHierarchy();

        if ($this->getParentId() == $value) return;

        if ($value) {
            $this->appendToNode($this->newScopedQuery()->findOrFail($value));
        } else {
            $this->makeRoot();
        }
        $this->callPendingAction();
    }

    /**
     * Set tree Hierarchy based on Sponsor
     *
     * @return $this
     */
    function applySponsorHierarchy()
    {
        $this->parentColumn = 'sponsor_id';
        $this->leftColumn = 'SLHS';
        $this->rightColumn = 'SRHS';

        return $this;
    }

    /**
     * Call pending action.
     */
    protected function callPendingAction()
    {
        $this->moved = false;

        if (!$this->pending && !$this->exists && $this->makeRoot) {
            $this->makeRoot();
        }

        if (!$this->pending) return;

        $method = 'action' . ucfirst(array_shift($this->pending));
        $parameters = $this->pending;

        $this->pending = null;

        $this->moved = call_user_func_array([$this, $method], $parameters);
    }

    /**
     * Set the value of model's parent id key.
     *
     * Behind the scenes node is appended to found parent node.
     *
     * @param int $value
     *
     * @throws Exception If parent node doesn't exists
     */
    public function setParentIdAttribute($value)
    {
        $this->resetHierarchy();

        if ($this->getParentId() == $value) return;

        if ($value)
            $this->appendOrPrependTo($this->newScopedQuery()->findOrFail($value), static::$prepend);
        else
            $this->makeRoot();


        $this->callPendingAction();
    }

    /**
     * Set tree Hierarchy based on placement
     *
     * @return model $this self model instance
     */
    function resetHierarchy()
    {
        $this->parentColumn = 'parent_id';
        $this->leftColumn = 'LHS';
        $this->rightColumn = 'RHS';

        return $this;
    }

    /**
     * Accessing descendants in genealogy or sponsor tree
     *
     * @param null $type
     * @param bool $andSelf
     * @return mixed
     */
    public function descendantsQuery($type = null, $andSelf = false)
    {
        switch ($type) {
            case 'placement':
                $this->resetHierarchy();
                break;
            case 'sponsor':
                $this->applySponsorHierarchy();
                break;
        }

        return $this->newQuery()->whereDescendantOf($this, 'and', false, $andSelf);
    }

    /**
     * @param $id
     * @param $type
     * @param $limit
     * @return mixed|\Illuminate\Database\Eloquent\Builder
     */
    public function ancestorsOfQuery($id, $type, $limit = null)
    {
        return $this->getAncestorsOf($id, $type, $limit, true);
    }

    /**
     * Accessing ancestors in genealogy or sponsor tree
     *
     * @param $id
     * @param $type
     * @param $limit
     * @param bool $returnQuery
     * @return UserRepo|\Illuminate\Database\Eloquent\Builder
     */
    protected function getAncestorsOf($id, $type, $limit = null, $returnQuery = false)
    {
        switch ($type) {
            case 'placement':
                $this->resetHierarchy();
                $key = 'LHS';
                break;
            case 'sponsor':
                $this->applySponsorHierarchy();
                $key = 'SLHS';
                break;
            default:
                return;
                break;
        }

        $tail = !$returnQuery ? 'get' : 'newQuery';

        if ($limit != null)
            return $this->whereAncestorOf($id)->orderBy($key, 'DESC')->limit($limit)->{$tail}();

        return $this->whereAncestorOf($id)->orderBy($key, 'DESC')->{$tail}();
    }

    /**
     * @return BelongsTo
     */
    function package()
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * @param bool $returnBuilder
     * @return UserRepo|\Illuminate\Database\Eloquent\Builder
     */
    function leftReferrals($returnBuilder = false)
    {
        /** @var UserRepo|QueryBuilder $children */
        $children = $this->children()->where('position', 1)->first() ?: new self();

        $builder = $this->descendants()->with('user.metaData')->where(function ($query) use ($children) {
            /** @var QueryBuilder $query */
            $query->where('user_id', $children->user_id)->orWhereDescendantOf($children);
        })->where('sponsor_id', $this->user_id);

        return $returnBuilder ? $builder : $builder->get();
    }

    /**
     * @param bool $returnBuilder
     * @return UserRepo|\Illuminate\Database\Eloquent\Builder
     */
    function rightReferrals($returnBuilder = false)
    {
        /** @var UserRepo|QueryBuilder $children */
        $children = $this->children()->where('position', 2)->first() ?: new self();

        $builder = $this->descendants()->with('user.metaData')->where(function ($query) use ($children) {
            /** @var QueryBuilder $query */
            $query->where('user_id', $children->user_id)->orWhereDescendantOf($children);
        })->where('sponsor_id', $this->user_id);

        return $returnBuilder ? $builder : $builder->get();
    }

    /**
     * Append or prepend a node to the parent.
     *
     * @param self $parent
     * @param bool $prepend
     *
     * @return bool
     */
    protected function actionAppendOrPrepend(self $parent, $prepend = false)
    {
        $parent->refreshNode();

        ($this->leftColumn == 'SLHS') ? $parent->applySponsorHierarchy() : $parent->resetHierarchy();

        $cut = $prepend ? $parent->getLft() + 1 : $parent->getRgt();

        if (!$this->insertAt($cut)) {
            return false;
        }

        $parent->refreshNode();

        return true;
    }

    /**
     * Accessing ancestors in genealogy or sponsor tree
     *
     * @param $id
     * @param $type
     * @param bool $returnQuery
     * @param bool $andSelf
     * @return UserRepo|\Illuminate\Database\Eloquent\Builder
     */
    protected function getDescendantsOf($id, $type, $returnQuery = false, $andSelf = false)
    {
        switch ($type) {
            case 'placement':
                $this->resetHierarchy();
                break;
            case 'sponsor':
                $this->applySponsorHierarchy();
                break;
            default:
                return;
                break;
        }

        $tail = !$returnQuery ? 'get' : 'newQuery';

        return $this->whereDescendantOf($id, 'and', false, $andSelf)->{$tail}();
    }

    /**
     * @return HasOne
     */
    function rank()
    {
        return $this->hasOne(AdvancedRankUser::class, 'user_id');
    }

    /**
     * Accessing ancestors in genealogy or sponsor tree
     *
     * @param $id
     * @param $type
     * @param bool $returnQuery
     * @param bool $andSelf
     * @return UserRepo|\Illuminate\Database\Eloquent\Builder
     */
    protected function exceptDownlines($id, $type, $returnQuery = false, $andSelf = false)
    {
        switch ($type) {
            case 'placement':
                $this->resetHierarchy();
                break;
            case 'sponsor':
                $this->applySponsorHierarchy();
                break;
            default:
                return;
                break;
        }

        $tail = !$returnQuery ? 'get' : 'newQuery';

        return $this->whereDescendantOf($id, 'and', true, $andSelf)->{$tail}();
    }

}