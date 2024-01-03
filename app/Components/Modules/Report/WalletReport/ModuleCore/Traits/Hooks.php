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

namespace App\Components\Modules\Report\WalletReport\ModuleCore\Traits;

use App\Blueprint\Services\MenuServices;
use Illuminate\Support\Collection;

/**
 * Trait Hooks
 * @package App\Components\Modules\Report\WalletReport\ModuleCore\Traits
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
                        'en' => 'Wallet Funds',
                        'es' => 'Fondos de cartera',
                        'ru' => 'Кошелек фонды',
                        'ko' => '월렛 펀드',
                        'pt' => 'Fundos de carteira',
                        'ja' => '財布ファンド',
                        'zh' => '钱包基金',
                        'vi' => 'Quỹ ví',
                        'sw' => 'Mfuko wa Wallet',
                        'hi' => 'वॉलेट फंड',
                        'fr' => 'Fonds de portefeuille',
                        'it' => 'Fondi di portafoglio'
                    ],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'admin.walletReport.fundReport',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-google-wallet',
                    'parent_id' => 'reports',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '6',
                    'protected' => '0',
                    'description' => '',
                    'slug' => 'walletReport',
                    'attributes' => '',
                ],
                [
                    'label' => [
                        'en' => 'Wallet Funds',
                        'es' => 'Fondos de cartera',
                        'ru' => 'Кошелек фонды',
                        'ko' => '월렛 펀드',
                        'pt' => 'Fundos de carteira',
                        'ja' => '財布ファンド',
                        'zh' => '钱包基金',
                        'vi' => 'Quỹ ví',
                        'sw' => 'Mfuko wa Wallet',
                        'hi' => 'वॉलेट फंड',
                        'fr' => 'Fonds de portefeuille',
                        'it' => 'Fondi di portafoglio'
                    ],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'employee.walletReport.fundReport',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-google-wallet',
                    'parent_id' => 'reports',
                    'permit' => ['employee:defaultEmployee'],
                    'sort_order' => '6',
                    'protected' => '0',
                    'description' => '',
                    'slug' => 'walletReport',
                    'attributes' => '',
                ],
                [
                    'label' => [
                        'en' => 'Fund Transfer',
                        'es' => 'Transferencia de fondos',
                        'ru' => 'Перевод денежных средств',
                        'ko' => '자금 이체',
                        'pt' => 'Transferência de fundos',
                        'ja' => '口座振替え',
                        'zh' => '资金转账',
                        'vi' => 'Chuyển quĩ',
                        'sw' => 'Uhamisho wa Fedha',
                        'hi' => 'फंड ट्रांसफर',
                        'fr' => 'Transfert de fonds',
                        'it' => 'Trasferimento di fondi'
                    ],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'admin.walletReport.fundTransferReport',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-google-wallet',
                    'parent_id' => 'reports',
                    'permit' => ['admin:defaultAdmin'],
                    'sort_order' => '7',
                    'protected' => '0',
                    'description' => '',
                    'attributes' => '',
                ],
                [
                    'label' => [
                        'en' => 'Fund Transfer',
                        'es' => 'Transferencia de fondos',
                        'ru' => 'Перевод денежных средств',
                        'ko' => '자금 이체',
                        'pt' => 'Transferência de fundos',
                        'ja' => '口座振替え',
                        'zh' => '资金转账',
                        'vi' => 'Chuyển quĩ',
                        'sw' => 'Uhamisho wa Fedha',
                        'hi' => 'फंड ट्रांसफर',
                        'fr' => 'Transfert de fonds',
                        'it' => 'Trasferimento di fondi'
                    ],
                    'link' => '',
                    'route' => '',
                    'route_name' => 'employee.walletReport.fundTransferReport',
                    'icon_image' => '',
                    'icon_font' => 'fa fa-google-wallet',
                    'parent_id' => 'reports',
                    'permit' => ['employee:defaultEmployee'],
                    'sort_order' => '7',
                    'protected' => '0',
                    'description' => '',
                    'attributes' => '',
                ]
            ]));
        });
    }
}