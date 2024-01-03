<html>
<link href="{{ asset('global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<script src="{{ asset('global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<title>{!! getConfig('company_information','company_name') !!} @if(isset($title)) -  {{ $title }}@endif</title>
<body>
<div class="row errorPage">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="col-sm-5 errorIcon">
            <img src="{{ asset('images/errors/access403.png') }}">
        </div>
        <div class="col-sm-7 errorText">
            <h3>403</h3>
            <h5>You are not allowed here</h5>
            <p> {{ $exception->getMessage() }}</p>
            <a href="{{route('user.home')}}">Login</a>
        </div>
    </div>
</div>
</body>
</html>
<style>
    .row.errorPage {
        margin: 0px;
        /*background: url(../images/errors/error-page.png);*/
        height: 100vh;
        background-size: cover;
        position: relative;
        padding: 10% 5%;
        background: transparent;
    }

    .errorText {
        margin-top: 100px;
    }

    /*.row.errorPage:before{
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        top:0px;
        left: 0px;
        right: 0px;
        background: #9d99992e;

    }*/
    .errorIcon img {
        width: 100%;
        opacity: 0.7;
    }

    .errorText h3 {
        font-size: 50px;
        font-weight: 600;
        color: #656565d9;
        margin: 0px;
    }

    .errorText h5 {
        font-size: 26px;
        color: #656565fa;
        margin: 0px;
        font-weight: 500;
    }

    .errorText p {
        margin: 0px;
        padding: 5px 0px;
        color: #333333bd;
        font-size: 16px;
    }

    .errorText p a {
        text-decoration: none;
    }

    @media (max-width: 767px) {
        .row.errorPage {
            padding: 10% 5% !important;
        }

        .errorIcon img {
            width: 200px;
            opacity: 0.7;
            margin: auto;
            display: block;
        }

        .errorText {
            text-align: center;
            padding: 15px 10px;
            margin: 0px;
        }
    }
</style>
