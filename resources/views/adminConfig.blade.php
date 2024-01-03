@extends('Admin.Layout.master')
@section('title','getoncode admin config')
@section('content')
    <!-- BEGIN PAGE HEADER-->

    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Form Stuff</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right">
                <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown">
                    Actions
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a href="#">
                            <i class="icon-bell"></i> Action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-shield"></i> Another action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-user"></i> Something else here</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <i class="icon-bag"></i> Separated link</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END PAGE BAR -->
    <!-- END PAGE HEADER-->
    <div class="row registrationWrapper">
        <div class="col-sm-12">
            {!! Form::open(['route' => ['admin.module.configure',$id],'class' => 'form-horizontal adminconfig','id' => 'adminconfig']) !!}
            <div class="form-group">
                <label class="control-label col-md-3">{{ _t('amount') }}
                    <span class="required" aria-required="true"> * </span>
                </label>
                <div class="col-md-4">
                    <input type="text" value="{{ $commision_data->amount }}" class="form-control" name="amount">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">{{ _t('type') }}</label>
                <div class="mt-radio-list col-md-4">
                    <label class="mt-radio"> {{ _t('flat')}}
                        <input type="radio" value="flat" name="type" @if($commision_data->type=='flat') checked @endif >
                        <span></span>
                    </label>
                    <label class="mt-radio"> {{ _t('percent')}}
                        <input type="radio" value="percent" name="type"
                               @if($commision_data->type=='percent') checked @endif>
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="form-group offset4">
                <div class="col-md-1">
                    <button type="button" value="{{ _('save')}}"
                            class="form-control ladda-button btn green button-submit" data-style="contract"
                            name="amount">{{ _('save') }}</button>
                </div>

            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <script>

        $(function () {

            Ladda.bind('.button-submit');

            var form = $('.adminconfig');
            form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input

                rules: {
                    amount: {
                        minlength: 1,
                        required: true,
                        number: true,
                    },
                    type: {
                        required: true
                    }
                },
                errorPlacement: function (error, element) { // render error placement for each input type
                    error.insertAfter(element);
                },
                invalidHandler: function (event, validator) { //display error alert on form submit
                    success.hide();
                    error.show();
                    App.scrollTo(error, -200);
                },
                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },
                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                }

            });


            //Submit form

            function submitSponsorCommission(options) {

                options.form = $('.adminconfig');
                options.actionUrl = "{{ route('admin.module.configure',['id' => $id]) }}";

                options.failCallBack = function (response) {

                    console.log(response);

                    var errors = response.responseJSON;

                    Ladda.stopAll();

                    for (key in errors) {
                        var dispatch = {};
                        dispatch[key] = errors[key];
                        options.form.validate().showErrors(dispatch);
                    }
                };

                options.successCallBack = function (response) {
                    console.log(response);
                    Ladda.stopAll();

                };

                sendForm(options);
            }

            //Save or edit package

            $('body').on('click', '.button-submit', function () {

                var options = {};

                submitSponsorCommission(options);
            });

        });

    </script>

@endsection
