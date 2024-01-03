/*
 *  -------------------------------------------------
 *  Hybrid MLM  Copyright (c) 2018 All Rights Reserved
 *  -------------------------------------------------
 *
 *  @author Acemero Technologies Pvt Ltd
 *  @link https://www.acemero.com
 *  @see https://www.hybridmlm.io
 *  @version 1.00
 *  @api Laravel 5.4
 */

/**
 Cookie consent init
 **/

var CookieConsent = function () {

    var _init = function () {
        $('.mt-cookie-consent-bar').cookieBar({
            closeButton: '.mt-cookie-consent-btn'
        });
    };

    return {
        init: function () {
            _init();
        }
    };

}();

if (App.isAngularJsApp() === false) {
    jQuery(document).ready(function () {
        CookieConsent.init();
    });
}
