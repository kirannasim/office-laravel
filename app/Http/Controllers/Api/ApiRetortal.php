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

/**
 * Created by PhpStorm.
 * User: Hybrid MLM Software
 * Date: 7/31/2017
 * Time: 8:26 PM
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Eloquents\User;
use App\Eloquents\UserType;
use App\Eloquents\Retortal;

/**
 * Class ApiSystem
 * @package App\Http\Controllers\Api
 */
class ApiRetortal extends ApiAbstract
{
    /**
     * get cities of states
     *
     * @param array $params
     * @return JsonResponse
     */
    function getUserCounters(Request $request)
    {
        // check keys
        if (!$request->hasHeader(config('api.retortal.access_header_name')) || $request->headers->get(config('api.retortal.access_header_name')) !== config('api.retortal.access_secret')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $users = User::whereNull('deleted_at')->whereHas('role', function ($query) {
            /** @var Builder $query */
            $query->where('type_id', UserType::where('title', 'user')->withoutGlobalScopes()->first()->id);
        })->with('repoData.package');

        $retortal_packages_counters = [];

        $users->chunk(200, function ($users) use(&$retortal_packages_counters, $request) {
            foreach ($users as $user) {
                if (!$user->repoData || !$user->package) {
                    continue;
                }

                $retortal_package = Retortal::getRetortalPackageId($user->package->slug);

                if ($request->has('include') && $request->input('include') == 'emails') {
                    if (!isset($retortal_packages_counters['counters'])) {
                        $retortal_packages_counters['counters'] = [];
                    }
                    if (!isset($retortal_packages_counters['counters'][$retortal_package])) {
                        $retortal_packages_counters['counters'][$retortal_package] = 0;
                    }

                    if (!isset($retortal_packages_counters['emails'])) {
                        $retortal_packages_counters['emails'] = [];
                    }
                    if (!isset($retortal_packages_counters['emails'][$retortal_package])) {
                        $retortal_packages_counters['emails'][$retortal_package] = [];
                    }

                    $retortal_packages_counters['counters'][$retortal_package]++;
                    $retortal_packages_counters['emails'][$retortal_package][] = $user->email;
                } else {
                    if (!isset($retortal_packages_counters[$retortal_package])) {
                        $retortal_packages_counters[$retortal_package] = 0;
                    }

                    $retortal_packages_counters[$retortal_package]++;
                }
            }
        });

        return response()->json($retortal_packages_counters);
    }
}