@foreach($scripts as $script)
    <script type="text/javascript" src="{{ $script }}"></script>
@endforeach
@foreach($styles as $style)
    <link href="{{ $style }}" rel="stylesheet" type="text/css"/>
@endforeach
<div class="row moduleConfig SponsorLevelCommission">
    <div class="col-sm-12">
        {!! Form::open(['route' => ['admin.module.configure',$moduleId],'class' => 'form-horizontal adminConfig','id' => 'adminConfig']) !!}
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span aria-hidden="true"
                      class="icon-tag"></span> Dynamic Compression Unilevel Bonus [DCU]
            </div>
            <div class="panel-body">
                <div class="row form-group">
                    <div class="col-md-3">
                        <label> {{ _mt($moduleId,'SponsorLevelCommission.To_Wallet') }}</label>
                    </div>
                    <div class="col-md-3 form-group">
                        <select class="walletSelect form-control input-medium" name="module_data[wallet]">
                            @foreach($wallets as $wallet)
                                <option value="{{ $wallet->moduleId }}"
                                        @if($wallet->moduleId == $config->get('wallet')) selected @endif>{{ $wallet->registry['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-8 col-xs-8" id="level-value">
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-3" style="padding: 0px;">
                                <h5 style="border-bottom: solid 1px #928a8a; padding-bottom: 5px;font-weight: 600;">
                                    Amount</h5>
                            </div>
                            <div class="col-sm-5">
                                <h5 style="border-bottom: solid 1px #928a8a; padding-bottom: 5px;font-weight: 600;">
                                    Required Rank</h5>
                            </div>
                        </div>
                        @foreach($config->get('commission')  as $level => $value)
                            <div class="row" id="field_{{ $level }}">
                                <div class="col-md-4">
                                    <label> {{ ucfirst(str_replace('_',' ',$level)) }}  </label>
                                </div>
                                <div class="col-md-3" style="padding: 0px;">
                                    <label>
                                        <input type="number" class="form-control"
                                               name="module_data[commission][{{ $level }}]" value="{{ $value }}">
                                    </label>
                                </div>
                                <div class="col-md-5">
                                    <label style="width: 100%;">
                                        <select class="form-control" name="module_data[required_rank][{{ $level }}]"
                                                style="width: 100% !important;">
                                            <option value="">No rank required</option>
                                            @foreach($ranks as $rank)
                                                <option value="{{ $rank->id }}"
                                                        @if(collect($config->get('required_rank'))->get($level) == $rank->id ) selected @endif>{{ $rank->name }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <div class="col-md-5">
                            <input type="button" id="addLevel" class="btn btn-sm green"
                                   value="{{ _mt($moduleId,'SponsorLevelCommission.Add_Level') }}"/>
                        </div>
                        <div class="col-md-5">
                            <input type="button" id="removeLevel" class="btn btn-sm red"
                                   value="{{ _mt($moduleId,'SponsorLevelCommission.Remove_Level') }}"/>
                        </div>
                    </div>
                </div>
                <div class="form-group offset4">
                    <div class="col-md-1">
                        <button type="button" value="{{ _mt($moduleId,'SponsorLevelCommission.Save') }}"
                                class="form-control ladda-button btn green button-submit" data-style="contract"
                                name="amount">{{ _mt($moduleId,'SponsorLevelCommission.Save') }}</button>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<script>
    "use strict";
    var iCnt = {{ count($config->get('commission')) }}
        //to add more levels
        $('#addLevel').click(function () {
            iCnt = iCnt + 1;
            $('#level-value').append('<div class="row" id="field_level_' + iCnt + '"> <div class="col-md-4"> <label>Level ' + iCnt + ' : </label> </div> <div class="col-md-3" style="padding: 0px;"> <label> <input type="number" class="form-control " name="module_data[commission][level_' + iCnt + ']" id="level_' + iCnt + '" value="0" /></label></div><div class="col-md-5"><label style="width: 100%;"><select class="form-control" name="module_data[required_rank][' + iCnt + ']" style="width: 100% !important;">\n' +
                '                                            <option value="">No rank required</option>\n' +
                '                                            @foreach($ranks as $rank)\n' +
                '                                                <option value="{{ $rank->id }}"\n' +
                '                                                      >{{ $rank->name }}</option>\n' +
                '                                            @endforeach\n' +
                '                                        </select></label></div></div>');

            $('select').select2({
                width: '100%'
            });
        });

    //to remove levels
    $('#removeLevel').click(function () {
        if (iCnt > 1) {
            $('#field_level_' + iCnt).remove();
            $('.level_rank_' + iCnt).remove();
            iCnt = iCnt - 1;
        }
    });

    $(function () {
        Ladda.bind();
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
                'module_data[wallet]': {
                    required: true,
                    ajaxValidate: true,
                },
            },
            messages: {
                'module_data[distribution_type]': "{{ _mt($moduleId,'SponsorLevelCommission.Please_choose_distribution_type') }}",
                'module_data[wallet]': "{{ _mt($moduleId,'SponsorLevelCommission.Please_select_wallet') }}",
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

        $('.SponsorLevelCommission .button-submit').click(function () {

            $('.ajaxValidationError').removeClass('ajaxValidationError');

            var successCallBack = function (response) {
                Ladda.stopAll();
                toastr.success("{{ _mt($moduleId,'SponsorLevelCommission.Configuration_saved_sucessfully') }}");
            };

            if (!form.valid()) {
                Ladda.stopAll();
                return false;
            }

            var failCallBack = function (response) {
                Ladda.stopAll();
                var errors = response.responseJSON;

                for (var key in errors) {

                    if (key.split('.')[2])
                        var elemKey = 'module_data' + '[' + key.split('.')[1] + ']' + '[' + key.split('.')[2] + ']';
                    else
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

    //select2
    $('select').select2({
        width: '100%'
    });

    //i-check
    $('.mt-radio-inline input[type="radio"]').iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal',
        increaseArea: '20%' // optional
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

    .mt-radio-inline label.mt-radio {
        padding: 0px;
    }
</style>
