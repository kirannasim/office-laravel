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

use App\Eloquents\PresetTemporaryData;
use App\Eloquents\PresetTransaction;
use App\Eloquents\PresetTransactionDetail;
use App\Eloquents\PresetUser;
use App\Eloquents\TemporaryData;
use App\Eloquents\Transaction;
use App\Eloquents\TransactionDetail;
use App\Eloquents\User;
use App\Eloquents\UserRepo;
use App\Eloquents\UserRole;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * Class PresetDemoController
 * @package App\Http\Controllers\Admin
 */
class PresetDemoController extends Controller
{
    /**
     * @param bool $force
     * @return void
     */
    protected function setupDemo()
    {
        DB::transaction(function () {
            //import users
            $this->importUsers();
            //import pending registration
            $this->importPendingUsers();
            //import transactions
            $this->importTransactions();
            //import payouts
            $this->importPayouts();
            //import Mail
            $this->importMail();
            //import Support System
            $this->importSupportSystem();
            //import E-pin
            $this->importEpin();
            //import Addon Cart
            $this->importAddonCart();
            //import CRM
            $this->importCrm();
            //import Employee
            $this->importEmployee();
            //import News
            $this->importNews();
            //import Feedback
            $this->importFeedback();
            //import Lead
            $this->importLead();
            //import Autoresponder
            $this->importAutoresponder();
            //import Social Promotion
            $this->importSocialPromotion();
            //import sms
            $this->importSms();
            //import sms
            $this->importKyc();
        });
    }

    function importUsers()
    {
        $presetUsers = PresetUser::orderBy('id')->limit(100)->get();
        foreach ($presetUsers as $user) {
            $this->addUser($user);
            //mark migrated user
            $this->changeMigrateStatus($user->id);
        }
    }

    /**
     * @param $customer
     * @return $this|Model
     */
    function addUser($customer)
    {
        $sponsorEmail = ($customer->sponsor_id == 1) ? 'admin@email.com' : PresetUser::find($customer->sponsor_id)->email;

        $sponsorId = userFromEmail($sponsorEmail);

        if (!$sponsorId) return;

        // Adding user basic data
        $basicData = [
            'username' => $customer->username,
            'password' => bcrypt($customer->last_name),
            'email' => $customer->email,
            'phone' => $customer->phone,
            'created_at' => $customer->date_created
        ];
        $user = User::create($basicData);

        // Adding user repo data
        $repoData = [
            'sponsor_id' => $sponsorId,
            'parent_id' => $parentId = $sponsorId,
            'position' => UserRepo::where('parent_id', $parentId)->count() + 1,
            'user_level' => UserRepo::where('user_id', $parentId)->first()->user_level + 1,
            'sp_user_level' => UserRepo::where('user_id', $sponsorId)->first()->sp_user_level + 1,
            'package_id' => 1
        ];

        $prepend = defineFilter('appendOrPrepend', [], 'placement', $repoData);
        $user->repoData($repoData, $prepend);

        // Adding to meta
        $metaData = [
            'firstname' => $customer->first_name,
            'lastname' => $customer->last_name,
            'dob' => '2017-05-10',
            'gender' => $customer->gender,
            'address' => '',
            'country_id' => $customer->country_id,
            'state_id' => 2836,
            'city_id' => '',
        ];
        $user->metaData($metaData);

        // Adding user role data
        UserRole::create(['user_id' => $user->id, 'type_id' => 3, 'sub_type_id' => 3]);

        tap(['user' => $user], function ($data) {
            defineAction('postAddUser', 'registration', collect(['result' => $data]));
        });

        return $user;
    }

    /**
     * @param $email
     * @return bool
     */
    function changeMigrateStatus($id)
    {
        return PresetUser::find($id)->update(['isMigrated' => true]);
    }

    /**
     * @return void
     */
    function importPendingUsers()
    {
        $tempData = PresetTemporaryData::get();
        foreach ($tempData as $data) {
            TemporaryData::create([
                'key' => $data->key,
                'value' => $data->value,
                'status' => $data->status,
                'context' => $data->context,
                'created_at' => $data->created_at,
                'updated_at' => $data->updated_at,
            ]);
        }
    }

    /**
     * import transaction
     */
    function importTransactions()
    {
        $transactions = PresetTransaction::get();
        foreach ($transactions as $transaction) {
            Transaction::create([
                'payer' => $transaction->payer,
                'payee' => $transaction->payee,
                'context' => $transaction->context,
                'gateway' => $transaction->gateway,
                'amount' => $transaction->amount,
                'actual_amount' => $transaction->actual_amount,
                'ip' => $transaction->ip,
                'status' => $transaction->status,
                'created_at' => $transaction->created_at,
            ]);
        }

        $transactionDetails = PresetTransactionDetail::get();
        foreach ($transactionDetails as $detail) {
            TransactionDetail::create([
                'transaction_id' => $detail->transaction_id,
                'remarks' => $detail->remarks,
                'from_module' => $detail->from_module,
                'to_module' => $detail->to_module,
                'operation_id' => $detail->operation_id
            ]);
        }
    }

    function importPayouts()
    {

    }

    function importMail()
    {

    }

    function importSupportSystem()
    {

    }

    function importEpin()
    {

    }

    function importAddonCart()
    {

    }

    function importCrm()
    {

    }

    function importEmployee()
    {

    }

    function importNews()
    {

    }

    function importFeedback()
    {

    }

    function importLead()
    {

    }

    function importAutoresponder()
    {

    }

    function importSocialPromotion()
    {

    }

    function importSms()
    {

    }

    function importKyc()
    {

    }
}
