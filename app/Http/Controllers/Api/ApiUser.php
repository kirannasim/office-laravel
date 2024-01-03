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

namespace App\Http\Controllers\Api;

use App\Blueprint\Services\UserServices;
use App\Eloquents\Country;
use App\Eloquents\HoldingUsers;
use App\Eloquents\User;
use App\Eloquents\UserRepo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

/**
 * Class ApiUser
 * @package App\Http\Controllers\Api
 */
class ApiUser extends ApiAbstract
{
    /**
     * Verify sponsor name
     *
     * @param array $param sponsor details
     * @param UserServices $userServices
     * @return JsonResponse
     */
    function verifySponsor($param, UserServices $userServices)
    {
        $sponsor = isset($param['sponsor']) ? $param['sponsor'] : '';

        if ($userServices->verifySponsor($sponsor)) {
            $user = getUser($param['sponsor']);
            $name = $user->metaData->firstname . ' ' . $user->metaData->lastname;
            return response()->json(['status' => true, 'name' => $name]);
        }

        return response()->json(['message' => _t('register.sponsor_not_exist')], 422);
    }

    /**
     * Verify  Username
     *
     * @param array $param sponsor details
     * @param UserServices $userServices
     * @return JsonResponse
     */
    function verifyUsername($param, UserServices $userServices)
    {
        $username = isset($param['username']) ? $param['username'] : '';

        if (!$userServices->verifyUsername($username)) {
            return response()->json(['status' => true]);
        }

        return response()->json(['message' => _t('register.username_not_exist')], 422);
    }

    /**
     * Verify  Email
     *
     * @param array $param sponsor details
     * @param UserServices $userServices
     * @return JsonResponse
     */
    function verifyEmail($param, UserServices $userServices)
    {
        $email = isset($param['email']) ? $param['email'] : '';

        if ($userServices->verifyEmail($email)) {
            return response()->json(['status' => true]);
        }

        return response()->json(['message' => _t('register.email_not_exist')], 422);
    }

    /**
     * Get Users
     *
     * @param array $param
     * @return JsonResponse
     */
    function getUsers($param)
    {
        $param = collect($param);
        $keyword = $param->get('keyword', '');
        $limit = $param->get('limit');
        $deepSearch = $param->get('deepSearch');
        $level = $param->get('level');
        $model = User::query();


        switch ($downlineRelation = $param->get('downlineRelation')) {
            case 'sponsor':
                $model = ($parent = $param->get('parent', loggedId())) ? User::find($parent)->descendants($param->get('filters', []), $downlineRelation) : $model;
                break;
            case 'placement':
                $model = ($parent = $param->get('parent', loggedId())) ? User::find($parent)->descendants($param->get('filters', []), $downlineRelation) : $model;
                break;
            case 'referral':
                $userServices = app(UserServices::class);
                /** @var UserServices $userServices */
                $model = ($parent = $param->get('parent', loggedId())) ? ($userServices->getUsers(collect([]), '', true)
                    ->whereHas('repoData', function ($query) use ($parent) {
                        /** @var Builder $query */
                        $query->where('sponsor_id', $parent);
                    })) : $model;
                break;
            default:
                break;
        }

        $data = $model->with('metaData')
            ->where(function ($query) use ($deepSearch, $keyword) {
                /** @var Builder $query */
                if ($deepSearch) {
                    $query->whereRaw('concat(username," ",email," ",phone) LIKE ?', "%{$keyword}%")
                        ->orWhere(function ($query) use ($keyword) {
                            /** @var Builder $query */
                            $query->whereHas('metaData', function ($query) use ($keyword) {
                                /** @var Builder $query */
                                $query->whereRaw('concat(firstname," ",lastname," ",dob," ",pin) LIKE ?', "%{$keyword}%");
                            });
                        });
                } else
                    $query->where('username', 'like', "%{$keyword}%");
            })
            ->when($limit, function ($query) use ($limit) {
                /** @var Builder $query */
                return $query->limit($limit);
            })->get();

        if ($param->get('includeSponsor')) $data->push(loggedUser()->sponsor());
        if ($param->get('includeSelf')) $data->push(loggedUser());

        return response()->json($data);
    }

    /**
     * @param $param
     * @return JsonResponse
     */
    function getMembersId($param)
    {
        $param = collect($param);
        $data = User::where('customer_id', 'like', "%{$param->get('keyword', '')}%")->get();

        return response()->json($data);
    }

    /**
     * @param $param
     * @return JsonResponse
     */
    function getSponsorNodes($param){

        $user    = getUser($param['username']);
        $descendants =  UserRepo::where('user_id','=',$user->id)->first()->descendantsAndSelf($user->id)->pluck('user_id');
        $parents =  User::whereIn('id',$descendants)->get()->pluck('username','id');
        return response()->json($parents);
    }

    function getSponsors($param){
        $param = collect($param);
        $keyword = $param->get('keyword');
        $sponsor_ids = array_column(UserRepo::select('sponsor_id')->groupBy('sponsor_id')->get()->toArray(),'sponsor_id');
        $data = User::whereIn('id',$sponsor_ids)->where('username', 'LIKE',"%$keyword%")->get();
        return response()->json($data);
    }

    function getCountries($param){
        $param = collect($param);
        $keyword = $param->get('keyword');
        $countries = Country::where('name','LIKE',"%$keyword%")->get()->toArray();
        return response()->json($countries);
    }
}
