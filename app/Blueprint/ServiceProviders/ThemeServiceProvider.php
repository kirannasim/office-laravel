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

use App\Blueprint\Interfaces\Theme\ThemeBasicAbstract;
use App\Blueprint\Services\ThemeServices;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

/**
 * Class ThemeServiceProvider
 * @package App\Blueprint\ServiceProviders
 */
class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param ThemeServices $themeServices
     * @return void
     */
    public function boot(ThemeServices $themeServices)
    {
        if (!Schema::hasTable('themes')) return;

        $themeServices->setThemes();

        foreach ($themeServices->getThemes() as $instance)
            /** @var ThemeBasicAbstract $instance */
            $themeServices->initializeInstance($instance);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ThemeServices::class, function () {
            return new ThemeServices();
        });

        iterateThemes(function ($handle) {
            if (!class_exists($handle)) return;

            $this->app->singleton($handle, function ($app) use ($handle) {
                $instance = new $handle();
                /** @var Container $app */
                //$app->call([$instance, 'providers']);
                return $instance;
            });
        }, $this, true);
    }
}
