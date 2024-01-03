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

namespace App\Http\Controllers\Admin;

use App\Eloquents\ActivityHistory;
use App\Eloquents\Attachment;
use App\Eloquents\Bookmark;
use App\Eloquents\Commission;
use App\Eloquents\CronHistory;
use App\Eloquents\CronJob;
use App\Eloquents\CustomField;
use App\Eloquents\LeftMenu;
use App\Eloquents\Mail;
use App\Eloquents\MailTransaction;
use App\Eloquents\Module;
use App\Eloquents\ModuleData;
use App\Eloquents\Order;
use App\Eloquents\OrderProduct;
use App\Eloquents\OrderTotal;
use App\Eloquents\TemporaryData;
use App\Eloquents\Transaction;
use App\Eloquents\TransactionCharge;
use App\Eloquents\TransactionDetail;
use App\Eloquents\User;
use App\Eloquents\UserMeta;
use App\Eloquents\UserRepo;
use App\Eloquents\UserRole;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Throwable;


/**
 * Class systemRefreshController
 * @package App\Http\Controllers\Admin
 */
class RefreshController extends Controller
{

    function testRun($operation)
    {

        switch ($operation) {
            case 'pfc':
                callmodule('Commission-PerformanceFeeCommission', 'process');
                echo 'PFC running finished';
                break;
            case 'dbp':
                callmodule('Commission-DiamondBonusPool', 'process');
                echo 'Diamond Pool Bonus running finished';
                break;
            case 'pfc_pool_bonus':
                callmodule('Commission-StarPFCPoolBonus', 'process');
                echo '5 Start PFC Pool Bonus running finished';
                break;
            case 'rank':
                callmodule('Rank-AdvancedRank', 'process');
                echo 'Ranking calculation finished';
                break;
            case 'userRank':
                callmodule('Rank-AdvancedRank', 'userRankCheck');
                echo 'Ranking calculation finished';
                break;
            case 'trigger_binary':
                callmodule('Commission-TeamVolumeCommission', 'distributePending');
                echo 'Pending TVC Distributed';
                break;
            case 'check_commission':
                $this->checkCommission();
                echo 'Commission Testing';
                break;
            case 'placeHoldingTankUsers':
                callmodule('General-HoldingTank','autoPlaceUsers');
                echo 'Finished';
                break;
            case 'deleteTvc':
                callmodule('Commission-TeamVolumeCommission','deleteAlreadyDistributed');
                echo 'Finished';
                break;
            case 'distributeMissingTvc':
                callmodule('Commission-TeamVolumeCommission','distributeMissedCommission');
                echo 'Finished';
                break;
        }
    }

    /**
     * @param $projectUrl
     */
    function leftMenuCorrection($projectUrl)
    {
        foreach (LeftMenu::get() as $menu) {
            $updatedLink = str_replace("http://localhost/elysium/app/public/", $projectUrl, $menu->link);
            LeftMenu::find($menu->id)->update([
                'link' => $updatedLink
            ]);
        }
    }

    function checkCommission()
    {
        $userId = 6;
        $orderId = 2336;
        defineAction('postRegistration', 'registration', collect(['result' => [
            'user' => User::find($userId),
            'orderId' => $orderId
        ]]));
    }

    /**
     * @param bool $force
     * @return void
     * @throws Throwable
     */
    protected function systemRefresh($force = false)
    {
        DB::beginTransaction();
        //DB::transaction(function () use ($force) {
        // $this->dataTruncate($force);

        //$this->dataSeeding($force);

        //$projectUrl = 'http://elysium.hybridmlmsoftware.com/';
        // $this->leftMenuCorrection($projectUrl);
        // });

        DB::rollBack();
    }

    /**
     * @param $force
     * @return bool
     */
    protected function dataTruncate($force)
    {
        defineFilter('dataTruncate', null, 'systemRefresh', ['forceTruncate' => $force]);
        Schema::disableForeignKeyConstraints();

        User::truncate();
        UserRepo::truncate();
        UserMeta::truncate();
        UserRole::truncate();
        ActivityHistory::truncate();
        Mail::truncate();
        MailTransaction::truncate();
        Commission::truncate();
        Order::truncate();
        OrderProduct::truncate();
        OrderTotal::truncate();
        Transaction::truncate();
        TransactionCharge::truncate();
        TransactionDetail::truncate();
        TransactionDetail::truncate();
        TemporaryData::truncate();
        CronHistory::truncate();
        Attachment::truncate();

        if ($force) {
            Bookmark::truncate();
            Module::truncate();
            ModuleData::truncate();
            CronJob::truncate();
            CustomField::truncate();
        }
        echo 'System databases truncated';
    }

    /**
     * dataSeeding
     * @param $force
     * @return bool
     */
    protected function dataSeeding($force)
    {
        defineFilter('dataTruncate', null, 'systemRefresh', ['forceTruncate' => $force]);
        User::insert([
            ["id" => 1, "username" => "company", "customer_id" => "1", "email" => "info@hybridmlm.com", "password" => bcrypt('hybridmlm'), "phone" => 123456789, 'sponsor_id' => 0, 'package_id' => 0, 'is_confirmed' => 1],
            ["id" => 2, "username" => "admin", "customer_id" => "2", "email" => "admin@email.com", "password" => bcrypt('admin'), "phone" => 123456789, 'sponsor_id' => 0, 'package_id' => 0, 'is_confirmed' => 1]
        ]);

        UserMeta::insert([
            ["user_id" => 1, "firstname" => "Hybrid", "lastname" => 'MLM', "dob" => '2017-05-10', "address" => '', "country_id" => 101, "state_id" => 19, "city_id" => 1892, "gender" => 'M'],
            ["user_id" => 2, "firstname" => "System", "
            lastname" => 'Admin', "dob" => '2017-05-10', "address" => 'admin', "country_id" => 101, "state_id" => 19, "city_id" => 1892, "gender" => 'M']
        ]);

        UserRepo::insert([
            ["user_id" => 1, "Sponsor_id" => 0, "parent_id" => 0, "LHS" => 0, "RHS" => 0, "SLHS" => 0, "SRHS" => 0, "position" => 0],
            ["user_id" => 2, "Sponsor_id" => 0, "parent_id" => 0, "LHS" => 1, "RHS" => 2, "SLHS" => 1, "SRHS" => 2, "position" => 0]
        ]);

        UserRole::insert([
            ["user_id" => 1, "type_id" => 1, "sub_type_id" => 1],
            ["user_id" => 2, "type_id" => 2, "sub_type_id" => 2]
        ]);

        defineFilter('dataSeeding', [], 'systemRefresh', ['forceRefresh' => $force]);
        echo 'Database seeding completed success full';
    }
}