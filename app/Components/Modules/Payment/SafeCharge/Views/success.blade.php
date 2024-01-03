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
<div class="container">
    <i class="fa fa-check"></i>
    <h3>Thanks for your payment the process will be continued automatically once the payment got finished you may leave this area</h3>
    <a href="{{route('home')}}"> <button class="btn green"> <i class="fa fa-arrow-circle-left"></i> Back To Home</button></a>
</div>

<style>
    .safecharge {
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