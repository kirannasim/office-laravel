<div class="col-sm-12 feedbackConfigForm">
    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption caption-md">
                <i class="icon-globe theme-font hide"></i>
                <span class="caption-subject font-blue-madison bold uppercase">{{ _mt($moduleId,'Feedback.Feedback_Question') }}</span>
                <span
                        class="actionButtonDiv"><button
                            class="btn btn-transparent black btn-outline btn-circle btn-sm active backtofeedbackTable"><i
                                class="fa fa-arrow-left"
                                aria-hidden="true"></i> {{ _mt($moduleId,'Feedback.Back') }} </button>  </span>
            </div>
        </div>
        {!! Form::open(['route' =>  ['feedback.question.saveForm'],'class' => 'feedbackConfigForm ajaxSave bluePrintForm','id' => 'feedbackConfigForm', 'novalidate' => 'novalidate']) !!}

        @if(isset($edit_id))
            <input type="hidden" name="questionId" id="questionId" value="{{ $edit_id }}">
        @endif
        @if(isset($feedbackFormId))
            <input type="hidden" name="form_id" id="form_id" value="{{ $feedbackFormId }}">
        @endif

        <div class="portlet-body">
            <div class="form-group">
                <label class="control-label">{{ _mt($moduleId,'Feedback.Question') }}</label>
                <textarea name="question" id="question"
                          class="question">@if(isset($feedbackQuestionData)) {{ $feedbackQuestionData->question }}
                    @endif</textarea>
            </div>

            <div class="form-actions">
                <div class="eachField row">
                    <div class="col-md-12">
                        <button type="button" class="btn green submitForm ladda-button button-submit"
                                data-style="contract">{{ _mt($moduleId,'Feedback.Save') }}
                        </button>
                    </div>
                </div>
            </div>

        </div>

        {!! Form::close() !!}
    </div>
</div>
<script type="text/javascript">
    "use strict";
    //Document ready functions

    $(function () {

        Ladda.bind('.ladda-button');

        $('.question').summernote({
            placeholder: 'Enter Question here',
            height: 150
        });


        $('.backtofeedbackTable').click(function () {
            loadFeedbackTable();
        });

        var form = $('#feedbackConfigForm');
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
                'question': {
                    required: true,
                    ajaxValidate: true,
                },
            },
            messages: {
                'question': {
                    required: "{{ _mt($moduleId,'Feedback.Please_enter_question') }}",
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

        $('.feedbackConfigForm .button-submit').click(function () {

            $('.ajaxValidationError').removeClass('ajaxValidationError');

            var successCallBack = function (response) {
                Ladda.stopAll();
                toastr.success("{{ _mt($moduleId,'Feedback.Question_updated_successfully') }}");
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
                    $('#feedbackConfigForm [name="' + elemKey + '"]').parent().addClass('ajaxValidationError');
                    var errorOption = {};
                    errorOption[elemKey] = errors[key];
                    validator.showErrors(errorOption);
                }
            }

            var options = {
                form: form,
                actionUrl: "{{ route('feedback.question.saveForm') }}",
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
        margin-left: 500px;
    }
</style>
