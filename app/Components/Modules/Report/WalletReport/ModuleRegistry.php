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
 * Module registry information
 * @return []
 */

return [

    'name' => 'Wallet Report',

    'description' => 'The system may contain single or multiple wallets. So two type of reports are available to manage the fund or transactions.
Fund Report and
Fund transfer Report.
Fund report generates the total available fund in different wallets  of each user’s account. Admin can filter the fund report based on username, wallet and range of amount.
Fund transfer report generates the reports of the internal transactions within the system. This includes Transaction between wallets and the transaction between users. Filters are available here on the basis of payer and payee, from and to wallet, date and amount range.
Wallet report can also be exported to pdf, excel, csv and for print.',

    'screenshot' => 'sample.png',

    'author' => 'getoncode',

    'version' => '1.00',

    'pool' => 'Report'
];
