<?php


namespace App\Components\Modules\General\MiniHoldingTank\Controllers;


use App\Blueprint\Services\ExternalMailServices;
use App\Blueprint\Services\OrderServices;
use App\Blueprint\Services\UserServices;
use App\Eloquents\HoldingUsers;
use App\Eloquents\Transaction;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MiniHoldingTankController extends Controller
{


    function index()
    {
        $data = [
            'scripts' => [
                asset('global/css/report-style.css'),
            ],
            'styles' => [

            ],
            'title' => _mt($this->getModule()->moduleId, 'MiniHoldingTank.holding_tank'),
            'heading_text' => _mt($this->getModule()->moduleId, 'MiniHoldingTank.holding_tank'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _mt($this->getModule()->moduleId, 'MiniHoldingTank.holding_tank') => getScope() . ".miniHoldingTank",
                _mt($this->getModule()->moduleId, 'MiniHoldingTank.holding_tank') => getScope() . ".miniHoldingTank",
            ],
        ];

        return view('General.MiniHoldingTank.Views.holdingTankIndex', $data);
    }

    function getModule()
    {
        return getModule('General-MiniHoldingTank');
    }

    function filters()
    {
        $data = [
            'default_filter' => [
                'startDate' => HoldingUsers::min('created_at'),
                'endDate' => HoldingUsers::max('created_at'),
            ],
            'moduleId' => $this->getModule()->moduleId,
        ];

        return view('General.MiniHoldingTank.Views.Partials.filter', $data);
    }


    function fetch(Request $request)
    {

        $filters = $request->input('filters');

        if (getScope() == 'user') {
            $filters['user_id'] = loggedId();
        }

        $data['holdingUserData'] = app()->call([$this, 'fetchUserData'], ['filters' => collect($filters), 'pages' => $request->input('totalToShow', 200)]);
        $data['moduleId'] = $this->getModule()->moduleId;

        return view('General.MiniHoldingTank.Views.Partials.holdingTankList', $data);
    }


    /**
     * @param Collection $filters
     * @param null $pages
     * @param bool $showAll
     * @return mixed
     */
    public function fetchUserData(Collection $filters, $pages = null, $showAll = false)
    {
        $method = $showAll ? 'get' : 'paginate';

        return HoldingUsers::where('status', 0)->when($filters->get('user_id'), function ($query) use ($filters) {
            /** @var Builder $query */
            $query->where('sponsor_id', $filters->get('user_id'));
        })->{$method}($pages);
    }


    /**
     * @param Request $request
     * @return mixed
     * @throws \Throwable
     */
    function addUserToSystem(Request $request)
    {

        $this->validate($request, [
            'id' => 'required',
            'position' => 'required'
        ]);

        return DB::transaction(function () use ($request) {
            $position = 1;

            if ($request->input('position') == 'R') {
                $position = 2;
            }


            $userServices = app(UserServices::class);
            $orderServices = app(OrderServices::class);
            $externalMailServices = app(ExternalMailServices::class);

            $holdingData = HoldingUsers::find($request->input('id'))->data;

            $orderData = $holdingData['orderData'];

            $orderData['position'] = $position;

            $transactionData = $holdingData['transaction'];
            $transaction = Transaction::find($transactionData['id']);

            $cartDetails = $holdingData['cartDetails'];

            $user = app()->call([$userServices, 'addUser'], ['data' => collect($orderData)]);
            /** @var Transaction $transaction */
            $payer = loggedUser() ? loggedId() : $user->id;
            $transaction->update(['payer' => $payer]);
            $order = $orderServices->addOrder(true, $user, $transaction, 1, $cartDetails);

            $redirectUrl = loggedId() ? scopeRoute('register') : null;

            HoldingUsers::find($request->input('id'))->update(['status' => 1]);

            return tap(['transaction' => $transaction, 'orderId' => $order->id, 'user' => $user, 'redirectUrl' => $redirectUrl . '?registered=true&orderId=' . $order->id], function ($data) use ($externalMailServices) {
                defineAction('postAddUser', 'registration', collect(['result' => $data]));
                defineAction('postRegistration', 'registration', collect(['result' => $data]));
                $externalMailServices->sendRegistrationMail(['userId' => $data['user']->id]);
            });

        });


    }


    function testCron()
    {
        callModule('General-MiniHoldingTank')->activateUsers();
    }


}
