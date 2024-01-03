<?php

namespace App\Components\Modules\Report\PackageSalesReport\Controllers;

use App\Components\Modules\Report\PackageSalesReport\PackageSalesReportIndex as Module;
use App\Eloquents\Country;
use App\Eloquents\OrderProduct;
use App\Eloquents\Package;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use function Couchbase\defaultDecoder;
use DateInterval;
use DatePeriod;
use DateTime;
use Excel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

/**
 * Class PackageSalesReportController
 * @package App\Components\Modules\Report\PackageSalesReport\Controllers
 */
class PackageSalesReportController extends Controller
{
    /**
     * PackageSalesReportController constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->module = app()->make(Module::class);
    }

    /**
     * index
     */
    function index()
    {
        $data = [
            'moduleId' => $this->module->moduleId,
            'title' => _mt($this->module->moduleId, 'PackageSalesReport.PackageSales_Report'),
            'heading_text' => _mt($this->module->moduleId, 'PackageSalesReport.PackageSales_Report'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _mt($this->module->moduleId, 'PackageSalesReport.Report') => getScope() . ".packageSales.index",
                _mt($this->module->moduleId, 'PackageSalesReport.PackageSales_Report') => getScope() . ".packageSales.index",
            ],
        ];

        return view('Report.PackageSalesReport.Views.index', $data);
    }

    /**
     * @return Factory|View
     */
    function filters()
    {
        $data = [
            'moduleId' => $this->module->moduleId,
            'countries' => Country::get(),
        ];

        return view('Report.PackageSalesReport.Views.Partials.filter', $data);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    function fetch(Request $request)
    {
        $dateStart = $request->input('filters')['dateStart'];
        $dateEnd = $request->input('filters')['dateEnd'];


//        dd($request->input('filters')['dateEnd'], Carbon::parse($date->format("Y-m-d H:i:s")));

        if ($dateStart && $dateEnd){
            $dateStart = Carbon::parse($request->input('filters')['dateStart']);
            $dateEnd = Carbon::parse($request->input('filters')['dateEnd']);
            $diff = $dateStart->diffInDays($dateEnd);
        }else{
            $date = Carbon::now();
            $dateEnd = Carbon::parse($date->format("Y-m-d"));
            $dateStart =  Carbon::parse($date->modify("-12 months"));
            $diff = $dateStart->diffInDays($dateEnd);

        }


        $thead = [];
        $type  = '';


        if ($diff == 0){
            $type ='H:00';
            $a = '00:00';
            $b = '23:59';

            $thead = (new Collection(new DatePeriod(
                new DateTime($a),
                new DateInterval('PT1H'),
                new DateTime($b)
            )))->toArray();
        }elseif ($diff <= 31 ){
           $thead = (new Collection(new \DatePeriod($dateStart, new DateInterval('P1D'), $dateEnd)))->toArray();
           $type ='Y-m-d';
        }elseif ($diff <= 366) {
            $dateEnd = $dateEnd->modify('+1 month');
            $thead = (new Collection(new \DatePeriod($dateStart, new DateInterval('P1M'), $dateEnd)))->toArray();
            $type ='Y-m';
        }else{
            $thead = (new Collection(new \DatePeriod($dateStart, new DateInterval('P1Y'), $dateEnd)))->toArray();
            $type ='Y';
        }


        $filters = $request->input('filters');
        $data['packageSales'] = app()->call([$this, 'getPackageCount'], ['filters'=>collect($filters),'dateStart' => $dateStart, 'dateEnd' => $dateEnd, 'type' => $type]);
        $data['moduleId'] = $this->module->moduleId;
        $data['thead'] = $thead;
        $data['type'] = $type;
        return view('Report.PackageSalesReport.Views.Partials.packageSalesTable', $data);
    }




    function getPackageCount($filters,$dateStart, $dateEnd, $type=null)
    {
        $packages = Package::all();
        $data = [];
        $dateStart = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::parse($dateStart)->format('Y-m-d H:i:s'));
        $dateEnd   = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::parse($dateEnd)->format('Y-m-d H:i:s'));
        foreach ($packages as $package) {
            $data[$package->id] = OrderProduct::where('product_id', $package->id)->orderBy('created_at', 'asc')
                ->whereHas('order.metaData', function ($query) use ($filters) {
                    /** @var Builder $query */
                    if ($country = isset($filters['country'])?$filters['country']:false) $query->whereIn('country_id',$country);
//                    if ($country = $filters->get('country')) $query->where('country_id', $country);
                })->whereBetween('created_at', [
                        $dateStart->setTime(0,0,0),
                        $dateEnd->setTime(23,59,59)
                    ])->get()->groupBy(function($date) use ($type) {
                        return Carbon::parse($date->created_at)->format($type); // grouping by years
                    })->toArray();
            $data[$package->id]['price'] = $package->price;
        }

        foreach ( $data as $index=>$package){
            $sum = 0;
            foreach ( $package as $date) {
                if (is_array($date)) {
                    $sum += count($date);
                }
            }
            $data[$index]['total'] = $sum * $package['price'];
        }
        return $data;
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    function downloadExcel(Request $request)
    {
        $filters = $request->input('filters');
        $data = [
            'packageSales' => app()->call([$this, 'getPackageCount'], ['filters' => collect($filters), 'showAll' => true]),
            'totalCounts' => app()->call([$this, 'totalCount'], ['filters' => collect($filters), 'showAll' => true]),
            'moduleId' => $this->module->moduleId,
            'reportName' => _mt($this->module->moduleId, 'PackageSalesReport.PackageSales_Report'),
            'displayLogo' => false
        ];

        $excel = Excel::create($fileName = 'PackageSalesReport-' . date('Y-m-d-h-i-s'), function ($excel) use ($data) {
            $excel->sheet('Excel', function ($sheet) use ($data) {
                $sheet->loadView('Report.PackageSalesReport.Views.Partials.exportView', $data);
            });
        })->store('xls', public_path($relativePath = 'downloads'));

        return response()->json(['link' => asset($relativePath) . '/' . $fileName . '.' . $excel->ext]);
    }


}
