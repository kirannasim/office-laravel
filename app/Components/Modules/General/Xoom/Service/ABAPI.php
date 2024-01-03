<?php
/**
 *  -------------------------------------------------
 *  RTCLab sp. z o.o.  Copyright (c) 2019 All Rights Reserved
 *  -------------------------------------------------
 *
 * @author Christopher Milkowski, Arthur Milkowski
 * @link https://www.livewebinar.com
 * @see https://www.livewebinar.com
 * @version 1.00
 * @api Laravel 5.4
 */

namespace App\Components\Modules\General\Xoom\Service;

use App\Components\Modules\General\Xoom\ModuleCore\Eloquents\XoomUser;
use App\Eloquents\User;
use App\Eloquents\UserMeta;
use GeoIP;
use GuzzleHttp\Client;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Cache;
use Log;

class ABAPI
{
    /**
     * @var string
     */
    private static $API_ENDPOINT = 'https://api.archiebot.com/api';

    /**
     * @var string
     */
    private static $API_HEADER = 'application/vnd.archiebot.v1+json';

    /**
     * @var bool
     */
    private static $API_VERIFY_SSL = false;

    /**
     * @var int
     */
    private static $CACHE_TIME_APPLICATION_ACCESS_TOKEN = 60; // min

    /**
     * @param string $email
     * @param string $password
     * @param Collection $moduleData
     * @return mixed
     */
    public static function getUserAccessToken(string $email, string $password, Collection $moduleData)
    {
        $options = [
            'headers' => [
                'Accept' => self::$API_HEADER,
            ],
            'verify' => self::$API_VERIFY_SSL,
            'http_errors' => false,
        ];

        try {
            $client = new Client($options);
            $response = $client->post(self::$API_ENDPOINT . '/auth/login', [
                'query' => [
                    'identifier' => $moduleData->get('XOOM_API_ENTERPRISE_IDENTIFIER'),
                    'email' => $email,
                    'password' => $password,
                ],
            ]);
        } catch (Exception $e) {
            //TODO: exception !!!
            Log::debug('Error: ' . $e->getMessage());
        }

        return json_decode($response->getBody(), true)['token'];
    }

    /**
     * @param Collection $moduleData
     * @return mixed
     */
    public static function getApplicationAccessToken(Collection $moduleData)
    {
        $getApplicationAccessTokenCachekey = 'ABAPI:getApplicationAccessToken';

        // Check Cache
        if (Cache::has($getApplicationAccessTokenCachekey)) {
            return Cache::get($getApplicationAccessTokenCachekey);
        }

        // get
        $options = [
            'headers' => [
                'Accept' => self::$API_HEADER,
            ],
            'verify' => self::$API_VERIFY_SSL,
            'http_errors' => false,
        ];

        try {
            $client = new Client($options);
            $response = $client->post(self::$API_ENDPOINT . '/oauth/access_token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => $moduleData->get('XOOM_API_CLIENT_ID'),
                    'client_secret' => $moduleData->get('XOOM_API_CLIENT_SECRET'),
                    'username' => $moduleData->get('XOOM_API_USERNAME'),
                    'password' => $moduleData->get('XOOM_API_PASSWORD')
                ]
            ]);
        } catch (Exception $e) {
            //TODO: exception !!!
            Log::debug($e->getMessage());
        }

        $accessToken = json_decode($response->getBody(), false)->accessToken;

        // cache it
        Cache::put($getApplicationAccessTokenCachekey, $accessToken, self::$CACHE_TIME_APPLICATION_ACCESS_TOKEN);

        return $accessToken;
    }

    /**
     * @param int $xoomUserId
     * @param string $applicationAccessToken
     * @return mixed
     */
    public static function checkIfUserExistsByUserId(int $xoomUserId, string $applicationAccessToken)
    {
        $options = [
            'headers' => [
                'Accept' => self::$API_HEADER,
                'Authorization' => 'Bearer ' . $applicationAccessToken
            ],
            'verify' => self::$API_VERIFY_SSL,
            'http_errors' => false,
        ];

        try {
            $client = new Client($options);
            $response = $client->get(self::$API_ENDPOINT . '/users/' . $xoomUserId, [

            ]);
        } catch (Exception $e) {
            //TODO: exception !!!
            Log::debug($e->getMessage());
        }

        $data = json_decode($response->getBody(), true);
        return isset($data['data'])?$data['data']:array();
    }

    /**
     * @param string $email
     * @param string $applicationAccessToken
     * @return mixed
     */
    public static function checkIfUserExistsByEmail(string $email, string $applicationAccessToken)
    {
        $options = [
            'headers' => [
                'Accept' => self::$API_HEADER,
                'Authorization' => 'Bearer ' . $applicationAccessToken
            ],
            'verify' => self::$API_VERIFY_SSL,
            'http_errors' => false,
        ];

        try {
            $client = new Client($options);
            $response = $client->get(self::$API_ENDPOINT . '/users', [
                'query' => [
                    'email' => $email
                ]
            ]);
        } catch (Exception $e) {
            //TODO: exception !!!
            Log::debug($e->getMessage());
        }

        return json_decode($response->getBody(), true)['data'];
    }

    /**
     * @param string $accessToken
     * @return mixed
     */
    public static function getUserInfo(string $accessToken)
    {
        $options = [
            'headers' => [
                'Accept' => self::$API_HEADER,
                'Authorization' => 'Bearer ' . $accessToken
            ],
            'verify' => self::$API_VERIFY_SSL,
            'http_errors' => false,
        ];

        try {
            $client = new Client($options);
            $response = $client->get(self::$API_ENDPOINT . '/auth/info', [

            ]);
        } catch (Exception $e) {
            //TODO: exception !!!
            Log::debug($e->getMessage());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * @param User $user
     * @param UserMeta $userMeta
     * @param XoomUser $xoomUser
     * @param Request $request
     * @param Collection $moduleData
     * @return mixed
     */
    public static function createAccount(User $user, UserMeta $userMeta, XoomUser $xoomUser, Request $request, Collection $moduleData)
    {
        $options = [
            'headers' => [
                'Accept' => self::$API_HEADER,
                'Authorization' => 'Bearer ' . self::getApplicationAccessToken($moduleData)->access_token
            ],
            'verify' => self::$API_VERIFY_SSL
        ];

        try {
            $client = new Client($options);

            $params = [
                'form_params' => [
                    'email' => $user->email,
                    'password' => $xoomUser->generateXoomPassword(),
                    'status' => 'active',
                    'country_code_iso2' => $userMeta->country->code ?? 'PL',
                    'profile' => [
                        'first_name' => $userMeta->name ?? 'John',
                        'last_name' => $userMeta->lastname ?? 'Xoom',
                        'timezone' => GeoIP::getLocation()['timezone'] ?? 'Europe/Warsaw', // TODO
                        'city' => $user->metaData->city,
                        'street' => $user->metaData->street_name,
                        'postal_code' => $user->metaData->postcode,
                        'about' => "Join me at: https://www.elysiumnetwork.io/{$user->customer_id}",
                    ],
                    'confirmed' => true,
                    'created_ip' => $request->ip() ?? GeoIP::getLocation()['ip'],
                    'package_id' => $moduleData->get('packages_map')[$user->package->id ?? null] ?? null
                ]
            ];

            $response = $client->post(self::$API_ENDPOINT . '/users', $params);
        } catch (Exception $e) {
            //TODO: exception !!!
            Log::debug('XL: ' . $e->getMessage());
        }

        return json_decode($response->getBody(), true)['data'];
    }

    /**
     * @param User $user
     * @param XoomUser $xoomUser
     * @param Collection $moduleData
     * @return mixed
     */
    public static function updateAccount(User $user, XoomUser $xoomUser, Collection $moduleData)
    {
        $options = [
            'headers' => [
                'Accept' => self::$API_HEADER,
                'Authorization' => 'Bearer ' . self::getApplicationAccessToken($moduleData)->access_token
            ],
            'verify' => self::$API_VERIFY_SSL
        ];

        try {
            $client = new Client($options);

            $params = [
                'form_params' => [
                    'email' => $user->email,
                    'package_id' => $moduleData->get('packages_map')[$user->package->id ?? null] ?? null,
                    'user_name' => $user->username,
                    'phone_number' => $user->phone,
                    'profile' => [
                        'first_name' => $user->metaData->firstname,
                        'last_name' => $user->metaData->lastname,
//                        "company" => ""
                        'timezone' => GeoIP::getLocation()['timezone'] ?? 'Europe/Warsaw', // TODO
//                        "date_format" => "Y-m-d"
//                        "time_format" => "H:i"
//                        "country_code_iso2" => "PL"
//                        "country_state_iso2" => "MZ"
                        'city' => $user->metaData->city,
                        'street' => $user->metaData->street_name,
                        'postal_code' => $user->metaData->postcode,
                        'about' => "Join me at: https://www.elysiumnetwork.io/{$user->customer_id}",
//                        "avatar_url" => null
//                          "logo_url" => "/assets/img/logos/xoom.svg"
//                          "own_logo" => false
//                          "background_url" => null

                    ],
                ]
            ];

            $response = $client->put(self::$API_ENDPOINT . '/users/' . $xoomUser->xoom_user_id, $params);

            return json_decode($response->getBody(), true)['data'];
        } catch (Exception $e) {
            //TODO: exception !!!
            Log::debug('XL: ' . $e->getMessage());
        }

        return [];
    }

    /**
     * @param XoomUser $xoomUser
     * @param Collection $moduleData
     * @return array
     */
    public static function getAccount(XoomUser $xoomUser, Collection $moduleData)
    {
        $options = [
            'headers' => [
                'Accept' => self::$API_HEADER,
                'Authorization' => 'Bearer ' . self::getApplicationAccessToken($moduleData)->access_token
            ],
            'verify' => self::$API_VERIFY_SSL
        ];

        try {
            $client = new Client($options);

            $params = [

            ];

            $response = $client->get(self::$API_ENDPOINT . '/users/' . $xoomUser->xoom_user_id . '?include=profile', $params);

            return json_decode($response->getBody(), true)['data'];
        } catch (Exception $e) {
            //TODO: exception !!!
            Log::debug('XL: ' . $e->getMessage());
        }

        return [];
    }
}
