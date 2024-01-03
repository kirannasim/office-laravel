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
 * Date: 1/7/2018
 * Time: 11:01 AM
 */

namespace App\Blueprint\Services;

use App\Eloquents\EasyRoute;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;


/**
 * Class RouteServices
 * @package App\Blueprint\Services
 */
class EasyRouteServices
{
    /**
     * @param $routeId
     * @param $params
     * @param bool $absolute
     * @return string
     * @throws \Illuminate\Routing\Exceptions\UrlGenerationException
     */
    static function routeToUri($routeId, $params = [], $absolute = true)
    {
        if (!$easyRoute = EasyRoute::find($routeId)) return;
        /** @var Router $router */
        $router = app('router');
        $params = $easyRoute->route_params ? $params : [];

        return ($routeName = $easyRoute->route_name) ? route($routeName, $params, $absolute) : routeToUri($router->getRoutes()->getByAction($easyRoute->action['uses']), $params, $absolute);
    }

    /**
     * @return bool
     */
    function nonEasyToEasyRoutes()
    {
        foreach ($this->nonEasyRoutes() as $key => $value) {
            /** @var Route $value */
            if (!$value->getName()) continue;

            $dispatch = [
                'route_name' => $value->getName(),
                'route_controller' => explode('@', $value->getActionName())[0],
                'route_uri' => $value->uri(),
                'route_params' => $value->parameterNames(),
            ];
            EasyRoute::create($dispatch);
        }

        return true;
    }

    /**
     * @return array
     */
    function nonEasyRoutes()
    {
        $router = app(Router::class);

        return collect($router->getRoutes()->getRoutesByMethod()['GET'])
            ->filter(function ($value, $key) {
                return $value->getName() && !EasyRoute::where('route_name', $value->getName())->exists();
            })->all();
    }

    /**
     * @param $name
     * @return EasyRoute
     */
    static function nameToId($name)
    {
        return ($entry = EasyRoute::where('route_name', $name)->first()) ? $entry->id : null;
    }

    /**
     * @param $id
     * @return EasyRoute
     */
    static function idToName($id)
    {
        return ($entry = EasyRoute::find($id)) ? $entry->route_name : null;
    }

    /**
     * @param $id
     * @param bool $parsed
     * @return EasyRoute
     */
    static function idToUri($id, $parsed = true)
    {
        return ($entry = EasyRoute::find($id)) ? ($parsed ? $entry->route_uri : preg_replace('/\{(\w+?)\?\}/', '{$1}', $entry->route_uri)) : null;
    }

    /**
     * @return bool
     */
    function fixRegex()
    {
        foreach (EasyRoute::get() as $easyRoute) {
            /** @var Route $route */
            /** @var Router $router */
            $router = app(\Illuminate\Support\Facades\Route::class);
            //$route = $router->getRoutes()->getByName($easyRoute['route_name']);
            //dd(\Illuminate\Support\Facades\Route::current());
            if ($route)
                EasyRoute::query()->update(['id' => $easyRoute->id, 'route_regex' => $route->getCompiled()->getRegex()]);
        }

        return true;
    }

    /**
     * @param string $attribute
     * @param bool $overrideExisting
     * @return bool
     */
    function fixAttributes($attribute = 'action', $overrideExisting = false)
    {
        foreach (EasyRoute::get() as $easyRoute) {
            /** @var Route $route */
            /** @var Router $router */
            $router = app('router');
            $route = $router->getRoutes()->getByName($easyRoute['route_name']);
            //dd(\Illuminate\Support\Facades\Route::current());
            if ($route) {
                if (!$overrideExisting && $easyRoute->{$attribute}) continue;

                $easyRoute->{$attribute} = $this->resolveAttribute($route, $attribute);
                $easyRoute->save();
            }
        }

        return true;
    }

    /**
     * @param Route $route
     * @param $attribute
     * @return array|string
     */
    protected function resolveAttribute(Route $route, $attribute)
    {
        switch ($attribute) {
            case 'action':
                return $route->getAction();
                break;
            case 'regex':
                return $route->getCompiled()->getRegex();
                break;
            case 'methods':
                return $route->methods();
                break;
        }

        return false;
    }
}
