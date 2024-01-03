@foreach($scripts as $script)
    <script type="text/javascript" src="{{ $script }}"></script>
@endforeach
<div class="row moduleConfig TabularTree">
    <div class="col-sm-12">
        {!! Form::open(['route' => ['admin.module.configure',$moduleId],'class' => 'form-horizontal adminConfig','id' =>   'adminConfig']) !!}
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span aria-hidden="true"
                      class="icon-tag"></span> {{ _mt($moduleId,'TabularTree.Tabular_Tree_Configuration') }}
            </div>
            <div class="panel-body">
                <div class="row form-group">
                    <div class="col-md-3">
                        <label> {{ _mt($moduleId,'TabularTree.view_tooltip') }}</label>
                    </div>
                    <div class="col-md-9">
                        <div class="mt-radio-inline">
                            <label class="mt-radio">
                                <input type="radio" class="view_tooltip" name="module_data[view_tooltip]" value="1"
                                       @if($config->get('view_tooltip')) checked @endif > {{ _mt($moduleId,'TabularTree.On') }}
                                <span></span>
                            </label>
                            <label class="mt-radio">
                                <input type="radio" class="view_tooltip" name="module_data[view_tooltip]" value="0"
                                       @if(!$config->get('view_tooltip')) checked @endif > {{ _mt($moduleId,'TabularTree.Off') }}
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row form-group tooltip_info_div"
                     @if(!$config->get('view_tooltip')) style="display: none" @endif>
                    <div class="col-md-3">
                        <label> {{ _mt($moduleId,'TabularTree.tooltip_info') }}</label>
                    </div>
                    <div class="col-md-3">
                        <div class="mt-checkbox-list">
                            <label class="mt-checkbox mt-checkbox-outline"> {{ _mt($moduleId,'TabularTree.fullname') }}
                                <input type="checkbox" @if(in_array('fullname', $config->get('tooltip_info'))) checked
                                       @endif value="fullname" name="module_data[tooltip_info][]">
                                <span></span>
                            </label>
                            <label class="mt-checkbox mt-checkbox-outline"> {{ _mt($moduleId,'TabularTree.firstname') }}
                                <input type="checkbox" @if(in_array('firstname', $config->get('tooltip_info'))) checked
                                       @endif value="firstname" name="module_data[tooltip_info][]">
                                <span></span>
                            </label>
                            <label class="mt-checkbox mt-checkbox-outline"> {{ _mt($moduleId,'TabularTree.lastname') }}
                                <input type="checkbox" @if(in_array('lastname', $config->get('tooltip_info'))) checked
                                       @endif  value="lastname" name="module_data[tooltip_info][]">
                                <span></span>
                            </label>
                            <label class="mt-checkbox mt-checkbox-outline"> {{ _mt($moduleId,'TabularTree.email') }}
                                <input type="checkbox" @if(in_array('email', $config->get('tooltip_info'))) checked
                                       @endif  value="email" name="module_data[tooltip_info][]">
                                <span></span>
                            </label>
                            <label class="mt-checkbox mt-checkbox-outline"> {{ _mt($moduleId,'TabularTree.phone') }}
                                <input type="checkbox" @if(in_array('phone', $config->get('tooltip_info'))) checked
                                       @endif  value="phone" name="module_data[tooltip_info][]">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mt-checkbox-list">
                            <label class="mt-checkbox mt-checkbox-outline"> {{ _mt($moduleId,'TabularTree.joining_date') }}
                                <input type="checkbox"
                                       @if(in_array('joining_date', $config->get('tooltip_info'))) checked
                                       @endif  value="joining_date" name="module_data[tooltip_info][]">
                                <span></span>
                            </label>
                            <label class="mt-checkbox mt-checkbox-outline"> {{ _mt($moduleId,'TabularTree.parent_user') }}
                                <input type="checkbox"
                                       @if(in_array('parent_user', $config->get('tooltip_info'))) checked
                                       @endif  value="parent_user" name="module_data[tooltip_info][]">
                                <span></span>
                            </label>
                            <label class="mt-checkbox mt-checkbox-outline"> {{ _mt($moduleId,'TabularTree.sponsor_user') }}
                                <input type="checkbox"
                                       @if(in_array('sponsor_user', $config->get('tooltip_info'))) checked
                                       @endif value="sponsor_user" name="module_data[tooltip_info][]">
                                <span></span>
                            </label>
                            <label class="mt-checkbox mt-checkbox-outline"> {{ _mt($moduleId,'TabularTree.package') }}
                                <input type="checkbox" @if(in_array('package', $config->get('tooltip_info'))) checked
                                       @endif  value="package" name="module_data[tooltip_info][]">
                                <span></span>
                            </label>
                            <label class="mt-checkbox mt-checkbox-outline"> {{ _mt($moduleId,'TabularTree.country') }}
                                <input type="checkbox" @if(in_array('country', $config->get('tooltip_info'))) checked
                                       @endif  value="country" name="module_data[tooltip_info][]">
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-3 col-sm-offset-3">
                        <button type="button" value="{{ _mt($moduleId,'TabularTree.Save') }}"
                                class="form-control ladda-button btn dark button-submit" data-style="contract"
                                name="amount">{{ _mt($moduleId,'TabularTree.Save') }}</button>
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

    $(".view_tooltip").click(function () {

        var view_tooltip = $("input:radio[name='module_data[view_tooltip]']:checked").val();

        if (view_tooltip == 1) {
            $(".tooltip_info_div").show();
        } else {
            $(".tooltip_info_div").hide();
        }
    });

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
                'module_data[view_tooltip]': {
                    required: true,
                    ajaxValidate: true,
                },
            },
            messages: {
                'module_data[view_tooltip]': {
                    required: "{{ _mt($moduleId,'GenealogyTree.Please_set_view_tooltip_option') }}",
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

        $('.TabularTree .button-submit').click(function () {

            $('.ajaxValidationError').removeClass('ajaxValidationError');

            var successCallBack = function (response) {
                Ladda.stopAll();
                toastr.success("{{ _mt($moduleId,'TabularTree.Configuration_saved_sucessfully') }}");
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
                    console.log(elemKey);
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
</style>