<?php
/**
 * Created by PhpStorm.
 * User: fayis
 * Date: 9/2/2017
 * Time: 7:32 PM
 */

namespace App\Components\Modules\Payment\Genome\ModuleCore\Support\Transaction;

use App\Blueprint\Support\Transaction\Callback;
use App\Eloquents\TemporaryData;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class GenomeCallback
 * @package App\Components\Modules\Payment\Genome\ModuleCore\Support\Transaction
 */
class GenomeCallback Extends Callback
{
    /**
     * @param $response
     * @return mixed|string
     */
    function success($response)
    {
        $res = app()->call([app($response->value['callback']), 'success'], ['response' => array_merge($response->value, ['tempId' => $response->id])]);

        if (isset($res['status']) && $res['status'])
            TemporaryData::find($response->id)->update(['status' => 1]);

        return $res;
    }

    /**
     * @param Request $request
     * @param $response
     * @return mixed
     */
    function pending(Request $request, $response)
    {
        app()->call([$this, Str::camel('pending' . $request->input('context'))], ['response' => $response]);

        return $response;
    }


    /**
     * Payment failure callback
     *
     * @param  array $data failure data
     * @return void data regarding failure of payment
     */
    function failure($data)
    {
        return json_encode(['status' => 'failure']);
    }

}