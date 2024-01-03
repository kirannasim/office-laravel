<?php
/**
 * Created by PhpStorm.
 * User: Muhammed Fayis
 * Date: 10/28/2018
 * Time: 8:53 PM
 */

namespace App\Blueprint\Interfaces\Tasks;


interface Task
{
    /**
     * @return mixed
     */
    function getTaskName();

    /**
     * @return mixed
     */
    function run();
}