<?php

namespace App\Http\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\JsonResponse;
use Log;

class MailChimp
{
    protected static $endpoint = 'https://<dc>.api.mailchimp.com/3.0/';
    protected static $apiKey = '';
    protected static $listID = '';

    /**
     * @param $listId
     * @param $email
     * @param array $tags
     * @param array $mergeFields
     * @param array $parameters
     */
    public static function subscribe($listId, $email, $tags = [], $mergeFields = [], $parameters = []): void
    {
        self::$listID = $listId;
        self::$apiKey = env('MC_KEY');

        self::createOrUpdateContact($email, $mergeFields, $parameters);
        self::updateTags($email, $tags);
    }

    /**
     * @param $email
     * @param array $mergeFields
     * @param array $parameters
     * @return bool|JsonResponse
     */
    public static function createOrUpdateContact($email, $mergeFields = [], $parameters = [])
    {
        $data = [
            'email_address' => $email,
            'status_if_new' => 'subscribed',
        ];

        if (!empty($mergeFields)) {
            $data['merge_fields'] = $mergeFields;
        }

        $data = array_merge($parameters, $data);

        return self::jsonRequest('PUT', 'lists/' . self::$listID . '/members/' . md5($email), $data);
    }

    /**
     * @param $email
     * @param $tags
     * @return bool|JsonResponse
     */
    public static function updateTags($email, $tags)
    {
        $tags = ['tags' => array_map(static function ($tagName, $tagState) {
            return ['name' => $tagName, 'status' => $tagState];
        }, array_keys($tags), $tags)];

        return self::jsonRequest('POST', 'lists/' . self::$listID . '/members/' . md5($email) . '/tags', $tags);
    }

    /**
     * @param string $method
     * @param string $path
     * @param array $args
     * @return bool|JsonResponse
     */
    public static function jsonRequest(string $method, string $path = '', array $args = [])
    {
        try {
            $httpClient = new Client();
            $httpResponse = $httpClient->request(
                $method,
                self::getEndpoint() . $path,
                ['auth' => ['apiKey', self::$apiKey], 'json' => $args]
            );

            return self::setJsonResponse($httpResponse);
        } catch (ClientException $e) {
            Log::info("[Marketing] Export to MailChimp failed! ({$e->getMessage()})");

            return false;
        }
    }

    /**
     * @param $httpResponse
     * @return JsonResponse
     */
    protected static function setJsonResponse($httpResponse): JsonResponse
    {
        $response = json_decode($httpResponse->getBody());

        return new JsonResponse($response, $httpResponse->getStatusCode());
    }

    protected static function getEndpoint(): string
    {   
        if(count(explode('-', self::$apiKey)) > 1)
        {
            return str_replace('<dc>', explode('-', self::$apiKey)[1], self::$endpoint);    
        }
        else
        {
            return "";
        }
        
    }
}
