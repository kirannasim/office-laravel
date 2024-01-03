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

namespace App\Components\Modules\General\News\ModuleCore\Services;

use App\Components\Modules\General\News\ModuleCore\Eloquents\News;
use App\Components\Modules\General\News\ModuleCore\Eloquents\paypalhistory;
use Carbon\Carbon;

/**
 * Class NewsServices
 * @package App\Components\Modules\General\News\ModuleCore\Services
 */
class NewsServices
{
    /**
     * handle all news functions
     *
     * @param type $options array
     * @return type boolean or collection
     * @throws \Exception
     */
    function handle($options)
    {
        switch ($options['type']) {
            case 'add_news':
                return $this->addNews($options);
                break;
            case 'get_news':
                return $this->getNews($options);
                break;
            case 'delete':
                return $this->deleteNews($options);
                break;
            case 'update_news':
                return $this->updateNews($options);
                break;
        }
    }

    /**
     * add new news
     *
     * @param type $options array
     * @return News boolean
     */
    function addNews($options)
    {
        return News::create($options->only($this->allowedFields()));
    }

    /**
     * Allowed Fields for news
     *
     * @return array
     */

    function allowedFields()
    {
        return ['title', 'content', 'dispatch_date'];
    }

    /**
     * retrieve news based on id or limit
     *
     * @param array $options array
     * @param null $pages
     * @return type collection
     */
    function getNews($options = array(), $pages = null)
    {
        $method = $pages ? 'paginate' : 'get';
        if (isset($options['id'])) {
            return News::find($options['id']);
        }
        $limit = (isset($options['limit'])) ? $options['limit'] : null;
        $date = (isset($options['date'])) ? $options['date'] : null;
        $groupBY = (isset($options['groupBY'])) ? $options['groupBY'] : null;


        $query = News::orderBy('created_at', 'desc')->limit($limit);
        if ($date)
            $query->where('dispatch_date', '<=', $date);

        if ($groupBY) {
            return $query->get()->groupBy(function ($date) {
                return Carbon::parse($date->dispatch_date)->format('Y-m-d');
            });
        }

        return $query->{$method}($pages);
    }

    /**
     * soft delete the news
     *
     * @param type $options array
     * @return bool|null collection
     * @throws \Exception
     */
    function deleteNews($options)
    {
        return News::find($options['id'])->delete();
    }

    /**
     * update a news
     *
     * @param type $options array
     * @return bool boolean
     */
    function updateNews($options)
    {
        return News::find($options['id'])->update($options->only($this->allowedFields()));
    }

}
