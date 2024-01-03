@foreach($scripts as $script)
    <script type="text/javascript" src="{{ $script }}"></script>
@endforeach
@foreach($styles as $style)
    <link href="{{ $style }}" rel="stylesheet" type="text/css"/>
@endforeach
<div class="row moduleConfig Binary">
    <div class="col-sm-12">
        {!! Form::open(['route' => ['admin.module.configure',$moduleId],'class' => 'form-horizontal adminConfig','id' => 'adminConfig']) !!}
        <input type="hidden" name="module_data[width]" value="2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span aria-hidden="true" class="icon-tag"></span>
                {{ _mt($moduleId,'Binary.Binary_Plan_Configuration') }}
            </div>
            <div class="panel-body">
                <div class="row form-group">
                    <div class="col-md-3">
                        <label>{{ _mt($moduleId,'Binary.Placement_based_on') }}</label>
                    </div>
                    <div class="col-md-9">
                        <select class="placement_based_on form-control input-medium"
                                name="module_data[placement_based_on]">
                            <option value="left_to_right"
                                    @if($config['placement_based_on'] == 'left_to_right') selected @endif > {{ _mt($moduleId,'Binary.Left_to_right') }}</option>
                            <option value="left_right_most"
                                    @if($config['placement_based_on'] == 'left_right_most') selected @endif > {{ _mt($moduleId,'Binary.Left_right_most') }}</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label>{{ _mt($moduleId,'Binary.PositionSelector') }}</label>
                    </div>
                    <div class="col-md-9" style="min-height: 34px;">
                        <input type="radio" value="user_choice" id="user_choice"
                               name="module_data[position_selector]"
                               @if($config['position_selector'] == 'user_choice') checked="checked" @endif>
                        <label for="user_choice">
                            <span class="box"></span> {{  _mt($moduleId,'Binary.userChoice') }} </label>
                        <input type="radio" value="sponsor_choice" id="sponsor_choice"
                               name="module_data[position_selector]"
                               @if($config['position_selector'] == 'sponsor_choice') checked="checked" @endif>
                        <label for="sponsor_choice">
                            <span class="box"></span> {{ _mt($moduleId,'Binary.sponsorChoice') }} </label>
                        <span class="note">{{ _mt($moduleId,'Binary.sponsorChoiceNote') }} </span>
                    </div>

                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label>{{ _mt($moduleId,'Binary.Upline_Point_Distribution') }}</label>
                    </div>
                    <div class="col-md-9" style="min-height: 34px;">
                        <input type="radio" value="1" id="upline_point_distribute_enabled"
                               name="module_data[upline_point_distribute]"
                               @if($config['upline_point_distribute']) checked="checked" @endif>
                        <label for="upline_point_distribute">
                            <span class="box"></span> {{  _mt($moduleId,'Binary.Enable') }} </label>
                        <input type="radio" value="0" id="upline_point_distribute_disabled"
                               name="module_data[upline_point_distribute]"
                               @if(!$config['upline_point_distribute']) checked="" @endif>
                        <label for="upline_point_distribute">
                            <span class="box"></span> {{ _mt($moduleId,'Binary.Disable') }} </label>
                    </div>
                </div>
                <div class="upline_point_distribute_body"
                     @if(!$config['upline_point_distribute']) style="display: none" @endif>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label>{{_mt($moduleId,'Binary.Distribute_based_on') }}</label>
                        </div>
                        <div class="col-md-9">
                            <select class="distribute_based_on form-control input-medium"
                                    name="module_data[distribute_based_on]">

                                <option value="package"
                                        @if($config['distribute_based_on'] == 'package') selected @endif > {{_mt($moduleId,'Binary.Package') }}</option>
                                <option value="downline_joining_count"
                                        @if($config['distribute_based_on'] == 'downline_joining_count') selected @endif > {{_mt($moduleId,'Binary.Downline_joining_count') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group offset4 col-md-3">
                    <button type="button" value="{{ _mt($moduleId,'Binary.Save') }}"
                            class="form-control ladda-button btn green button-submit" data-style="contract"
                            name="amount">{{ _mt($moduleId,'Binary.Save') }}</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>


<script>
    "use strict";
    // fund transfer  enabled div
    $('#upline_point_distribute_enabled').click(
        function () {
            $('.upline_point_distribute_body').show();
        }
    );
    $('#upline_point_distribute_disabled').click(
        function () {
            $('.upline_point_distribute_body').hide();
        }
    );

    $(function () {
        var form = $('#adminConfig');
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
                'module_data[placement_based_on]': {
                    required: true,
                    ajaxValidate: true,
                },
                'module_data[upline_point_distribute]': {
                    required: true,
                    ajaxValidate: true,
                },
                'module_data[distribute_based_on]': {
                    required: true,
                    ajaxValidate: true,
                },
            },
            messages: {
                'module_data[placement_based_on]': "{{ _mt($moduleId,'Binary.Select_placement_type') }}",
                'module_data[upline_point_distribute]': "{{ _mt($moduleId,'Binary.Select_point_distribute_status)') }}",
                'module_data[distribute_based_on]': "{{ _mt($moduleId,'Binary.Select_distribute_based_on') }}",
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

        $('.Binary .button-submit').click(function () {

            $('.ajaxValidationError').removeClass('ajaxValidationError');

            var successCallBack = function (response) {
                Ladda.stopAll();
                toastr.success("{{ _mt($moduleId,'Binary.Configuration_saved_sucessfully') }}");
            };

            if (!form.valid()) {
                Ladda.stopAll();
                return false;
            }

            var failCallBack = function (response) {
                Ladda.stopAll();
                var errors = response.responseJSON;

                for (var key in errors) {
                    var elemKey = 'module_data' + '[' + key.split('.')[1] + ']';
                    $('#adminConfig [name="' + elemKey + '"]').parent().addClass('ajaxValidationError');
                    var errorOption = {};
                    errorOption[elemKey] = errors[key];
                    validator.showErrors(errorOption);
                }
            };

            var options = {
                form: form,
                actionUrl: "{{ route('admin.module.save',['module_id' => $moduleId]) }}",
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
    .moduleConfig .panel-primary > .panel-heading {
        color: #4d4d4d;
        background-color: #eeeeee;
        border-color: #eeeeee;
        font-weight: 600;
    }

    .moduleConfig .panel-primary > .panel-heading {
        color: #919191;
    }

    .moduleConfig .panel-primary {
        border-color: #eeeeee;
    }

    .moduleConfig .mt-radio-inline {
        padding: 0px;
    }

    .moduleConfig input.form-control {
        margin-bottom: 10px;
    }

    .ajaxValidationError.has-error .help-block-error {
        opacity: 1 !important;
    }

    span.note {
        display: block;
        color: red;
        padding: 5px 0px;
        border: 0;
    }
</style>