@extends('Admin.Layout.master')
@section('title','getoncode Currency')
@section('content')
    <div class="currencyWrapper"></div>
    <script>"use strict";

        $(function () {
            loadCurrencyTable();
        });

        // load table view for currency
        function loadCurrencyTable() {
            simulateLoading('.currencyWrapper')
            $.get("{{ route('currency.table') }}", function (response) {
                $('.currencyWrapper').html(response);
            });
        }

        function loadCurrencyForm(id) {
            simulateLoading('.currencyWrapper')
            $.post("{{ route('currency.Form') }}", {currencyId: id}, function (response) {
                $('.currencyWrapper').html(response);
            })
        }
    </script>
    <style>
        .currencyWrapper {
            position: relative;
            background-color: #fff;
            padding: 15px;
            border: solid 1px #ddd;
        }

        .portlet-body.currencyTable button.btn {
            display: inline-block !important;
        }

        .page-content {
            background: #eee;
        }

        button.bubble.pulse-button.animated.addNewCurrency {
            color: #fff;
            height: 40px;
            float: right;
            animation: none !important;
        }

        .currencyAddsection form.currencyForm {
            /*background-color: #fff;
            padding: 40px 20px;
            overflow: hidden;
            border: solid 1px #ddd;*/
        }

        button.bubble.pulse-button.animated.showCurrencyTable {
            color: #fff;
            height: 40px;
            float: right;
            margin: 0px 15px;
        }

        button.btn.dark.btn-primary.saveCurrency {
            padding: 6px 20px;
        }

        button.btn.btn-primary.editCurrency {
            background-color: #fff;
            color: #337ab7;
            font-size: 14px;
            line-height: 0px;
            padding: 5px !important;
        }

        .currencyWrapper .portlet-title {
            padding-bottom: 10px;
        }

        label.switch.CurrencyAction, label.switch.CurrencyMore {
            position: relative;
            display: inline-block;
            height: 62px;
            width: 63px;
            margin: 0;
            min-height: 0px;
            padding: 0px;
            vertical-align: top;
            margin-top: -14px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        label.switch.CurrencyAction input:checked + .slider {
            background-color: #32c5d2;
        }

        label.switch.CurrencyMore input:checked + .slider {
            background-color: #2196f3;
        }

        label.switch.CurrencyAction .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #cccccc;
            -webkit-transition: .4s;
            transition: .4s;
            border: 0;
            padding: 0;
            display: block;
            margin: 17px 5px;
            min-height: 11px;
        }

        label.switch.CurrencyMore .slider {
            background-color: #b7b4b5;
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            -webkit-transition: .4s;
            transition: .4s;
            border: 0;
            padding: 0;
            display: block;
            margin: 17px 5px;
            min-height: 11px;
            border-radius: 25px !important;
        }

        label.switch.CurrencyAction .slider:before, label.switch.CurrencyMore .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 18px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        label.switch.CurrencyAction input:checked + .slider {
            background-color: #32c5d2;

        }

        input:focus + .slider {
            box-shadow: 0 0 1px transparent;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endsection
