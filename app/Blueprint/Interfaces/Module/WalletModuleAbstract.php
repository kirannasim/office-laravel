<?php
/**
 * Created by PhpStorm.
 * User: Muhammed Fayis
 * Date: 10/3/2018
 * Time: 2:52 PM
 */

namespace App\Blueprint\Interfaces\Module;


/**
 * Class WalletModuleAbstract
 * @package App\Blueprint\Interfaces\Module
 */
abstract class WalletModuleAbstract extends ModuleBasicAbstract implements WalletModuleInterface
{
    /**
     * @return ModuleBasicAbstract
     */
    function gateway()
    {
        return getModule('Payment-' . $this->getRegistry()['key']);
    }
}