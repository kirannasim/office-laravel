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

namespace App\Http\Middleware;

use App\Blueprint\Facades\ThemeServer;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Services\ThemeServices;
use App\Eloquents\Theme;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use App\Eloquents\Package;
use View;

/**
 * Class RouteServer
 * @package App\Http\Middleware
 */
class RouteServer
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $scope
     * @return mixed
     * @throws \Exception
     */
    public function handle($request, Closure $next, $scope = '')
    {
        /** @var ThemeServices $themeServices */
        $themeServices = app(ThemeServices::class);

        // setting some necessary session values
        session([
            'theScope' => strtolower($scope),
            'advFieldName' => session('advFieldName', uniqid('advField-')),
            'loggedIdEncrypted' => hashId(loggedId())
        ]);
        // Throws exception if found some one in wrong route
        if (loggedUser() && ($scope != loggedUser()->userType->title) && ($scope !== 'shared')) {
            if (Route::currentRouteName() !== 'home') {
                abort(403, 'You are not allowed here');
            }
        }

        if(loggedUser())
        {
            $exist = defineFilter('checkuser',loggedUser());
        }
        // check active theme exists
        if (!Theme::activeTheme()) {
            return response('No active theme found !', 403);
        }

        // adding active theme views to laravel views path
        view()->addLocation($themeServices->getActiveThemeTemplatePath());

        // setting view path of parent theme of active theme
        if ($themeServices->getActiveThemeParent()) {
            view()->addLocation($themeServices->getThemeTemplatePath($themeServices->getActiveThemeParent()));
        }

        // adding theme level languages
        Lang::addNamespace('theme', ThemeServer::themePath('Languages'));

        // Js vars
        $vars = [
            'baseUrl' => url(''),
            'userApi' => route('user.api'),
            'csrfToken' => csrf_token(),
            'attachmentEndpoint' => route('attachment.add'),
            'assetPath' => asset(''),
            'socketHost' => env('SOCKET_HOST', request()->getHost()),
            'taskOperationRoute' => route('admin.task.operation.view'),
            'taskRoute' => route('admin.task.view'),
            'gateways' => route('cart.payment'),
        ];

        $controllerVars = method_exists($controller = $request->route()->getController(), 'getJsVars') ? (array)$controller->getJsVars() : [];
        View::share('jsVariables', array_merge($vars, $controllerVars));

        getModules(true)->each(static function ($pool) {
            foreach ($pool as $key => $module) /** @var ModuleBasicAbstract $module */ {
                $module->middlewareActions();
            }
        });

        
        // Custom route constrains
        $request = defineFilter('customMiddlewares', $request);

        if (is_a($request, Request::class)) {
            return $next($request);
        }

        return $request;
    }
}
