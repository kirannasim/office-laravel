<?php


namespace App\Components\Modules\General\HoldingTank;


use App\Blueprint\Interfaces\Module\ModuleBasicAbstract as BasicContract;
use App\Blueprint\Query\Builder;
use App\Blueprint\Services\UserServices;
use App\Components\Modules\General\HoldingTank\Controllers\HoldingTankController;
use App\Components\Modules\General\HoldingTank\ModuleCore\Eloquents\HoldingTank;
use App\Components\Modules\General\HoldingTank\ModuleCore\Traits\Hooks;
use App\Components\Modules\General\HoldingTank\ModuleCore\Traits\Routes;
use App\Components\Modules\MLMPlan\Binary\ModuleCore\Services\BinaryServices;
use App\Eloquents\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;

/**
 * Class HoldingTankIndex
 * @package App\Components\Modules\General\HoldingTank
 */
class HoldingTankIndex extends BasicContract
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


    /**
     * @return Factory|View|mixed
     */
    function adminConfig()
    {
        $data = [
            'styles' => [
                asset('global/plugins/ladda/ladda-themeless.min.css'),
                asset('global/plugins/select2/css/select2.min.css'),
                asset('global/plugins/select2/css/select2-bootstrap.min.css'),
            ],
            'scripts' => [
                asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
                asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
                asset('global/plugins/ladda/spin.min.js'),
                asset('global/plugins/ladda/ladda.min.js'),
                asset('global/plugins/select2/js/select2.full.min.js'),
            ],
            'moduleId' => $this->moduleId,
            'config' => $this->getModuleData(true),
        ];

        return view('General.HoldingTank.Views.adminConfig', $data);
    }

    /**
     * @param array $data
     * @return HoldingTank|Model
     */
    function addUserToHoldingTank($data = [])
    {
        return HoldingTank::create([
            'user_id' => $data['user']->id,
            'status' => 0
        ]);
    }

    /**
     * @param User $user
     * @return int|mixed
     */
    function getPosition(User $user)
    {
        $position = HoldingTank::where('user_id', $user->id)->first();

        $defaultPosition = 1;
        if ($position) {
            $defaultPosition = $position->default_position;
        } else {
            return $defaultPosition;
        }

        switch ($defaultPosition) {
            case 1:
                return 1;
                break;
            case 2:
                return 2;
                break;
            case 3:
                return app()->call([$this, 'getAlternatePosition'], ['user' => $user]);
                break;
            case 4:
                return app()->call([$this, 'getWeakestLeg'], ['user' => $user]);
                break;
        }
    }

    /**
     * @param User $user
     * @param UserServices $userServices
     * @return int
     */
    function getAlternatePosition(User $user, UserServices $userServices)
    {
        $referrals = $userServices->getUsers(collect([]), '', true, ['repoData'])
            ->whereHas('repoData', function ($query) use ($user) {
                /** @var Builder $query */
                $query->where('sponsor_id', $user->id);
            })->orderBy('created_at', 'desc');

        $position = 1;
        if ($referrals->count()) $position = ($referrals->first()->repoData->position == 1) ? 2 : 1;

        return $position;
    }

    /**
     * @param User $user
     * @param BinaryServices $binaryServices
     * @return int
     */
    function getWeakestLeg(User $user, BinaryServices $binaryServices)
    {
        $binaryPoints = $binaryServices->getPoints(collect([
            'userId' => $user ? $user->id : loggedId(),
            'fullStats' => true,
        ]))->first();

        return $binaryPoints->leftpoints >= $binaryPoints->rightpoints ? 2 : 1;
    }


    /**
     * @param UserServices $userServices
     * @param BinaryServices $binaryServices
     */
    function autoPlaceUsers(UserServices $userServices, BinaryServices $binaryServices)
    {
        $tankUsers = $userServices->getUsers(collect([]), null, true)->whereDoesntHave('repoData')->get();
        $tankUsers->each(function ($user) use ($binaryServices) {
            app()->call([app(HoldingTankController::class), 'placeUser'], [
                'userId' => $user->id,
                'position' => 1,
            ]);
        });
    }
}
