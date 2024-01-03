<?php
/**
 * Created by PhpStorm.
 * User: Muhammed Fayis
 * Date: 10/4/2018
 * Time: 10:04 AM
 */

namespace App\Http\Controllers\Admin\Utils;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;


/**
 * Class CacheController
 * @package App\Http\Controllers\Admin\Tools
 */
class OptimizerController extends Controller
{
    protected $cacheTargets = ['views', 'logs', 'sessions', 'cache'];

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function cache(Request $request)
    {
        $options = array_merge([], $request->input('options', [
            'as' => 'MB',
            'expire' => Carbon::now()->addMinutes(10)
        ]));
        $destinations = [
            'logs' => 'logs',
            'cache' => "framework/cache",
            'views' => 'framework/views',
            'sessions' => 'framework/sessions'
        ];
        $data = [
            'options' => $options,
            'scripts' => [
            ]
        ];

        foreach ($destinations as $destination => $path)
            $data['graph'][] = [
                'name' => $destination,
                'y' => (float)Cache::remember("cacheSize-$destination", $options['expire'], function () use ($path) {
                    return directoryInfo(storage_path($path));
                })];

        return view('Admin.Tools.Optimizers.cache', $data);
    }

    /**
     * @param Request $request
     * @param array $targets
     */
    function clearCache(Request $request, $targets = [])
    {
        $cacheRepos = $targets ?: array_filter($request->input('target'), function ($value) {
            return in_array($value, $this->cacheTargets);
        });

        foreach ($cacheRepos as $cacheRepo)
            switch ($cacheRepo) {
                case 'views':
                    Artisan::call('view:clear');
                    break;
                case 'cache':
                    Artisan::call('cache:clear');
                    break;
                case 'logs':
                    $file = new Filesystem();
                    $file->cleanDirectory(storage_path('logs'));
                    break;
            }

        $this->refreshCache($request);
    }

    /**
     * @param Request $request
     * @param array $targets
     */
    function refreshCache(Request $request, $targets = [])
    {
        $cacheRepos = $targets ?: array_filter($request->input('target'), function ($value) {
            return in_array($value, $this->cacheTargets);
        });

        foreach ($cacheRepos as $cacheRepo)
            Cache::forget("cacheSize-$cacheRepo");
    }
}
