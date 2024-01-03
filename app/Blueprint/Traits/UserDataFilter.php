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

namespace App\Blueprint\Traits;

use App\Eloquents\User;
use App\Eloquents\UserRepo;
use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * Trait UserDataFilter
 * @package App\Blueprint\Traits
 */
trait UserDataFilter
{
    /**
     * Formats basic user table data prior to database insertion
     *
     * @param Collection $data request to be formatted.
     * @return array formatted basic data
     */
    function formatBasicData(Collection $data)
    {
        return collect($data->only($this->basicData()))->mapWithKeys(function ($item, $key) {
            switch ($key) {
                case 'password':
                    return [$key => bcrypt($item)];
                    break;    
                default:
                    return [$key => $item];
                    break;
            }
        })->all();
    }

    /**
     * Basic user table data
     *
     * @return array basic user data
     */
    function basicData()
    {
        return ['username', 'password', 'email', 'phone', 'customer_id', 'sponsor_id', 'expiry_date', 'package_id','signup_package'];
    }

    /**
     * Formats repo user table data prior to database insertion
     *
     * @param Collection $data request to be formatted.
     * @param User $user
     * @return array formatted basic data
     */
    function formatRepoData(Collection $data, User $user)
    {
        $data->put('sponsor_id', $sponsorId = idFromUsername($data->get('sponsor')));
        $data->put('placement_id', $placementId = idFromUsername($data->get('placement')));

        $position = defineFilter('positionFilter', $data->get('position'), 'Plan', $sponsorId);
        // if ($data->get('position'))
        //     $position = $data->get('position');
        // else
        //     $position = defineFilter('positionFilter', $data->get('position'), 'Plan', $sponsorId);

        $placementFilter = [
            'sponsor_id' => $sponsorId,
            'position' => $position,
            'placement_id' => $placementId,
        ];

        if ($data->get('placement') != null && $data->get('position') != null)
            $placement = ['parent_id' => $data->get('placement'), 'position' => $data->get('position')];
        else
        {
            $placement = defineFilter('placementFilter', [], 'Plan', $placementFilter);
        }

        $data->put('parent_id', $placement['parent_id']);
        $data->put('position', $placement['position']);
        $data->put('user_id', $user->id);
        $data->put('user_level',  $data->get('user_level') ? $data->get('user_level') : $placement['user_level']);
        $data->put('sp_user_level', UserRepo::where('user_id', $sponsorId)->first()->sp_user_level + 1);

        return $data->only($this->allowedRepoFields())->all();
    }

    /**
     * fields only those are permitted to the insert query
     *
     * @return array permitted fields array
     */
    function allowedRepoFields()
    {
        return array(
            'sponsor_id',
            'parent_id',
            'position',
            'user_level',
            'sp_user_level',
        );
    }

    /**
     * Formats repo user table data prior to database insertion
     *
     * @param Collection $data request to be formatted.
     * @return array formatted basic data
     */
    function formatMetaData(Collection $data)
    {
        return $data->only($this->allowedMetaFields())->all();
    }

    /**
     * Get Allowed Fields
     *
     * fields only those are permitted to the insert query
     * @return array permitted fields array
     */
    function allowedMetaFields()
    {
        return array(
            'firstname', 'lastname', 'dob',
            'gender', 'country_id', 'type_of_document', 'city', 'passport_no',
            'nationality', 'place_of_birth', 'date_of_passport_issuance', 'country_of_passport_issuance',
            'passport_expirition_date', 'street_name', 'house_no', 'postcode', 'address_country', 'additional_info',
        );
    }
}
