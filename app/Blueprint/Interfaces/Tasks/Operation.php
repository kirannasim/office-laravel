<?php
/**
 * Created by PhpStorm.
 * User: Muhammed Fayis
 * Date: 10/25/2018
 * Time: 6:29 PM
 */

namespace App\Blueprint\Interfaces\Tasks;


interface Operation
{
    /**
     * @return mixed
     */
    function operationName();

    /**
     * @return mixed
     */
    function errors();

    /**
     * @return mixed
     */
    function percentProcessed();

    /**
     * @return mixed
     */
    function startedAt();

    /**
     * @return mixed
     */
    function timePassed();

    /**
     * @return mixed
     */
    function inQueue();

    /**
     * @return string
     */
    public function getStatus();
}