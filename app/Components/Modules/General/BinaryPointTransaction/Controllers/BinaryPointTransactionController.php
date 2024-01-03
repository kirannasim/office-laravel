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

namespace App\Components\Modules\General\BinaryPointTransaction\Controllers;

use App\Components\Modules\MLMPlan\Binary\ModuleCore\Eloquents\BinaryPoint;
use Illuminate\Http\Request;

/**
 * Class BinaryPointTransactionController
 * @package App\Components\Modules\General\BinaryPointTransaction\Controllers
 */
class BinaryPointTransactionController
{

    /**
     * @param Request $request
     */
    function saveBinaryPoint(Request $request)
    {
        BinaryPoint::create([
            'user_id' => $request->input('user_id'),
            'point' => $request->input('point'),
            'position' => $request->input('position'),
            'is_credit' => 1,
            'pair' => 0,
            'possible_pair' => 0,
            'from_user' => 2,
            'context' => 'manual'
        ]);
    }
}