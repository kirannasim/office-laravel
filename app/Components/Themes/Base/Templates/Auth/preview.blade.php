<style>
    .portlet.light.bordered {
        border: 0px !important;
    }

    .portlet.light.bordered > .portlet-title {
        border-bottom: 1px solid #eef1f5;
        display: none;
    }

    .postRegistrationBox {
        box-shadow: 1px 4px 8px rgba(0, 0, 0, 0) !important;
        padding: 0px;
        line-height: 27px;

        border: 0px !important;
    }

    .row.registrationWrapper .portlet.light.bordered {
        border: 0px !important;
    }
</style>
<!--<div class="row WelcomeLetterWrapper" id="WelcomeLetterWrapper" style="margin: 100px 0px;">
    <div class="container">
        <div class="row reg-preview">
            <div class="col-md-12">
                <div class="" id="form_wizard_1">
                    <div class="portlet-title">
                        <div class="caption" style="display: block; margin: auto;text-align: center;">
                            <img src="{{themeAssetUrl('layouts/layout/img/logo.png')}}" style="margin-top: 15px;"/>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="well" style="border:0px; color: #000;background-color: transparent;">
                            {!! $welcome_letter !!}
        </div>
    </div>
</div>
</div>
<div class="col-md-12" style="margin-bottom: 25px;">
<a href="{{ route('invoice',['id'=>$order_id]) }}" target="_blank" class="btn btn-lg blue invoice">
                    <i class="fa fa-file-o"></i> Invoice </a>
                <button class="btn btn-lg red dow" id="download_pdf">
                    <i class="fa fa-file-pdf-o"></i> Download
                </button>
            </div>
        </div>
    </div>
</div>-->
<div class="row WelcomeLetterWrapper" id="WelcomeLetterWrapper" style="margin:0px;">
    <div class="welcome-box">
        <!-- jumbotron_light_icon_success -->
        <table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
            <tr>
                <td class="email_body tc">
                    <!--[if (mso)|(IE)]>
                    <table width="632" border="0" cellspacing="0" cellpadding="0" align="center"
                           style="vertical-align:top;width:632px;Margin:0 auto;">
                        <tbody>
                        <tr>
                            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
                    <div class="email_container">
                        <table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td class="content_cell light_b brt">
                                    <!-- col-6 -->
                                    <div class="email_row">
                                        <!--[if (mso)|(IE)]>
                                        <table width="600" border="0" cellspacing="0" cellpadding="0" align="center"
                                               style="vertical-align:top;width:600px;Margin:0 auto 0 0;">
                                            <tbody>
                                            <tr>
                                                <td width="600"
                                                    style="width:600px;line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                                        <![endif]-->
                                        <div class="col_6">
                                            <table class="column" width="100%" border="0" cellspacing="0"
                                                   cellpadding="0">
                                                <tbody>
                                                <tr>
                                                    <td class="column_cell px pte tc">
                                                        <table class="ic_h" align="center" width="64" border="0"
                                                               cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                            <tr>
                                                                <td class="success_b">
                                                                    <p class="imgr mb_0"><img
                                                                                src="{{themeAssetUrl('layouts/layout/img/android-checkmark.png')}}"
                                                                                width="32" height="32" alt=""/></p>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <h1 class="mb_xxs">Welcome to our store!</h1>
                                                        <p class="lead">You've successfully create your new account.</p>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
                                    </div>
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
        <!-- spacer -->
        <table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
            <tr>
                <td class="email_body tc">
                    <!--[if (mso)|(IE)]>
                    <table width="632" border="0" cellspacing="0" cellpadding="0" align="center"
                           style="vertical-align:top;width:632px;Margin:0 auto;">
                        <tbody>
                        <tr>
                            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
                    <div class="email_container">
                        <table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td class="content_cell">
                                    <table class="hr_rl" align="center" width="100%" border="0" cellspacing="0"
                                           cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td class="hr_ep pt">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
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
        <!-- content_center -->
        <table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
            <tr>
                <td class="email_body tc">
                    <!--[if (mso)|(IE)]>
                    <table width="632" border="0" cellspacing="0" cellpadding="0" align="center"
                           style="vertical-align:top;width:632px;Margin:0 auto;">
                        <tbody>
                        <tr>
                            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
                    <div class="email_container">
                        <table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td class="content_cell">
                                    <!-- col-6 -->
                                    <div class="email_row tl">
                                        <!--[if (mso)|(IE)]>
                                        <table width="600" border="0" cellspacing="0" cellpadding="0" align="center"
                                               style="vertical-align:top;width:600px;Margin:0 auto 0 0;">
                                            <tbody>
                                            <tr>
                                                <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                                        <![endif]-->
                                        <div class="col_6">
                                            <table class="column" width="100%" border="0" cellspacing="0"
                                                   cellpadding="0">
                                                <tbody>
                                                <tr>
                                                    <td class="column_cell px tc">
                                                        <p> {!! $welcome_letter !!}</p>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
                                    </div>
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
        <!-- button_accent -->
        <table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
            <tr>
                <td class="email_body tc">
                    <!--[if (mso)|(IE)]>
                    <table width="632" border="0" cellspacing="0" cellpadding="0" align="center"
                           style="vertical-align:top;width:632px;Margin:0 auto;">
                        <tbody>
                        <tr>
                            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
                    <div class="email_container">
                        <table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td class="content_cell tc">
                                    <table class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td class="column_cell px pt_0 pb_xs tc">
                                                <table class="ebtn" align="center" border="0" cellspacing="0"
                                                       cellpadding="0">
                                                    <tbody>
                                                    <tr>
                                                        <td class="btn btn-lg dark invoice"><a
                                                                    href="{{ route('invoice',['id'=>$order_id]) }}"
                                                                    target="_blank"><span><i class="fa fa-file-o"></i>  Invoice </span></a>
                                                        </td>

                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
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
        <!-- spacer-lg -->
        <table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
            <tr>
                <td class="email_body tc">
                    <!--[if (mso)|(IE)]>
                    <table width="632" border="0" cellspacing="0" cellpadding="0" align="center"
                           style="vertical-align:top;width:632px;Margin:0 auto;">
                        <tbody>
                        <tr>
                            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
                    <div class="email_container">
                        <table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td class="content_cell">
                                    <table class="hr_rl" align="center" width="100%" border="0" cellspacing="0"
                                           cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td class="hr_ep pte">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
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
    </div>
</div>


