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

use App\Eloquents\Bookmark;
use App\Eloquents\BookmarkType;
use App\Eloquents\EasyRoute;
use App\Eloquents\LeftMenu;
use App\Eloquents\TopMenu;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Throwable;

/**
 * Class MenuFactory
 * @package App\Components\Core\Services
 */
class MenuServices
{
    static $activeLeftMenu;

    public static $dynamicMenus = [];

    public static $dynamicMenusCacheName;

    protected $leftMenus;

    /**
     * @var $leftMenuCache \Illuminate\Database\Eloquent\Collection
     */
    protected $leftMenuCache;

    protected $allowedFields = [
        'id', 'label', 'link', 'icon_image', 'icon_font', 'sort_order', 'parent_id', 'route', 'description', 'routeParams', 'slug'
    ];

    /**
     * @return mixed
     */
    public static function getActiveLeftMenu()
    {
        return self::$activeLeftMenu;
    }

    /**
     * @param mixed $activeLeftMenu
     * @return bool
     */
    public static function setActiveLeftMenu($activeLeftMenu)
    {
        self::$activeLeftMenu = $activeLeftMenu;

        return true;
    }

    /**
     *
     */
    function prepareHierarchicalMenus()
    {
        $this->setDBCache()->setLeftMenus($this->hierarchicalLeftMenus());
    }

    /**
     * @return MenuServices
     */
    function setDBCache()
    {
//        Cache::forget('leftMenuCache');

        if (Schema::hasTable((new LeftMenu)->getTable())) {
            $this->leftMenuCache = Cache::remember('leftMenuCache', Carbon::Today()->addWeeks(2), static function () {
                return defineFilter('leftMenus', LeftMenu::get());
            });
        }

        return $this;
    }

    /**
     * Adds left menus to leftMenu property
     *
     * @param int $parent_id
     * @param bool $noCache
     * @return array|void
     */
    function hierarchicalLeftMenus($parent_id = 0, $noCache = false)
    {
//        Cache::forget('hierarchicalLeftMenus');
        if (!$leftMenus = $this->getLeftMenuCache()) {
            return;
        }

        if ($noCache || !Cache::has('hierarchicalLeftMenus')) {
            $dispatch = [];
            $menus = $leftMenus->where('parent_id', $parent_id)
                ->sortBy('sort_order');

            foreach ($menus as $menu) /** @var Model $menu */ {
                $dispatch[] = $menu->setAttribute('child', ($menu->dynamic ? [] : $this->hierarchicalLeftMenus($menu['id'], true)));
            }

            return tap($dispatch, static function ($data) use ($noCache) {
                if (!$noCache) {
                    Cache::put('hierarchicalLeftMenus', $data, Carbon::Today()->addWeeks(2));
                }
            });
        }

        return Cache::get('hierarchicalLeftMenus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLeftMenuCache()
    {
        return $this->leftMenuCache;
    }

    /**
     * get All left menus
     *
     * @param string $type
     * @param array $filter
     * @return mixed
     */
    function getAllMenus($type = 'left', $filter = [])
    {
        /** @var Model $eloquent */
        $eloquent = ($type === 'left') ? (new LeftMenu) : (new TopMenu);

        return $eloquent->newQuery()->when($filter, static function ($query) use ($filter) {
            /** @var Builder $query */
            $query->whereIn('id', $filter);
        })->get()->map(function ($value, $key) {
            return $this->getMenu($value->id);
        });
    }

    /**
     * Get single menu
     *
     * @param $id
     * @param string $type
     * @return bool|Model
     * @throws \Illuminate\Routing\Exceptions\UrlGenerationException
     */
    function getMenu($id, $type = 'left')
    {

        $eloquent = $type === 'left' ? LeftMenu::class : TopMenu::class;
        $dispatch = $id instanceof Model ? $id : (!(int)($id) ? $eloquent::where('slug', $id)->first() : $eloquent::find($id));

        if (!$dispatch) return false;

        $dispatch->href = $this->resolveMenuLink($dispatch);
        $dispatch->ico = $dispatch->icon_image ?: $dispatch->icon_font;

        return $dispatch;
    }

    /**
     * @param $menu
     * @return string
     * @throws \Illuminate\Routing\Exceptions\UrlGenerationException
     */
    function resolveMenuLink(Model $menu)
    {
        if ($menu->dynamic && ($routeName = $menu->route_name)) {
            $params = [];

            if (preg_match('/(.+):\w+=\w+.*/i', $routeName, $matches)) {
                if (preg_match_all('/(\w+=\w+)/mi', $routeName, $params)) {
                    $routeName = $matches[1];
                    $params = collect($params[1])->mapWithKeys(function ($value) {
                        if (($exploded = explode('=', $value)) && (count($exploded) > 1))
                            return [$exploded[0] => $exploded[1]];
                    })->all();
                }
            }

            return route($routeName, $params);
        } else
            return $menu['link'] ?: EasyRouteServices::routeToUri($menu['route'], $menu['routeParams']);
    }

    /**
     * Render left menu html using left menu db entries
     *
     * @param array $menus menus to be used if passed else all available menus will be rendered
     * @return void
     * @throws Throwable
     */
    function renderLeftMenu($menus = [])
    {
        $scope = getScope();

        $menus = $menus ?: $this->getLeftMenus();

        foreach (collect($menus)->sortBy('sort_order') as $key => $menu) {
            $menu = defineFilter('filterLeftMenu', $menu);

            if ($menu) {
                try {
                    echo view(ucfirst($scope) . '.Layout.Partials.subMenu', [
                        'menu' => $menu,
                        'key' => $key,
                        'href' => $this->resolveMenuLink($menu),
                        'label' => $menu->getLabel(),
                        'bookmarked' => $this->isBookmarked($menu),
                        'isCurrent' => $this->isCurrentRoute($menu)
                    ])->render();
                } catch (Exception $exception) {
                    throw $exception;
                }
            }
        }
    }

    function renderLeftMenufrontend($menus = [])
    {
        $scope = getScope();

        $menus = $menus ?: $this->getLeftMenus();

        foreach (collect($menus)->sortBy('sort_order') as $key => $menu) {
            $menu = defineFilter('filterLeftMenu', $menu);

            if ($menu) {
                try {
                    echo view(ucfirst($scope) . '.Layout.Partials.subMenu', [
                        'menu' => $menu,
                        'key' => $key,
                        'href' => $this->resolveMenuLink($menu),
                        'label' => $menu->getLabel(),
                        'bookmarked' => $this->isBookmarked($menu),
                        'isCurrent' => $this->isCurrentRoute($menu)
                    ])->render();
                } catch (Exception $exception) {
                    throw $exception;
                }
            }
        }
    }

    /**
     * get All left menus
     *
     * @return array
     */
    function getLeftMenus()
    {
        return collect($this->leftMenus)->all();
    }

    /**
     * @param mixed $leftMenus
     * @return MenuServices
     */
    public function setLeftMenus($leftMenus)
    {
        $this->leftMenus = $leftMenus;

        return $this;
    }

    /**
     * @param Model $menu
     * @return Bookmark|Model|null
     * @throws \ReflectionException
     */
    function isBookmarked(Model $menu)
    {
        return (new Bookmark)
            ->where('type', $this->resolveBookmarkType((new \ReflectionClass($menu))
                ->getShortName()))
            ->where('entity_id', $menu->id)
            ->where('user_id', loggedId())
            ->first();
    }

    /**
     * @param $slug
     * @return BookmarkType|Model|null
     */
    function resolveBookmarkType($slug)
    {
        return ($bookmark = BookmarkType::where('slug', $slug)->first()) ? $bookmark->id : '';
    }

    /**
     * @param Model $menu
     * @return bool
     * @throws Exception
     */
    function isCurrentRoute(Model $menu)
    {
        /** @var EasyRouteServices $easyRoute */
        $easyRoute = app(EasyRouteServices::class);
        $menu = $menu->dynamic ? $this->resolveDynamicMenu($menu->getKey()) : $menu;

        if ($routeId = $menu->route) {
            if ($easyRoute->idToName($routeId) == Route::current()->getName())
                return static::setActiveLeftMenu(true);
            else if ($easyRoute->idToUri($routeId) == Route::current()->uri)
                return static::setActiveLeftMenu(true);
        } else if (Str::contains(URL::current(), preg_replace('|https?\:\/\/|i', '', $this->resolveMenuLink($menu))))
            return true;
        else
            return false;

        return false;
    }

    /**
     * @param array $menus
     * @return bool|string|view
     * @throws Throwable
     */
    function listLeftMenu($menus = [])
    {
        if (!$this->getLeftMenus())
            return response('Sorry there are no menus on database!')->getContent();

        $menus = $menus ?: $this->getLeftMenus();
        $output = '';

        foreach ($menus as $key => $menu) {
            if ($menu->dynamic) continue;

            $output .= view('Admin.Layout.Partials.menuList', [
                'menu' => $menu,
                'routes' => EasyRoute::all(),
                'key' => $key,
                'label' => $menu->getLabel()
            ])->render();
        }

        return $output;
    }

    /**
     * save left menus
     *
     * @param string $type
     * @param $menu
     * @return bool|string
     */
    function update($type, $menu)
    {
        $eloquent = (Str::lower($type) == 'leftmenu') ? LeftMenu::class : TopMenu::class;

        return DB::transaction(function () use ($type, $eloquent, $menu) {
            if (!isset($menu['id'])) return false;

            $eloquent::find($menu['id'])->update(defineFilter('beforeMenuSaved', $this->getFormattedData($menu)->all(), 'root', ['type' => $type, 'context' => 'update']));
            //Define an action hook after menu has been saved
            defineAction('afterMenuSaved', 'root', ['type' => $type, 'menu' => $eloquent::find($menu['id']), 'context' => 'update', 'privilegeGroups' => isset($menu['privilegedUserType']) ? $menu['privilegedUserType'] : []]);

            if (isset($menu['children']) && ($children = $menu['children']))
                foreach ($children as $key => $child)
                    $this->update($type, array_merge($child, $this->getFormattedData(array_merge($child, ['sort_order' => $key]))->all()));

            Cache::forget('hierarchicalLeftMenus');
            Cache::forget('leftMenuCache');

            return true;
        });
    }

    /**
     * @param $data
     * @param string $operation
     * @return Collection
     */
    function getFormattedData($data, $operation = 'insert')
    {
        return app()->call([$this, 'formatData'], ['data' => $data, 'operation' => $operation]);
    }

    /**
     * Format Data so that it can be processed safely
     *
     * @param array $data data
     * @param string $operation
     * @param EasyRouteServices $easyRouteServices
     * @param string $eloquent
     * @return array  formatted data
     */
    function formatData($data = [], $operation, EasyRouteServices $easyRouteServices, $eloquent = LeftMenu::class)
    {
        $data = collect($data);

        /** @var Builder $siblings */
        $lastSortId = $eloquent::where('parent_id', (int)$data->get('parent_id', 0))->max('sort_order');

        if (!$data->has('sort_order')) $data->put('sort_order', $lastSortId);

        if ($operation == 'insert') $data->put('slug', $this->slugify($data));

        return $data->only($this->allowedFields)->mapWithKeys(function ($value, $key) use ($easyRouteServices, $data) {
            switch ($key) {
                case 'parent_id':
                    return [$key => (int)$value];
                default:
                    return [$key => $value];
                    break;
            }
        });
    }

    /**
     * @param $menu
     * @return null|string|string[]
     */
    function slugify($menu)
    {
        return preg_replace('|[\s+%#]|i', '_', Str::slug($menu->get('label')[currentLocal()]));
    }

    /**
     * Insert a menu
     *
     * @param $type
     * @param $data
     * @return array
     */
    function insert($type, $data)
    {
        return DB::transaction(function () use ($data, $type) {
            $eloquent = ($type == 'leftmenu') ? LeftMenu::class : TopMenu::class;
            $menu = $eloquent::create(defineFilter('beforeMenuSaved', $this->getFormattedData($data[$type], 'insert')->all(), 'root', ['type' => $type, 'context' => 'insert']));
            //Define an action hook after menu has been saved
            defineAction('afterMenuSaved', 'root', ['type' => $type, 'menu' => $menu, 'context' => 'update', 'privilegeGroups' => isset($data[$type]['privilegedUserType']) ? $data[$type]['privilegedUserType'] : []]);
            //Here we refresh menu cache to reflect the changes
            Cache::forget('hierarchicalLeftMenus');
            Cache::forget('leftMenuCache');

            return ['status' => 'success'];
        });
    }

    /**
     * Delete Menu
     *
     * @param string $type
     * @param $id
     * @return string
     */
    function delete($type = 'left', $id)
    {
        try {
            $eloquent = ($type == 'left') ? LeftMenu::class : TopMenu::class;
            $eloquent::find($id)->delete();
            Cache::forget('hierarchicalLeftMenus');
            Cache::forget('leftMenuCache');
            return json_encode(['status' => true]);
        } catch (Exception $e) {
            return json_encode(['status' => false, 'error' => $e->getMessage()]);
        }
    }

    /**
     * @param array $rawData
     * @param null $contextObject
     * @param string $menuClass
     * @return mixed
     * @throws Exception
     */
    function menusFromRaw($rawData = [], $contextObject = null, $menuClass = LeftMenu::class)
    {
        /** @var Model $model */
        $model = new $menuClass;

        return $model->hydrate(static::setToDynamicMenus($rawData, $menuClass, $contextObject));
    }

    /**
     * @param array $rawData
     * @param string $menu
     * @param $contextObject
     * @return mixed
     * @throws Exception
     */
    public static function setToDynamicMenus($rawData = [], $menu, $contextObject)
    {
        $contextClass = get_class($contextObject ?: new static());
        $rawData = isNumericArray($rawData) ? $rawData : [$rawData];
        $dispatch = [];

        foreach ($rawData as $datum) {
            $datum = is_array($datum) ? collect($datum) : $datum;
            $slug = "$menu:$contextClass";
            $place = cache("dynamicMenus::$slug", []);
            $index = $place ? (int)max(array_keys($place)) + 1 : 0;
            $datum['entity_id'] = "$slug|$index";
            //$datum['label'] = is_array($label = $datum->get('label')) ? json_encode($label, '') : $label;
            $datum['dynamic'] = true;
            $datum['route'] = isset($datum['route_name']) ? EasyRouteServices::nameToId(explode(':', $datum['route_name'])[0]) : '';
            $parent = (new static)->getMenu($datum->get('parent_id'));
            $datum['parent_id'] = $parent ? $parent->id : 0;
            $place[$index] = $dispatch[] = $datum->all();
            cache(["dynamicMenus::$slug" => $place], Carbon::Today()->addWeeks(2));
        }

        return $dispatch;
    }

    /**
     * @param $id
     * @return bool|LeftMenu|Model
     * @throws Exception
     */
    function resolveDynamicMenu($id)
    {
        if (!$matches = static::verifyDynamicId($id)) return false;

        $repos = cache("dynamicMenus::$matches[1]", []);

        return $this->getMenu(new $matches[2](collect($repos)->get($matches[4], [])));
    }

    /**
     * @param $id
     * @return bool|false|int
     */
    static function verifyDynamicId($id)
    {
        if (preg_match('/(([\w\\\\]+):([\w\\\\]+))\s*\|(\d+)/i', $id, $matches))
            return $matches;
        else
            return false;
    }
}
