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
 * Here goes the helper functions
 */

use App\Blueprint\Facades\ConfigServer;
use App\Blueprint\Facades\LocationServer;
use App\Blueprint\Facades\MailServer;
use App\Blueprint\Facades\PackageServer;
use App\Blueprint\Facades\ThemeServer;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Services\CronServices;
use App\Blueprint\Services\HookServices;
use App\Blueprint\Services\ModuleServices;
use App\Blueprint\Services\ThemeServices;
use App\Eloquents\Activity;
use App\Eloquents\TemporaryData;
use App\Eloquents\User;
use App\Eloquents\UserMeta;
use App\Eloquents\UserPermission;
use App\Eloquents\UserType;
use App\Events\TaskBroadcaster;
use App\Notifications\SystemNotification;
use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Message\ResponseInterface;
use Hashids\Hashids;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Exceptions\UrlGenerationException;
use Illuminate\Routing\RouteUrlGenerator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\LaravelLocalization;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Torann\Currency\Currency;

/**
 * Logged User
 *
 * @return User|Authenticatable
 */
function loggedUser()
{
    return auth()->user();
}

/**
 * Logged User ID
 *
 * @return user object
 */
function loggedId()
{
    return loggedUser() ? loggedUser()->id : false;
}

/**
 * @return Model|null|static
 */
function companyUser()
{
    return User::companyUser();
}

/**
 * @return Model|null|static
 */
function companyId()
{
    return companyUser()->id;
}

/**
 * @return string
 */
function getScope()
{
    return session('theScope') ?: '';
}

/**
 * Get username from ID
 *
 * @param integer $id
 * @return bool|mixed
 */
function usernameFromId($id)
{
    if (!$user = User::find($id)) return false;

    return $user->username;
}

/**
 * @param $email
 * @return bool|mixed
 */
function userFromEmail($email)
{
    if (!$user = User::where('email', $email)->first()) return false;

    return $user->id;
}

/**
 * Get ID from username
 *
 * @param string $username
 * @return integer
 */
function idFromUsername($username)
{
    if (!$user = User::where('username', $username)->first()) return false;

    return $user->id;
}

/**
 * @param $args
 * @return string
 */
function cartPath($args = '')
{
    return dirname(base_path()) . '/cart/' . $args;
}

/**
 * Return path to theme assets folder
 *
 * @param string $args relative path slug
 * @return string asset path
 */
function themeAssetPath($args = null)
{
    return (ThemeServer::assetsPath());
}

/**
 * Return link to theme root folder
 *
 * @param string $args relative path slug
 * @return string asset path
 */
function themePath($args = null)
{
    return (ThemeServer::themePath($args));
}

/**
 * Return link to theme root folder
 *
 * @param string $args relative path slug
 * @return string asset path
 */
function templatePath($args = null)
{
    return (ThemeServer::templatePath($args));
}

/**
 * Get link to theme assets folder
 *
 * @param string $args relative path slug
 * @return string asset path
 */
function assetUrl($args = null)
{
    return (ThemeServer::assetsUrl($args));
}

/**
 * Get link to theme assets folder
 *
 * @param string $args relative path slug
 * @return string asset path
 */
function themeAssetUrl($args = null)
{
    return (ThemeServer::themeAssetsUrl($args));
}

/**
 * Get link to theme assets folder
 *
 * @param string $args relative path slug
 * @return string asset path
 */
function themeLayoutUrl($args = null)
{
    return (ThemeServer::layoutUrl($args));
}

/**
 * Get active layout
 *
 * @return string asset path
 * @internal param string $args relative path slug
 */
function activeLayout()
{
    return (ThemeServer::getActiveLayout());
}

/**
 * Helps to render the blade files by auto locating through available themes with default theme as fallback
 *
 * @param string $path blade file path
 * @param mixed $arg
 * @return Factory|View Rendered view
 */
function draw($path, $arg = null)
{
    view()->addLocation(ThemeServer::templatePath());

    return view($path, $arg);
}

/**
 * Return sub folder's names in a folder as array
 *
 * @param String $folder parent folder path
 * @param bool $includePaths
 * @return array folder lists
 */
function listFolders($folder = null, $includePaths = false)
{
    $folders = glob($folder . '/*', GLOB_ONLYDIR);
    if ($includePaths) return $folders;
    $folderNames = array_map(function ($value) {
        return basename($value);
    }, $folders);
    return $folderNames;
}

/**
 * Translate strings using theme specific language files
 *
 * @param string $string string to translate
 * @param string $theme Name of theme
 * @return string translated string
 */
function _t($string, $theme = 'Base')
{
    return Lang::get('theme::' . $string);
}

/**
 * Generates url's with current language prefix
 *
 * @param string $url url to be modified
 * @return string modified url
 */
function _url($url = null)
{
    return (url(App::getLocale(), $url));
}

/**
 * Get all countries
 *
 * @param string $args filters countries results by
 * @return \Illuminate\Database\Eloquent\Collection filtered countries in case the parameter passed is not null else all countries.
 */
function getCountries($args = null)
{
    return LocationServer::getAllCountry()->filter(function ($country) {
        return !in_array($country->code, json_decode(getConfig('localization', 'countries')));
    });
}

/**
 * Get all states of a country if country is passed or all available states
 *
 * @param null $args
 * @return array filtered countries in case the parameter passed is not null else all countries.
 * @internal param string $fetchBy filters countries results by
 */
function getStates($args = null)
{
    return LocationServer::getStates($args);
}


/**
 * @param $countryId
 * @return mixed
 */
function getCountryName($countryId)
{
    return LocationServer::getCountryNameFromID($countryId);
}


/**
 * @param $stateId
 * @return mixed
 */
function getStateName($stateId)
{
    return LocationServer::getStateNameFromID($stateId);
}

/**
 * @param $cityId
 * @return mixed
 */
function getCityName($cityId)
{
    return LocationServer::getCityNameFromID($cityId);
}

/**
 * Get all states of a country if country is passed or all available states
 *
 * @param null $args
 * @return array filtered countries in case the parameter passed is not null else all countries.
 * @internal param string $fetchBy filters countries results by
 */
function getCities($args = null)
{
    return LocationServer::getCity($args);
}

/**
 * Iterate through all modules and do some specific action
 *
 * @param Closure $closure closure to be run
 * @param $object
 * @param bool $init
 * @return mixed [type]
 */
function iterateModules(Closure $closure, $object, $init = false)
{
    $modulePath = app_path('Components/Modules');
    $moduleParents = glob($modulePath . '/*', GLOB_ONLYDIR);
    $runner = function () use ($modulePath, $moduleParents, $closure, $init) {
        foreach ($moduleParents as $parent) {
            $modules = listFolders($parent);
            foreach ($modules as $module) {
                $handle = 'App\Components\Modules\\' . basename($parent) . '\\' . $module . '\\' . $module . 'Index';
                $slug = basename($parent) . '-' . $module;
                $moduleName = $module;
                call_user_func_array($closure, [$handle, $slug, $parent, $moduleName]);
            }
        }
    };
    $bound = $runner->bindTo($object, $object);

    return $bound();
}

/**
 * Iterate through all modules and do some specific action
 *
 * @param Closure $closure closure to be run
 * @param $object
 * @param bool $init
 * @return mixed [type]
 * @internal param bool $f
 */
function iterateThemes(Closure $closure, $object, $init = false)
{
    $themes = glob(app_path('Components/Themes') . '/*', GLOB_ONLYDIR);
    $runner = function () use ($themes, $closure, $init) {
        foreach ($themes as $theme) {
            $handle = 'App\Components\Themes\\' . basename($theme) . '\\' . basename($theme) . 'Index';
            $slug = basename($theme);
            call_user_func_array($closure, [$handle, $slug, $theme]);
        }
    };

    $bound = $runner->bindTo($object, $object);

    return $bound();
}

/**
 * Get user model from id or username
 *
 * @param $idOrUsername
 * @return Model|null|static
 */
function getUser($idOrUsername)
{
    $needle = is_int($idOrUsername) ? 'id' : 'username';

    return User::where($needle, $idOrUsername)->first();
}

/**
 * Generate random string
 *
 * @param $length
 * @return string
 */
function randomString($length = 10)
{
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randCode = substr(str_shuffle(str_repeat($pool, $length)), 0, $length);

    return $randCode;
}

/**
 * Generate thumbnail markup with a fallback icon font
 *
 * @param  $link
 * @return string     ]
 */
function makeThumbnail($link)
{
    if (file_exists($link)) return '<img src="' . $link . '">';
    return '<i class="fa fa-photo"></i>';
}

/**
 * Get package info
 *
 * @param $id
 * @return mixed
 */
function getPackageInfo($id)
{
    return PackageServer::getIndividualPackage($id);
}

function getRankInfo($id)
{
    return RankServer::getIndividualPackage($id);
}

/**
 * @param User $user
 * @param null $userId
 * @return string
 */
function getProfilePic(User $user = null, $userId = null)
{
    $user = $user ?: User::find($userId);
    $gender = $user->metaData ? $user->metaData->gender : 'M';
    $placeholder = $gender == 'M' ? 'photos/maleUser.jpg' : 'photos/femaleUser.jpg';

    return asset(($user->metaData && $user->metaData->profile_pic) ? $user->metaData->profile_pic : $placeholder);
}

/**
 * Get logout link
 *
 * @return string
 */
function logoutLink()
{
    $scope = session('theScope') ? session('theScope') . '.' : session('theScope');

    return route($scope . 'logout');
}

/**
 * Get config data
 *
 * @param string $group
 * @param string $key
 * @return string
 */
function getConfig($group = '', $key = '')
{
    return ConfigServer::getConfigData($group, $key);
}

/**
 * Get all system locals
 *
 * @return mixed
 */
function getLocals()
{
    return app(LaravelLocalization::class)->getSupportedLocales();
}

/**
 * Get active local
 *
 * @return mixed
 */
function currentLocal()
{
    return app(LaravelLocalization::class)->getCurrentLocale();
}

/**
 * Get default local
 *
 * @return mixed
 */
function defaultLocal()
{
    return app(LaravelLocalization::class)->getDefaultLocale();
}

/**
 * Get active local name
 *
 * @return mixed
 */
function currentLocalName()
{
    return app(LaravelLocalization::class)->getCurrentLocaleName();
}

/**
 * Get phone code
 *
 * @param null $args
 * @return mixed
 */
function getPhoneCode($args = null)
{
    return LocationServer::getPhoneCode($args);
}

/**
 * Get logo
 *
 * @return string
 */
function logo()
{
    return asset(getConfig('company_information', 'logo'));
}

/**get Phone Masking
 *
 * @param null $args
 * @return mixed
 */
function getPhoneMask($args = null)
{
    return LocationServer::getPhoneMask($args);
}

/**get Username from id
 *
 * @param $id
 * @return mixed
 */
function idToUsername($id)
{
    $user = User::find($id);
    if ($user) {
        return $user->username;
    } else {
        return '';
    }
}

/**
 * Get unread mails
 *
 * @return array
 */
function getUnreadMail()
{
    return MailServer::getUnreadInbox();
}

/**
 * Get logo
 *
 * @param user id
 * @return UserMeta|Model|null
 */
function getUserData($id)
{
    return UserMeta::where('user_id', $id)->first();
}

/**
 * @return string
 */
function cartStatus()
{
    return getConfig('cart_status', 'cart_status');
}

/**
 * @param User $user
 * @return Collection
 */
function vault(User $user)
{
    return collect(Cache::get("vault_$user->id", []));
}

/**
 * @param User $user
 * @param array $data
 * @return mixed
 */
function fillVault(User $user, $data = [])
{
    return tap($data, function ($data) use ($user) {
        Cache::put("vault_$user->id", $data, Carbon::today()->addDay());
    });
}

/**
 * @param array $data
 */
function diePrint($data = [])
{
    return die(print_r($data));
}

/**
 * @param $object
 * @return mixed
 */
function objToArray($object)
{
    return is_array($object) ? $object : json_decode(json_encode($object), true);
}

/**
 * @param $code
 * @return mixed
 */
function currencySymbol($code = '')
{
    /** @var Currency $currency */
    $currency = app('currency');
    $code = $code ?: $currency->getUserCurrency();

    return collect($currency->getCurrency($code))->get('symbol', null);
}

/**
 * @param $amount
 * @param string $code
 * @return mixed
 */
function prettyCurrency($amount, $code = '')
{
    return currencySymbol($code) . prettyNumber($amount);
}

/**
 * @param $number
 * @param int $precision
 * @return int|null|string|string[]
 */
function prettyNumber($number, $precision = 1)
{
    if ($number < 1000)
        $n_format = number_format($number, $precision);
    else if ($number < 100000) {
        $n_format = number_format($number / 1000, $precision) . 'K';
    } else if ($number < 1000000000) {
        // Anything less than a billion
        $n_format = number_format($number / 1000000, $precision) . 'M';
    } else {
        // At least a billion
        $n_format = number_format($number / 1000000000, $precision) . 'B';
    }

    return $n_format;
}

/**
 * @param $hookName
 * @param string $context
 * @param $args
 * @return bool
 */
function defineAction($hookName, $context = 'root', $args = null)
{
    return HookServices::action($hookName, $context, $args);
}

/**
 * @param $hookName
 * @param $content
 * @param string $context
 * @param $args
 * @return mixed
 */
function defineFilter($hookName, $content, $context = 'root', $args = null)
{
    return HookServices::filter($hookName, $content, $context, $args);
}

/**
 * @param $hookName
 * @param Closure $action
 * @param string $context
 * @param int $priority
 * @param null $acceptedArgs
 * @return bool
 */
function registerAction($hookName, Closure $action, $context = 'root', $priority = 0, $acceptedArgs = null)
{
    return HookServices::addAction($hookName, $action, $context, $priority, $acceptedArgs);
}

/**
 * @param $hookName
 * @param Closure $action
 * @param string $context
 * @param int $priority
 * @param null $acceptedArgs
 * @return bool
 */
function registerFilter($hookName, Closure $action, $context = 'root', $priority = 0, $acceptedArgs = null)
{
    return HookServices::addFilter($hookName, $action, $context, $priority, $acceptedArgs);
}

/**check whether the logged user is admin
 *
 * @param null $user
 * @return bool
 */
function isAdmin($user = null)
{
    if (!$user = $user ?: loggedUser()) return false;

    return UserType::titleToId('admin') == $user->userType->id;
}

/**
 * @param $task
 * @param array $taskAttributes
 * @param $operation
 * @param $channel
 * @param bool $done
 * @param bool $clearLastOperations
 * @return array|null
 */
function taskBroadcast($task, $operation = null, $taskAttributes = [], $channel = null, $done = false, $clearLastOperations = false)
{
    // create singleton instance of broadcaster for this specific operations
    // so that we get the previous operations that has been performed on same task.
    if (!app()->resolved($abstract = "TaskBroadcaster{$task}"))
        app()->singleton($abstract, function ($app) use ($channel, $taskAttributes) {
            return new TaskBroadcaster($taskAttributes, $channel);
        });
    /** @var TaskBroadcaster $broadCaster */
    $broadCaster = app($abstract);
    // Clear previous operation to free the broadcaster instance memory
    if ($clearLastOperations) $broadCaster->flushOperations($clearLastOperations);
    // Add current operation
    if ($operation) $broadCaster->setOperations($operation);
    // Setting the broadcaster in redis persistent storage so that we can view it later
    Redis::hset('tasks', $task, serialize($broadCaster));
    // If the task has been finished we will unset the instance and redis to free up memory
    if ($done) {
        app()->forgetInstance($abstract);
        Redis::hdel('tasks', $task);
    };
    // dispatching event
    return event(app($abstract));
}

/**
 * @param null $object
 * @param string $type
 * @param bool $returnSerializer
 * @return bool|float|int|string|Serializer
 */
function serializeObject($object = null, $type = 'json', $returnSerializer = false)
{
    $encoders = array(new XmlEncoder(), new JsonEncoder());
    $normalizers = array(new ObjectNormalizer());
    $serializer = new Serializer($normalizers, $encoders);

    return $returnSerializer ? $serializer : $serializer->serialize($object, $type);
}

/**
 * @param $serialized
 * @param $class
 * @param string $type
 * @return bool|float|int|string|Serializer
 */
function unSerializeObject($serialized, $class, $type = 'json')
{
    $serializer = serializeObject(null, $type, true);

    return $serializer->deserialize($serialized, $class, $type);
}

/**
 * @param User $user
 * @return string
 */
function fullName(User $user = null)
{
    $user = $user ?: loggedUser();
    $user->load('metaData');

    return $user ? $user->metaData->firstname . ' ' . $user->metaData->lastname : '';
}

/**
 * @param $user_id
 * @param $type
 * @return bool
 */
function checkAccess($user_id, $type)
{
    if ($userStatus = UserPermission::where('user_id', $user_id)
        ->where('slug', $type)
        ->where('status', 1)->first())
        return false;

    return true;
}

/**
 * @param $slugOrId
 * @param null $action
 * @param array $args
 * @return ModuleBasicAbstract|mixed
 */
function callModule($slugOrId, $action = null, $args = [])
{
    return app(ModuleServices::class)->callModule($slugOrId, $action, $args);
}

/**
 * @param $slugOrId
 * @param null $action
 * @param array $args
 * @return ModuleBasicAbstract|mixed
 */
function callTheme($slugOrId, $action = null, $args = [])
{
    return app(ThemeServices::class)->callTheme($slugOrId, $action, $args);
}

/**
 * @param $slugOrId
 * @return mixed|ModuleBasicAbstract
 */
function getModule($slugOrId)
{
    return app(ModuleServices::class)->getModule($slugOrId);
}

/**
 * @param bool $returnCollect
 * @return mixed|ModuleBasicAbstract
 */
function getModules($returnCollect = false)
{
    return app(ModuleServices::class)->getModules($returnCollect);
}

/**
 * @param $var1
 * @param $op
 * @param $var2
 * @return bool
 */
function dynamicCompare($var1, $op, $var2)
{
    switch ($op) {
        case "=":
            return $var1 == $var2;
        case "!=":
            return $var1 != $var2;
        case ">=":
            return $var1 >= $var2;
        case "<=":
            return $var1 <= $var2;
        case ">":
            return $var1 > $var2;
        case "<":
            return $var1 < $var2;
        default:
            return true;
    }
}

/**
 * @param ModuleBasicAbstract|Integer|String $moduleOrIdOrSlug
 * @param $key
 * @param array $replace
 * @param string $local
 * @return Translator|string
 */
function _mt($moduleOrIdOrSlug, $key, $replace = [], $local = '')
{
    $module = $moduleOrIdOrSlug instanceof ModuleBasicAbstract ? $moduleOrIdOrSlug : getModule($moduleOrIdOrSlug);

    return $module->translate($key, $replace, $local);
}

/**
 * @param $number
 * @return bool
 */
function isEven($number)
{
    if ($number % 2 == 0) return true;

    return false;
}

/**
 * @return string
 */
function randColor()
{
    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}

/**
 * @param array $data
 * @param bool $broadCast
 * @return Activity|Model
 */
function addActivity($data = [], $broadCast = false)
{
    $default = [
        'operation' => 'default',
        'description' => '',
        'priority' => '',
        'ip' => request()->ip,
        'icon' => '',
        'color' => '',
    ];

    return Activity::create(collect(array_merge($default, $data))->only(array_keys($default)));
}

/**
 * @param array $data
 * @param string $channel
 * @param bool $private
 */
function transmit($data = [], $channel = 'default', $private = true)
{
    //event(new );
}

/**
 * @param array $data
 * @param null $user
 */
function systemNotify($data = [], $user = null)
{
    Notification::send(($user ?: loggedUser()), new SystemNotification($data));
}

/**
 * @param $toBeHashed
 * @param int $length
 * @param string $salt
 * @return string
 */
function hashId($toBeHashed, $length = 10, $salt = 'blueprint')
{
    return (new Hashids($salt, $length))->encode($toBeHashed);
}

/**
 * @param $hashed
 * @param int $length
 * @param string $salt
 * @return array
 */
function decodeId($hashed, $length = 10, $salt = 'blueprint')
{
    return (new Hashids($salt, $length))->decode($hashed)[0];
}

/**
 * @return Collection
 */
function getScopes()
{
    if (Schema::hasTable('user_types'))
        return UserType::get()->pluck('title')->merge('shared');


    return collect([]);
}

/**
 * @param $name
 * @param $params
 * @param bool $absolute
 * @return string
 */
function scopeRoute($name, $params = [], $absolute = true)
{
    return route(getScope() . ".$name", $params, $absolute);
}

/**
 * @param \Illuminate\Routing\Route $route
 * @param array $params
 * @param bool $absolute
 * @return string
 * @throws UrlGenerationException
 */
function routeToUri(\Illuminate\Routing\Route $route = null, $params = [], $absolute = true)
{
    $route = $route ?: Route::current();

    return (new RouteUrlGenerator(app('url'), request()))->to($route, $params, $absolute);
}

/**
 * @param array $array
 * @return bool
 */
function isNumericArray($array = [])
{
    if (!is_array($array)) return false;

    foreach ($array as $a => $b)
        if ($a !== (int)$a)
            return false;

    return true;
}

/**
 * @param array $array
 * @return bool
 */
function isMultiDimensionalArray($array = [])
{
    if (!is_array($array)) return false;

    foreach ($array as $a => $b)
        if (is_array($b))
            return true;

    return false;
}

/**
 * @param $dir
 * @param string $as
 * @param int $precision
 * @return string
 */
function directoryInfo($dir, $as = 'MB', $precision = 2)
{
    $file_size = 0;

    foreach (File::allFiles($dir) as $file)
        $file_size += $file->getSize();

    switch ($as) {
        case 'kB':
            $devideBy = 8000;
            break;
        case 'GB':
            $devideBy = 1e+9;
            break;
        default:
            $devideBy = 1048576;
            break;
    }

    return number_format($file_size / 1048576, $precision);
}

/**
 * @param $endPoint
 * @param $options
 * @param string $method
 * @param bool $async
 * @param Closure|null $successCallback
 * @param Closure|null $failedCallback
 * @return mixed|\Psr\Http\Message\ResponseInterface
 * @throws GuzzleException
 */
function sendRequest($endPoint, $options = [], $method = 'POST', $async = false, Closure $successCallback = null, Closure $failedCallback = null)
{
    $client = new GuzzleHttp\Client();

    if ($async) {
        $promise = $client->requestAsync($method, $endPoint, ['form_params' => $options]);

        return $promise->then(
            function (ResponseInterface $res) use ($successCallback) {
                return [
                    'response' => $res,
                    'callback' => $successCallback ? $successCallback($res) : null
                ];
            },
            function (RequestException $e) use ($failedCallback) {
                return [
                    'response' => $e,
                    'callback' => $failedCallback ? $failedCallback($e) : null
                ];
            }
        );
    } else
        return $client->request($method, $endPoint, ['form_params' => $options]);
}

/**
 * @param $key
 * @param $context
 * @param $value
 * @return Model|null|static
 */
function getTemporaryData($key, $context, $value)
{
    return TemporaryData::where('key', $key)
        ->where('context', $context)->where('status', false)
        ->where('value', 'like', '%' . $value . '%')->first();
}

/**
 * @param $wildcard
 * @param $toCheck
 * @return bool
 */
function wildcardCheck($wildcard, $toCheck)
{
    return Str::is($wildcard, $toCheck);
}

/**
 * @return Model|null|static
 */
function getAdminUser()
{
    return User::adminUser();
}

/**
 * @param int $amount
 * @return string
 */
function formatToBtcPrecision($amount = 0)
{
    return number_format($amount, 8);
}

/**
 * @param Collection $collection
 * @param string $column
 * @return mixed
 */
function collectiveAmount(Collection $collection, $column = 'amount')
{
    return $collection->reduce(function ($carry, $item) use ($column) {
        $value = is_array($item) ? $item[$column] : $item->{$column};

        return bcadd($carry ?: 0, $value, 8);
    });
}

/**
 * @param $value1
 * @param $value2
 * @return string
 */
function add($value1, $value2)
{
    $precision = 8;
    $decimal = 8;
    return bcadd((string)number_format($value1, $decimal), (string)number_format($value2, $decimal), $precision);
}

/**
 * @param $value1
 * @param $value2
 * @return string
 */
function subtract($value1, $value2)
{
    $precision = 8;
    $decimal = 8;
    return bcsub((string)number_format($value1, $decimal), (string)number_format($value2, $decimal), $precision);
}

/**
 * @param $value1
 * @param $value2
 * @return string
 */
function multiply($value1, $value2)
{
    $precision = 8;
    $decimal = 8;

    return bcmul((string)number_format($value1, $decimal), (string)number_format($value2, $decimal), $precision);
}

/**
 * @param $value1
 * @param $value2
 * @return string
 */
function division($value1, $value2)
{
    $precision = 8;
    $decimal = 8;

    return bcdiv((string)number_format($value1, $decimal), (string)number_format($value2, $decimal), $precision);
}

/**
 * @param $name
 * @param $action
 * @param array $params
 * @return CronServices
 */
function schedule($name, $action, $params = [])
{
    return CronServices::registerCron($name, $action, $params);
}

/**
 * @return mixed
 */
function isDemoVersion()
{
    return env('isDemo', false);
}