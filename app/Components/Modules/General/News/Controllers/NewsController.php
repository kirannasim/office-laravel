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

namespace App\Components\Modules\General\News\Controllers;

use App\Components\Modules\General\News\ModuleCore\Services\NewsServices;
use App\Components\Modules\General\News\ModuleCore\Traits\Routes;
use App\Components\Modules\General\News\NewsIndex;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class NewsController
 * @package App\Components\Modules\General\News\Controllers
 */
class NewsController extends Controller
{
    use Routes;

    /**
     * __construct function
     */
    function __construct()
    {
        parent::__construct();
        $this->module = app(NewsIndex::class);
    }

    /**
     * save news
     *
     * @param Request $request
     * @param NewsServices $newsServices
     * @return type view
     */
    function saveNews(Request $request, NewsServices $newsServices)
    {
        $validator = Validator::make($request->all(), [
            'title.*' => 'required',
            'content.*' => 'required',
            'dispatch_date' => 'required',
        ]);
        if ($validator->fails())
            return response()->json($validator->errors(), 422);

        if ($request->input('id'))
            $newsServices->updateNews($request);
        else
            $newsServices->addNews($request);
    }

    /**
     * get individual news data
     *
     * @param Request $request
     * @param NewsServices $newsServices
     * @return type json
     */
    function getNews(Request $request, NewsServices $newsServices)
    {
        return json_encode($newsServices->getNews(['id' => $request->input('id')]));
    }

    /**
     * delete news
     *
     * @param Request $request
     * @param NewsServices $newsServices
     * @return type json
     * @throws \Exception
     */
    function deleteNews(Request $request, NewsServices $newsServices)
    {
        return json_encode($newsServices->deleteNews(['id' => $request->input('id')]));
    }

    /**
     * News Part in dashboard
     *
     * @param NewsServices $newsServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    function newsInDashboard(NewsServices $newsServices)
    {
        $data = [];
        $data['scripts'] = [
            asset('global/plugins/horizontal-timeline/horizontal-timeline.js'),
        ];
        $data['newsData'] = $newsServices->getNews(['date' => date('Y-m-d h:i:s'), 'groupBY' => 1]);

        return view('General.News.Views.newsInDashboard', $data);
    }

    /**
     * admin Config
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function manageNews()
    {
        $scope = session('theScope') ?: 'user';
        $data = [];
        $data['styles'] = [
            asset('global/plugins/ladda/ladda-themeless.min.css'),
            asset('global/plugins/select2/css/select2.min.css'),
            asset('global/plugins/select2/css/select2-bootstrap.min.css'),
            asset('global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css'),
            asset('global/plugins/summernote/summernote.css'),
            $this->module->getCssPath('style.css'),
        ];

        $data['scripts'] = [
            asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
            asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            asset('global/plugins/summernote/summernote.min.js'),
            asset('global/plugins/ladda/spin.min.js'),
            asset('global/plugins/ladda/ladda.min.js'),
            asset('global/plugins/select2/js/select2.full.min.js'),
            asset('global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js'),
            asset('global/scripts/datatable.js'),
            asset('global/plugins/datatables/datatables.min.js'),
            asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')
        ];
        $data['moduleId'] = $this->module->moduleId;
        $data['title'] = _mt($this->module->moduleId, 'News.News_Management');
        $data['heading_text'] = _mt($this->module->moduleId, 'News.News_Management');
        $data['breadcrumbs'] = [
            _t('index.home') => 'admin.home',
            _mt($this->module->moduleId, 'News.Tools') => $scope . '.news.manage',
            _mt($this->module->moduleId, 'News.News_Management') => $scope . '.news.manage'
        ];

        return view('General.News.Views.manageNews', $data);
    }

    /**
     * get news Config Form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getForm()
    {
        $data = [];
        $data['moduleId'] = $this->module->moduleId;

        return view('General.News.Views.Partials.newsForm', $data);
    }

    /**
     * Get News List
     *
     * @param Request $request
     * @param NewsServices $newsServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getNewsList(Request $request, NewsServices $newsServices)
    {
        $data = [];
        $data['news_data'] = $newsServices->getNews([], $request->input('totalToShow', 10));
        $data['moduleId'] = $this->module->moduleId;

        return view('General.News.Views.Partials.newsList', $data);
    }
}
