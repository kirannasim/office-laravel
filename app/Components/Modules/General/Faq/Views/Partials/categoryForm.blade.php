<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="row">
            <div class="col-sm-9"><span><i
                            class="fa fa-pencil-square-o"></i> @if($categoryData->get('id'))  {{ _mt($moduleId,'Faq.edit_category') }} @else {{ _mt($moduleId,'Faq.add_category') }} @endif </span>
            </div>
            <div class="col-sm-3">
                <button class="btn btn-transparent btn-outline btn-circle backtoCategoryList ladda-button"
                        data-style="contract"><i class="fa fa-chevron-left"
                                                 aria-hidden="true"></i> {{ _mt($moduleId,'Faq.back') }} </button>
            </div>
        </div>
    </div>

    <div class="panel-body categoryForm" style="display: block">
        {!! Form::open(['route' => 'admin.faq.category.save', 'method' => 'post', 'class' => 'categoryForm' , 'id' => 'categoryForm']) !!}
        @if($categoryData->get('id'))
            <input type="hidden" name="id" value="{{ $categoryData->get('id') }}">
        @endif
        <div class="row form-group">

            <div id="exTab1" class="faqTab-Wrapper">
                <div class="row" style="margin: 0px;">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-7">
                        <ul class="nav nav-pills">

                            @php
                                $languages = json_decode(getConfig('localization','manage_language'));
                            @endphp

                            @foreach($languages as  $lang)

                                <li @if($loop->iteration ==1) class="active" @endif >
                                    <a href="#{{ $lang }}" data-toggle="tab">
                                        <img src="{{ asset("images/flags/flags_iso/16/".$lang.'.png') }}">
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="col-md-3">
                    <label class="control-label">{{ _mt($moduleId,'Faq.title') }}<span class="required"
                                                                                       aria-required="true"> * </span></label>
                </div>
                <div class="tab-content clearfix">

                    @foreach($languages as $lang)
                        <div @if($loop->iteration == 1) class="tab-pane active" @else class="tab-pane"
                             @endif  id="{{ $lang }}">
                            <div class="col-md-7">
                                <input type="text" class="form-control" placeholder="{{ _mt($moduleId,'Faq.title') }}"
                                       name="title[{{ $lang }}]"
                                       value="{{ isset($categoryData->get('title')[$lang]) ? $categoryData->get('title')[$lang] : '' }}">
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>


        </div>
        <div class="row form-group">
            <div class="col-md-3">
                <label class="control-label">{{ _mt($moduleId,'Faq.sort_order') }}</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" placeholder="{{ _mt($moduleId,'Faq.sort_order') }}"
                       name="sort_order"
                       value="{{ $categoryData->get('sort_order') }}">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-offset-3 col-md-3">
                <button type="button" class="btn dark btn-success ladda-button button-submit" data-style="contract">
                    {{ _mt($moduleId,'Faq.save') }}
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<script>
    'use strict';
    $(function () {


        $('.backtoCategoryList').click(function () {
            loadCategoryList();
        });

        Ladda.bind('.ladda-button');

        var form = $('#categoryForm');
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
                'sort_order': {
                    number: true,
                    ajaxValidate: true,
                },
            },
            messages: {
                'title': {
                    required: "{{ _mt($moduleId,'Faq.Please_enter_category_name') }}",
                },
                'sort_order': {
                    required: "{{ _mt($moduleId,'Faq.Please_enter_valid_sort_order') }}",
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
        /*$('body').on('click', 'button.removeRow', function () {
            $(this).closest('.eachRowPinAmount').remove();
        });*/
        $('.categoryForm .button-submit').click(function () {
            $('.ajaxValidationError').removeClass('ajaxValidationError');

            var successCallBack = function (response) {
                Ladda.stopAll();
                toastr.success("{{ _mt($moduleId,'Faq.category_updated_successfully') }}");
            };

            if (!form.valid()) {
                Ladda.stopAll();
                return false;
            }

            var failCallBack = function (response) {
                Ladda.stopAll();
                var errors = response.responseJSON;

                for (var key in errors) {
                    var elemKey = key;
                    $('#categoryForm [name="' + elemKey + '"]').parent().addClass('ajaxValidationError');
                    var errorOption = {};
                    errorOption[elemKey] = errors[key];
                    validator.showErrors(errorOption);
                }
            };

            var options = {
                form: form,
                actionUrl: "{{ scopeRoute('faq.category.save') }}",
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

