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

namespace App\Blueprint\Services;

use App\Eloquents\Package;
use Illuminate\Http\Request;

/**
 * Class PackageServices
 * @package App\Blueprint\Services
 */
class PackageServices
{
    /**
     * get all packages
     *
     * @return Package[]|\Illuminate\Database\Eloquent\Collection
     */
    function getActivePackages()
    {
//        $cartManager = app(CartManager::class);

//        if (cartStatus())
//            return Package::hydrate($cartManager->getallActiveProducts());
//        else
        return Package::all();
    }

    function getRegistrationPackages()
    {
        return Package::where('status', 1)->where('in_registration', 1)->get();
    }

    /**
     * insert new package
     *
     * @param Request $request
     * @return Package|bool|\Illuminate\Database\Eloquent\Model
     * @internal param collection|Request $packageDetails
     */
    function addPackages(Request $request)
    {
        $dispatch = collect($request->only($this->packageFields($request)));

//        $cartManager = app(CartManager::class);
//        if (cartStatus())
//            return $cartManager->addProduct($dispatch);
//         else

        return Package::create($dispatch->toArray());
    }

    /**
     * Filter Package Fields
     *
     * @param Request $request
     * @return array
     */
    function packageFields(Request $request)
    {
        $data = [
            'name',
            'price',
            'description',
            'pv',
            'image',
        ];

        $data = app(HookServices::class)->filter('packageFormUpdate', $data);

//        if (cartStatus()) {
//            $cartManager = app(CartManager::class);
//            $data = $cartManager->getCartProductFields();
//        }

        return $data;
    }


    /**
     * get individual package details
     *
     * @param integer $id
     * @return Package|\Illuminate\Database\Eloquent\Model
     */
    function getIndividualPackage($id = null)
    {
//        if (cartStatus()) {
//            /** @var CartManager $cartManager */
//            $cartManager = app(CartManager::class);
//            return $cartManager->getProductInfo($id);
//        }

        /** @var \Illuminate\Database\Eloquent\Collection $package */
        return ($package = Package::find($id)) ? $package->toArray() : null;
    }

    /**
     * update individual package details
     *
     * @param $request
     * @return boolean Description
     */
    function updatePackage($request)
    {
//        $cartManager = app(CartManager::class);
        $dispatch = collect($request->only($this->packageFields($request)));
        $update_id = $request->input('update_id');
        // print_r($dispatch);die();
//        if (cartStatus()) return $cartManager->editProduct($update_id, $dispatch);


        return Package::find($update_id)->update($dispatch->toArray());
    }

    /**
     * Delete a package
     *
     * @param integer $id package id
     * @return boolean status of deletion
     * @throws \Exception
     */
    function deletePackage($id)
    {
//        if (cartStatus()) {
//            $cartManager = app(CartManager::class);
//            return $cartManager->deleteProduct($id);
//        }

        return Package::find($id)->delete();
    }
}
