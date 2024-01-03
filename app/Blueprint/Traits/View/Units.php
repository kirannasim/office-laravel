<?php
/**
 * Created by PhpStorm.
 * User: Muhammed Fayis
 * Date: 11/7/2018
 * Time: 9:19 PM
 */

namespace App\Blueprint\Traits\View;


use Illuminate\Http\Request;

trait Units
{
    /**
     * Request units
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    function requestUnit(Request $request)
    {
        $args = $request->input('args') ?: [];

        if (($unit = $request->get('unit')) && (method_exists($this, ($method = 'unit' . ucfirst($unit))) && in_array($unit, $this->getAllowedUnits())))
            return app()->call([$this, $method], $args);

        return response()->json(['message' => 'This action is not allowed'], 403);
    }

    /**
     * @return mixed
     */
    function getAllowedUnits()
    {
        return $this->allowedUnits;
    }
}
