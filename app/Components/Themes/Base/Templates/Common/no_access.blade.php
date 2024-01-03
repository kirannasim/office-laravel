@extends('Admin.Layout.master')
@section('title','no acess')
@section('content')
    <html>
    <body>
    <div class="row errorPage">
        <div class="col-sm-4 errorIcon">
            <img src="../images/errors/access403.png">
        </div>
        <div class="col-sm-8 errorText">
            <h3>403</h3>
            <h5>Access Denied</h5>
            <p>Sorry, but you don't have permission to access this page.</br>
                You can go back to <a href="#"><strong>Home page</strong></a>
            </p>
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
            padding: 15% 5%;
            background: transparent;
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

        .errorText {
            padding: 35px 15px;
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
            }
        }
    </style>
@endsection
