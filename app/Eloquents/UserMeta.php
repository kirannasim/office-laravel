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

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Eloquents\UserMeta
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $lastname
 * @property string $dob
 * @property string $address
 * @property int $country_id
 * @property int $state_id
 * @property int $city_id
 * @property string $gender
 * @property string $type_of_document
 * @property int $passport_no
 * @property string $nationality
 * @property string $place_of_birth
 * @property string $date_of_passport_issuance
 * @property int $country_of_passport_issuance
 * @property string|null $passport_expirition_date
 * @property string $street_name
 * @property int $house_no
 * @property int $postcode
 * @property int $address_country
 * @property string|null $city
 * @property string|null $additional_info
 * @property string|null $bank_name
 * @property string|null $acc_number
 * @property int $pin
 * @property string $profile_pic
 * @property string $about_me
 * @property string $facebook
 * @property string $twitter
 * @property string $linked_in
 * @property string $google_plus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Country $country
 * @property-read Package $package
 * @property-read UserRole $role
 * @method static Builder|UserMeta whereAboutMe($value)
 * @method static Builder|UserMeta whereAccNumber($value)
 * @method static Builder|UserMeta whereAdditionalInfo($value)
 * @method static Builder|UserMeta whereAddress($value)
 * @method static Builder|UserMeta whereAddressCountry($value)
 * @method static Builder|UserMeta whereBankName($value)
 * @method static Builder|UserMeta whereCity($value)
 * @method static Builder|UserMeta whereCityId($value)
 * @method static Builder|UserMeta whereCountryId($value)
 * @method static Builder|UserMeta whereCountryOfPassportIssuance($value)
 * @method static Builder|UserMeta whereCreatedAt($value)
 * @method static Builder|UserMeta whereDateOfPassportIssuance($value)
 * @method static Builder|UserMeta whereDob($value)
 * @method static Builder|UserMeta whereFacebook($value)
 * @method static Builder|UserMeta whereGender($value)
 * @method static Builder|UserMeta whereGooglePlus($value)
 * @method static Builder|UserMeta whereHouseNo($value)
 * @method static Builder|UserMeta whereId($value)
 * @method static Builder|UserMeta whereLastname($value)
 * @method static Builder|UserMeta whereLinkedIn($value)
 * @method static Builder|UserMeta whereName($value)
 * @method static Builder|UserMeta whereNationality($value)
 * @method static Builder|UserMeta wherePassportExpiritionDate($value)
 * @method static Builder|UserMeta wherePassportNo($value)
 * @method static Builder|UserMeta wherePin($value)
 * @method static Builder|UserMeta wherePlaceOfBirth($value)
 * @method static Builder|UserMeta wherePostcode($value)
 * @method static Builder|UserMeta whereProfilePic($value)
 * @method static Builder|UserMeta whereStateId($value)
 * @method static Builder|UserMeta whereStreetName($value)
 * @method static Builder|UserMeta whereTwitter($value)
 * @method static Builder|UserMeta whereTypeOfDocument($value)
 * @method static Builder|UserMeta whereUpdatedAt($value)
 * @method static Builder|UserMeta whereUserId($value)
 * @mixin Eloquent
 * @property string $firstname
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserMeta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserMeta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserMeta query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\UserMeta whereFirstname($value)
 */
class UserMeta extends Model
{
    protected $guarded = [];

    protected $table = 'user_meta';

    /**
     * User ole description]
     * @return HasOne eloquent relation
     */
    public function role(): HasOne
    {
        return $this->hasOne(UserRole::class, 'user_id', 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * User ole description]
     * @return HasOne eloquent relation
     */
    public function country(): HasOne
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
}
