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

use App\Eloquents\CronHistory;
use App\Eloquents\CronJob;
use Closure;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;


/**
 * Class BookmarkServices
 * @package App\Blueprint\Services
 */
class CronServices
{
    public static $cronJobs = [];

    /**
     * @param $name
     * @param Closure $action
     * @param $params
     * @return CronServices
     */
    static function registerCron($name, $action, $params = [])
    {
        static::$cronJobs[Str::slug($name)] = [
            'name' => $name,
            'action' => $action,
            'params' => $params,
        ];

        return new static();
    }

    /**
     * @param $slug
     * @return bool|mixed
     */
    static function runJob($slug)
    {
        if (!$job = static::getJobBySlug($slug)) return false;

        if (($action = $job['action']) instanceof Closure)
            app()->call($action, $job['params']);

        if (is_array($action)) {
            list($class, $method) = $action;
            app()->call([$class, $method], $job['params']);
        }

        return true;
    }

    /**
     * @param $slug
     * @return array
     */
    static function getJobBySlug($slug)
    {
        return static::getRegisteredJobs()->get($slug);
    }

    /**
     * @param bool $returnCollection
     * @return array|Collection
     */
    static function getRegisteredJobs($returnCollection = true)
    {
        return $returnCollection ? collect(static::$cronJobs) : static::$cronJobs;
    }

    /**
     * @param $data
     * @return $this|Model
     * @throws \Illuminate\Routing\Exceptions\UrlGenerationException
     */
    function addCron($data)
    {
        if ($data->get('route'))
            $url = EasyRouteServices::routeToUri($data->get('route'));
        else
            $url = $data->get('url');

        return CronJob::create([
            'minute' => $data->get('minute'),
            'hour' => $data->get('hour'),
            'day' => $data->get('day'),
            'month' => $data->get('month'),
            'weekday' => $data->get('weekday'),
            'url' => $url,
            'task' => $data->get('task'),
            'status' => $data->get('status'),
        ]);
    }

    /**
     * @param $data
     * @return bool
     * @throws \Illuminate\Routing\Exceptions\UrlGenerationException
     */
    function updateCron($data)
    {
        if ($data->get('route'))
            $url = EasyRouteServices::routeToUri($data->get('route'));
        else
            $url = $data->get('url');

        return CronJob::where('id', $data->get('id'))->update([
            'minute' => $data->get('minute'),
            'hour' => $data->get('hour'),
            'day' => $data->get('day'),
            'month' => $data->get('month'),
            'weekday' => $data->get('weekday'),
            'url' => $url,
            'task' => $data->get('task'),
            'status' => $data->get('status'),
        ]);
    }

    /**
     * @param Collection|null $options
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    function getCronJobs(Collection $options)
    {
        return CronJob::when($options->get('status'), function ($query) use ($options) {
            /** @var Builder $query */
            $query->where('status', $options->get('status'));

        })->get();
    }

    /**
     * @param $cronId
     * @return \Illuminate\Database\Eloquent\Collection|Model|null|static|static[]
     */
    function getCronJob($cronId)
    {
        return CronJob::where('id', $cronId)->first();
    }

    /**
     * @param $cronId
     * @return bool|null
     * @throws Exception
     */
    function deleteCronJob($cronId)
    {
        return CronJob::where('id', $cronId)->delete();
    }

    /**
     * @param $email
     * @return mixed
     */
    function updateCronEmail($email)
    {
        $configServices = app(ConfigServices::class);
        $id = $configServices->getConfigId('cron', 'email');

        return $configServices->saveConfigData($id, [
            'meta_value' => $email,
        ]);
    }

    /**
     * @param $cronJob
     * @return $this|Model
     */
    function addCronHistory($cronJob)
    {
        return CronHistory::create([
            'cron_id' => $cronJob->id,
            'response' => [],
        ]);
    }
}