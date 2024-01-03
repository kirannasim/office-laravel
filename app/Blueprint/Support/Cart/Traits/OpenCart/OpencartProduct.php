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

namespace App\Blueprint\Support\Cart\Traits\OpenCart;

use Illuminate\Support\Collection;

/**
 * Trait OpencartProduct
 * @package App\Blueprint\Support\Cart\Traits\OpenCart
 */
trait OpencartProduct
{
    /**
     * Add cart product
     *
     * @param Collection $data
     * @return mixed
     * @throws \Exception
     */
    function addProduct(Collection $data)
    {
        $this->boot('admin');
        $this->loader->model('catalog/product');
        $productModel = $this->registry->get('model_catalog_product');
        $productModel->addProduct($data->all());

        return true;
    }

    /**validation rules for product
     *
     * @return array
     */
    function productValidationRules()
    {
        $rules = [
            'pv' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'required',
            'model' => 'required',
            'product_description.*.name' => 'required',
        ];

        return $rules;
    }

    /**
     * get Fields necessary for adding product in cart
     *
     * @return array
     */
    public function getCartProductFields()
    {
        return ['product_description', 'model', 'sku', 'mpn', 'upc', 'ean', 'jan', 'isbn', 'location', 'price', 'pv', 'bv', 'tax_class_id', 'quantity', 'minimum', 'subtract', 'stock_status_id', 'shipping', 'date_available', 'length', 'width', 'height', 'length_class_id', 'weight', 'weight_class_id', 'status', 'sort_order', 'manufacturer', 'manufacturer_id', 'category', 'filter', 'product_store', 'download', 'related', 'option', 'image', 'points', 'product_reward', 'product_seo_url', 'product_layout'];
    }

    /**
     * retrieve products list from cart
     *
     * @return mixed
     * @throws \Exception
     */
    public function getAllActiveProducts()
    {
        $filter_data = [
            'filter_name' => '',
            'filter_model' => '',
            'filter_price' => '',
            'filter_quantity' => '',
            'filter_status' => '',
            'sort' => 'pd.name',
            'order' => 'ASC',
            'start' => 0,
            'limit' => 20
        ];

        $this->boot('admin');
        $this->loader->model('catalog/product');
        $productModel = $this->registry->get('model_catalog_product');
        $productData = $productModel->getProducts($filter_data);
        $dispatch = [];

        foreach ($productData as $key => $data) {
            $dispatch[] = collect($data)->mapWithKeys(function ($value, $key) {
                return [$this->productFieldMappings()->get($key, $key) => $value];
            })->all();
        }

        return $dispatch;
    }

    /**array map keys from cart
     *
     * @return Collection
     */
    function productFieldMappings()
    {
        return collect([
            'product_id' => 'id',
        ]);
    }

    /**
     * get individual product information from cart
     *
     * @param $id
     * @return Collection
     * @throws \Exception
     */
    public function getProductInfo($id)
    {
        $this->boot('admin');
        $this->loader->model('catalog/product');
        $productModel = $this->registry->get('model_catalog_product');
        $productData = $productModel->getProduct($id);
        $productData['productDescription'] = $productModel->getProductDescriptions($id);

        return collect($productData);
    }

    /**
     * edit product in cart
     *
     * @param $update_id
     * @param Collection $data
     * @return bool
     * @throws \Exception
     */
    function editProduct($update_id, Collection $data)
    {
        $this->boot('admin');
        $this->loader->model('catalog/product');
        $productModel = $this->registry->get('model_catalog_product');
        //$this->copyImageToCart($data->all());die();
        $productModel->editProduct($update_id, $data->all());

        return true;
    }

    /**
     * delete a product from cart
     *
     * @param $id
     * @return bool
     * @throws \Exception
     */
    function deleteProduct($id)
    {
        $this->boot('admin');
        $this->loader->model('catalog/product');

        $productModel = $this->registry->get('model_catalog_product');
        $productModel->deleteProduct($id);

        return true;
    }

    /**
     * function to copy image to opencart
     *
     * @param $data
     * @throws \Exception
     */
    public function copyImageToCart($data)
    {
        $this->boot('admin');
        $file = public_path() . $data['image'];
        echo $file;
        $dest = DIR_IMAGE;

        echo File::copy($file, $dest);
        die();
        if (!File::copy($file, $dest))
            die("Couldn't copy file");
        die();
        // copy ( string $source , string $dest [, resource $context ] );
        print_r($data);
        die();
    }
}
