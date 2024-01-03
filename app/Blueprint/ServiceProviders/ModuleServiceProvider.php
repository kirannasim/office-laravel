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

namespace App\Blueprint\ServiceProviders;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Services\ModuleServices;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

/**
 * Class ModuleServiceProvider
 * @package App\Blueprint\ServiceProviders
 */
class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param ModuleServices $moduleServices
     * @return void
     */
    public function boot(ModuleServices $moduleServices)
    {
        if (!Schema::hasTable('modules')) return;

        $moduleServices->setModules();

        view()->addLocation($moduleServices->getModulesPath());

        foreach ($moduleServices->getModules() as $pool)
            /** @var ModuleBasicAbstract $instance */
            foreach ($pool as $instance) $moduleServices->initializeInstance($instance);
    }

    /**
     * Register any Module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ModuleServices::class, function () {
            return new ModuleServices();
        });

        iterateModules(function ($handle) {
            if (!class_exists($handle)) return;

            $this->app->singleton($handle, function ($app) use ($handle) {
                $instance = new $handle();
                /** @var Container $app */
                $app->call([$instance, 'providers']);
                return $instance;
            });
        }, $this, true);
    }
}
