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
 * Date: 6/10/2018
 * Time: 3:20 PM
 */

namespace App\Blueprint\Interfaces\Core;

use App\Eloquents\ModuleData;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use ReflectionClass;


/**
 * Class ComponentAbstract
 * @package App\Blueprint\Interfaces\Core
 */
abstract class ComponentAbstract
{
    public $model;

    public $assetsPath;

    public $cssPath;

    public $jsPath;

    public $registry;

    public $componentType;

    public $configRelation;

    public $componentData;

    public $events = [];

    /**
     * constructor.
     * @param bool $withoutRegistry
     * @throws \ReflectionException
     */
    function __construct($withoutRegistry = false)
    {
        if (!$withoutRegistry) $this->setRegistry();
    }

    /**
     * register hooks
     */
    public function hooks()
    {

    }

    /**
     * handle Component installations
     */
    function install()
    {

    }

    /**
     * handle Component uninstallation
     */
    function uninstall()
    {

    }

    /**
     *  Middleware actions, useful for delayed hook binding
     */
    function middlewareActions()
    {

    }

    /**
     * Set Routes
     */
    public function setRoutes()
    {

    }

    /**
     * @param Schedule $schedule
     */
    function schedule(Schedule $schedule)
    {
        return;
    }

    /**
     * Get Assets Path
     *
     * @param string $args
     * @return string Component css path
     */
    public function getAssetsPath($args = '')
    {
        return $this->assetsPath . '/' . $args;
    }

    /**
     * Get Css Path
     *
     * @param string $args
     * @return string Component css path
     */
    public function getCssPath($args = '')
    {
        return $this->cssPath . '/' . $args;
    }

    /**
     * Set Assets Path
     *
     * @param string $path
     */
    public function setAssetsPath($path)
    {
        $this->assetsPath = $path;
    }

    /**
     * Set Css Path
     *
     * @param string $path
     */
    public function setCssPath($path)
    {
        $this->cssPath = $path;
    }

    /**
     * Get Js Path
     *
     * @param null $file
     * @return string Component js path
     */
    public function getJsPath($file = null)
    {
        return $this->jsPath . '/' . $file;
    }

    /**
     * Set Js Path
     *
     * @param string $path
     */
    public function setJsPath($path)
    {
        $this->jsPath = $path;
    }

    /**
     * Register providers
     *
     * @return mixed
     */
    function providers()
    {
        return false;
    }

    /**
     * Handle admin settings
     *
     * @return mixed
     */
    function adminConfig()
    {
        return '';
    }

    /**
     * Component install action
     *
     * @return void status of installation
     */
    public function activate()
    {
        $this->getModel()->update(['active' => true]);

        $this->flushCache();
    }

    /**
     * Component install action
     *
     * @return void status of un-installation
     */
    public function deactivate()
    {
        $this->getModel()->update(['active' => false]);

        $this->flushCache();
    }

    /**
     * @param bool $collection
     * @return mixed
     */
    public function getRegistry($collection = false)
    {
        return $collection ? collect($this->registry) : $this->registry;
    }

    /**
     * give Components registry information
     * @param $registry
     * @return array|mixed
     * @throws \ReflectionException
     */
    function setRegistry($registry = null)
    {
        if ($registry)
            return tap($this, function () use ($registry) {
                $this->registry = $registry;
            });

        $instance = new ReflectionClass($this);
        $registry = dirname($instance->getFileName()) . '/' . Str::ucfirst($this->componentType) . 'Registry.php';
        $this->registry = file_exists($registry) ? include $registry : [];

        return $this;
    }

    /**
     * Add Css
     *
     * @param string $path
     * @param bool $absolute
     * @return  mixed
     */
    function addJs($path, $absolute = false)
    {
        return '<script src="' . (!$absolute ? $this->jsPath : '') . '/' . $path . '" type="text/javascript"></script>';
    }

    /**
     * Add Js
     *
     * @param string $path
     * @param bool $absolute
     * @return mixed
     */
    function addCss($path, $absolute = false)
    {
        return '<link href="' . (!$absolute ? $this->cssPath : '') . '/' . $path . '" rel="stylesheet" type="text/css" />';
    }

    /**
     * Handle dynamic method calls.
     *
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        $service = 'App\Blueprint\Services\\' . $this->componentType;

        return app($service)->$method(...$parameters);
    }

    /**
     * @return mixed
     */
    public function getComponentData()
    {
        if ($model = $this->getModel())
            return ($data = $model->{$this->configRelation}) ? $data : [];

        return [];
    }

    /**
     * @param mixed $componentData
     * @return ComponentAbstract|array|mixed
     */
    public function setComponentData($componentData = [])
    {
        $this->componentData = $componentData;
        $keyName = $this->componentType . '_id';

        if ($model = $this->getModel())
            /** @var Model $config */
            return ($config = $model->{$this->configRelation}) ? $config->update($componentData) : ModuleData::create(array_merge($componentData, [$keyName => $this->{Str::camel($keyName)}]));

        return $this;
    }

    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Bind Component Model corresponding to this component
     *
     * @param $model
     */
    function setModel(Model $model = null)
    {
        $this->model = $model;
    }

    /**
     * Event listener
     */
    function events()
    {

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
}
