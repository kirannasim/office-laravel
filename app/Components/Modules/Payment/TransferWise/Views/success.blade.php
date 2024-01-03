<!doctype html>
<html lang="en">
<head>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('global/plugins/line-awesome-master/dist/css/line-awesome-font-awesome.css') }}"
          rel="stylesheet" type="text/css"/>
    <script src="{{ asset('global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>

</head>
<body>
<div class="logo"><img src="{{ logo() }}" alt="logo" style="width: 136px;padding-left: 13px;" class="logo-default"></div>

<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0"
       style="">
    <tbody>
    <tr>
        <td class="email_body email_start tc">
            <!--[if (mso)|(IE)]>
            <table width="632" border="0" cellspacing="0" cellpadding="0" align="center"
                   style="vertical-align:top;width:632px;Margin:0 auto;">
                <tbody>
                <tr>
                    <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
            <div class="email_container">
                <table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0"
                       style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
                    <tbody>
                    <tr>
                        <td class="content_cell header_c active_b brt pt pb"
                            style="box-sizing: border-box;vertical-align: top;width: 100%;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;border-radius: 4px 4px 0 0;padding-top: 16px;padding-bottom: 16px;line-height: inherit;min-width: 0 !important;">
                            <!-- col-2-4 -->
                            <div class="email_row"
                                 style="box-sizing: border-box;font-size: 0;display: block;width: 100%;vertical-align: top;margin: 0 auto;text-align: center;clear: both;line-height: inherit;min-width: 0 !important;max-width: 600px !important;">
                                 
                                <h4 style="width: 100%; font-size: 16px; margin-left: -15px; font-family: sans-serif;">ATTENTION! IMMEDIATE ACTION REQUIRED. {{$payment}} PAYMENT EEA.</h4>
                                <div class="col_12"
                                     style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;line-height: inherit;min-width: 0 !important;">
                                    <table class="column" width="100%" border="0" cellspacing="0" cellpadding="0"
                                           style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
                                        <tbody>
                                        <tr>
                                            <td class="column_cell px pt_xs pb_0 logo_c tl sc"
                                                style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 22px;padding-bottom: 0;font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 20px;mso-line-height-rule: exactly;text-align: left;padding-left: 16px;padding-right: 16px;">
                                                Greetings {{$user->metaData->firstname}} {{$user->metaData->lastname}}
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="column_cell px pt_xs pb_0 logo_c tl sc"
                                                style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 22px;padding-bottom: 0;font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 20px;mso-line-height-rule: exactly;text-align: left;padding-left: 16px;padding-right: 16px;">
                                                ELYSIUM ID: {{$user->customer_id}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="column_cell px pt_xs pb_0 logo_c tl sc"
                                                style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 1px;padding-bottom: 0;font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 20px;mso-line-height-rule: exactly;text-align: left;padding-left: 16px;padding-right: 16px;">
                                                (USE THIS ID NUMBER IN YOUR REFERENCE SECTION OF YOUR {{$payment}} PAYMENT)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="column_cell px pt_xs pb_0 logo_c tl sc"
                                                style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 22px;padding-bottom: 0;font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 20px;mso-line-height-rule: exactly;text-align: left;padding-left: 16px;padding-right: 16px;">
                                                You have chosen to pay with {{$payment}}. Please make sure to immediately complete this
                                                {{$payment}} transaction via your bank to make sure your position is consolidated. Within {{$payment == 'IBAN'?3:7}}
                                                days your position will expire if {{$payment}} payment is not received.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="column_cell px pt_xs pb_0 logo_c tl sc"
                                                style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 22px;padding-bottom: 0;font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 20px;mso-line-height-rule: exactly;text-align: left;padding-left: 16px;padding-right: 16px;">
                                                Payment amount: {{$amount}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="column_cell px pt_xs pb_0 logo_c tl sc"
                                                style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 22px;padding-bottom: 0;font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 20px;mso-line-height-rule: exactly;text-align: left;padding-left: 16px;padding-right: 16px;">
                                                PAYMENT DETAILS <br>
                                                Recipient: ELYSIUM CAPITAL OÜ<br>
                                                Address:   Tartu mnt 67/1-13B<br>
                                                Postal code: 10115<br>
                                                City: Tallinn<br>
                                                Country: Estonia<br>
                                                Card Number: {{$data['card_num']}}<br>
                                                Bank Code: {{$data['bank_code']}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="column_cell px pt_xs pb_0 logo_c tl sc"
                                                style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 22px;padding-bottom: 0;font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 20px;mso-line-height-rule: exactly;text-align: left;padding-left: 16px;padding-right: 16px;">
                                                Bank code: ({{$payment}} / BIC): TRWIBEB1XXX <br>
                                                {{$payment}}: BE21 9670 5753 4403
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="column_cell px pt_xs pb_0 logo_c tl sc"
                                                style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 22px;padding-bottom: 0;font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 20px;mso-line-height-rule: exactly;text-align: left;padding-left: 16px;padding-right: 16px;">
                                                REFERENCE: {{$user->customer_id}}<br>
                                                USE ONLY YOUR 6-DIGIT ELYSIUM ID NUMBER AS REFERENCE.<br>
                                                DON'T AD SPACES OR LETTERS/DOTS/SIGNS.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="column_cell px pt_xs pb_0 logo_c tl sc"
                                                style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 22px;padding-bottom: 0;font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 20px;mso-line-height-rule: exactly;text-align: left;padding-left: 16px;padding-right: 16px;">
                                                ELYSIUM CAPITAL OU BANK ADDRESS: <br>
                                                TransferWise Europe SA<br>
                                                Avenue Marnix 13-17<br>
                                                Brussels<br>
                                                1000<br>
                                                Belgium<br>
                                                please note that you have to use <span style="color:red">{{$user->metaData->username}}</span> as the reference when pay with transferwebsite<br>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--[if (mso)|(IE)]></td>
                                <td width="400"
                                    style="width:400px;line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                                <![endif]-->
                                <div class="col_4"
                                     style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 400px;line-height: inherit;min-width: 0 !important;">
                                    {{--<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">--}}
                                    {{--<tbody>--}}
                                    {{--<tr>--}}
                                    {{--<td class="column_cell px pb_0 pt_xs hdr_menu sc" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 22px;padding-bottom: 0;font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 23px;mso-line-height-rule: exactly;text-align: right;padding-left: 16px;padding-right: 16px;">--}}
                                    {{--<p class="fsocial mb_0" style="font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 20px;color: #a9b3ba;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 0;"><a href="#" style="text-decoration: none;line-height: inherit;"><img src="{{ asset('email/images/android-settings.png') }}" width="24" height="24" alt="" style="outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;line-height: 20px;max-width: 24px;height: auto !important;"></a></p>--}}
                                    {{--</td>--}}
                                    {{--</tr>--}}
                                    {{--</tbody>--}}
                                    {{--</table>--}}
                                </div>
                                <!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
                            </div>
                        </td>
                    </tr>
                    <tr>
                         <td class="content_cell header_c active_b brt pt pb"
                            style="box-sizing: border-box;vertical-align: top;width: 100%;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;border-radius: 4px 4px 0 0;padding-top: 16px;padding-bottom: 16px;line-height: inherit;min-width: 0 !important;">
                            <a href="{{route('user.home')}}"> <button class="btn green"> <i class="fa fa-arrow-circle-left"></i> Back To Office</button></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
        </td>
    </tr>
    </tbody>
</table>

<style>
    .b2b-success {
        width: 50%;
        margin: 22px auto;
        display: block;
        border: dashed 1px #09a909;
        padding: 30px 10px;
    }

    .b2b-success h3 {
        font-size: 15px;
        text-align: center;
        color: #333232;
        line-height: 20px;
        font-weight: 400;
    }
    .b2b-success i {
        width: 40px;
        height: 40px;
        border: solid 1px #09a909;
        color: #09a909;
        border-radius: 50%;
        text-align: center;
        margin: auto;
        display: block !important;
        padding: 10px 0px;
        font-size: 18px;
        font-weight: bold;
    }
    .b2b-success button.btn.green {
        margin: 10px auto;
        display: block;
        width: auto;
        background-color: #03A9F4;
        color: #fff;
    }

    .b2b-success button.btn.green i {
        display: inline-block !important;
        font-size: 15px;
        width: auto;
        height: auto;
        padding: 0px;
        border: 0px;
        color: #fff;
    }

    .logo {
        margin: 50px auto;
        display: block;
        text-align: center;
    }

    .logo img.logo-default {
        filter: invert(1);
    }
</style>

</body>
</html>