<?php
// @formatter:off

/**
 * A helper file for Laravel 5, to provide autocomplete information to your IDE
 * Generated for Laravel 5.6.39 on 2020-04-06 23:22:51.
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 * @see https://github.com/barryvdh/laravel-ide-helper
 */

namespace Illuminate\Support\Facades { 

    /**
     * 
     *
     * @see \Illuminate\Foundation\Application
     */ 
    class App {
        
        /**
         * Get the version number of the application.
         *
         * @return string 
         * @static 
         */ 
        public static function version()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->version();
        }
        
        /**
         * Run the given array of bootstrap classes.
         *
         * @param array $bootstrappers
         * @return void 
         * @static 
         */ 
        public static function bootstrapWith($bootstrappers)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->bootstrapWith($bootstrappers);
        }
        
        /**
         * Register a callback to run after loading the environment.
         *
         * @param \Closure $callback
         * @return void 
         * @static 
         */ 
        public static function afterLoadingEnvironment($callback)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->afterLoadingEnvironment($callback);
        }
        
        /**
         * Register a callback to run before a bootstrapper.
         *
         * @param string $bootstrapper
         * @param \Closure $callback
         * @return void 
         * @static 
         */ 
        public static function beforeBootstrapping($bootstrapper, $callback)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->beforeBootstrapping($bootstrapper, $callback);
        }
        
        /**
         * Register a callback to run after a bootstrapper.
         *
         * @param string $bootstrapper
         * @param \Closure $callback
         * @return void 
         * @static 
         */ 
        public static function afterBootstrapping($bootstrapper, $callback)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->afterBootstrapping($bootstrapper, $callback);
        }
        
        /**
         * Determine if the application has been bootstrapped before.
         *
         * @return bool 
         * @static 
         */ 
        public static function hasBeenBootstrapped()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->hasBeenBootstrapped();
        }
        
        /**
         * Set the base path for the application.
         *
         * @param string $basePath
         * @return \Illuminate\Foundation\Application 
         * @static 
         */ 
        public static function setBasePath($basePath)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->setBasePath($basePath);
        }
        
        /**
         * Get the path to the application "app" directory.
         *
         * @param string $path Optionally, a path to append to the app path
         * @return string 
         * @static 
         */ 
        public static function path($path = '')
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->path($path);
        }
        
        /**
         * Get the base path of the Laravel installation.
         *
         * @param string $path Optionally, a path to append to the base path
         * @return string 
         * @static 
         */ 
        public static function basePath($path = '')
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->basePath($path);
        }
        
        /**
         * Get the path to the bootstrap directory.
         *
         * @param string $path Optionally, a path to append to the bootstrap path
         * @return string 
         * @static 
         */ 
        public static function bootstrapPath($path = '')
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->bootstrapPath($path);
        }
        
        /**
         * Get the path to the application configuration files.
         *
         * @param string $path Optionally, a path to append to the config path
         * @return string 
         * @static 
         */ 
        public static function configPath($path = '')
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->configPath($path);
        }
        
        /**
         * Get the path to the database directory.
         *
         * @param string $path Optionally, a path to append to the database path
         * @return string 
         * @static 
         */ 
        public static function databasePath($path = '')
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->databasePath($path);
        }
        
        /**
         * Set the database directory.
         *
         * @param string $path
         * @return \Illuminate\Foundation\Application 
         * @static 
         */ 
        public static function useDatabasePath($path)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->useDatabasePath($path);
        }
        
        /**
         * Get the path to the language files.
         *
         * @return string 
         * @static 
         */ 
        public static function langPath()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->langPath();
        }
        
        /**
         * Get the path to the public / web directory.
         *
         * @return string 
         * @static 
         */ 
        public static function publicPath()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->publicPath();
        }
        
        /**
         * Get the path to the storage directory.
         *
         * @return string 
         * @static 
         */ 
        public static function storagePath()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->storagePath();
        }
        
        /**
         * Set the storage directory.
         *
         * @param string $path
         * @return \Illuminate\Foundation\Application 
         * @static 
         */ 
        public static function useStoragePath($path)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->useStoragePath($path);
        }
        
        /**
         * Get the path to the resources directory.
         *
         * @param string $path
         * @return string 
         * @static 
         */ 
        public static function resourcePath($path = '')
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->resourcePath($path);
        }
        
        /**
         * Get the path to the environment file directory.
         *
         * @return string 
         * @static 
         */ 
        public static function environmentPath()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->environmentPath();
        }
        
        /**
         * Set the directory for the environment file.
         *
         * @param string $path
         * @return \Illuminate\Foundation\Application 
         * @static 
         */ 
        public static function useEnvironmentPath($path)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->useEnvironmentPath($path);
        }
        
        /**
         * Set the environment file to be loaded during bootstrapping.
         *
         * @param string $file
         * @return \Illuminate\Foundation\Application 
         * @static 
         */ 
        public static function loadEnvironmentFrom($file)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->loadEnvironmentFrom($file);
        }
        
        /**
         * Get the environment file the application is using.
         *
         * @return string 
         * @static 
         */ 
        public static function environmentFile()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->environmentFile();
        }
        
        /**
         * Get the fully qualified path to the environment file.
         *
         * @return string 
         * @static 
         */ 
        public static function environmentFilePath()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->environmentFilePath();
        }
        
        /**
         * Get or check the current application environment.
         *
         * @return string|bool 
         * @static 
         */ 
        public static function environment()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->environment();
        }
        
        /**
         * Determine if application is in local environment.
         *
         * @return bool 
         * @static 
         */ 
        public static function isLocal()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->isLocal();
        }
        
        /**
         * Detect the application's current environment.
         *
         * @param \Closure $callback
         * @return string 
         * @static 
         */ 
        public static function detectEnvironment($callback)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->detectEnvironment($callback);
        }
        
        /**
         * Determine if the application is running in the console.
         *
         * @return bool 
         * @static 
         */ 
        public static function runningInConsole()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->runningInConsole();
        }
        
        /**
         * Determine if the application is running unit tests.
         *
         * @return bool 
         * @static 
         */ 
        public static function runningUnitTests()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->runningUnitTests();
        }
        
        /**
         * Register all of the configured providers.
         *
         * @return void 
         * @static 
         */ 
        public static function registerConfiguredProviders()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->registerConfiguredProviders();
        }
        
        /**
         * Register a service provider with the application.
         *
         * @param \Illuminate\Support\ServiceProvider|string $provider
         * @param array $options
         * @param bool $force
         * @return \Illuminate\Support\ServiceProvider 
         * @static 
         */ 
        public static function register($provider, $options = [], $force = false)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->register($provider, $options, $force);
        }
        
        /**
         * Get the registered service provider instance if it exists.
         *
         * @param \Illuminate\Support\ServiceProvider|string $provider
         * @return \Illuminate\Support\ServiceProvider|null 
         * @static 
         */ 
        public static function getProvider($provider)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->getProvider($provider);
        }
        
        /**
         * Get the registered service provider instances if any exist.
         *
         * @param \Illuminate\Support\ServiceProvider|string $provider
         * @return array 
         * @static 
         */ 
        public static function getProviders($provider)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->getProviders($provider);
        }
        
        /**
         * Resolve a service provider instance from the class name.
         *
         * @param string $provider
         * @return \Illuminate\Support\ServiceProvider 
         * @static 
         */ 
        public static function resolveProvider($provider)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->resolveProvider($provider);
        }
        
        /**
         * Load and boot all of the remaining deferred providers.
         *
         * @return void 
         * @static 
         */ 
        public static function loadDeferredProviders()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->loadDeferredProviders();
        }
        
        /**
         * Load the provider for a deferred service.
         *
         * @param string $service
         * @return void 
         * @static 
         */ 
        public static function loadDeferredProvider($service)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->loadDeferredProvider($service);
        }
        
        /**
         * Register a deferred provider and service.
         *
         * @param string $provider
         * @param string|null $service
         * @return void 
         * @static 
         */ 
        public static function registerDeferredProvider($provider, $service = null)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->registerDeferredProvider($provider, $service);
        }
        
        /**
         * Resolve the given type from the container.
         * 
         * (Overriding Container::make)
         *
         * @param string $abstract
         * @param array $parameters
         * @return mixed 
         * @static 
         */ 
        public static function make($abstract, $parameters = [])
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->make($abstract, $parameters);
        }
        
        /**
         * Determine if the given abstract type has been bound.
         * 
         * (Overriding Container::bound)
         *
         * @param string $abstract
         * @return bool 
         * @static 
         */ 
        public static function bound($abstract)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->bound($abstract);
        }
        
        /**
         * Determine if the application has booted.
         *
         * @return bool 
         * @static 
         */ 
        public static function isBooted()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->isBooted();
        }
        
        /**
         * Boot the application's service providers.
         *
         * @return void 
         * @static 
         */ 
        public static function boot()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->boot();
        }
        
        /**
         * Register a new boot listener.
         *
         * @param mixed $callback
         * @return void 
         * @static 
         */ 
        public static function booting($callback)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->booting($callback);
        }
        
        /**
         * Register a new "booted" listener.
         *
         * @param mixed $callback
         * @return void 
         * @static 
         */ 
        public static function booted($callback)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->booted($callback);
        }
        
        /**
         * {@inheritdoc}
         *
         * @static 
         */ 
        public static function handle($request, $type = 1, $catch = true)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->handle($request, $type, $catch);
        }
        
        /**
         * Determine if middleware has been disabled for the application.
         *
         * @return bool 
         * @static 
         */ 
        public static function shouldSkipMiddleware()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->shouldSkipMiddleware();
        }
        
        /**
         * Get the path to the cached services.php file.
         *
         * @return string 
         * @static 
         */ 
        public static function getCachedServicesPath()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->getCachedServicesPath();
        }
        
        /**
         * Get the path to the cached packages.php file.
         *
         * @return string 
         * @static 
         */ 
        public static function getCachedPackagesPath()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->getCachedPackagesPath();
        }
        
        /**
         * Determine if the application configuration is cached.
         *
         * @return bool 
         * @static 
         */ 
        public static function configurationIsCached()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->configurationIsCached();
        }
        
        /**
         * Get the path to the configuration cache file.
         *
         * @return string 
         * @static 
         */ 
        public static function getCachedConfigPath()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->getCachedConfigPath();
        }
        
        /**
         * Determine if the application routes are cached.
         *
         * @return bool 
         * @static 
         */ 
        public static function routesAreCached()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->routesAreCached();
        }
        
        /**
         * Get the path to the routes cache file.
         *
         * @return string 
         * @static 
         */ 
        public static function getCachedRoutesPath()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->getCachedRoutesPath();
        }
        
        /**
         * Determine if the application is currently down for maintenance.
         *
         * @return bool 
         * @static 
         */ 
        public static function isDownForMaintenance()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->isDownForMaintenance();
        }
        
        /**
         * Throw an HttpException with the given data.
         *
         * @param int $code
         * @param string $message
         * @param array $headers
         * @return void 
         * @throws \Symfony\Component\HttpKernel\Exception\HttpException
         * @static 
         */ 
        public static function abort($code, $message = '', $headers = [])
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->abort($code, $message, $headers);
        }
        
        /**
         * Register a terminating callback with the application.
         *
         * @param \Closure $callback
         * @return \Illuminate\Foundation\Application 
         * @static 
         */ 
        public static function terminating($callback)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->terminating($callback);
        }
        
        /**
         * Terminate the application.
         *
         * @return void 
         * @static 
         */ 
        public static function terminate()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->terminate();
        }
        
        /**
         * Get the service providers that have been loaded.
         *
         * @return array 
         * @static 
         */ 
        public static function getLoadedProviders()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->getLoadedProviders();
        }
        
        /**
         * Get the application's deferred services.
         *
         * @return array 
         * @static 
         */ 
        public static function getDeferredServices()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->getDeferredServices();
        }
        
        /**
         * Set the application's deferred services.
         *
         * @param array $services
         * @return void 
         * @static 
         */ 
        public static function setDeferredServices($services)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->setDeferredServices($services);
        }
        
        /**
         * Add an array of services to the application's deferred services.
         *
         * @param array $services
         * @return void 
         * @static 
         */ 
        public static function addDeferredServices($services)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->addDeferredServices($services);
        }
        
        /**
         * Determine if the given service is a deferred service.
         *
         * @param string $service
         * @return bool 
         * @static 
         */ 
        public static function isDeferredService($service)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->isDeferredService($service);
        }
        
        /**
         * Configure the real-time facade namespace.
         *
         * @param string $namespace
         * @return void 
         * @static 
         */ 
        public static function provideFacades($namespace)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->provideFacades($namespace);
        }
        
        /**
         * Get the current application locale.
         *
         * @return string 
         * @static 
         */ 
        public static function getLocale()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->getLocale();
        }
        
        /**
         * Set the current application locale.
         *
         * @param string $locale
         * @return void 
         * @static 
         */ 
        public static function setLocale($locale)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->setLocale($locale);
        }
        
        /**
         * Determine if application locale is the given locale.
         *
         * @param string $locale
         * @return bool 
         * @static 
         */ 
        public static function isLocale($locale)
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->isLocale($locale);
        }
        
        /**
         * Register the core class aliases in the container.
         *
         * @return void 
         * @static 
         */ 
        public static function registerCoreContainerAliases()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->registerCoreContainerAliases();
        }
        
        /**
         * Flush the container of all bindings and resolved instances.
         *
         * @return void 
         * @static 
         */ 
        public static function flush()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->flush();
        }
        
        /**
         * Get the application namespace.
         *
         * @return string 
         * @throws \RuntimeException
         * @static 
         */ 
        public static function getNamespace()
        {
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->getNamespace();
        }
        
        /**
         * Define a contextual binding.
         *
         * @param string $concrete
         * @return \Illuminate\Contracts\Container\ContextualBindingBuilder 
         * @static 
         */ 
        public static function when($concrete)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->when($concrete);
        }
        
        /**
         * Returns true if the container can return an entry for the given identifier.
         * 
         * Returns false otherwise.
         * 
         * `has($id)` returning true does not mean that `get($id)` will not throw an exception.
         * It does however mean that `get($id)` will not throw a `NotFoundExceptionInterface`.
         *
         * @param string $id Identifier of the entry to look for.
         * @return bool 
         * @static 
         */ 
        public static function has($id)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->has($id);
        }
        
        /**
         * Determine if the given abstract type has been resolved.
         *
         * @param string $abstract
         * @return bool 
         * @static 
         */ 
        public static function resolved($abstract)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->resolved($abstract);
        }
        
        /**
         * Determine if a given type is shared.
         *
         * @param string $abstract
         * @return bool 
         * @static 
         */ 
        public static function isShared($abstract)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->isShared($abstract);
        }
        
        /**
         * Determine if a given string is an alias.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function isAlias($name)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->isAlias($name);
        }
        
        /**
         * Register a binding with the container.
         *
         * @param string $abstract
         * @param \Closure|string|null $concrete
         * @param bool $shared
         * @return void 
         * @static 
         */ 
        public static function bind($abstract, $concrete = null, $shared = false)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->bind($abstract, $concrete, $shared);
        }
        
        /**
         * Determine if the container has a method binding.
         *
         * @param string $method
         * @return bool 
         * @static 
         */ 
        public static function hasMethodBinding($method)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->hasMethodBinding($method);
        }
        
        /**
         * Bind a callback to resolve with Container::call.
         *
         * @param array|string $method
         * @param \Closure $callback
         * @return void 
         * @static 
         */ 
        public static function bindMethod($method, $callback)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->bindMethod($method, $callback);
        }
        
        /**
         * Get the method binding for the given method.
         *
         * @param string $method
         * @param mixed $instance
         * @return mixed 
         * @static 
         */ 
        public static function callMethodBinding($method, $instance)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->callMethodBinding($method, $instance);
        }
        
        /**
         * Add a contextual binding to the container.
         *
         * @param string $concrete
         * @param string $abstract
         * @param \Closure|string $implementation
         * @return void 
         * @static 
         */ 
        public static function addContextualBinding($concrete, $abstract, $implementation)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->addContextualBinding($concrete, $abstract, $implementation);
        }
        
        /**
         * Register a binding if it hasn't already been registered.
         *
         * @param string $abstract
         * @param \Closure|string|null $concrete
         * @param bool $shared
         * @return void 
         * @static 
         */ 
        public static function bindIf($abstract, $concrete = null, $shared = false)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->bindIf($abstract, $concrete, $shared);
        }
        
        /**
         * Register a shared binding in the container.
         *
         * @param string $abstract
         * @param \Closure|string|null $concrete
         * @return void 
         * @static 
         */ 
        public static function singleton($abstract, $concrete = null)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->singleton($abstract, $concrete);
        }
        
        /**
         * "Extend" an abstract type in the container.
         *
         * @param string $abstract
         * @param \Closure $closure
         * @return void 
         * @throws \InvalidArgumentException
         * @static 
         */ 
        public static function extend($abstract, $closure)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->extend($abstract, $closure);
        }
        
        /**
         * Register an existing instance as shared in the container.
         *
         * @param string $abstract
         * @param mixed $instance
         * @return mixed 
         * @static 
         */ 
        public static function instance($abstract, $instance)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->instance($abstract, $instance);
        }
        
        /**
         * Assign a set of tags to a given binding.
         *
         * @param array|string $abstracts
         * @param array|mixed $tags
         * @return void 
         * @static 
         */ 
        public static function tag($abstracts, $tags)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->tag($abstracts, $tags);
        }
        
        /**
         * Resolve all of the bindings for a given tag.
         *
         * @param string $tag
         * @return array 
         * @static 
         */ 
        public static function tagged($tag)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->tagged($tag);
        }
        
        /**
         * Alias a type to a different name.
         *
         * @param string $abstract
         * @param string $alias
         * @return void 
         * @static 
         */ 
        public static function alias($abstract, $alias)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->alias($abstract, $alias);
        }
        
        /**
         * Bind a new callback to an abstract's rebind event.
         *
         * @param string $abstract
         * @param \Closure $callback
         * @return mixed 
         * @static 
         */ 
        public static function rebinding($abstract, $callback)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->rebinding($abstract, $callback);
        }
        
        /**
         * Refresh an instance on the given target and method.
         *
         * @param string $abstract
         * @param mixed $target
         * @param string $method
         * @return mixed 
         * @static 
         */ 
        public static function refresh($abstract, $target, $method)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->refresh($abstract, $target, $method);
        }
        
        /**
         * Wrap the given closure such that its dependencies will be injected when executed.
         *
         * @param \Closure $callback
         * @param array $parameters
         * @return \Closure 
         * @static 
         */ 
        public static function wrap($callback, $parameters = [])
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->wrap($callback, $parameters);
        }
        
        /**
         * Call the given Closure / class@method and inject its dependencies.
         *
         * @param callable|string $callback
         * @param array $parameters
         * @param string|null $defaultMethod
         * @return mixed 
         * @static 
         */ 
        public static function call($callback, $parameters = [], $defaultMethod = null)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->call($callback, $parameters, $defaultMethod);
        }
        
        /**
         * Get a closure to resolve the given type from the container.
         *
         * @param string $abstract
         * @return \Closure 
         * @static 
         */ 
        public static function factory($abstract)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->factory($abstract);
        }
        
        /**
         * An alias function name for make().
         *
         * @param string $abstract
         * @param array $parameters
         * @return mixed 
         * @static 
         */ 
        public static function makeWith($abstract, $parameters = [])
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->makeWith($abstract, $parameters);
        }
        
        /**
         * Finds an entry of the container by its identifier and returns it.
         *
         * @param string $id Identifier of the entry to look for.
         * @throws NotFoundExceptionInterface  No entry was found for **this** identifier.
         * @throws ContainerExceptionInterface Error while retrieving the entry.
         * @return mixed Entry.
         * @static 
         */ 
        public static function get($id)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->get($id);
        }
        
        /**
         * Instantiate a concrete instance of the given type.
         *
         * @param string $concrete
         * @return mixed 
         * @throws \Illuminate\Contracts\Container\BindingResolutionException
         * @static 
         */ 
        public static function build($concrete)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->build($concrete);
        }
        
        /**
         * Register a new resolving callback.
         *
         * @param \Closure|string $abstract
         * @param \Closure|null $callback
         * @return void 
         * @static 
         */ 
        public static function resolving($abstract, $callback = null)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->resolving($abstract, $callback);
        }
        
        /**
         * Register a new after resolving callback for all types.
         *
         * @param \Closure|string $abstract
         * @param \Closure|null $callback
         * @return void 
         * @static 
         */ 
        public static function afterResolving($abstract, $callback = null)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->afterResolving($abstract, $callback);
        }
        
        /**
         * Get the container's bindings.
         *
         * @return array 
         * @static 
         */ 
        public static function getBindings()
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->getBindings();
        }
        
        /**
         * Get the alias for an abstract if available.
         *
         * @param string $abstract
         * @return string 
         * @throws \LogicException
         * @static 
         */ 
        public static function getAlias($abstract)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->getAlias($abstract);
        }
        
        /**
         * Remove all of the extender callbacks for a given type.
         *
         * @param string $abstract
         * @return void 
         * @static 
         */ 
        public static function forgetExtenders($abstract)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->forgetExtenders($abstract);
        }
        
        /**
         * Remove a resolved instance from the instance cache.
         *
         * @param string $abstract
         * @return void 
         * @static 
         */ 
        public static function forgetInstance($abstract)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->forgetInstance($abstract);
        }
        
        /**
         * Clear all of the instances from the container.
         *
         * @return void 
         * @static 
         */ 
        public static function forgetInstances()
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->forgetInstances();
        }
        
        /**
         * Set the globally available instance of the container.
         *
         * @return static 
         * @static 
         */ 
        public static function getInstance()
        {
            //Method inherited from \Illuminate\Container\Container            
                        return \Illuminate\Foundation\Application::getInstance();
        }
        
        /**
         * Set the shared instance of the container.
         *
         * @param \Illuminate\Contracts\Container\Container|null $container
         * @return \Illuminate\Contracts\Container\Container|static 
         * @static 
         */ 
        public static function setInstance($container = null)
        {
            //Method inherited from \Illuminate\Container\Container            
                        return \Illuminate\Foundation\Application::setInstance($container);
        }
        
        /**
         * Determine if a given offset exists.
         *
         * @param string $key
         * @return bool 
         * @static 
         */ 
        public static function offsetExists($key)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->offsetExists($key);
        }
        
        /**
         * Get the value at a given offset.
         *
         * @param string $key
         * @return mixed 
         * @static 
         */ 
        public static function offsetGet($key)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        return $instance->offsetGet($key);
        }
        
        /**
         * Set the value at a given offset.
         *
         * @param string $key
         * @param mixed $value
         * @return void 
         * @static 
         */ 
        public static function offsetSet($key, $value)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->offsetSet($key, $value);
        }
        
        /**
         * Unset the value at a given offset.
         *
         * @param string $key
         * @return void 
         * @static 
         */ 
        public static function offsetUnset($key)
        {
            //Method inherited from \Illuminate\Container\Container            
                        /** @var \Illuminate\Foundation\Application $instance */
                        $instance->offsetUnset($key);
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Contracts\Console\Kernel
     */ 
    class Artisan {
        
        /**
         * Run the console application.
         *
         * @param \Symfony\Component\Console\Input\InputInterface $input
         * @param \Symfony\Component\Console\Output\OutputInterface $output
         * @return int 
         * @static 
         */ 
        public static function handle($input, $output = null)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
                        /** @var \App\Console\Kernel $instance */
                        return $instance->handle($input, $output);
        }
        
        /**
         * Terminate the application.
         *
         * @param \Symfony\Component\Console\Input\InputInterface $input
         * @param int $status
         * @return void 
         * @static 
         */ 
        public static function terminate($input, $status)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
                        /** @var \App\Console\Kernel $instance */
                        $instance->terminate($input, $status);
        }
        
        /**
         * Register a Closure based command with the application.
         *
         * @param string $signature
         * @param \Closure $callback
         * @return \Illuminate\Foundation\Console\ClosureCommand 
         * @static 
         */ 
        public static function command($signature, $callback)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
                        /** @var \App\Console\Kernel $instance */
                        return $instance->command($signature, $callback);
        }
        
        /**
         * Register the given command with the console application.
         *
         * @param \Symfony\Component\Console\Command\Command $command
         * @return void 
         * @static 
         */ 
        public static function registerCommand($command)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
                        /** @var \App\Console\Kernel $instance */
                        $instance->registerCommand($command);
        }
        
        /**
         * Run an Artisan console command by name.
         *
         * @param string $command
         * @param array $parameters
         * @param \Symfony\Component\Console\Output\OutputInterface $outputBuffer
         * @return int 
         * @static 
         */ 
        public static function call($command, $parameters = [], $outputBuffer = null)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
                        /** @var \App\Console\Kernel $instance */
                        return $instance->call($command, $parameters, $outputBuffer);
        }
        
        /**
         * Queue the given console command.
         *
         * @param string $command
         * @param array $parameters
         * @return \Illuminate\Foundation\Bus\PendingDispatch 
         * @static 
         */ 
        public static function queue($command, $parameters = [])
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
                        /** @var \App\Console\Kernel $instance */
                        return $instance->queue($command, $parameters);
        }
        
        /**
         * Get all of the commands registered with the console.
         *
         * @return array 
         * @static 
         */ 
        public static function all()
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
                        /** @var \App\Console\Kernel $instance */
                        return $instance->all();
        }
        
        /**
         * Get the output for the last run command.
         *
         * @return string 
         * @static 
         */ 
        public static function output()
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
                        /** @var \App\Console\Kernel $instance */
                        return $instance->output();
        }
        
        /**
         * Bootstrap the application for artisan commands.
         *
         * @return void 
         * @static 
         */ 
        public static function bootstrap()
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
                        /** @var \App\Console\Kernel $instance */
                        $instance->bootstrap();
        }
        
        /**
         * Set the Artisan application instance.
         *
         * @param \Illuminate\Console\Application $artisan
         * @return void 
         * @static 
         */ 
        public static function setArtisan($artisan)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
                        /** @var \App\Console\Kernel $instance */
                        $instance->setArtisan($artisan);
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Auth\AuthManager
     * @see \Illuminate\Contracts\Auth\Factory
     * @see \Illuminate\Contracts\Auth\Guard
     * @see \Illuminate\Contracts\Auth\StatefulGuard
     */ 
    class Auth {
        
        /**
         * Attempt to get the guard from the local cache.
         *
         * @param string $name
         * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard 
         * @static 
         */ 
        public static function guard($name = null)
        {
                        /** @var \Illuminate\Auth\AuthManager $instance */
                        return $instance->guard($name);
        }
        
        /**
         * Create a session based authentication guard.
         *
         * @param string $name
         * @param array $config
         * @return \Illuminate\Auth\SessionGuard 
         * @static 
         */ 
        public static function createSessionDriver($name, $config)
        {
                        /** @var \Illuminate\Auth\AuthManager $instance */
                        return $instance->createSessionDriver($name, $config);
        }
        
        /**
         * Create a token based authentication guard.
         *
         * @param string $name
         * @param array $config
         * @return \Illuminate\Auth\TokenGuard 
         * @static 
         */ 
        public static function createTokenDriver($name, $config)
        {
                        /** @var \Illuminate\Auth\AuthManager $instance */
                        return $instance->createTokenDriver($name, $config);
        }
        
        /**
         * Get the default authentication driver name.
         *
         * @return string 
         * @static 
         */ 
        public static function getDefaultDriver()
        {
                        /** @var \Illuminate\Auth\AuthManager $instance */
                        return $instance->getDefaultDriver();
        }
        
        /**
         * Set the default guard driver the factory should serve.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function shouldUse($name)
        {
                        /** @var \Illuminate\Auth\AuthManager $instance */
                        $instance->shouldUse($name);
        }
        
        /**
         * Set the default authentication driver name.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function setDefaultDriver($name)
        {
                        /** @var \Illuminate\Auth\AuthManager $instance */
                        $instance->setDefaultDriver($name);
        }
        
        /**
         * Register a new callback based request guard.
         *
         * @param string $driver
         * @param callable $callback
         * @return \Illuminate\Auth\AuthManager 
         * @static 
         */ 
        public static function viaRequest($driver, $callback)
        {
                        /** @var \Illuminate\Auth\AuthManager $instance */
                        return $instance->viaRequest($driver, $callback);
        }
        
        /**
         * Get the user resolver callback.
         *
         * @return \Closure 
         * @static 
         */ 
        public static function userResolver()
        {
                        /** @var \Illuminate\Auth\AuthManager $instance */
                        return $instance->userResolver();
        }
        
        /**
         * Set the callback to be used to resolve users.
         *
         * @param \Closure $userResolver
         * @return \Illuminate\Auth\AuthManager 
         * @static 
         */ 
        public static function resolveUsersUsing($userResolver)
        {
                        /** @var \Illuminate\Auth\AuthManager $instance */
                        return $instance->resolveUsersUsing($userResolver);
        }
        
        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return \Illuminate\Auth\AuthManager 
         * @static 
         */ 
        public static function extend($driver, $callback)
        {
                        /** @var \Illuminate\Auth\AuthManager $instance */
                        return $instance->extend($driver, $callback);
        }
        
        /**
         * Register a custom provider creator Closure.
         *
         * @param string $name
         * @param \Closure $callback
         * @return \Illuminate\Auth\AuthManager 
         * @static 
         */ 
        public static function provider($name, $callback)
        {
                        /** @var \Illuminate\Auth\AuthManager $instance */
                        return $instance->provider($name, $callback);
        }
        
        /**
         * Create the user provider implementation for the driver.
         *
         * @param string|null $provider
         * @return \Illuminate\Contracts\Auth\UserProvider|null 
         * @throws \InvalidArgumentException
         * @static 
         */ 
        public static function createUserProvider($provider = null)
        {
                        /** @var \Illuminate\Auth\AuthManager $instance */
                        return $instance->createUserProvider($provider);
        }
        
        /**
         * Get the default user provider name.
         *
         * @return string 
         * @static 
         */ 
        public static function getDefaultUserProvider()
        {
                        /** @var \Illuminate\Auth\AuthManager $instance */
                        return $instance->getDefaultUserProvider();
        }
        
        /**
         * Get the currently authenticated user.
         *
         * @return \App\Eloquents\User|null 
         * @static 
         */ 
        public static function user()
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->user();
        }
        
        /**
         * Get the ID for the currently authenticated user.
         *
         * @return int|null 
         * @static 
         */ 
        public static function id()
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->id();
        }
        
        /**
         * Log a user into the application without sessions or cookies.
         *
         * @param array $credentials
         * @return bool 
         * @static 
         */ 
        public static function once($credentials = [])
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->once($credentials);
        }
        
        /**
         * Log the given user ID into the application without sessions or cookies.
         *
         * @param mixed $id
         * @return \App\Eloquents\User|false 
         * @static 
         */ 
        public static function onceUsingId($id)
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->onceUsingId($id);
        }
        
        /**
         * Validate a user's credentials.
         *
         * @param array $credentials
         * @return bool 
         * @static 
         */ 
        public static function validate($credentials = [])
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->validate($credentials);
        }
        
        /**
         * Attempt to authenticate using HTTP Basic Auth.
         *
         * @param string $field
         * @param array $extraConditions
         * @return \Symfony\Component\HttpFoundation\Response|null 
         * @static 
         */ 
        public static function basic($field = 'email', $extraConditions = [])
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->basic($field, $extraConditions);
        }
        
        /**
         * Perform a stateless HTTP Basic login attempt.
         *
         * @param string $field
         * @param array $extraConditions
         * @return \Symfony\Component\HttpFoundation\Response|null 
         * @static 
         */ 
        public static function onceBasic($field = 'email', $extraConditions = [])
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->onceBasic($field, $extraConditions);
        }
        
        /**
         * Attempt to authenticate a user using the given credentials.
         *
         * @param array $credentials
         * @param bool $remember
         * @return bool 
         * @static 
         */ 
        public static function attempt($credentials = [], $remember = false)
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->attempt($credentials, $remember);
        }
        
        /**
         * Log the given user ID into the application.
         *
         * @param mixed $id
         * @param bool $remember
         * @return \App\Eloquents\User|false 
         * @static 
         */ 
        public static function loginUsingId($id, $remember = false)
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->loginUsingId($id, $remember);
        }
        
        /**
         * Log a user into the application.
         *
         * @param \Illuminate\Contracts\Auth\Authenticatable $user
         * @param bool $remember
         * @return void 
         * @static 
         */ 
        public static function login($user, $remember = false)
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        $instance->login($user, $remember);
        }
        
        /**
         * Log the user out of the application.
         *
         * @return void 
         * @static 
         */ 
        public static function logout()
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        $instance->logout();
        }
        
        /**
         * Invalidate other sessions for the current user.
         * 
         * The application must be using the AuthenticateSession middleware.
         *
         * @param string $password
         * @param string $attribute
         * @return bool|null 
         * @static 
         */ 
        public static function logoutOtherDevices($password, $attribute = 'password')
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->logoutOtherDevices($password, $attribute);
        }
        
        /**
         * Register an authentication attempt event listener.
         *
         * @param mixed $callback
         * @return void 
         * @static 
         */ 
        public static function attempting($callback)
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        $instance->attempting($callback);
        }
        
        /**
         * Get the last user we attempted to authenticate.
         *
         * @return \App\Eloquents\User 
         * @static 
         */ 
        public static function getLastAttempted()
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->getLastAttempted();
        }
        
        /**
         * Get a unique identifier for the auth session value.
         *
         * @return string 
         * @static 
         */ 
        public static function getName()
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->getName();
        }
        
        /**
         * Get the name of the cookie used to store the "recaller".
         *
         * @return string 
         * @static 
         */ 
        public static function getRecallerName()
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->getRecallerName();
        }
        
        /**
         * Determine if the user was authenticated via "remember me" cookie.
         *
         * @return bool 
         * @static 
         */ 
        public static function viaRemember()
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->viaRemember();
        }
        
        /**
         * Get the cookie creator instance used by the guard.
         *
         * @return \Illuminate\Contracts\Cookie\QueueingFactory 
         * @throws \RuntimeException
         * @static 
         */ 
        public static function getCookieJar()
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->getCookieJar();
        }
        
        /**
         * Set the cookie creator instance used by the guard.
         *
         * @param \Illuminate\Contracts\Cookie\QueueingFactory $cookie
         * @return void 
         * @static 
         */ 
        public static function setCookieJar($cookie)
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        $instance->setCookieJar($cookie);
        }
        
        /**
         * Get the event dispatcher instance.
         *
         * @return \Illuminate\Contracts\Events\Dispatcher 
         * @static 
         */ 
        public static function getDispatcher()
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->getDispatcher();
        }
        
        /**
         * Set the event dispatcher instance.
         *
         * @param \Illuminate\Contracts\Events\Dispatcher $events
         * @return void 
         * @static 
         */ 
        public static function setDispatcher($events)
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        $instance->setDispatcher($events);
        }
        
        /**
         * Get the session store used by the guard.
         *
         * @return \Illuminate\Contracts\Session\Session 
         * @static 
         */ 
        public static function getSession()
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->getSession();
        }
        
        /**
         * Return the currently cached user.
         *
         * @return \App\Eloquents\User|null 
         * @static 
         */ 
        public static function getUser()
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->getUser();
        }
        
        /**
         * Set the current user.
         *
         * @param \Illuminate\Contracts\Auth\Authenticatable $user
         * @return \Illuminate\Auth\SessionGuard 
         * @static 
         */ 
        public static function setUser($user)
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->setUser($user);
        }
        
        /**
         * Get the current request instance.
         *
         * @return \Symfony\Component\HttpFoundation\Request 
         * @static 
         */ 
        public static function getRequest()
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->getRequest();
        }
        
        /**
         * Set the current request instance.
         *
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @return \Illuminate\Auth\SessionGuard 
         * @static 
         */ 
        public static function setRequest($request)
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->setRequest($request);
        }
        
        /**
         * Determine if the current user is authenticated.
         *
         * @return \App\Eloquents\User 
         * @throws \Illuminate\Auth\AuthenticationException
         * @static 
         */ 
        public static function authenticate()
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->authenticate();
        }
        
        /**
         * Determine if the guard has a user instance.
         *
         * @return bool 
         * @static 
         */ 
        public static function hasUser()
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->hasUser();
        }
        
        /**
         * Determine if the current user is authenticated.
         *
         * @return bool 
         * @static 
         */ 
        public static function check()
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->check();
        }
        
        /**
         * Determine if the current user is a guest.
         *
         * @return bool 
         * @static 
         */ 
        public static function guest()
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->guest();
        }
        
        /**
         * Get the user provider used by the guard.
         *
         * @return \Illuminate\Contracts\Auth\UserProvider 
         * @static 
         */ 
        public static function getProvider()
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        return $instance->getProvider();
        }
        
        /**
         * Set the user provider used by the guard.
         *
         * @param \Illuminate\Contracts\Auth\UserProvider $provider
         * @return void 
         * @static 
         */ 
        public static function setProvider($provider)
        {
                        /** @var \Illuminate\Auth\SessionGuard $instance */
                        $instance->setProvider($provider);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param object|callable $macro
         * @return void 
         * @static 
         */ 
        public static function macro($name, $macro)
        {
                        \Illuminate\Auth\SessionGuard::macro($name, $macro);
        }
        
        /**
         * Mix another object into the class.
         *
         * @param object $mixin
         * @return void 
         * @throws \ReflectionException
         * @static 
         */ 
        public static function mixin($mixin)
        {
                        \Illuminate\Auth\SessionGuard::mixin($mixin);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasMacro($name)
        {
                        return \Illuminate\Auth\SessionGuard::hasMacro($name);
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\View\Compilers\BladeCompiler
     */ 
    class Blade {
        
        /**
         * Compile the view at the given path.
         *
         * @param string $path
         * @return void 
         * @static 
         */ 
        public static function compile($path = null)
        {
                        /** @var \Illuminate\View\Compilers\BladeCompiler $instance */
                        $instance->compile($path);
        }
        
        /**
         * Get the path currently being compiled.
         *
         * @return string 
         * @static 
         */ 
        public static function getPath()
        {
                        /** @var \Illuminate\View\Compilers\BladeCompiler $instance */
                        return $instance->getPath();
        }
        
        /**
         * Set the path currently being compiled.
         *
         * @param string $path
         * @return void 
         * @static 
         */ 
        public static function setPath($path)
        {
                        /** @var \Illuminate\View\Compilers\BladeCompiler $instance */
                        $instance->setPath($path);
        }
        
        /**
         * Compile the given Blade template contents.
         *
         * @param string $value
         * @return string 
         * @static 
         */ 
        public static function compileString($value)
        {
                        /** @var \Illuminate\View\Compilers\BladeCompiler $instance */
                        return $instance->compileString($value);
        }
        
        /**
         * Strip the parentheses from the given expression.
         *
         * @param string $expression
         * @return string 
         * @static 
         */ 
        public static function stripParentheses($expression)
        {
                        /** @var \Illuminate\View\Compilers\BladeCompiler $instance */
                        return $instance->stripParentheses($expression);
        }
        
        /**
         * Register a custom Blade compiler.
         *
         * @param callable $compiler
         * @return void 
         * @static 
         */ 
        public static function extend($compiler)
        {
                        /** @var \Illuminate\View\Compilers\BladeCompiler $instance */
                        $instance->extend($compiler);
        }
        
        /**
         * Get the extensions used by the compiler.
         *
         * @return array 
         * @static 
         */ 
        public static function getExtensions()
        {
                        /** @var \Illuminate\View\Compilers\BladeCompiler $instance */
                        return $instance->getExtensions();
        }
        
        /**
         * Register an "if" statement directive.
         *
         * @param string $name
         * @param callable $callback
         * @return void 
         * @static 
         */ 
        public static function if($name, $callback)
        {
                        /** @var \Illuminate\View\Compilers\BladeCompiler $instance */
                        $instance->if($name, $callback);
        }
        
        /**
         * Check the result of a condition.
         *
         * @param string $name
         * @param array $parameters
         * @return bool 
         * @static 
         */ 
        public static function check($name, ...$parameters)
        {
                        /** @var \Illuminate\View\Compilers\BladeCompiler $instance */
                        return $instance->check($name, ...$parameters);
        }
        
        /**
         * Register a component alias directive.
         *
         * @param string $path
         * @param string $alias
         * @return void 
         * @static 
         */ 
        public static function component($path, $alias = null)
        {
                        /** @var \Illuminate\View\Compilers\BladeCompiler $instance */
                        $instance->component($path, $alias);
        }
        
        /**
         * Register an include alias directive.
         *
         * @param string $path
         * @param string $alias
         * @return void 
         * @static 
         */ 
        public static function include($path, $alias = null)
        {
                        /** @var \Illuminate\View\Compilers\BladeCompiler $instance */
                        $instance->include($path, $alias);
        }
        
        /**
         * Register a handler for custom directives.
         *
         * @param string $name
         * @param callable $handler
         * @return void 
         * @static 
         */ 
        public static function directive($name, $handler)
        {
                        /** @var \Illuminate\View\Compilers\BladeCompiler $instance */
                        $instance->directive($name, $handler);
        }
        
        /**
         * Get the list of custom directives.
         *
         * @return array 
         * @static 
         */ 
        public static function getCustomDirectives()
        {
                        /** @var \Illuminate\View\Compilers\BladeCompiler $instance */
                        return $instance->getCustomDirectives();
        }
        
        /**
         * Set the echo format to be used by the compiler.
         *
         * @param string $format
         * @return void 
         * @static 
         */ 
        public static function setEchoFormat($format)
        {
                        /** @var \Illuminate\View\Compilers\BladeCompiler $instance */
                        $instance->setEchoFormat($format);
        }
        
        /**
         * Set the "echo" format to double encode entities.
         *
         * @return void 
         * @static 
         */ 
        public static function withDoubleEncoding()
        {
                        /** @var \Illuminate\View\Compilers\BladeCompiler $instance */
                        $instance->withDoubleEncoding();
        }
        
        /**
         * Set the "echo" format to not double encode entities.
         *
         * @return void 
         * @static 
         */ 
        public static function withoutDoubleEncoding()
        {
                        /** @var \Illuminate\View\Compilers\BladeCompiler $instance */
                        $instance->withoutDoubleEncoding();
        }
        
        /**
         * Get the path to the compiled version of a view.
         *
         * @param string $path
         * @return string 
         * @static 
         */ 
        public static function getCompiledPath($path)
        {
            //Method inherited from \Illuminate\View\Compilers\Compiler            
                        /** @var \Illuminate\View\Compilers\BladeCompiler $instance */
                        return $instance->getCompiledPath($path);
        }
        
        /**
         * Determine if the view at the given path is expired.
         *
         * @param string $path
         * @return bool 
         * @static 
         */ 
        public static function isExpired($path)
        {
            //Method inherited from \Illuminate\View\Compilers\Compiler            
                        /** @var \Illuminate\View\Compilers\BladeCompiler $instance */
                        return $instance->isExpired($path);
        }
        
        /**
         * Compile the default values for the echo statement.
         *
         * @param string $value
         * @return string 
         * @static 
         */ 
        public static function compileEchoDefaults($value)
        {
                        /** @var \Illuminate\View\Compilers\BladeCompiler $instance */
                        return $instance->compileEchoDefaults($value);
        }
         
    }

    /**
     * 
     *
     * @method static \Illuminate\Broadcasting\Broadcasters\Broadcaster channel(string $channel, callable|string  $callback)
     * @method static mixed auth(\Illuminate\Http\Request $request)
     * @see \Illuminate\Contracts\Broadcasting\Factory
     */ 
    class Broadcast {
        
        /**
         * Register the routes for handling broadcast authentication and sockets.
         *
         * @param array|null $attributes
         * @return void 
         * @static 
         */ 
        public static function routes($attributes = null)
        {
                        /** @var \Illuminate\Broadcasting\BroadcastManager $instance */
                        $instance->routes($attributes);
        }
        
        /**
         * Get the socket ID for the given request.
         *
         * @param \Illuminate\Http\Request|null $request
         * @return string|null 
         * @static 
         */ 
        public static function socket($request = null)
        {
                        /** @var \Illuminate\Broadcasting\BroadcastManager $instance */
                        return $instance->socket($request);
        }
        
        /**
         * Begin broadcasting an event.
         *
         * @param mixed|null $event
         * @return \Illuminate\Broadcasting\PendingBroadcast|void 
         * @static 
         */ 
        public static function event($event = null)
        {
                        /** @var \Illuminate\Broadcasting\BroadcastManager $instance */
                        return $instance->event($event);
        }
        
        /**
         * Queue the given event for broadcast.
         *
         * @param mixed $event
         * @return void 
         * @static 
         */ 
        public static function queue($event)
        {
                        /** @var \Illuminate\Broadcasting\BroadcastManager $instance */
                        $instance->queue($event);
        }
        
        /**
         * Get a driver instance.
         *
         * @param string $driver
         * @return mixed 
         * @static 
         */ 
        public static function connection($driver = null)
        {
                        /** @var \Illuminate\Broadcasting\BroadcastManager $instance */
                        return $instance->connection($driver);
        }
        
        /**
         * Get a driver instance.
         *
         * @param string|null $name
         * @return mixed 
         * @static 
         */ 
        public static function driver($name = null)
        {
                        /** @var \Illuminate\Broadcasting\BroadcastManager $instance */
                        return $instance->driver($name);
        }
        
        /**
         * Get the default driver name.
         *
         * @return string 
         * @static 
         */ 
        public static function getDefaultDriver()
        {
                        /** @var \Illuminate\Broadcasting\BroadcastManager $instance */
                        return $instance->getDefaultDriver();
        }
        
        /**
         * Set the default driver name.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function setDefaultDriver($name)
        {
                        /** @var \Illuminate\Broadcasting\BroadcastManager $instance */
                        $instance->setDefaultDriver($name);
        }
        
        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return \Illuminate\Broadcasting\BroadcastManager 
         * @static 
         */ 
        public static function extend($driver, $callback)
        {
                        /** @var \Illuminate\Broadcasting\BroadcastManager $instance */
                        return $instance->extend($driver, $callback);
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Contracts\Bus\Dispatcher
     */ 
    class Bus {
        
        /**
         * Dispatch a command to its appropriate handler.
         *
         * @param mixed $command
         * @return mixed 
         * @static 
         */ 
        public static function dispatch($command)
        {
                        /** @var \Illuminate\Bus\Dispatcher $instance */
                        return $instance->dispatch($command);
        }
        
        /**
         * Dispatch a command to its appropriate handler in the current process.
         *
         * @param mixed $command
         * @param mixed $handler
         * @return mixed 
         * @static 
         */ 
        public static function dispatchNow($command, $handler = null)
        {
                        /** @var \Illuminate\Bus\Dispatcher $instance */
                        return $instance->dispatchNow($command, $handler);
        }
        
        /**
         * Determine if the given command has a handler.
         *
         * @param mixed $command
         * @return bool 
         * @static 
         */ 
        public static function hasCommandHandler($command)
        {
                        /** @var \Illuminate\Bus\Dispatcher $instance */
                        return $instance->hasCommandHandler($command);
        }
        
        /**
         * Retrieve the handler for a command.
         *
         * @param mixed $command
         * @return bool|mixed 
         * @static 
         */ 
        public static function getCommandHandler($command)
        {
                        /** @var \Illuminate\Bus\Dispatcher $instance */
                        return $instance->getCommandHandler($command);
        }
        
        /**
         * Dispatch a command to its appropriate handler behind a queue.
         *
         * @param mixed $command
         * @return mixed 
         * @throws \RuntimeException
         * @static 
         */ 
        public static function dispatchToQueue($command)
        {
                        /** @var \Illuminate\Bus\Dispatcher $instance */
                        return $instance->dispatchToQueue($command);
        }
        
        /**
         * Set the pipes through which commands should be piped before dispatching.
         *
         * @param array $pipes
         * @return \Illuminate\Bus\Dispatcher 
         * @static 
         */ 
        public static function pipeThrough($pipes)
        {
                        /** @var \Illuminate\Bus\Dispatcher $instance */
                        return $instance->pipeThrough($pipes);
        }
        
        /**
         * Map a command to a handler.
         *
         * @param array $map
         * @return \Illuminate\Bus\Dispatcher 
         * @static 
         */ 
        public static function map($map)
        {
                        /** @var \Illuminate\Bus\Dispatcher $instance */
                        return $instance->map($map);
        }
        
        /**
         * Assert if a job was dispatched based on a truth-test callback.
         *
         * @param string $command
         * @param callable|int|null $callback
         * @return void 
         * @static 
         */ 
        public static function assertDispatched($command, $callback = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\BusFake $instance */
                        $instance->assertDispatched($command, $callback);
        }
        
        /**
         * Determine if a job was dispatched based on a truth-test callback.
         *
         * @param string $command
         * @param callable|null $callback
         * @return void 
         * @static 
         */ 
        public static function assertNotDispatched($command, $callback = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\BusFake $instance */
                        $instance->assertNotDispatched($command, $callback);
        }
        
        /**
         * Get all of the jobs matching a truth-test callback.
         *
         * @param string $command
         * @param callable|null $callback
         * @return \Illuminate\Support\Collection 
         * @static 
         */ 
        public static function dispatched($command, $callback = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\BusFake $instance */
                        return $instance->dispatched($command, $callback);
        }
        
        /**
         * Determine if there are any stored commands for a given class.
         *
         * @param string $command
         * @return bool 
         * @static 
         */ 
        public static function hasDispatched($command)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\BusFake $instance */
                        return $instance->hasDispatched($command);
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Cache\CacheManager
     * @see \Illuminate\Cache\Repository
     */ 
    class Cache {
        
        /**
         * Get a cache store instance by name.
         *
         * @param string|null $name
         * @return \Illuminate\Contracts\Cache\Repository 
         * @static 
         */ 
        public static function store($name = null)
        {
                        /** @var \Illuminate\Cache\CacheManager $instance */
                        return $instance->store($name);
        }
        
        /**
         * Get a cache driver instance.
         *
         * @param string|null $driver
         * @return mixed 
         * @static 
         */ 
        public static function driver($driver = null)
        {
                        /** @var \Illuminate\Cache\CacheManager $instance */
                        return $instance->driver($driver);
        }
        
        /**
         * Create a new cache repository with the given implementation.
         *
         * @param \Illuminate\Contracts\Cache\Store $store
         * @return \Illuminate\Cache\Repository 
         * @static 
         */ 
        public static function repository($store)
        {
                        /** @var \Illuminate\Cache\CacheManager $instance */
                        return $instance->repository($store);
        }
        
        /**
         * Get the default cache driver name.
         *
         * @return string 
         * @static 
         */ 
        public static function getDefaultDriver()
        {
                        /** @var \Illuminate\Cache\CacheManager $instance */
                        return $instance->getDefaultDriver();
        }
        
        /**
         * Set the default cache driver name.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function setDefaultDriver($name)
        {
                        /** @var \Illuminate\Cache\CacheManager $instance */
                        $instance->setDefaultDriver($name);
        }
        
        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return \Illuminate\Cache\CacheManager 
         * @static 
         */ 
        public static function extend($driver, $callback)
        {
                        /** @var \Illuminate\Cache\CacheManager $instance */
                        return $instance->extend($driver, $callback);
        }
        
        /**
         * Determine if an item exists in the cache.
         *
         * @param string $key
         * @return bool 
         * @static 
         */ 
        public static function has($key)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->has($key);
        }
        
        /**
         * Retrieve an item from the cache by key.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed 
         * @static 
         */ 
        public static function get($key, $default = null)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->get($key, $default);
        }
        
        /**
         * Retrieve multiple items from the cache by key.
         * 
         * Items not found in the cache will have a null value.
         *
         * @param array $keys
         * @return array 
         * @static 
         */ 
        public static function many($keys)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->many($keys);
        }
        
        /**
         * Obtains multiple cache items by their unique keys.
         *
         * @param \Psr\SimpleCache\iterable $keys A list of keys that can obtained in a single operation.
         * @param mixed $default Default value to return for keys that do not exist.
         * @return \Psr\SimpleCache\iterable A list of key => value pairs. Cache keys that do not exist or are stale will have $default as value.
         * @throws \Psr\SimpleCache\InvalidArgumentException
         *   MUST be thrown if $keys is neither an array nor a Traversable,
         *   or if any of the $keys are not a legal value.
         * @static 
         */ 
        public static function getMultiple($keys, $default = null)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->getMultiple($keys, $default);
        }
        
        /**
         * Retrieve an item from the cache and delete it.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed 
         * @static 
         */ 
        public static function pull($key, $default = null)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->pull($key, $default);
        }
        
        /**
         * Store an item in the cache.
         *
         * @param string $key
         * @param mixed $value
         * @param \DateTimeInterface|\DateInterval|float|int|null $minutes
         * @return void 
         * @static 
         */ 
        public static function put($key, $value, $minutes = null)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        $instance->put($key, $value, $minutes);
        }
        
        /**
         * Persists data in the cache, uniquely referenced by a key with an optional expiration TTL time.
         *
         * @param string $key The key of the item to store.
         * @param mixed $value The value of the item to store, must be serializable.
         * @param null|int|\DateInterval $ttl Optional. The TTL value of this item. If no value is sent and
         *                                      the driver supports TTL then the library may set a default value
         *                                      for it or let the driver take care of that.
         * @return bool True on success and false on failure.
         * @throws \Psr\SimpleCache\InvalidArgumentException
         *   MUST be thrown if the $key string is not a legal value.
         * @static 
         */ 
        public static function set($key, $value, $ttl = null)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->set($key, $value, $ttl);
        }
        
        /**
         * Store multiple items in the cache for a given number of minutes.
         *
         * @param array $values
         * @param \DateTimeInterface|\DateInterval|float|int $minutes
         * @return void 
         * @static 
         */ 
        public static function putMany($values, $minutes)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        $instance->putMany($values, $minutes);
        }
        
        /**
         * Persists a set of key => value pairs in the cache, with an optional TTL.
         *
         * @param \Psr\SimpleCache\iterable $values A list of key => value pairs for a multiple-set operation.
         * @param null|int|\DateInterval $ttl Optional. The TTL value of this item. If no value is sent and
         *                                       the driver supports TTL then the library may set a default value
         *                                       for it or let the driver take care of that.
         * @return bool True on success and false on failure.
         * @throws \Psr\SimpleCache\InvalidArgumentException
         *   MUST be thrown if $values is neither an array nor a Traversable,
         *   or if any of the $values are not a legal value.
         * @static 
         */ 
        public static function setMultiple($values, $ttl = null)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->setMultiple($values, $ttl);
        }
        
        /**
         * Store an item in the cache if the key does not exist.
         *
         * @param string $key
         * @param mixed $value
         * @param \DateTimeInterface|\DateInterval|float|int $minutes
         * @return bool 
         * @static 
         */ 
        public static function add($key, $value, $minutes)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->add($key, $value, $minutes);
        }
        
        /**
         * Increment the value of an item in the cache.
         *
         * @param string $key
         * @param mixed $value
         * @return int|bool 
         * @static 
         */ 
        public static function increment($key, $value = 1)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->increment($key, $value);
        }
        
        /**
         * Decrement the value of an item in the cache.
         *
         * @param string $key
         * @param mixed $value
         * @return int|bool 
         * @static 
         */ 
        public static function decrement($key, $value = 1)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->decrement($key, $value);
        }
        
        /**
         * Store an item in the cache indefinitely.
         *
         * @param string $key
         * @param mixed $value
         * @return void 
         * @static 
         */ 
        public static function forever($key, $value)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        $instance->forever($key, $value);
        }
        
        /**
         * Get an item from the cache, or store the default value.
         *
         * @param string $key
         * @param \DateTimeInterface|\DateInterval|float|int $minutes
         * @param \Closure $callback
         * @return mixed 
         * @static 
         */ 
        public static function remember($key, $minutes, $callback)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->remember($key, $minutes, $callback);
        }
        
        /**
         * Get an item from the cache, or store the default value forever.
         *
         * @param string $key
         * @param \Closure $callback
         * @return mixed 
         * @static 
         */ 
        public static function sear($key, $callback)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->sear($key, $callback);
        }
        
        /**
         * Get an item from the cache, or store the default value forever.
         *
         * @param string $key
         * @param \Closure $callback
         * @return mixed 
         * @static 
         */ 
        public static function rememberForever($key, $callback)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->rememberForever($key, $callback);
        }
        
        /**
         * Remove an item from the cache.
         *
         * @param string $key
         * @return bool 
         * @static 
         */ 
        public static function forget($key)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->forget($key);
        }
        
        /**
         * Delete an item from the cache by its unique key.
         *
         * @param string $key The unique cache key of the item to delete.
         * @return bool True if the item was successfully removed. False if there was an error.
         * @throws \Psr\SimpleCache\InvalidArgumentException
         *   MUST be thrown if the $key string is not a legal value.
         * @static 
         */ 
        public static function delete($key)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->delete($key);
        }
        
        /**
         * Deletes multiple cache items in a single operation.
         *
         * @param \Psr\SimpleCache\iterable $keys A list of string-based keys to be deleted.
         * @return bool True if the items were successfully removed. False if there was an error.
         * @throws \Psr\SimpleCache\InvalidArgumentException
         *   MUST be thrown if $keys is neither an array nor a Traversable,
         *   or if any of the $keys are not a legal value.
         * @static 
         */ 
        public static function deleteMultiple($keys)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->deleteMultiple($keys);
        }
        
        /**
         * Wipes clean the entire cache's keys.
         *
         * @return bool True on success and false on failure.
         * @static 
         */ 
        public static function clear()
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->clear();
        }
        
        /**
         * Begin executing a new tags operation if the store supports it.
         *
         * @param array|mixed $names
         * @return \Illuminate\Cache\TaggedCache 
         * @throws \BadMethodCallException
         * @static 
         */ 
        public static function tags($names)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->tags($names);
        }
        
        /**
         * Get the default cache time.
         *
         * @return float|int 
         * @static 
         */ 
        public static function getDefaultCacheTime()
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->getDefaultCacheTime();
        }
        
        /**
         * Set the default cache time in minutes.
         *
         * @param float|int $minutes
         * @return \Illuminate\Cache\Repository 
         * @static 
         */ 
        public static function setDefaultCacheTime($minutes)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->setDefaultCacheTime($minutes);
        }
        
        /**
         * Get the cache store implementation.
         *
         * @return \Illuminate\Contracts\Cache\Store 
         * @static 
         */ 
        public static function getStore()
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->getStore();
        }
        
        /**
         * Set the event dispatcher instance.
         *
         * @param \Illuminate\Contracts\Events\Dispatcher $events
         * @return void 
         * @static 
         */ 
        public static function setEventDispatcher($events)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        $instance->setEventDispatcher($events);
        }
        
        /**
         * Determine if a cached value exists.
         *
         * @param string $key
         * @return bool 
         * @static 
         */ 
        public static function offsetExists($key)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->offsetExists($key);
        }
        
        /**
         * Retrieve an item from the cache by key.
         *
         * @param string $key
         * @return mixed 
         * @static 
         */ 
        public static function offsetGet($key)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->offsetGet($key);
        }
        
        /**
         * Store an item in the cache for the default time.
         *
         * @param string $key
         * @param mixed $value
         * @return void 
         * @static 
         */ 
        public static function offsetSet($key, $value)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        $instance->offsetSet($key, $value);
        }
        
        /**
         * Remove an item from the cache.
         *
         * @param string $key
         * @return void 
         * @static 
         */ 
        public static function offsetUnset($key)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        $instance->offsetUnset($key);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param object|callable $macro
         * @return void 
         * @static 
         */ 
        public static function macro($name, $macro)
        {
                        \Illuminate\Cache\Repository::macro($name, $macro);
        }
        
        /**
         * Mix another object into the class.
         *
         * @param object $mixin
         * @return void 
         * @throws \ReflectionException
         * @static 
         */ 
        public static function mixin($mixin)
        {
                        \Illuminate\Cache\Repository::mixin($mixin);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasMacro($name)
        {
                        return \Illuminate\Cache\Repository::hasMacro($name);
        }
        
        /**
         * Dynamically handle calls to the class.
         *
         * @param string $method
         * @param array $parameters
         * @return mixed 
         * @throws \BadMethodCallException
         * @static 
         */ 
        public static function macroCall($method, $parameters)
        {
                        /** @var \Illuminate\Cache\Repository $instance */
                        return $instance->macroCall($method, $parameters);
        }
        
        /**
         * Get a lock instance.
         *
         * @param string $name
         * @param int $seconds
         * @return \Illuminate\Contracts\Cache\Lock 
         * @static 
         */ 
        public static function lock($name, $seconds = 0)
        {
                        /** @var \Illuminate\Cache\RedisStore $instance */
                        return $instance->lock($name, $seconds);
        }
        
        /**
         * Remove all items from the cache.
         *
         * @return bool 
         * @static 
         */ 
        public static function flush()
        {
                        /** @var \Illuminate\Cache\RedisStore $instance */
                        return $instance->flush();
        }
        
        /**
         * Get the Redis connection instance.
         *
         * @return \Predis\ClientInterface 
         * @static 
         */ 
        public static function connection()
        {
                        /** @var \Illuminate\Cache\RedisStore $instance */
                        return $instance->connection();
        }
        
        /**
         * Set the connection name to be used.
         *
         * @param string $connection
         * @return void 
         * @static 
         */ 
        public static function setConnection($connection)
        {
                        /** @var \Illuminate\Cache\RedisStore $instance */
                        $instance->setConnection($connection);
        }
        
        /**
         * Get the Redis database instance.
         *
         * @return \Illuminate\Contracts\Redis\Factory 
         * @static 
         */ 
        public static function getRedis()
        {
                        /** @var \Illuminate\Cache\RedisStore $instance */
                        return $instance->getRedis();
        }
        
        /**
         * Get the cache key prefix.
         *
         * @return string 
         * @static 
         */ 
        public static function getPrefix()
        {
                        /** @var \Illuminate\Cache\RedisStore $instance */
                        return $instance->getPrefix();
        }
        
        /**
         * Set the cache key prefix.
         *
         * @param string $prefix
         * @return void 
         * @static 
         */ 
        public static function setPrefix($prefix)
        {
                        /** @var \Illuminate\Cache\RedisStore $instance */
                        $instance->setPrefix($prefix);
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Config\Repository
     */ 
    class Config {
        
        /**
         * Determine if the given configuration value exists.
         *
         * @param string $key
         * @return bool 
         * @static 
         */ 
        public static function has($key)
        {
                        /** @var \Illuminate\Config\Repository $instance */
                        return $instance->has($key);
        }
        
        /**
         * Get the specified configuration value.
         *
         * @param array|string $key
         * @param mixed $default
         * @return mixed 
         * @static 
         */ 
        public static function get($key, $default = null)
        {
                        /** @var \Illuminate\Config\Repository $instance */
                        return $instance->get($key, $default);
        }
        
        /**
         * Get many configuration values.
         *
         * @param array $keys
         * @return array 
         * @static 
         */ 
        public static function getMany($keys)
        {
                        /** @var \Illuminate\Config\Repository $instance */
                        return $instance->getMany($keys);
        }
        
        /**
         * Set a given configuration value.
         *
         * @param array|string $key
         * @param mixed $value
         * @return void 
         * @static 
         */ 
        public static function set($key, $value = null)
        {
                        /** @var \Illuminate\Config\Repository $instance */
                        $instance->set($key, $value);
        }
        
        /**
         * Prepend a value onto an array configuration value.
         *
         * @param string $key
         * @param mixed $value
         * @return void 
         * @static 
         */ 
        public static function prepend($key, $value)
        {
                        /** @var \Illuminate\Config\Repository $instance */
                        $instance->prepend($key, $value);
        }
        
        /**
         * Push a value onto an array configuration value.
         *
         * @param string $key
         * @param mixed $value
         * @return void 
         * @static 
         */ 
        public static function push($key, $value)
        {
                        /** @var \Illuminate\Config\Repository $instance */
                        $instance->push($key, $value);
        }
        
        /**
         * Get all of the configuration items for the application.
         *
         * @return array 
         * @static 
         */ 
        public static function all()
        {
                        /** @var \Illuminate\Config\Repository $instance */
                        return $instance->all();
        }
        
        /**
         * Determine if the given configuration option exists.
         *
         * @param string $key
         * @return bool 
         * @static 
         */ 
        public static function offsetExists($key)
        {
                        /** @var \Illuminate\Config\Repository $instance */
                        return $instance->offsetExists($key);
        }
        
        /**
         * Get a configuration option.
         *
         * @param string $key
         * @return mixed 
         * @static 
         */ 
        public static function offsetGet($key)
        {
                        /** @var \Illuminate\Config\Repository $instance */
                        return $instance->offsetGet($key);
        }
        
        /**
         * Set a configuration option.
         *
         * @param string $key
         * @param mixed $value
         * @return void 
         * @static 
         */ 
        public static function offsetSet($key, $value)
        {
                        /** @var \Illuminate\Config\Repository $instance */
                        $instance->offsetSet($key, $value);
        }
        
        /**
         * Unset a configuration option.
         *
         * @param string $key
         * @return void 
         * @static 
         */ 
        public static function offsetUnset($key)
        {
                        /** @var \Illuminate\Config\Repository $instance */
                        $instance->offsetUnset($key);
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Cookie\CookieJar
     */ 
    class Cookie {
        
        /**
         * Create a new cookie instance.
         *
         * @param string $name
         * @param string $value
         * @param int $minutes
         * @param string $path
         * @param string $domain
         * @param bool|null $secure
         * @param bool $httpOnly
         * @param bool $raw
         * @param string|null $sameSite
         * @return \Symfony\Component\HttpFoundation\Cookie 
         * @static 
         */ 
        public static function make($name, $value, $minutes = 0, $path = null, $domain = null, $secure = null, $httpOnly = true, $raw = false, $sameSite = null)
        {
                        /** @var \Illuminate\Cookie\CookieJar $instance */
                        return $instance->make($name, $value, $minutes, $path, $domain, $secure, $httpOnly, $raw, $sameSite);
        }
        
        /**
         * Create a cookie that lasts "forever" (five years).
         *
         * @param string $name
         * @param string $value
         * @param string $path
         * @param string $domain
         * @param bool|null $secure
         * @param bool $httpOnly
         * @param bool $raw
         * @param string|null $sameSite
         * @return \Symfony\Component\HttpFoundation\Cookie 
         * @static 
         */ 
        public static function forever($name, $value, $path = null, $domain = null, $secure = null, $httpOnly = true, $raw = false, $sameSite = null)
        {
                        /** @var \Illuminate\Cookie\CookieJar $instance */
                        return $instance->forever($name, $value, $path, $domain, $secure, $httpOnly, $raw, $sameSite);
        }
        
        /**
         * Expire the given cookie.
         *
         * @param string $name
         * @param string $path
         * @param string $domain
         * @return \Symfony\Component\HttpFoundation\Cookie 
         * @static 
         */ 
        public static function forget($name, $path = null, $domain = null)
        {
                        /** @var \Illuminate\Cookie\CookieJar $instance */
                        return $instance->forget($name, $path, $domain);
        }
        
        /**
         * Determine if a cookie has been queued.
         *
         * @param string $key
         * @return bool 
         * @static 
         */ 
        public static function hasQueued($key)
        {
                        /** @var \Illuminate\Cookie\CookieJar $instance */
                        return $instance->hasQueued($key);
        }
        
        /**
         * Get a queued cookie instance.
         *
         * @param string $key
         * @param mixed $default
         * @return \Symfony\Component\HttpFoundation\Cookie 
         * @static 
         */ 
        public static function queued($key, $default = null)
        {
                        /** @var \Illuminate\Cookie\CookieJar $instance */
                        return $instance->queued($key, $default);
        }
        
        /**
         * Queue a cookie to send with the next response.
         *
         * @param array $parameters
         * @return void 
         * @static 
         */ 
        public static function queue(...$parameters)
        {
                        /** @var \Illuminate\Cookie\CookieJar $instance */
                        $instance->queue(...$parameters);
        }
        
        /**
         * Remove a cookie from the queue.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function unqueue($name)
        {
                        /** @var \Illuminate\Cookie\CookieJar $instance */
                        $instance->unqueue($name);
        }
        
        /**
         * Set the default path and domain for the jar.
         *
         * @param string $path
         * @param string $domain
         * @param bool $secure
         * @param string $sameSite
         * @return \Illuminate\Cookie\CookieJar 
         * @static 
         */ 
        public static function setDefaultPathAndDomain($path, $domain, $secure = false, $sameSite = null)
        {
                        /** @var \Illuminate\Cookie\CookieJar $instance */
                        return $instance->setDefaultPathAndDomain($path, $domain, $secure, $sameSite);
        }
        
        /**
         * Get the cookies which have been queued for the next request.
         *
         * @return \Symfony\Component\HttpFoundation\Cookie[] 
         * @static 
         */ 
        public static function getQueuedCookies()
        {
                        /** @var \Illuminate\Cookie\CookieJar $instance */
                        return $instance->getQueuedCookies();
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Encryption\Encrypter
     */ 
    class Crypt {
        
        /**
         * Determine if the given key and cipher combination is valid.
         *
         * @param string $key
         * @param string $cipher
         * @return bool 
         * @static 
         */ 
        public static function supported($key, $cipher)
        {
                        return \Illuminate\Encryption\Encrypter::supported($key, $cipher);
        }
        
        /**
         * Create a new encryption key for the given cipher.
         *
         * @param string $cipher
         * @return string 
         * @static 
         */ 
        public static function generateKey($cipher)
        {
                        return \Illuminate\Encryption\Encrypter::generateKey($cipher);
        }
        
        /**
         * Encrypt the given value.
         *
         * @param mixed $value
         * @param bool $serialize
         * @return string 
         * @throws \Illuminate\Contracts\Encryption\EncryptException
         * @static 
         */ 
        public static function encrypt($value, $serialize = true)
        {
                        /** @var \Illuminate\Encryption\Encrypter $instance */
                        return $instance->encrypt($value, $serialize);
        }
        
        /**
         * Encrypt a string without serialization.
         *
         * @param string $value
         * @return string 
         * @static 
         */ 
        public static function encryptString($value)
        {
                        /** @var \Illuminate\Encryption\Encrypter $instance */
                        return $instance->encryptString($value);
        }
        
        /**
         * Decrypt the given value.
         *
         * @param mixed $payload
         * @param bool $unserialize
         * @return mixed 
         * @throws \Illuminate\Contracts\Encryption\DecryptException
         * @static 
         */ 
        public static function decrypt($payload, $unserialize = true)
        {
                        /** @var \Illuminate\Encryption\Encrypter $instance */
                        return $instance->decrypt($payload, $unserialize);
        }
        
        /**
         * Decrypt the given string without unserialization.
         *
         * @param string $payload
         * @return string 
         * @static 
         */ 
        public static function decryptString($payload)
        {
                        /** @var \Illuminate\Encryption\Encrypter $instance */
                        return $instance->decryptString($payload);
        }
        
        /**
         * Get the encryption key.
         *
         * @return string 
         * @static 
         */ 
        public static function getKey()
        {
                        /** @var \Illuminate\Encryption\Encrypter $instance */
                        return $instance->getKey();
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Database\DatabaseManager
     * @see \Illuminate\Database\Connection
     */ 
    class DB {
        
        /**
         * Get a database connection instance.
         *
         * @param string $name
         * @return \Illuminate\Database\Connection 
         * @static 
         */ 
        public static function connection($name = null)
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        return $instance->connection($name);
        }
        
        /**
         * Disconnect from the given database and remove from local cache.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function purge($name = null)
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        $instance->purge($name);
        }
        
        /**
         * Disconnect from the given database.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function disconnect($name = null)
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        $instance->disconnect($name);
        }
        
        /**
         * Reconnect to the given database.
         *
         * @param string $name
         * @return \Illuminate\Database\Connection 
         * @static 
         */ 
        public static function reconnect($name = null)
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        return $instance->reconnect($name);
        }
        
        /**
         * Get the default connection name.
         *
         * @return string 
         * @static 
         */ 
        public static function getDefaultConnection()
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        return $instance->getDefaultConnection();
        }
        
        /**
         * Set the default connection name.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function setDefaultConnection($name)
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        $instance->setDefaultConnection($name);
        }
        
        /**
         * Get all of the support drivers.
         *
         * @return array 
         * @static 
         */ 
        public static function supportedDrivers()
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        return $instance->supportedDrivers();
        }
        
        /**
         * Get all of the drivers that are actually available.
         *
         * @return array 
         * @static 
         */ 
        public static function availableDrivers()
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        return $instance->availableDrivers();
        }
        
        /**
         * Register an extension connection resolver.
         *
         * @param string $name
         * @param callable $resolver
         * @return void 
         * @static 
         */ 
        public static function extend($name, $resolver)
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        $instance->extend($name, $resolver);
        }
        
        /**
         * Return all of the created connections.
         *
         * @return array 
         * @static 
         */ 
        public static function getConnections()
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        return $instance->getConnections();
        }
        
        /**
         * Get a schema builder instance for the connection.
         *
         * @return \Illuminate\Database\Schema\MySqlBuilder 
         * @static 
         */ 
        public static function getSchemaBuilder()
        {
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->getSchemaBuilder();
        }
        
        /**
         * Bind values to their parameters in the given statement.
         *
         * @param \PDOStatement $statement
         * @param array $bindings
         * @return void 
         * @static 
         */ 
        public static function bindValues($statement, $bindings)
        {
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        $instance->bindValues($statement, $bindings);
        }
        
        /**
         * Set the query grammar to the default implementation.
         *
         * @return void 
         * @static 
         */ 
        public static function useDefaultQueryGrammar()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        $instance->useDefaultQueryGrammar();
        }
        
        /**
         * Set the schema grammar to the default implementation.
         *
         * @return void 
         * @static 
         */ 
        public static function useDefaultSchemaGrammar()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        $instance->useDefaultSchemaGrammar();
        }
        
        /**
         * Set the query post processor to the default implementation.
         *
         * @return void 
         * @static 
         */ 
        public static function useDefaultPostProcessor()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        $instance->useDefaultPostProcessor();
        }
        
        /**
         * Begin a fluent query against a database table.
         *
         * @param string $table
         * @return \Illuminate\Database\Query\Builder 
         * @static 
         */ 
        public static function table($table)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->table($table);
        }
        
        /**
         * Get a new query builder instance.
         *
         * @return \Illuminate\Database\Query\Builder 
         * @static 
         */ 
        public static function query()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->query();
        }
        
        /**
         * Run a select statement and return a single result.
         *
         * @param string $query
         * @param array $bindings
         * @param bool $useReadPdo
         * @return mixed 
         * @static 
         */ 
        public static function selectOne($query, $bindings = [], $useReadPdo = true)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->selectOne($query, $bindings, $useReadPdo);
        }
        
        /**
         * Run a select statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @return array 
         * @static 
         */ 
        public static function selectFromWriteConnection($query, $bindings = [])
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->selectFromWriteConnection($query, $bindings);
        }
        
        /**
         * Run a select statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @param bool $useReadPdo
         * @return array 
         * @static 
         */ 
        public static function select($query, $bindings = [], $useReadPdo = true)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->select($query, $bindings, $useReadPdo);
        }
        
        /**
         * Run a select statement against the database and returns a generator.
         *
         * @param string $query
         * @param array $bindings
         * @param bool $useReadPdo
         * @return \Generator 
         * @static 
         */ 
        public static function cursor($query, $bindings = [], $useReadPdo = true)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->cursor($query, $bindings, $useReadPdo);
        }
        
        /**
         * Run an insert statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @return bool 
         * @static 
         */ 
        public static function insert($query, $bindings = [])
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->insert($query, $bindings);
        }
        
        /**
         * Run an update statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @return int 
         * @static 
         */ 
        public static function update($query, $bindings = [])
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->update($query, $bindings);
        }
        
        /**
         * Run a delete statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @return int 
         * @static 
         */ 
        public static function delete($query, $bindings = [])
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->delete($query, $bindings);
        }
        
        /**
         * Execute an SQL statement and return the boolean result.
         *
         * @param string $query
         * @param array $bindings
         * @return bool 
         * @static 
         */ 
        public static function statement($query, $bindings = [])
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->statement($query, $bindings);
        }
        
        /**
         * Run an SQL statement and get the number of rows affected.
         *
         * @param string $query
         * @param array $bindings
         * @return int 
         * @static 
         */ 
        public static function affectingStatement($query, $bindings = [])
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->affectingStatement($query, $bindings);
        }
        
        /**
         * Run a raw, unprepared query against the PDO connection.
         *
         * @param string $query
         * @return bool 
         * @static 
         */ 
        public static function unprepared($query)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->unprepared($query);
        }
        
        /**
         * Execute the given callback in "dry run" mode.
         *
         * @param \Closure $callback
         * @return array 
         * @static 
         */ 
        public static function pretend($callback)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->pretend($callback);
        }
        
        /**
         * Prepare the query bindings for execution.
         *
         * @param array $bindings
         * @return array 
         * @static 
         */ 
        public static function prepareBindings($bindings)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->prepareBindings($bindings);
        }
        
        /**
         * Log a query in the connection's query log.
         *
         * @param string $query
         * @param array $bindings
         * @param float|null $time
         * @return void 
         * @static 
         */ 
        public static function logQuery($query, $bindings, $time = null)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        $instance->logQuery($query, $bindings, $time);
        }
        
        /**
         * Register a database query listener with the connection.
         *
         * @param \Closure $callback
         * @return void 
         * @static 
         */ 
        public static function listen($callback)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        $instance->listen($callback);
        }
        
        /**
         * Get a new raw query expression.
         *
         * @param mixed $value
         * @return \Illuminate\Database\Query\Expression 
         * @static 
         */ 
        public static function raw($value)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->raw($value);
        }
        
        /**
         * Indicate if any records have been modified.
         *
         * @param bool $value
         * @return void 
         * @static 
         */ 
        public static function recordsHaveBeenModified($value = true)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        $instance->recordsHaveBeenModified($value);
        }
        
        /**
         * Is Doctrine available?
         *
         * @return bool 
         * @static 
         */ 
        public static function isDoctrineAvailable()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->isDoctrineAvailable();
        }
        
        /**
         * Get a Doctrine Schema Column instance.
         *
         * @param string $table
         * @param string $column
         * @return \Doctrine\DBAL\Schema\Column 
         * @static 
         */ 
        public static function getDoctrineColumn($table, $column)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->getDoctrineColumn($table, $column);
        }
        
        /**
         * Get the Doctrine DBAL schema manager for the connection.
         *
         * @return \Doctrine\DBAL\Schema\AbstractSchemaManager 
         * @static 
         */ 
        public static function getDoctrineSchemaManager()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->getDoctrineSchemaManager();
        }
        
        /**
         * Get the Doctrine DBAL database connection instance.
         *
         * @return \Doctrine\DBAL\Connection 
         * @static 
         */ 
        public static function getDoctrineConnection()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->getDoctrineConnection();
        }
        
        /**
         * Get the current PDO connection.
         *
         * @return \PDO 
         * @static 
         */ 
        public static function getPdo()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->getPdo();
        }
        
        /**
         * Get the current PDO connection used for reading.
         *
         * @return \PDO 
         * @static 
         */ 
        public static function getReadPdo()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->getReadPdo();
        }
        
        /**
         * Set the PDO connection.
         *
         * @param \PDO|\Closure|null $pdo
         * @return \Illuminate\Database\MySqlConnection 
         * @static 
         */ 
        public static function setPdo($pdo)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->setPdo($pdo);
        }
        
        /**
         * Set the PDO connection used for reading.
         *
         * @param \PDO|\Closure|null $pdo
         * @return \Illuminate\Database\MySqlConnection 
         * @static 
         */ 
        public static function setReadPdo($pdo)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->setReadPdo($pdo);
        }
        
        /**
         * Set the reconnect instance on the connection.
         *
         * @param callable $reconnector
         * @return \Illuminate\Database\MySqlConnection 
         * @static 
         */ 
        public static function setReconnector($reconnector)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->setReconnector($reconnector);
        }
        
        /**
         * Get the database connection name.
         *
         * @return string|null 
         * @static 
         */ 
        public static function getName()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->getName();
        }
        
        /**
         * Get an option from the configuration options.
         *
         * @param string|null $option
         * @return mixed 
         * @static 
         */ 
        public static function getConfig($option = null)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->getConfig($option);
        }
        
        /**
         * Get the PDO driver name.
         *
         * @return string 
         * @static 
         */ 
        public static function getDriverName()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->getDriverName();
        }
        
        /**
         * Get the query grammar used by the connection.
         *
         * @return \Illuminate\Database\Query\Grammars\Grammar 
         * @static 
         */ 
        public static function getQueryGrammar()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->getQueryGrammar();
        }
        
        /**
         * Set the query grammar used by the connection.
         *
         * @param \Illuminate\Database\Query\Grammars\Grammar $grammar
         * @return void 
         * @static 
         */ 
        public static function setQueryGrammar($grammar)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        $instance->setQueryGrammar($grammar);
        }
        
        /**
         * Get the schema grammar used by the connection.
         *
         * @return \Illuminate\Database\Schema\Grammars\Grammar 
         * @static 
         */ 
        public static function getSchemaGrammar()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->getSchemaGrammar();
        }
        
        /**
         * Set the schema grammar used by the connection.
         *
         * @param \Illuminate\Database\Schema\Grammars\Grammar $grammar
         * @return void 
         * @static 
         */ 
        public static function setSchemaGrammar($grammar)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        $instance->setSchemaGrammar($grammar);
        }
        
        /**
         * Get the query post processor used by the connection.
         *
         * @return \Illuminate\Database\Query\Processors\Processor 
         * @static 
         */ 
        public static function getPostProcessor()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->getPostProcessor();
        }
        
        /**
         * Set the query post processor used by the connection.
         *
         * @param \Illuminate\Database\Query\Processors\Processor $processor
         * @return void 
         * @static 
         */ 
        public static function setPostProcessor($processor)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        $instance->setPostProcessor($processor);
        }
        
        /**
         * Get the event dispatcher used by the connection.
         *
         * @return \Illuminate\Contracts\Events\Dispatcher 
         * @static 
         */ 
        public static function getEventDispatcher()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->getEventDispatcher();
        }
        
        /**
         * Set the event dispatcher instance on the connection.
         *
         * @param \Illuminate\Contracts\Events\Dispatcher $events
         * @return void 
         * @static 
         */ 
        public static function setEventDispatcher($events)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        $instance->setEventDispatcher($events);
        }
        
        /**
         * Unset the event dispatcher for this connection.
         *
         * @return void 
         * @static 
         */ 
        public static function unsetEventDispatcher()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        $instance->unsetEventDispatcher();
        }
        
        /**
         * Determine if the connection in a "dry run".
         *
         * @return bool 
         * @static 
         */ 
        public static function pretending()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->pretending();
        }
        
        /**
         * Get the connection query log.
         *
         * @return array 
         * @static 
         */ 
        public static function getQueryLog()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->getQueryLog();
        }
        
        /**
         * Clear the query log.
         *
         * @return void 
         * @static 
         */ 
        public static function flushQueryLog()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        $instance->flushQueryLog();
        }
        
        /**
         * Enable the query log on the connection.
         *
         * @return void 
         * @static 
         */ 
        public static function enableQueryLog()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        $instance->enableQueryLog();
        }
        
        /**
         * Disable the query log on the connection.
         *
         * @return void 
         * @static 
         */ 
        public static function disableQueryLog()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        $instance->disableQueryLog();
        }
        
        /**
         * Determine whether we're logging queries.
         *
         * @return bool 
         * @static 
         */ 
        public static function logging()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->logging();
        }
        
        /**
         * Get the name of the connected database.
         *
         * @return string 
         * @static 
         */ 
        public static function getDatabaseName()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->getDatabaseName();
        }
        
        /**
         * Set the name of the connected database.
         *
         * @param string $database
         * @return string 
         * @static 
         */ 
        public static function setDatabaseName($database)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->setDatabaseName($database);
        }
        
        /**
         * Get the table prefix for the connection.
         *
         * @return string 
         * @static 
         */ 
        public static function getTablePrefix()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->getTablePrefix();
        }
        
        /**
         * Set the table prefix in use by the connection.
         *
         * @param string $prefix
         * @return void 
         * @static 
         */ 
        public static function setTablePrefix($prefix)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        $instance->setTablePrefix($prefix);
        }
        
        /**
         * Set the table prefix and return the grammar.
         *
         * @param \Illuminate\Database\Grammar $grammar
         * @return \Illuminate\Database\Grammar 
         * @static 
         */ 
        public static function withTablePrefix($grammar)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->withTablePrefix($grammar);
        }
        
        /**
         * Register a connection resolver.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return void 
         * @static 
         */ 
        public static function resolverFor($driver, $callback)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        \Illuminate\Database\MySqlConnection::resolverFor($driver, $callback);
        }
        
        /**
         * Get the connection resolver for the given driver.
         *
         * @param string $driver
         * @return mixed 
         * @static 
         */ 
        public static function getResolver($driver)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        return \Illuminate\Database\MySqlConnection::getResolver($driver);
        }
        
        /**
         * Execute a Closure within a transaction.
         *
         * @param \Closure $callback
         * @param int $attempts
         * @return mixed 
         * @throws \Exception|\Throwable
         * @static 
         */ 
        public static function transaction($callback, $attempts = 1)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->transaction($callback, $attempts);
        }
        
        /**
         * Start a new database transaction.
         *
         * @return void 
         * @throws \Exception
         * @static 
         */ 
        public static function beginTransaction()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        $instance->beginTransaction();
        }
        
        /**
         * Commit the active database transaction.
         *
         * @return void 
         * @static 
         */ 
        public static function commit()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        $instance->commit();
        }
        
        /**
         * Rollback the active database transaction.
         *
         * @param int|null $toLevel
         * @return void 
         * @throws \Exception
         * @static 
         */ 
        public static function rollBack($toLevel = null)
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        $instance->rollBack($toLevel);
        }
        
        /**
         * Get the number of active transactions.
         *
         * @return int 
         * @static 
         */ 
        public static function transactionLevel()
        {
            //Method inherited from \Illuminate\Database\Connection            
                        /** @var \Illuminate\Database\MySqlConnection $instance */
                        return $instance->transactionLevel();
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Events\Dispatcher
     */ 
    class Event {
        
        /**
         * Register an event listener with the dispatcher.
         *
         * @param string|array $events
         * @param mixed $listener
         * @return void 
         * @static 
         */ 
        public static function listen($events, $listener)
        {
                        /** @var \Illuminate\Events\Dispatcher $instance */
                        $instance->listen($events, $listener);
        }
        
        /**
         * Determine if a given event has listeners.
         *
         * @param string $eventName
         * @return bool 
         * @static 
         */ 
        public static function hasListeners($eventName)
        {
                        /** @var \Illuminate\Events\Dispatcher $instance */
                        return $instance->hasListeners($eventName);
        }
        
        /**
         * Register an event and payload to be fired later.
         *
         * @param string $event
         * @param array $payload
         * @return void 
         * @static 
         */ 
        public static function push($event, $payload = [])
        {
                        /** @var \Illuminate\Events\Dispatcher $instance */
                        $instance->push($event, $payload);
        }
        
        /**
         * Flush a set of pushed events.
         *
         * @param string $event
         * @return void 
         * @static 
         */ 
        public static function flush($event)
        {
                        /** @var \Illuminate\Events\Dispatcher $instance */
                        $instance->flush($event);
        }
        
        /**
         * Register an event subscriber with the dispatcher.
         *
         * @param object|string $subscriber
         * @return void 
         * @static 
         */ 
        public static function subscribe($subscriber)
        {
                        /** @var \Illuminate\Events\Dispatcher $instance */
                        $instance->subscribe($subscriber);
        }
        
        /**
         * Fire an event until the first non-null response is returned.
         *
         * @param string|object $event
         * @param mixed $payload
         * @return array|null 
         * @static 
         */ 
        public static function until($event, $payload = [])
        {
                        /** @var \Illuminate\Events\Dispatcher $instance */
                        return $instance->until($event, $payload);
        }
        
        /**
         * Fire an event and call the listeners.
         *
         * @param string|object $event
         * @param mixed $payload
         * @param bool $halt
         * @return array|null 
         * @static 
         */ 
        public static function fire($event, $payload = [], $halt = false)
        {
                        /** @var \Illuminate\Events\Dispatcher $instance */
                        return $instance->fire($event, $payload, $halt);
        }
        
        /**
         * Fire an event and call the listeners.
         *
         * @param string|object $event
         * @param mixed $payload
         * @param bool $halt
         * @return array|null 
         * @static 
         */ 
        public static function dispatch($event, $payload = [], $halt = false)
        {
                        /** @var \Illuminate\Events\Dispatcher $instance */
                        return $instance->dispatch($event, $payload, $halt);
        }
        
        /**
         * Get all of the listeners for a given event name.
         *
         * @param string $eventName
         * @return array 
         * @static 
         */ 
        public static function getListeners($eventName)
        {
                        /** @var \Illuminate\Events\Dispatcher $instance */
                        return $instance->getListeners($eventName);
        }
        
        /**
         * Register an event listener with the dispatcher.
         *
         * @param \Closure|string $listener
         * @param bool $wildcard
         * @return \Closure 
         * @static 
         */ 
        public static function makeListener($listener, $wildcard = false)
        {
                        /** @var \Illuminate\Events\Dispatcher $instance */
                        return $instance->makeListener($listener, $wildcard);
        }
        
        /**
         * Create a class based listener using the IoC container.
         *
         * @param string $listener
         * @param bool $wildcard
         * @return \Closure 
         * @static 
         */ 
        public static function createClassListener($listener, $wildcard = false)
        {
                        /** @var \Illuminate\Events\Dispatcher $instance */
                        return $instance->createClassListener($listener, $wildcard);
        }
        
        /**
         * Remove a set of listeners from the dispatcher.
         *
         * @param string $event
         * @return void 
         * @static 
         */ 
        public static function forget($event)
        {
                        /** @var \Illuminate\Events\Dispatcher $instance */
                        $instance->forget($event);
        }
        
        /**
         * Forget all of the pushed listeners.
         *
         * @return void 
         * @static 
         */ 
        public static function forgetPushed()
        {
                        /** @var \Illuminate\Events\Dispatcher $instance */
                        $instance->forgetPushed();
        }
        
        /**
         * Set the queue resolver implementation.
         *
         * @param callable $resolver
         * @return \Illuminate\Events\Dispatcher 
         * @static 
         */ 
        public static function setQueueResolver($resolver)
        {
                        /** @var \Illuminate\Events\Dispatcher $instance */
                        return $instance->setQueueResolver($resolver);
        }
        
        /**
         * Assert if an event was dispatched based on a truth-test callback.
         *
         * @param string $event
         * @param callable|int|null $callback
         * @return void 
         * @static 
         */ 
        public static function assertDispatched($event, $callback = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\EventFake $instance */
                        $instance->assertDispatched($event, $callback);
        }
        
        /**
         * Assert if a event was dispatched a number of times.
         *
         * @param string $event
         * @param int $times
         * @return void 
         * @static 
         */ 
        public static function assertDispatchedTimes($event, $times = 1)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\EventFake $instance */
                        $instance->assertDispatchedTimes($event, $times);
        }
        
        /**
         * Determine if an event was dispatched based on a truth-test callback.
         *
         * @param string $event
         * @param callable|null $callback
         * @return void 
         * @static 
         */ 
        public static function assertNotDispatched($event, $callback = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\EventFake $instance */
                        $instance->assertNotDispatched($event, $callback);
        }
        
        /**
         * Get all of the events matching a truth-test callback.
         *
         * @param string $event
         * @param callable|null $callback
         * @return \Illuminate\Support\Collection 
         * @static 
         */ 
        public static function dispatched($event, $callback = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\EventFake $instance */
                        return $instance->dispatched($event, $callback);
        }
        
        /**
         * Determine if the given event has been dispatched.
         *
         * @param string $event
         * @return bool 
         * @static 
         */ 
        public static function hasDispatched($event)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\EventFake $instance */
                        return $instance->hasDispatched($event);
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Filesystem\Filesystem
     */ 
    class File {
        
        /**
         * Determine if a file or directory exists.
         *
         * @param string $path
         * @return bool 
         * @static 
         */ 
        public static function exists($path)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->exists($path);
        }
        
        /**
         * Get the contents of a file.
         *
         * @param string $path
         * @param bool $lock
         * @return string 
         * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
         * @static 
         */ 
        public static function get($path, $lock = false)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->get($path, $lock);
        }
        
        /**
         * Get contents of a file with shared access.
         *
         * @param string $path
         * @return string 
         * @static 
         */ 
        public static function sharedGet($path)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->sharedGet($path);
        }
        
        /**
         * Get the returned value of a file.
         *
         * @param string $path
         * @return mixed 
         * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
         * @static 
         */ 
        public static function getRequire($path)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->getRequire($path);
        }
        
        /**
         * Require the given file once.
         *
         * @param string $file
         * @return mixed 
         * @static 
         */ 
        public static function requireOnce($file)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->requireOnce($file);
        }
        
        /**
         * Get the MD5 hash of the file at the given path.
         *
         * @param string $path
         * @return string 
         * @static 
         */ 
        public static function hash($path)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->hash($path);
        }
        
        /**
         * Write the contents of a file.
         *
         * @param string $path
         * @param string $contents
         * @param bool $lock
         * @return int 
         * @static 
         */ 
        public static function put($path, $contents, $lock = false)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->put($path, $contents, $lock);
        }
        
        /**
         * Prepend to a file.
         *
         * @param string $path
         * @param string $data
         * @return int 
         * @static 
         */ 
        public static function prepend($path, $data)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->prepend($path, $data);
        }
        
        /**
         * Append to a file.
         *
         * @param string $path
         * @param string $data
         * @return int 
         * @static 
         */ 
        public static function append($path, $data)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->append($path, $data);
        }
        
        /**
         * Get or set UNIX mode of a file or directory.
         *
         * @param string $path
         * @param int $mode
         * @return mixed 
         * @static 
         */ 
        public static function chmod($path, $mode = null)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->chmod($path, $mode);
        }
        
        /**
         * Delete the file at a given path.
         *
         * @param string|array $paths
         * @return bool 
         * @static 
         */ 
        public static function delete($paths)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->delete($paths);
        }
        
        /**
         * Move a file to a new location.
         *
         * @param string $path
         * @param string $target
         * @return bool 
         * @static 
         */ 
        public static function move($path, $target)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->move($path, $target);
        }
        
        /**
         * Copy a file to a new location.
         *
         * @param string $path
         * @param string $target
         * @return bool 
         * @static 
         */ 
        public static function copy($path, $target)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->copy($path, $target);
        }
        
        /**
         * Create a hard link to the target file or directory.
         *
         * @param string $target
         * @param string $link
         * @return void 
         * @static 
         */ 
        public static function link($target, $link)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        $instance->link($target, $link);
        }
        
        /**
         * Extract the file name from a file path.
         *
         * @param string $path
         * @return string 
         * @static 
         */ 
        public static function name($path)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->name($path);
        }
        
        /**
         * Extract the trailing name component from a file path.
         *
         * @param string $path
         * @return string 
         * @static 
         */ 
        public static function basename($path)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->basename($path);
        }
        
        /**
         * Extract the parent directory from a file path.
         *
         * @param string $path
         * @return string 
         * @static 
         */ 
        public static function dirname($path)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->dirname($path);
        }
        
        /**
         * Extract the file extension from a file path.
         *
         * @param string $path
         * @return string 
         * @static 
         */ 
        public static function extension($path)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->extension($path);
        }
        
        /**
         * Get the file type of a given file.
         *
         * @param string $path
         * @return string 
         * @static 
         */ 
        public static function type($path)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->type($path);
        }
        
        /**
         * Get the mime-type of a given file.
         *
         * @param string $path
         * @return string|false 
         * @static 
         */ 
        public static function mimeType($path)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->mimeType($path);
        }
        
        /**
         * Get the file size of a given file.
         *
         * @param string $path
         * @return int 
         * @static 
         */ 
        public static function size($path)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->size($path);
        }
        
        /**
         * Get the file's last modification time.
         *
         * @param string $path
         * @return int 
         * @static 
         */ 
        public static function lastModified($path)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->lastModified($path);
        }
        
        /**
         * Determine if the given path is a directory.
         *
         * @param string $directory
         * @return bool 
         * @static 
         */ 
        public static function isDirectory($directory)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->isDirectory($directory);
        }
        
        /**
         * Determine if the given path is readable.
         *
         * @param string $path
         * @return bool 
         * @static 
         */ 
        public static function isReadable($path)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->isReadable($path);
        }
        
        /**
         * Determine if the given path is writable.
         *
         * @param string $path
         * @return bool 
         * @static 
         */ 
        public static function isWritable($path)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->isWritable($path);
        }
        
        /**
         * Determine if the given path is a file.
         *
         * @param string $file
         * @return bool 
         * @static 
         */ 
        public static function isFile($file)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->isFile($file);
        }
        
        /**
         * Find path names matching a given pattern.
         *
         * @param string $pattern
         * @param int $flags
         * @return array 
         * @static 
         */ 
        public static function glob($pattern, $flags = 0)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->glob($pattern, $flags);
        }
        
        /**
         * Get an array of all files in a directory.
         *
         * @param string $directory
         * @param bool $hidden
         * @return \Symfony\Component\Finder\SplFileInfo[] 
         * @static 
         */ 
        public static function files($directory, $hidden = false)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->files($directory, $hidden);
        }
        
        /**
         * Get all of the files from the given directory (recursive).
         *
         * @param string $directory
         * @param bool $hidden
         * @return \Symfony\Component\Finder\SplFileInfo[] 
         * @static 
         */ 
        public static function allFiles($directory, $hidden = false)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->allFiles($directory, $hidden);
        }
        
        /**
         * Get all of the directories within a given directory.
         *
         * @param string $directory
         * @return array 
         * @static 
         */ 
        public static function directories($directory)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->directories($directory);
        }
        
        /**
         * Create a directory.
         *
         * @param string $path
         * @param int $mode
         * @param bool $recursive
         * @param bool $force
         * @return bool 
         * @static 
         */ 
        public static function makeDirectory($path, $mode = 493, $recursive = false, $force = false)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->makeDirectory($path, $mode, $recursive, $force);
        }
        
        /**
         * Move a directory.
         *
         * @param string $from
         * @param string $to
         * @param bool $overwrite
         * @return bool 
         * @static 
         */ 
        public static function moveDirectory($from, $to, $overwrite = false)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->moveDirectory($from, $to, $overwrite);
        }
        
        /**
         * Copy a directory from one location to another.
         *
         * @param string $directory
         * @param string $destination
         * @param int $options
         * @return bool 
         * @static 
         */ 
        public static function copyDirectory($directory, $destination, $options = null)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->copyDirectory($directory, $destination, $options);
        }
        
        /**
         * Recursively delete a directory.
         * 
         * The directory itself may be optionally preserved.
         *
         * @param string $directory
         * @param bool $preserve
         * @return bool 
         * @static 
         */ 
        public static function deleteDirectory($directory, $preserve = false)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->deleteDirectory($directory, $preserve);
        }
        
        /**
         * Remove all of the directories within a given directory.
         *
         * @param string $directory
         * @return bool 
         * @static 
         */ 
        public static function deleteDirectories($directory)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->deleteDirectories($directory);
        }
        
        /**
         * Empty the specified directory of all files and folders.
         *
         * @param string $directory
         * @return bool 
         * @static 
         */ 
        public static function cleanDirectory($directory)
        {
                        /** @var \Illuminate\Filesystem\Filesystem $instance */
                        return $instance->cleanDirectory($directory);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param object|callable $macro
         * @return void 
         * @static 
         */ 
        public static function macro($name, $macro)
        {
                        \Illuminate\Filesystem\Filesystem::macro($name, $macro);
        }
        
        /**
         * Mix another object into the class.
         *
         * @param object $mixin
         * @return void 
         * @throws \ReflectionException
         * @static 
         */ 
        public static function mixin($mixin)
        {
                        \Illuminate\Filesystem\Filesystem::mixin($mixin);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasMacro($name)
        {
                        return \Illuminate\Filesystem\Filesystem::hasMacro($name);
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Contracts\Auth\Access\Gate
     */ 
    class Gate {
        
        /**
         * Determine if a given ability has been defined.
         *
         * @param string|array $ability
         * @return bool 
         * @static 
         */ 
        public static function has($ability)
        {
                        /** @var \Illuminate\Auth\Access\Gate $instance */
                        return $instance->has($ability);
        }
        
        /**
         * Define a new ability.
         *
         * @param string $ability
         * @param callable|string $callback
         * @return \Illuminate\Auth\Access\Gate 
         * @throws \InvalidArgumentException
         * @static 
         */ 
        public static function define($ability, $callback)
        {
                        /** @var \Illuminate\Auth\Access\Gate $instance */
                        return $instance->define($ability, $callback);
        }
        
        /**
         * Define abilities for a resource.
         *
         * @param string $name
         * @param string $class
         * @param array|null $abilities
         * @return \Illuminate\Auth\Access\Gate 
         * @static 
         */ 
        public static function resource($name, $class, $abilities = null)
        {
                        /** @var \Illuminate\Auth\Access\Gate $instance */
                        return $instance->resource($name, $class, $abilities);
        }
        
        /**
         * Define a policy class for a given class type.
         *
         * @param string $class
         * @param string $policy
         * @return \Illuminate\Auth\Access\Gate 
         * @static 
         */ 
        public static function policy($class, $policy)
        {
                        /** @var \Illuminate\Auth\Access\Gate $instance */
                        return $instance->policy($class, $policy);
        }
        
        /**
         * Register a callback to run before all Gate checks.
         *
         * @param callable $callback
         * @return \Illuminate\Auth\Access\Gate 
         * @static 
         */ 
        public static function before($callback)
        {
                        /** @var \Illuminate\Auth\Access\Gate $instance */
                        return $instance->before($callback);
        }
        
        /**
         * Register a callback to run after all Gate checks.
         *
         * @param callable $callback
         * @return \Illuminate\Auth\Access\Gate 
         * @static 
         */ 
        public static function after($callback)
        {
                        /** @var \Illuminate\Auth\Access\Gate $instance */
                        return $instance->after($callback);
        }
        
        /**
         * Determine if the given ability should be granted for the current user.
         *
         * @param string $ability
         * @param array|mixed $arguments
         * @return bool 
         * @static 
         */ 
        public static function allows($ability, $arguments = [])
        {
                        /** @var \Illuminate\Auth\Access\Gate $instance */
                        return $instance->allows($ability, $arguments);
        }
        
        /**
         * Determine if the given ability should be denied for the current user.
         *
         * @param string $ability
         * @param array|mixed $arguments
         * @return bool 
         * @static 
         */ 
        public static function denies($ability, $arguments = [])
        {
                        /** @var \Illuminate\Auth\Access\Gate $instance */
                        return $instance->denies($ability, $arguments);
        }
        
        /**
         * Determine if all of the given abilities should be granted for the current user.
         *
         * @param \Illuminate\Auth\Access\iterable|string $abilities
         * @param array|mixed $arguments
         * @return bool 
         * @static 
         */ 
        public static function check($abilities, $arguments = [])
        {
                        /** @var \Illuminate\Auth\Access\Gate $instance */
                        return $instance->check($abilities, $arguments);
        }
        
        /**
         * Determine if any one of the given abilities should be granted for the current user.
         *
         * @param \Illuminate\Auth\Access\iterable|string $abilities
         * @param array|mixed $arguments
         * @return bool 
         * @static 
         */ 
        public static function any($abilities, $arguments = [])
        {
                        /** @var \Illuminate\Auth\Access\Gate $instance */
                        return $instance->any($abilities, $arguments);
        }
        
        /**
         * Determine if the given ability should be granted for the current user.
         *
         * @param string $ability
         * @param array|mixed $arguments
         * @return \Illuminate\Auth\Access\Response 
         * @throws \Illuminate\Auth\Access\AuthorizationException
         * @static 
         */ 
        public static function authorize($ability, $arguments = [])
        {
                        /** @var \Illuminate\Auth\Access\Gate $instance */
                        return $instance->authorize($ability, $arguments);
        }
        
        /**
         * Get a policy instance for a given class.
         *
         * @param object|string $class
         * @return mixed 
         * @static 
         */ 
        public static function getPolicyFor($class)
        {
                        /** @var \Illuminate\Auth\Access\Gate $instance */
                        return $instance->getPolicyFor($class);
        }
        
        /**
         * Build a policy class instance of the given type.
         *
         * @param object|string $class
         * @return mixed 
         * @static 
         */ 
        public static function resolvePolicy($class)
        {
                        /** @var \Illuminate\Auth\Access\Gate $instance */
                        return $instance->resolvePolicy($class);
        }
        
        /**
         * Get a gate instance for the given user.
         *
         * @param \Illuminate\Contracts\Auth\Authenticatable|mixed $user
         * @return static 
         * @static 
         */ 
        public static function forUser($user)
        {
                        /** @var \Illuminate\Auth\Access\Gate $instance */
                        return $instance->forUser($user);
        }
        
        /**
         * Get all of the defined abilities.
         *
         * @return array 
         * @static 
         */ 
        public static function abilities()
        {
                        /** @var \Illuminate\Auth\Access\Gate $instance */
                        return $instance->abilities();
        }
        
        /**
         * Get all of the defined policies.
         *
         * @return array 
         * @static 
         */ 
        public static function policies()
        {
                        /** @var \Illuminate\Auth\Access\Gate $instance */
                        return $instance->policies();
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Hashing\HashManager
     */ 
    class Hash {
        
        /**
         * Create an instance of the Bcrypt hash Driver.
         *
         * @return \Illuminate\Hashing\BcryptHasher 
         * @static 
         */ 
        public static function createBcryptDriver()
        {
                        /** @var \Illuminate\Hashing\HashManager $instance */
                        return $instance->createBcryptDriver();
        }
        
        /**
         * Create an instance of the Argon2 hash Driver.
         *
         * @return \Illuminate\Hashing\ArgonHasher 
         * @static 
         */ 
        public static function createArgonDriver()
        {
                        /** @var \Illuminate\Hashing\HashManager $instance */
                        return $instance->createArgonDriver();
        }
        
        /**
         * Get information about the given hashed value.
         *
         * @param string $hashedValue
         * @return array 
         * @static 
         */ 
        public static function info($hashedValue)
        {
                        /** @var \Illuminate\Hashing\HashManager $instance */
                        return $instance->info($hashedValue);
        }
        
        /**
         * Hash the given value.
         *
         * @param string $value
         * @param array $options
         * @return string 
         * @static 
         */ 
        public static function make($value, $options = [])
        {
                        /** @var \Illuminate\Hashing\HashManager $instance */
                        return $instance->make($value, $options);
        }
        
        /**
         * Check the given plain value against a hash.
         *
         * @param string $value
         * @param string $hashedValue
         * @param array $options
         * @return bool 
         * @static 
         */ 
        public static function check($value, $hashedValue, $options = [])
        {
                        /** @var \Illuminate\Hashing\HashManager $instance */
                        return $instance->check($value, $hashedValue, $options);
        }
        
        /**
         * Check if the given hash has been hashed using the given options.
         *
         * @param string $hashedValue
         * @param array $options
         * @return bool 
         * @static 
         */ 
        public static function needsRehash($hashedValue, $options = [])
        {
                        /** @var \Illuminate\Hashing\HashManager $instance */
                        return $instance->needsRehash($hashedValue, $options);
        }
        
        /**
         * Get the default driver name.
         *
         * @return string 
         * @static 
         */ 
        public static function getDefaultDriver()
        {
                        /** @var \Illuminate\Hashing\HashManager $instance */
                        return $instance->getDefaultDriver();
        }
        
        /**
         * Get a driver instance.
         *
         * @param string $driver
         * @return mixed 
         * @throws \InvalidArgumentException
         * @static 
         */ 
        public static function driver($driver = null)
        {
            //Method inherited from \Illuminate\Support\Manager            
                        /** @var \Illuminate\Hashing\HashManager $instance */
                        return $instance->driver($driver);
        }
        
        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return \Illuminate\Hashing\HashManager 
         * @static 
         */ 
        public static function extend($driver, $callback)
        {
            //Method inherited from \Illuminate\Support\Manager            
                        /** @var \Illuminate\Hashing\HashManager $instance */
                        return $instance->extend($driver, $callback);
        }
        
        /**
         * Get all of the created "drivers".
         *
         * @return array 
         * @static 
         */ 
        public static function getDrivers()
        {
            //Method inherited from \Illuminate\Support\Manager            
                        /** @var \Illuminate\Hashing\HashManager $instance */
                        return $instance->getDrivers();
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Translation\Translator
     */ 
    class Lang {
        
        /**
         * Determine if a translation exists for a given locale.
         *
         * @param string $key
         * @param string|null $locale
         * @return bool 
         * @static 
         */ 
        public static function hasForLocale($key, $locale = null)
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        return $instance->hasForLocale($key, $locale);
        }
        
        /**
         * Determine if a translation exists.
         *
         * @param string $key
         * @param string|null $locale
         * @param bool $fallback
         * @return bool 
         * @static 
         */ 
        public static function has($key, $locale = null, $fallback = true)
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        return $instance->has($key, $locale, $fallback);
        }
        
        /**
         * Get the translation for a given key.
         *
         * @param string $key
         * @param array $replace
         * @param string $locale
         * @return string|array|null 
         * @static 
         */ 
        public static function trans($key, $replace = [], $locale = null)
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        return $instance->trans($key, $replace, $locale);
        }
        
        /**
         * Get the translation for the given key.
         *
         * @param string $key
         * @param array $replace
         * @param string|null $locale
         * @param bool $fallback
         * @return string|array|null 
         * @static 
         */ 
        public static function get($key, $replace = [], $locale = null, $fallback = true)
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        return $instance->get($key, $replace, $locale, $fallback);
        }
        
        /**
         * Get the translation for a given key from the JSON translation files.
         *
         * @param string $key
         * @param array $replace
         * @param string $locale
         * @return string|array|null 
         * @static 
         */ 
        public static function getFromJson($key, $replace = [], $locale = null)
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        return $instance->getFromJson($key, $replace, $locale);
        }
        
        /**
         * Get a translation according to an integer value.
         *
         * @param string $key
         * @param int|array|\Countable $number
         * @param array $replace
         * @param string $locale
         * @return string 
         * @static 
         */ 
        public static function transChoice($key, $number, $replace = [], $locale = null)
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        return $instance->transChoice($key, $number, $replace, $locale);
        }
        
        /**
         * Get a translation according to an integer value.
         *
         * @param string $key
         * @param int|array|\Countable $number
         * @param array $replace
         * @param string $locale
         * @return string 
         * @static 
         */ 
        public static function choice($key, $number, $replace = [], $locale = null)
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        return $instance->choice($key, $number, $replace, $locale);
        }
        
        /**
         * Add translation lines to the given locale.
         *
         * @param array $lines
         * @param string $locale
         * @param string $namespace
         * @return void 
         * @static 
         */ 
        public static function addLines($lines, $locale, $namespace = '*')
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        $instance->addLines($lines, $locale, $namespace);
        }
        
        /**
         * Load the specified language group.
         *
         * @param string $namespace
         * @param string $group
         * @param string $locale
         * @return void 
         * @static 
         */ 
        public static function load($namespace, $group, $locale)
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        $instance->load($namespace, $group, $locale);
        }
        
        /**
         * Add a new namespace to the loader.
         *
         * @param string $namespace
         * @param string $hint
         * @return void 
         * @static 
         */ 
        public static function addNamespace($namespace, $hint)
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        $instance->addNamespace($namespace, $hint);
        }
        
        /**
         * Add a new JSON path to the loader.
         *
         * @param string $path
         * @return void 
         * @static 
         */ 
        public static function addJsonPath($path)
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        $instance->addJsonPath($path);
        }
        
        /**
         * Parse a key into namespace, group, and item.
         *
         * @param string $key
         * @return array 
         * @static 
         */ 
        public static function parseKey($key)
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        return $instance->parseKey($key);
        }
        
        /**
         * Get the message selector instance.
         *
         * @return \Illuminate\Translation\MessageSelector 
         * @static 
         */ 
        public static function getSelector()
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        return $instance->getSelector();
        }
        
        /**
         * Set the message selector instance.
         *
         * @param \Illuminate\Translation\MessageSelector $selector
         * @return void 
         * @static 
         */ 
        public static function setSelector($selector)
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        $instance->setSelector($selector);
        }
        
        /**
         * Get the language line loader implementation.
         *
         * @return \Illuminate\Contracts\Translation\Loader 
         * @static 
         */ 
        public static function getLoader()
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        return $instance->getLoader();
        }
        
        /**
         * Get the default locale being used.
         *
         * @return string 
         * @static 
         */ 
        public static function locale()
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        return $instance->locale();
        }
        
        /**
         * Get the default locale being used.
         *
         * @return string 
         * @static 
         */ 
        public static function getLocale()
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        return $instance->getLocale();
        }
        
        /**
         * Set the default locale.
         *
         * @param string $locale
         * @return void 
         * @static 
         */ 
        public static function setLocale($locale)
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        $instance->setLocale($locale);
        }
        
        /**
         * Get the fallback locale being used.
         *
         * @return string 
         * @static 
         */ 
        public static function getFallback()
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        return $instance->getFallback();
        }
        
        /**
         * Set the fallback locale being used.
         *
         * @param string $fallback
         * @return void 
         * @static 
         */ 
        public static function setFallback($fallback)
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        $instance->setFallback($fallback);
        }
        
        /**
         * Set the loaded translation groups.
         *
         * @param array $loaded
         * @return void 
         * @static 
         */ 
        public static function setLoaded($loaded)
        {
                        /** @var \Illuminate\Translation\Translator $instance */
                        $instance->setLoaded($loaded);
        }
        
        /**
         * Set the parsed value of a key.
         *
         * @param string $key
         * @param array $parsed
         * @return void 
         * @static 
         */ 
        public static function setParsedKey($key, $parsed)
        {
            //Method inherited from \Illuminate\Support\NamespacedItemResolver            
                        /** @var \Illuminate\Translation\Translator $instance */
                        $instance->setParsedKey($key, $parsed);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param object|callable $macro
         * @return void 
         * @static 
         */ 
        public static function macro($name, $macro)
        {
                        \Illuminate\Translation\Translator::macro($name, $macro);
        }
        
        /**
         * Mix another object into the class.
         *
         * @param object $mixin
         * @return void 
         * @throws \ReflectionException
         * @static 
         */ 
        public static function mixin($mixin)
        {
                        \Illuminate\Translation\Translator::mixin($mixin);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasMacro($name)
        {
                        return \Illuminate\Translation\Translator::hasMacro($name);
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Log\Logger
     */ 
    class Log {
        
        /**
         * Adds a log record at the DEBUG level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return bool Whether the record has been processed
         * @static 
         */ 
        public static function debug($message, $context = [])
        {
                        /** @var \Monolog\Logger $instance */
                        return $instance->addDebug($message, $context);
        }
        
        /**
         * Adds a log record at the INFO level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return bool Whether the record has been processed
         * @static 
         */ 
        public static function info($message, $context = [])
        {
                        /** @var \Monolog\Logger $instance */
                        return $instance->addInfo($message, $context);
        }
        
        /**
         * Adds a log record at the NOTICE level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return bool Whether the record has been processed
         * @static 
         */ 
        public static function notice($message, $context = [])
        {
                        /** @var \Monolog\Logger $instance */
                        return $instance->addNotice($message, $context);
        }
        
        /**
         * Adds a log record at the WARNING level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return bool Whether the record has been processed
         * @static 
         */ 
        public static function warning($message, $context = [])
        {
                        /** @var \Monolog\Logger $instance */
                        return $instance->addWarning($message, $context);
        }
        
        /**
         * Adds a log record at the ERROR level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return bool Whether the record has been processed
         * @static 
         */ 
        public static function error($message, $context = [])
        {
                        /** @var \Monolog\Logger $instance */
                        return $instance->addError($message, $context);
        }
        
        /**
         * Adds a log record at the CRITICAL level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return bool Whether the record has been processed
         * @static 
         */ 
        public static function critical($message, $context = [])
        {
                        /** @var \Monolog\Logger $instance */
                        return $instance->addCritical($message, $context);
        }
        
        /**
         * Adds a log record at the ALERT level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return bool Whether the record has been processed
         * @static 
         */ 
        public static function alert($message, $context = [])
        {
                        /** @var \Monolog\Logger $instance */
                        return $instance->addAlert($message, $context);
        }
        
        /**
         * Adds a log record at the EMERGENCY level.
         *
         * @param string $message The log message
         * @param array $context The log context
         * @return bool Whether the record has been processed
         * @static 
         */ 
        public static function emergency($message, $context = [])
        {
                        /** @var \Monolog\Logger $instance */
                        return $instance->addEmergency($message, $context);
        }
        
        /**
         * Create a new, on-demand aggregate logger instance.
         *
         * @param array $channels
         * @param string|null $channel
         * @return \Psr\Log\LoggerInterface 
         * @static 
         */ 
        public static function stack($channels, $channel = null)
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        return $instance->stack($channels, $channel);
        }
        
        /**
         * Get a log channel instance.
         *
         * @param string|null $channel
         * @return mixed 
         * @static 
         */ 
        public static function channel($channel = null)
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        return $instance->channel($channel);
        }
        
        /**
         * Get a log driver instance.
         *
         * @param string|null $driver
         * @return mixed 
         * @static 
         */ 
        public static function driver($driver = null)
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        return $instance->driver($driver);
        }
        
        /**
         * Get the default log driver name.
         *
         * @return string 
         * @static 
         */ 
        public static function getDefaultDriver()
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        return $instance->getDefaultDriver();
        }
        
        /**
         * Set the default log driver name.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function setDefaultDriver($name)
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        $instance->setDefaultDriver($name);
        }
        
        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return \Illuminate\Log\LogManager 
         * @static 
         */ 
        public static function extend($driver, $callback)
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        return $instance->extend($driver, $callback);
        }
        
        /**
         * Logs with an arbitrary level.
         *
         * @param mixed $level
         * @param string $message
         * @param array $context
         * @return void 
         * @static 
         */ 
        public static function log($level, $message, $context = [])
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        $instance->log($level, $message, $context);
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Mail\Mailer
     */ 
    class Mail {
        
        /**
         * Set the global from address and name.
         *
         * @param string $address
         * @param string|null $name
         * @return void 
         * @static 
         */ 
        public static function alwaysFrom($address, $name = null)
        {
                        /** @var \Illuminate\Mail\Mailer $instance */
                        $instance->alwaysFrom($address, $name);
        }
        
        /**
         * Set the global reply-to address and name.
         *
         * @param string $address
         * @param string|null $name
         * @return void 
         * @static 
         */ 
        public static function alwaysReplyTo($address, $name = null)
        {
                        /** @var \Illuminate\Mail\Mailer $instance */
                        $instance->alwaysReplyTo($address, $name);
        }
        
        /**
         * Set the global to address and name.
         *
         * @param string $address
         * @param string|null $name
         * @return void 
         * @static 
         */ 
        public static function alwaysTo($address, $name = null)
        {
                        /** @var \Illuminate\Mail\Mailer $instance */
                        $instance->alwaysTo($address, $name);
        }
        
        /**
         * Begin the process of mailing a mailable class instance.
         *
         * @param mixed $users
         * @return \Illuminate\Mail\PendingMail 
         * @static 
         */ 
        public static function to($users)
        {
                        /** @var \Illuminate\Mail\Mailer $instance */
                        return $instance->to($users);
        }
        
        /**
         * Begin the process of mailing a mailable class instance.
         *
         * @param mixed $users
         * @return \Illuminate\Mail\PendingMail 
         * @static 
         */ 
        public static function bcc($users)
        {
                        /** @var \Illuminate\Mail\Mailer $instance */
                        return $instance->bcc($users);
        }
        
        /**
         * Send a new message with only an HTML part.
         *
         * @param string $html
         * @param mixed $callback
         * @return void 
         * @static 
         */ 
        public static function html($html, $callback)
        {
                        /** @var \Illuminate\Mail\Mailer $instance */
                        $instance->html($html, $callback);
        }
        
        /**
         * Send a new message when only a raw text part.
         *
         * @param string $text
         * @param mixed $callback
         * @return void 
         * @static 
         */ 
        public static function raw($text, $callback)
        {
                        /** @var \Illuminate\Mail\Mailer $instance */
                        $instance->raw($text, $callback);
        }
        
        /**
         * Send a new message when only a plain part.
         *
         * @param string $view
         * @param array $data
         * @param mixed $callback
         * @return void 
         * @static 
         */ 
        public static function plain($view, $data, $callback)
        {
                        /** @var \Illuminate\Mail\Mailer $instance */
                        $instance->plain($view, $data, $callback);
        }
        
        /**
         * Render the given message as a view.
         *
         * @param string|array $view
         * @param array $data
         * @return string 
         * @static 
         */ 
        public static function render($view, $data = [])
        {
                        /** @var \Illuminate\Mail\Mailer $instance */
                        return $instance->render($view, $data);
        }
        
        /**
         * Send a new message using a view.
         *
         * @param string|array|\Illuminate\Mail\MailableContract $view
         * @param array $data
         * @param \Closure|string $callback
         * @return void 
         * @static 
         */ 
        public static function send($view, $data = [], $callback = null)
        {
                        /** @var \Illuminate\Mail\Mailer $instance */
                        $instance->send($view, $data, $callback);
        }
        
        /**
         * Queue a new e-mail message for sending.
         *
         * @param string|array|\Illuminate\Mail\MailableContract $view
         * @param string|null $queue
         * @return mixed 
         * @static 
         */ 
        public static function queue($view, $queue = null)
        {
                        /** @var \Illuminate\Mail\Mailer $instance */
                        return $instance->queue($view, $queue);
        }
        
        /**
         * Queue a new e-mail message for sending on the given queue.
         *
         * @param string $queue
         * @param string|array $view
         * @return mixed 
         * @static 
         */ 
        public static function onQueue($queue, $view)
        {
                        /** @var \Illuminate\Mail\Mailer $instance */
                        return $instance->onQueue($queue, $view);
        }
        
        /**
         * Queue a new e-mail message for sending on the given queue.
         * 
         * This method didn't match rest of framework's "onQueue" phrasing. Added "onQueue".
         *
         * @param string $queue
         * @param string|array $view
         * @return mixed 
         * @static 
         */ 
        public static function queueOn($queue, $view)
        {
                        /** @var \Illuminate\Mail\Mailer $instance */
                        return $instance->queueOn($queue, $view);
        }
        
        /**
         * Queue a new e-mail message for sending after (n) seconds.
         *
         * @param \DateTimeInterface|\DateInterval|int $delay
         * @param string|array|\Illuminate\Mail\MailableContract $view
         * @param string|null $queue
         * @return mixed 
         * @static 
         */ 
        public static function later($delay, $view, $queue = null)
        {
                        /** @var \Illuminate\Mail\Mailer $instance */
                        return $instance->later($delay, $view, $queue);
        }
        
        /**
         * Queue a new e-mail message for sending after (n) seconds on the given queue.
         *
         * @param string $queue
         * @param \DateTimeInterface|\DateInterval|int $delay
         * @param string|array $view
         * @return mixed 
         * @static 
         */ 
        public static function laterOn($queue, $delay, $view)
        {
                        /** @var \Illuminate\Mail\Mailer $instance */
                        return $instance->laterOn($queue, $delay, $view);
        }
        
        /**
         * Get the view factory instance.
         *
         * @return \Illuminate\Contracts\View\Factory 
         * @static 
         */ 
        public static function getViewFactory()
        {
                        /** @var \Illuminate\Mail\Mailer $instance */
                        return $instance->getViewFactory();
        }
        
        /**
         * Get the Swift Mailer instance.
         *
         * @return \Swift_Mailer 
         * @static 
         */ 
        public static function getSwiftMailer()
        {
                        /** @var \Illuminate\Mail\Mailer $instance */
                        return $instance->getSwiftMailer();
        }
        
        /**
         * Get the array of failed recipients.
         *
         * @return array 
         * @static 
         */ 
        public static function failures()
        {
                        /** @var \Illuminate\Mail\Mailer $instance */
                        return $instance->failures();
        }
        
        /**
         * Set the Swift Mailer instance.
         *
         * @param \Swift_Mailer $swift
         * @return void 
         * @static 
         */ 
        public static function setSwiftMailer($swift)
        {
                        /** @var \Illuminate\Mail\Mailer $instance */
                        $instance->setSwiftMailer($swift);
        }
        
        /**
         * Set the queue manager instance.
         *
         * @param \Illuminate\Contracts\Queue\Factory $queue
         * @return \Illuminate\Mail\Mailer 
         * @static 
         */ 
        public static function setQueue($queue)
        {
                        /** @var \Illuminate\Mail\Mailer $instance */
                        return $instance->setQueue($queue);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param object|callable $macro
         * @return void 
         * @static 
         */ 
        public static function macro($name, $macro)
        {
                        \Illuminate\Mail\Mailer::macro($name, $macro);
        }
        
        /**
         * Mix another object into the class.
         *
         * @param object $mixin
         * @return void 
         * @throws \ReflectionException
         * @static 
         */ 
        public static function mixin($mixin)
        {
                        \Illuminate\Mail\Mailer::mixin($mixin);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasMacro($name)
        {
                        return \Illuminate\Mail\Mailer::hasMacro($name);
        }
        
        /**
         * Assert if a mailable was sent based on a truth-test callback.
         *
         * @param string $mailable
         * @param callable|int|null $callback
         * @return void 
         * @static 
         */ 
        public static function assertSent($mailable, $callback = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\MailFake $instance */
                        $instance->assertSent($mailable, $callback);
        }
        
        /**
         * Determine if a mailable was not sent based on a truth-test callback.
         *
         * @param string $mailable
         * @param callable|null $callback
         * @return void 
         * @static 
         */ 
        public static function assertNotSent($mailable, $callback = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\MailFake $instance */
                        $instance->assertNotSent($mailable, $callback);
        }
        
        /**
         * Assert that no mailables were sent.
         *
         * @return void 
         * @static 
         */ 
        public static function assertNothingSent()
        {
                        /** @var \Illuminate\Support\Testing\Fakes\MailFake $instance */
                        $instance->assertNothingSent();
        }
        
        /**
         * Assert if a mailable was queued based on a truth-test callback.
         *
         * @param string $mailable
         * @param callable|int|null $callback
         * @return void 
         * @static 
         */ 
        public static function assertQueued($mailable, $callback = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\MailFake $instance */
                        $instance->assertQueued($mailable, $callback);
        }
        
        /**
         * Determine if a mailable was not queued based on a truth-test callback.
         *
         * @param string $mailable
         * @param callable|null $callback
         * @return void 
         * @static 
         */ 
        public static function assertNotQueued($mailable, $callback = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\MailFake $instance */
                        $instance->assertNotQueued($mailable, $callback);
        }
        
        /**
         * Assert that no mailables were queued.
         *
         * @return void 
         * @static 
         */ 
        public static function assertNothingQueued()
        {
                        /** @var \Illuminate\Support\Testing\Fakes\MailFake $instance */
                        $instance->assertNothingQueued();
        }
        
        /**
         * Get all of the mailables matching a truth-test callback.
         *
         * @param string $mailable
         * @param callable|null $callback
         * @return \Illuminate\Support\Collection 
         * @static 
         */ 
        public static function sent($mailable, $callback = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\MailFake $instance */
                        return $instance->sent($mailable, $callback);
        }
        
        /**
         * Determine if the given mailable has been sent.
         *
         * @param string $mailable
         * @return bool 
         * @static 
         */ 
        public static function hasSent($mailable)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\MailFake $instance */
                        return $instance->hasSent($mailable);
        }
        
        /**
         * Get all of the queued mailables matching a truth-test callback.
         *
         * @param string $mailable
         * @param callable|null $callback
         * @return \Illuminate\Support\Collection 
         * @static 
         */ 
        public static function queued($mailable, $callback = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\MailFake $instance */
                        return $instance->queued($mailable, $callback);
        }
        
        /**
         * Determine if the given mailable has been queued.
         *
         * @param string $mailable
         * @return bool 
         * @static 
         */ 
        public static function hasQueued($mailable)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\MailFake $instance */
                        return $instance->hasQueued($mailable);
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Notifications\ChannelManager
     */ 
    class Notification {
        
        /**
         * Send the given notification to the given notifiable entities.
         *
         * @param \Illuminate\Support\Collection|array|mixed $notifiables
         * @param mixed $notification
         * @return void 
         * @static 
         */ 
        public static function send($notifiables, $notification)
        {
                        /** @var \Illuminate\Notifications\ChannelManager $instance */
                        $instance->send($notifiables, $notification);
        }
        
        /**
         * Send the given notification immediately.
         *
         * @param \Illuminate\Support\Collection|array|mixed $notifiables
         * @param mixed $notification
         * @param array|null $channels
         * @return void 
         * @static 
         */ 
        public static function sendNow($notifiables, $notification, $channels = null)
        {
                        /** @var \Illuminate\Notifications\ChannelManager $instance */
                        $instance->sendNow($notifiables, $notification, $channels);
        }
        
        /**
         * Get a channel instance.
         *
         * @param string|null $name
         * @return mixed 
         * @static 
         */ 
        public static function channel($name = null)
        {
                        /** @var \Illuminate\Notifications\ChannelManager $instance */
                        return $instance->channel($name);
        }
        
        /**
         * Get the default channel driver name.
         *
         * @return string 
         * @static 
         */ 
        public static function getDefaultDriver()
        {
                        /** @var \Illuminate\Notifications\ChannelManager $instance */
                        return $instance->getDefaultDriver();
        }
        
        /**
         * Get the default channel driver name.
         *
         * @return string 
         * @static 
         */ 
        public static function deliversVia()
        {
                        /** @var \Illuminate\Notifications\ChannelManager $instance */
                        return $instance->deliversVia();
        }
        
        /**
         * Set the default channel driver name.
         *
         * @param string $channel
         * @return void 
         * @static 
         */ 
        public static function deliverVia($channel)
        {
                        /** @var \Illuminate\Notifications\ChannelManager $instance */
                        $instance->deliverVia($channel);
        }
        
        /**
         * Get a driver instance.
         *
         * @param string $driver
         * @return mixed 
         * @throws \InvalidArgumentException
         * @static 
         */ 
        public static function driver($driver = null)
        {
            //Method inherited from \Illuminate\Support\Manager            
                        /** @var \Illuminate\Notifications\ChannelManager $instance */
                        return $instance->driver($driver);
        }
        
        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return \Illuminate\Notifications\ChannelManager 
         * @static 
         */ 
        public static function extend($driver, $callback)
        {
            //Method inherited from \Illuminate\Support\Manager            
                        /** @var \Illuminate\Notifications\ChannelManager $instance */
                        return $instance->extend($driver, $callback);
        }
        
        /**
         * Get all of the created "drivers".
         *
         * @return array 
         * @static 
         */ 
        public static function getDrivers()
        {
            //Method inherited from \Illuminate\Support\Manager            
                        /** @var \Illuminate\Notifications\ChannelManager $instance */
                        return $instance->getDrivers();
        }
        
        /**
         * Assert if a notification was sent based on a truth-test callback.
         *
         * @param mixed $notifiable
         * @param string $notification
         * @param callable|null $callback
         * @return void 
         * @static 
         */ 
        public static function assertSentTo($notifiable, $notification, $callback = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\NotificationFake $instance */
                        $instance->assertSentTo($notifiable, $notification, $callback);
        }
        
        /**
         * Assert if a notification was sent a number of times.
         *
         * @param mixed $notifiable
         * @param string $notification
         * @param int $times
         * @return void 
         * @static 
         */ 
        public static function assertSentToTimes($notifiable, $notification, $times = 1)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\NotificationFake $instance */
                        $instance->assertSentToTimes($notifiable, $notification, $times);
        }
        
        /**
         * Determine if a notification was sent based on a truth-test callback.
         *
         * @param mixed $notifiable
         * @param string $notification
         * @param callable|null $callback
         * @return void 
         * @static 
         */ 
        public static function assertNotSentTo($notifiable, $notification, $callback = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\NotificationFake $instance */
                        $instance->assertNotSentTo($notifiable, $notification, $callback);
        }
        
        /**
         * Assert that no notifications were sent.
         *
         * @return void 
         * @static 
         */ 
        public static function assertNothingSent()
        {
                        /** @var \Illuminate\Support\Testing\Fakes\NotificationFake $instance */
                        $instance->assertNothingSent();
        }
        
        /**
         * Assert the total amount of times a notification was sent.
         *
         * @param int $expectedCount
         * @param string $notification
         * @return void 
         * @static 
         */ 
        public static function assertTimesSent($expectedCount, $notification)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\NotificationFake $instance */
                        $instance->assertTimesSent($expectedCount, $notification);
        }
        
        /**
         * Get all of the notifications matching a truth-test callback.
         *
         * @param mixed $notifiable
         * @param string $notification
         * @param callable|null $callback
         * @return \Illuminate\Support\Collection 
         * @static 
         */ 
        public static function sent($notifiable, $notification, $callback = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\NotificationFake $instance */
                        return $instance->sent($notifiable, $notification, $callback);
        }
        
        /**
         * Determine if there are more notifications left to inspect.
         *
         * @param mixed $notifiable
         * @param string $notification
         * @return bool 
         * @static 
         */ 
        public static function hasSent($notifiable, $notification)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\NotificationFake $instance */
                        return $instance->hasSent($notifiable, $notification);
        }
         
    }

    /**
     * 
     *
     * @method static string sendResetLink(array $credentials)
     * @method static mixed reset(array $credentials, \Closure $callback)
     * @method static void validator(\Closure $callback)
     * @method static bool validateNewPassword(array $credentials)
     * @see \Illuminate\Auth\Passwords\PasswordBroker
     */ 
    class Password {
        
        /**
         * Attempt to get the broker from the local cache.
         *
         * @param string|null $name
         * @return \Illuminate\Contracts\Auth\PasswordBroker 
         * @static 
         */ 
        public static function broker($name = null)
        {
                        /** @var \Illuminate\Auth\Passwords\PasswordBrokerManager $instance */
                        return $instance->broker($name);
        }
        
        /**
         * Get the default password broker name.
         *
         * @return string 
         * @static 
         */ 
        public static function getDefaultDriver()
        {
                        /** @var \Illuminate\Auth\Passwords\PasswordBrokerManager $instance */
                        return $instance->getDefaultDriver();
        }
        
        /**
         * Set the default password broker name.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function setDefaultDriver($name)
        {
                        /** @var \Illuminate\Auth\Passwords\PasswordBrokerManager $instance */
                        $instance->setDefaultDriver($name);
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Queue\QueueManager
     * @see \Illuminate\Queue\Queue
     */ 
    class Queue {
        
        /**
         * Register an event listener for the before job event.
         *
         * @param mixed $callback
         * @return void 
         * @static 
         */ 
        public static function before($callback)
        {
                        /** @var \Illuminate\Queue\QueueManager $instance */
                        $instance->before($callback);
        }
        
        /**
         * Register an event listener for the after job event.
         *
         * @param mixed $callback
         * @return void 
         * @static 
         */ 
        public static function after($callback)
        {
                        /** @var \Illuminate\Queue\QueueManager $instance */
                        $instance->after($callback);
        }
        
        /**
         * Register an event listener for the exception occurred job event.
         *
         * @param mixed $callback
         * @return void 
         * @static 
         */ 
        public static function exceptionOccurred($callback)
        {
                        /** @var \Illuminate\Queue\QueueManager $instance */
                        $instance->exceptionOccurred($callback);
        }
        
        /**
         * Register an event listener for the daemon queue loop.
         *
         * @param mixed $callback
         * @return void 
         * @static 
         */ 
        public static function looping($callback)
        {
                        /** @var \Illuminate\Queue\QueueManager $instance */
                        $instance->looping($callback);
        }
        
        /**
         * Register an event listener for the failed job event.
         *
         * @param mixed $callback
         * @return void 
         * @static 
         */ 
        public static function failing($callback)
        {
                        /** @var \Illuminate\Queue\QueueManager $instance */
                        $instance->failing($callback);
        }
        
        /**
         * Register an event listener for the daemon queue stopping.
         *
         * @param mixed $callback
         * @return void 
         * @static 
         */ 
        public static function stopping($callback)
        {
                        /** @var \Illuminate\Queue\QueueManager $instance */
                        $instance->stopping($callback);
        }
        
        /**
         * Determine if the driver is connected.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function connected($name = null)
        {
                        /** @var \Illuminate\Queue\QueueManager $instance */
                        return $instance->connected($name);
        }
        
        /**
         * Resolve a queue connection instance.
         *
         * @param string $name
         * @return \Illuminate\Contracts\Queue\Queue 
         * @static 
         */ 
        public static function connection($name = null)
        {
                        /** @var \Illuminate\Queue\QueueManager $instance */
                        return $instance->connection($name);
        }
        
        /**
         * Add a queue connection resolver.
         *
         * @param string $driver
         * @param \Closure $resolver
         * @return void 
         * @static 
         */ 
        public static function extend($driver, $resolver)
        {
                        /** @var \Illuminate\Queue\QueueManager $instance */
                        $instance->extend($driver, $resolver);
        }
        
        /**
         * Add a queue connection resolver.
         *
         * @param string $driver
         * @param \Closure $resolver
         * @return void 
         * @static 
         */ 
        public static function addConnector($driver, $resolver)
        {
                        /** @var \Illuminate\Queue\QueueManager $instance */
                        $instance->addConnector($driver, $resolver);
        }
        
        /**
         * Get the name of the default queue connection.
         *
         * @return string 
         * @static 
         */ 
        public static function getDefaultDriver()
        {
                        /** @var \Illuminate\Queue\QueueManager $instance */
                        return $instance->getDefaultDriver();
        }
        
        /**
         * Set the name of the default queue connection.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function setDefaultDriver($name)
        {
                        /** @var \Illuminate\Queue\QueueManager $instance */
                        $instance->setDefaultDriver($name);
        }
        
        /**
         * Get the full name for the given connection.
         *
         * @param string $connection
         * @return string 
         * @static 
         */ 
        public static function getName($connection = null)
        {
                        /** @var \Illuminate\Queue\QueueManager $instance */
                        return $instance->getName($connection);
        }
        
        /**
         * Determine if the application is in maintenance mode.
         *
         * @return bool 
         * @static 
         */ 
        public static function isDownForMaintenance()
        {
                        /** @var \Illuminate\Queue\QueueManager $instance */
                        return $instance->isDownForMaintenance();
        }
        
        /**
         * Assert if a job was pushed based on a truth-test callback.
         *
         * @param string $job
         * @param callable|int|null $callback
         * @return void 
         * @static 
         */ 
        public static function assertPushed($job, $callback = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\QueueFake $instance */
                        $instance->assertPushed($job, $callback);
        }
        
        /**
         * Assert if a job was pushed based on a truth-test callback.
         *
         * @param string $queue
         * @param string $job
         * @param callable|null $callback
         * @return void 
         * @static 
         */ 
        public static function assertPushedOn($queue, $job, $callback = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\QueueFake $instance */
                        $instance->assertPushedOn($queue, $job, $callback);
        }
        
        /**
         * Assert if a job was pushed with chained jobs based on a truth-test callback.
         *
         * @param string $job
         * @param array $expectedChain
         * @param callable|null $callback
         * @return void 
         * @static 
         */ 
        public static function assertPushedWithChain($job, $expectedChain = [], $callback = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\QueueFake $instance */
                        $instance->assertPushedWithChain($job, $expectedChain, $callback);
        }
        
        /**
         * Determine if a job was pushed based on a truth-test callback.
         *
         * @param string $job
         * @param callable|null $callback
         * @return void 
         * @static 
         */ 
        public static function assertNotPushed($job, $callback = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\QueueFake $instance */
                        $instance->assertNotPushed($job, $callback);
        }
        
        /**
         * Assert that no jobs were pushed.
         *
         * @return void 
         * @static 
         */ 
        public static function assertNothingPushed()
        {
                        /** @var \Illuminate\Support\Testing\Fakes\QueueFake $instance */
                        $instance->assertNothingPushed();
        }
        
        /**
         * Get all of the jobs matching a truth-test callback.
         *
         * @param string $job
         * @param callable|null $callback
         * @return \Illuminate\Support\Collection 
         * @static 
         */ 
        public static function pushed($job, $callback = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\QueueFake $instance */
                        return $instance->pushed($job, $callback);
        }
        
        /**
         * Determine if there are any stored jobs for a given class.
         *
         * @param string $job
         * @return bool 
         * @static 
         */ 
        public static function hasPushed($job)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\QueueFake $instance */
                        return $instance->hasPushed($job);
        }
        
        /**
         * Get the size of the queue.
         *
         * @param string $queue
         * @return int 
         * @static 
         */ 
        public static function size($queue = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\QueueFake $instance */
                        return $instance->size($queue);
        }
        
        /**
         * Push a new job onto the queue.
         *
         * @param string $job
         * @param mixed $data
         * @param string $queue
         * @return mixed 
         * @static 
         */ 
        public static function push($job, $data = '', $queue = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\QueueFake $instance */
                        return $instance->push($job, $data, $queue);
        }
        
        /**
         * Push a raw payload onto the queue.
         *
         * @param string $payload
         * @param string $queue
         * @param array $options
         * @return mixed 
         * @static 
         */ 
        public static function pushRaw($payload, $queue = null, $options = [])
        {
                        /** @var \Illuminate\Support\Testing\Fakes\QueueFake $instance */
                        return $instance->pushRaw($payload, $queue, $options);
        }
        
        /**
         * Push a new job onto the queue after a delay.
         *
         * @param \DateTime|int $delay
         * @param string $job
         * @param mixed $data
         * @param string $queue
         * @return mixed 
         * @static 
         */ 
        public static function later($delay, $job, $data = '', $queue = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\QueueFake $instance */
                        return $instance->later($delay, $job, $data, $queue);
        }
        
        /**
         * Push a new job onto the queue.
         *
         * @param string $queue
         * @param string $job
         * @param mixed $data
         * @return mixed 
         * @static 
         */ 
        public static function pushOn($queue, $job, $data = '')
        {
                        /** @var \Illuminate\Support\Testing\Fakes\QueueFake $instance */
                        return $instance->pushOn($queue, $job, $data);
        }
        
        /**
         * Push a new job onto the queue after a delay.
         *
         * @param string $queue
         * @param \DateTime|int $delay
         * @param string $job
         * @param mixed $data
         * @return mixed 
         * @static 
         */ 
        public static function laterOn($queue, $delay, $job, $data = '')
        {
                        /** @var \Illuminate\Support\Testing\Fakes\QueueFake $instance */
                        return $instance->laterOn($queue, $delay, $job, $data);
        }
        
        /**
         * Pop the next job off of the queue.
         *
         * @param string $queue
         * @return \Illuminate\Contracts\Queue\Job|null 
         * @static 
         */ 
        public static function pop($queue = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\QueueFake $instance */
                        return $instance->pop($queue);
        }
        
        /**
         * Push an array of jobs onto the queue.
         *
         * @param array $jobs
         * @param mixed $data
         * @param string $queue
         * @return mixed 
         * @static 
         */ 
        public static function bulk($jobs, $data = '', $queue = null)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\QueueFake $instance */
                        return $instance->bulk($jobs, $data, $queue);
        }
        
        /**
         * Get the connection name for the queue.
         *
         * @return string 
         * @static 
         */ 
        public static function getConnectionName()
        {
                        /** @var \Illuminate\Support\Testing\Fakes\QueueFake $instance */
                        return $instance->getConnectionName();
        }
        
        /**
         * Set the connection name for the queue.
         *
         * @param string $name
         * @return \Illuminate\Support\Testing\Fakes\QueueFake 
         * @static 
         */ 
        public static function setConnectionName($name)
        {
                        /** @var \Illuminate\Support\Testing\Fakes\QueueFake $instance */
                        return $instance->setConnectionName($name);
        }
        
        /**
         * Get the expiration timestamp for an object-based queue handler.
         *
         * @param mixed $job
         * @return mixed 
         * @static 
         */ 
        public static function getJobExpiration($job)
        {
            //Method inherited from \Illuminate\Queue\Queue            
                        /** @var \Illuminate\Queue\SyncQueue $instance */
                        return $instance->getJobExpiration($job);
        }
        
        /**
         * Set the IoC container instance.
         *
         * @param \Illuminate\Container\Container $container
         * @return void 
         * @static 
         */ 
        public static function setContainer($container)
        {
            //Method inherited from \Illuminate\Queue\Queue            
                        /** @var \Illuminate\Queue\SyncQueue $instance */
                        $instance->setContainer($container);
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Routing\Redirector
     */ 
    class Redirect {
        
        /**
         * Create a new redirect response to the "home" route.
         *
         * @param int $status
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */ 
        public static function home($status = 302)
        {
                        /** @var \Illuminate\Routing\Redirector $instance */
                        return $instance->home($status);
        }
        
        /**
         * Create a new redirect response to the previous location.
         *
         * @param int $status
         * @param array $headers
         * @param mixed $fallback
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */ 
        public static function back($status = 302, $headers = [], $fallback = false)
        {
                        /** @var \Illuminate\Routing\Redirector $instance */
                        return $instance->back($status, $headers, $fallback);
        }
        
        /**
         * Create a new redirect response to the current URI.
         *
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */ 
        public static function refresh($status = 302, $headers = [])
        {
                        /** @var \Illuminate\Routing\Redirector $instance */
                        return $instance->refresh($status, $headers);
        }
        
        /**
         * Create a new redirect response, while putting the current URL in the session.
         *
         * @param string $path
         * @param int $status
         * @param array $headers
         * @param bool $secure
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */ 
        public static function guest($path, $status = 302, $headers = [], $secure = null)
        {
                        /** @var \Illuminate\Routing\Redirector $instance */
                        return $instance->guest($path, $status, $headers, $secure);
        }
        
        /**
         * Create a new redirect response to the previously intended location.
         *
         * @param string $default
         * @param int $status
         * @param array $headers
         * @param bool $secure
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */ 
        public static function intended($default = '/', $status = 302, $headers = [], $secure = null)
        {
                        /** @var \Illuminate\Routing\Redirector $instance */
                        return $instance->intended($default, $status, $headers, $secure);
        }
        
        /**
         * Create a new redirect response to the given path.
         *
         * @param string $path
         * @param int $status
         * @param array $headers
         * @param bool $secure
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */ 
        public static function to($path, $status = 302, $headers = [], $secure = null)
        {
                        /** @var \Illuminate\Routing\Redirector $instance */
                        return $instance->to($path, $status, $headers, $secure);
        }
        
        /**
         * Create a new redirect response to an external URL (no validation).
         *
         * @param string $path
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */ 
        public static function away($path, $status = 302, $headers = [])
        {
                        /** @var \Illuminate\Routing\Redirector $instance */
                        return $instance->away($path, $status, $headers);
        }
        
        /**
         * Create a new redirect response to the given HTTPS path.
         *
         * @param string $path
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */ 
        public static function secure($path, $status = 302, $headers = [])
        {
                        /** @var \Illuminate\Routing\Redirector $instance */
                        return $instance->secure($path, $status, $headers);
        }
        
        /**
         * Create a new redirect response to a named route.
         *
         * @param string $route
         * @param mixed $parameters
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */ 
        public static function route($route, $parameters = [], $status = 302, $headers = [])
        {
                        /** @var \Illuminate\Routing\Redirector $instance */
                        return $instance->route($route, $parameters, $status, $headers);
        }
        
        /**
         * Create a new redirect response to a controller action.
         *
         * @param string $action
         * @param mixed $parameters
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */ 
        public static function action($action, $parameters = [], $status = 302, $headers = [])
        {
                        /** @var \Illuminate\Routing\Redirector $instance */
                        return $instance->action($action, $parameters, $status, $headers);
        }
        
        /**
         * Get the URL generator instance.
         *
         * @return \Illuminate\Routing\UrlGenerator 
         * @static 
         */ 
        public static function getUrlGenerator()
        {
                        /** @var \Illuminate\Routing\Redirector $instance */
                        return $instance->getUrlGenerator();
        }
        
        /**
         * Set the active session store.
         *
         * @param \Illuminate\Session\Store $session
         * @return void 
         * @static 
         */ 
        public static function setSession($session)
        {
                        /** @var \Illuminate\Routing\Redirector $instance */
                        $instance->setSession($session);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param object|callable $macro
         * @return void 
         * @static 
         */ 
        public static function macro($name, $macro)
        {
                        \Illuminate\Routing\Redirector::macro($name, $macro);
        }
        
        /**
         * Mix another object into the class.
         *
         * @param object $mixin
         * @return void 
         * @throws \ReflectionException
         * @static 
         */ 
        public static function mixin($mixin)
        {
                        \Illuminate\Routing\Redirector::mixin($mixin);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasMacro($name)
        {
                        return \Illuminate\Routing\Redirector::hasMacro($name);
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Redis\RedisManager
     * @see \Illuminate\Contracts\Redis\Factory
     */ 
    class Redis {
        
        /**
         * Get a Redis connection by name.
         *
         * @param string|null $name
         * @return \Illuminate\Redis\Connections\Connection 
         * @static 
         */ 
        public static function connection($name = null)
        {
                        /** @var \Illuminate\Redis\RedisManager $instance */
                        return $instance->connection($name);
        }
        
        /**
         * Resolve the given connection by name.
         *
         * @param string|null $name
         * @return \Illuminate\Redis\Connections\Connection 
         * @throws \InvalidArgumentException
         * @static 
         */ 
        public static function resolve($name = null)
        {
                        /** @var \Illuminate\Redis\RedisManager $instance */
                        return $instance->resolve($name);
        }
        
        /**
         * Return all of the created connections.
         *
         * @return array 
         * @static 
         */ 
        public static function connections()
        {
                        /** @var \Illuminate\Redis\RedisManager $instance */
                        return $instance->connections();
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Http\Request
     */ 
    class Request {
        
        /**
         * Create a new Illuminate HTTP request from server variables.
         *
         * @return static 
         * @static 
         */ 
        public static function capture()
        {
                        return \Illuminate\Http\Request::capture();
        }
        
        /**
         * Return the Request instance.
         *
         * @return \Illuminate\Http\Request 
         * @static 
         */ 
        public static function instance()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->instance();
        }
        
        /**
         * Get the request method.
         *
         * @return string 
         * @static 
         */ 
        public static function method()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->method();
        }
        
        /**
         * Get the root URL for the application.
         *
         * @return string 
         * @static 
         */ 
        public static function root()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->root();
        }
        
        /**
         * Get the URL (no query string) for the request.
         *
         * @return string 
         * @static 
         */ 
        public static function url()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->url();
        }
        
        /**
         * Get the full URL for the request.
         *
         * @return string 
         * @static 
         */ 
        public static function fullUrl()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->fullUrl();
        }
        
        /**
         * Get the full URL for the request with the added query string parameters.
         *
         * @param array $query
         * @return string 
         * @static 
         */ 
        public static function fullUrlWithQuery($query)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->fullUrlWithQuery($query);
        }
        
        /**
         * Get the current path info for the request.
         *
         * @return string 
         * @static 
         */ 
        public static function path()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->path();
        }
        
        /**
         * Get the current decoded path info for the request.
         *
         * @return string 
         * @static 
         */ 
        public static function decodedPath()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->decodedPath();
        }
        
        /**
         * Get a segment from the URI (1 based index).
         *
         * @param int $index
         * @param string|null $default
         * @return string|null 
         * @static 
         */ 
        public static function segment($index, $default = null)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->segment($index, $default);
        }
        
        /**
         * Get all of the segments for the request path.
         *
         * @return array 
         * @static 
         */ 
        public static function segments()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->segments();
        }
        
        /**
         * Determine if the current request URI matches a pattern.
         *
         * @param mixed $patterns
         * @return bool 
         * @static 
         */ 
        public static function is(...$patterns)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->is(...$patterns);
        }
        
        /**
         * Determine if the route name matches a given pattern.
         *
         * @param mixed $patterns
         * @return bool 
         * @static 
         */ 
        public static function routeIs(...$patterns)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->routeIs(...$patterns);
        }
        
        /**
         * Determine if the current request URL and query string matches a pattern.
         *
         * @param mixed $patterns
         * @return bool 
         * @static 
         */ 
        public static function fullUrlIs(...$patterns)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->fullUrlIs(...$patterns);
        }
        
        /**
         * Determine if the request is the result of an AJAX call.
         *
         * @return bool 
         * @static 
         */ 
        public static function ajax()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->ajax();
        }
        
        /**
         * Determine if the request is the result of an PJAX call.
         *
         * @return bool 
         * @static 
         */ 
        public static function pjax()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->pjax();
        }
        
        /**
         * Determine if the request is over HTTPS.
         *
         * @return bool 
         * @static 
         */ 
        public static function secure()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->secure();
        }
        
        /**
         * Get the client IP address.
         *
         * @return string 
         * @static 
         */ 
        public static function ip()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->ip();
        }
        
        /**
         * Get the client IP addresses.
         *
         * @return array 
         * @static 
         */ 
        public static function ips()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->ips();
        }
        
        /**
         * Get the client user agent.
         *
         * @return string 
         * @static 
         */ 
        public static function userAgent()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->userAgent();
        }
        
        /**
         * Merge new input into the current request's input array.
         *
         * @param array $input
         * @return \Illuminate\Http\Request 
         * @static 
         */ 
        public static function merge($input)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->merge($input);
        }
        
        /**
         * Replace the input for the current request.
         *
         * @param array $input
         * @return \Illuminate\Http\Request 
         * @static 
         */ 
        public static function replace($input)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->replace($input);
        }
        
        /**
         * This method belongs to Symfony HttpFoundation and is not usually needed when using Laravel.
         * 
         * Instead, you may use the "input" method.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed 
         * @static 
         */ 
        public static function get($key, $default = null)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->get($key, $default);
        }
        
        /**
         * Get the JSON payload for the request.
         *
         * @param string $key
         * @param mixed $default
         * @return \Symfony\Component\HttpFoundation\ParameterBag|mixed 
         * @static 
         */ 
        public static function json($key = null, $default = null)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->json($key, $default);
        }
        
        /**
         * Create a new request instance from the given Laravel request.
         *
         * @param \Illuminate\Http\Request $from
         * @param \Illuminate\Http\Request|null $to
         * @return static 
         * @static 
         */ 
        public static function createFrom($from, $to = null)
        {
                        return \Illuminate\Http\Request::createFrom($from, $to);
        }
        
        /**
         * Create an Illuminate request from a Symfony instance.
         *
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @return \Illuminate\Http\Request 
         * @static 
         */ 
        public static function createFromBase($request)
        {
                        return \Illuminate\Http\Request::createFromBase($request);
        }
        
        /**
         * Clones a request and overrides some of its parameters.
         *
         * @param array $query The GET parameters
         * @param array $request The POST parameters
         * @param array $attributes The request attributes (parameters parsed from the PATH_INFO, ...)
         * @param array $cookies The COOKIE parameters
         * @param array $files The FILES parameters
         * @param array $server The SERVER parameters
         * @return static 
         * @static 
         */ 
        public static function duplicate($query = null, $request = null, $attributes = null, $cookies = null, $files = null, $server = null)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->duplicate($query, $request, $attributes, $cookies, $files, $server);
        }
        
        /**
         * Get the session associated with the request.
         *
         * @return \Illuminate\Session\Store 
         * @throws \RuntimeException
         * @static 
         */ 
        public static function session()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->session();
        }
        
        /**
         * Get the session associated with the request.
         *
         * @return \Illuminate\Session\Store|null 
         * @static 
         */ 
        public static function getSession()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getSession();
        }
        
        /**
         * Set the session instance on the request.
         *
         * @param \Illuminate\Contracts\Session\Session $session
         * @return void 
         * @static 
         */ 
        public static function setLaravelSession($session)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        $instance->setLaravelSession($session);
        }
        
        /**
         * Get the user making the request.
         *
         * @param string|null $guard
         * @return mixed 
         * @static 
         */ 
        public static function user($guard = null)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->user($guard);
        }
        
        /**
         * Get the route handling the request.
         *
         * @param string|null $param
         * @return \Illuminate\Routing\Route|object|string 
         * @static 
         */ 
        public static function route($param = null)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->route($param);
        }
        
        /**
         * Get a unique fingerprint for the request / route / IP address.
         *
         * @return string 
         * @throws \RuntimeException
         * @static 
         */ 
        public static function fingerprint()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->fingerprint();
        }
        
        /**
         * Set the JSON payload for the request.
         *
         * @param \Symfony\Component\HttpFoundation\ParameterBag $json
         * @return \Illuminate\Http\Request 
         * @static 
         */ 
        public static function setJson($json)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->setJson($json);
        }
        
        /**
         * Get the user resolver callback.
         *
         * @return \Closure 
         * @static 
         */ 
        public static function getUserResolver()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getUserResolver();
        }
        
        /**
         * Set the user resolver callback.
         *
         * @param \Closure $callback
         * @return \Illuminate\Http\Request 
         * @static 
         */ 
        public static function setUserResolver($callback)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->setUserResolver($callback);
        }
        
        /**
         * Get the route resolver callback.
         *
         * @return \Closure 
         * @static 
         */ 
        public static function getRouteResolver()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getRouteResolver();
        }
        
        /**
         * Set the route resolver callback.
         *
         * @param \Closure $callback
         * @return \Illuminate\Http\Request 
         * @static 
         */ 
        public static function setRouteResolver($callback)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->setRouteResolver($callback);
        }
        
        /**
         * Get all of the input and files for the request.
         *
         * @return array 
         * @static 
         */ 
        public static function toArray()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->toArray();
        }
        
        /**
         * Determine if the given offset exists.
         *
         * @param string $offset
         * @return bool 
         * @static 
         */ 
        public static function offsetExists($offset)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->offsetExists($offset);
        }
        
        /**
         * Get the value at the given offset.
         *
         * @param string $offset
         * @return mixed 
         * @static 
         */ 
        public static function offsetGet($offset)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->offsetGet($offset);
        }
        
        /**
         * Set the value at the given offset.
         *
         * @param string $offset
         * @param mixed $value
         * @return void 
         * @static 
         */ 
        public static function offsetSet($offset, $value)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        $instance->offsetSet($offset, $value);
        }
        
        /**
         * Remove the value at the given offset.
         *
         * @param string $offset
         * @return void 
         * @static 
         */ 
        public static function offsetUnset($offset)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        $instance->offsetUnset($offset);
        }
        
        /**
         * Sets the parameters for this request.
         * 
         * This method also re-initializes all properties.
         *
         * @param array $query The GET parameters
         * @param array $request The POST parameters
         * @param array $attributes The request attributes (parameters parsed from the PATH_INFO, ...)
         * @param array $cookies The COOKIE parameters
         * @param array $files The FILES parameters
         * @param array $server The SERVER parameters
         * @param string|resource|null $content The raw body data
         * @static 
         */ 
        public static function initialize($query = [], $request = [], $attributes = [], $cookies = [], $files = [], $server = [], $content = null)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->initialize($query, $request, $attributes, $cookies, $files, $server, $content);
        }
        
        /**
         * Creates a new request with values from PHP's super globals.
         *
         * @return static 
         * @static 
         */ 
        public static function createFromGlobals()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        return \Illuminate\Http\Request::createFromGlobals();
        }
        
        /**
         * Creates a Request based on a given URI and configuration.
         * 
         * The information contained in the URI always take precedence
         * over the other information (server and parameters).
         *
         * @param string $uri The URI
         * @param string $method The HTTP method
         * @param array $parameters The query (GET) or request (POST) parameters
         * @param array $cookies The request cookies ($_COOKIE)
         * @param array $files The request files ($_FILES)
         * @param array $server The server parameters ($_SERVER)
         * @param string|resource|null $content The raw body data
         * @return static 
         * @static 
         */ 
        public static function create($uri, $method = 'GET', $parameters = [], $cookies = [], $files = [], $server = [], $content = null)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        return \Illuminate\Http\Request::create($uri, $method, $parameters, $cookies, $files, $server, $content);
        }
        
        /**
         * Sets a callable able to create a Request instance.
         * 
         * This is mainly useful when you need to override the Request class
         * to keep BC with an existing system. It should not be used for any
         * other purpose.
         *
         * @param callable|null $callable A PHP callable
         * @static 
         */ 
        public static function setFactory($callable)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        return \Illuminate\Http\Request::setFactory($callable);
        }
        
        /**
         * Overrides the PHP global variables according to this request instance.
         * 
         * It overrides $_GET, $_POST, $_REQUEST, $_SERVER, $_COOKIE.
         * $_FILES is never overridden, see rfc1867
         *
         * @static 
         */ 
        public static function overrideGlobals()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->overrideGlobals();
        }
        
        /**
         * Sets a list of trusted proxies.
         * 
         * You should only list the reverse proxies that you manage directly.
         *
         * @param array $proxies A list of trusted proxies, the string 'REMOTE_ADDR' will be replaced with $_SERVER['REMOTE_ADDR']
         * @param int $trustedHeaderSet A bit field of Request::HEADER_*, to set which headers to trust from your proxies
         * @throws \InvalidArgumentException When $trustedHeaderSet is invalid
         * @static 
         */ 
        public static function setTrustedProxies($proxies, $trustedHeaderSet)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        return \Illuminate\Http\Request::setTrustedProxies($proxies, $trustedHeaderSet);
        }
        
        /**
         * Gets the list of trusted proxies.
         *
         * @return array An array of trusted proxies
         * @static 
         */ 
        public static function getTrustedProxies()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        return \Illuminate\Http\Request::getTrustedProxies();
        }
        
        /**
         * Gets the set of trusted headers from trusted proxies.
         *
         * @return int A bit field of Request::HEADER_* that defines which headers are trusted from your proxies
         * @static 
         */ 
        public static function getTrustedHeaderSet()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        return \Illuminate\Http\Request::getTrustedHeaderSet();
        }
        
        /**
         * Sets a list of trusted host patterns.
         * 
         * You should only list the hosts you manage using regexs.
         *
         * @param array $hostPatterns A list of trusted host patterns
         * @static 
         */ 
        public static function setTrustedHosts($hostPatterns)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        return \Illuminate\Http\Request::setTrustedHosts($hostPatterns);
        }
        
        /**
         * Gets the list of trusted host patterns.
         *
         * @return array An array of trusted host patterns
         * @static 
         */ 
        public static function getTrustedHosts()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        return \Illuminate\Http\Request::getTrustedHosts();
        }
        
        /**
         * Normalizes a query string.
         * 
         * It builds a normalized query string, where keys/value pairs are alphabetized,
         * have consistent escaping and unneeded delimiters are removed.
         *
         * @param string $qs Query string
         * @return string A normalized query string for the Request
         * @static 
         */ 
        public static function normalizeQueryString($qs)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        return \Illuminate\Http\Request::normalizeQueryString($qs);
        }
        
        /**
         * Enables support for the _method request parameter to determine the intended HTTP method.
         * 
         * Be warned that enabling this feature might lead to CSRF issues in your code.
         * Check that you are using CSRF tokens when required.
         * If the HTTP method parameter override is enabled, an html-form with method "POST" can be altered
         * and used to send a "PUT" or "DELETE" request via the _method request parameter.
         * If these methods are not protected against CSRF, this presents a possible vulnerability.
         * 
         * The HTTP method can only be overridden when the real HTTP method is POST.
         *
         * @static 
         */ 
        public static function enableHttpMethodParameterOverride()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        return \Illuminate\Http\Request::enableHttpMethodParameterOverride();
        }
        
        /**
         * Checks whether support for the _method request parameter is enabled.
         *
         * @return bool True when the _method request parameter is enabled, false otherwise
         * @static 
         */ 
        public static function getHttpMethodParameterOverride()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        return \Illuminate\Http\Request::getHttpMethodParameterOverride();
        }
        
        /**
         * Whether the request contains a Session which was started in one of the
         * previous requests.
         *
         * @return bool 
         * @static 
         */ 
        public static function hasPreviousSession()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->hasPreviousSession();
        }
        
        /**
         * Whether the request contains a Session object.
         * 
         * This method does not give any information about the state of the session object,
         * like whether the session is started or not. It is just a way to check if this Request
         * is associated with a Session instance.
         *
         * @return bool true when the Request contains a Session object, false otherwise
         * @static 
         */ 
        public static function hasSession()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->hasSession();
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function setSession($session)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->setSession($session);
        }
        
        /**
         * 
         *
         * @internal 
         * @static 
         */ 
        public static function setSessionFactory($factory)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->setSessionFactory($factory);
        }
        
        /**
         * Returns the client IP addresses.
         * 
         * In the returned array the most trusted IP address is first, and the
         * least trusted one last. The "real" client IP address is the last one,
         * but this is also the least trusted one. Trusted proxies are stripped.
         * 
         * Use this method carefully; you should use getClientIp() instead.
         *
         * @return array The client IP addresses
         * @see getClientIp()
         * @static 
         */ 
        public static function getClientIps()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getClientIps();
        }
        
        /**
         * Returns the client IP address.
         * 
         * This method can read the client IP address from the "X-Forwarded-For" header
         * when trusted proxies were set via "setTrustedProxies()". The "X-Forwarded-For"
         * header value is a comma+space separated list of IP addresses, the left-most
         * being the original client, and each successive proxy that passed the request
         * adding the IP address where it received the request from.
         * 
         * If your reverse proxy uses a different header name than "X-Forwarded-For",
         * ("Client-Ip" for instance), configure it via the $trustedHeaderSet
         * argument of the Request::setTrustedProxies() method instead.
         *
         * @return string|null The client IP address
         * @see getClientIps()
         * @see https://wikipedia.org/wiki/X-Forwarded-For
         * @static 
         */ 
        public static function getClientIp()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getClientIp();
        }
        
        /**
         * Returns current script name.
         *
         * @return string 
         * @static 
         */ 
        public static function getScriptName()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getScriptName();
        }
        
        /**
         * Returns the path being requested relative to the executed script.
         * 
         * The path info always starts with a /.
         * 
         * Suppose this request is instantiated from /mysite on localhost:
         * 
         *  * http://localhost/mysite              returns an empty string
         *  * http://localhost/mysite/about        returns '/about'
         *  * http://localhost/mysite/enco%20ded   returns '/enco%20ded'
         *  * http://localhost/mysite/about?var=1  returns '/about'
         *
         * @return string The raw path (i.e. not urldecoded)
         * @static 
         */ 
        public static function getPathInfo()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getPathInfo();
        }
        
        /**
         * Returns the root path from which this request is executed.
         * 
         * Suppose that an index.php file instantiates this request object:
         * 
         *  * http://localhost/index.php         returns an empty string
         *  * http://localhost/index.php/page    returns an empty string
         *  * http://localhost/web/index.php     returns '/web'
         *  * http://localhost/we%20b/index.php  returns '/we%20b'
         *
         * @return string The raw path (i.e. not urldecoded)
         * @static 
         */ 
        public static function getBasePath()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getBasePath();
        }
        
        /**
         * Returns the root URL from which this request is executed.
         * 
         * The base URL never ends with a /.
         * 
         * This is similar to getBasePath(), except that it also includes the
         * script filename (e.g. index.php) if one exists.
         *
         * @return string The raw URL (i.e. not urldecoded)
         * @static 
         */ 
        public static function getBaseUrl()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getBaseUrl();
        }
        
        /**
         * Gets the request's scheme.
         *
         * @return string 
         * @static 
         */ 
        public static function getScheme()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getScheme();
        }
        
        /**
         * Returns the port on which the request is made.
         * 
         * This method can read the client port from the "X-Forwarded-Port" header
         * when trusted proxies were set via "setTrustedProxies()".
         * 
         * The "X-Forwarded-Port" header must contain the client port.
         *
         * @return int|string can be a string if fetched from the server bag
         * @static 
         */ 
        public static function getPort()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getPort();
        }
        
        /**
         * Returns the user.
         *
         * @return string|null 
         * @static 
         */ 
        public static function getUser()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getUser();
        }
        
        /**
         * Returns the password.
         *
         * @return string|null 
         * @static 
         */ 
        public static function getPassword()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getPassword();
        }
        
        /**
         * Gets the user info.
         *
         * @return string A user name and, optionally, scheme-specific information about how to gain authorization to access the server
         * @static 
         */ 
        public static function getUserInfo()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getUserInfo();
        }
        
        /**
         * Returns the HTTP host being requested.
         * 
         * The port name will be appended to the host if it's non-standard.
         *
         * @return string 
         * @static 
         */ 
        public static function getHttpHost()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getHttpHost();
        }
        
        /**
         * Returns the requested URI (path and query string).
         *
         * @return string The raw URI (i.e. not URI decoded)
         * @static 
         */ 
        public static function getRequestUri()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getRequestUri();
        }
        
        /**
         * Gets the scheme and HTTP host.
         * 
         * If the URL was called with basic authentication, the user
         * and the password are not added to the generated string.
         *
         * @return string The scheme and HTTP host
         * @static 
         */ 
        public static function getSchemeAndHttpHost()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getSchemeAndHttpHost();
        }
        
        /**
         * Generates a normalized URI (URL) for the Request.
         *
         * @return string A normalized URI (URL) for the Request
         * @see getQueryString()
         * @static 
         */ 
        public static function getUri()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getUri();
        }
        
        /**
         * Generates a normalized URI for the given path.
         *
         * @param string $path A path to use instead of the current one
         * @return string The normalized URI for the path
         * @static 
         */ 
        public static function getUriForPath($path)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getUriForPath($path);
        }
        
        /**
         * Returns the path as relative reference from the current Request path.
         * 
         * Only the URIs path component (no schema, host etc.) is relevant and must be given.
         * Both paths must be absolute and not contain relative parts.
         * Relative URLs from one resource to another are useful when generating self-contained downloadable document archives.
         * Furthermore, they can be used to reduce the link size in documents.
         * 
         * Example target paths, given a base path of "/a/b/c/d":
         * - "/a/b/c/d"     -> ""
         * - "/a/b/c/"      -> "./"
         * - "/a/b/"        -> "../"
         * - "/a/b/c/other" -> "other"
         * - "/a/x/y"       -> "../../x/y"
         *
         * @param string $path The target path
         * @return string The relative target path
         * @static 
         */ 
        public static function getRelativeUriForPath($path)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getRelativeUriForPath($path);
        }
        
        /**
         * Generates the normalized query string for the Request.
         * 
         * It builds a normalized query string, where keys/value pairs are alphabetized
         * and have consistent escaping.
         *
         * @return string|null A normalized query string for the Request
         * @static 
         */ 
        public static function getQueryString()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getQueryString();
        }
        
        /**
         * Checks whether the request is secure or not.
         * 
         * This method can read the client protocol from the "X-Forwarded-Proto" header
         * when trusted proxies were set via "setTrustedProxies()".
         * 
         * The "X-Forwarded-Proto" header must contain the protocol: "https" or "http".
         *
         * @return bool 
         * @static 
         */ 
        public static function isSecure()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->isSecure();
        }
        
        /**
         * Returns the host name.
         * 
         * This method can read the client host name from the "X-Forwarded-Host" header
         * when trusted proxies were set via "setTrustedProxies()".
         * 
         * The "X-Forwarded-Host" header must contain the client host name.
         *
         * @return string 
         * @throws SuspiciousOperationException when the host name is invalid or not trusted
         * @static 
         */ 
        public static function getHost()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getHost();
        }
        
        /**
         * Sets the request method.
         *
         * @param string $method
         * @static 
         */ 
        public static function setMethod($method)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->setMethod($method);
        }
        
        /**
         * Gets the request "intended" method.
         * 
         * If the X-HTTP-Method-Override header is set, and if the method is a POST,
         * then it is used to determine the "real" intended HTTP method.
         * 
         * The _method request parameter can also be used to determine the HTTP method,
         * but only if enableHttpMethodParameterOverride() has been called.
         * 
         * The method is always an uppercased string.
         *
         * @return string The request method
         * @see getRealMethod()
         * @static 
         */ 
        public static function getMethod()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getMethod();
        }
        
        /**
         * Gets the "real" request method.
         *
         * @return string The request method
         * @see getMethod()
         * @static 
         */ 
        public static function getRealMethod()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getRealMethod();
        }
        
        /**
         * Gets the mime type associated with the format.
         *
         * @param string $format The format
         * @return string|null The associated mime type (null if not found)
         * @static 
         */ 
        public static function getMimeType($format)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getMimeType($format);
        }
        
        /**
         * Gets the mime types associated with the format.
         *
         * @param string $format The format
         * @return array The associated mime types
         * @static 
         */ 
        public static function getMimeTypes($format)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        return \Illuminate\Http\Request::getMimeTypes($format);
        }
        
        /**
         * Gets the format associated with the mime type.
         *
         * @param string $mimeType The associated mime type
         * @return string|null The format (null if not found)
         * @static 
         */ 
        public static function getFormat($mimeType)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getFormat($mimeType);
        }
        
        /**
         * Associates a format with mime types.
         *
         * @param string $format The format
         * @param string|array $mimeTypes The associated mime types (the preferred one must be the first as it will be used as the content type)
         * @static 
         */ 
        public static function setFormat($format, $mimeTypes)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->setFormat($format, $mimeTypes);
        }
        
        /**
         * Gets the request format.
         * 
         * Here is the process to determine the format:
         * 
         *  * format defined by the user (with setRequestFormat())
         *  * _format request attribute
         *  * $default
         *
         * @see getPreferredFormat
         * @param string|null $default The default format
         * @return string|null The request format
         * @static 
         */ 
        public static function getRequestFormat($default = 'html')
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getRequestFormat($default);
        }
        
        /**
         * Sets the request format.
         *
         * @param string $format The request format
         * @static 
         */ 
        public static function setRequestFormat($format)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->setRequestFormat($format);
        }
        
        /**
         * Gets the format associated with the request.
         *
         * @return string|null The format (null if no content type is present)
         * @static 
         */ 
        public static function getContentType()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getContentType();
        }
        
        /**
         * Sets the default locale.
         *
         * @param string $locale
         * @static 
         */ 
        public static function setDefaultLocale($locale)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->setDefaultLocale($locale);
        }
        
        /**
         * Get the default locale.
         *
         * @return string 
         * @static 
         */ 
        public static function getDefaultLocale()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getDefaultLocale();
        }
        
        /**
         * Sets the locale.
         *
         * @param string $locale
         * @static 
         */ 
        public static function setLocale($locale)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->setLocale($locale);
        }
        
        /**
         * Get the locale.
         *
         * @return string 
         * @static 
         */ 
        public static function getLocale()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getLocale();
        }
        
        /**
         * Checks if the request method is of specified type.
         *
         * @param string $method Uppercase request method (GET, POST etc)
         * @return bool 
         * @static 
         */ 
        public static function isMethod($method)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->isMethod($method);
        }
        
        /**
         * Checks whether or not the method is safe.
         *
         * @see https://tools.ietf.org/html/rfc7231#section-4.2.1
         * @return bool 
         * @static 
         */ 
        public static function isMethodSafe()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->isMethodSafe();
        }
        
        /**
         * Checks whether or not the method is idempotent.
         *
         * @return bool 
         * @static 
         */ 
        public static function isMethodIdempotent()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->isMethodIdempotent();
        }
        
        /**
         * Checks whether the method is cacheable or not.
         *
         * @see https://tools.ietf.org/html/rfc7231#section-4.2.3
         * @return bool True for GET and HEAD, false otherwise
         * @static 
         */ 
        public static function isMethodCacheable()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->isMethodCacheable();
        }
        
        /**
         * Returns the protocol version.
         * 
         * If the application is behind a proxy, the protocol version used in the
         * requests between the client and the proxy and between the proxy and the
         * server might be different. This returns the former (from the "Via" header)
         * if the proxy is trusted (see "setTrustedProxies()"), otherwise it returns
         * the latter (from the "SERVER_PROTOCOL" server parameter).
         *
         * @return string 
         * @static 
         */ 
        public static function getProtocolVersion()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getProtocolVersion();
        }
        
        /**
         * Returns the request body content.
         *
         * @param bool $asResource If true, a resource will be returned
         * @return string|resource The request body content or a resource to read the body stream
         * @throws \LogicException
         * @static 
         */ 
        public static function getContent($asResource = false)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getContent($asResource);
        }
        
        /**
         * Gets the Etags.
         *
         * @return array The entity tags
         * @static 
         */ 
        public static function getETags()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getETags();
        }
        
        /**
         * 
         *
         * @return bool 
         * @static 
         */ 
        public static function isNoCache()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->isNoCache();
        }
        
        /**
         * Gets the preferred format for the response by inspecting, in the following order:
         *   * the request format set using setRequestFormat
         *   * the values of the Accept HTTP header
         * 
         * Note that if you use this method, you should send the "Vary: Accept" header
         * in the response to prevent any issues with intermediary HTTP caches.
         *
         * @static 
         */ 
        public static function getPreferredFormat($default = 'html')
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getPreferredFormat($default);
        }
        
        /**
         * Returns the preferred language.
         *
         * @param string[] $locales An array of ordered available locales
         * @return string|null The preferred locale
         * @static 
         */ 
        public static function getPreferredLanguage($locales = null)
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getPreferredLanguage($locales);
        }
        
        /**
         * Gets a list of languages acceptable by the client browser.
         *
         * @return array Languages ordered in the user browser preferences
         * @static 
         */ 
        public static function getLanguages()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getLanguages();
        }
        
        /**
         * Gets a list of charsets acceptable by the client browser.
         *
         * @return array List of charsets in preferable order
         * @static 
         */ 
        public static function getCharsets()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getCharsets();
        }
        
        /**
         * Gets a list of encodings acceptable by the client browser.
         *
         * @return array List of encodings in preferable order
         * @static 
         */ 
        public static function getEncodings()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getEncodings();
        }
        
        /**
         * Gets a list of content types acceptable by the client browser.
         *
         * @return array List of content types in preferable order
         * @static 
         */ 
        public static function getAcceptableContentTypes()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->getAcceptableContentTypes();
        }
        
        /**
         * Returns true if the request is a XMLHttpRequest.
         * 
         * It works if your JavaScript library sets an X-Requested-With HTTP header.
         * It is known to work with common JavaScript frameworks:
         *
         * @see https://wikipedia.org/wiki/List_of_Ajax_frameworks#JavaScript
         * @return bool true if the request is an XMLHttpRequest, false otherwise
         * @static 
         */ 
        public static function isXmlHttpRequest()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->isXmlHttpRequest();
        }
        
        /**
         * Indicates whether this request originated from a trusted proxy.
         * 
         * This can be useful to determine whether or not to trust the
         * contents of a proxy-specific header.
         *
         * @return bool true if the request came from a trusted proxy, false otherwise
         * @static 
         */ 
        public static function isFromTrustedProxy()
        {
            //Method inherited from \Symfony\Component\HttpFoundation\Request            
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->isFromTrustedProxy();
        }
        
        /**
         * Determine if the given content types match.
         *
         * @param string $actual
         * @param string $type
         * @return bool 
         * @static 
         */ 
        public static function matchesType($actual, $type)
        {
                        return \Illuminate\Http\Request::matchesType($actual, $type);
        }
        
        /**
         * Determine if the request is sending JSON.
         *
         * @return bool 
         * @static 
         */ 
        public static function isJson()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->isJson();
        }
        
        /**
         * Determine if the current request probably expects a JSON response.
         *
         * @return bool 
         * @static 
         */ 
        public static function expectsJson()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->expectsJson();
        }
        
        /**
         * Determine if the current request is asking for JSON.
         *
         * @return bool 
         * @static 
         */ 
        public static function wantsJson()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->wantsJson();
        }
        
        /**
         * Determines whether the current requests accepts a given content type.
         *
         * @param string|array $contentTypes
         * @return bool 
         * @static 
         */ 
        public static function accepts($contentTypes)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->accepts($contentTypes);
        }
        
        /**
         * Return the most suitable content type from the given array based on content negotiation.
         *
         * @param string|array $contentTypes
         * @return string|null 
         * @static 
         */ 
        public static function prefers($contentTypes)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->prefers($contentTypes);
        }
        
        /**
         * Determine if the current request accepts any content type.
         *
         * @return bool 
         * @static 
         */ 
        public static function acceptsAnyContentType()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->acceptsAnyContentType();
        }
        
        /**
         * Determines whether a request accepts JSON.
         *
         * @return bool 
         * @static 
         */ 
        public static function acceptsJson()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->acceptsJson();
        }
        
        /**
         * Determines whether a request accepts HTML.
         *
         * @return bool 
         * @static 
         */ 
        public static function acceptsHtml()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->acceptsHtml();
        }
        
        /**
         * Get the data format expected in the response.
         *
         * @param string $default
         * @return string 
         * @static 
         */ 
        public static function format($default = 'html')
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->format($default);
        }
        
        /**
         * Retrieve an old input item.
         *
         * @param string $key
         * @param string|array|null $default
         * @return string|array 
         * @static 
         */ 
        public static function old($key = null, $default = null)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->old($key, $default);
        }
        
        /**
         * Flash the input for the current request to the session.
         *
         * @return void 
         * @static 
         */ 
        public static function flash()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        $instance->flash();
        }
        
        /**
         * Flash only some of the input to the session.
         *
         * @param array|mixed $keys
         * @return void 
         * @static 
         */ 
        public static function flashOnly($keys)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        $instance->flashOnly($keys);
        }
        
        /**
         * Flash only some of the input to the session.
         *
         * @param array|mixed $keys
         * @return void 
         * @static 
         */ 
        public static function flashExcept($keys)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        $instance->flashExcept($keys);
        }
        
        /**
         * Flush all of the old input from the session.
         *
         * @return void 
         * @static 
         */ 
        public static function flush()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        $instance->flush();
        }
        
        /**
         * Retrieve a server variable from the request.
         *
         * @param string $key
         * @param string|array|null $default
         * @return string|array 
         * @static 
         */ 
        public static function server($key = null, $default = null)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->server($key, $default);
        }
        
        /**
         * Determine if a header is set on the request.
         *
         * @param string $key
         * @return bool 
         * @static 
         */ 
        public static function hasHeader($key)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->hasHeader($key);
        }
        
        /**
         * Retrieve a header from the request.
         *
         * @param string $key
         * @param string|array|null $default
         * @return string|array 
         * @static 
         */ 
        public static function header($key = null, $default = null)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->header($key, $default);
        }
        
        /**
         * Get the bearer token from the request headers.
         *
         * @return string|null 
         * @static 
         */ 
        public static function bearerToken()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->bearerToken();
        }
        
        /**
         * Determine if the request contains a given input item key.
         *
         * @param string|array $key
         * @return bool 
         * @static 
         */ 
        public static function exists($key)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->exists($key);
        }
        
        /**
         * Determine if the request contains a given input item key.
         *
         * @param string|array $key
         * @return bool 
         * @static 
         */ 
        public static function has($key)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->has($key);
        }
        
        /**
         * Determine if the request contains any of the given inputs.
         *
         * @param string|array $keys
         * @return bool 
         * @static 
         */ 
        public static function hasAny($keys)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->hasAny($keys);
        }
        
        /**
         * Determine if the request contains a non-empty value for an input item.
         *
         * @param string|array $key
         * @return bool 
         * @static 
         */ 
        public static function filled($key)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->filled($key);
        }
        
        /**
         * Determine if the request contains a non-empty value for any of the given inputs.
         *
         * @param string|array $keys
         * @return bool 
         * @static 
         */ 
        public static function anyFilled($keys)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->anyFilled($keys);
        }
        
        /**
         * Get the keys for all of the input and files.
         *
         * @return array 
         * @static 
         */ 
        public static function keys()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->keys();
        }
        
        /**
         * Get all of the input and files for the request.
         *
         * @param array|mixed $keys
         * @return array 
         * @static 
         */ 
        public static function all($keys = null)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->all($keys);
        }
        
        /**
         * Retrieve an input item from the request.
         *
         * @param string|null $key
         * @param string|array|null $default
         * @return string|array|null 
         * @static 
         */ 
        public static function input($key = null, $default = null)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->input($key, $default);
        }
        
        /**
         * Get a subset containing the provided keys with values from the input data.
         *
         * @param array|mixed $keys
         * @return array 
         * @static 
         */ 
        public static function only($keys)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->only($keys);
        }
        
        /**
         * Get all of the input except for a specified array of items.
         *
         * @param array|mixed $keys
         * @return array 
         * @static 
         */ 
        public static function except($keys)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->except($keys);
        }
        
        /**
         * Retrieve a query string item from the request.
         *
         * @param string $key
         * @param string|array|null $default
         * @return string|array 
         * @static 
         */ 
        public static function query($key = null, $default = null)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->query($key, $default);
        }
        
        /**
         * Retrieve a request payload item from the request.
         *
         * @param string $key
         * @param string|array|null $default
         * @return string|array 
         * @static 
         */ 
        public static function post($key = null, $default = null)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->post($key, $default);
        }
        
        /**
         * Determine if a cookie is set on the request.
         *
         * @param string $key
         * @return bool 
         * @static 
         */ 
        public static function hasCookie($key)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->hasCookie($key);
        }
        
        /**
         * Retrieve a cookie from the request.
         *
         * @param string $key
         * @param string|array|null $default
         * @return string|array 
         * @static 
         */ 
        public static function cookie($key = null, $default = null)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->cookie($key, $default);
        }
        
        /**
         * Get an array of all of the files on the request.
         *
         * @return array 
         * @static 
         */ 
        public static function allFiles()
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->allFiles();
        }
        
        /**
         * Determine if the uploaded data contains a file.
         *
         * @param string $key
         * @return bool 
         * @static 
         */ 
        public static function hasFile($key)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->hasFile($key);
        }
        
        /**
         * Retrieve a file from the request.
         *
         * @param string $key
         * @param mixed $default
         * @return \Illuminate\Http\UploadedFile|array|null 
         * @static 
         */ 
        public static function file($key = null, $default = null)
        {
                        /** @var \Illuminate\Http\Request $instance */
                        return $instance->file($key, $default);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param object|callable $macro
         * @return void 
         * @static 
         */ 
        public static function macro($name, $macro)
        {
                        \Illuminate\Http\Request::macro($name, $macro);
        }
        
        /**
         * Mix another object into the class.
         *
         * @param object $mixin
         * @return void 
         * @throws \ReflectionException
         * @static 
         */ 
        public static function mixin($mixin)
        {
                        \Illuminate\Http\Request::mixin($mixin);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasMacro($name)
        {
                        return \Illuminate\Http\Request::hasMacro($name);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function validate($rules, ...$params)
        {
                        return \Illuminate\Http\Request::validate($rules, ...$params);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function hasValidSignature()
        {
                        return \Illuminate\Http\Request::hasValidSignature();
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Contracts\Routing\ResponseFactory
     */ 
    class Response {
        
        /**
         * Return a new response from the application.
         *
         * @param string $content
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\Response 
         * @static 
         */ 
        public static function make($content = '', $status = 200, $headers = [])
        {
                        /** @var \Illuminate\Routing\ResponseFactory $instance */
                        return $instance->make($content, $status, $headers);
        }
        
        /**
         * Return a new view response from the application.
         *
         * @param string $view
         * @param array $data
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\Response 
         * @static 
         */ 
        public static function view($view, $data = [], $status = 200, $headers = [])
        {
                        /** @var \Illuminate\Routing\ResponseFactory $instance */
                        return $instance->view($view, $data, $status, $headers);
        }
        
        /**
         * Return a new JSON response from the application.
         *
         * @param mixed $data
         * @param int $status
         * @param array $headers
         * @param int $options
         * @return \Illuminate\Http\JsonResponse 
         * @static 
         */ 
        public static function json($data = [], $status = 200, $headers = [], $options = 0)
        {
                        /** @var \Illuminate\Routing\ResponseFactory $instance */
                        return $instance->json($data, $status, $headers, $options);
        }
        
        /**
         * Return a new JSONP response from the application.
         *
         * @param string $callback
         * @param mixed $data
         * @param int $status
         * @param array $headers
         * @param int $options
         * @return \Illuminate\Http\JsonResponse 
         * @static 
         */ 
        public static function jsonp($callback, $data = [], $status = 200, $headers = [], $options = 0)
        {
                        /** @var \Illuminate\Routing\ResponseFactory $instance */
                        return $instance->jsonp($callback, $data, $status, $headers, $options);
        }
        
        /**
         * Return a new streamed response from the application.
         *
         * @param \Closure $callback
         * @param int $status
         * @param array $headers
         * @return \Symfony\Component\HttpFoundation\StreamedResponse 
         * @static 
         */ 
        public static function stream($callback, $status = 200, $headers = [])
        {
                        /** @var \Illuminate\Routing\ResponseFactory $instance */
                        return $instance->stream($callback, $status, $headers);
        }
        
        /**
         * Return a new streamed response as a file download from the application.
         *
         * @param \Closure $callback
         * @param string|null $name
         * @param array $headers
         * @param string|null $disposition
         * @return \Symfony\Component\HttpFoundation\StreamedResponse 
         * @static 
         */ 
        public static function streamDownload($callback, $name = null, $headers = [], $disposition = 'attachment')
        {
                        /** @var \Illuminate\Routing\ResponseFactory $instance */
                        return $instance->streamDownload($callback, $name, $headers, $disposition);
        }
        
        /**
         * Create a new file download response.
         *
         * @param \SplFileInfo|string $file
         * @param string|null $name
         * @param array $headers
         * @param string|null $disposition
         * @return \Symfony\Component\HttpFoundation\BinaryFileResponse 
         * @static 
         */ 
        public static function download($file, $name = null, $headers = [], $disposition = 'attachment')
        {
                        /** @var \Illuminate\Routing\ResponseFactory $instance */
                        return $instance->download($file, $name, $headers, $disposition);
        }
        
        /**
         * Return the raw contents of a binary file.
         *
         * @param \SplFileInfo|string $file
         * @param array $headers
         * @return \Symfony\Component\HttpFoundation\BinaryFileResponse 
         * @static 
         */ 
        public static function file($file, $headers = [])
        {
                        /** @var \Illuminate\Routing\ResponseFactory $instance */
                        return $instance->file($file, $headers);
        }
        
        /**
         * Create a new redirect response to the given path.
         *
         * @param string $path
         * @param int $status
         * @param array $headers
         * @param bool|null $secure
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */ 
        public static function redirectTo($path, $status = 302, $headers = [], $secure = null)
        {
                        /** @var \Illuminate\Routing\ResponseFactory $instance */
                        return $instance->redirectTo($path, $status, $headers, $secure);
        }
        
        /**
         * Create a new redirect response to a named route.
         *
         * @param string $route
         * @param array $parameters
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */ 
        public static function redirectToRoute($route, $parameters = [], $status = 302, $headers = [])
        {
                        /** @var \Illuminate\Routing\ResponseFactory $instance */
                        return $instance->redirectToRoute($route, $parameters, $status, $headers);
        }
        
        /**
         * Create a new redirect response to a controller action.
         *
         * @param string $action
         * @param array $parameters
         * @param int $status
         * @param array $headers
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */ 
        public static function redirectToAction($action, $parameters = [], $status = 302, $headers = [])
        {
                        /** @var \Illuminate\Routing\ResponseFactory $instance */
                        return $instance->redirectToAction($action, $parameters, $status, $headers);
        }
        
        /**
         * Create a new redirect response, while putting the current URL in the session.
         *
         * @param string $path
         * @param int $status
         * @param array $headers
         * @param bool|null $secure
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */ 
        public static function redirectGuest($path, $status = 302, $headers = [], $secure = null)
        {
                        /** @var \Illuminate\Routing\ResponseFactory $instance */
                        return $instance->redirectGuest($path, $status, $headers, $secure);
        }
        
        /**
         * Create a new redirect response to the previously intended location.
         *
         * @param string $default
         * @param int $status
         * @param array $headers
         * @param bool|null $secure
         * @return \Illuminate\Http\RedirectResponse 
         * @static 
         */ 
        public static function redirectToIntended($default = '/', $status = 302, $headers = [], $secure = null)
        {
                        /** @var \Illuminate\Routing\ResponseFactory $instance */
                        return $instance->redirectToIntended($default, $status, $headers, $secure);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param object|callable $macro
         * @return void 
         * @static 
         */ 
        public static function macro($name, $macro)
        {
                        \Illuminate\Routing\ResponseFactory::macro($name, $macro);
        }
        
        /**
         * Mix another object into the class.
         *
         * @param object $mixin
         * @return void 
         * @throws \ReflectionException
         * @static 
         */ 
        public static function mixin($mixin)
        {
                        \Illuminate\Routing\ResponseFactory::mixin($mixin);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasMacro($name)
        {
                        return \Illuminate\Routing\ResponseFactory::hasMacro($name);
        }
         
    }

    /**
     * 
     *
     * @method static \Illuminate\Routing\RouteRegistrar prefix(string  $prefix)
     * @method static \Illuminate\Routing\RouteRegistrar where(array  $where)
     * @method static \Illuminate\Routing\RouteRegistrar middleware(array|string|null $middleware)
     * @method static \Illuminate\Routing\RouteRegistrar as(string $value)
     * @method static \Illuminate\Routing\RouteRegistrar domain(string $value)
     * @method static \Illuminate\Routing\RouteRegistrar name(string $value)
     * @method static \Illuminate\Routing\RouteRegistrar namespace(string $value)
     * @see \Illuminate\Routing\Router
     */ 
    class Route {
        
        /**
         * Register a new GET route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function get($uri, $action = null)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->get($uri, $action);
        }
        
        /**
         * Register a new POST route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function post($uri, $action = null)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->post($uri, $action);
        }
        
        /**
         * Register a new PUT route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function put($uri, $action = null)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->put($uri, $action);
        }
        
        /**
         * Register a new PATCH route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function patch($uri, $action = null)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->patch($uri, $action);
        }
        
        /**
         * Register a new DELETE route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function delete($uri, $action = null)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->delete($uri, $action);
        }
        
        /**
         * Register a new OPTIONS route with the router.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function options($uri, $action = null)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->options($uri, $action);
        }
        
        /**
         * Register a new route responding to all verbs.
         *
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function any($uri, $action = null)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->any($uri, $action);
        }
        
        /**
         * Register a new Fallback route with the router.
         *
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function fallback($action)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->fallback($action);
        }
        
        /**
         * Create a redirect from one URI to another.
         *
         * @param string $uri
         * @param string $destination
         * @param int $status
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function redirect($uri, $destination, $status = 301)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->redirect($uri, $destination, $status);
        }
        
        /**
         * Register a new route that returns a view.
         *
         * @param string $uri
         * @param string $view
         * @param array $data
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function view($uri, $view, $data = [])
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->view($uri, $view, $data);
        }
        
        /**
         * Register a new route with the given verbs.
         *
         * @param array|string $methods
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function match($methods, $uri, $action = null)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->match($methods, $uri, $action);
        }
        
        /**
         * Register an array of resource controllers.
         *
         * @param array $resources
         * @return void 
         * @static 
         */ 
        public static function resources($resources)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->resources($resources);
        }
        
        /**
         * Route a resource to a controller.
         *
         * @param string $name
         * @param string $controller
         * @param array $options
         * @return \Illuminate\Routing\PendingResourceRegistration 
         * @static 
         */ 
        public static function resource($name, $controller, $options = [])
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->resource($name, $controller, $options);
        }
        
        /**
         * Register an array of API resource controllers.
         *
         * @param array $resources
         * @return void 
         * @static 
         */ 
        public static function apiResources($resources)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->apiResources($resources);
        }
        
        /**
         * Route an API resource to a controller.
         *
         * @param string $name
         * @param string $controller
         * @param array $options
         * @return \Illuminate\Routing\PendingResourceRegistration 
         * @static 
         */ 
        public static function apiResource($name, $controller, $options = [])
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->apiResource($name, $controller, $options);
        }
        
        /**
         * Create a route group with shared attributes.
         *
         * @param array $attributes
         * @param \Closure|string $routes
         * @return void 
         * @static 
         */ 
        public static function group($attributes, $routes)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->group($attributes, $routes);
        }
        
        /**
         * Merge the given array with the last group stack.
         *
         * @param array $new
         * @return array 
         * @static 
         */ 
        public static function mergeWithLastGroup($new)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->mergeWithLastGroup($new);
        }
        
        /**
         * Get the prefix from the last group on the stack.
         *
         * @return string 
         * @static 
         */ 
        public static function getLastGroupPrefix()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->getLastGroupPrefix();
        }
        
        /**
         * Add a route to the underlying route collection.
         *
         * @param array|string $methods
         * @param string $uri
         * @param \Closure|array|string|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function addRoute($methods, $uri, $action)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->addRoute($methods, $uri, $action);
        }
        
        /**
         * Return the response returned by the given route.
         *
         * @param string $name
         * @return mixed 
         * @static 
         */ 
        public static function respondWithRoute($name)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->respondWithRoute($name);
        }
        
        /**
         * Dispatch the request to the application.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse 
         * @static 
         */ 
        public static function dispatch($request)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->dispatch($request);
        }
        
        /**
         * Dispatch the request to a route and return the response.
         *
         * @param \Illuminate\Http\Request $request
         * @return mixed 
         * @static 
         */ 
        public static function dispatchToRoute($request)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->dispatchToRoute($request);
        }
        
        /**
         * Gather the middleware for the given route with resolved class names.
         *
         * @param \Illuminate\Routing\Route $route
         * @return array 
         * @static 
         */ 
        public static function gatherRouteMiddleware($route)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->gatherRouteMiddleware($route);
        }
        
        /**
         * Create a response instance from the given value.
         *
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @param mixed $response
         * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse 
         * @static 
         */ 
        public static function prepareResponse($request, $response)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->prepareResponse($request, $response);
        }
        
        /**
         * Static version of prepareResponse.
         *
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @param mixed $response
         * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse 
         * @static 
         */ 
        public static function toResponse($request, $response)
        {
                        return \Illuminate\Routing\Router::toResponse($request, $response);
        }
        
        /**
         * Substitute the route bindings onto the route.
         *
         * @param \Illuminate\Routing\Route $route
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function substituteBindings($route)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->substituteBindings($route);
        }
        
        /**
         * Substitute the implicit Eloquent model bindings for the route.
         *
         * @param \Illuminate\Routing\Route $route
         * @return void 
         * @static 
         */ 
        public static function substituteImplicitBindings($route)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->substituteImplicitBindings($route);
        }
        
        /**
         * Register a route matched event listener.
         *
         * @param string|callable $callback
         * @return void 
         * @static 
         */ 
        public static function matched($callback)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->matched($callback);
        }
        
        /**
         * Get all of the defined middleware short-hand names.
         *
         * @return array 
         * @static 
         */ 
        public static function getMiddleware()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->getMiddleware();
        }
        
        /**
         * Register a short-hand name for a middleware.
         *
         * @param string $name
         * @param string $class
         * @return \Illuminate\Routing\Router 
         * @static 
         */ 
        public static function aliasMiddleware($name, $class)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->aliasMiddleware($name, $class);
        }
        
        /**
         * Check if a middlewareGroup with the given name exists.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasMiddlewareGroup($name)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->hasMiddlewareGroup($name);
        }
        
        /**
         * Get all of the defined middleware groups.
         *
         * @return array 
         * @static 
         */ 
        public static function getMiddlewareGroups()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->getMiddlewareGroups();
        }
        
        /**
         * Register a group of middleware.
         *
         * @param string $name
         * @param array $middleware
         * @return \Illuminate\Routing\Router 
         * @static 
         */ 
        public static function middlewareGroup($name, $middleware)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->middlewareGroup($name, $middleware);
        }
        
        /**
         * Add a middleware to the beginning of a middleware group.
         * 
         * If the middleware is already in the group, it will not be added again.
         *
         * @param string $group
         * @param string $middleware
         * @return \Illuminate\Routing\Router 
         * @static 
         */ 
        public static function prependMiddlewareToGroup($group, $middleware)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->prependMiddlewareToGroup($group, $middleware);
        }
        
        /**
         * Add a middleware to the end of a middleware group.
         * 
         * If the middleware is already in the group, it will not be added again.
         *
         * @param string $group
         * @param string $middleware
         * @return \Illuminate\Routing\Router 
         * @static 
         */ 
        public static function pushMiddlewareToGroup($group, $middleware)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->pushMiddlewareToGroup($group, $middleware);
        }
        
        /**
         * Add a new route parameter binder.
         *
         * @param string $key
         * @param string|callable $binder
         * @return void 
         * @static 
         */ 
        public static function bind($key, $binder)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->bind($key, $binder);
        }
        
        /**
         * Register a model binder for a wildcard.
         *
         * @param string $key
         * @param string $class
         * @param \Closure|null $callback
         * @return void 
         * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
         * @static 
         */ 
        public static function model($key, $class, $callback = null)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->model($key, $class, $callback);
        }
        
        /**
         * Get the binding callback for a given binding.
         *
         * @param string $key
         * @return \Closure|null 
         * @static 
         */ 
        public static function getBindingCallback($key)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->getBindingCallback($key);
        }
        
        /**
         * Get the global "where" patterns.
         *
         * @return array 
         * @static 
         */ 
        public static function getPatterns()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->getPatterns();
        }
        
        /**
         * Set a global where pattern on all routes.
         *
         * @param string $key
         * @param string $pattern
         * @return void 
         * @static 
         */ 
        public static function pattern($key, $pattern)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->pattern($key, $pattern);
        }
        
        /**
         * Set a group of global where patterns on all routes.
         *
         * @param array $patterns
         * @return void 
         * @static 
         */ 
        public static function patterns($patterns)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->patterns($patterns);
        }
        
        /**
         * Determine if the router currently has a group stack.
         *
         * @return bool 
         * @static 
         */ 
        public static function hasGroupStack()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->hasGroupStack();
        }
        
        /**
         * Get the current group stack for the router.
         *
         * @return array 
         * @static 
         */ 
        public static function getGroupStack()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->getGroupStack();
        }
        
        /**
         * Get a route parameter for the current route.
         *
         * @param string $key
         * @param string $default
         * @return mixed 
         * @static 
         */ 
        public static function input($key, $default = null)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->input($key, $default);
        }
        
        /**
         * Get the request currently being dispatched.
         *
         * @return \Illuminate\Http\Request 
         * @static 
         */ 
        public static function getCurrentRequest()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->getCurrentRequest();
        }
        
        /**
         * Get the currently dispatched route instance.
         *
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function getCurrentRoute()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->getCurrentRoute();
        }
        
        /**
         * Get the currently dispatched route instance.
         *
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function current()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->current();
        }
        
        /**
         * Check if a route with the given name exists.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function has($name)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->has($name);
        }
        
        /**
         * Get the current route name.
         *
         * @return string|null 
         * @static 
         */ 
        public static function currentRouteName()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->currentRouteName();
        }
        
        /**
         * Alias for the "currentRouteNamed" method.
         *
         * @param mixed $patterns
         * @return bool 
         * @static 
         */ 
        public static function is(...$patterns)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->is(...$patterns);
        }
        
        /**
         * Determine if the current route matches a pattern.
         *
         * @param mixed $patterns
         * @return bool 
         * @static 
         */ 
        public static function currentRouteNamed(...$patterns)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->currentRouteNamed(...$patterns);
        }
        
        /**
         * Get the current route action.
         *
         * @return string|null 
         * @static 
         */ 
        public static function currentRouteAction()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->currentRouteAction();
        }
        
        /**
         * Alias for the "currentRouteUses" method.
         *
         * @param array $patterns
         * @return bool 
         * @static 
         */ 
        public static function uses(...$patterns)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->uses(...$patterns);
        }
        
        /**
         * Determine if the current route action matches a given action.
         *
         * @param string $action
         * @return bool 
         * @static 
         */ 
        public static function currentRouteUses($action)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->currentRouteUses($action);
        }
        
        /**
         * Register the typical authentication routes for an application.
         *
         * @return void 
         * @static 
         */ 
        public static function auth()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->auth();
        }
        
        /**
         * Set the unmapped global resource parameters to singular.
         *
         * @param bool $singular
         * @return void 
         * @static 
         */ 
        public static function singularResourceParameters($singular = true)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->singularResourceParameters($singular);
        }
        
        /**
         * Set the global resource parameter mapping.
         *
         * @param array $parameters
         * @return void 
         * @static 
         */ 
        public static function resourceParameters($parameters = [])
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->resourceParameters($parameters);
        }
        
        /**
         * Get or set the verbs used in the resource URIs.
         *
         * @param array $verbs
         * @return array|null 
         * @static 
         */ 
        public static function resourceVerbs($verbs = [])
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->resourceVerbs($verbs);
        }
        
        /**
         * Get the underlying route collection.
         *
         * @return \Illuminate\Routing\RouteCollection 
         * @static 
         */ 
        public static function getRoutes()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->getRoutes();
        }
        
        /**
         * Set the route collection instance.
         *
         * @param \Illuminate\Routing\RouteCollection $routes
         * @return void 
         * @static 
         */ 
        public static function setRoutes($routes)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->setRoutes($routes);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param object|callable $macro
         * @return void 
         * @static 
         */ 
        public static function macro($name, $macro)
        {
                        \Illuminate\Routing\Router::macro($name, $macro);
        }
        
        /**
         * Mix another object into the class.
         *
         * @param object $mixin
         * @return void 
         * @throws \ReflectionException
         * @static 
         */ 
        public static function mixin($mixin)
        {
                        \Illuminate\Routing\Router::mixin($mixin);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasMacro($name)
        {
                        return \Illuminate\Routing\Router::hasMacro($name);
        }
        
        /**
         * Dynamically handle calls to the class.
         *
         * @param string $method
         * @param array $parameters
         * @return mixed 
         * @throws \BadMethodCallException
         * @static 
         */ 
        public static function macroCall($method, $parameters)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->macroCall($method, $parameters);
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Database\Schema\Builder
     */ 
    class Schema {
        
        /**
         * Determine if the given table exists.
         *
         * @param string $table
         * @return bool 
         * @static 
         */ 
        public static function hasTable($table)
        {
                        /** @var \Illuminate\Database\Schema\MySqlBuilder $instance */
                        return $instance->hasTable($table);
        }
        
        /**
         * Get the column listing for a given table.
         *
         * @param string $table
         * @return array 
         * @static 
         */ 
        public static function getColumnListing($table)
        {
                        /** @var \Illuminate\Database\Schema\MySqlBuilder $instance */
                        return $instance->getColumnListing($table);
        }
        
        /**
         * Drop all tables from the database.
         *
         * @return void 
         * @static 
         */ 
        public static function dropAllTables()
        {
                        /** @var \Illuminate\Database\Schema\MySqlBuilder $instance */
                        $instance->dropAllTables();
        }
        
        /**
         * Drop all views from the database.
         *
         * @return void 
         * @static 
         */ 
        public static function dropAllViews()
        {
                        /** @var \Illuminate\Database\Schema\MySqlBuilder $instance */
                        $instance->dropAllViews();
        }
        
        /**
         * Set the default string length for migrations.
         *
         * @param int $length
         * @return void 
         * @static 
         */ 
        public static function defaultStringLength($length)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
                        \Illuminate\Database\Schema\MySqlBuilder::defaultStringLength($length);
        }
        
        /**
         * Determine if the given table has a given column.
         *
         * @param string $table
         * @param string $column
         * @return bool 
         * @static 
         */ 
        public static function hasColumn($table, $column)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
                        /** @var \Illuminate\Database\Schema\MySqlBuilder $instance */
                        return $instance->hasColumn($table, $column);
        }
        
        /**
         * Determine if the given table has given columns.
         *
         * @param string $table
         * @param array $columns
         * @return bool 
         * @static 
         */ 
        public static function hasColumns($table, $columns)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
                        /** @var \Illuminate\Database\Schema\MySqlBuilder $instance */
                        return $instance->hasColumns($table, $columns);
        }
        
        /**
         * Get the data type for the given column name.
         *
         * @param string $table
         * @param string $column
         * @return string 
         * @static 
         */ 
        public static function getColumnType($table, $column)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
                        /** @var \Illuminate\Database\Schema\MySqlBuilder $instance */
                        return $instance->getColumnType($table, $column);
        }
        
        /**
         * Modify a table on the schema.
         *
         * @param string $table
         * @param \Closure $callback
         * @return void 
         * @static 
         */ 
        public static function table($table, $callback)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
                        /** @var \Illuminate\Database\Schema\MySqlBuilder $instance */
                        $instance->table($table, $callback);
        }
        
        /**
         * Create a new table on the schema.
         *
         * @param string $table
         * @param \Closure $callback
         * @return void 
         * @static 
         */ 
        public static function create($table, $callback)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
                        /** @var \Illuminate\Database\Schema\MySqlBuilder $instance */
                        $instance->create($table, $callback);
        }
        
        /**
         * Drop a table from the schema.
         *
         * @param string $table
         * @return void 
         * @static 
         */ 
        public static function drop($table)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
                        /** @var \Illuminate\Database\Schema\MySqlBuilder $instance */
                        $instance->drop($table);
        }
        
        /**
         * Drop a table from the schema if it exists.
         *
         * @param string $table
         * @return void 
         * @static 
         */ 
        public static function dropIfExists($table)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
                        /** @var \Illuminate\Database\Schema\MySqlBuilder $instance */
                        $instance->dropIfExists($table);
        }
        
        /**
         * Rename a table on the schema.
         *
         * @param string $from
         * @param string $to
         * @return void 
         * @static 
         */ 
        public static function rename($from, $to)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
                        /** @var \Illuminate\Database\Schema\MySqlBuilder $instance */
                        $instance->rename($from, $to);
        }
        
        /**
         * Enable foreign key constraints.
         *
         * @return bool 
         * @static 
         */ 
        public static function enableForeignKeyConstraints()
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
                        /** @var \Illuminate\Database\Schema\MySqlBuilder $instance */
                        return $instance->enableForeignKeyConstraints();
        }
        
        /**
         * Disable foreign key constraints.
         *
         * @return bool 
         * @static 
         */ 
        public static function disableForeignKeyConstraints()
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
                        /** @var \Illuminate\Database\Schema\MySqlBuilder $instance */
                        return $instance->disableForeignKeyConstraints();
        }
        
        /**
         * Get the database connection instance.
         *
         * @return \Illuminate\Database\Connection 
         * @static 
         */ 
        public static function getConnection()
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
                        /** @var \Illuminate\Database\Schema\MySqlBuilder $instance */
                        return $instance->getConnection();
        }
        
        /**
         * Set the database connection instance.
         *
         * @param \Illuminate\Database\Connection $connection
         * @return \Illuminate\Database\Schema\MySqlBuilder 
         * @static 
         */ 
        public static function setConnection($connection)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
                        /** @var \Illuminate\Database\Schema\MySqlBuilder $instance */
                        return $instance->setConnection($connection);
        }
        
        /**
         * Set the Schema Blueprint resolver callback.
         *
         * @param \Closure $resolver
         * @return void 
         * @static 
         */ 
        public static function blueprintResolver($resolver)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
                        /** @var \Illuminate\Database\Schema\MySqlBuilder $instance */
                        $instance->blueprintResolver($resolver);
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Session\SessionManager
     * @see \Illuminate\Session\Store
     */ 
    class Session {
        
        /**
         * Get the session configuration.
         *
         * @return array 
         * @static 
         */ 
        public static function getSessionConfig()
        {
                        /** @var \Illuminate\Session\SessionManager $instance */
                        return $instance->getSessionConfig();
        }
        
        /**
         * Get the default session driver name.
         *
         * @return string 
         * @static 
         */ 
        public static function getDefaultDriver()
        {
                        /** @var \Illuminate\Session\SessionManager $instance */
                        return $instance->getDefaultDriver();
        }
        
        /**
         * Set the default session driver name.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function setDefaultDriver($name)
        {
                        /** @var \Illuminate\Session\SessionManager $instance */
                        $instance->setDefaultDriver($name);
        }
        
        /**
         * Get a driver instance.
         *
         * @param string $driver
         * @return mixed 
         * @throws \InvalidArgumentException
         * @static 
         */ 
        public static function driver($driver = null)
        {
            //Method inherited from \Illuminate\Support\Manager            
                        /** @var \Illuminate\Session\SessionManager $instance */
                        return $instance->driver($driver);
        }
        
        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return \Illuminate\Session\SessionManager 
         * @static 
         */ 
        public static function extend($driver, $callback)
        {
            //Method inherited from \Illuminate\Support\Manager            
                        /** @var \Illuminate\Session\SessionManager $instance */
                        return $instance->extend($driver, $callback);
        }
        
        /**
         * Get all of the created "drivers".
         *
         * @return array 
         * @static 
         */ 
        public static function getDrivers()
        {
            //Method inherited from \Illuminate\Support\Manager            
                        /** @var \Illuminate\Session\SessionManager $instance */
                        return $instance->getDrivers();
        }
        
        /**
         * Start the session, reading the data from a handler.
         *
         * @return bool 
         * @static 
         */ 
        public static function start()
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->start();
        }
        
        /**
         * Save the session data to storage.
         *
         * @return bool 
         * @static 
         */ 
        public static function save()
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->save();
        }
        
        /**
         * Age the flash data for the session.
         *
         * @return void 
         * @static 
         */ 
        public static function ageFlashData()
        {
                        /** @var \Illuminate\Session\Store $instance */
                        $instance->ageFlashData();
        }
        
        /**
         * Get all of the session data.
         *
         * @return array 
         * @static 
         */ 
        public static function all()
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->all();
        }
        
        /**
         * Checks if a key exists.
         *
         * @param string|array $key
         * @return bool 
         * @static 
         */ 
        public static function exists($key)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->exists($key);
        }
        
        /**
         * Checks if a key is present and not null.
         *
         * @param string|array $key
         * @return bool 
         * @static 
         */ 
        public static function has($key)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->has($key);
        }
        
        /**
         * Get an item from the session.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed 
         * @static 
         */ 
        public static function get($key, $default = null)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->get($key, $default);
        }
        
        /**
         * Get the value of a given key and then forget it.
         *
         * @param string $key
         * @param string $default
         * @return mixed 
         * @static 
         */ 
        public static function pull($key, $default = null)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->pull($key, $default);
        }
        
        /**
         * Determine if the session contains old input.
         *
         * @param string $key
         * @return bool 
         * @static 
         */ 
        public static function hasOldInput($key = null)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->hasOldInput($key);
        }
        
        /**
         * Get the requested item from the flashed input array.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed 
         * @static 
         */ 
        public static function getOldInput($key = null, $default = null)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->getOldInput($key, $default);
        }
        
        /**
         * Replace the given session attributes entirely.
         *
         * @param array $attributes
         * @return void 
         * @static 
         */ 
        public static function replace($attributes)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        $instance->replace($attributes);
        }
        
        /**
         * Put a key / value pair or array of key / value pairs in the session.
         *
         * @param string|array $key
         * @param mixed $value
         * @return void 
         * @static 
         */ 
        public static function put($key, $value = null)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        $instance->put($key, $value);
        }
        
        /**
         * Get an item from the session, or store the default value.
         *
         * @param string $key
         * @param \Closure $callback
         * @return mixed 
         * @static 
         */ 
        public static function remember($key, $callback)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->remember($key, $callback);
        }
        
        /**
         * Push a value onto a session array.
         *
         * @param string $key
         * @param mixed $value
         * @return void 
         * @static 
         */ 
        public static function push($key, $value)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        $instance->push($key, $value);
        }
        
        /**
         * Increment the value of an item in the session.
         *
         * @param string $key
         * @param int $amount
         * @return mixed 
         * @static 
         */ 
        public static function increment($key, $amount = 1)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->increment($key, $amount);
        }
        
        /**
         * Decrement the value of an item in the session.
         *
         * @param string $key
         * @param int $amount
         * @return int 
         * @static 
         */ 
        public static function decrement($key, $amount = 1)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->decrement($key, $amount);
        }
        
        /**
         * Flash a key / value pair to the session.
         *
         * @param string $key
         * @param mixed $value
         * @return void 
         * @static 
         */ 
        public static function flash($key, $value = true)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        $instance->flash($key, $value);
        }
        
        /**
         * Flash a key / value pair to the session for immediate use.
         *
         * @param string $key
         * @param mixed $value
         * @return void 
         * @static 
         */ 
        public static function now($key, $value)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        $instance->now($key, $value);
        }
        
        /**
         * Reflash all of the session flash data.
         *
         * @return void 
         * @static 
         */ 
        public static function reflash()
        {
                        /** @var \Illuminate\Session\Store $instance */
                        $instance->reflash();
        }
        
        /**
         * Reflash a subset of the current flash data.
         *
         * @param array|mixed $keys
         * @return void 
         * @static 
         */ 
        public static function keep($keys = null)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        $instance->keep($keys);
        }
        
        /**
         * Flash an input array to the session.
         *
         * @param array $value
         * @return void 
         * @static 
         */ 
        public static function flashInput($value)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        $instance->flashInput($value);
        }
        
        /**
         * Remove an item from the session, returning its value.
         *
         * @param string $key
         * @return mixed 
         * @static 
         */ 
        public static function remove($key)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->remove($key);
        }
        
        /**
         * Remove one or many items from the session.
         *
         * @param string|array $keys
         * @return void 
         * @static 
         */ 
        public static function forget($keys)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        $instance->forget($keys);
        }
        
        /**
         * Remove all of the items from the session.
         *
         * @return void 
         * @static 
         */ 
        public static function flush()
        {
                        /** @var \Illuminate\Session\Store $instance */
                        $instance->flush();
        }
        
        /**
         * Flush the session data and regenerate the ID.
         *
         * @return bool 
         * @static 
         */ 
        public static function invalidate()
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->invalidate();
        }
        
        /**
         * Generate a new session identifier.
         *
         * @param bool $destroy
         * @return bool 
         * @static 
         */ 
        public static function regenerate($destroy = false)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->regenerate($destroy);
        }
        
        /**
         * Generate a new session ID for the session.
         *
         * @param bool $destroy
         * @return bool 
         * @static 
         */ 
        public static function migrate($destroy = false)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->migrate($destroy);
        }
        
        /**
         * Determine if the session has been started.
         *
         * @return bool 
         * @static 
         */ 
        public static function isStarted()
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->isStarted();
        }
        
        /**
         * Get the name of the session.
         *
         * @return string 
         * @static 
         */ 
        public static function getName()
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->getName();
        }
        
        /**
         * Set the name of the session.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function setName($name)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        $instance->setName($name);
        }
        
        /**
         * Get the current session ID.
         *
         * @return string 
         * @static 
         */ 
        public static function getId()
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->getId();
        }
        
        /**
         * Set the session ID.
         *
         * @param string $id
         * @return void 
         * @static 
         */ 
        public static function setId($id)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        $instance->setId($id);
        }
        
        /**
         * Determine if this is a valid session ID.
         *
         * @param string $id
         * @return bool 
         * @static 
         */ 
        public static function isValidId($id)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->isValidId($id);
        }
        
        /**
         * Set the existence of the session on the handler if applicable.
         *
         * @param bool $value
         * @return void 
         * @static 
         */ 
        public static function setExists($value)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        $instance->setExists($value);
        }
        
        /**
         * Get the CSRF token value.
         *
         * @return string 
         * @static 
         */ 
        public static function token()
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->token();
        }
        
        /**
         * Regenerate the CSRF token value.
         *
         * @return void 
         * @static 
         */ 
        public static function regenerateToken()
        {
                        /** @var \Illuminate\Session\Store $instance */
                        $instance->regenerateToken();
        }
        
        /**
         * Get the previous URL from the session.
         *
         * @return string|null 
         * @static 
         */ 
        public static function previousUrl()
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->previousUrl();
        }
        
        /**
         * Set the "previous" URL in the session.
         *
         * @param string $url
         * @return void 
         * @static 
         */ 
        public static function setPreviousUrl($url)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        $instance->setPreviousUrl($url);
        }
        
        /**
         * Get the underlying session handler implementation.
         *
         * @return \SessionHandlerInterface 
         * @static 
         */ 
        public static function getHandler()
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->getHandler();
        }
        
        /**
         * Determine if the session handler needs a request.
         *
         * @return bool 
         * @static 
         */ 
        public static function handlerNeedsRequest()
        {
                        /** @var \Illuminate\Session\Store $instance */
                        return $instance->handlerNeedsRequest();
        }
        
        /**
         * Set the request on the handler instance.
         *
         * @param \Illuminate\Http\Request $request
         * @return void 
         * @static 
         */ 
        public static function setRequestOnHandler($request)
        {
                        /** @var \Illuminate\Session\Store $instance */
                        $instance->setRequestOnHandler($request);
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Filesystem\FilesystemManager
     */ 
    class Storage {
        
        /**
         * Get a filesystem instance.
         *
         * @param string $name
         * @return \Illuminate\Filesystem\FilesystemAdapter 
         * @static 
         */ 
        public static function drive($name = null)
        {
                        /** @var \Illuminate\Filesystem\FilesystemManager $instance */
                        return $instance->drive($name);
        }
        
        /**
         * Get a filesystem instance.
         *
         * @param string $name
         * @return \Illuminate\Filesystem\FilesystemAdapter 
         * @static 
         */ 
        public static function disk($name = null)
        {
                        /** @var \Illuminate\Filesystem\FilesystemManager $instance */
                        return $instance->disk($name);
        }
        
        /**
         * Get a default cloud filesystem instance.
         *
         * @return \Illuminate\Filesystem\FilesystemAdapter 
         * @static 
         */ 
        public static function cloud()
        {
                        /** @var \Illuminate\Filesystem\FilesystemManager $instance */
                        return $instance->cloud();
        }
        
        /**
         * Create an instance of the local driver.
         *
         * @param array $config
         * @return \Illuminate\Filesystem\FilesystemAdapter 
         * @static 
         */ 
        public static function createLocalDriver($config)
        {
                        /** @var \Illuminate\Filesystem\FilesystemManager $instance */
                        return $instance->createLocalDriver($config);
        }
        
        /**
         * Create an instance of the ftp driver.
         *
         * @param array $config
         * @return \Illuminate\Filesystem\FilesystemAdapter 
         * @static 
         */ 
        public static function createFtpDriver($config)
        {
                        /** @var \Illuminate\Filesystem\FilesystemManager $instance */
                        return $instance->createFtpDriver($config);
        }
        
        /**
         * Create an instance of the sftp driver.
         *
         * @param array $config
         * @return \Illuminate\Filesystem\FilesystemAdapter 
         * @static 
         */ 
        public static function createSftpDriver($config)
        {
                        /** @var \Illuminate\Filesystem\FilesystemManager $instance */
                        return $instance->createSftpDriver($config);
        }
        
        /**
         * Create an instance of the Amazon S3 driver.
         *
         * @param array $config
         * @return \Illuminate\Contracts\Filesystem\Cloud 
         * @static 
         */ 
        public static function createS3Driver($config)
        {
                        /** @var \Illuminate\Filesystem\FilesystemManager $instance */
                        return $instance->createS3Driver($config);
        }
        
        /**
         * Create an instance of the Rackspace driver.
         *
         * @param array $config
         * @return \Illuminate\Contracts\Filesystem\Cloud 
         * @static 
         */ 
        public static function createRackspaceDriver($config)
        {
                        /** @var \Illuminate\Filesystem\FilesystemManager $instance */
                        return $instance->createRackspaceDriver($config);
        }
        
        /**
         * Set the given disk instance.
         *
         * @param string $name
         * @param mixed $disk
         * @return \Illuminate\Filesystem\FilesystemManager 
         * @static 
         */ 
        public static function set($name, $disk)
        {
                        /** @var \Illuminate\Filesystem\FilesystemManager $instance */
                        return $instance->set($name, $disk);
        }
        
        /**
         * Get the default driver name.
         *
         * @return string 
         * @static 
         */ 
        public static function getDefaultDriver()
        {
                        /** @var \Illuminate\Filesystem\FilesystemManager $instance */
                        return $instance->getDefaultDriver();
        }
        
        /**
         * Get the default cloud driver name.
         *
         * @return string 
         * @static 
         */ 
        public static function getDefaultCloudDriver()
        {
                        /** @var \Illuminate\Filesystem\FilesystemManager $instance */
                        return $instance->getDefaultCloudDriver();
        }
        
        /**
         * Unset the given disk instances.
         *
         * @param array|string $disk
         * @return \Illuminate\Filesystem\FilesystemManager 
         * @static 
         */ 
        public static function forgetDisk($disk)
        {
                        /** @var \Illuminate\Filesystem\FilesystemManager $instance */
                        return $instance->forgetDisk($disk);
        }
        
        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return \Illuminate\Filesystem\FilesystemManager 
         * @static 
         */ 
        public static function extend($driver, $callback)
        {
                        /** @var \Illuminate\Filesystem\FilesystemManager $instance */
                        return $instance->extend($driver, $callback);
        }
        
        /**
         * Assert that the given file exists.
         *
         * @param string $path
         * @return void 
         * @static 
         */ 
        public static function assertExists($path)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        $instance->assertExists($path);
        }
        
        /**
         * Assert that the given file does not exist.
         *
         * @param string $path
         * @return void 
         * @static 
         */ 
        public static function assertMissing($path)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        $instance->assertMissing($path);
        }
        
        /**
         * Determine if a file exists.
         *
         * @param string $path
         * @return bool 
         * @static 
         */ 
        public static function exists($path)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->exists($path);
        }
        
        /**
         * Get the full path for the file at the given "short" path.
         *
         * @param string $path
         * @return string 
         * @static 
         */ 
        public static function path($path)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->path($path);
        }
        
        /**
         * Get the contents of a file.
         *
         * @param string $path
         * @return string 
         * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
         * @static 
         */ 
        public static function get($path)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->get($path);
        }
        
        /**
         * Create a streamed response for a given file.
         *
         * @param string $path
         * @param string|null $name
         * @param array|null $headers
         * @param string|null $disposition
         * @return \Symfony\Component\HttpFoundation\StreamedResponse 
         * @static 
         */ 
        public static function response($path, $name = null, $headers = [], $disposition = 'inline')
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->response($path, $name, $headers, $disposition);
        }
        
        /**
         * Create a streamed download response for a given file.
         *
         * @param string $path
         * @param string|null $name
         * @param array|null $headers
         * @return \Symfony\Component\HttpFoundation\StreamedResponse 
         * @static 
         */ 
        public static function download($path, $name = null, $headers = [])
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->download($path, $name, $headers);
        }
        
        /**
         * Write the contents of a file.
         *
         * @param string $path
         * @param string|resource $contents
         * @param mixed $options
         * @return bool 
         * @static 
         */ 
        public static function put($path, $contents, $options = [])
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->put($path, $contents, $options);
        }
        
        /**
         * Store the uploaded file on the disk.
         *
         * @param string $path
         * @param \Illuminate\Http\File|\Illuminate\Http\UploadedFile $file
         * @param array $options
         * @return string|false 
         * @static 
         */ 
        public static function putFile($path, $file, $options = [])
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->putFile($path, $file, $options);
        }
        
        /**
         * Store the uploaded file on the disk with a given name.
         *
         * @param string $path
         * @param \Illuminate\Http\File|\Illuminate\Http\UploadedFile $file
         * @param string $name
         * @param array $options
         * @return string|false 
         * @static 
         */ 
        public static function putFileAs($path, $file, $name, $options = [])
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->putFileAs($path, $file, $name, $options);
        }
        
        /**
         * Get the visibility for the given path.
         *
         * @param string $path
         * @return string 
         * @static 
         */ 
        public static function getVisibility($path)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->getVisibility($path);
        }
        
        /**
         * Set the visibility for the given path.
         *
         * @param string $path
         * @param string $visibility
         * @return void 
         * @static 
         */ 
        public static function setVisibility($path, $visibility)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        $instance->setVisibility($path, $visibility);
        }
        
        /**
         * Prepend to a file.
         *
         * @param string $path
         * @param string $data
         * @param string $separator
         * @return int 
         * @static 
         */ 
        public static function prepend($path, $data, $separator = '')
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->prepend($path, $data, $separator);
        }
        
        /**
         * Append to a file.
         *
         * @param string $path
         * @param string $data
         * @param string $separator
         * @return int 
         * @static 
         */ 
        public static function append($path, $data, $separator = '')
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->append($path, $data, $separator);
        }
        
        /**
         * Delete the file at a given path.
         *
         * @param string|array $paths
         * @return bool 
         * @static 
         */ 
        public static function delete($paths)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->delete($paths);
        }
        
        /**
         * Copy a file to a new location.
         *
         * @param string $from
         * @param string $to
         * @return bool 
         * @static 
         */ 
        public static function copy($from, $to)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->copy($from, $to);
        }
        
        /**
         * Move a file to a new location.
         *
         * @param string $from
         * @param string $to
         * @return bool 
         * @static 
         */ 
        public static function move($from, $to)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->move($from, $to);
        }
        
        /**
         * Get the file size of a given file.
         *
         * @param string $path
         * @return int 
         * @static 
         */ 
        public static function size($path)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->size($path);
        }
        
        /**
         * Get the mime-type of a given file.
         *
         * @param string $path
         * @return string|false 
         * @static 
         */ 
        public static function mimeType($path)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->mimeType($path);
        }
        
        /**
         * Get the file's last modification time.
         *
         * @param string $path
         * @return int 
         * @static 
         */ 
        public static function lastModified($path)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->lastModified($path);
        }
        
        /**
         * Get the URL for the file at the given path.
         *
         * @param string $path
         * @return string 
         * @static 
         */ 
        public static function url($path)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->url($path);
        }
        
        /**
         * Get a temporary URL for the file at the given path.
         *
         * @param string $path
         * @param \DateTimeInterface $expiration
         * @param array $options
         * @return string 
         * @static 
         */ 
        public static function temporaryUrl($path, $expiration, $options = [])
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->temporaryUrl($path, $expiration, $options);
        }
        
        /**
         * Get a temporary URL for the file at the given path.
         *
         * @param \League\Flysystem\AwsS3v3\AwsS3Adapter $adapter
         * @param string $path
         * @param \DateTimeInterface $expiration
         * @param array $options
         * @return string 
         * @static 
         */ 
        public static function getAwsTemporaryUrl($adapter, $path, $expiration, $options)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->getAwsTemporaryUrl($adapter, $path, $expiration, $options);
        }
        
        /**
         * Get a temporary URL for the file at the given path.
         *
         * @param \League\Flysystem\Rackspace\RackspaceAdapter $adapter
         * @param string $path
         * @param \DateTimeInterface $expiration
         * @param array $options
         * @return string 
         * @static 
         */ 
        public static function getRackspaceTemporaryUrl($adapter, $path, $expiration, $options)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->getRackspaceTemporaryUrl($adapter, $path, $expiration, $options);
        }
        
        /**
         * Get an array of all files in a directory.
         *
         * @param string|null $directory
         * @param bool $recursive
         * @return array 
         * @static 
         */ 
        public static function files($directory = null, $recursive = false)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->files($directory, $recursive);
        }
        
        /**
         * Get all of the files from the given directory (recursive).
         *
         * @param string|null $directory
         * @return array 
         * @static 
         */ 
        public static function allFiles($directory = null)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->allFiles($directory);
        }
        
        /**
         * Get all of the directories within a given directory.
         *
         * @param string|null $directory
         * @param bool $recursive
         * @return array 
         * @static 
         */ 
        public static function directories($directory = null, $recursive = false)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->directories($directory, $recursive);
        }
        
        /**
         * Get all (recursive) of the directories within a given directory.
         *
         * @param string|null $directory
         * @return array 
         * @static 
         */ 
        public static function allDirectories($directory = null)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->allDirectories($directory);
        }
        
        /**
         * Create a directory.
         *
         * @param string $path
         * @return bool 
         * @static 
         */ 
        public static function makeDirectory($path)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->makeDirectory($path);
        }
        
        /**
         * Recursively delete a directory.
         *
         * @param string $directory
         * @return bool 
         * @static 
         */ 
        public static function deleteDirectory($directory)
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->deleteDirectory($directory);
        }
        
        /**
         * Flush the Flysystem cache.
         *
         * @return void 
         * @static 
         */ 
        public static function flushCache()
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        $instance->flushCache();
        }
        
        /**
         * Get the Flysystem driver.
         *
         * @return \League\Flysystem\FilesystemInterface 
         * @static 
         */ 
        public static function getDriver()
        {
                        /** @var \Illuminate\Filesystem\FilesystemAdapter $instance */
                        return $instance->getDriver();
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Routing\UrlGenerator
     */ 
    class URL {
        
        /**
         * Get the full URL for the current request.
         *
         * @return string 
         * @static 
         */ 
        public static function full()
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->full();
        }
        
        /**
         * Get the current URL for the request.
         *
         * @return string 
         * @static 
         */ 
        public static function current()
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->current();
        }
        
        /**
         * Get the URL for the previous request.
         *
         * @param mixed $fallback
         * @return string 
         * @static 
         */ 
        public static function previous($fallback = false)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->previous($fallback);
        }
        
        /**
         * Generate an absolute URL to the given path.
         *
         * @param string $path
         * @param mixed $extra
         * @param bool|null $secure
         * @return string 
         * @static 
         */ 
        public static function to($path, $extra = [], $secure = null)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->to($path, $extra, $secure);
        }
        
        /**
         * Generate a secure, absolute URL to the given path.
         *
         * @param string $path
         * @param array $parameters
         * @return string 
         * @static 
         */ 
        public static function secure($path, $parameters = [])
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->secure($path, $parameters);
        }
        
        /**
         * Generate the URL to an application asset.
         *
         * @param string $path
         * @param bool|null $secure
         * @return string 
         * @static 
         */ 
        public static function asset($path, $secure = null)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->asset($path, $secure);
        }
        
        /**
         * Generate the URL to a secure asset.
         *
         * @param string $path
         * @return string 
         * @static 
         */ 
        public static function secureAsset($path)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->secureAsset($path);
        }
        
        /**
         * Generate the URL to an asset from a custom root domain such as CDN, etc.
         *
         * @param string $root
         * @param string $path
         * @param bool|null $secure
         * @return string 
         * @static 
         */ 
        public static function assetFrom($root, $path, $secure = null)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->assetFrom($root, $path, $secure);
        }
        
        /**
         * Get the default scheme for a raw URL.
         *
         * @param bool|null $secure
         * @return string 
         * @static 
         */ 
        public static function formatScheme($secure)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->formatScheme($secure);
        }
        
        /**
         * Create a signed route URL for a named route.
         *
         * @param string $name
         * @param array $parameters
         * @param \DateTimeInterface|int $expiration
         * @return string 
         * @static 
         */ 
        public static function signedRoute($name, $parameters = [], $expiration = null)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->signedRoute($name, $parameters, $expiration);
        }
        
        /**
         * Create a temporary signed route URL for a named route.
         *
         * @param string $name
         * @param \DateTimeInterface|int $expiration
         * @param array $parameters
         * @return string 
         * @static 
         */ 
        public static function temporarySignedRoute($name, $expiration, $parameters = [])
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->temporarySignedRoute($name, $expiration, $parameters);
        }
        
        /**
         * Determine if the given request has a valid signature.
         *
         * @param \Illuminate\Http\Request $request
         * @return bool 
         * @static 
         */ 
        public static function hasValidSignature($request)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->hasValidSignature($request);
        }
        
        /**
         * Get the URL to a named route.
         *
         * @param string $name
         * @param mixed $parameters
         * @param bool $absolute
         * @return string 
         * @throws \InvalidArgumentException
         * @static 
         */ 
        public static function route($name, $parameters = [], $absolute = true)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->route($name, $parameters, $absolute);
        }
        
        /**
         * Get the URL to a controller action.
         *
         * @param string $action
         * @param mixed $parameters
         * @param bool $absolute
         * @return string 
         * @throws \InvalidArgumentException
         * @static 
         */ 
        public static function action($action, $parameters = [], $absolute = true)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->action($action, $parameters, $absolute);
        }
        
        /**
         * Format the array of URL parameters.
         *
         * @param mixed|array $parameters
         * @return array 
         * @static 
         */ 
        public static function formatParameters($parameters)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->formatParameters($parameters);
        }
        
        /**
         * Get the base URL for the request.
         *
         * @param string $scheme
         * @param string $root
         * @return string 
         * @static 
         */ 
        public static function formatRoot($scheme, $root = null)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->formatRoot($scheme, $root);
        }
        
        /**
         * Format the given URL segments into a single URL.
         *
         * @param string $root
         * @param string $path
         * @return string 
         * @static 
         */ 
        public static function format($root, $path)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->format($root, $path);
        }
        
        /**
         * Determine if the given path is a valid URL.
         *
         * @param string $path
         * @return bool 
         * @static 
         */ 
        public static function isValidUrl($path)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->isValidUrl($path);
        }
        
        /**
         * Set the default named parameters used by the URL generator.
         *
         * @param array $defaults
         * @return void 
         * @static 
         */ 
        public static function defaults($defaults)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        $instance->defaults($defaults);
        }
        
        /**
         * Get the default named parameters used by the URL generator.
         *
         * @return array 
         * @static 
         */ 
        public static function getDefaultParameters()
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->getDefaultParameters();
        }
        
        /**
         * Force the scheme for URLs.
         *
         * @param string $schema
         * @return void 
         * @static 
         */ 
        public static function forceScheme($schema)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        $instance->forceScheme($schema);
        }
        
        /**
         * Set the forced root URL.
         *
         * @param string $root
         * @return void 
         * @static 
         */ 
        public static function forceRootUrl($root)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        $instance->forceRootUrl($root);
        }
        
        /**
         * Set a callback to be used to format the host of generated URLs.
         *
         * @param \Closure $callback
         * @return \Illuminate\Routing\UrlGenerator 
         * @static 
         */ 
        public static function formatHostUsing($callback)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->formatHostUsing($callback);
        }
        
        /**
         * Set a callback to be used to format the path of generated URLs.
         *
         * @param \Closure $callback
         * @return \Illuminate\Routing\UrlGenerator 
         * @static 
         */ 
        public static function formatPathUsing($callback)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->formatPathUsing($callback);
        }
        
        /**
         * Get the path formatter being used by the URL generator.
         *
         * @return \Closure 
         * @static 
         */ 
        public static function pathFormatter()
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->pathFormatter();
        }
        
        /**
         * Get the request instance.
         *
         * @return \Illuminate\Http\Request 
         * @static 
         */ 
        public static function getRequest()
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->getRequest();
        }
        
        /**
         * Set the current request instance.
         *
         * @param \Illuminate\Http\Request $request
         * @return void 
         * @static 
         */ 
        public static function setRequest($request)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        $instance->setRequest($request);
        }
        
        /**
         * Set the route collection.
         *
         * @param \Illuminate\Routing\RouteCollection $routes
         * @return \Illuminate\Routing\UrlGenerator 
         * @static 
         */ 
        public static function setRoutes($routes)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->setRoutes($routes);
        }
        
        /**
         * Set the session resolver for the generator.
         *
         * @param callable $sessionResolver
         * @return \Illuminate\Routing\UrlGenerator 
         * @static 
         */ 
        public static function setSessionResolver($sessionResolver)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->setSessionResolver($sessionResolver);
        }
        
        /**
         * Set the encryption key resolver.
         *
         * @param callable $keyResolver
         * @return \Illuminate\Routing\UrlGenerator 
         * @static 
         */ 
        public static function setKeyResolver($keyResolver)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->setKeyResolver($keyResolver);
        }
        
        /**
         * Set the root controller namespace.
         *
         * @param string $rootNamespace
         * @return \Illuminate\Routing\UrlGenerator 
         * @static 
         */ 
        public static function setRootControllerNamespace($rootNamespace)
        {
                        /** @var \Illuminate\Routing\UrlGenerator $instance */
                        return $instance->setRootControllerNamespace($rootNamespace);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param object|callable $macro
         * @return void 
         * @static 
         */ 
        public static function macro($name, $macro)
        {
                        \Illuminate\Routing\UrlGenerator::macro($name, $macro);
        }
        
        /**
         * Mix another object into the class.
         *
         * @param object $mixin
         * @return void 
         * @throws \ReflectionException
         * @static 
         */ 
        public static function mixin($mixin)
        {
                        \Illuminate\Routing\UrlGenerator::mixin($mixin);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasMacro($name)
        {
                        return \Illuminate\Routing\UrlGenerator::hasMacro($name);
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\Validation\Factory
     */ 
    class Validator {
        
        /**
         * Create a new Validator instance.
         *
         * @param array $data
         * @param array $rules
         * @param array $messages
         * @param array $customAttributes
         * @return \Illuminate\Validation\Validator 
         * @static 
         */ 
        public static function make($data, $rules, $messages = [], $customAttributes = [])
        {
                        /** @var \Illuminate\Validation\Factory $instance */
                        return $instance->make($data, $rules, $messages, $customAttributes);
        }
        
        /**
         * Validate the given data against the provided rules.
         *
         * @param array $data
         * @param array $rules
         * @param array $messages
         * @param array $customAttributes
         * @return array 
         * @throws \Illuminate\Validation\ValidationException
         * @static 
         */ 
        public static function validate($data, $rules, $messages = [], $customAttributes = [])
        {
                        /** @var \Illuminate\Validation\Factory $instance */
                        return $instance->validate($data, $rules, $messages, $customAttributes);
        }
        
        /**
         * Register a custom validator extension.
         *
         * @param string $rule
         * @param \Closure|string $extension
         * @param string $message
         * @return void 
         * @static 
         */ 
        public static function extend($rule, $extension, $message = null)
        {
                        /** @var \Illuminate\Validation\Factory $instance */
                        $instance->extend($rule, $extension, $message);
        }
        
        /**
         * Register a custom implicit validator extension.
         *
         * @param string $rule
         * @param \Closure|string $extension
         * @param string $message
         * @return void 
         * @static 
         */ 
        public static function extendImplicit($rule, $extension, $message = null)
        {
                        /** @var \Illuminate\Validation\Factory $instance */
                        $instance->extendImplicit($rule, $extension, $message);
        }
        
        /**
         * Register a custom dependent validator extension.
         *
         * @param string $rule
         * @param \Closure|string $extension
         * @param string $message
         * @return void 
         * @static 
         */ 
        public static function extendDependent($rule, $extension, $message = null)
        {
                        /** @var \Illuminate\Validation\Factory $instance */
                        $instance->extendDependent($rule, $extension, $message);
        }
        
        /**
         * Register a custom validator message replacer.
         *
         * @param string $rule
         * @param \Closure|string $replacer
         * @return void 
         * @static 
         */ 
        public static function replacer($rule, $replacer)
        {
                        /** @var \Illuminate\Validation\Factory $instance */
                        $instance->replacer($rule, $replacer);
        }
        
        /**
         * Set the Validator instance resolver.
         *
         * @param \Closure $resolver
         * @return void 
         * @static 
         */ 
        public static function resolver($resolver)
        {
                        /** @var \Illuminate\Validation\Factory $instance */
                        $instance->resolver($resolver);
        }
        
        /**
         * Get the Translator implementation.
         *
         * @return \Illuminate\Contracts\Translation\Translator 
         * @static 
         */ 
        public static function getTranslator()
        {
                        /** @var \Illuminate\Validation\Factory $instance */
                        return $instance->getTranslator();
        }
        
        /**
         * Get the Presence Verifier implementation.
         *
         * @return \Illuminate\Validation\PresenceVerifierInterface 
         * @static 
         */ 
        public static function getPresenceVerifier()
        {
                        /** @var \Illuminate\Validation\Factory $instance */
                        return $instance->getPresenceVerifier();
        }
        
        /**
         * Set the Presence Verifier implementation.
         *
         * @param \Illuminate\Validation\PresenceVerifierInterface $presenceVerifier
         * @return void 
         * @static 
         */ 
        public static function setPresenceVerifier($presenceVerifier)
        {
                        /** @var \Illuminate\Validation\Factory $instance */
                        $instance->setPresenceVerifier($presenceVerifier);
        }
         
    }

    /**
     * 
     *
     * @see \Illuminate\View\Factory
     */ 
    class View {
        
        /**
         * Get the evaluated view contents for the given view.
         *
         * @param string $path
         * @param array $data
         * @param array $mergeData
         * @return \Illuminate\Contracts\View\View 
         * @static 
         */ 
        public static function file($path, $data = [], $mergeData = [])
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->file($path, $data, $mergeData);
        }
        
        /**
         * Get the evaluated view contents for the given view.
         *
         * @param string $view
         * @param array $data
         * @param array $mergeData
         * @return \Illuminate\Contracts\View\View 
         * @static 
         */ 
        public static function make($view, $data = [], $mergeData = [])
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->make($view, $data, $mergeData);
        }
        
        /**
         * Get the first view that actually exists from the given list.
         *
         * @param array $views
         * @param array $data
         * @param array $mergeData
         * @return \Illuminate\Contracts\View\View 
         * @throws \InvalidArgumentException
         * @static 
         */ 
        public static function first($views, $data = [], $mergeData = [])
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->first($views, $data, $mergeData);
        }
        
        /**
         * Get the rendered content of the view based on a given condition.
         *
         * @param bool $condition
         * @param string $view
         * @param array $data
         * @param array $mergeData
         * @return string 
         * @static 
         */ 
        public static function renderWhen($condition, $view, $data = [], $mergeData = [])
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->renderWhen($condition, $view, $data, $mergeData);
        }
        
        /**
         * Get the rendered contents of a partial from a loop.
         *
         * @param string $view
         * @param array $data
         * @param string $iterator
         * @param string $empty
         * @return string 
         * @static 
         */ 
        public static function renderEach($view, $data, $iterator, $empty = 'raw|')
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->renderEach($view, $data, $iterator, $empty);
        }
        
        /**
         * Determine if a given view exists.
         *
         * @param string $view
         * @return bool 
         * @static 
         */ 
        public static function exists($view)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->exists($view);
        }
        
        /**
         * Get the appropriate view engine for the given path.
         *
         * @param string $path
         * @return \Illuminate\Contracts\View\Engine 
         * @throws \InvalidArgumentException
         * @static 
         */ 
        public static function getEngineFromPath($path)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->getEngineFromPath($path);
        }
        
        /**
         * Add a piece of shared data to the environment.
         *
         * @param array|string $key
         * @param mixed $value
         * @return mixed 
         * @static 
         */ 
        public static function share($key, $value = null)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->share($key, $value);
        }
        
        /**
         * Increment the rendering counter.
         *
         * @return void 
         * @static 
         */ 
        public static function incrementRender()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->incrementRender();
        }
        
        /**
         * Decrement the rendering counter.
         *
         * @return void 
         * @static 
         */ 
        public static function decrementRender()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->decrementRender();
        }
        
        /**
         * Check if there are no active render operations.
         *
         * @return bool 
         * @static 
         */ 
        public static function doneRendering()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->doneRendering();
        }
        
        /**
         * Add a location to the array of view locations.
         *
         * @param string $location
         * @return void 
         * @static 
         */ 
        public static function addLocation($location)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->addLocation($location);
        }
        
        /**
         * Add a new namespace to the loader.
         *
         * @param string $namespace
         * @param string|array $hints
         * @return \Illuminate\View\Factory 
         * @static 
         */ 
        public static function addNamespace($namespace, $hints)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->addNamespace($namespace, $hints);
        }
        
        /**
         * Prepend a new namespace to the loader.
         *
         * @param string $namespace
         * @param string|array $hints
         * @return \Illuminate\View\Factory 
         * @static 
         */ 
        public static function prependNamespace($namespace, $hints)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->prependNamespace($namespace, $hints);
        }
        
        /**
         * Replace the namespace hints for the given namespace.
         *
         * @param string $namespace
         * @param string|array $hints
         * @return \Illuminate\View\Factory 
         * @static 
         */ 
        public static function replaceNamespace($namespace, $hints)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->replaceNamespace($namespace, $hints);
        }
        
        /**
         * Register a valid view extension and its engine.
         *
         * @param string $extension
         * @param string $engine
         * @param \Closure $resolver
         * @return void 
         * @static 
         */ 
        public static function addExtension($extension, $engine, $resolver = null)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->addExtension($extension, $engine, $resolver);
        }
        
        /**
         * Flush all of the factory state like sections and stacks.
         *
         * @return void 
         * @static 
         */ 
        public static function flushState()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->flushState();
        }
        
        /**
         * Flush all of the section contents if done rendering.
         *
         * @return void 
         * @static 
         */ 
        public static function flushStateIfDoneRendering()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->flushStateIfDoneRendering();
        }
        
        /**
         * Get the extension to engine bindings.
         *
         * @return array 
         * @static 
         */ 
        public static function getExtensions()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->getExtensions();
        }
        
        /**
         * Get the engine resolver instance.
         *
         * @return \Illuminate\View\Engines\EngineResolver 
         * @static 
         */ 
        public static function getEngineResolver()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->getEngineResolver();
        }
        
        /**
         * Get the view finder instance.
         *
         * @return \Illuminate\View\ViewFinderInterface 
         * @static 
         */ 
        public static function getFinder()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->getFinder();
        }
        
        /**
         * Set the view finder instance.
         *
         * @param \Illuminate\View\ViewFinderInterface $finder
         * @return void 
         * @static 
         */ 
        public static function setFinder($finder)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->setFinder($finder);
        }
        
        /**
         * Flush the cache of views located by the finder.
         *
         * @return void 
         * @static 
         */ 
        public static function flushFinderCache()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->flushFinderCache();
        }
        
        /**
         * Get the event dispatcher instance.
         *
         * @return \Illuminate\Contracts\Events\Dispatcher 
         * @static 
         */ 
        public static function getDispatcher()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->getDispatcher();
        }
        
        /**
         * Set the event dispatcher instance.
         *
         * @param \Illuminate\Contracts\Events\Dispatcher $events
         * @return void 
         * @static 
         */ 
        public static function setDispatcher($events)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->setDispatcher($events);
        }
        
        /**
         * Get the IoC container instance.
         *
         * @return \Illuminate\Contracts\Container\Container 
         * @static 
         */ 
        public static function getContainer()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->getContainer();
        }
        
        /**
         * Set the IoC container instance.
         *
         * @param \Illuminate\Contracts\Container\Container $container
         * @return void 
         * @static 
         */ 
        public static function setContainer($container)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->setContainer($container);
        }
        
        /**
         * Get an item from the shared data.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed 
         * @static 
         */ 
        public static function shared($key, $default = null)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->shared($key, $default);
        }
        
        /**
         * Get all of the shared data for the environment.
         *
         * @return array 
         * @static 
         */ 
        public static function getShared()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->getShared();
        }
        
        /**
         * Start a component rendering process.
         *
         * @param string $name
         * @param array $data
         * @return void 
         * @static 
         */ 
        public static function startComponent($name, $data = [])
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->startComponent($name, $data);
        }
        
        /**
         * Render the current component.
         *
         * @return string 
         * @static 
         */ 
        public static function renderComponent()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->renderComponent();
        }
        
        /**
         * Start the slot rendering process.
         *
         * @param string $name
         * @param string|null $content
         * @return void 
         * @static 
         */ 
        public static function slot($name, $content = null)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->slot($name, $content);
        }
        
        /**
         * Save the slot content for rendering.
         *
         * @return void 
         * @static 
         */ 
        public static function endSlot()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->endSlot();
        }
        
        /**
         * Register a view creator event.
         *
         * @param array|string $views
         * @param \Closure|string $callback
         * @return array 
         * @static 
         */ 
        public static function creator($views, $callback)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->creator($views, $callback);
        }
        
        /**
         * Register multiple view composers via an array.
         *
         * @param array $composers
         * @return array 
         * @static 
         */ 
        public static function composers($composers)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->composers($composers);
        }
        
        /**
         * Register a view composer event.
         *
         * @param array|string $views
         * @param \Closure|string $callback
         * @return array 
         * @static 
         */ 
        public static function composer($views, $callback)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->composer($views, $callback);
        }
        
        /**
         * Call the composer for a given view.
         *
         * @param \Illuminate\Contracts\View\View $view
         * @return void 
         * @static 
         */ 
        public static function callComposer($view)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->callComposer($view);
        }
        
        /**
         * Call the creator for a given view.
         *
         * @param \Illuminate\Contracts\View\View $view
         * @return void 
         * @static 
         */ 
        public static function callCreator($view)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->callCreator($view);
        }
        
        /**
         * Start injecting content into a section.
         *
         * @param string $section
         * @param string|null $content
         * @return void 
         * @static 
         */ 
        public static function startSection($section, $content = null)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->startSection($section, $content);
        }
        
        /**
         * Inject inline content into a section.
         *
         * @param string $section
         * @param string $content
         * @return void 
         * @static 
         */ 
        public static function inject($section, $content)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->inject($section, $content);
        }
        
        /**
         * Stop injecting content into a section and return its contents.
         *
         * @return string 
         * @static 
         */ 
        public static function yieldSection()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->yieldSection();
        }
        
        /**
         * Stop injecting content into a section.
         *
         * @param bool $overwrite
         * @return string 
         * @throws \InvalidArgumentException
         * @static 
         */ 
        public static function stopSection($overwrite = false)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->stopSection($overwrite);
        }
        
        /**
         * Stop injecting content into a section and append it.
         *
         * @return string 
         * @throws \InvalidArgumentException
         * @static 
         */ 
        public static function appendSection()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->appendSection();
        }
        
        /**
         * Get the string contents of a section.
         *
         * @param string $section
         * @param string $default
         * @return string 
         * @static 
         */ 
        public static function yieldContent($section, $default = '')
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->yieldContent($section, $default);
        }
        
        /**
         * Get the parent placeholder for the current request.
         *
         * @param string $section
         * @return string 
         * @static 
         */ 
        public static function parentPlaceholder($section = '')
        {
                        return \Illuminate\View\Factory::parentPlaceholder($section);
        }
        
        /**
         * Check if section exists.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasSection($name)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->hasSection($name);
        }
        
        /**
         * Get the contents of a section.
         *
         * @param string $name
         * @param string $default
         * @return mixed 
         * @static 
         */ 
        public static function getSection($name, $default = null)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->getSection($name, $default);
        }
        
        /**
         * Get the entire array of sections.
         *
         * @return array 
         * @static 
         */ 
        public static function getSections()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->getSections();
        }
        
        /**
         * Flush all of the sections.
         *
         * @return void 
         * @static 
         */ 
        public static function flushSections()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->flushSections();
        }
        
        /**
         * Add new loop to the stack.
         *
         * @param \Countable|array $data
         * @return void 
         * @static 
         */ 
        public static function addLoop($data)
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->addLoop($data);
        }
        
        /**
         * Increment the top loop's indices.
         *
         * @return void 
         * @static 
         */ 
        public static function incrementLoopIndices()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->incrementLoopIndices();
        }
        
        /**
         * Pop a loop from the top of the loop stack.
         *
         * @return void 
         * @static 
         */ 
        public static function popLoop()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->popLoop();
        }
        
        /**
         * Get an instance of the last loop in the stack.
         *
         * @return \stdClass|null 
         * @static 
         */ 
        public static function getLastLoop()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->getLastLoop();
        }
        
        /**
         * Get the entire loop stack.
         *
         * @return array 
         * @static 
         */ 
        public static function getLoopStack()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->getLoopStack();
        }
        
        /**
         * Start injecting content into a push section.
         *
         * @param string $section
         * @param string $content
         * @return void 
         * @static 
         */ 
        public static function startPush($section, $content = '')
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->startPush($section, $content);
        }
        
        /**
         * Stop injecting content into a push section.
         *
         * @return string 
         * @throws \InvalidArgumentException
         * @static 
         */ 
        public static function stopPush()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->stopPush();
        }
        
        /**
         * Start prepending content into a push section.
         *
         * @param string $section
         * @param string $content
         * @return void 
         * @static 
         */ 
        public static function startPrepend($section, $content = '')
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->startPrepend($section, $content);
        }
        
        /**
         * Stop prepending content into a push section.
         *
         * @return string 
         * @throws \InvalidArgumentException
         * @static 
         */ 
        public static function stopPrepend()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->stopPrepend();
        }
        
        /**
         * Get the string contents of a push section.
         *
         * @param string $section
         * @param string $default
         * @return string 
         * @static 
         */ 
        public static function yieldPushContent($section, $default = '')
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->yieldPushContent($section, $default);
        }
        
        /**
         * Flush all of the stacks.
         *
         * @return void 
         * @static 
         */ 
        public static function flushStacks()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->flushStacks();
        }
        
        /**
         * Start a translation block.
         *
         * @param array $replacements
         * @return void 
         * @static 
         */ 
        public static function startTranslation($replacements = [])
        {
                        /** @var \Illuminate\View\Factory $instance */
                        $instance->startTranslation($replacements);
        }
        
        /**
         * Render the current translation.
         *
         * @return string 
         * @static 
         */ 
        public static function renderTranslation()
        {
                        /** @var \Illuminate\View\Factory $instance */
                        return $instance->renderTranslation();
        }
         
    }
 
}

namespace Collective\Html { 

    /**
     * 
     *
     * @see \Collective\Html\FormBuilder
     */ 
    class FormFacade {
        
        /**
         * Open up a new HTML form.
         *
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function open($options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->open($options);
        }
        
        /**
         * Create a new model based form builder.
         *
         * @param mixed $model
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function model($model, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->model($model, $options);
        }
        
        /**
         * Set the model instance on the form builder.
         *
         * @param mixed $model
         * @return void 
         * @static 
         */ 
        public static function setModel($model)
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        $instance->setModel($model);
        }
        
        /**
         * Get the current model instance on the form builder.
         *
         * @return mixed $model
         * @static 
         */ 
        public static function getModel()
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->getModel();
        }
        
        /**
         * Close the current form.
         *
         * @return string 
         * @static 
         */ 
        public static function close()
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->close();
        }
        
        /**
         * Generate a hidden field with the current CSRF token.
         *
         * @return string 
         * @static 
         */ 
        public static function token()
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->token();
        }
        
        /**
         * Create a form label element.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @param bool $escape_html
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function label($name, $value = null, $options = [], $escape_html = true)
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->label($name, $value, $options, $escape_html);
        }
        
        /**
         * Create a form input field.
         *
         * @param string $type
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function input($type, $name, $value = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->input($type, $name, $value, $options);
        }
        
        /**
         * Create a text input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function text($name, $value = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->text($name, $value, $options);
        }
        
        /**
         * Create a password input field.
         *
         * @param string $name
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function password($name, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->password($name, $options);
        }
        
        /**
         * Create a range input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function range($name, $value = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->range($name, $value, $options);
        }
        
        /**
         * Create a hidden input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function hidden($name, $value = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->hidden($name, $value, $options);
        }
        
        /**
         * Create a search input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function search($name, $value = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->search($name, $value, $options);
        }
        
        /**
         * Create an e-mail input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function email($name, $value = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->email($name, $value, $options);
        }
        
        /**
         * Create a tel input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function tel($name, $value = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->tel($name, $value, $options);
        }
        
        /**
         * Create a number input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function number($name, $value = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->number($name, $value, $options);
        }
        
        /**
         * Create a date input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function date($name, $value = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->date($name, $value, $options);
        }
        
        /**
         * Create a datetime input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function datetime($name, $value = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->datetime($name, $value, $options);
        }
        
        /**
         * Create a datetime-local input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function datetimeLocal($name, $value = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->datetimeLocal($name, $value, $options);
        }
        
        /**
         * Create a time input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function time($name, $value = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->time($name, $value, $options);
        }
        
        /**
         * Create a url input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function url($name, $value = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->url($name, $value, $options);
        }
        
        /**
         * Create a week input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function week($name, $value = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->week($name, $value, $options);
        }
        
        /**
         * Create a file input field.
         *
         * @param string $name
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function file($name, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->file($name, $options);
        }
        
        /**
         * Create a textarea input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function textarea($name, $value = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->textarea($name, $value, $options);
        }
        
        /**
         * Create a select box field.
         *
         * @param string $name
         * @param array $list
         * @param string|bool $selected
         * @param array $selectAttributes
         * @param array $optionsAttributes
         * @param array $optgroupsAttributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function select($name, $list = [], $selected = null, $selectAttributes = [], $optionsAttributes = [], $optgroupsAttributes = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->select($name, $list, $selected, $selectAttributes, $optionsAttributes, $optgroupsAttributes);
        }
        
        /**
         * Create a select range field.
         *
         * @param string $name
         * @param string $begin
         * @param string $end
         * @param string $selected
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function selectRange($name, $begin, $end, $selected = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->selectRange($name, $begin, $end, $selected, $options);
        }
        
        /**
         * Create a select year field.
         *
         * @param string $name
         * @param string $begin
         * @param string $end
         * @param string $selected
         * @param array $options
         * @return mixed 
         * @static 
         */ 
        public static function selectYear()
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->selectYear();
        }
        
        /**
         * Create a select month field.
         *
         * @param string $name
         * @param string $selected
         * @param array $options
         * @param string $format
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function selectMonth($name, $selected = null, $options = [], $format = '%B')
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->selectMonth($name, $selected, $options, $format);
        }
        
        /**
         * Get the select option for the given value.
         *
         * @param string $display
         * @param string $value
         * @param string $selected
         * @param array $attributes
         * @param array $optgroupAttributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function getSelectOption($display, $value, $selected, $attributes = [], $optgroupAttributes = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->getSelectOption($display, $value, $selected, $attributes, $optgroupAttributes);
        }
        
        /**
         * Create a checkbox input field.
         *
         * @param string $name
         * @param mixed $value
         * @param bool $checked
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function checkbox($name, $value = 1, $checked = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->checkbox($name, $value, $checked, $options);
        }
        
        /**
         * Create a radio button input field.
         *
         * @param string $name
         * @param mixed $value
         * @param bool $checked
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function radio($name, $value = null, $checked = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->radio($name, $value, $checked, $options);
        }
        
        /**
         * Create a HTML reset input element.
         *
         * @param string $value
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function reset($value, $attributes = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->reset($value, $attributes);
        }
        
        /**
         * Create a HTML image input element.
         *
         * @param string $url
         * @param string $name
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function image($url, $name = null, $attributes = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->image($url, $name, $attributes);
        }
        
        /**
         * Create a month input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function month($name, $value = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->month($name, $value, $options);
        }
        
        /**
         * Create a color input field.
         *
         * @param string $name
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function color($name, $value = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->color($name, $value, $options);
        }
        
        /**
         * Create a submit button element.
         *
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function submit($value = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->submit($value, $options);
        }
        
        /**
         * Create a button element.
         *
         * @param string $value
         * @param array $options
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function button($value = null, $options = [])
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->button($value, $options);
        }
        
        /**
         * Get the ID attribute for a field name.
         *
         * @param string $name
         * @param array $attributes
         * @return string 
         * @static 
         */ 
        public static function getIdAttribute($name, $attributes)
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->getIdAttribute($name, $attributes);
        }
        
        /**
         * Get the value that should be assigned to the field.
         *
         * @param string $name
         * @param string $value
         * @return mixed 
         * @static 
         */ 
        public static function getValueAttribute($name, $value = null)
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->getValueAttribute($name, $value);
        }
        
        /**
         * Take Request in fill process
         *
         * @param bool $consider
         * @static 
         */ 
        public static function considerRequest($consider = true)
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->considerRequest($consider);
        }
        
        /**
         * Get a value from the session's old input.
         *
         * @param string $name
         * @return mixed 
         * @static 
         */ 
        public static function old($name)
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->old($name);
        }
        
        /**
         * Determine if the old input is empty.
         *
         * @return bool 
         * @static 
         */ 
        public static function oldInputIsEmpty()
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->oldInputIsEmpty();
        }
        
        /**
         * Get the session store implementation.
         *
         * @return \Illuminate\Contracts\Session\Session $session
         * @static 
         */ 
        public static function getSessionStore()
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->getSessionStore();
        }
        
        /**
         * Set the session store implementation.
         *
         * @param \Illuminate\Contracts\Session\Session $session
         * @return \Collective\Html\FormBuilder 
         * @static 
         */ 
        public static function setSessionStore($session)
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->setSessionStore($session);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param object|callable $macro
         * @return void 
         * @static 
         */ 
        public static function macro($name, $macro)
        {
                        \Collective\Html\FormBuilder::macro($name, $macro);
        }
        
        /**
         * Mix another object into the class.
         *
         * @param object $mixin
         * @return void 
         * @throws \ReflectionException
         * @static 
         */ 
        public static function mixin($mixin)
        {
                        \Collective\Html\FormBuilder::mixin($mixin);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasMacro($name)
        {
                        return \Collective\Html\FormBuilder::hasMacro($name);
        }
        
        /**
         * Dynamically handle calls to the class.
         *
         * @param string $method
         * @param array $parameters
         * @return mixed 
         * @throws \BadMethodCallException
         * @static 
         */ 
        public static function macroCall($method, $parameters)
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->macroCall($method, $parameters);
        }
        
        /**
         * Register a custom component.
         *
         * @param $name
         * @param $view
         * @param array $signature
         * @return void 
         * @static 
         */ 
        public static function component($name, $view, $signature)
        {
                        \Collective\Html\FormBuilder::component($name, $view, $signature);
        }
        
        /**
         * Check if a component is registered.
         *
         * @param $name
         * @return bool 
         * @static 
         */ 
        public static function hasComponent($name)
        {
                        return \Collective\Html\FormBuilder::hasComponent($name);
        }
        
        /**
         * Dynamically handle calls to the class.
         *
         * @param string $method
         * @param array $parameters
         * @return \Illuminate\Contracts\View\View|mixed 
         * @throws \BadMethodCallException
         * @static 
         */ 
        public static function componentCall($method, $parameters)
        {
                        /** @var \Collective\Html\FormBuilder $instance */
                        return $instance->componentCall($method, $parameters);
        }
         
    }

    /**
     * 
     *
     * @see \Collective\Html\HtmlBuilder
     */ 
    class HtmlFacade {
        
        /**
         * Convert an HTML string to entities.
         *
         * @param string $value
         * @return string 
         * @static 
         */ 
        public static function entities($value)
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->entities($value);
        }
        
        /**
         * Convert entities to HTML characters.
         *
         * @param string $value
         * @return string 
         * @static 
         */ 
        public static function decode($value)
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->decode($value);
        }
        
        /**
         * Generate a link to a JavaScript file.
         *
         * @param string $url
         * @param array $attributes
         * @param bool $secure
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function script($url, $attributes = [], $secure = null)
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->script($url, $attributes, $secure);
        }
        
        /**
         * Generate a link to a CSS file.
         *
         * @param string $url
         * @param array $attributes
         * @param bool $secure
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function style($url, $attributes = [], $secure = null)
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->style($url, $attributes, $secure);
        }
        
        /**
         * Generate an HTML image element.
         *
         * @param string $url
         * @param string $alt
         * @param array $attributes
         * @param bool $secure
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function image($url, $alt = null, $attributes = [], $secure = null)
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->image($url, $alt, $attributes, $secure);
        }
        
        /**
         * Generate a link to a Favicon file.
         *
         * @param string $url
         * @param array $attributes
         * @param bool $secure
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function favicon($url, $attributes = [], $secure = null)
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->favicon($url, $attributes, $secure);
        }
        
        /**
         * Generate a HTML link.
         *
         * @param string $url
         * @param string $title
         * @param array $attributes
         * @param bool $secure
         * @param bool $escape
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function link($url, $title = null, $attributes = [], $secure = null, $escape = true)
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->link($url, $title, $attributes, $secure, $escape);
        }
        
        /**
         * Generate a HTTPS HTML link.
         *
         * @param string $url
         * @param string $title
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function secureLink($url, $title = null, $attributes = [])
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->secureLink($url, $title, $attributes);
        }
        
        /**
         * Generate a HTML link to an asset.
         *
         * @param string $url
         * @param string $title
         * @param array $attributes
         * @param bool $secure
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function linkAsset($url, $title = null, $attributes = [], $secure = null)
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->linkAsset($url, $title, $attributes, $secure);
        }
        
        /**
         * Generate a HTTPS HTML link to an asset.
         *
         * @param string $url
         * @param string $title
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function linkSecureAsset($url, $title = null, $attributes = [])
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->linkSecureAsset($url, $title, $attributes);
        }
        
        /**
         * Generate a HTML link to a named route.
         *
         * @param string $name
         * @param string $title
         * @param array $parameters
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function linkRoute($name, $title = null, $parameters = [], $attributes = [])
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->linkRoute($name, $title, $parameters, $attributes);
        }
        
        /**
         * Generate a HTML link to a controller action.
         *
         * @param string $action
         * @param string $title
         * @param array $parameters
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function linkAction($action, $title = null, $parameters = [], $attributes = [])
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->linkAction($action, $title, $parameters, $attributes);
        }
        
        /**
         * Generate a HTML link to an email address.
         *
         * @param string $email
         * @param string $title
         * @param array $attributes
         * @param bool $escape
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function mailto($email, $title = null, $attributes = [], $escape = true)
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->mailto($email, $title, $attributes, $escape);
        }
        
        /**
         * Obfuscate an e-mail address to prevent spam-bots from sniffing it.
         *
         * @param string $email
         * @return string 
         * @static 
         */ 
        public static function email($email)
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->email($email);
        }
        
        /**
         * Generates non-breaking space entities based on number supplied.
         *
         * @param int $num
         * @return string 
         * @static 
         */ 
        public static function nbsp($num = 1)
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->nbsp($num);
        }
        
        /**
         * Generate an ordered list of items.
         *
         * @param array $list
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString|string 
         * @static 
         */ 
        public static function ol($list, $attributes = [])
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->ol($list, $attributes);
        }
        
        /**
         * Generate an un-ordered list of items.
         *
         * @param array $list
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString|string 
         * @static 
         */ 
        public static function ul($list, $attributes = [])
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->ul($list, $attributes);
        }
        
        /**
         * Generate a description list of items.
         *
         * @param array $list
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function dl($list, $attributes = [])
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->dl($list, $attributes);
        }
        
        /**
         * Build an HTML attribute string from an array.
         *
         * @param array $attributes
         * @return string 
         * @static 
         */ 
        public static function attributes($attributes)
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->attributes($attributes);
        }
        
        /**
         * Obfuscate a string to prevent spam-bots from sniffing it.
         *
         * @param string $value
         * @return string 
         * @static 
         */ 
        public static function obfuscate($value)
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->obfuscate($value);
        }
        
        /**
         * Generate a meta tag.
         *
         * @param string $name
         * @param string $content
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function meta($name, $content, $attributes = [])
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->meta($name, $content, $attributes);
        }
        
        /**
         * Generate an html tag.
         *
         * @param string $tag
         * @param mixed $content
         * @param array $attributes
         * @return \Illuminate\Support\HtmlString 
         * @static 
         */ 
        public static function tag($tag, $content, $attributes = [])
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->tag($tag, $content, $attributes);
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param object|callable $macro
         * @return void 
         * @static 
         */ 
        public static function macro($name, $macro)
        {
                        \Collective\Html\HtmlBuilder::macro($name, $macro);
        }
        
        /**
         * Mix another object into the class.
         *
         * @param object $mixin
         * @return void 
         * @throws \ReflectionException
         * @static 
         */ 
        public static function mixin($mixin)
        {
                        \Collective\Html\HtmlBuilder::mixin($mixin);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasMacro($name)
        {
                        return \Collective\Html\HtmlBuilder::hasMacro($name);
        }
        
        /**
         * Dynamically handle calls to the class.
         *
         * @param string $method
         * @param array $parameters
         * @return mixed 
         * @throws \BadMethodCallException
         * @static 
         */ 
        public static function macroCall($method, $parameters)
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->macroCall($method, $parameters);
        }
        
        /**
         * Register a custom component.
         *
         * @param $name
         * @param $view
         * @param array $signature
         * @return void 
         * @static 
         */ 
        public static function component($name, $view, $signature)
        {
                        \Collective\Html\HtmlBuilder::component($name, $view, $signature);
        }
        
        /**
         * Check if a component is registered.
         *
         * @param $name
         * @return bool 
         * @static 
         */ 
        public static function hasComponent($name)
        {
                        return \Collective\Html\HtmlBuilder::hasComponent($name);
        }
        
        /**
         * Dynamically handle calls to the class.
         *
         * @param string $method
         * @param array $parameters
         * @return \Illuminate\Contracts\View\View|mixed 
         * @throws \BadMethodCallException
         * @static 
         */ 
        public static function componentCall($method, $parameters)
        {
                        /** @var \Collective\Html\HtmlBuilder $instance */
                        return $instance->componentCall($method, $parameters);
        }
         
    }
 
}

namespace Mcamara\LaravelLocalization\Facades { 

    /**
     * 
     *
     */ 
    class LaravelLocalization {
        
        /**
         * Set and return current locale.
         *
         * @param string $locale Locale to set the App to (optional)
         * @return string Returns locale (if route has any) or null (if route does not have a locale)
         * @static 
         */ 
        public static function setLocale($locale = null)
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->setLocale($locale);
        }
        
        /**
         * Set and return supported locales.
         *
         * @param array $locales Locales that the App supports
         * @static 
         */ 
        public static function setSupportedLocales($locales)
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->setSupportedLocales($locales);
        }
        
        /**
         * Returns an URL adapted to $locale or current locale.
         *
         * @param string $url URL to adapt. If not passed, the current url would be taken.
         * @param string|bool $locale Locale to adapt, false to remove locale
         * @throws UnsupportedLocaleException
         * @return string URL translated
         * @static 
         */ 
        public static function localizeURL($url = null, $locale = null)
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->localizeURL($url, $locale);
        }
        
        /**
         * Returns an URL adapted to $locale.
         *
         * @param string|bool $locale Locale to adapt, false to remove locale
         * @param string|false $url URL to adapt in the current language. If not passed, the current url would be taken.
         * @param array $attributes Attributes to add to the route, if empty, the system would try to extract them from the url.
         * @param bool $forceDefaultLocation Force to show default location even hideDefaultLocaleInURL set as TRUE
         * @throws SupportedLocalesNotDefined
         * @throws UnsupportedLocaleException
         * @return string|false URL translated, False if url does not exist
         * @static 
         */ 
        public static function getLocalizedURL($locale = null, $url = null, $attributes = [], $forceDefaultLocation = false)
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->getLocalizedURL($locale, $url, $attributes, $forceDefaultLocation);
        }
        
        /**
         * Returns an URL adapted to the route name and the locale given.
         *
         * @param string|bool $locale Locale to adapt
         * @param string $transKeyName Translation key name of the url to adapt
         * @param array $attributes Attributes for the route (only needed if transKeyName needs them)
         * @param bool $forceDefaultLocation Force to show default location even hideDefaultLocaleInURL set as TRUE
         * @throws SupportedLocalesNotDefined
         * @throws UnsupportedLocaleException
         * @return string|false URL translated
         * @static 
         */ 
        public static function getURLFromRouteNameTranslated($locale, $transKeyName, $attributes = [], $forceDefaultLocation = false)
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->getURLFromRouteNameTranslated($locale, $transKeyName, $attributes, $forceDefaultLocation);
        }
        
        /**
         * It returns an URL without locale (if it has it)
         * Convenience function wrapping getLocalizedURL(false).
         *
         * @param string|false $url URL to clean, if false, current url would be taken
         * @return string URL with no locale in path
         * @static 
         */ 
        public static function getNonLocalizedURL($url = null)
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->getNonLocalizedURL($url);
        }
        
        /**
         * Returns default locale.
         *
         * @return string 
         * @static 
         */ 
        public static function getDefaultLocale()
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->getDefaultLocale();
        }
        
        /**
         * Return an array of all supported Locales.
         *
         * @throws SupportedLocalesNotDefined
         * @return array 
         * @static 
         */ 
        public static function getSupportedLocales()
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->getSupportedLocales();
        }
        
        /**
         * Return an array of all supported Locales but in the order the user
         * has specified in the config file. Useful for the language selector.
         *
         * @return array 
         * @static 
         */ 
        public static function getLocalesOrder()
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->getLocalesOrder();
        }
        
        /**
         * Returns current locale name.
         *
         * @return string current locale name
         * @static 
         */ 
        public static function getCurrentLocaleName()
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->getCurrentLocaleName();
        }
        
        /**
         * Returns current locale native name.
         *
         * @return string current locale native name
         * @static 
         */ 
        public static function getCurrentLocaleNative()
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->getCurrentLocaleNative();
        }
        
        /**
         * Returns current locale direction.
         *
         * @return string current locale direction
         * @static 
         */ 
        public static function getCurrentLocaleDirection()
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->getCurrentLocaleDirection();
        }
        
        /**
         * Returns current locale script.
         *
         * @return string current locale script
         * @static 
         */ 
        public static function getCurrentLocaleScript()
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->getCurrentLocaleScript();
        }
        
        /**
         * Returns current language's native reading.
         *
         * @return string current language's native reading
         * @static 
         */ 
        public static function getCurrentLocaleNativeReading()
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->getCurrentLocaleNativeReading();
        }
        
        /**
         * Returns current language.
         *
         * @return string current language
         * @static 
         */ 
        public static function getCurrentLocale()
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->getCurrentLocale();
        }
        
        /**
         * Returns current regional.
         *
         * @return string current regional
         * @static 
         */ 
        public static function getCurrentLocaleRegional()
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->getCurrentLocaleRegional();
        }
        
        /**
         * Returns supported languages language key.
         *
         * @return array keys of supported languages
         * @static 
         */ 
        public static function getSupportedLanguagesKeys()
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->getSupportedLanguagesKeys();
        }
        
        /**
         * Check if Locale exists on the supported locales array.
         *
         * @param string|bool $locale string|bool Locale to be checked
         * @throws SupportedLocalesNotDefined
         * @return bool is the locale supported?
         * @static 
         */ 
        public static function checkLocaleInSupportedLocales($locale)
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->checkLocaleInSupportedLocales($locale);
        }
        
        /**
         * Set current route name.
         *
         * @param string $routeName current route name
         * @static 
         */ 
        public static function setRouteName($routeName)
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->setRouteName($routeName);
        }
        
        /**
         * Translate routes and save them to the translated routes array (used in the localize route filter).
         *
         * @param string $routeName Key of the translated string
         * @return string Translated string
         * @static 
         */ 
        public static function transRoute($routeName)
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->transRoute($routeName);
        }
        
        /**
         * Returns the translation key for a given path.
         *
         * @param string $path Path to get the key translated
         * @return string|false Key for translation, false if not exist
         * @static 
         */ 
        public static function getRouteNameFromAPath($path)
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->getRouteNameFromAPath($path);
        }
        
        /**
         * Returns the config repository for this instance.
         *
         * @return \Mcamara\LaravelLocalization\Repository Configuration repository
         * @static 
         */ 
        public static function getConfigRepository()
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->getConfigRepository();
        }
        
        /**
         * Returns the translation key for a given path.
         *
         * @return bool Returns value of hideDefaultLocaleInURL in config.
         * @static 
         */ 
        public static function hideDefaultLocaleInURL()
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->hideDefaultLocaleInURL();
        }
        
        /**
         * Create an url from the uri.
         *
         * @param string $uri Uri
         * @return string Url for the given uri
         * @static 
         */ 
        public static function createUrlFromUri($uri)
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->createUrlFromUri($uri);
        }
        
        /**
         * Sets the base url for the site.
         *
         * @param string $url Base url for the site
         * @static 
         */ 
        public static function setBaseUrl($url)
        {
                        /** @var \Mcamara\LaravelLocalization\LaravelLocalization $instance */
                        return $instance->setBaseUrl($url);
        }
         
    }
 
}

namespace App\Blueprint\Facades { 

    /**
     * Class UserServer
     *
     * @package App\Blueprint\Facades
     */ 
    class UserServer {
        
        /**
         * 
         *
         * @param array $options
         * @return \App\Blueprint\Services\User|\App\Blueprint\Services\Builder|\Illuminate\Database\Eloquent\Collection 
         * @static 
         */ 
        public static function topEarners($options = [])
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->topEarners($options);
        }
        
        /**
         * 
         *
         * @param \App\Blueprint\Services\Collection $args
         * @param null|\App\Blueprint\Services\User $userModel
         * @param bool $returnQuery
         * @param array $eagerLoads
         * @return \App\Blueprint\Services\Collection|\App\Blueprint\Services\Builder|mixed 
         * @static 
         */ 
        public static function getUsers($args, $userModel = null, $returnQuery = false, $eagerLoads = [])
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->getUsers($args, $userModel, $returnQuery, $eagerLoads);
        }
        
        /**
         * 
         *
         * @param \App\Blueprint\Services\Builder $query
         * @param string $groupBy
         * @param string $timestampColumn
         * @return \App\Blueprint\Services\Builder 
         * @static 
         */ 
        public static function groupBy($query, $groupBy = 'month', $timestampColumn = 'created_at')
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->groupBy($query, $groupBy, $timestampColumn);
        }
        
        /**
         * 
         *
         * @param \App\Blueprint\Services\User $user
         * @param array $args
         * @return \App\Blueprint\Services\User 
         * @static 
         */ 
        public static function withExtraInfo($user, $args = [])
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->withExtraInfo($user, $args);
        }
        
        /**
         * 
         *
         * @param \App\Blueprint\Services\Collection $args
         * @param null $repoModel
         * @return \App\Blueprint\Services\Collection|\App\Blueprint\Services\Builder|mixed 
         * @static 
         */ 
        public static function getUserRepo($args, $repoModel = null)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->getUserRepo($args, $repoModel);
        }
        
        /**
         * 
         *
         * @param $value
         * @return string 
         * @static 
         */ 
        public static function wrapColumn($value)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->wrapColumn($value);
        }
        
        /**
         * 
         *
         * @param array $options
         * @return \App\Blueprint\Services\User|\App\Blueprint\Services\Builder|\Illuminate\Database\Eloquent\Collection 
         * @static 
         */ 
        public static function topSponsors($options = [])
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->topSponsors($options);
        }
        
        /**
         * 
         *
         * @param \App\Blueprint\Services\User|integer $user
         * @param array|string $relations
         * @return \App\Blueprint\Services\User 
         * @static 
         */ 
        public static function getUser($user, $relations = null)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->getUser($user, $relations);
        }
        
        /**
         * Handles user data insertion tasks
         *
         * @param \App\Blueprint\Services\Collection $data
         * @param bool $addToRepo
         * @return \App\Blueprint\Services\User|boolean 
         * @static 
         */ 
        public static function addUser($data, $addToRepo = true)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->addUser($data, $addToRepo);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function increaseexpire($data)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->increaseexpire($data);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function addUserDirectly($data)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->addUserDirectly($data);
        }
        
        /**
         * Generate random username that is available to register
         *
         * @return bool|string 
         * @static 
         */ 
        public static function randomUsername()
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->randomUsername();
        }
        
        /**
         * Verify sponsor name
         *
         * @param $name
         * @return bool 
         * @static 
         */ 
        public static function verifySponsor($name)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->verifySponsor($name);
        }
        
        /**
         * Verify username name
         *
         * @param array $param user details
         * @return boolean 
         * @static 
         */ 
        public static function verifyUsername($param)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->verifyUsername($param);
        }
        
        /**
         * Verify email
         *
         * @param string $param user details
         * @return boolean 
         * @static 
         */ 
        public static function verifyEmail($param)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->verifyEmail($param);
        }
        
        /**
         * 
         *
         * @param \App\Blueprint\Services\PaymentServices $paymentServices
         * @param \App\Blueprint\Services\RegistrationValidation $request
         * @param \App\Blueprint\Services\RegistrationCallback $registrationCallback
         * @param \App\Blueprint\Services\OrderServices $orderServices
         * @param \App\Blueprint\Services\ModuleServices $moduleServices
         * @static 
         */ 
        public static function handleRegistrationRequest($paymentServices, $request, $registrationCallback, $orderServices, $moduleServices)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->handleRegistrationRequest($paymentServices, $request, $registrationCallback, $orderServices, $moduleServices);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function handleExpireRegistrationRequest($paymentServices, $request, $expirecallback, $orderServices, $moduleServices)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->handleExpireRegistrationRequest($paymentServices, $request, $expirecallback, $orderServices, $moduleServices);
        }
        
        /**
         * Unset session data after successful registration
         *
         * @param \App\Blueprint\Services\CartServices $cartServices
         * @param \App\Blueprint\Services\OrderServices $orderServices
         * @return bool 
         * @static 
         */ 
        public static function unsetRegistrationData($cartServices, $orderServices)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->unsetRegistrationData($cartServices, $orderServices);
        }
        
        /**
         * Get ProfileData
         *
         * @param $id
         * @return mixed 
         * @static 
         */ 
        public static function getProfileData($id)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->getProfileData($id);
        }
        
        /**
         * 
         *
         * @param $userID
         * @return \Illuminate\Database\Eloquent\Collection|\App\Blueprint\Services\Model|null|static|static[] 
         * @static 
         */ 
        public static function getSponsorId($userID)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->getSponsorId($userID);
        }
        
        /**
         * 
         *
         * @param $userID
         * @return mixed 
         * @static 
         */ 
        public static function getPlacementId($userID)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->getPlacementId($userID);
        }
        
        /**
         * 
         *
         * @param $userID
         * @return mixed 
         * @static 
         */ 
        public static function getUserType($userID)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->getUserType($userID);
        }
        
        /**
         * 
         *
         * @param $userID
         * @return mixed 
         * @static 
         */ 
        public static function getSponsorMembersCount($userID)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->getSponsorMembersCount($userID);
        }
        
        /**
         * 
         *
         * @param $id
         * @return \Illuminate\Database\Eloquent\Collection|\App\Blueprint\Services\Model|null|static|static[] 
         * @static 
         */ 
        public static function getUserProfile($id)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->getUserProfile($id);
        }
        
        /**
         * 
         *
         * @return string 
         * @static 
         */ 
        public static function generateCustomerId()
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->generateCustomerId();
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function pendingCallbackResponse($transaction)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->pendingCallbackResponse($transaction);
        }
        
        /**
         * Formats basic user table data prior to database insertion
         *
         * @param \App\Blueprint\Services\Collection $data request to be formatted.
         * @return array formatted basic data
         * @static 
         */ 
        public static function formatBasicData($data)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->formatBasicData($data);
        }
        
        /**
         * Basic user table data
         *
         * @return array basic user data
         * @static 
         */ 
        public static function basicData()
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->basicData();
        }
        
        /**
         * Formats repo user table data prior to database insertion
         *
         * @param \App\Blueprint\Services\Collection $data request to be formatted.
         * @param \App\Blueprint\Services\User $user
         * @return array formatted basic data
         * @static 
         */ 
        public static function formatRepoData($data, $user)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->formatRepoData($data, $user);
        }
        
        /**
         * fields only those are permitted to the insert query
         *
         * @return array permitted fields array
         * @static 
         */ 
        public static function allowedRepoFields()
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->allowedRepoFields();
        }
        
        /**
         * Formats repo user table data prior to database insertion
         *
         * @param \App\Blueprint\Services\Collection $data request to be formatted.
         * @return array formatted basic data
         * @static 
         */ 
        public static function formatMetaData($data)
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->formatMetaData($data);
        }
        
        /**
         * Get Allowed Fields
         * 
         * fields only those are permitted to the insert query
         *
         * @return array permitted fields array
         * @static 
         */ 
        public static function allowedMetaFields()
        {
                        /** @var \App\Blueprint\Services\UserServices $instance */
                        return $instance->allowedMetaFields();
        }
         
    }
 
}

namespace Intervention\Image\Facades { 

    /**
     * 
     *
     */ 
    class Image {
        
        /**
         * Overrides configuration settings
         *
         * @param array $config
         * @return self 
         * @static 
         */ 
        public static function configure($config = [])
        {
                        /** @var \Intervention\Image\ImageManager $instance */
                        return $instance->configure($config);
        }
        
        /**
         * Initiates an Image instance from different input types
         *
         * @param mixed $data
         * @return \Intervention\Image\Image 
         * @static 
         */ 
        public static function make($data)
        {
                        /** @var \Intervention\Image\ImageManager $instance */
                        return $instance->make($data);
        }
        
        /**
         * Creates an empty image canvas
         *
         * @param int $width
         * @param int $height
         * @param mixed $background
         * @return \Intervention\Image\Image 
         * @static 
         */ 
        public static function canvas($width, $height, $background = null)
        {
                        /** @var \Intervention\Image\ImageManager $instance */
                        return $instance->canvas($width, $height, $background);
        }
        
        /**
         * Create new cached image and run callback
         * (requires additional package intervention/imagecache)
         *
         * @param \Closure $callback
         * @param int $lifetime
         * @param boolean $returnObj
         * @return \Image 
         * @static 
         */ 
        public static function cache($callback, $lifetime = null, $returnObj = false)
        {
                        /** @var \Intervention\Image\ImageManager $instance */
                        return $instance->cache($callback, $lifetime, $returnObj);
        }
         
    }
 
}

namespace Chumper\Zipper\Facades { 

    /**
     * 
     *
     */ 
    class Zipper {
        
        /**
         * Create a new zip Archive if the file does not exists
         * opens a zip archive if the file exists
         *
         * @param $pathToFile string The file to open
         * @param \Chumper\Zipper\RepositoryInterface|string $type The type of the archive, defaults to zip, possible are zip, phar
         * @throws \RuntimeException
         * @throws \Exception
         * @throws \InvalidArgumentException
         * @return \Chumper\Zipper\Zipper Zipper instance
         * @static 
         */ 
        public static function make($pathToFile, $type = 'zip')
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->make($pathToFile, $type);
        }
        
        /**
         * Create a new zip archive or open an existing one
         *
         * @param $pathToFile
         * @throws \Exception
         * @return \Chumper\Zipper\Zipper 
         * @static 
         */ 
        public static function zip($pathToFile)
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->zip($pathToFile);
        }
        
        /**
         * Create a new phar file or open one
         *
         * @param $pathToFile
         * @throws \Exception
         * @return \Chumper\Zipper\Zipper 
         * @static 
         */ 
        public static function phar($pathToFile)
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->phar($pathToFile);
        }
        
        /**
         * Create a new rar file or open one
         *
         * @param $pathToFile
         * @throws \Exception
         * @return \Chumper\Zipper\Zipper 
         * @static 
         */ 
        public static function rar($pathToFile)
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->rar($pathToFile);
        }
        
        /**
         * Extracts the opened zip archive to the specified location <br/>
         * you can provide an array of files and folders and define if they should be a white list
         * or a black list to extract. By default this method compares file names using "string starts with" logic
         *
         * @param $path string The path to extract to
         * @param array $files An array of files
         * @param int $methodFlags The Method the files should be treated
         * @throws \Exception
         * @static 
         */ 
        public static function extractTo($path, $files = [], $methodFlags = 2)
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->extractTo($path, $files, $methodFlags);
        }
        
        /**
         * Extracts matching files/folders from the opened zip archive to the specified location.
         *
         * @param string $extractToPath The path to extract to
         * @param string $regex regular expression used to match files. See @link http://php.net/manual/en/reference.pcre.pattern.syntax.php
         * @throws \InvalidArgumentException
         * @throws \RuntimeException
         * @static 
         */ 
        public static function extractMatchingRegex($extractToPath, $regex)
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->extractMatchingRegex($extractToPath, $regex);
        }
        
        /**
         * Gets the content of a single file if available
         *
         * @param $filePath string The full path (including all folders) of the file in the zip
         * @throws \Exception
         * @return mixed returns the content or throws an exception
         * @static 
         */ 
        public static function getFileContent($filePath)
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->getFileContent($filePath);
        }
        
        /**
         * Add one or multiple files to the zip.
         *
         * @param $pathToAdd array|string An array or string of files and folders to add
         * @param null|mixed $fileName
         * @return \Chumper\Zipper\Zipper Zipper instance
         * @static 
         */ 
        public static function add($pathToAdd, $fileName = null)
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->add($pathToAdd, $fileName);
        }
        
        /**
         * Add an empty directory
         *
         * @param $dirName
         * @return \Zipper 
         * @static 
         */ 
        public static function addEmptyDir($dirName)
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->addEmptyDir($dirName);
        }
        
        /**
         * Add a file to the zip using its contents
         *
         * @param $filename string The name of the file to create
         * @param $content string The file contents
         * @return \Chumper\Zipper\Zipper Zipper instance
         * @static 
         */ 
        public static function addString($filename, $content)
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->addString($filename, $content);
        }
        
        /**
         * Gets the status of the zip.
         *
         * @return int The status of the internal zip file
         * @static 
         */ 
        public static function getStatus()
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->getStatus();
        }
        
        /**
         * Remove a file or array of files and folders from the zip archive
         *
         * @param $fileToRemove array|string The path/array to the files in the zip
         * @return \Chumper\Zipper\Zipper Zipper instance
         * @static 
         */ 
        public static function remove($fileToRemove)
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->remove($fileToRemove);
        }
        
        /**
         * Returns the path of the current zip file if there is one.
         *
         * @return string The path to the file
         * @static 
         */ 
        public static function getFilePath()
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->getFilePath();
        }
        
        /**
         * Sets the password to be used for decompressing
         *
         * @param $password
         * @return bool 
         * @static 
         */ 
        public static function usePassword($password)
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->usePassword($password);
        }
        
        /**
         * Closes the zip file and frees all handles
         *
         * @static 
         */ 
        public static function close()
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->close();
        }
        
        /**
         * Sets the internal folder to the given path.<br/>
         * Useful for extracting only a segment of a zip file.
         *
         * @param $path
         * @return \Chumper\Zipper\Zipper 
         * @static 
         */ 
        public static function folder($path)
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->folder($path);
        }
        
        /**
         * Resets the internal folder to the root of the zip file.
         *
         * @return \Chumper\Zipper\Zipper 
         * @static 
         */ 
        public static function home()
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->home();
        }
        
        /**
         * Deletes the archive file
         *
         * @static 
         */ 
        public static function delete()
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->delete();
        }
        
        /**
         * Get the type of the Archive
         *
         * @return string 
         * @static 
         */ 
        public static function getArchiveType()
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->getArchiveType();
        }
        
        /**
         * Get the current internal folder pointer
         *
         * @return string 
         * @static 
         */ 
        public static function getCurrentFolderPath()
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->getCurrentFolderPath();
        }
        
        /**
         * Checks if a file is present in the archive
         *
         * @param $fileInArchive
         * @return bool 
         * @static 
         */ 
        public static function contains($fileInArchive)
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->contains($fileInArchive);
        }
        
        /**
         * 
         *
         * @return \Chumper\Zipper\RepositoryInterface 
         * @static 
         */ 
        public static function getRepository()
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->getRepository();
        }
        
        /**
         * 
         *
         * @return \Chumper\Zipper\Filesystem 
         * @static 
         */ 
        public static function getFileHandler()
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->getFileHandler();
        }
        
        /**
         * Gets the path to the internal folder
         *
         * @return string 
         * @static 
         */ 
        public static function getInternalPath()
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->getInternalPath();
        }
        
        /**
         * List all files that are within the archive
         *
         * @param string|null $regexFilter regular expression to filter returned files/folders. See @link http://php.net/manual/en/reference.pcre.pattern.syntax.php
         * @throws \RuntimeException
         * @return array 
         * @static 
         */ 
        public static function listFiles($regexFilter = null)
        {
                        /** @var \Chumper\Zipper\Zipper $instance */
                        return $instance->listFiles($regexFilter);
        }
         
    }
 
}

namespace Inacho { 

    /**
     * 
     *
     */ 
    class CreditCard {
         
    }
 
}

namespace Torann\Currency\Facades { 

    /**
     * 
     *
     */ 
    class Currency {
        
        /**
         * Format given number.
         *
         * @param float $amount
         * @param string $from
         * @param string $to
         * @param bool $format
         * @return string|null 
         * @static 
         */ 
        public static function convert($amount, $from = null, $to = null, $format = true)
        {
                        /** @var \Torann\Currency\Currency $instance */
                        return $instance->convert($amount, $from, $to, $format);
        }
        
        /**
         * Format the value into the desired currency.
         *
         * @param float $value
         * @param string $code
         * @param bool $include_symbol
         * @return string 
         * @static 
         */ 
        public static function format($value, $code = null, $include_symbol = true)
        {
                        /** @var \Torann\Currency\Currency $instance */
                        return $instance->format($value, $code, $include_symbol);
        }
        
        /**
         * Set user's currency.
         *
         * @param string $code
         * @static 
         */ 
        public static function setUserCurrency($code)
        {
                        /** @var \Torann\Currency\Currency $instance */
                        return $instance->setUserCurrency($code);
        }
        
        /**
         * Return the user's currency code.
         *
         * @return string 
         * @static 
         */ 
        public static function getUserCurrency()
        {
                        /** @var \Torann\Currency\Currency $instance */
                        return $instance->getUserCurrency();
        }
        
        /**
         * Determine if the provided currency is valid.
         *
         * @param string $code
         * @return array|null 
         * @static 
         */ 
        public static function hasCurrency($code)
        {
                        /** @var \Torann\Currency\Currency $instance */
                        return $instance->hasCurrency($code);
        }
        
        /**
         * Determine if the provided currency is active.
         *
         * @param string $code
         * @return bool 
         * @static 
         */ 
        public static function isActive($code)
        {
                        /** @var \Torann\Currency\Currency $instance */
                        return $instance->isActive($code);
        }
        
        /**
         * Return the current currency if the
         * one supplied is not valid.
         *
         * @param string $code
         * @return array|null 
         * @static 
         */ 
        public static function getCurrency($code = null)
        {
                        /** @var \Torann\Currency\Currency $instance */
                        return $instance->getCurrency($code);
        }
        
        /**
         * Return all currencies.
         *
         * @return array 
         * @static 
         */ 
        public static function getCurrencies()
        {
                        /** @var \Torann\Currency\Currency $instance */
                        return $instance->getCurrencies();
        }
        
        /**
         * Return all active currencies.
         *
         * @return array 
         * @static 
         */ 
        public static function getActiveCurrencies()
        {
                        /** @var \Torann\Currency\Currency $instance */
                        return $instance->getActiveCurrencies();
        }
        
        /**
         * Get storage driver.
         *
         * @return \Torann\Currency\Contracts\DriverInterface 
         * @static 
         */ 
        public static function getDriver()
        {
                        /** @var \Torann\Currency\Currency $instance */
                        return $instance->getDriver();
        }
        
        /**
         * Get formatter driver.
         *
         * @return \Torann\Currency\Contracts\FormatterInterface 
         * @static 
         */ 
        public static function getFormatter()
        {
                        /** @var \Torann\Currency\Currency $instance */
                        return $instance->getFormatter();
        }
        
        /**
         * Clear cached currencies.
         *
         * @static 
         */ 
        public static function clearCache()
        {
                        /** @var \Torann\Currency\Currency $instance */
                        return $instance->clearCache();
        }
        
        /**
         * Get configuration value.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed 
         * @static 
         */ 
        public static function config($key = null, $default = null)
        {
                        /** @var \Torann\Currency\Currency $instance */
                        return $instance->config($key, $default);
        }
         
    }
 
}

namespace Torann\GeoIP\Facades { 

    /**
     * 
     *
     */ 
    class GeoIP {
        
        /**
         * Get the location from the provided IP.
         *
         * @param string $ip
         * @return \Torann\GeoIP\Location 
         * @static 
         */ 
        public static function getLocation($ip = null)
        {
                        /** @var \Torann\GeoIP\GeoIP $instance */
                        return $instance->getLocation($ip);
        }
        
        /**
         * Get the currency code from ISO.
         *
         * @param string $iso
         * @return string 
         * @static 
         */ 
        public static function getCurrency($iso)
        {
                        /** @var \Torann\GeoIP\GeoIP $instance */
                        return $instance->getCurrency($iso);
        }
        
        /**
         * Get service instance.
         *
         * @return \Torann\GeoIP\Contracts\ServiceInterface 
         * @throws Exception
         * @static 
         */ 
        public static function getService()
        {
                        /** @var \Torann\GeoIP\GeoIP $instance */
                        return $instance->getService();
        }
        
        /**
         * Get cache instance.
         *
         * @return \Torann\GeoIP\Cache 
         * @static 
         */ 
        public static function getCache()
        {
                        /** @var \Torann\GeoIP\GeoIP $instance */
                        return $instance->getCache();
        }
        
        /**
         * Get the client IP address.
         *
         * @return string 
         * @static 
         */ 
        public static function getClientIP()
        {
                        /** @var \Torann\GeoIP\GeoIP $instance */
                        return $instance->getClientIP();
        }
        
        /**
         * Get configuration value.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed 
         * @static 
         */ 
        public static function config($key, $default = null)
        {
                        /** @var \Torann\GeoIP\GeoIP $instance */
                        return $instance->config($key, $default);
        }
         
    }
 
}

namespace Barryvdh\DomPDF { 

    /**
     * 
     *
     */ 
    class Facade {
        
        /**
         * Get the DomPDF instance
         *
         * @return \Barryvdh\DomPDF\Dompdf 
         * @static 
         */ 
        public static function getDomPDF()
        {
                        /** @var \Barryvdh\DomPDF\PDF $instance */
                        return $instance->getDomPDF();
        }
        
        /**
         * Set the paper size (default A4)
         *
         * @param string $paper
         * @param string $orientation
         * @return \Barryvdh\DomPDF\PDF 
         * @static 
         */ 
        public static function setPaper($paper, $orientation = 'portrait')
        {
                        /** @var \Barryvdh\DomPDF\PDF $instance */
                        return $instance->setPaper($paper, $orientation);
        }
        
        /**
         * Show or hide warnings
         *
         * @param bool $warnings
         * @return \Barryvdh\DomPDF\PDF 
         * @static 
         */ 
        public static function setWarnings($warnings)
        {
                        /** @var \Barryvdh\DomPDF\PDF $instance */
                        return $instance->setWarnings($warnings);
        }
        
        /**
         * Load a HTML string
         *
         * @param string $string
         * @param string $encoding Not used yet
         * @return static 
         * @static 
         */ 
        public static function loadHTML($string, $encoding = null)
        {
                        /** @var \Barryvdh\DomPDF\PDF $instance */
                        return $instance->loadHTML($string, $encoding);
        }
        
        /**
         * Load a HTML file
         *
         * @param string $file
         * @return static 
         * @static 
         */ 
        public static function loadFile($file)
        {
                        /** @var \Barryvdh\DomPDF\PDF $instance */
                        return $instance->loadFile($file);
        }
        
        /**
         * Add metadata info
         *
         * @param array $info
         * @return static 
         * @static 
         */ 
        public static function addInfo($info)
        {
                        /** @var \Barryvdh\DomPDF\PDF $instance */
                        return $instance->addInfo($info);
        }
        
        /**
         * Load a View and convert to HTML
         *
         * @param string $view
         * @param array $data
         * @param array $mergeData
         * @param string $encoding Not used yet
         * @return static 
         * @static 
         */ 
        public static function loadView($view, $data = [], $mergeData = [], $encoding = null)
        {
                        /** @var \Barryvdh\DomPDF\PDF $instance */
                        return $instance->loadView($view, $data, $mergeData, $encoding);
        }
        
        /**
         * Set/Change an option in DomPdf
         *
         * @param array $options
         * @return static 
         * @static 
         */ 
        public static function setOptions($options)
        {
                        /** @var \Barryvdh\DomPDF\PDF $instance */
                        return $instance->setOptions($options);
        }
        
        /**
         * Output the PDF as a string.
         *
         * @return string The rendered PDF as string
         * @static 
         */ 
        public static function output()
        {
                        /** @var \Barryvdh\DomPDF\PDF $instance */
                        return $instance->output();
        }
        
        /**
         * Save the PDF to a file
         *
         * @param $filename
         * @return static 
         * @static 
         */ 
        public static function save($filename)
        {
                        /** @var \Barryvdh\DomPDF\PDF $instance */
                        return $instance->save($filename);
        }
        
        /**
         * Make the PDF downloadable by the user
         *
         * @param string $filename
         * @return \Illuminate\Http\Response 
         * @static 
         */ 
        public static function download($filename = 'document.pdf')
        {
                        /** @var \Barryvdh\DomPDF\PDF $instance */
                        return $instance->download($filename);
        }
        
        /**
         * Return a response with the PDF to show in the browser
         *
         * @param string $filename
         * @return \Illuminate\Http\Response 
         * @static 
         */ 
        public static function stream($filename = 'document.pdf')
        {
                        /** @var \Barryvdh\DomPDF\PDF $instance */
                        return $instance->stream($filename);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function setEncryption($password)
        {
                        /** @var \Barryvdh\DomPDF\PDF $instance */
                        return $instance->setEncryption($password);
        }
         
    }
 
}

namespace Maatwebsite\Excel\Facades { 

    /**
     * LaravelExcel Facade
     *
     * @category Laravel Excel
     * @version 1.0.0
     * @package maatwebsite/excel
     * @copyright Copyright (c) 2013 - 2014 Maatwebsite (http://www.maatwebsite.nl)
     * @author Maatwebsite <info@maatwebsite.nl>
     * @license http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
     */ 
    class Excel {
        
        /**
         * Create a new file
         *
         * @param $filename
         * @param callable|null $callback
         * @return \Maatwebsite\Excel\LaravelExcelWriter 
         * @static 
         */ 
        public static function create($filename, $callback = null)
        {
                        /** @var \Maatwebsite\Excel\Excel $instance */
                        return $instance->create($filename, $callback);
        }
        
        /**
         * Load an existing file
         *
         * @param string $file The file we want to load
         * @param callback|null $callback
         * @param string|null $encoding
         * @param bool $noBasePath
         * @param callback|null $callbackConfigReader
         * @return \Maatwebsite\Excel\LaravelExcelReader 
         * @static 
         */ 
        public static function load($file, $callback = null, $encoding = null, $noBasePath = false, $callbackConfigReader = null)
        {
                        /** @var \Maatwebsite\Excel\Excel $instance */
                        return $instance->load($file, $callback, $encoding, $noBasePath, $callbackConfigReader);
        }
        
        /**
         * Set select sheets
         *
         * @param $sheets
         * @return \Maatwebsite\Excel\LaravelExcelReader 
         * @static 
         */ 
        public static function selectSheets($sheets = [])
        {
                        /** @var \Maatwebsite\Excel\Excel $instance */
                        return $instance->selectSheets($sheets);
        }
        
        /**
         * Select sheets by index
         *
         * @param array $sheets
         * @return \Maatwebsite\Excel\Excel 
         * @static 
         */ 
        public static function selectSheetsByIndex($sheets = [])
        {
                        /** @var \Maatwebsite\Excel\Excel $instance */
                        return $instance->selectSheetsByIndex($sheets);
        }
        
        /**
         * Batch import
         *
         * @param $files
         * @param callback $callback
         * @return \PHPExcel 
         * @static 
         */ 
        public static function batch($files, $callback)
        {
                        /** @var \Maatwebsite\Excel\Excel $instance */
                        return $instance->batch($files, $callback);
        }
        
        /**
         * Create a new file and share a view
         *
         * @param string $view
         * @param array $data
         * @param array $mergeData
         * @return \Maatwebsite\Excel\LaravelExcelWriter 
         * @static 
         */ 
        public static function shareView($view, $data = [], $mergeData = [])
        {
                        /** @var \Maatwebsite\Excel\Excel $instance */
                        return $instance->shareView($view, $data, $mergeData);
        }
        
        /**
         * Create a new file and load a view
         *
         * @param string $view
         * @param array $data
         * @param array $mergeData
         * @return \Maatwebsite\Excel\LaravelExcelWriter 
         * @static 
         */ 
        public static function loadView($view, $data = [], $mergeData = [])
        {
                        /** @var \Maatwebsite\Excel\Excel $instance */
                        return $instance->loadView($view, $data, $mergeData);
        }
        
        /**
         * Set filters
         *
         * @param array $filters
         * @return \Excel 
         * @static 
         */ 
        public static function registerFilters($filters = [])
        {
                        /** @var \Maatwebsite\Excel\Excel $instance */
                        return $instance->registerFilters($filters);
        }
        
        /**
         * Enable certain filters
         *
         * @param string|array $filter
         * @param bool|false|string $class
         * @return \Excel 
         * @static 
         */ 
        public static function filter($filter, $class = false)
        {
                        /** @var \Maatwebsite\Excel\Excel $instance */
                        return $instance->filter($filter, $class);
        }
        
        /**
         * Get register, enabled (or both) filters
         *
         * @param string|boolean $key [description]
         * @return array 
         * @static 
         */ 
        public static function getFilters($key = false)
        {
                        /** @var \Maatwebsite\Excel\Excel $instance */
                        return $instance->getFilters($key);
        }
         
    }
 
}

namespace Barryvdh\Debugbar { 

    /**
     * 
     *
     * @method static void alert(string $message)
     * @method static void critical(string $message)
     * @method static void debug(string $message)
     * @method static void emergency(string $message)
     * @method static void error(string $message)
     * @method static void info(string $message)
     * @method static void log(string $message)
     * @method static void notice(string $message)
     * @method static void warning(string $message)
     * @see \Barryvdh\Debugbar\LaravelDebugbar
     */ 
    class Facade {
        
        /**
         * Enable the Debugbar and boot, if not already booted.
         *
         * @static 
         */ 
        public static function enable()
        {
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->enable();
        }
        
        /**
         * Boot the debugbar (add collectors, renderer and listener)
         *
         * @static 
         */ 
        public static function boot()
        {
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->boot();
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function shouldCollect($name, $default = false)
        {
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->shouldCollect($name, $default);
        }
        
        /**
         * Adds a data collector
         *
         * @param \Barryvdh\Debugbar\DataCollectorInterface $collector
         * @throws DebugBarException
         * @return \Barryvdh\Debugbar\LaravelDebugbar 
         * @static 
         */ 
        public static function addCollector($collector)
        {
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->addCollector($collector);
        }
        
        /**
         * Handle silenced errors
         *
         * @param $level
         * @param $message
         * @param string $file
         * @param int $line
         * @param array $context
         * @throws \ErrorException
         * @static 
         */ 
        public static function handleError($level, $message, $file = '', $line = 0, $context = [])
        {
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->handleError($level, $message, $file, $line, $context);
        }
        
        /**
         * Starts a measure
         *
         * @param string $name Internal name, used to stop the measure
         * @param string $label Public name
         * @static 
         */ 
        public static function startMeasure($name, $label = null)
        {
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->startMeasure($name, $label);
        }
        
        /**
         * Stops a measure
         *
         * @param string $name
         * @static 
         */ 
        public static function stopMeasure($name)
        {
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->stopMeasure($name);
        }
        
        /**
         * Adds an exception to be profiled in the debug bar
         *
         * @param \Exception $e
         * @deprecated in favor of addThrowable
         * @static 
         */ 
        public static function addException($e)
        {
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->addException($e);
        }
        
        /**
         * Adds an exception to be profiled in the debug bar
         *
         * @param \Exception $e
         * @static 
         */ 
        public static function addThrowable($e)
        {
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->addThrowable($e);
        }
        
        /**
         * Returns a JavascriptRenderer for this instance
         *
         * @param string $baseUrl
         * @param string $basePathng
         * @return \Barryvdh\Debugbar\JavascriptRenderer 
         * @static 
         */ 
        public static function getJavascriptRenderer($baseUrl = null, $basePath = null)
        {
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->getJavascriptRenderer($baseUrl, $basePath);
        }
        
        /**
         * Modify the response and inject the debugbar (or data in headers)
         *
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @param \Symfony\Component\HttpFoundation\Response $response
         * @return \Symfony\Component\HttpFoundation\Response 
         * @static 
         */ 
        public static function modifyResponse($request, $response)
        {
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->modifyResponse($request, $response);
        }
        
        /**
         * Check if the Debugbar is enabled
         *
         * @return boolean 
         * @static 
         */ 
        public static function isEnabled()
        {
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->isEnabled();
        }
        
        /**
         * Collects the data from the collectors
         *
         * @return array 
         * @static 
         */ 
        public static function collect()
        {
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->collect();
        }
        
        /**
         * Injects the web debug toolbar into the given Response.
         *
         * @param \Symfony\Component\HttpFoundation\Response $response A Response instance
         * Based on https://github.com/symfony/WebProfilerBundle/blob/master/EventListener/WebDebugToolbarListener.php
         * @static 
         */ 
        public static function injectDebugbar($response)
        {
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->injectDebugbar($response);
        }
        
        /**
         * Disable the Debugbar
         *
         * @static 
         */ 
        public static function disable()
        {
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->disable();
        }
        
        /**
         * Adds a measure
         *
         * @param string $label
         * @param float $start
         * @param float $end
         * @static 
         */ 
        public static function addMeasure($label, $start, $end)
        {
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->addMeasure($label, $start, $end);
        }
        
        /**
         * Utility function to measure the execution of a Closure
         *
         * @param string $label
         * @param \Closure $closure
         * @static 
         */ 
        public static function measure($label, $closure)
        {
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->measure($label, $closure);
        }
        
        /**
         * Collect data in a CLI request
         *
         * @return array 
         * @static 
         */ 
        public static function collectConsole()
        {
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->collectConsole();
        }
        
        /**
         * Adds a message to the MessagesCollector
         * 
         * A message can be anything from an object to a string
         *
         * @param mixed $message
         * @param string $label
         * @static 
         */ 
        public static function addMessage($message, $label = 'info')
        {
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->addMessage($message, $label);
        }
        
        /**
         * Checks if a data collector has been added
         *
         * @param string $name
         * @return boolean 
         * @static 
         */ 
        public static function hasCollector($name)
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->hasCollector($name);
        }
        
        /**
         * Returns a data collector
         *
         * @param string $name
         * @return \DebugBar\DataCollectorInterface 
         * @throws DebugBarException
         * @static 
         */ 
        public static function getCollector($name)
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->getCollector($name);
        }
        
        /**
         * Returns an array of all data collectors
         *
         * @return \DebugBar\array[DataCollectorInterface] 
         * @static 
         */ 
        public static function getCollectors()
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->getCollectors();
        }
        
        /**
         * Sets the request id generator
         *
         * @param \DebugBar\RequestIdGeneratorInterface $generator
         * @return \Barryvdh\Debugbar\LaravelDebugbar 
         * @static 
         */ 
        public static function setRequestIdGenerator($generator)
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->setRequestIdGenerator($generator);
        }
        
        /**
         * 
         *
         * @return \DebugBar\RequestIdGeneratorInterface 
         * @static 
         */ 
        public static function getRequestIdGenerator()
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->getRequestIdGenerator();
        }
        
        /**
         * Returns the id of the current request
         *
         * @return string 
         * @static 
         */ 
        public static function getCurrentRequestId()
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->getCurrentRequestId();
        }
        
        /**
         * Sets the storage backend to use to store the collected data
         *
         * @param \DebugBar\StorageInterface $storage
         * @return \Barryvdh\Debugbar\LaravelDebugbar 
         * @static 
         */ 
        public static function setStorage($storage = null)
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->setStorage($storage);
        }
        
        /**
         * 
         *
         * @return \DebugBar\StorageInterface 
         * @static 
         */ 
        public static function getStorage()
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->getStorage();
        }
        
        /**
         * Checks if the data will be persisted
         *
         * @return boolean 
         * @static 
         */ 
        public static function isDataPersisted()
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->isDataPersisted();
        }
        
        /**
         * Sets the HTTP driver
         *
         * @param \DebugBar\HttpDriverInterface $driver
         * @return \Barryvdh\Debugbar\LaravelDebugbar 
         * @static 
         */ 
        public static function setHttpDriver($driver)
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->setHttpDriver($driver);
        }
        
        /**
         * Returns the HTTP driver
         * 
         * If no http driver where defined, a PhpHttpDriver is automatically created
         *
         * @return \DebugBar\HttpDriverInterface 
         * @static 
         */ 
        public static function getHttpDriver()
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->getHttpDriver();
        }
        
        /**
         * Returns collected data
         * 
         * Will collect the data if none have been collected yet
         *
         * @return array 
         * @static 
         */ 
        public static function getData()
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->getData();
        }
        
        /**
         * Returns an array of HTTP headers containing the data
         *
         * @param string $headerName
         * @param integer $maxHeaderLength
         * @return array 
         * @static 
         */ 
        public static function getDataAsHeaders($headerName = 'phpdebugbar', $maxHeaderLength = 4096, $maxTotalHeaderLength = 250000)
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->getDataAsHeaders($headerName, $maxHeaderLength, $maxTotalHeaderLength);
        }
        
        /**
         * Sends the data through the HTTP headers
         *
         * @param bool $useOpenHandler
         * @param string $headerName
         * @param integer $maxHeaderLength
         * @return \Barryvdh\Debugbar\LaravelDebugbar 
         * @static 
         */ 
        public static function sendDataInHeaders($useOpenHandler = null, $headerName = 'phpdebugbar', $maxHeaderLength = 4096)
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->sendDataInHeaders($useOpenHandler, $headerName, $maxHeaderLength);
        }
        
        /**
         * Stacks the data in the session for later rendering
         *
         * @static 
         */ 
        public static function stackData()
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->stackData();
        }
        
        /**
         * Checks if there is stacked data in the session
         *
         * @return boolean 
         * @static 
         */ 
        public static function hasStackedData()
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->hasStackedData();
        }
        
        /**
         * Returns the data stacked in the session
         *
         * @param boolean $delete Whether to delete the data in the session
         * @return array 
         * @static 
         */ 
        public static function getStackedData($delete = true)
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->getStackedData($delete);
        }
        
        /**
         * Sets the key to use in the $_SESSION array
         *
         * @param string $ns
         * @return \Barryvdh\Debugbar\LaravelDebugbar 
         * @static 
         */ 
        public static function setStackDataSessionNamespace($ns)
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->setStackDataSessionNamespace($ns);
        }
        
        /**
         * Returns the key used in the $_SESSION array
         *
         * @return string 
         * @static 
         */ 
        public static function getStackDataSessionNamespace()
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->getStackDataSessionNamespace();
        }
        
        /**
         * Sets whether to only use the session to store stacked data even
         * if a storage is enabled
         *
         * @param boolean $enabled
         * @return \Barryvdh\Debugbar\LaravelDebugbar 
         * @static 
         */ 
        public static function setStackAlwaysUseSessionStorage($enabled = true)
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->setStackAlwaysUseSessionStorage($enabled);
        }
        
        /**
         * Checks if the session is always used to store stacked data
         * even if a storage is enabled
         *
         * @return boolean 
         * @static 
         */ 
        public static function isStackAlwaysUseSessionStorage()
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->isStackAlwaysUseSessionStorage();
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function offsetSet($key, $value)
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->offsetSet($key, $value);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function offsetGet($key)
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->offsetGet($key);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function offsetExists($key)
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->offsetExists($key);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function offsetUnset($key)
        {
            //Method inherited from \DebugBar\DebugBar            
                        /** @var \Barryvdh\Debugbar\LaravelDebugbar $instance */
                        return $instance->offsetUnset($key);
        }
         
    }
 
}

namespace Sentry\Laravel { 

    /**
     * 
     *
     */ 
    class Facade {
        
        /**
         * Gets the client bound to the top of the stack.
         *
         * @static 
         */ 
        public static function getClient()
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->getClient();
        }
        
        /**
         * Gets the ID of the last captured event.
         *
         * @static 
         */ 
        public static function getLastEventId()
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->getLastEventId();
        }
        
        /**
         * Creates a new scope to store context information that will be layered on
         * top of the current one. It is isolated, i.e. all breadcrumbs and context
         * information added to this scope will be removed once the scope ends. Be
         * sure to always remove this scope with {@see Hub::popScope} when the
         * operation finishes or throws.
         *
         * @static 
         */ 
        public static function pushScope()
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->pushScope();
        }
        
        /**
         * Removes a previously pushed scope from the stack. This restores the state
         * before the scope was pushed. All breadcrumbs and context information added
         * since the last call to {@see Hub::pushScope} are discarded.
         *
         * @static 
         */ 
        public static function popScope()
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->popScope();
        }
        
        /**
         * Creates a new scope with and executes the given operation within. The scope
         * is automatically removed once the operation finishes or throws.
         *
         * @param callable $callback The callback to be executed
         * @static 
         */ 
        public static function withScope($callback)
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->withScope($callback);
        }
        
        /**
         * Calls the given callback passing to it the current scope so that any
         * operation can be run within its context.
         *
         * @param callable $callback The callback to be executed
         * @static 
         */ 
        public static function configureScope($callback)
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->configureScope($callback);
        }
        
        /**
         * Binds the given client to the current scope.
         *
         * @param \Sentry\State\ClientInterface $client The client
         * @static 
         */ 
        public static function bindClient($client)
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->bindClient($client);
        }
        
        /**
         * Captures a message event and sends it to Sentry.
         *
         * @param string $message The message
         * @param \Sentry\State\Severity $level The severity level of the message
         * @static 
         */ 
        public static function captureMessage($message, $level = null)
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->captureMessage($message, $level);
        }
        
        /**
         * Captures an exception event and sends it to Sentry.
         *
         * @param \Throwable $exception The exception
         * @static 
         */ 
        public static function captureException($exception)
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->captureException($exception);
        }
        
        /**
         * Captures a new event using the provided data.
         *
         * @param array $payload The data of the event being captured
         * @static 
         */ 
        public static function captureEvent($payload)
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->captureEvent($payload);
        }
        
        /**
         * Captures an event that logs the last occurred error.
         *
         * @static 
         */ 
        public static function captureLastError()
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->captureLastError();
        }
        
        /**
         * Records a new breadcrumb which will be attached to future events. They
         * will be added to subsequent events to provide more context on user's
         * actions prior to an error or crash.
         *
         * @param \Sentry\State\Breadcrumb $breadcrumb The breadcrumb to record
         * @return bool Whether the breadcrumb was actually added to the current scope
         * @static 
         */ 
        public static function addBreadcrumb($breadcrumb)
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->addBreadcrumb($breadcrumb);
        }
        
        /**
         * Returns the current global Hub.
         *
         * @return \Sentry\State\HubInterface 
         * @deprecated since version 2.2, to be removed in 3.0
         * @static 
         */ 
        public static function getCurrent()
        {
                        return \Sentry\State\Hub::getCurrent();
        }
        
        /**
         * Sets the Hub as the current.
         *
         * @param \Sentry\State\HubInterface $hub The Hub that will become the current one
         * @return \Sentry\State\HubInterface 
         * @deprecated since version 2.2, to be removed in 3.0
         * @static 
         */ 
        public static function setCurrent($hub)
        {
                        return \Sentry\State\Hub::setCurrent($hub);
        }
        
        /**
         * Gets the integration whose FQCN matches the given one if it's available on the current client.
         *
         * @param string $className The FQCN of the integration
         * @psalm-template T of IntegrationInterface
         * @psalm-param class-string<T> $className
         * @psalm-return T|null
         * @static 
         */ 
        public static function getIntegration($className)
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->getIntegration($className);
        }
         
    }
 
}

namespace NZTim\Mailchimp { 

    /**
     * 
     *
     */ 
    class MailchimpFacade {
        
        /**
         * 
         *
         * @static 
         */ 
        public static function getLists($params = [])
        {
                        /** @var \NZTim\Mailchimp\Mailchimp $instance */
                        return $instance->getLists($params);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function status($listId, $email)
        {
                        /** @var \NZTim\Mailchimp\Mailchimp $instance */
                        return $instance->status($listId, $email);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function check($listId, $email)
        {
                        /** @var \NZTim\Mailchimp\Mailchimp $instance */
                        return $instance->check($listId, $email);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function subscribe($listId, $email, $mergeFields = [], $confirm = true)
        {
                        /** @var \NZTim\Mailchimp\Mailchimp $instance */
                        return $instance->subscribe($listId, $email, $mergeFields, $confirm);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function addUpdateMember($listId, $member)
        {
                        /** @var \NZTim\Mailchimp\Mailchimp $instance */
                        return $instance->addUpdateMember($listId, $member);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function unsubscribe($listId, $email)
        {
                        /** @var \NZTim\Mailchimp\Mailchimp $instance */
                        return $instance->unsubscribe($listId, $email);
        }
        
        /**
         * 
         *
         * @static 
         */ 
        public static function api($method, $endpoint, $data = [])
        {
                        /** @var \NZTim\Mailchimp\Mailchimp $instance */
                        return $instance->api($method, $endpoint, $data);
        }
         
    }
 
}


namespace  { 

    class App extends \Illuminate\Support\Facades\App {}

    class Artisan extends \Illuminate\Support\Facades\Artisan {}

    class Auth extends \Illuminate\Support\Facades\Auth {}

    class Blade extends \Illuminate\Support\Facades\Blade {}

    class Broadcast extends \Illuminate\Support\Facades\Broadcast {}

    class Bus extends \Illuminate\Support\Facades\Bus {}

    class Cache extends \Illuminate\Support\Facades\Cache {}

    class Config extends \Illuminate\Support\Facades\Config {}

    class Cookie extends \Illuminate\Support\Facades\Cookie {}

    class Crypt extends \Illuminate\Support\Facades\Crypt {}

    class DB extends \Illuminate\Support\Facades\DB {}

    class Eloquent extends \Illuminate\Database\Eloquent\Model {         
            /**
             * Create and return an un-saved model instance.
             *
             * @param array $attributes
             * @return \Illuminate\Database\Eloquent\Model 
             * @static 
             */ 
            public static function make($attributes = [])
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->make($attributes);
            }
         
            /**
             * Register a new global scope.
             *
             * @param string $identifier
             * @param \Illuminate\Database\Eloquent\Scope|\Closure $scope
             * @return \Illuminate\Database\Eloquent\Builder 
             * @static 
             */ 
            public static function withGlobalScope($identifier, $scope)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->withGlobalScope($identifier, $scope);
            }
         
            /**
             * Remove a registered global scope.
             *
             * @param \Illuminate\Database\Eloquent\Scope|string $scope
             * @return \Illuminate\Database\Eloquent\Builder 
             * @static 
             */ 
            public static function withoutGlobalScope($scope)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->withoutGlobalScope($scope);
            }
         
            /**
             * Remove all or passed registered global scopes.
             *
             * @param array|null $scopes
             * @return \Illuminate\Database\Eloquent\Builder 
             * @static 
             */ 
            public static function withoutGlobalScopes($scopes = null)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->withoutGlobalScopes($scopes);
            }
         
            /**
             * Get an array of global scopes that were removed from the query.
             *
             * @return array 
             * @static 
             */ 
            public static function removedScopes()
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->removedScopes();
            }
         
            /**
             * Add a where clause on the primary key to the query.
             *
             * @param mixed $id
             * @return \Illuminate\Database\Eloquent\Builder 
             * @static 
             */ 
            public static function whereKey($id)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->whereKey($id);
            }
         
            /**
             * Add a where clause on the primary key to the query.
             *
             * @param mixed $id
             * @return \Illuminate\Database\Eloquent\Builder 
             * @static 
             */ 
            public static function whereKeyNot($id)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->whereKeyNot($id);
            }
         
            /**
             * Add a basic where clause to the query.
             *
             * @param string|array|\Closure $column
             * @param mixed $operator
             * @param mixed $value
             * @param string $boolean
             * @return \Illuminate\Database\Eloquent\Builder 
             * @static 
             */ 
            public static function where($column, $operator = null, $value = null, $boolean = 'and')
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->where($column, $operator, $value, $boolean);
            }
         
            /**
             * Add an "or where" clause to the query.
             *
             * @param \Closure|array|string $column
             * @param mixed $operator
             * @param mixed $value
             * @return \Illuminate\Database\Eloquent\Builder|static 
             * @static 
             */ 
            public static function orWhere($column, $operator = null, $value = null)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->orWhere($column, $operator, $value);
            }
         
            /**
             * Create a collection of models from plain arrays.
             *
             * @param array $items
             * @return \Illuminate\Database\Eloquent\Collection 
             * @static 
             */ 
            public static function hydrate($items)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->hydrate($items);
            }
         
            /**
             * Create a collection of models from a raw query.
             *
             * @param string $query
             * @param array $bindings
             * @return \Illuminate\Database\Eloquent\Collection 
             * @static 
             */ 
            public static function fromQuery($query, $bindings = [])
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->fromQuery($query, $bindings);
            }
         
            /**
             * Find a model by its primary key.
             *
             * @param mixed $id
             * @param array $columns
             * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null 
             * @static 
             */ 
            public static function find($id, $columns = [])
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->find($id, $columns);
            }
         
            /**
             * Find multiple models by their primary keys.
             *
             * @param \Illuminate\Contracts\Support\Arrayable|array $ids
             * @param array $columns
             * @return \Illuminate\Database\Eloquent\Collection 
             * @static 
             */ 
            public static function findMany($ids, $columns = [])
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->findMany($ids, $columns);
            }
         
            /**
             * Find a model by its primary key or throw an exception.
             *
             * @param mixed $id
             * @param array $columns
             * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static|static[] 
             * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
             * @static 
             */ 
            public static function findOrFail($id, $columns = [])
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->findOrFail($id, $columns);
            }
         
            /**
             * Find a model by its primary key or return fresh model instance.
             *
             * @param mixed $id
             * @param array $columns
             * @return \Illuminate\Database\Eloquent\Model 
             * @static 
             */ 
            public static function findOrNew($id, $columns = [])
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->findOrNew($id, $columns);
            }
         
            /**
             * Get the first record matching the attributes or instantiate it.
             *
             * @param array $attributes
             * @param array $values
             * @return \Illuminate\Database\Eloquent\Model 
             * @static 
             */ 
            public static function firstOrNew($attributes, $values = [])
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->firstOrNew($attributes, $values);
            }
         
            /**
             * Get the first record matching the attributes or create it.
             *
             * @param array $attributes
             * @param array $values
             * @return \Illuminate\Database\Eloquent\Model 
             * @static 
             */ 
            public static function firstOrCreate($attributes, $values = [])
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->firstOrCreate($attributes, $values);
            }
         
            /**
             * Create or update a record matching the attributes, and fill it with values.
             *
             * @param array $attributes
             * @param array $values
             * @return \Illuminate\Database\Eloquent\Model 
             * @static 
             */ 
            public static function updateOrCreate($attributes, $values = [])
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->updateOrCreate($attributes, $values);
            }
         
            /**
             * Execute the query and get the first result or throw an exception.
             *
             * @param array $columns
             * @return \Illuminate\Database\Eloquent\Model|static 
             * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
             * @static 
             */ 
            public static function firstOrFail($columns = [])
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->firstOrFail($columns);
            }
         
            /**
             * Execute the query and get the first result or call a callback.
             *
             * @param \Closure|array $columns
             * @param \Closure|null $callback
             * @return \Illuminate\Database\Eloquent\Model|static|mixed 
             * @static 
             */ 
            public static function firstOr($columns = [], $callback = null)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->firstOr($columns, $callback);
            }
         
            /**
             * Get a single column's value from the first result of a query.
             *
             * @param string $column
             * @return mixed 
             * @static 
             */ 
            public static function value($column)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->value($column);
            }
         
            /**
             * Execute the query as a "select" statement.
             *
             * @param array $columns
             * @return \Illuminate\Database\Eloquent\Collection|static[] 
             * @static 
             */ 
            public static function get($columns = [])
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->get($columns);
            }
         
            /**
             * Get the hydrated models without eager loading.
             *
             * @param array $columns
             * @return \Illuminate\Database\Eloquent\Model[] 
             * @static 
             */ 
            public static function getModels($columns = [])
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->getModels($columns);
            }
         
            /**
             * Eager load the relationships for the models.
             *
             * @param array $models
             * @return array 
             * @static 
             */ 
            public static function eagerLoadRelations($models)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->eagerLoadRelations($models);
            }
         
            /**
             * Get a generator for the given query.
             *
             * @return \Generator 
             * @static 
             */ 
            public static function cursor()
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->cursor();
            }
         
            /**
             * Chunk the results of a query by comparing numeric IDs.
             *
             * @param int $count
             * @param callable $callback
             * @param string|null $column
             * @param string|null $alias
             * @return bool 
             * @static 
             */ 
            public static function chunkById($count, $callback, $column = null, $alias = null)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->chunkById($count, $callback, $column, $alias);
            }
         
            /**
             * Get an array with the values of a given column.
             *
             * @param string $column
             * @param string|null $key
             * @return \Illuminate\Support\Collection 
             * @static 
             */ 
            public static function pluck($column, $key = null)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->pluck($column, $key);
            }
         
            /**
             * Paginate the given query.
             *
             * @param int $perPage
             * @param array $columns
             * @param string $pageName
             * @param int|null $page
             * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator 
             * @throws \InvalidArgumentException
             * @static 
             */ 
            public static function paginate($perPage = null, $columns = [], $pageName = 'page', $page = null)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->paginate($perPage, $columns, $pageName, $page);
            }
         
            /**
             * Paginate the given query into a simple paginator.
             *
             * @param int $perPage
             * @param array $columns
             * @param string $pageName
             * @param int|null $page
             * @return \Illuminate\Contracts\Pagination\Paginator 
             * @static 
             */ 
            public static function simplePaginate($perPage = null, $columns = [], $pageName = 'page', $page = null)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->simplePaginate($perPage, $columns, $pageName, $page);
            }
         
            /**
             * Save a new model and return the instance.
             *
             * @param array $attributes
             * @return \Illuminate\Database\Eloquent\Model|$this 
             * @static 
             */ 
            public static function create($attributes = [])
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->create($attributes);
            }
         
            /**
             * Save a new model and return the instance. Allow mass-assignment.
             *
             * @param array $attributes
             * @return \Illuminate\Database\Eloquent\Model|$this 
             * @static 
             */ 
            public static function forceCreate($attributes)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->forceCreate($attributes);
            }
         
            /**
             * Register a replacement for the default delete function.
             *
             * @param \Closure $callback
             * @return void 
             * @static 
             */ 
            public static function onDelete($callback)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                $instance->onDelete($callback);
            }
         
            /**
             * Call the given local model scopes.
             *
             * @param array $scopes
             * @return mixed 
             * @static 
             */ 
            public static function scopes($scopes)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->scopes($scopes);
            }
         
            /**
             * Apply the scopes to the Eloquent builder instance and return it.
             *
             * @return \Illuminate\Database\Eloquent\Builder|static 
             * @static 
             */ 
            public static function applyScopes()
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->applyScopes();
            }
         
            /**
             * Prevent the specified relations from being eager loaded.
             *
             * @param mixed $relations
             * @return \Illuminate\Database\Eloquent\Builder 
             * @static 
             */ 
            public static function without($relations)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->without($relations);
            }
         
            /**
             * Create a new instance of the model being queried.
             *
             * @param array $attributes
             * @return \Illuminate\Database\Eloquent\Model 
             * @static 
             */ 
            public static function newModelInstance($attributes = [])
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->newModelInstance($attributes);
            }
         
            /**
             * Get the underlying query builder instance.
             *
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function getQuery()
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->getQuery();
            }
         
            /**
             * Set the underlying query builder instance.
             *
             * @param \Illuminate\Database\Query\Builder $query
             * @return \Illuminate\Database\Eloquent\Builder 
             * @static 
             */ 
            public static function setQuery($query)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->setQuery($query);
            }
         
            /**
             * Get a base query builder instance.
             *
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function toBase()
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->toBase();
            }
         
            /**
             * Get the relationships being eagerly loaded.
             *
             * @return array 
             * @static 
             */ 
            public static function getEagerLoads()
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->getEagerLoads();
            }
         
            /**
             * Set the relationships being eagerly loaded.
             *
             * @param array $eagerLoad
             * @return \Illuminate\Database\Eloquent\Builder 
             * @static 
             */ 
            public static function setEagerLoads($eagerLoad)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->setEagerLoads($eagerLoad);
            }
         
            /**
             * Get the model instance being queried.
             *
             * @return \Illuminate\Database\Eloquent\Model 
             * @static 
             */ 
            public static function getModel()
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->getModel();
            }
         
            /**
             * Set a model instance for the model being queried.
             *
             * @param \Illuminate\Database\Eloquent\Model $model
             * @return \Illuminate\Database\Eloquent\Builder 
             * @static 
             */ 
            public static function setModel($model)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->setModel($model);
            }
         
            /**
             * Get the given macro by name.
             *
             * @param string $name
             * @return \Closure 
             * @static 
             */ 
            public static function getMacro($name)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->getMacro($name);
            }
         
            /**
             * Chunk the results of the query.
             *
             * @param int $count
             * @param callable $callback
             * @return bool 
             * @static 
             */ 
            public static function chunk($count, $callback)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->chunk($count, $callback);
            }
         
            /**
             * Execute a callback over each item while chunking.
             *
             * @param callable $callback
             * @param int $count
             * @return bool 
             * @static 
             */ 
            public static function each($callback, $count = 1000)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->each($callback, $count);
            }
         
            /**
             * Execute the query and get the first result.
             *
             * @param array $columns
             * @return \Illuminate\Database\Eloquent\Model|object|static|null 
             * @static 
             */ 
            public static function first($columns = [])
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->first($columns);
            }
         
            /**
             * Apply the callback's query changes if the given "value" is true.
             *
             * @param mixed $value
             * @param callable $callback
             * @param callable $default
             * @return mixed|$this 
             * @static 
             */ 
            public static function when($value, $callback, $default = null)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->when($value, $callback, $default);
            }
         
            /**
             * Pass the query to a given callback.
             *
             * @param \Closure $callback
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function tap($callback)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->tap($callback);
            }
         
            /**
             * Apply the callback's query changes if the given "value" is false.
             *
             * @param mixed $value
             * @param callable $callback
             * @param callable $default
             * @return mixed|$this 
             * @static 
             */ 
            public static function unless($value, $callback, $default = null)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->unless($value, $callback, $default);
            }
         
            /**
             * Add a relationship count / exists condition to the query.
             *
             * @param string $relation
             * @param string $operator
             * @param int $count
             * @param string $boolean
             * @param \Closure|null $callback
             * @return \Illuminate\Database\Eloquent\Builder|static 
             * @static 
             */ 
            public static function has($relation, $operator = '>=', $count = 1, $boolean = 'and', $callback = null)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->has($relation, $operator, $count, $boolean, $callback);
            }
         
            /**
             * Add a relationship count / exists condition to the query with an "or".
             *
             * @param string $relation
             * @param string $operator
             * @param int $count
             * @return \Illuminate\Database\Eloquent\Builder|static 
             * @static 
             */ 
            public static function orHas($relation, $operator = '>=', $count = 1)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->orHas($relation, $operator, $count);
            }
         
            /**
             * Add a relationship count / exists condition to the query.
             *
             * @param string $relation
             * @param string $boolean
             * @param \Closure|null $callback
             * @return \Illuminate\Database\Eloquent\Builder|static 
             * @static 
             */ 
            public static function doesntHave($relation, $boolean = 'and', $callback = null)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->doesntHave($relation, $boolean, $callback);
            }
         
            /**
             * Add a relationship count / exists condition to the query with an "or".
             *
             * @param string $relation
             * @return \Illuminate\Database\Eloquent\Builder|static 
             * @static 
             */ 
            public static function orDoesntHave($relation)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->orDoesntHave($relation);
            }
         
            /**
             * Add a relationship count / exists condition to the query with where clauses.
             *
             * @param string $relation
             * @param \Closure|null $callback
             * @param string $operator
             * @param int $count
             * @return \Illuminate\Database\Eloquent\Builder|static 
             * @static 
             */ 
            public static function whereHas($relation, $callback = null, $operator = '>=', $count = 1)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->whereHas($relation, $callback, $operator, $count);
            }
         
            /**
             * Add a relationship count / exists condition to the query with where clauses and an "or".
             *
             * @param string $relation
             * @param \Closure $callback
             * @param string $operator
             * @param int $count
             * @return \Illuminate\Database\Eloquent\Builder|static 
             * @static 
             */ 
            public static function orWhereHas($relation, $callback = null, $operator = '>=', $count = 1)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->orWhereHas($relation, $callback, $operator, $count);
            }
         
            /**
             * Add a relationship count / exists condition to the query with where clauses.
             *
             * @param string $relation
             * @param \Closure|null $callback
             * @return \Illuminate\Database\Eloquent\Builder|static 
             * @static 
             */ 
            public static function whereDoesntHave($relation, $callback = null)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->whereDoesntHave($relation, $callback);
            }
         
            /**
             * Add a relationship count / exists condition to the query with where clauses and an "or".
             *
             * @param string $relation
             * @param \Closure $callback
             * @return \Illuminate\Database\Eloquent\Builder|static 
             * @static 
             */ 
            public static function orWhereDoesntHave($relation, $callback = null)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->orWhereDoesntHave($relation, $callback);
            }
         
            /**
             * Add subselect queries to count the relations.
             *
             * @param mixed $relations
             * @return \Illuminate\Database\Eloquent\Builder 
             * @static 
             */ 
            public static function withCount($relations)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->withCount($relations);
            }
         
            /**
             * Merge the where constraints from another query to the current query.
             *
             * @param \Illuminate\Database\Eloquent\Builder $from
             * @return \Illuminate\Database\Eloquent\Builder|static 
             * @static 
             */ 
            public static function mergeConstraintsFrom($from)
            {
                                /** @var \Illuminate\Database\Eloquent\Builder $instance */
                                return $instance->mergeConstraintsFrom($from);
            }
         
            /**
             * Set the columns to be selected.
             *
             * @param array|mixed $columns
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function select($columns = [])
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->select($columns);
            }
         
            /**
             * Add a subselect expression to the query.
             *
             * @param \Closure|\Illuminate\Database\Query\Builder|string $query
             * @param string $as
             * @return \Illuminate\Database\Query\Builder|static 
             * @throws \InvalidArgumentException
             * @static 
             */ 
            public static function selectSub($query, $as)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->selectSub($query, $as);
            }
         
            /**
             * Add a new "raw" select expression to the query.
             *
             * @param string $expression
             * @param array $bindings
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function selectRaw($expression, $bindings = [])
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->selectRaw($expression, $bindings);
            }
         
            /**
             * Makes "from" fetch from a subquery.
             *
             * @param \Closure|\Illuminate\Database\Query\Builder|string $query
             * @param string $as
             * @return \Illuminate\Database\Query\Builder|static 
             * @throws \InvalidArgumentException
             * @static 
             */ 
            public static function fromSub($query, $as)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->fromSub($query, $as);
            }
         
            /**
             * Add a raw from clause to the query.
             *
             * @param string $expression
             * @param mixed $bindings
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function fromRaw($expression, $bindings = [])
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->fromRaw($expression, $bindings);
            }
         
            /**
             * Add a new select column to the query.
             *
             * @param array|mixed $column
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function addSelect($column)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->addSelect($column);
            }
         
            /**
             * Force the query to only return distinct results.
             *
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function distinct()
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->distinct();
            }
         
            /**
             * Set the table which the query is targeting.
             *
             * @param string $table
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function from($table)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->from($table);
            }
         
            /**
             * Add a join clause to the query.
             *
             * @param string $table
             * @param string $first
             * @param string|null $operator
             * @param string|null $second
             * @param string $type
             * @param bool $where
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function join($table, $first, $operator = null, $second = null, $type = 'inner', $where = false)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->join($table, $first, $operator, $second, $type, $where);
            }
         
            /**
             * Add a "join where" clause to the query.
             *
             * @param string $table
             * @param string $first
             * @param string $operator
             * @param string $second
             * @param string $type
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function joinWhere($table, $first, $operator, $second, $type = 'inner')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->joinWhere($table, $first, $operator, $second, $type);
            }
         
            /**
             * Add a subquery join clause to the query.
             *
             * @param \Closure|\Illuminate\Database\Query\Builder|string $query
             * @param string $as
             * @param string $first
             * @param string|null $operator
             * @param string|null $second
             * @param string $type
             * @param bool $where
             * @return \Illuminate\Database\Query\Builder|static 
             * @throws \InvalidArgumentException
             * @static 
             */ 
            public static function joinSub($query, $as, $first, $operator = null, $second = null, $type = 'inner', $where = false)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->joinSub($query, $as, $first, $operator, $second, $type, $where);
            }
         
            /**
             * Add a left join to the query.
             *
             * @param string $table
             * @param string $first
             * @param string|null $operator
             * @param string|null $second
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function leftJoin($table, $first, $operator = null, $second = null)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->leftJoin($table, $first, $operator, $second);
            }
         
            /**
             * Add a "join where" clause to the query.
             *
             * @param string $table
             * @param string $first
             * @param string $operator
             * @param string $second
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function leftJoinWhere($table, $first, $operator, $second)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->leftJoinWhere($table, $first, $operator, $second);
            }
         
            /**
             * Add a subquery left join to the query.
             *
             * @param \Closure|\Illuminate\Database\Query\Builder|string $query
             * @param string $as
             * @param string $first
             * @param string|null $operator
             * @param string|null $second
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function leftJoinSub($query, $as, $first, $operator = null, $second = null)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->leftJoinSub($query, $as, $first, $operator, $second);
            }
         
            /**
             * Add a right join to the query.
             *
             * @param string $table
             * @param string $first
             * @param string|null $operator
             * @param string|null $second
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function rightJoin($table, $first, $operator = null, $second = null)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->rightJoin($table, $first, $operator, $second);
            }
         
            /**
             * Add a "right join where" clause to the query.
             *
             * @param string $table
             * @param string $first
             * @param string $operator
             * @param string $second
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function rightJoinWhere($table, $first, $operator, $second)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->rightJoinWhere($table, $first, $operator, $second);
            }
         
            /**
             * Add a subquery right join to the query.
             *
             * @param \Closure|\Illuminate\Database\Query\Builder|string $query
             * @param string $as
             * @param string $first
             * @param string|null $operator
             * @param string|null $second
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function rightJoinSub($query, $as, $first, $operator = null, $second = null)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->rightJoinSub($query, $as, $first, $operator, $second);
            }
         
            /**
             * Add a "cross join" clause to the query.
             *
             * @param string $table
             * @param string|null $first
             * @param string|null $operator
             * @param string|null $second
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function crossJoin($table, $first = null, $operator = null, $second = null)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->crossJoin($table, $first, $operator, $second);
            }
         
            /**
             * Merge an array of where clauses and bindings.
             *
             * @param array $wheres
             * @param array $bindings
             * @return void 
             * @static 
             */ 
            public static function mergeWheres($wheres, $bindings)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                $instance->mergeWheres($wheres, $bindings);
            }
         
            /**
             * Prepare the value and operator for a where clause.
             *
             * @param string $value
             * @param string $operator
             * @param bool $useDefault
             * @return array 
             * @throws \InvalidArgumentException
             * @static 
             */ 
            public static function prepareValueAndOperator($value, $operator, $useDefault = false)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->prepareValueAndOperator($value, $operator, $useDefault);
            }
         
            /**
             * Add a "where" clause comparing two columns to the query.
             *
             * @param string|array $first
             * @param string|null $operator
             * @param string|null $second
             * @param string|null $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereColumn($first, $operator = null, $second = null, $boolean = 'and')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->whereColumn($first, $operator, $second, $boolean);
            }
         
            /**
             * Add an "or where" clause comparing two columns to the query.
             *
             * @param string|array $first
             * @param string|null $operator
             * @param string|null $second
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereColumn($first, $operator = null, $second = null)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orWhereColumn($first, $operator, $second);
            }
         
            /**
             * Add a raw where clause to the query.
             *
             * @param string $sql
             * @param mixed $bindings
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function whereRaw($sql, $bindings = [], $boolean = 'and')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->whereRaw($sql, $bindings, $boolean);
            }
         
            /**
             * Add a raw or where clause to the query.
             *
             * @param string $sql
             * @param mixed $bindings
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereRaw($sql, $bindings = [])
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orWhereRaw($sql, $bindings);
            }
         
            /**
             * Add a "where in" clause to the query.
             *
             * @param string $column
             * @param mixed $values
             * @param string $boolean
             * @param bool $not
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function whereIn($column, $values, $boolean = 'and', $not = false)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->whereIn($column, $values, $boolean, $not);
            }
         
            /**
             * Add an "or where in" clause to the query.
             *
             * @param string $column
             * @param mixed $values
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereIn($column, $values)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orWhereIn($column, $values);
            }
         
            /**
             * Add a "where not in" clause to the query.
             *
             * @param string $column
             * @param mixed $values
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereNotIn($column, $values, $boolean = 'and')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->whereNotIn($column, $values, $boolean);
            }
         
            /**
             * Add an "or where not in" clause to the query.
             *
             * @param string $column
             * @param mixed $values
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereNotIn($column, $values)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orWhereNotIn($column, $values);
            }
         
            /**
             * Add a "where null" clause to the query.
             *
             * @param string $column
             * @param string $boolean
             * @param bool $not
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function whereNull($column, $boolean = 'and', $not = false)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->whereNull($column, $boolean, $not);
            }
         
            /**
             * Add an "or where null" clause to the query.
             *
             * @param string $column
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereNull($column)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orWhereNull($column);
            }
         
            /**
             * Add a "where not null" clause to the query.
             *
             * @param string $column
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereNotNull($column, $boolean = 'and')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->whereNotNull($column, $boolean);
            }
         
            /**
             * Add a where between statement to the query.
             *
             * @param string $column
             * @param array $values
             * @param string $boolean
             * @param bool $not
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function whereBetween($column, $values, $boolean = 'and', $not = false)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->whereBetween($column, $values, $boolean, $not);
            }
         
            /**
             * Add an or where between statement to the query.
             *
             * @param string $column
             * @param array $values
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereBetween($column, $values)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orWhereBetween($column, $values);
            }
         
            /**
             * Add a where not between statement to the query.
             *
             * @param string $column
             * @param array $values
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereNotBetween($column, $values, $boolean = 'and')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->whereNotBetween($column, $values, $boolean);
            }
         
            /**
             * Add an or where not between statement to the query.
             *
             * @param string $column
             * @param array $values
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereNotBetween($column, $values)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orWhereNotBetween($column, $values);
            }
         
            /**
             * Add an "or where not null" clause to the query.
             *
             * @param string $column
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereNotNull($column)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orWhereNotNull($column);
            }
         
            /**
             * Add a "where date" statement to the query.
             *
             * @param string $column
             * @param string $operator
             * @param mixed $value
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereDate($column, $operator, $value = null, $boolean = 'and')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->whereDate($column, $operator, $value, $boolean);
            }
         
            /**
             * Add an "or where date" statement to the query.
             *
             * @param string $column
             * @param string $operator
             * @param mixed $value
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereDate($column, $operator, $value = null)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orWhereDate($column, $operator, $value);
            }
         
            /**
             * Add a "where time" statement to the query.
             *
             * @param string $column
             * @param string $operator
             * @param mixed $value
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereTime($column, $operator, $value = null, $boolean = 'and')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->whereTime($column, $operator, $value, $boolean);
            }
         
            /**
             * Add an "or where time" statement to the query.
             *
             * @param string $column
             * @param string $operator
             * @param mixed $value
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereTime($column, $operator, $value = null)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orWhereTime($column, $operator, $value);
            }
         
            /**
             * Add a "where day" statement to the query.
             *
             * @param string $column
             * @param string $operator
             * @param mixed $value
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereDay($column, $operator, $value = null, $boolean = 'and')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->whereDay($column, $operator, $value, $boolean);
            }
         
            /**
             * Add an "or where day" statement to the query.
             *
             * @param string $column
             * @param string $operator
             * @param mixed $value
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereDay($column, $operator, $value = null)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orWhereDay($column, $operator, $value);
            }
         
            /**
             * Add a "where month" statement to the query.
             *
             * @param string $column
             * @param string $operator
             * @param mixed $value
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereMonth($column, $operator, $value = null, $boolean = 'and')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->whereMonth($column, $operator, $value, $boolean);
            }
         
            /**
             * Add an "or where month" statement to the query.
             *
             * @param string $column
             * @param string $operator
             * @param mixed $value
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereMonth($column, $operator, $value = null)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orWhereMonth($column, $operator, $value);
            }
         
            /**
             * Add a "where year" statement to the query.
             *
             * @param string $column
             * @param string $operator
             * @param mixed $value
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereYear($column, $operator, $value = null, $boolean = 'and')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->whereYear($column, $operator, $value, $boolean);
            }
         
            /**
             * Add an "or where year" statement to the query.
             *
             * @param string $column
             * @param string $operator
             * @param mixed $value
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereYear($column, $operator, $value = null)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orWhereYear($column, $operator, $value);
            }
         
            /**
             * Add a nested where statement to the query.
             *
             * @param \Closure $callback
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereNested($callback, $boolean = 'and')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->whereNested($callback, $boolean);
            }
         
            /**
             * Create a new query instance for nested where condition.
             *
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function forNestedWhere()
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->forNestedWhere();
            }
         
            /**
             * Add another query builder as a nested where to the query builder.
             *
             * @param \Illuminate\Database\Query\Builder|static $query
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function addNestedWhereQuery($query, $boolean = 'and')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->addNestedWhereQuery($query, $boolean);
            }
         
            /**
             * Add an exists clause to the query.
             *
             * @param \Closure $callback
             * @param string $boolean
             * @param bool $not
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function whereExists($callback, $boolean = 'and', $not = false)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->whereExists($callback, $boolean, $not);
            }
         
            /**
             * Add an or exists clause to the query.
             *
             * @param \Closure $callback
             * @param bool $not
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereExists($callback, $not = false)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orWhereExists($callback, $not);
            }
         
            /**
             * Add a where not exists clause to the query.
             *
             * @param \Closure $callback
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereNotExists($callback, $boolean = 'and')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->whereNotExists($callback, $boolean);
            }
         
            /**
             * Add a where not exists clause to the query.
             *
             * @param \Closure $callback
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereNotExists($callback)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orWhereNotExists($callback);
            }
         
            /**
             * Add an exists clause to the query.
             *
             * @param \Illuminate\Database\Query\Builder $query
             * @param string $boolean
             * @param bool $not
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function addWhereExistsQuery($query, $boolean = 'and', $not = false)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->addWhereExistsQuery($query, $boolean, $not);
            }
         
            /**
             * Adds a where condition using row values.
             *
             * @param array $columns
             * @param string $operator
             * @param array $values
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function whereRowValues($columns, $operator, $values, $boolean = 'and')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->whereRowValues($columns, $operator, $values, $boolean);
            }
         
            /**
             * Adds a or where condition using row values.
             *
             * @param array $columns
             * @param string $operator
             * @param array $values
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function orWhereRowValues($columns, $operator, $values)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orWhereRowValues($columns, $operator, $values);
            }
         
            /**
             * Add a "where JSON contains" clause to the query.
             *
             * @param string $column
             * @param mixed $value
             * @param string $boolean
             * @param bool $not
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function whereJsonContains($column, $value, $boolean = 'and', $not = false)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->whereJsonContains($column, $value, $boolean, $not);
            }
         
            /**
             * Add a "or where JSON contains" clause to the query.
             *
             * @param string $column
             * @param mixed $value
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function orWhereJsonContains($column, $value)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orWhereJsonContains($column, $value);
            }
         
            /**
             * Add a "where JSON not contains" clause to the query.
             *
             * @param string $column
             * @param mixed $value
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function whereJsonDoesntContain($column, $value, $boolean = 'and')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->whereJsonDoesntContain($column, $value, $boolean);
            }
         
            /**
             * Add a "or where JSON not contains" clause to the query.
             *
             * @param string $column
             * @param mixed $value
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function orWhereJsonDoesntContain($column, $value)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orWhereJsonDoesntContain($column, $value);
            }
         
            /**
             * Handles dynamic "where" clauses to the query.
             *
             * @param string $method
             * @param string $parameters
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function dynamicWhere($method, $parameters)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->dynamicWhere($method, $parameters);
            }
         
            /**
             * Add a "group by" clause to the query.
             *
             * @param array $groups
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function groupBy(...$groups)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->groupBy(...$groups);
            }
         
            /**
             * Add a "having" clause to the query.
             *
             * @param string $column
             * @param string|null $operator
             * @param string|null $value
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function having($column, $operator = null, $value = null, $boolean = 'and')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->having($column, $operator, $value, $boolean);
            }
         
            /**
             * Add a "or having" clause to the query.
             *
             * @param string $column
             * @param string|null $operator
             * @param string|null $value
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orHaving($column, $operator = null, $value = null)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orHaving($column, $operator, $value);
            }
         
            /**
             * Add a raw having clause to the query.
             *
             * @param string $sql
             * @param array $bindings
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function havingRaw($sql, $bindings = [], $boolean = 'and')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->havingRaw($sql, $bindings, $boolean);
            }
         
            /**
             * Add a raw or having clause to the query.
             *
             * @param string $sql
             * @param array $bindings
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orHavingRaw($sql, $bindings = [])
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orHavingRaw($sql, $bindings);
            }
         
            /**
             * Add an "order by" clause to the query.
             *
             * @param string $column
             * @param string $direction
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function orderBy($column, $direction = 'asc')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orderBy($column, $direction);
            }
         
            /**
             * Add a descending "order by" clause to the query.
             *
             * @param string $column
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function orderByDesc($column)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orderByDesc($column);
            }
         
            /**
             * Add an "order by" clause for a timestamp to the query.
             *
             * @param string $column
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function latest($column = 'created_at')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->latest($column);
            }
         
            /**
             * Add an "order by" clause for a timestamp to the query.
             *
             * @param string $column
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function oldest($column = 'created_at')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->oldest($column);
            }
         
            /**
             * Put the query's results in random order.
             *
             * @param string $seed
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function inRandomOrder($seed = '')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->inRandomOrder($seed);
            }
         
            /**
             * Add a raw "order by" clause to the query.
             *
             * @param string $sql
             * @param array $bindings
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function orderByRaw($sql, $bindings = [])
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->orderByRaw($sql, $bindings);
            }
         
            /**
             * Alias to set the "offset" value of the query.
             *
             * @param int $value
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function skip($value)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->skip($value);
            }
         
            /**
             * Set the "offset" value of the query.
             *
             * @param int $value
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function offset($value)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->offset($value);
            }
         
            /**
             * Alias to set the "limit" value of the query.
             *
             * @param int $value
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function take($value)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->take($value);
            }
         
            /**
             * Set the "limit" value of the query.
             *
             * @param int $value
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function limit($value)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->limit($value);
            }
         
            /**
             * Set the limit and offset for a given page.
             *
             * @param int $page
             * @param int $perPage
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function forPage($page, $perPage = 15)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->forPage($page, $perPage);
            }
         
            /**
             * Constrain the query to the next "page" of results after a given ID.
             *
             * @param int $perPage
             * @param int|null $lastId
             * @param string $column
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function forPageAfterId($perPage = 15, $lastId = 0, $column = 'id')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->forPageAfterId($perPage, $lastId, $column);
            }
         
            /**
             * Add a union statement to the query.
             *
             * @param \Illuminate\Database\Query\Builder|\Closure $query
             * @param bool $all
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function union($query, $all = false)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->union($query, $all);
            }
         
            /**
             * Add a union all statement to the query.
             *
             * @param \Illuminate\Database\Query\Builder|\Closure $query
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function unionAll($query)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->unionAll($query);
            }
         
            /**
             * Lock the selected rows in the table.
             *
             * @param string|bool $value
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function lock($value = true)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->lock($value);
            }
         
            /**
             * Lock the selected rows in the table for updating.
             *
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function lockForUpdate()
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->lockForUpdate();
            }
         
            /**
             * Share lock the selected rows in the table.
             *
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function sharedLock()
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->sharedLock();
            }
         
            /**
             * Get the SQL representation of the query.
             *
             * @return string 
             * @static 
             */ 
            public static function toSql()
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->toSql();
            }
         
            /**
             * Get the count of the total records for the paginator.
             *
             * @param array $columns
             * @return int 
             * @static 
             */ 
            public static function getCountForPagination($columns = [])
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->getCountForPagination($columns);
            }
         
            /**
             * Concatenate values of a given column as a string.
             *
             * @param string $column
             * @param string $glue
             * @return string 
             * @static 
             */ 
            public static function implode($column, $glue = '')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->implode($column, $glue);
            }
         
            /**
             * Determine if any rows exist for the current query.
             *
             * @return bool 
             * @static 
             */ 
            public static function exists()
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->exists();
            }
         
            /**
             * Determine if no rows exist for the current query.
             *
             * @return bool 
             * @static 
             */ 
            public static function doesntExist()
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->doesntExist();
            }
         
            /**
             * Retrieve the "count" result of the query.
             *
             * @param string $columns
             * @return int 
             * @static 
             */ 
            public static function count($columns = '*')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->count($columns);
            }
         
            /**
             * Retrieve the minimum value of a given column.
             *
             * @param string $column
             * @return mixed 
             * @static 
             */ 
            public static function min($column)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->min($column);
            }
         
            /**
             * Retrieve the maximum value of a given column.
             *
             * @param string $column
             * @return mixed 
             * @static 
             */ 
            public static function max($column)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->max($column);
            }
         
            /**
             * Retrieve the sum of the values of a given column.
             *
             * @param string $column
             * @return mixed 
             * @static 
             */ 
            public static function sum($column)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->sum($column);
            }
         
            /**
             * Retrieve the average of the values of a given column.
             *
             * @param string $column
             * @return mixed 
             * @static 
             */ 
            public static function avg($column)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->avg($column);
            }
         
            /**
             * Alias for the "avg" method.
             *
             * @param string $column
             * @return mixed 
             * @static 
             */ 
            public static function average($column)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->average($column);
            }
         
            /**
             * Execute an aggregate function on the database.
             *
             * @param string $function
             * @param array $columns
             * @return mixed 
             * @static 
             */ 
            public static function aggregate($function, $columns = [])
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->aggregate($function, $columns);
            }
         
            /**
             * Execute a numeric aggregate function on the database.
             *
             * @param string $function
             * @param array $columns
             * @return float|int 
             * @static 
             */ 
            public static function numericAggregate($function, $columns = [])
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->numericAggregate($function, $columns);
            }
         
            /**
             * Insert a new record into the database.
             *
             * @param array $values
             * @return bool 
             * @static 
             */ 
            public static function insert($values)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->insert($values);
            }
         
            /**
             * Insert a new record and get the value of the primary key.
             *
             * @param array $values
             * @param string|null $sequence
             * @return int 
             * @static 
             */ 
            public static function insertGetId($values, $sequence = null)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->insertGetId($values, $sequence);
            }
         
            /**
             * Insert or update a record matching the attributes, and fill it with values.
             *
             * @param array $attributes
             * @param array $values
             * @return bool 
             * @static 
             */ 
            public static function updateOrInsert($attributes, $values = [])
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->updateOrInsert($attributes, $values);
            }
         
            /**
             * Run a truncate statement on the table.
             *
             * @return void 
             * @static 
             */ 
            public static function truncate()
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                $instance->truncate();
            }
         
            /**
             * Create a raw database expression.
             *
             * @param mixed $value
             * @return \Illuminate\Database\Query\Expression 
             * @static 
             */ 
            public static function raw($value)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->raw($value);
            }
         
            /**
             * Get the current query value bindings in a flattened array.
             *
             * @return array 
             * @static 
             */ 
            public static function getBindings()
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->getBindings();
            }
         
            /**
             * Get the raw array of bindings.
             *
             * @return array 
             * @static 
             */ 
            public static function getRawBindings()
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->getRawBindings();
            }
         
            /**
             * Set the bindings on the query builder.
             *
             * @param array $bindings
             * @param string $type
             * @return \Illuminate\Database\Query\Builder 
             * @throws \InvalidArgumentException
             * @static 
             */ 
            public static function setBindings($bindings, $type = 'where')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->setBindings($bindings, $type);
            }
         
            /**
             * Add a binding to the query.
             *
             * @param mixed $value
             * @param string $type
             * @return \Illuminate\Database\Query\Builder 
             * @throws \InvalidArgumentException
             * @static 
             */ 
            public static function addBinding($value, $type = 'where')
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->addBinding($value, $type);
            }
         
            /**
             * Merge an array of bindings into our bindings.
             *
             * @param \Illuminate\Database\Query\Builder $query
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function mergeBindings($query)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->mergeBindings($query);
            }
         
            /**
             * Get the database query processor instance.
             *
             * @return \Illuminate\Database\Query\Processors\Processor 
             * @static 
             */ 
            public static function getProcessor()
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->getProcessor();
            }
         
            /**
             * Get the query grammar instance.
             *
             * @return \Illuminate\Database\Query\Grammars\Grammar 
             * @static 
             */ 
            public static function getGrammar()
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->getGrammar();
            }
         
            /**
             * Use the write pdo for query.
             *
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function useWritePdo()
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->useWritePdo();
            }
         
            /**
             * Clone the query without the given properties.
             *
             * @param array $properties
             * @return static 
             * @static 
             */ 
            public static function cloneWithout($properties)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->cloneWithout($properties);
            }
         
            /**
             * Clone the query without the given bindings.
             *
             * @param array $except
             * @return static 
             * @static 
             */ 
            public static function cloneWithoutBindings($except)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->cloneWithoutBindings($except);
            }
         
            /**
             * Register a custom macro.
             *
             * @param string $name
             * @param object|callable $macro
             * @return void 
             * @static 
             */ 
            public static function macro($name, $macro)
            {
                                \Illuminate\Database\Query\Builder::macro($name, $macro);
            }
         
            /**
             * Mix another object into the class.
             *
             * @param object $mixin
             * @return void 
             * @throws \ReflectionException
             * @static 
             */ 
            public static function mixin($mixin)
            {
                                \Illuminate\Database\Query\Builder::mixin($mixin);
            }
         
            /**
             * Checks if macro is registered.
             *
             * @param string $name
             * @return bool 
             * @static 
             */ 
            public static function hasMacro($name)
            {
                                return \Illuminate\Database\Query\Builder::hasMacro($name);
            }
         
            /**
             * Dynamically handle calls to the class.
             *
             * @param string $method
             * @param array $parameters
             * @return mixed 
             * @throws \BadMethodCallException
             * @static 
             */ 
            public static function macroCall($method, $parameters)
            {
                                /** @var \Illuminate\Database\Query\Builder $instance */
                                return $instance->macroCall($method, $parameters);
            }
        }

    class Event extends \Illuminate\Support\Facades\Event {}

    class File extends \Illuminate\Support\Facades\File {}

    class Gate extends \Illuminate\Support\Facades\Gate {}

    class Hash extends \Illuminate\Support\Facades\Hash {}

    class Lang extends \Illuminate\Support\Facades\Lang {}

    class Log extends \Illuminate\Support\Facades\Log {}

    class Mail extends \Illuminate\Support\Facades\Mail {}

    class Notification extends \Illuminate\Support\Facades\Notification {}

    class Password extends \Illuminate\Support\Facades\Password {}

    class Queue extends \Illuminate\Support\Facades\Queue {}

    class Redirect extends \Illuminate\Support\Facades\Redirect {}

    class Redis extends \Illuminate\Support\Facades\Redis {}

    class Request extends \Illuminate\Support\Facades\Request {}

    class Response extends \Illuminate\Support\Facades\Response {}

    class Route extends \Illuminate\Support\Facades\Route {}

    class Schema extends \Illuminate\Support\Facades\Schema {}

    class Session extends \Illuminate\Support\Facades\Session {}

    class Storage extends \Illuminate\Support\Facades\Storage {}

    class URL extends \Illuminate\Support\Facades\URL {}

    class Validator extends \Illuminate\Support\Facades\Validator {}

    class View extends \Illuminate\Support\Facades\View {}

    class Form extends \Collective\Html\FormFacade {}

    class Html extends \Collective\Html\HtmlFacade {}

    class LaravelLocalization extends \Mcamara\LaravelLocalization\Facades\LaravelLocalization {}

    class UserServer extends \App\Blueprint\Facades\UserServer {}

    class Image extends \Intervention\Image\Facades\Image {}

    class Zipper extends \Chumper\Zipper\Facades\Zipper {}

    class CreditCard extends \Inacho\CreditCard {}

    class Currency extends \Torann\Currency\Facades\Currency {}

    class GeoIP extends \Torann\GeoIP\Facades\GeoIP {}

    class PDF extends \Barryvdh\DomPDF\Facade {}

    class Excel extends \Maatwebsite\Excel\Facades\Excel {}

    class Debugbar extends \Barryvdh\Debugbar\Facade {}

    class Sentry extends \Sentry\Laravel\Facade {}

    class Mailchimp extends \NZTim\Mailchimp\MailchimpFacade {}
 
}




