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

use App\Blueprint\Facades\ModuleServer;
use App\Components\Modules\General\Lead\ModuleCore\Eloquents\LeadActivity;
use App\Components\Modules\Payment\Epin\ModuleCore\Eloquents\Epin;
use App\Eloquents\Leads;
use App\Eloquents\Mail;
use App\Eloquents\MailTransaction;
use App\Eloquents\Transaction;
use Illuminate\Support\Facades\Cache;

class SystemServices
{

    /**
     * Clear Cache handles cache deletion
     *
     * @param array|string $index
     * @return bool
     * @internal param array $params cache options
     */

    function clearCache($index = '')
    {
        switch ($index) {
            case 'module':
                ModuleServer::flushCache();
                break;
            case 'menu':
                Cache::forget(['leftMenus', 'topMenus']);
                break;
            case 'system':
                Cache::flush();
                break;
            default:
                return false;
                break;
        }
    }

    /**
     *System cleanup
     *
     * @return bool
     */
    function cleanup()
    {
        $user_data = User::find(1);
        User::where('id', '<>', 1)->delete();
        DB::update("ALTER TABLE users AUTO_INCREMENT = 2;");
        DB::update("ALTER TABLE user_repo AUTO_INCREMENT = 2;");
        DB::update("ALTER TABLE user_meta AUTO_INCREMENT = 2;");
//        $user_meta_data = UserMeta::find(1);
//        UserMeta::truncate();
//        $user_meta_data->save();
//        $user_repo_data = UserRepo::find(1);
//        UserRepo::truncate();
//        $user_repo_data->save();
        Transaction::truncate();
        Epin::truncate();
        LeadActivity::truncate();
        Leads::truncate();
        Mail::truncate();
        MailTransaction::truncate();
        return true;
    }
}
