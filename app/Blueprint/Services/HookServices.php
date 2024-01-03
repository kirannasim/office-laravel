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

use Closure;
use Illuminate\Support\Collection;

/**
 * Class HookServices
 * @package App\Blueprint\Services
 */
class HookServices
{
    public static $actions = [];

    public static $filters = [];

    protected static $defaultContext;

    /**
     * Filters given content with registered filter listeners
     *
     * @param string $context context to be used for filtering normally module pools eg: General, Layout etc.
     * @param string $hookName name of filter hook
     * @param mixed $content content to be filtered
     * @param array $args additional arguments to be passed to registered filter listeners
     * @return mixed  filtered content.
     */
    static function filter($hookName, $content, $context = 'root', $args = null)
    {
        $filterActions = static::getFilters($context)->get($hookName, []);

        if ($context != 'root')
            $filterActions = array_merge($filterActions, static::getFilters('root')->get($hookName, []));

        $sortedByPriority = collect($filterActions)->sortBy('priority')->all();

        foreach ($sortedByPriority as $key => $value) {
            $args = isset($value['acceptedArgs']) ? collect($args)->chunk($value['acceptedArgs'])->toArray() : $args;
            $content = call_user_func_array($value['action'], [$content, $args]);
        }

        return $content;
    }

    /**
     * @param null $context
     * @return Collection
     */
    public static function getFilters($context = null)
    {
        $filters = collect(self::$filters);

        return $context ? collect($filters->get($context)) : $filters;
    }

    /**
     * Fires specific    functions registered action listeners
     *
     * @param string $context context to be used for filtering normally module pools eg: General, Layout etc.
     * @param string $hookName name of filter hook
     * @param array $args additional arguments to be passed to registered filter listeners
     * @return bool
     */
    static function action($hookName, $context = 'root', $args = null)
    {
        $actions = static::getActions($context)->get($hookName, []);

        if ($context != 'root')
            $actions = array_merge($actions, static::getActions('root')->get($hookName, []));

        $sortedByPriority = collect($actions)->sortBy('priority')->values()->all();

        foreach ($sortedByPriority as $key => $value) {
            $args = $value['acceptedArgs'] ? collect($args)->chunk($value['acceptedArgs'])->toArray() : $args;
            app()->call($value['action'], [$args]);
        }

        return true;
    }

    /**
     * @param null $context
     * @return Collection
     */
    public static function getActions($context = null)
    {
        $actions = collect(self::$actions);

        return $context ? collect($actions->get($context)) : $actions;
    }

    /**
     * Register an action listener
     *
     * @param string $hookName hook name to which the action to be hooked.
     * @param closure $action function to be fired
     * @param string $context [description]
     * @param integer $priority [description]
     * @param integer $acceptedArgs [description]
     * @return bool
     */
    static function addAction($hookName, $action, $context = 'root', $priority = null, $acceptedArgs = null)
    {
        $options = [];
        $options['priority'] = $priority;
        $options['action'] = $action;
        $options['context'] = $context;
        $options['acceptedArgs'] = $acceptedArgs;
        static::$actions[$context][$hookName][] = $options;

        return true;
    }

    /**
     * Register a filter listener
     *
     * @param string $hookName hook name to which the action to be hooked.
     * @param closure $action function to be fired
     * @param string $context [description]
     * @param integer $priority [description]
     * @param integer $acceptedArgs [description]
     * @return bool
     */
    static function addFilter($hookName, $action, $context = 'root', $priority = null, $acceptedArgs = null)
    {
        $options = [];
        $options['priority'] = $priority;
        $options['action'] = $action;
        $options['context'] = $context;
        $options['acceptedArgs'] = $acceptedArgs;
        static::$filters[$context][$hookName][] = $options;

        return true;
    }
}
