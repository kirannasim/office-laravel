<div class="col-sm-12 rankBenefitConfig">
    {!! Form::open(['route' =>  ['advancedRank.rankBenefitConfigurationSave'],'class' => 'adminConfig ajaxSave','id' => 'adminConfig', 'novalidate' => 'novalidate']) !!}
    <div class="form-body">
        <div class="rankContainer">
            @if(count($benefits) == 0)
                <input type="hidden" name="benefits[0][id]" value="1">
                <div class="eachrow row" data-id="0">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">{{ _mt($moduleId,'AdvancedRank.Benefit_Name') }}</label>
                            <input type="text" class="form-control" name="benefits[0][name]">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">{{ _mt($moduleId,'AdvancedRank.Description') }}</label>
                            <input type="text" class="form-control" name="benefits[0][description]">
                        </div>
                    </div>
                    {{-- <div class="col-sm-2">
                         <div class="form-group form-md-line-input form-md-floating-label">
                             <input type="text" class="form-control" name="benefits[0][image]">
                             <label for="form_control_1">{{ _mt($moduleId,'AdvancedRank.Image') }}</label>
                         </div>
                     </div>--}}
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">{{ _mt($moduleId,'AdvancedRank.Value') }}</label>
                            <input type="number" class="form-control" name="benefits[0][value]">
                        </div>
                    </div>
                </div>
            @else
                @foreach($benefits as $benefit)
                    <input type="hidden" name="benefits[{{$benefit->id}}][id]" value="{{$benefit->id}}">
                    <div class="eachrow row" data-id="{{$benefit->id}}">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">{{ _mt($moduleId,'AdvancedRank.Benefit_Name') }} </label>
                                <input type="text" class="form-control" name="benefits[{{$benefit->id}}][name]"
                                       value="{{$benefit->name}}">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">{{ _mt($moduleId,'AdvancedRank.Description') }} </label>
                                <input type="text" class="form-control"
                                       name="benefits[{{$benefit->id}}][description]"
                                       value="{{$benefit->description}}">
                            </div>
                        </div>
                        {{-- <div class="col-sm-2">
                             <div class="form-group form-md-line-input form-md-floating-label">
                                 <input type="text" class="form-control" name="benefits[{{$benefit->id}}][image]"
                                        value="{{$benefit->image}}">
                                 <label for="form_control_1">Image</label>
                             </div>
                         </div>--}}
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">{{ _mt($moduleId,'AdvancedRank.Value') }}</label>
                                <input type="number" class="form-control"
                                       name="benefits[{{$benefit->id}}][value]"
                                       value="{{$benefit->value}}">
                            </div>
                        </div>

                        @if($benefit->id !=1)
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button type="button" class="btn btn-danger removeRow">
                                        {{ _mt($moduleId,'AdvancedRank.Remove') }}
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-10">
                    <button type="button" class="btn dark button-submit ladda-button"
                            data-style="contract"> {{ __('Save') }}
                    </button>
                </div>
                <div class="col-sm-2">
                    <button type="button"
                            class="btn btn-primary addnewRow">{{ _mt($moduleId,'AdvancedRank.Add_new') }}</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<script>
    "use strict";
    $(function () {
        $('.addnewRow').click(function () {
            var lastId = Number($('.rankContainer .eachrow').last().attr('data-id')) + 1;
            var html = '<div class="eachrow row" data-id="' + lastId + '">\n' +
                '<input type="hidden" name="benefits[' + lastId + '][id]" value="' + (lastId + 1) + '">\n' +
                '                        <div class="col-sm-3">\n' +
                '                            <div class="form-group">\n' +
                '                                <label class="control-label">{{ _mt($moduleId,"AdvancedRank.Benefit_Name") }}</label>\n' +
                '                                <input type="text" class="form-control" name="benefits[' + lastId + '][name]"\n' +
                '                                       value="">\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                          <div class="col-sm-4">\n' +
                '                            <div class="form-group">\n' +
                '                                <label class="control-label">{{ _mt($moduleId,"AdvancedRank.Description") }}</label>\n' +
                '                                <input type="text" class="form-control" name="benefits[' + lastId + '][description]"\n' +
                '                                       value="">\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                /*                    '                        <div class="col-sm-2">\n' +
                                    '                            <div class="form-group form-md-line-input form-md-floating-label">\n' +
                                    '                                <input type="text" class="form-control" name="benefits[' + lastId + '][image]"\n' +
                                    '                                       value="">\n' +
                                    '                                <label for="form_control_1">Image</label>\n' +
                                    '                            </div>\n' +
                                    '                        </div>\n' +*/
                '                        <div class="col-sm-3">\n' +
                '                            <div class="form-group">\n' +
                '                                <label class="control-label">{{ _mt($moduleId,"AdvancedRank.Value") }}</label>\n' +
                '                                <input type="number" class="form-control" name="benefits[' + lastId + '][value]"\n' +
                '                                       value="">\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        <div class="col-sm-2">\n' +
                '                            <div class="form-group">\n' +
                '                                <button type="button" class="btn btn-danger removeRow">\n' +
                '                                    X\n' +
                '                                </button>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                    </div>';

            $('.rankContainer').append(html);

        });

        $('.rankContainer').on('click', '.removeRow', function () {
            $(this).closest('.eachrow').remove();
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
                rules: {},
                messages: {},

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

            $('.rankBenefitConfig .button-submit').click(function () {

                $('.ajaxValidationError').removeClass('ajaxValidationError');

                var successCallBack = function (response) {
                    Ladda.stopAll();
                    toastr.success("{{ _mt($moduleId,'AdvancedRank.Configuration_saved_successfully') }}");
                };

                if (!form.valid()) {
                    Ladda.stopAll();
                    return false;
                }

                var failCallBack = function (response) {
                    Ladda.stopAll();
                    var errors = response.responseJSON;
                    console.log(key);
                    for (var key in errors) {
                        var elemKey = 'benefits' + '[' + key.split('.')[1] + ']' + '[' + key.split('.')[2] + ']';
                        $('#adminConfig [name="' + elemKey + '"]').parent().addClass('ajaxValidationError');
                        var errorOption = {};
                        errorOption[elemKey] = errors[key];
                        validator.showErrors(errorOption);
                    }
                };

                var options = {
                    form: form,
                    actionUrl: "{{ route('advancedRank.rankBenefitConfigurationSave') }}",
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
    });
</script>
<style>
    button.btn.btn-danger.removeRow {
        margin-top: 26px;
    }
</style>


