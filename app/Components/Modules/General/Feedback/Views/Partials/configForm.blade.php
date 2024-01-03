<div class="moduleConfiq feedbackForm">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-9">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">{{ _mt($moduleId,'Feedback.Feedback_Form') }}</span>
                    </div>
                    <div class="col-sm-3">
                        <span class="actionButtonDiv">
                            <button class="btn btn-transparent black btn-outline btn-circle btn-sm active backtofeedbackTable"><i
                                        class="fa fa-arrow-left" aria-hidden="true"></i> {{ _mt($moduleId,'Feedback.Back') }}
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            {!! Form::open(['route' =>  ['feedback.saveForm'],'class' => 'feedbackConfigForm ajaxSave','id' => 'feedbackForm', 'novalidate' => 'novalidate']) !!}
            @if(isset($edit_id))
                <input type="hidden" name="feedbackFormId" id="feedbackFormId" value="{{ $edit_id }}">
            @endif
            <div class="portlet-body" style="padding: 10px;">
                <div class="form-group">
                    <label class="control-label">{{ _mt($moduleId,'Feedback.Name') }}</label>
                    <input type="text" name="name" @if(isset($feedbackData)) value="{{ $feedbackData->name }}"
                           @endif class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">{{ _mt($moduleId,'Feedback.Description') }}</label>
                    <textarea name="description" id="description"
                              class="description">@if(isset($feedbackData)) {{ $feedbackData->description }} @endif</textarea>
                </div>
                <div class="form-actions">
                    <div class="eachField row">
                        <div class="">
                            <div class="col-md-12">
                                <button type="button" class="btn green button-submit ladda-button"
                                        data-style="contract">{{ _mt($moduleId,'Feedback.Save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script>
    "use strict";

    $(function () {
        $(".feedbackForm").submit(function (e) {
            e.preventDefault();
            $('.button-submit').trigger('click');
        });

        Ladda.bind('.ladda-button');

        //initialise summernote
        $('.description').summernote({
            placeholder: 'Enter Description here',
            height: 150
        });

        // back to feedback forms
        $('.backtofeedbackTable').click(function () {
            loadFeedbackTable();
        });

        var form = $('#feedbackForm');
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
                'name': {
                    required: true,
                    ajaxValidate: true,
                },
                'description': {
                    required: true,
                    ajaxValidate: true,
                },
            },
            messages: {
                'name': {
                    required: "{{ _mt($moduleId,'Feedback.Please_enter_name') }}",
                },
                'description': {
                    required: "{{ _mt($moduleId,'Feedback.Please_enter_description') }}",
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

        $('.feedbackForm .button-submit').click(function () {

            $('.ajaxValidationError').removeClass('ajaxValidationError');

            var successCallBack = function (response) {
                Ladda.stopAll();
                toastr.success("{{ _mt($moduleId,'Feedback.Form_added_successfully') }}");
            }

            if (!form.valid()) {
                Ladda.stopAll();
                return false;
            }

            var failCallBack = function (response) {
                Ladda.stopAll();
                var errors = response.responseJSON;

                for (var key in errors) {
                    var elemKey = key;
                    $('#feedbackForm [name="' + elemKey + '"]').parent().addClass('ajaxValidationError');
                    var errorOption = {};
                    errorOption[elemKey] = errors[key];
                    validator.showErrors(errorOption);
                }
            }

            var options = {
                form: form,
                actionUrl: "{{ route('feedback.saveForm') }}",
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
    .actionButtonDiv {
        float: right;
    }

    .page-content {
        background: #fff;
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
</style>
