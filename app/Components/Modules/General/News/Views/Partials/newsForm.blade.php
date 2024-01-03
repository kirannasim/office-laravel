{!! Form::open(['route' => getScope().'.news.save','class' => 'NewsForm ajaxSave','id' => 'NewsForm', 'novalidate' => 'novalidate']) !!}
<div class="portlet-body fieldFormUnitHolder" style="position: relative;">


    <div id="exTab1" class="Tab-Wrapper">
        <div class="row" style="margin: 0px;">

            <div class="col-sm-12">
                <ul class="nav nav-pills">
                    @php
                        $languages = json_decode(getConfig('localization','manage_language'));
                    @endphp
                    @foreach($languages as $lang)

                        <li @if($loop->iteration ==1) class="active" @endif >
                            <a href="#{{ $lang }}" data-toggle="tab">
                                <img src="{{ asset("images/flags/flags_iso/16/".$lang.'.png') }}">
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


        <div class="tab-content clearfix">

            @foreach($languages as $lang)
                <div @if($loop->iteration == 1) class="tab-pane active" @else class="tab-pane" @endif  id="{{ $lang }}">
                    <div class="row fieldHolder flex">
                        <div class="col-md-4">
                            <label>{{ _mt($moduleId,'News.Title') }}</label>
                        </div>
                        <div class="col-md-8">
                            <div class="inputHolder flex">
                                <i class="fa fa-building"></i>
                                <input type="text" placeholder="{{ _mt($moduleId,'News.Title') }}"
                                       name="title[{{ $lang }}]"
                                       value="">
                            </div>
                        </div>
                    </div>
                    <div class="row fieldHolder">
                        <div class="col-md-4">
                            <label>{{ _mt($moduleId,'News.Content') }}</label>
                        </div>
                        <div class="col-md-8">
                            <div class="inputHolder flex">
                                <textarea name="content[{{ $lang }}]"></textarea>
                            </div>
                        </div>
                    </div>

                </div>



            @endforeach

        </div>
    </div>

    <input type="hidden" id="id" name="id" value="">

    <div class="row fieldHolder flex" style="margin: 0px 0px 15px 0px;">
        <div class="col-md-4">
            <label for="title">Date and Time</label>
        </div>
        <div class="col-md-8">
            <div class="inputHolder">
                <i class="fa fa-calendar"></i>
                <input name="dispatch_date" class="dateTime" placeholder="select date time" type="text" readonly>
            </div>
        </div>
    </div>
    <div class="row" style="margin: 0px;">
        <div class="col-sm-12">
            <div class="form-group">
                <button type="button" class="btn green button-submit"
                        data-style="contract"><i class="fa fa-check"></i> {{ _mt($moduleId,'News.Save') }}
                </button>
                <button type="button" class="btn black resetForm"
                        data-style="contract"><i class="fa fa-refresh"></i> Reset
                </button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

<script type="text/javascript">
    "use strict";

    //Document ready functions

    $(function () {

        $('.resetForm').click(function () {
            loadForm();
        });

        $("[name='content']").summernote({
            placeholder: 'Write here...',
            height: 150
        });
        $(".dateTime").datetimepicker({
            format: "yyyy:m:d hh:ii"
        });

        var form = $('#NewsForm');
        var error1 = $('.alert-danger', form);
        var success1 = $('.alert-success', form);

        $.validator.addMethod('ajaxValidate', function (value, element, param) {
            var isValid = !$(element).parent().hasClass('ajaxValidationError');
            return isValid; // return bool here if valid or not.
        }, function (param, element) {
            return $(element).siblings('.help-block-error').text();
        });

        var validator = form.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
                'title': {
                    required: true,
                    ajaxValidate: true,
                },
                'content': {
                    required: true,
                    ajaxValidate: true,
                },
                'dispatch_date': {
                    required: true,
                    ajaxValidate: true,
                },
            },
            messages: {
                'title': {
                    required: "{{ _mt($moduleId,'News.Please_enter_title') }}",
                },
                'content': {
                    required: "{{ _mt($moduleId,'News.Please_enter_content') }}",
                },
                'dispatch_date': {
                    required: "{{ _mt($moduleId,'News.Please_enter_dispatch_date') }}",
                },
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

        //Registration request

        $('.fieldFormUnitHolder .button-submit').click(function () {

            $('.ajaxValidationError').removeClass('ajaxValidationError');

            var successCallBack = function (response) {
                Ladda.stopAll();
                LoadList();
                loadForm();
                toastr.success("{{ _mt($moduleId,'News.news_updated_successfully') }}");
            };

            if (!form.valid()) {
                Ladda.stopAll();
                return false;
            }

            var failCallBack = function (response) {
                Ladda.stopAll();
                toastr.error("{{ _mt($moduleId,'News.please_check_all_fields') }}");
                var errors = response.responseJSON;

                for (var key in errors) {
                    var elemKey = key;
                    $('#NewsForm [name="' + elemKey + '"]').parent().addClass('ajaxValidationError');
                    var errorOption = {};
                    errorOption[elemKey] = errors[key];
                    validator.showErrors(errorOption);
                }
            };

            var options = {
                form: form,
                actionUrl: "{{ scopeRoute('news.save') }}",
                successCallBack: successCallBack,
                failCallBack: failCallBack
            };
            sendForm(options);
        });
    });

    //Small patch

    $('body').on('keyup click', '.ajaxValidationError input', function () {
        $(this).parent().removeClass('ajaxValidationError');
    });
</script>

<style>
    .Tab-Wrapper .row {
        margin: 0px;
    }

    .Tab-Wrapper ul.nav.nav-pills li.active a {
        background-color: #c8c9ca;
        border: solid 1px #ddd;
    }

    .Tab-Wrapper ul.nav.nav-pills li a {
        border: solid 1px #ddd;
    }

    .Tab-Wrapper .tab-content input {
        height: 32px;
        border: solid 1px #ddd;
        padding: 0px 10px;
        width: 100%;
    }

    .Tab-Wrapper .tab-content textarea {
        border: solid 1px #ddd;
        padding: 2px 10px;
        width: 100%;
    }

    .newsForm .fieldHolder.flex label {
        font-weight: 400;
    }

    .newsForm .row.fieldHolder.flex .help-block.help-block-error {
        display: block;
        position: absolute;
        bottom: 0px;
        top: 26px;
    }
</style>
