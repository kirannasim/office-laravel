@extends('Admin.Layout.master')
@section('content')
    <div class="row NotificationWrapper">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="portlet">

                <div class="portlet-body">
                    {!! Form::open(['route' => 'admin.notification.send','class' => 'NotificationForm ajaxSave','id' => 'NotificationForm', 'novalidate' => 'novalidate']) !!}
                    <div class="row notificationInner_Wrapper">

                        <div class="form-group ">
                            <div class="col-md-12">
                                <label for="form_control_1"> {{ _t('notification.select_all_user') }}</label>
                                <input type="checkbox" name="selectAll" value="1" class="selectAllUser">
                            </div>
                        </div>
                        <div class="userSelectWrapper">
                            <div class="form-group">
                                <label for="form_control_1"
                                       class="col-md-12 control-label">{{ _t('notification.username') }}</label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control userFiller"
                                               placeholder="{{ _t('notification.username') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="userHolder"></div>
                        </div>
                        <div class="form-group">
                            <label for="form_control_1"
                                   class="col-md-12 control-label">{{ _t('notification.subject') }}</label>
                            <div class="col-md-12">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-list-alt"></i>
                                        </span>
                                    <input type="text" name="subject" class="form-control subject"
                                           placeholder="{{ _t('notification.subject') }}">
                                </div>
                            </div>
                        </div>

                        {{--<div class="userSelectWrapper">
                            <div class="form-group form-md-line-input form-md-floating-label">
                                <label for="form_control_1"> {{ _t('notification.username') }}</label>
                                <input type="text" class="userFiller"/>
                            </div>
                            <div class="userHolder"></div>
                        </div>--}}

                        {{--<div class="form-group form-md-line-input form-md-floating-label">
                            <label for="form_control_1"> {{ _t('notification.subject') }}</label>
                            <input type="text" name="subject" class="subject"/>
                        </div>--}}

                        <div class="form-group" style="display: block;">
                            <label for="form_control_1"
                                   class="col-md-12 control-label">{{ _t('notification.message') }}</label>
                            <div class="col-md-12">
                                <textarea name="message" id="message" class="form-control"
                                          style="width: 100%;height: 150px"
                                          maxlength="140"></textarea>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="col-md-12">
                                <button type="button" class="btn blue submitForm ladda-button"
                                        data-style="contract">
                                    <span class="fa fa-paper-plane"></span> {{ _t('notification.send') }}
                                </button>
                            </div>
                        </div>


                    </div>
                    {!! Form::close() !!}
                </div>


            </div>
        </div>
    </div>
    <script>"use strict";

        $(function () {
            Ladda.bind('.submitForm');

            //User fetcher
            var selectedCallback = function (target, id, name) {

                var exists = false;

                $('.eachUser').each(function () {
                    if ($(this).attr('data-id') === id) exists = true;
                });

                if (exists) return false;

                var html = '<div class="eachUser" data-id="' + id + '">';
                html += '   <div class="col-md-10"><span class="name">' + name + '</span></div>';
                html += '   <input type="hidden" name="users[]" value="' + id + '">';
                html += '   <div class="col-md-2"><button class="btn red remove"><i class="fa fa-close"></i></button></div>';
                html += '</div>';

                $('.userHolder').slideDown().append(html);
            };
            var options = {
                target: '.userFiller',
                route: '{{ route("user.api") }}',
                action: 'getUsers',
                name: 'username',
                selectedCallback: selectedCallback
            };
            $('.userFiller').ajaxFetch(options);

            //Remove user from list
            $('body').on('click', '.eachUser .remove', function () {
                $(this).closest('.eachUser').remove();
            });

        });


        $('.submitForm').on('click', function () {

            var targetForm = $('form.ajaxSave');
            var validateInstance = targetForm.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    message: {
                        required: true,
                    }
                },
                errorPlacement: function (error, element) {
                    if (element.is(':checkbox')) {
                        error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
                    } else if (element.is(':radio')) {
                        error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },
                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },
                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },
                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },
            });

            var failCallBack = function (response) {
                Ladda.stopAll();
                var errors = response;
                for (key in errors) {
                    var errToShow = {};
                    errToShow[key] = errors[key];
                    validateInstance.showErrors(errToShow);
                }
            };

            var successCallBack = function (response) {
                Ladda.stopAll();
                console.log(response);
                toastr.success("{{ _t('notification.notifications_send_successfully') }}");
            };

            var options = {
                form: targetForm,
                successCallBack: successCallBack,
                failCallBack: failCallBack,
            };
            sendForm(options);
        });


        $('.selectAllUser').change(function () {
            if ($(this).is(":checked")) {
                $('.userSelectWrapper').hide();
            } else {
                $('.userSelectWrapper').show();
            }
        });


    </script>
    <style>
        .notificationInner_Wrapper {
            border: solid 1px #ddd;
            /*overflow: hidden;*/
            margin: 10px;
            padding: 35px;
            background-color: #fff;
        }

        .page-content {
            background-color: #eee;
        }

        .notificationInner_Wrapper .form-group {
            margin-bottom: 15px !important;
            display: inline-block;
        }

        .notificationInner_Wrapper .form-group label.control-label {
            color: #777575;
            padding-bottom: 5px;
            font-weight: 600;
        }

        .notificationInner_Wrapper .userHolder {
            max-width: 545px;
            margin: 15px auto;
        }

        .notificationInner_Wrapper button.btn.blue.submitForm {
            margin-top: 15px;
        }
    </style>
@endsection
