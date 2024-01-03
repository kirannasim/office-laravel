<div class="vccWrap">
    <div class="cardWrapper">
        <div class="card">
            <div class="bank-name" title="BestBank">HYBRID MLM SOFTWARE</div>
            <div class="chip">
                <div class="side left"></div>
                <div class="side right"></div>
                <div class="vertical top"></div>
                <div class="vertical bottom"></div>
            </div>
            <div class="data">
                <div class="pan" title="4123 4567 8910 1112">4123 4567 8910 1112</div>
                <div class="first-digits">4123</div>
                <div class="exp-date-wrapper">
                    <div class="left-label">EXPIRES END</div>
                    <div class="exp-date">
                        <div class="upper-labels">MONTH/YEAR</div>
                        <div class="date" title="01/17">01/17</div>
                    </div>
                </div>
                <div class="name-on-card" title="John Doe">John Alex</div>
            </div>
            <div class="lines-down"></div>
            <div class="lines-up"></div>
        </div>
        <div class="vccInfo">
            <div class="vccStatus">
                <i class="icon-check"></i>
                <span>{{ _mt($moduleId,'Ewallet.Active') }}</span>
            </div>
        </div>
    </div>
    <div class="vccActions">
        <div class="col-md-3 col-md-offset-3 vccAction disable">
            <i class="icon-lock"></i>
            <div class="handlerInner">{{ _mt($moduleId,'Ewallet.Disable') }}</div>
        </div>
        <div class="col-md-3 vccAction cancel">
            <i class="icon-trash"></i>
            <div class="handlerInner">{{ _mt($moduleId,'Ewallet.Cancel') }}</div>
        </div>
    </div>
</div>
<style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Iceland);
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,800);

    .card {
        position: relative;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        margin: auto;
        width: 350px;
        height: 53.98mm;
        color: #fff;
        border-radius: 5px !important;
        font: 22px/1 'Iceland', monospace;
        background: #00abff;
        border: 1px solid #ffffff;
        -webkit-border-radius: 10px;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 10px;
        -moz-background-clip: padding;
        background-clip: padding-box;
        overflow: hidden;
    }

    .bank-name {
        float: right;
        margin-top: 15px;
        margin-right: 30px;
        font: 800 18px 'Open Sans', Arial, sans-serif;
    }

    .chip {
        position: relative;
        z-index: 1000;
        width: 50px;
        height: 40px;
        margin-top: 50px;
        margin-bottom: 10px;
        margin-left: 30px;
        background: #fffcb1;
        /* Old browsers */
        background: -moz-linear-gradient(-45deg, #fffcb1 0%, #b4a365 100%);
        /* FF3.6+ */
        background: -webkit-gradient(linear, left top, right bottom, color-stop(0%, #fffcb1), color-stop(100%, #b4a365));
        /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(-45deg, #fffcb1 0%, #b4a365 100%);
        /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(-45deg, #fffcb1 0%, #b4a365 100%);
        /* Opera 11.10+ */
        background: -ms-linear-gradient(-45deg, #fffcb1 0%, #b4a365 100%);
        /* IE10+ */
        background: linear-gradient(135deg, #fffcb1 0%, #b4a365 100%);
        /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#fffcb1", endColorstr="#b4a365", GradientType=1);
        /* IE6-9 fallback on horizontal gradient */
        border: 1px solid #322d28;
        -webkit-border-radius: 10px;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 10px;
        -moz-background-clip: padding;
        border-radius: 10px;
        background-clip: padding-box;
        -webkit-box-shadow: 0 1px 2px #322d28, 0 0 5px 0 0 5px rgba(144, 133, 87, 0.25) inset;
        -moz-box-shadow: 0 1px 2px #322d28, 0 0 5px 0 0 5px rgba(144, 133, 87, 0.25) inset;
        box-shadow: 0 1px 2px #322d28, 0 0 5px 0 0 5px rgba(144, 133, 87, 0.25) inset;
        overflow: hidden;
    }

    .chip .side {
        position: absolute;
        top: 8px;
        width: 12px;
        height: 24px;
        border: 1px solid #322d28;
        -webkit-box-shadow: 0 0 5px rgba(144, 133, 87, 0.25) inset, 0 0 5px rgba(144, 133, 87, 0.25), 0 0 4px rgba(0, 0, 0, 0.1), 0 0 4px rgba(0, 0, 0, 0.1) inset;
        -moz-box-shadow: 0 0 5px rgba(144, 133, 87, 0.25) inset, 0 0 5px rgba(144, 133, 87, 0.25), 0 0 4px rgba(0, 0, 0, 0.1), 0 0 4px rgba(0, 0, 0, 0.1) inset;
        box-shadow: 0 0 5px rgba(144, 133, 87, 0.25) inset, 0 0 5px rgba(144, 133, 87, 0.25), 0 0 4px rgba(0, 0, 0, 0.1), 0 0 4px rgba(0, 0, 0, 0.1) inset;
    }

    .chip .side.left {
        left: 0;
        border-left: none;
        -webkit-border-radius: 0 2px 2px 0;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 0 2px 2px 0;
        -moz-background-clip: padding;
        border-radius: 0 2px 2px 0;
        background-clip: padding-box;
    }

    .chip .side.right {
        right: 0;
        border-right: none;
        -webkit-border-radius: 2px 0 0 2px;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 2px 0 0 2px;
        -moz-background-clip: padding;
        border-radius: 2px 0 0 2px;
        background-clip: padding-box;
    }

    .chip .side:after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        display: inline-block;
        width: 100%;
        height: 0px;
        margin: auto;
        border-top: 1px solid #322d28;
        -webkit-box-shadow: 0 0 5px rgba(144, 133, 87, 0.25) inset, 0 0 5px rgba(144, 133, 87, 0.25), 0 0 4px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0 0 5px rgba(144, 133, 87, 0.25) inset, 0 0 5px rgba(144, 133, 87, 0.25), 0 0 4px rgba(0, 0, 0, 0.1);
        box-shadow: 0 0 5px rgba(144, 133, 87, 0.25) inset, 0 0 5px rgba(144, 133, 87, 0.25), 0 0 4px rgba(0, 0, 0, 0.1);
    }

    .chip .vertical {
        position: absolute;
        left: 0;
        right: 0;
        margin: 0 auto;
        width: 8.66666667px;
        height: 12px;
        border: 1px solid #322d28;
        -webkit-box-shadow: 0 0 5px rgba(144, 133, 87, 0.25) inset, 0 0 5px rgba(144, 133, 87, 0.25), 0 0 4px rgba(0, 0, 0, 0.1), 0 0 4px rgba(0, 0, 0, 0.1) inset;
        -moz-box-shadow: 0 0 5px rgba(144, 133, 87, 0.25) inset, 0 0 5px rgba(144, 133, 87, 0.25), 0 0 4px rgba(0, 0, 0, 0.1), 0 0 4px rgba(0, 0, 0, 0.1) inset;
        box-shadow: 0 0 5px rgba(144, 133, 87, 0.25) inset, 0 0 5px rgba(144, 133, 87, 0.25), 0 0 4px rgba(0, 0, 0, 0.1), 0 0 4px rgba(0, 0, 0, 0.1) inset;
    }

    .chip .vertical.top {
        top: 0;
        border-top: none;
    }

    .chip .vertical.top:after {
        top: 12px;
        width: 17.33333333px;
    }

    .chip .vertical.bottom {
        bottom: 0;
        border-bottom: none;
    }

    .chip .vertical.bottom:after {
        bottom: 12px;
    }

    .chip .vertical:after {
        content: '';
        position: absolute;
        left: -8.66666667px;
        display: inline-block;
        width: 26px;
        height: 0px;
        margin: 0;
        border-top: 1px solid #322d28;
        -webkit-box-shadow: 0 0 5px rgba(144, 133, 87, 0.25) inset, 0 0 5px rgba(144, 133, 87, 0.25), 0 0 4px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0 0 5px rgba(144, 133, 87, 0.25) inset, 0 0 5px rgba(144, 133, 87, 0.25), 0 0 4px rgba(0, 0, 0, 0.1);
        box-shadow: 0 0 5px rgba(144, 133, 87, 0.25) inset, 0 0 5px rgba(144, 133, 87, 0.25), 0 0 4px rgba(0, 0, 0, 0.1);
    }

    .data {
        position: relative;
        z-index: 100;
        margin-left: 30px;
        text-transform: uppercase;
    }

    .data .pan, .data .month, .data .year, .data .year:before, .data .name-on-card, .data .date {
        position: relative;
        z-index: 20 !important;
        letter-spacing: 1px;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.56);
    }

    .data .pan:before,
    .data .month:before,
    .data .year:before,
    .data .year:before:before,
    .data .name-on-card:before,
    .data .date:before,
    .data .pan:after,
    .data .month:after,
    .data .year:after,
    .data .year:before:after,
    .data .name-on-card:after,
    .data .date:after {
        position: absolute;
        z-index: -10;
        content: attr(title);
        color: rgba(0, 0, 0, 0.2);
        text-shadow: none;
    }

    .data .pan:before,
    .data .month:before,
    .data .year:before,
    .data .year:before:before,
    .data .name-on-card:before,
    .data .date:before {
        top: -1px;
        left: -1px;
        color: rgba(0, 0, 0, 0.1);
    }

    .data .pan:after,
    .data .month:after,
    .data .year:after,
    .data .year:before:after,
    .data .name-on-card:after,
    .data .date:after {
        top: 1px;
        left: 1px;
        z-index: 10;
    }

    .data .pan {
        position: relative;
        z-index: 50;
        margin: 0;
        letter-spacing: 1px;
        font-size: 26px;
    }

    .data .first-digits {
        margin: 0;
        font: 400 10px/1 'Open Sans', Arial, sans-serif;
    }

    .data .exp-date-wrapper {
        margin-top: 5px;
        margin-left: 64px;
        line-height: 1;
        *zoom: 1;
    }

    .data .exp-date-wrapper:before,
    .data .exp-date-wrapper:after {
        content: " ";
        display: table;
    }

    .data .exp-date-wrapper:after {
        clear: both;
    }

    .data .exp-date-wrapper .left-label {
        float: left;
        display: inline-block;
        width: 40px;
        font: 400 7px/8px 'Open Sans', Arial, sans-serif;
        letter-spacing: 0.5px;
    }

    .data .exp-date-wrapper .exp-date {
        display: inline-block;
        float: left;
        margin-top: -10px;
        margin-left: 10px;
        text-align: center;
    }

    .data .exp-date-wrapper .exp-date .upper-labels {
        font: 400 7px/1 'Open Sans', Arial, sans-serif;
    }

    .data .exp-date-wrapper .exp-date .year:before {
        content: '/';
    }

    .data .name-on-card {
        margin-top: 10px;
    }

    .lines-down:before {
        content: '';
        position: absolute;
        top: 80px;
        left: -200px;
        z-index: 10;
        width: 550px;
        height: 400px;
        border-top: 2px solid #0e94d6;
        -webkit-border-radius: 40% 60% 0 0;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 40% 60% 0 0;
        -moz-background-clip: padding;
        border-radius: 40% 60% 0 0;
        background-clip: padding-box;
        box-shadow: 1px 1px 100px #00abff;
        background: #118ac5;
        background: -moz-radial-gradient(center, ellipse cover, rgba(45, 33, 166, 0) 100%, #2d21a6 100%);
        background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(45, 33, 166, 0)), color-stop(100%, #2d21a6));
        background: -webkit-radial-gradient(center, ellipse cover, rgba(45, 33, 166, 0) 100%, #00abff 100%);
        background: -o-radial-gradient(center, ellipse cover, rgba(45, 33, 166, 0) 44%, #2d21a6 100%);
        background: -ms-radial-gradient(center, ellipse cover, rgba(45, 33, 166, 0) 44%, #2d21a6 100%);
        background: radial-gradient(ellipse at center, rgba(45, 33, 166, 0) 44%, #00abff 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="rgba(45, 33, 166, 0)", endColorstr="#2d21a6", GradientType=1);
    }

    .lines-down:after {
        content: '';
        position: absolute;
        top: 20px;
        left: -100px;
        z-index: 10;
        width: 350px;
        height: 400px;
        border-top: 2px solid #17a1e4;
        -webkit-border-radius: 20% 80% 0 0;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 20% 80% 0 0;
        -moz-background-clip: padding;
        border-radius: 20% 80% 0 0;
        background-clip: padding-box;
        box-shadow: inset -1px -1px 44px #00abff;
        background: #00abff;
        background: -moz-radial-gradient(center, ellipse cover, rgba(45, 33, 166, 0) 100%, #2d21a6 100%);
        background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(45, 33, 166, 0)), color-stop(100%, #2d21a6));
        background: -webkit-radial-gradient(center, ellipse cover, rgba(45, 33, 166, 0) 100%, #0d587d 100%);
        background: -o-radial-gradient(center, ellipse cover, rgba(45, 33, 166, 0) 44%, #2d21a6 100%);
        background: -ms-radial-gradient(center, ellipse cover, rgba(45, 33, 166, 0) 44%, #2d21a6 100%);
        background: radial-gradient(ellipse at center, rgba(45, 33, 166, 0) 44%, #0896dc 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="rgba(45, 33, 166, 0)", endColorstr="#2d21a6", GradientType=1);
    }

    .lines-up:before {
        content: '';
        position: absolute;
        top: -110px;
        left: -70px;
        z-index: 2;
        width: 480px;
        height: 300px;
        border-bottom: 2px solid #00abff;
        -webkit-border-radius: 0 0 60% 90%;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 0 0 60% 90%;
        -moz-background-clip: padding;
        border-radius: 0 0 60% 90%;
        background-clip: padding-box;
        box-shadow: inset 1px 1px 44px #00abff;
        background: #00abff;
        background: -moz-radial-gradient(center, ellipse cover, rgba(64, 49, 178, 0) 100%, #23189a 100%);
        background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(64, 49, 178, 0)), color-stop(100%, #23189a));
        background: -webkit-radial-gradient(center, ellipse cover, rgba(64, 49, 178, 0) 100%, #00abff 100%);
        background: -o-radial-gradient(center, ellipse cover, rgba(64, 49, 178, 0) 44%, #23189a 100%);
        background: -ms-radial-gradient(center, ellipse cover, rgba(64, 49, 178, 0) 44%, #23189a 100%);
        background: radial-gradient(ellipse at center, rgba(64, 49, 178, 0) 44%, #00abff 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="rgba(64, 49, 178, 0)", endColorstr="#23189a", GradientType=1);
    }

    .lines-up:after {
        content: '';
        position: absolute;
        top: -180px;
        left: -200px;
        z-index: 1;
        width: 50%;
        height: 100%;
        border-bottom: 2px solid #00abff;
        -webkit-border-radius: 0 40% 50% 50%;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 0 40% 50% 50%;
        -moz-background-clip: padding;
        border-radius: 0 40% 50% 50%;
        background-clip: padding-box;
        box-shadow: inset 1px 1px 44px #00abff;
        background: #00abff;
        background: -moz-radial-gradient(center, ellipse cover, rgba(45, 33, 166, 0) 100%, #2d21a6 100%);
        background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(45, 33, 166, 0)), color-stop(100%, #2d21a6));
        background: -webkit-radial-gradient(center, ellipse cover, rgba(45, 33, 166, 0) 100%, #2d21a6 100%);
        background: -o-radial-gradient(center, ellipse cover, rgba(45, 33, 166, 0) 44%, #2d21a6 100%);
        background: -ms-radial-gradient(center, ellipse cover, rgba(45, 33, 166, 0) 44%, #2d21a6 100%);
        background: radial-gradient(ellipse at center, rgba(45, 33, 166, 0) 44%, #00abff 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="rgba(45, 33, 166, 0)", endColorstr="#2d21a6", GradientType=1);
    }

    .vccStatus {
        background: #26c281;
        color: white;
    }

    .vccInfo > div {
        display: inline-block;
        font-size: 10px;
        border-radius: 3px !important;
        padding: 3px;
    }

    .vccActions {
        overflow: hidden;
        text-align: center;
    }

    .vccAction i {
        font-size: 26px;
        line-height: 1;
    }

    .handlerInner {
        font-size: 12px;
    }

    .vccAction {
        padding: 5px;
        cursor: pointer;
        color: white;
    }

    .vccAction.disable {
        background: #bfbfbf;
    }

    .vccAction.cancel {
        background: #dc5861;
    }

    .vccInfo {
        text-align: center;
        margin: 10px;
    }
</style>