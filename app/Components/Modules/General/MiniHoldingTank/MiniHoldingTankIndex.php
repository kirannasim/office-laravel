<?php


namespace App\Components\Modules\General\MiniHoldingTank;


use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Blueprint\Services\ExternalMailServices;
use App\Blueprint\Services\OrderServices;
use App\Blueprint\Services\UserServices;
use App\Components\Modules\General\MiniHoldingTank\ModuleCore\Traits\Hooks;
use App\Components\Modules\General\MiniHoldingTank\ModuleCore\Traits\Routes;
use App\Eloquents\HoldingUsers;
use App\Eloquents\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class MiniHoldingTankIndex
 * @package App\Components\Modules\General\HoldingTank
 */
class MiniHoldingTankIndex extends BasicContract
{
    use Hooks, Routes;

    /**
     * handle module installations
     *
     * @return void
     */
    function install()
    {
        ModuleCore\Schema\Setup::install();
    }

    /**
     * handle module un-installation
     */
    function uninstall()
    {
        ModuleCore\Schema\Setup::uninstall();
    }

    function activateUsers()
    {
        $users = HoldingUsers::where('status', 0)->where('created_at', '<=', Carbon::now()->subHours(6))->get();

        foreach ($users as $eachUser) {
            return DB::transaction(function () use ($eachUser) {

                $userServices = app(UserServices::class);
                $orderServices = app(OrderServices::class);
                $externalMailServices = app(ExternalMailServices::class);

                $holdingData = $eachUser->data;

                $orderData = $holdingData['orderData'];

                $transactionData = $holdingData['transaction'];
                $transaction = Transaction::find($transactionData['id']);

                $cartDetails = $holdingData['cartDetails'];

                $user = app()->call([$userServices, 'addUser'], ['data' => collect($orderData)]);
                /** @var Transaction $transaction */
                $payer = loggedUser() ? loggedId() : $user->id;
                $transaction->update(['payer' => $payer]);
                $order = $orderServices->addOrder(true, $user, $transaction, 1, $cartDetails);

                $redirectUrl = loggedId() ? scopeRoute('register') : null;

                HoldingUsers::find($eachUser->id)->update(['status' => 1]);

                return tap(['transaction' => $transaction, 'orderId' => $order->id, 'user' => $user, 'redirectUrl' => $redirectUrl . '?registered=true&orderId=' . $order->id], function ($data) use ($externalMailServices) {
                    defineAction('postAddUser', 'registration', collect(['result' => $data]));
                    defineAction('postRegistration', 'registration', collect(['result' => $data]));
                    $externalMailServices->sendRegistrationMail(['userId' => $data['user']->id]);
                });

            });
        }

    }

}
