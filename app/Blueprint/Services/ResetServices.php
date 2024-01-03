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

use App\Eloquents\Coupons;
use App\Eloquents\LeadActivity;
use App\Eloquents\Leads;
use App\Eloquents\Mail;
use App\Eloquents\MailTransaction;
use App\Eloquents\Order;
use App\Eloquents\OrderProduct;
use App\Eloquents\Transaction;
use App\Eloquents\User;
use App\Eloquents\UserMeta;
use App\Eloquents\UserRepo;
use App\Eloquents\UserRole;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Class ResetServices
 * @package App\Blueprint\Services
 */
class ResetServices
{

    function __construct()
    {

    }

    /**
     * Reset Datas Of Blueprint
     * @return bool
     */
    function resetBlueprint()
    {

        DB::beginTransaction();

        try {

            Schema::disableForeignKeyConstraints();
            $user_data = User::find(1);
            $user_meta_data = UserMeta::find(1);
            $user_repo_data = UserRepo::find(1);


            UserRepo::truncate();
            UserMeta::truncate();
            User::truncate();

            $user_data->newInstance($user_data->getAttributes())->save();
            $user_meta_data->newInstance($user_meta_data->getAttributes())->save();
            $user_repo_data->newInstance($user_repo_data->getAttributes())->save();

            UserRepo::where('user_id', 1)->update(['LHS' => 1, 'LHS' => 1, 'RHS' => 2, 'SLHS' => 1, 'SRHS' => 2]);

            $user_roles_data = UserRole::find(1);
            UserRole::truncate();

            $user_roles_data->save();


            Order::truncate();
            OrderProduct::truncate();
            Transaction::truncate();
            LeadActivity::truncate();
            Leads::truncate();
            Mail::truncate();
            MailTransaction::truncate();

            Schema::enableForeignKeyConstraints();

            DB::commit();
        } catch (Exception $e) {

            DB::rollBack();

            return false;
        }

    }


}
