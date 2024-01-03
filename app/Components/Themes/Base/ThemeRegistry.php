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
 * This file should contain theme specific information like Theme name,version,author etc
 * @return array Theme meta info
 */

return [
    'name' => 'Default',
    'version' => '0.1',
    'screenshot' => asset("pages/img/layout/theme1.png"),
    'author' => 'Getoncode Solutions',
    'description' => 'Default theme from getoncode solutions',
    'layouts' => [
        ['slug' => 'darkblue', 'color' => '#2b3643'],
        ['slug' => 'blue', 'color' => '#2d5f8b'],
        ['slug' => 'grey', 'color' => 'grey'],
        ['slug' => 'light', 'color' => '#ddd'],
    ],
];
