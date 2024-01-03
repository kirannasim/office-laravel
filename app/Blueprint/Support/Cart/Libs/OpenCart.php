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
 * Date: 10/31/2017
 * Time: 1:56 PM
 */

namespace App\Blueprint\Support\Cart\Libs;

use App\Blueprint\Interfaces\Cart\CartInterface;
use App\Blueprint\Support\Cart\Traits\OpenCart\AdminBoot;
use App\Blueprint\Support\Cart\Traits\OpenCart\OpencartProduct;
use Cart\System\Library\Config;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Class OpenCart
 * @package App\Blueprint\Support\Cart\Libs
 */
class OpenCart implements CartInterface
{
    use AdminBoot, OpencartProduct;

    protected $config;

    protected $db;

    protected $cartUserId;

    /**
     * @var $registry \Registry
     */
    protected $registry;

    protected $encrypter;

    protected $loader;

    protected $cache;

    /**
     * OpenCart constructor.
     *
     * @param Encrypter $encrypter
     * @param string $context
     * @throws \Exception
     */
    function __construct(Encrypter $encrypter, $context = 'catalog')
    {
        //return;
        $this->encrypter = $encrypter;
        $this->boot($context);
    }

    /**
     * Initialize Class
     *
     * @param string $context
     * @throws \Exception
     */
    function boot($context)
    {
        // Un-sets Open-cart Application constant prior to booting.
        $this->redefineConstants();
        // On demand config access
        $configPath = $context == 'admin' ? 'admin/config.php' : 'config.php';
        // Require it
        require cartPath($configPath);
        // Helpers
        require_once dirname(__FILE__) . '/../Helpers/OpenCart.php';
        require_once DIR_SYSTEM . 'helper/utf8.php';
        // Additional requires
        $requires = [
            // Engine
            modification(DIR_SYSTEM . 'engine/event.php'),
            modification(DIR_SYSTEM . 'engine/loader.php'),
            modification(DIR_SYSTEM . 'engine/model.php'),
            modification(DIR_SYSTEM . 'engine/registry.php'),
            modification(DIR_SYSTEM . 'engine/proxy.php'),
        ];
        // Requires additional helpers and libraries
        foreach ($requires as $require) require_once $require;
        // Temporarily un-register blueprint autoload implementations
        // and registers Opencart's autoloader
        spl_autoload_unregister([AliasLoader::getInstance(), 'load']);
        spl_autoload_register([$this, 'autoLoad']);
        // Starts bootstrapping
        $this->config = new Config();
        $this->config->load('default');
        $this->config->load($context);
        $this->registry = new \Registry();
        $this->setupRegistry();

        if ($context == 'admin') $this->adminBootProcess();

        $this->setUserId();
        // Here we re-register blueprint auto-loaders
        spl_autoload_register([AliasLoader::getInstance(), 'load']);
    }

    /**
     * Un-sets config constants prior to booting to avoid admin/catalog
     * context conflict
     *
     * @return void
     */
    function redefineConstants()
    {
        // Since Opencart defines its config parameters as PHP constants in its config.php file,
        // we need a way to override the constants based on different contexts(admin/catalog).
        // As PHP doesn't have any ways to override constants at runtime out of the box,
        // we are using Run-kit package for this purpose. For the error free working of this function,
        // you should install PHP Run-kit.
        $configConstants = [
            'HTTP_CATALOG',
            'HTTPS_CATALOG',
            'DIR_CATALOG',
            'OPENCART_SERVER',
            'HTTP_SERVER',
            'HTTPS_SERVER',
            'DIR_APPLICATION',
            'DIR_SYSTEM',
            'DIR_IMAGE',
            'DIR_STORAGE',
            'DIR_LANGUAGE',
            'DIR_TEMPLATE',
            'DIR_CONFIG',
            'DIR_CACHE',
            'DIR_DOWNLOAD',
            'DIR_CONFIG',
            'DIR_LOGS',
            'DIR_MODIFICATION',
            'DIR_SESSION',
            'DIR_UPLOAD',
            'DB_DRIVER',
            'DB_HOSTNAME',
            'DB_USERNAME',
            'DB_PASSWORD',
            'DB_DATABASE',
            'DB_PORT',
            'DB_PREFIX',
            'APP_URL',
            'DIR_BLUEPRINT',
            'DIR_BLUEPRINT_SERVICE',
        ];
        // Here we looping through each config constants and un-sets its value using Run-kit, so that
        // we can define new value later.
        foreach ($configConstants as $constant) {
            if (defined($constant)) runkit_constant_remove($constant);
        }
    }

    /**
     * Setup OpenCart Registry
     *
     * @return void
     * @throws \Exception
     */
    function setupRegistry()
    {
        $this->registry->set('config', $this->config);
        $this->registry->set('db', new \DB($this->config->get('db_engine'), $this->config->get('db_hostname'), $this->config->get('db_username'), $this->config->get('db_password'), $this->config->get('db_database'), $this->config->get('db_port')));
        $this->db = $this->registry->get('db');
        $session = new \Session($this->config->get('session_engine'), $this->registry);
        $this->registry->set('session', $session);
        $loader = $this->loader = new \Loader($this->registry);
        $this->registry->set('load', $loader);
        $event = new \Event($this->registry);
        $this->registry->set('event', $event);
        $cache = new \Cache($this->config->get('cache_engine'), $this->config->get('cache_expire'));
        $this->registry->set('cache', $cache);
    }

    /**
     * Set cart user/customer ID
     *
     * @return void
     */
    function setUserId()
    {
        $session_id = collect($_COOKIE)->get($this->config->get('session_name'), '');
        $session = $this->registry->get('session');
        $session->start($session_id);
        $this->cartUserId = isset($session->data['customer_id']) ? $session->data['customer_id'] : null;
    }

    /**
     * @param $class
     * @return bool
     */
    function autoLoad($class)
    {
        $file = DIR_SYSTEM . 'library/' . str_replace('\\', '/', strtolower($class)) . '.php';

        if (is_file($file)) {
            include_once(modification($file));

            return true;
        } else
            return false;
    }

    /**
     * Login to cart
     *
     * @return mixed
     */
    function login()
    {
        $session_id = collect($_COOKIE)->get($this->config->get('session_name'), '');
        $session = $this->registry->get('session');

        $session->start($session_id);
        $this->loader->model('account/customer');

        $customerRepo = $this->registry->get('model_account_customer');
        $user = auth()->user();
        $openCartUser = $customerRepo->getCustomerByEmail($user->email);
        $session->data['customer_id'] = $openCartUser['customer_id'];

        $session->close();
    }

    /**
     * Change password
     *
     * @return mixed
     */
    function changePassword()
    {
        // TODO: Implement changePassword() method.
    }

    /**
     * Set blueprint auth cookie to validate blueprint sessions
     *
     * @param Request $request
     * @return mixed
     */
    function setAuthCookie(Request $request)
    {
        $sessionConfig = app()['config']['session'];

        setcookie($sessionConfig['cookie'], $this->encrypter->encrypt($request->session()->getId()), ini_get('session.cookie_lifetime'), ini_get('session.cookie_path'), ini_get('session.cookie_domain'));
    }

    /**
     * Extract credentials from request to be used with blueprint auth system
     *
     * @param Request $request
     * @return mixed
     */
    function extractCredentials(Request $request)
    {
        $dispatch = ['password' => $request->input('password')];
        $key = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $dispatch[$key] = $request->input('email');

        return $dispatch;
    }

    /**
     * Update user profile
     *
     * @param Request $request
     * @return mixed
     */
    function updateProfile(Request $request)
    {
        $this->loader->model('account/customer');
        $customerModel = $this->registry->get('model_account_customer');
        $customerModel->editCustomer($this->cartUserId, $this->extractProfileFields($request));

        return true;
    }

    /**
     * @param Request $request
     * @return array
     */
    function extractProfileFields(Request $request)
    {
        $fields = collect(array_merge($request->input('profile.basic'), $request->input('profile.meta')));

        return $fields->mapWithKeys(function ($value, $key) {
            return [$this->profileFieldMappings()->get($key, $key) => $value];
        })->all();
    }

    /**
     * @return Collection
     */
    function profileFieldMappings()
    {
        return collect([
            'phone' => 'telephone',
        ]);
    }

    /**
     * Get Languages From cart
     *
     * @return mixed
     */
    public function getLanguages()
    {
        $this->loader->model('localisation/language');

        $languageModel = $this->registry->get('model_localisation_language');

        return $languageModel->getLanguages();
    }

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->registry->get($key);
    }

    /**
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        $this->registry->set($key, $value);
    }
}
