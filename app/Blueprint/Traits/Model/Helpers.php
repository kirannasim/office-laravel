<?php
/**
 * Created by PhpStorm.
 * User: Muhammed Fayis
 * Date: 10/25/2018
 * Time: 10:38 PM
 */

namespace App\Blueprint\Traits\Model;


trait Helpers
{
    /**
     * @param $column
     * @param $value
     * @return mixed|null
     */
    static function getByColumn($column, $value)
    {
        return static::where($column, $value)->first() ?: null;
    }

    /**
     * @param $name
     * @return mixed|null
     */
    static function getByName($name)
    {
        return static::where('name', $name)->first() ?: null;
    }

    /**
     * @param $name
     * @return mixed|null
     */
    static function nameToId($name)
    {
        return ($instance = static::getByName($name)) ? $instance->id : null;
    }
}