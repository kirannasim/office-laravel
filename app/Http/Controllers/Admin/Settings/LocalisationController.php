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

namespace App\Http\Controllers\Admin\Settings;

use App\Eloquents\Currency;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;


/**
 * Class PackageController
 * @package App\Http\Controllers\Admin\Settings
 */
class LocalisationController extends Controller
{
    /**
     * @return Factory|View
     */
    function index()
    {
        $data = [
            'title' => 'Localisation Settings',
            'heading_text' => 'Localisation Settings',
            'breadcrumbs' => [
                _t('index.home') => route('admin.home'),
                'Localisation Settings' => 'manage.currency'
            ],
        ];

        return view('Admin.Settings.localisation', $data);
    }

    /**
     * @return Factory|View
     */
    function manageCurrency()
    {
        $data = [
            'title' => _t('settings.currency_management'),
            'heading_text' => _t('settings.currency_management'),
            'breadcrumbs' => [
                _t('index.home') => route('admin.home'),
                _t('settings.currency_management') => 'manage.currency'
            ],
        ];

        return view('Admin.Settings.Partials.Currency.index', $data);
    }

    /**
     * @return Factory|View
     */
    function getCurrencyTable()
    {
        $data['currencies'] = Currency::get();

        return view('Admin.Settings.Partials.Currency.currencyTable', $data);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    function getCurrencyForm(Request $request)
    {
        $data = [];
        if ($currencyID = $request->input('currencyId'))
            $data['currencyData'] = Currency::find($currencyID);

        return view('Admin.Settings.Partials.Currency.currencyForm', $data);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    function saveCurrency(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required', 'code' => 'required', 'symbol' => 'required', 'exchange_rate' => 'required|numeric']);

        if ($validator->fails())
            return response()->json([$validator->errors()], 422);

        if ($id = $request->input('edit_id')) {
            $currency = Currency::find($id);
            $currency->name = $request->input('name');
            $currency->code = $request->input('code');
            $currency->symbol = $request->input('symbol');
            $currency->exchange_rate = $request->input('exchange_rate');
            $currency->save();
        } else {
            Currency::create($request->only(['name', 'code', 'symbol', 'exchange_rate']));
        }
    }

    /**
     * @param Request $request
     */
    function disableCurrency(Request $request)
    {
        if ($id = $request->input('currencyId')) {
            $currency = Currency::find($id);
            $currency->active = 0;
            $currency->save();
        }
    }

    /**
     * @param Request $request
     */
    function enableCurrency(Request $request)
    {
        if ($id = $request->input('currencyId')) {
            $currency = Currency::find($id);
            $currency->active = 1;
            $currency->save();
        }
    }
}
