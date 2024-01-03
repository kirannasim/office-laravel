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

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Response;


/**
 * Class InformationController
 * @package App\Http\Controllers
 */
class InformationController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param $page
     * @return Response
     */
    public function viewPage($page)
    {
        $data = [
            'page' => $page,
            'content' => getConfig('information_pages', $page)
        ];

        return view('Misc.Information.information', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @param $page
     * @param PDF $pdf
     * @return Response
     */
    public function downloadPage($page, PDF $pdf)
    {
        $data = [
            'page' => $page,
            'content' => getConfig('information_pages', $page)
        ];

        $pdf->loadHTML(view('Misc.Information.informationDownload', $data));
        $fileName = $page . '-' . date('Y-m-d-h-i-s') . '.pdf';
        $pdf->save(public_path($relativePath = 'Pdf' . DIRECTORY_SEPARATOR . $fileName));

        return response()->json(['link' => asset($relativePath)]);
    }

    /**
     * Show the application dashboard.
     *
     * @param $page
     * @return Response
     */
    public function printPage($page)
    {
        $data = [
            'page' => $page,
            'content' => getConfig('information_pages', $page)
        ];

        return view('Misc.Information.information', $data);
    }
}
