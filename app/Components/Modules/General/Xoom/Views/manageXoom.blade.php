@extends(ucfirst(getScope()).'.Layout.master')
@section('content')
    <script src="{{ asset('global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('global/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>

    @foreach($scripts as $script)
        <script type="text/javascript" src="{{ $script }}"></script>
    @endforeach
    @foreach($styles as $style)
        <link href="{{ $style }}" rel="stylesheet" type="text/css"/>
    @endforeach

    <div class="moduleConfiq xoomSection">
        <div class="xoomWrapper"></div>
    </div>
    <script>
        $(function () {
            Ladda.bind('.ladda-button')
            loadXoomList();
        });

        //load xoom list
        function loadXoomList() {
            simulateLoading('.xoomWrapper');
            $.post(' {{ scopeRoute('xoom.users.list') }}', function (response) {
                $('.xoomWrapper').html(response);
                Ladda.stopAll();
            });
        }

    </script>
    <style>
        .xoomWrapper .panel-heading h3 {
            padding: 0px;
            font-size: 17px;
            margin: 0;
            margin-bottom: 0px;
            font-weight: 600;
            padding-bottom: 0px;
            cursor: pointer;
            border-bottom: 0px;
        }

        .moduleConfiq .panel-primary .panel-heading {
            color: #4d4d4d;
            background-color: #eeeeee;
            border-color: #eeeeee;
            font-weight: 600;
        }

        .moduleConfiq .panel-primary .panel-heading {
            color: #919191;
        }

        .moduleConfiq .panel-primary {
            border-color: #eeeeee;
        }

        .moduleConfiq .mt-radio-inline {
            padding: 0px;
        }

        .moduleConfiq input.form-control {
            margin-bottom: 10px;
        }

        .moduleConfiq .profileSection h3 {
            font-size: 17px;
            margin: 0;
            margin-bottom: 0px;
            font-weight: 600;
            padding-bottom: 0px;
            cursor: pointer;
            border-bottom: 0px;
        }

        .xoomWrapper .panel-heading {
            color: #919191;
            background-color: #eeeeee;
            border-color: #eeeeee;
            font-weight: 600;
        }

        .xoomWrapper .panel-heading span {
            padding-top: 4px;
            display: block;
        }

        .xoomWrapper .panel-heading span i {
            font-size: 17px;
        }

        .xoomWrapper .panel-heading button.addNewXoom {
            float: right;
        }

        .xoomWrapper .panel-body table.table button.btn {
            width: 45px;
            display: inline-block !important;
        }

        .row.xoomButton {
            margin: 0px;
        }

        .row.xoomButton button.btn {
            float: right;
            margin-bottom: 10px;
            color: #8a8585;
        }

        .row.xoomButton .col-sm-4 {
            padding: 0pc;
        }

        .moduleConfiq.xoomSection button.btn.backtoXoomList, .moduleConfiq.xoomSection button.btn.backtoCategoryList {
            float: right;
        }

        .moduleConfiq.xoomSection .form-control {
            margin-bottom: 10px;
        }
    </style>
@endsection
