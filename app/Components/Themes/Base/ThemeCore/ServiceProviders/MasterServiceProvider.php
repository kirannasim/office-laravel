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
 * You can bind theme related services here using closures which will be automatically registered
 */

return [
    function () {
        $this->app->bind(MenuFactory::class, function () {
            return new MenuFactory();
        });
    }
];
