<?php
/**
 * Created by PhpStorm.
 * User: Muhammed Fayis
 * Date: 10/3/2018
 * Time: 2:55 PM
 */

namespace App\Blueprint\Interfaces\Module;


/**
 * Interface TransactionPassInterface
 * @package App\Blueprint\Interfaces\Module
 */
interface TransactionPassInterface
{
    /**
     * @return string
     */
    function txnPassRoute();

    /**
     * @return mixed
     */
    function txnPassViewRoute();
}