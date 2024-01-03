<?php
/**
 * Created by PhpStorm.
 * User: HtCodingM
 * Date: 3/31/2020
 * Time: 5:24 PM
 */

namespace App\Components\Modules\Report\InfluencersReport\Controllers;


use App\Components\Modules\Report\InfluencersReport\InfluencersReportIndex as Module;
use App\Eloquents\Country;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Eloquents\User;
use Illuminate\View\View;

class InfluencersReportController extends Controller
{
    private $module;

    /**
     * __construct function
     */
    public function __construct()
    {
        parent::__construct();
        $this->module = app()->make(Module::class);
    }

    /**
     * get index page of activity report
     *
     * @return Factory|View
     */
    public function index()
    {
        $data = [
            'scripts' => [
                asset('global/scripts/datatable.js'),
                asset('global/plugins/datatables/datatables.min.js'),
                asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')],
            'styles' => [
                asset('global/plugins/datatables/datatables.min.css'),
                asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'),
                asset('global/css/report-style.css'),
                $this->module->getCssPath('style.css'),
            ],
            'moduleId' => $this->module->moduleId
        ];

        $data['title'] = _mt($this->module->moduleId, 'InfluencersReport.influencers_report');
        $data['heading_text'] = _mt($this->module->moduleId, 'InfluencersReport.influencers_report');
        $data['breadcrumbs'] = [
            _t('index.home') => getScope() . '.home',
            _mt($this->module->moduleId, 'InfluencersReport.Report') => getScope() . '.report.influencers',
            _mt($this->module->moduleId, 'InfluencersReport.influencers_report') => getScope() . '.report.influencers'
        ];
        return view('Report.InfluencersReport.Views.InfluencersReportIndex', $data);
    }

    /**
     * load filters to the index page
     *
     * @return Factory|View
     */
    public function filters()
    {
        $data = [
            'moduleId' => $this->module->moduleId,
            'countries' => Country::get()
        ];

//        $exceptActivities = $this->exceptActivities();
//
//        $data['activities'] = Activity::get()->filter(function ($activity) use ($exceptActivities) {
//            return !in_array($activity->operation, $exceptActivities[getScope()], true);
//        });

        return view('Report.InfluencersReport.Views.Partials.filter', $data);
    }

    public function Fetch(Request $request){
        //        dd($request);
        $filters = $request->input('filters');

        $data = [
            'users' =>  app()->call([$this, 'fetchInfluencers'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 10)]),
            'moduleId' => $this->module->moduleId,
        ];
        return view('Report.InfluencersReport.Views.Partials.InfluencersReportTable', $data);
    }


    public  function fetchInfluencers(Collection $filters, $pages = null, $showAll = false){
        $method = $showAll ? 'get' : 'paginate';

        return User::where('package_id','=',4)
            ->when($user_id = $filters->get('user_id'),function ($query) use ($user_id){
                $query->where('id','=',$user_id);
            })
            ->when($sponsor_id = $filters->get('sponsor_id'),function ($query) use ($sponsor_id){
                $query->where('sponsor_id','=',$sponsor_id);
            })
            ->when($country = $filters->get('country_ids'), function ($query) use ($country) {
                $query->whereHas('metaData', function ($query) use ($country) {
                    $query->whereIn('country_id', $country);
                });
            })
            ->with('metaData.country','rank.rank','userSponsor')->{$method}($pages);

    }
}