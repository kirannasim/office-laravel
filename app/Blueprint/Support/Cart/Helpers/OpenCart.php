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

/**
 * Created by PhpStorm.
 * User: Hybrid MLM Software
 * Date: 11/4/2017
 * Time: 2:40 AM
 */

/**
 * @param $filename
 * @return string
 */
function modification($filename)
{
    if (defined('DIR_CATALOG'))
        $file = DIR_MODIFICATION . 'admin/' . substr($filename, strlen(DIR_APPLICATION));
    elseif (defined('DIR_OPENCART'))
        $file = DIR_MODIFICATION . 'install/' . substr($filename, strlen(DIR_APPLICATION));
    else
        $file = DIR_MODIFICATION . 'catalog/' . substr($filename, strlen(DIR_APPLICATION));

    if (substr($filename, 0, strlen(DIR_SYSTEM)) == DIR_SYSTEM)
        $file = DIR_MODIFICATION . 'system/' . substr($filename, strlen(DIR_SYSTEM));

    if (is_file($file))
        return $file;

    return $filename;
}
