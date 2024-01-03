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

use App\Blueprint\Interfaces\Theme\ThemeBasicAbstract;
use App\Blueprint\Interfaces\Theme\ThemeBasicInterface;
use App\Eloquents\Theme;
use Carbon\Carbon;
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @property string mainAsset
 * @property string trash
 * @property string temp
 */
class ThemeServices
{
    protected $themes = [];

    protected $assetsUrl;

    protected $interfaces;

    protected $themeRegistry;

    protected $errorMessages = [
        '404' => 'The specified file does not exists !',
        '500' => 'The theme is not well built !',
    ];

    protected $themeRootPath;

    /**
     * ThemeServices constructor.
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * Theme initialization
     *
     * @return void
     */
    function init()
    {
        $this->interfaces = $this->setInterfaces();
        $this->mainAsset = env('APP_URL') . '/Components/Assets';
        $this->trash = 'trash' . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR;
        $this->themeRootPath = app_path('Components/Themes');
        $this->temp = 'app/themeTemp/';
    }

    /**
     * Set Interfaces
     * @return array
     */
    function setInterfaces()
    {
        return [
            ThemeBasicInterface::class,
        ];
    }

    /**
     * @param ThemeBasicAbstract $instance
     * @return ThemeBasicAbstract|mixed
     */
    function initializeInstance(ThemeBasicAbstract $instance)
    {
        return tap($instance, function ($instance) {
            $folder = $instance->registry['path'];
            $slug = $instance->registry['slug'];
            $parentUrl = env('APP_URL') . '/Components/Themes/' . basename($folder);
            //Cache::flush('themeLinked');
            Cache::rememberForever('themeLinked', function () use ($instance) {
                return $this->performLinking($instance);
            });
            /** @var ThemeBasicAbstract $instance */
            $instance->setAssetsPath(asset("themes/assets/$slug/"));
            $instance->setCssPath(asset("themes/assets/$slug/Css"));
            $instance->setTemplatePath($parentUrl . '/Templates/');
            $instance->setThemeId($themeId = $instance->getRegistry()['id']);
            $instance->setModel(Theme::find($themeId));

            if ($this->isActive($instance->themeId)) {
                // calling hooks and boot methods
                if (method_exists($instance, 'hooks')) app()->call([$instance, 'hooks']);
                if (method_exists($instance, 'bootMethods')) app()->call([$instance, 'bootMethods']);
                // adding routes
                Route::middleware(['web', 'auth', 'CustomMiddlewares', 'Routeserver'])
                    ->namespace((new \ReflectionClass($instance))->getNamespaceName() . '\Controllers')
                    ->group(function () use ($instance) {
                        //app()->call([$instance, 'setRoutes']);
                    });
            }
        });
    }

    /**
     * @param ThemeBasicAbstract $theme
     * @return string
     */
    function performLinking(ThemeBasicAbstract $theme)
    {
        extract($theme->getRegistry());

        if (!is_link($link = public_path("themes/assets/$slug")))
            app('files')->link("$path/Assets", $link);

        return $link;
    }

    /**
     * check theme is active or not
     *
     * @param $param
     * @return bool status of theme
     */
    function isActive($param)
    {
        if (!$param) return false;

        $needle = is_int($param) ? 'id' : 'slug';

        return Theme::where([$needle => $param, 'active' => true])->exists();
    }

    /**
     * Get Active Theme
     *
     * @param null $slug
     * @return string|bool
     */
    function getThemeTemplatePath($slug = null)
    {
        if (isset($this->themeRegistry[$slug]['path'])) return $this->themeRegistry[$slug]['path'] . '/Templates';

        return false;
    }

    /**
     * Get Active Theme
     *
     * @return array Active theme information
     */
    function getActiveThemeParent()
    {
        return $this->getActiveTheme()->getRegistry(true)->get('extends');
    }

    /**
     * Get Active Theme
     *
     * @return bool|ThemeBasicAbstract
     */
    function getActiveTheme()
    {
        return $this->getThemeBySlug(request()->old('theme', Theme::activeTheme()->slug));
    }

    /**
     * Get theme by ID
     *
     * @param $slug
     * @return bool|\Illuminate\Support\Collection
     * @internal param int $id theme id
     */
    function getThemeBySlug($slug)
    {
        return $this->getThemes(true)->get(Str::lower($slug));
    }

    /**
     * Get Available Themes
     * @param bool $collection
     * @return array|Collection
     */
    function getThemes($collection = false)
    {
        $themes = [];

        foreach ($this->getThemeRegistry() as $registry)
            $themes[$registry['slug']] = app($registry['handle'])->setRegistry($registry);

        return $collection ? collect($themes) : $themes;
    }

    /**
     * @param array $themes
     * @return mixed
     */
    function setThemes($themes = [])
    {
        //$this->flushCache();

        $themes = $themes ?: Cache::get('ThemeRegistry', []);

        if ($themes) return tap($this, function ($service) use ($themes) {
            /** @var ThemeServices $service */
            $service->themeRegistry = $themes;
        });

        iterateThemes(function ($handle, $slug, $folder) use (&$themes) {
            /** @var ThemeBasicAbstract $instance */
            $instance = app($handle);
            $registry = $instance->getRegistry();

            if (!$this->checkImplementation($instance)) return;
            // Starts setting registry
            $themeName = isset($registry['name']) ? $registry['name'] : $slug;
            $themes[$slug = Str::lower($slug)] = array_merge($registry, [
                'active' => $this->isActive($slug) ? true : false,
                'id' => $this->installed($slug),
                'handle' => $handle,
                'name' => $themeName,
                'slug' => $slug,
                'path' => $folder,
            ]);
        }, $this);

        $this->themeRegistry = tap($themes, function ($registry) {
            Cache::put('ThemeRegistry', $registry, Carbon::Today()->addWeeks(2));
        });

        return $this;
    }

    /**
     * @param bool $collection
     * @return Collection
     */
    public function getThemeRegistry($collection = false)
    {
        return !$collection ? $this->themeRegistry : collect($this->themeRegistry);
    }

    /**
     * flush theme registry cache
     *
     * @return void status of flush
     */
    function flushCache()
    {
        Cache::forget('ThemeRegistry');
    }

    /**
     * Check theme interface Implementation
     *
     * @param object $instance theme instance
     * @return bool status of check
     * @internal param string $pool pool of theme
     */
    function checkImplementation($instance)
    {
        foreach ($this->interfaces as $interface)
            if (!($instance instanceof $interface)) return false;

        return true;
    }

    /**
     * check theme already installed or not
     *
     * @param $param
     * @return bool
     */
    function installed($param)
    {
        $needle = is_int($param) ? 'id' : 'slug';
        $status = Theme::where($needle, $param)->first();

        return $status ? $status->id : false;
    }

    /**
     * Get Active Theme
     *
     * @return string
     */
    function getActiveTemplateUrl()
    {
        return $this->getActiveThemeUrl() . '/Templates/Admin/';
    }

    /**
     * Get Active Theme
     *
     * @return string
     */
    function getActiveThemeUrl()
    {
        return env('APP_URL') . '/Components/Themes/' . $this->getActiveTheme()->getRegistry(true)->get('slug');
    }

    /**
     * call a theme function
     *
     * @param integer|string $slugOrId theme slug or id
     * @param bool $method
     * @param array $args
     * @return bool|mixed|ThemeBasicAbstract
     */
    function callTheme($slugOrId, $method = false, $args = [])
    {
        $theme = $this->getTheme($slugOrId);

        return $method ? app()->call([$theme, $method], $args) : $theme;
    }

    /**
     * Get theme details
     *
     * @param $param
     * @return model|bool|ThemeBasicAbstract
     */
    function getTheme($param)
    {
        switch (gettype($param)) {
            case 'integer':
                return $this->getThemeById($param);
                break;

            case 'array':
            case 'string':
                return $this->getThemeBySlug($param);
                break;

            default:
                return false;
                break;
        }
    }

    /**
     * Get theme by ID
     *
     * @param $id
     * @return array|bool|ThemeBasicAbstract
     */
    function getThemeById($id)
    {
        $theme = Theme::find($id);

        if (!$theme) return false;

        $slug = $theme->slug;

        return $this->getThemeBySlug($slug);
    }

    /**
     * Helps to render the blade files by auto locating through available themes with default theme as fallback
     *
     * @param string $path blade file path
     * @param string $args optional view arguments
     * @return View Rendered view
     */
    public function draw($path, $args = null)
    {
        view()->addLocation($this->getActiveThemePath());

        return view($path);
    }

    /**
     * Get Active Theme
     *
     * @return array Active theme information
     */
    function getActiveThemePath()
    {
        return $this->getActiveTheme()->getRegistry(true)->get('path');
    }

    /**
     * Helps to render the blade files by auto locating through available themes with default theme as fallback
     *
     * @return array
     */
    public function themeViewPaths()
    {
        return [$this->getActiveThemeTemplatePath(), resource_path('views')];
    }

    /**
     * Get Active Theme
     *
     * @return string
     */
    function getActiveThemeTemplatePath()
    {
        return $this->getActiveTheme()->getRegistry()['path'] . DIRECTORY_SEPARATOR . 'Templates';
    }

    /**
     * Helps to render the blade files by auto locating through available themes with default theme as fallback
     *
     * @param null $args
     * @return String Current theme template path
     */
    public function templatePath($args = null)
    {
        return $this->getActiveThemeTemplatePath() . DIRECTORY_SEPARATOR . $args;
    }

    /**
     * Helps to render the blade files by auto locating through available themes with default theme as fallback
     *
     * @return string
     */
    public function assetsPath()
    {
        return $this->getActiveThemeAssetPath();
    }

    /**
     * Get Active Theme
     *
     * @return string
     */
    function getActiveThemeAssetPath()
    {
        return $this->getActiveTheme()->getRegistry(true)->get('path') . DIRECTORY_SEPARATOR . 'Assets';
    }

    /**
     * Helps to render the blade files by auto locating through available themes with default theme as fallback
     *
     * @param $args
     * @return String Current theme assets path
     */

    public function assetsUrl($args)
    {
        return $this->mainAsset . '/' . $args;
    }

    /**
     * Helps to render the blade files by auto locating through available themes with default theme as fallback
     *
     * @param $args
     * @return String Current theme assets path
     */
    public function themeAssetsUrl($args)
    {
        return $this->getActiveAssetUrl() . '/' . $args;
    }

    /**
     * Get Active Theme
     *
     * @return string
     */
    function getActiveAssetUrl()
    {
        return $this->getActiveTheme()->getAssetsPath();
    }

    /**
     * Helps to render the blade files by auto locating through available themes with default theme as fallback
     *
     * @param $args
     * @return String Current theme assets path
     */
    public function layoutUrl($args)
    {
        return $this->assetsUrl . '/layouts/' . $this->getActiveLayout() . '/' . $args;
    }

    /**
     * Get Active Theme
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    function getActiveLayout()
    {
        return \Request::old('layout') ?: Theme::activeLayout();
    }

    /**
     * Check integrity of a theme
     *
     * @param request $request request object
     * @return array|string
     */
    function checkIntegrity(Request $request)
    {
        $themeKey = $request->input('key');

        if (!Storage::exists($themeKey)) return ['status' => false, 'error' => $this->errorMessages['404']];

        try {
            $filesIndex = Zipper::make(storage_path('app/' . $themeKey))->listFiles();
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'error' => $e->getMessage()]);
        }

        if (!$filesIndex || !isset($filesIndex[0])) return ['status' => false, 'error' => $this->errorMessages['500']];

        $mainFolder = explode('/', $filesIndex[0])[0];
        $indexRegex = '/(' . $mainFolder . ')\/\1Index\.php/';
        $registryRegex = '/(' . $mainFolder . ')\/ThemeRegistry\.php/';
        $indexExists = false;
        $registryExists = false;

        foreach ($filesIndex as $key => $value) {
            if (preg_match($indexRegex, $value)) $indexExists = true;
            if (preg_match($registryRegex, $value)) $registryExists = true;
        }

        if ($indexExists && $registryExists) {
            session()->flash('themeInstallationData', ['key' => $themeKey, 'slug' => $mainFolder]);

            return response()->json(['status' => true]);
        }

        return response()->json(['status' => false, 'error' => $this->errorMessages['500']], 422);
    }

    /**
     * Process ModuleArchive
     *
     * @param $install
     * @return array|bool
     * @throws \Exception
     */
    function processThemeArchive($install)
    {
        $themeData = session('themeInstallationData');

        Zipper::make(storage_path('app/' . $themeData['key']))
            ->extractTo($this->themeRootPath);

        $this->flushCache();

        if ($install) $this->install($themeData['slug']);

        return ['status' => true];
    }

    /**
     * Install a theme
     *
     * @param array $params theme params
     * @return array|bool
     * @throws \Exception
     */
    function install($params)
    {
        /** @var ThemeBasicAbstract $theme */
        $theme = $this->getTheme($params);

        if ($this->installed($theme->registry['slug'])) return false;

        $this->uninstall($params, false);

        $args = [
            'slug' => $theme->registry['slug'],
            'name' => $theme->registry['name'],
            'installed' => true,
            'active' => false,
        ];

        $theme->install();

        $this->flushCache();

        return ['themeId' => Theme::create($args)->id];
    }

    /**
     * Uninstall a theme
     *
     * @param $params
     * @param bool $delete
     * @return array|bool
     * @throws \Exception
     */
    function uninstall($params, $delete = true)
    {
        /** @var ThemeBasicAbstract $theme */
        $theme = $this->getTheme($params);

        if (!$theme) return false;

        $theme->uninstall();

        if ($delete) true ? $this->trash($theme) : File::deleteDirectory('');

        if ($theme->getModel()) $theme->getModel()->delete();

        $this->flushCache();

        return ['status' => true];
    }

    /**
     * trash theme
     * @param ThemeBasicAbstract $theme
     * @return bool
     */
    function trash(ThemeBasicAbstract $theme)
    {
        $folder = $theme->registry['path'];
        $target = $theme->trash . basename($folder);

        File::copyDirectory($folder, storage_path($target));
        File::deleteDirectory($folder);

        return true;
    }

    /**
     * Helps to render the blade files by auto locating through available themes with default theme as fallback
     *
     * @param null $args
     * @return String Current theme root path
     */
    public function themePath($args = null)
    {
        return $this->getActiveThemePath() . DIRECTORY_SEPARATOR . $args;
    }

    /**
     * activate a theme
     *
     * @param $id
     * @return array
     */
    function activate($id)
    {
        if ($theme = $this->getTheme($id)) $theme->deactivate();

        $this->flushCache();

        return ['status' => true];
    }

    /**
     * deactivate a theme
     *
     * @param $id
     * @return array
     */
    function deactivate($id)
    {
        if ($theme = $this->getTheme($id)) $theme->activate();

        $this->flushCache();

        return ['status' => true];
    }
}
