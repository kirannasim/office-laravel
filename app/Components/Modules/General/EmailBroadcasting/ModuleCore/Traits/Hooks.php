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

namespace App\Components\Modules\General\EmailBroadcasting\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\General\EmailBroadcasting\ModuleCore\Traits
 */
trait Hooks
{
    /**
     * Registers required hooks
     *
     * @return void
     */
    function hooks()
    {
        app()->call([$this, 'leftMenus']);
    }

    /**
     * @param MenuServices $menuServices
     */
    public function leftMenus(MenuServices $menuServices)
    {
        registerFilter('leftMenus', function ($menus) use ($menuServices) {
            /** @var Collection $menus */
            return $menus->merge($menuServices->menusFromRaw([
                [
                    'label' => [
                        'en' => 'Email Broadcasting',
                        'es' => 'Correo Electrónico De Radiodifusión',
                        'ru' => 'Электронной Почты Вещания',
                        'ko' => '이메일 방송',
                        'pt' => 'E-Mail De Radiodifusão',
                        'ja' => 'メールで放送',
                        'zh' => '电子邮件广播',
                        'vi' => 'Email Phát Sóng',
                        'sw' => 'E-Post Sänder',
                        'hi' => 'ईमेल प्रसारण',
                        'fr' => 'Email De La Radiodiffusion',
                        'it' => 'E-Mail Di Radiodiffusione',
                        'de' => 'E-Mail-Verbreitung'],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'admin.email.broadcast.index',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-user',
                    'parent_id' => '',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '8',
                    'protected' => '0',
                    'description' => '',
                    'attributes' => '',
                ]
            ]));
        });
    }
}