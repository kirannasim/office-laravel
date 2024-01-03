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

namespace App\Http\Controllers\Api;

use App\Eloquents\User;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\JsonResponse;


/**
 * Class ApiUtils
 * @package App\Http\Controllers\Api
 */
class ApiUtils extends ApiAbstract
{
    //Image editing tools

    /**
     * Crop Image to spcific dimension
     *
     * @param array $params image details
     * @return JsonResponse
     */
    function cropImage($params)
    {
        $params = collect($params);
        $width = $params->get('width', 100);
        $height = $params->get('height', 100);
        $x = $params->get('x', 0);
        $y = $params->get('y', 0);
        $userId = $params->get('userId', 0);
        $image = $params->get('image', 0);

        if (!$image && $userId) $image = User::find($userId)->metaData()->get('profile_pic');

        //Image editing tools

        /**
         * Crop Image to spcific dimension
         *
         * @param array $params image details
         * @return json
         */

        function cropImage($params)
        {
            $params = collect($params);
            $width = $params->get('width', 100);
            $height = $params->get('height', 100);
            $x = $params->get('x', 0);
            $y = $params->get('y', 0);
            $userId = $params->get('userId', 0);
            $image = $params->get('image', 0);

            if (!$image && $userId) $image = User::find($userId)->metaData()->get('profile_pic');

            $imageInstance = Image::make($image);

            return Image::crop($width, $height, $x, $y);
        }

        return Image::crop($width, $height, $x, $y);
    }

    /**create pdf
     *
     * @param $params
     */

    function createPdf($params)
    {
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $header = "<link href='" . asset('global/css/components.min.css') . "' rel='stylesheet' type='text/css'/>
	<link href='" . asset('global/css/plugins.css') . "' rel='stylesheet' type='text/css'/>";
        $content = $header . $params['content'];
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($content);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }
}
