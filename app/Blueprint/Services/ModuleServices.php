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

namespace App\Blueprint\Services;

use App\Blueprint\Interfaces\Core\SystemModuleInterface;
use App\Blueprint\Interfaces\Module\CartModuleInterface;
use App\Blueprint\Interfaces\Module\CartTotalInterface;
use App\Blueprint\Interfaces\Module\CommissionModuleInterface;
use App\Blueprint\Interfaces\Module\LayoutModuleInterface;
use App\Blueprint\Interfaces\Module\MLMPlanModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Interfaces\Module\PaymentModuleInterface;
use App\Blueprint\Interfaces\Module\RankModuleInterface;
use App\Blueprint\Interfaces\Module\ReportModuleInterface;
use App\Blueprint\Interfaces\Module\SecurityModuleInterface;
use App\Blueprint\Interfaces\Module\SmsModuleInterface;
use App\Blueprint\Interfaces\Module\TransactionChargeInterface;
use App\Blueprint\Interfaces\Module\TreeModuleInterface;
use App\Blueprint\Interfaces\Module\UtilityModuleInterface;
use App\Blueprint\Interfaces\Module\WalletModuleInterface;
use App\Eloquents\Module;
use Carbon\Carbon;
use Chumper\Zipper\Facades\Zipper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use ReflectionClass;

/**
 * Class ModuleServices
 * @package App\Blueprint\Services
 */
class ModuleServices
{
    public static $totalModules;

    protected $modulePath;

    protected $moduleRegistry;

    protected $pools;

    protected $trash;

    protected $temp;

    protected $errorMessages = [
        '404' => 'The specified file does not exists !',
        '500' => 'The module is not well built !',
    ];

    protected $bootActions = ['hooks', 'bootMethods', 'events'];

    /**
     * module service construct
     */
    function __construct()
    {
        $this->modulePath = app_path('Components/Modules');
        $this->trash = 'trash/modules/';
        $this->temp = 'app/moduleTemp/';
    }

    /**
     * @param array $modules
     * @return $this
     */
    function setModules($modules = [])
    {
        $this->flushCache();

        $this->setPools();

        $modules = $modules ?: Cache::get('ModuleRegistry', []);

        if ($modules) return tap($this, function ($service) use ($modules) {
            /** @var ModuleServices $service */
            $service->moduleRegistry = $modules;
            static::$totalModules = Cache::get('ModuleTotal', 0);
        });
        // If modules is not available in cache we need to set them for that we need to
        // iterate through the filesystem to fetch available modules
        iterateModules(function ($handle, $slug, $parent, $module) use (&$modules) {
            /** @var ModuleBasicAbstract $instance */
            $instance = app($handle);
            $registry = $instance->getRegistry();
            // Check module for necessary implementations
            if (!$this->checkImplementation($registry['pool'], $instance)
                || !in_array(basename($parent), $this->getPools())) return;
            // Increments the total modules to get the final number of available modules
            static::$totalModules++;
            // Starts setting registry
            $moduleName = isset($registry['name']) ? $registry['name'] : $module;
            $modules[] = array_merge($registry, [
                'parent' => basename($parent),
                'folder' => $parent . '/' . $module,
                'active' => $this->isActive($slug) ? true : false,
                'moduleId' => $moduleId = $this->installed($slug),
                'handle' => $handle,
                //'instance' => $this->initializeInstance($handle, $folder, $moduleId),
                'name' => $moduleName,
                'slug' => $slug,
                'key' => $module,
                'class' => isset($registry['class']) ? $registry['class'] : 'free'
            ]);
        }, $this);

        $this->moduleRegistry = tap($modules, function ($registry) {
            Cache::put('ModuleRegistry', ($this->moduleRegistry = $registry), Carbon::Today()->addWeeks(2));
            Cache::put('ModuleTotal', static::$totalModules, Carbon::Today()->addWeeks(2));
        });

        return $this;
    }

    /**
     * flush module registry cache
     *
     * @return  boolean status of flush
     */
    function flushCache()
    {
        return Cache::forget('ModuleRegistry');
    }

    /**
     * Check module interface Implementation
     *
     * @param string $pool pool of module
     * @param object $instance module instance
     * @return boolean status of check
     */
    function checkImplementation($pool, $instance)
    {
        if (!$instance instanceof ModuleBasicAbstract) return false;

        if (!$interfaces = $this->pools[$pool]['interfaces']) return true;

        foreach ($interfaces as $key => $value)
            if (!($instance instanceof $value)) return false;

        return true;
    }

    /**
     * get module pools
     *
     * @param bool $excludeEmpty
     * @return array
     */
    function getPools($excludeEmpty = false)
    {
        return array_keys($excludeEmpty ? $this->getModules() : $this->pools);
    }

    /**
     * Set Pools and interfaces
     *
     * @return ModuleServices
     */
    function setPools()
    {
        $pools = [];
        $pools['System']['interfaces'] = [
            SystemModuleInterface::class,
        ];
        $pools['Cart']['interfaces'] = [
            CartModuleInterface::class,
        ];
        $pools['General']['interfaces'] = [
            //\App\Blueprint\Interfaces\Module\TreeModuleInterface::class,
        ];
        $pools['Tree']['interfaces'] = [
            TreeModuleInterface::class,
        ];
        $pools['MLMPlan']['interfaces'] = [
            MLMPlanModuleInterface::class,
        ];
        $pools['Commission']['interfaces'] = [
            CommissionModuleInterface::class,
        ];
        $pools['Payment']['interfaces'] = [
            PaymentModuleInterface::class,
        ];
        $pools['TransactionCharge']['interfaces'] = [
            TransactionChargeInterface::class,
        ];
        $pools['CartTotal']['interfaces'] = [
            CartTotalInterface::class,
        ];
        $pools['Layout']['interfaces'] = [
            LayoutModuleInterface::class,
        ];
        $pools['Wallet']['interfaces'] = [
            WalletModuleInterface::class,
        ];
        $pools['Sms']['interfaces'] = [
            SmsModuleInterface::class,
        ];
        $pools['Rank']['interfaces'] = [
            RankModuleInterface::class,
        ];
        $pools['Security']['interfaces'] = [
            SecurityModuleInterface::class,
        ];
        $pools['Utility']['interfaces'] = [
            UtilityModuleInterface::class,
        ];
        $pools['Report']['interfaces'] = [
            ReportModuleInterface::class,
        ];
        $this->pools = $pools;

        return $this;
    }

    /**
     * Get all module details
     *
     * @param bool $returnCollect
     * @param null $constrain
     * @return mixed
     */
    function getModules($returnCollect = false, $constrain = null)
    {
        $modules = [];

        foreach ($this->moduleRegistry as $registry) {
            if ($constrain && (!isset($registry[$constrain]) || !$registry[$constrain]))
                continue;
            $modules[$registry['parent']][$registry['key']] = app($registry['handle'])->setRegistry($registry);
        }

        return $returnCollect ? collect($modules) : $modules;
    }

    /**
     * check module is active or not
     *
     * @param $param
     * @return bool status of module
     */
    function isActive($param)
    {
        if (!$param) return false;

        $needle = is_int($param) ? 'id' : 'slug';

        return module::where([$needle => $param, 'active' => true])->exists();
    }

    /**
     * check module already installed or not
     *
     * @param $param
     * @return bool
     */
    function installed($param)
    {
        $needle = is_int($param) ? 'id' : 'slug';
        $status = Module::where($needle, $param)->first();

        return $status ? $status->id : false;
    }

    /**
     * @param Collection $filter
     * @return array
     */
    function filteredModules(Collection $filter)
    {
        $moduleGroup = $this->getModules();
        $dispatch = [];

        foreach ($moduleGroup as $key => $group) {
            $filtered = array_map(function ($module) {
                /** @var ModuleBasicAbstract $module */
                return $module->getRegistry()['handle'];
            }, array_filter($group, function ($module) use ($filter) {
                /** @var ModuleBasicAbstract $module */
                if ($registryFilter = $filter->get('registry'))
                    foreach ($registryFilter as $filter) {
                        if (count($filter) > 2)
                            list($key, $value, $operator) = $filter;
                        else {
                            list($key, $value) = $filter;
                            $operator = '=';
                        }

                        if (!dynamicCompare($module->getRegistry()[$key], $operator, $value)) return false;
                    }

                return true;
            }));

            if ($filtered) array_push($dispatch, ...array_values($filtered));
        };

        return $dispatch;
    }

    /**
     * @param ModuleBasicAbstract $instance
     * @return ModuleBasicAbstract|mixed
     */
    function initializeInstance(ModuleBasicAbstract $instance)
    {
        return tap($instance, function ($instance) {
            $slug = $instance->registry['slug'];
            //Cache::flush("moduleLinked|$slug");
            Cache::rememberForever("moduleLinked|$slug", function () use ($instance) {
                return $this->performLinking($instance);
            });
            /** @var ModuleBasicAbstract $instance */
            $instance->setAssetsPath(asset($assetPath = "modules/assets/$slug"));
            $instance->setCssPath(asset("$assetPath/Css/"));
            $instance->setJsPath(asset("$assetPath/Js/"));
            $instance->setModuleId($moduleId = $instance->registry['moduleId']);
            $instance->setModel(Module::find($moduleId));
            //$instance->setRegistry($value);
            if ($this->isActive($instance->moduleId)) {
                // Add language namespace
                Lang::addNamespace(Str::camel($instance->registry['slug']), $instance->registry['folder'] . DIRECTORY_SEPARATOR . 'Languages');
                // adding routes
                Route::middleware(['web', 'CustomMiddlewares', 'localeSessionRedirect', 'localizationRedirect'])
                    ->prefix(LaravelLocalization::setLocale())
                    ->namespace((new ReflectionClass($instance))->getNamespaceName() . '\Controllers')
                    ->group(function () use ($instance) {
                        app()->call([$instance, 'setRoutes']);
                    });
                // calling hooks and boot methods
                foreach ($this->bootActions as $action)
                    if (method_exists($this, "booAction$action"))
                        app()->call([$instance, $action]);
                    else
                        if (method_exists($instance, $action)) app()->call([$instance, $action]);
            }
        });
    }

    /**
     * @param ModuleBasicAbstract $module
     * @return string
     */
    function performLinking(ModuleBasicAbstract $module)
    {
        extract($module->getRegistry());

        if (!is_link($link = public_path("modules/assets/$slug")))
            app('files')->link("$folder/Assets", $link);

        return $link;
    }

    /**
     * @param ModuleBasicAbstract $instance
     */
    function bootActionEvents(ModuleBasicAbstract $instance)
    {
        app()->call([$instance, 'events']);

        // Listen for Array based Events
        foreach ($instance->events as $event => $listen)
            Event::listen($event, $listen);
    }

    /**
     * Get modules Path
     *
     * @return string modules path
     */
    function getModulesPath()
    {
        return $this->modulePath;
    }

    /**
     * module service magic call method
     *
     * @param string $name
     * @param array $args
     * @return array
     * @throws Exception
     */
    function __call($name, $args)
    {
        $pools = implode('|', $this->getPools());

        switch ($name) {
            case (preg_match('/get(' . $pools . ')Pool/', $name, $matches)) ? true : false:
                $slug = $matches[1];
                $modules = $this->getModules(true)->get($slug, []);
                $constrain = isset($args[0]) ? $args[0] : null;
                $dispatch = [];

                /** @var ModuleBasicAbstract $module */
                foreach ($modules as $key => $module)
                    switch ($constrain) {
                        case 'active':
                            if ($this->isActive($module->moduleId)) $dispatch[] = $module;
                            break;
                        case 'installed':
                            if ($this->installed($module->moduleId)) $dispatch[] = $module;
                            break;
                        default:
                            $dispatch[] = $module;
                            break;
                    }

                return $dispatch;
                break;
            default:
                throw new Exception("This action is not allowed !!!", 1);
                break;
        }
    }

    /**
     * Get module Data
     *
     * @param integer|string $param module id or string
     * @return array array of module config data
     */
    function getModuleData($param)
    {
        return ($module = $this->getModule($param)) ? $module->getModuleData() : [];
    }

    /**
     * Get module details
     *
     * @param $param
     * @return ModuleBasicAbstract|bool
     */
    function getModule($param)
    {
        switch (gettype($param)) {
            case 'integer':
                return $this->getModuleById($param);
                break;

            case 'array':
            case 'string':
                return $this->getModuleBySlug($param);
                break;

            default:
                return false;
                break;
        }
    }

    /**
     * Get module by ID
     *
     * @param $id
     * @return array|bool|ModuleBasicAbstract
     */
    function getModuleById($id)
    {
        $module = Module::find($id);

        if (!$module) return false;

        $slug = $module->slug;

        return $this->getModuleBySlug($slug);
    }

    /**
     * Get module details by name
     *
     * @param $param
     * @return ModuleBasicAbstract
     */
    function getModuleBySlug($param)
    {
        list($pool, $slug) = is_array($param) ? array_values($param) : explode('-', $param);

        return collect($this->getModules()[$pool])->get($slug);
    }

    /**
     * Set module Data
     *
     * @param $data
     * @param $id
     * @return bool status of action
     */
    function setModuleData($data, $id)
    {
        if (!isset($id) || !$this->isActive($id)) return false;

        return ($module = $this->getModule($id)) ? $module->setModuleData($data) : false;
    }

    /**
     * activate a module
     *
     * @param $id
     * @return array
     */
    function activate($id)
    {
        if ($module = $this->getModule($id)) $module->activate();

        $this->flushCache();

        return ['status' => true];
    }

    /**
     * call a module
     *
     * @param integer|string $slugOrId module slug or id
     * @param bool $method
     * @param array $args
     * @return bool|mixed|ModuleBasicAbstract
     */
    function callModule($slugOrId, $method = false, $args = [])
    {
        $module = $this->getModule($slugOrId);

        return $method ? app()->call([$module, $method], $args) : $module;
    }

    /**
     * deactivate a module
     *
     * @param $id
     * @return array
     */
    function deactivate($id)
    {
        if ($module = $this->getModule($id)) $module->deactivate();

        $this->flushCache();

        return ['status' => true];
    }

    /**
     * Check integrity of a module
     *
     * @param request $request request object
     * @return array|string
     */
    function checkIntegrity(Request $request)
    {
        $moduleKey = $request->input('key');

        if (!Storage::exists($moduleKey)) return response()->json(['status' => false, 'error' => $this->errorMessages['404']], 422);

        try {
            $filesIndex = Zipper::make(storage_path('app/' . $moduleKey))->listFiles();
        } catch (Exception $e) {
            return response()->json(['status' => false, 'error' => $e->getMessage()], 422);
        }

        if (!$filesIndex || !isset($filesIndex[0])) return response()->json(['status' => false, 'error' => $this->errorMessages['500']], 422);

        $mainFolder = explode('/', $filesIndex[0])[0];
        $indexRegex = '/(' . $mainFolder . ')\/\1Index\.php/';
        $registryRegex = '/(' . $mainFolder . ')\/ModuleRegistry\.php/';
        $indexExists = false;
        $registryExists = false;
        $pool = false;

        foreach ($filesIndex as $key => $value) {
            if (preg_match($indexRegex, $value)) $indexExists = true;
            if (preg_match($registryRegex, $value)) $registryExists = true;
        }

        if ($registryExists) {
            $registry = Zipper::getFileContent($mainFolder . '/ModuleRegistry.php');
            preg_match('/[\'"]pool[\'"]\s*=>\s*\'(\w+)\'/', $registry, $matches);
            $pool = isset($matches[1]) ? $matches[1] : '';

            if (!in_array($pool, $this->getPools())) return response()->json(['status' => false, 'error' => $this->errorMessages['500']], 422);
        }

        if ($indexExists && $registryExists) {
            session()->flash('moduleInstallationData', ['key' => $moduleKey, 'slug' => $pool . '-' . $mainFolder, 'pool' => $pool]);

            return response()->json(['status' => true]);
        }

        return response()->json(['status' => false, 'error' => $this->errorMessages['500']], 422);
    }

    /**
     * Process ModuleArchive
     *
     * @param $install
     * @return array|bool
     * @throws Exception
     */
    function processModuleArchive($install)
    {
        $moduleData = session('moduleInstallationData');

        Zipper::make(storage_path('app/' . $moduleData['key']))
            ->extractTo($this->modulePath . '/' . $moduleData['pool']);

        $this->flushCache();

        if ($install) $this->install($moduleData['slug']);

        return ['status' => true];
    }

    /**
     * Install a module
     *
     * @param array $params module params
     * @return array|bool
     * @throws Exception
     */
    function install($params)
    {
        /** @var ModuleBasicAbstract $module */
        $module = $this->getModule($params);

        if ($this->installed($module->registry['slug'])) return false;

        $this->uninstall($params, false);

        $args = [
            'slug' => $module->registry['slug'],
            'name' => $module->registry['name'],
            'installed' => true,
            'active' => false,
        ];

        $module->install();

        $this->flushCache();

        return ['moduleId' => Module::create($args)->id];
    }

    /**
     * Uninstall a module
     *
     * @param $params
     * @param bool $delete
     * @return array|bool
     * @throws Exception
     */
    function uninstall($params, $delete = true)
    {
        /** @var ModuleBasicAbstract $module */
        $module = $this->getModule($params);

        if (!$module) return false;

        $module->uninstall();

        //if ($delete) true ? $this->trash($module) : File::deleteDirectory('');

        if ($module->getModel()) $module->getModel()->delete();

        $this->flushCache();

        return ['status' => true];
    }

    /**
     * trash module
     *
     * @param ModuleBasicAbstract $module module
     * @return boolean status of trashing
     */
    function trash(ModuleBasicAbstract $module)
    {
        $folder = $module->registry['folder'];
        $target = $this->trash . basename($folder);

        File::copyDirectory($folder, storage_path($target));
        File::deleteDirectory($folder);

        return true;
    }

    /**
     * @param $slug
     * @return bool
     */
    function slugToId($slug)
    {
        $module = $this->getModuleBySlug($slug);

        return $module ? $module->moduleId : false;
    }

    /**
     * @param $id
     * @return bool
     */
    function idToSlug($id)
    {
        $module = $this->getModuleById($id);

        return $module ? $module->moduleId : false;
    }

    /**
     * @param string $args
     * @return string
     */
    public function getModulePath($args = '')
    {
        return $this->modulePath . $args;
    }
}