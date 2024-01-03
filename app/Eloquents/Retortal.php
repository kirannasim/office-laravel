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

use App\Blueprint\Traits\Model\Helpers;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Log;
use Exception;

/**
 * Class State
 *
 * @package App\Eloquents
 * @property int $id
 * @property string $name
 * @property int $active
 * @property int $country_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\State query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\State whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\State whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\State whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\State whereName($value)
 * @mixin \Eloquent
 */
class Retortal extends Model
{
    use Helpers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    /**
     * @var string
     */
    private static $API_ENDPOINT = 'https://soho.elysiumsocial.io/login?method=login';

    /**
     * @var string
     */
    private static $API_ENDPOINT_SIGNATURE_HASH = '96mj9@C&KYhQZtEwfsnu';

    /**
     * @var bool
     */
    private static $API_VERIFY_SSL = false;



    const RETORTAL_SSO_LOGIN_URL = 'https://soho.elysiumsocial.io/';
    const RETORTAL_SSO_DEV_LOGIN_URL = 'https://adamdev.socialserver.net/';

    const RetortalTestUserNames = [
        'bob1200',
        'bob1114',
        'bob1119',
    ];


    static function getRetortalLoginUrl($user) {
        $login_token = self::getRetortalLoginToken($user);

        return self::RETORTAL_SSO_LOGIN_URL . 'login?method=token&token='.$login_token;
    }


    static function getRetortalDevLoginUrl($user) {
        $login_token = self::getRetortalLoginToken($user);

        return self::RETORTAL_SSO_DEV_LOGIN_URL . 'login?method=token&token='.$login_token;
    }


    static public function getRetortalPackageId($package_slug) {

        $retortal_package = 'basic';
        switch (strtolower($package_slug)) {
            case 'ib';
            case 'founder';
            case 'one_year_founder';
                $retortal_package = 'pro';
            break;

            default:
                $retortal_package = 'basic';
            break;
        }

        return $retortal_package;
    }


    static private function getRetortalLoginToken($user) {

        $retortal_package = $user->package?self::getRetortalPackageId($user->package->slug):null;

        $payload = [
            'email'         => $user->email,
            'consultant_id' => $user->customer_id,
            'package'       => $retortal_package,
            'first_name'    => $user->metaData->firstname,
            'last_name'     => $user->metaData->lastname,
            'country'       => $user->metaData->country->code ?? 'PL',
            'timestamp'     => Carbon::now()->timestamp,
        ];
        $payload_json = json_encode($payload);

        $request_signature = hash_hmac('sha256', $payload_json, self::$API_ENDPOINT_SIGNATURE_HASH);


        //RETORTAL - getting login token

        $options = [
            'verify' => self::$API_VERIFY_SSL,
            'http_errors' => false,
        ];

        try {
            $client = new Client($options);
            $response = $client->request('POST', self::$API_ENDPOINT, [
                'debug' => false,
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Content-Length' => strlen($payload_json),
                    'HTTP-SIGNATURE' => $request_signature,
                ],
                'json' => json_decode($payload_json, true),
            ]);
        } catch (Exception $e) {
            //TODO: exception !!!
            die($e->getMessage());
            Log::debug('Error: ' . $e->getMessage());
        }

        $response_code =  $response->getStatusCode();
        $response_body = (string)$response->getBody();


        $retortal_login_token = '';
        switch($response->getStatusCode()) {
            case 200:
            case 201:
                $retortal_login_token = json_decode((string)$response->getBody(), true)['token'] ?? '';
            break;

            case 404:
                $response_body = json_decode((string)$response->getBody(), true);
                switch($response_body['code']) {
                    case 200: //Invalid signature
                    break;
                    case 210: //You have passed an invalid json
                    break;
                    case 220: //You are missing some required fields [list fields]
                    break;
                    case 230: //The token you have supplied has expired
                    break;
                    case 240: //The consultant number
                    break;
                    case 250: //We found more then 1 user with that consultant number
                    break;
                    case 260: //An error has happen when trying to save the customers
                    break;
                    case 235: //The email address you have supplied is not unique in our system
                    break;
                }
            break;
        }

        return $retortal_login_token;
    }

}
