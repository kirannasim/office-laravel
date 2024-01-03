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

use App\Blueprint\Services\UserServices;
use App\Blueprint\Traits\Model\Helpers;
use App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentClient;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankAchievementHistory;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser;
use App\Components\Modules\Rank\BinaryRank\ModuleCore\Eloquents\BinaryRankUser;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Passport\Client;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Token;
use Traversable;

/**
 * App\Eloquents\User
 *
 * @property int $id
 * @property string $customer_id
 * @property string $username
 * @property string $email
 * @property int $status
 * @property string $password
 * @property string $phone
 * @property string|null $deleted_at
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|Client[] $clients
 * @property-read \Illuminate\Database\Eloquent\Collection|CustomField[] $customFields
 * @property-read \Illuminate\Database\Eloquent\Collection|InvestmentClient[] $investmentClients
 * @property-read \Illuminate\Database\Eloquent\Collection|MailTransaction[] $mailTransactions
 * @property-read \Illuminate\Database\Eloquent\Collection|Mail[] $mails
 * @property-read UserMeta $metaData
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read AdvancedRankUser $rank
 * @property-read UserRepo $repoData
 * @property-read UserRole $role
 * @property-read \Illuminate\Database\Eloquent\Collection|Token[] $tokens
 * @property-read \Illuminate\Database\Eloquent\Collection|Transaction[] $transactions
 * @property-read UserRole $userRoleData
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereCustomerId($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User wherePhone($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereStatus($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereUsername($value)
 * @mixin Eloquent
 * @property-read int|null $attachments_count
 * @property-read int|null $clients_count
 * @property-read int|null $investment_clients_count
 * @property-read int|null $mail_transactions_count
 * @property-read int|null $mails_count
 * @property-read int|null $notifications_count
 * @property-read int|null $tokens_count
 * @property-read int|null $transactions_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 */
class User extends Authenticatable
{
    use Notifiable, Helpers, HasApiTokens;

    protected $test = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return Model|null|static
     */
    static function adminUser()
    {
        return (new static)->whereHas('role', function ($query) {
            /** @var Builder $query */
            $query->where('type_id', UserType::where('title', 'admin')->withoutGlobalScopes()->first()->id);
        })->first();
    }

    /**
     * @return User
     */
    static function loggedUser()
    {
        return (new static())->find(loggedId());
    }

    /**
     * @return HasMany
     */
    function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    /**
     * User repository relation | insertion
     *
     * @param array $data
     * @param bool $prepend
     * @return mixed|UserRepo
     */
    function repoData($data = [], $prepend = false)
    {
        if (!$data)
            return $this->hasOne(UserRepo::class)->withDepth('level');
        else {
            UserRepo::setPrepend($prepend);
            return $this->repoData()->save(new UserRepo($data));
        }
    }

    /**
     * @return mixed
     */
    function parent()
    {
        return $this->repoData->parentUser ?: static::companyUser();
    }

    /**
     * @return Model|null|static
     */
    static function companyUser()
    {
        return (new static)->whereHas('role', function ($query) {
            /** @var Builder $query */
            $query->where('type_id', UserType::where('title', 'company')->withoutGlobalScopes()->first()->id);
        })->first();
    }

    /**
     * @return mixed
     */
    function sponsor()
    {
        return $this->repoData ? ($this->repoData->sponsorUser ?: static::companyUser()) : $this->userSponsor;
        //return $this->repoData->sponsorUser ?: static::companyUser();
    }

    /**
     * @return BelongsTo
     */
    function userSponsor()
    {
        return $this->belongsTo(User::class, 'sponsor_id', 'id');
    }

    /**
     * User meta relation
     *
     * @param array $data
     * @return mixed
     */
    function metaData($data = [])
    {
        return !$data ? $this->hasOne(UserMeta::class)
            : ($this->metaData()->save(new UserMeta($data)));
    }

    /**
     * User type relation
     *
     * @return mixed
     */
    function userType()
    {
        return $this->role->hasOne(UserType::class, 'id', 'type_id');
    }

    /**
     * User subtype relation
     *
     * @return mixed
     */
    function subType()
    {
        return $this->role->hasOne(UserSubType::class, 'id', 'sub_type_id');
    }

    /**
     * User role relation
     *
     * @return HasOne
     */
    function role()
    {
        return $this->hasOne(UserRole::class);
    }

    /**
     * User relationship
     *
     * @return HasMany
     */
    function mailTransactions()
    {
        return $this->hasMany(MailTransaction::class);
    }

    /**
     * Trashed mails relationship
     *
     * @return Mail
     */
    function trashedMails()
    {
        return $this->mails()->onlyTrashed();
    }

    /**
     * mails relationship
     *
     * @return BelongsToMany
     */
    function mails()
    {
        return $this->belongsToMany(Mail::class, 'mail_transaction');
    }

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * @param array $data
     * @return false|Model|HasOne
     */
    function userRoleData($data = [])
    {
        return !$data ? $this->hasOne(UserRole::class)
            : ($this->userRoleData()->firstOrCreate($data));
    }

    /**
     * Custom fields relationship
     *
     * @param array|null $data
     * @return array|MorphMany|Traversable
     */
    function customFields($data = null)
    {
        if (!$data)
            return $this->morphMany(CustomField::class, 'fieldable');

        return $this->customFields()->saveMany($data);
    }

    /**
     * Get user address
     *
     * @return string
     */
    function address()
    {
        return isset($this->metaData->address) ? $this->metaData->address : '';
    }

    /**
     * @return HasMany
     */
    function transactions()
    {
        return $this->hasMany(Transaction::class, 'payee')
            ->orWhere('payer', $this->id);
    }

    /**
     * Get user package
     *
     * @return mixed
     */
    function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

/**
     * Get user package
     *
     * @return mixed
     */
    function signupPackage()
    {
        return $this->belongsTo(Package::class, 'signup_package');
    }

    /**
     * @param array $options
     * @param string $relation
     * @param bool $andSelf
     * @return Builder|Collection|mixed
     */
    function descendants($options = [], $relation = 'placement', $andSelf = false)
    {
        /** @var Collection $repoKeys */
        $repoKeys = $this->repoData->descendantsQuery($relation, $andSelf)->pluck('user_id');
        /** @var UserServices $userServices */
        $userServices = app(UserServices::class);

        return $userServices->getUsers(collect($options), $this->whereIn('id', (array)$repoKeys->all()), true);
    }

    /**
     * The channels the user receives notification broadcasts on.
     *
     * @return string
     */
    public function receivesBroadcastNotificationsOn()
    {
        return 'user.' . hashId($this->id);
    }

    /**
     * @return HasOne
     */
    function rank()
    {
        return $this->hasOne(AdvancedRankUser::class);
    }

    /**
     * @return HasMany
     */
    function investmentClients()
    {
        return $this->hasMany(InvestmentClient::class, 'sponsor_id', 'id');
    }

    /**
     * @return HasMany
     */
    function rankHistory()
    {
        return $this->hasMany(AdvancedRankAchievementHistory::class, 'user_id', 'id');
    }
}