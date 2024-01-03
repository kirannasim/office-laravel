<?php
/**
 * Created by PhpStorm.
 * User: Fazlul Rahman EM
 * Date: 10/6/2018
 * Time: 2:08 AM
 */

namespace App\Blueprint\Traits;

use App\Http\Controllers\Admin\Security\SecurityController;

/**
 * Trait Security
 * @package App\Blueprint\Traits
 */
trait Security
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function securityPinView()
    {
        $data = [
            'action' => $this->nonceAction,
            'nonce' => SecurityController::generateActionNonce($this->nonceAction),
        ];

        return view('Admin.Security.securityPin', $data);
    }
}