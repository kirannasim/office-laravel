<div class="row moduleConfiq payoutConfig">
    <div class="col-md-12">
        {!! Form::open(['route' => ['admin.module.configure',$moduleId],'class' => 'form-horizontal adminConfig','id' => 'adminConfig']) !!}
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="caption">
                    <i class="icon-puzzle font-grey-gallery"></i>
                    <span class="caption-subject bold font-grey-gallery uppercase">{{ _mt($moduleId,'Payout.Payout_Settings') }}</span>
                </div>
            </div>
            <div class="row panel-body" style="height: auto;">
                <div class="col-sm-12">
                    <div class="form-md-checkboxes">
                        <label>{{ _mt($moduleId,'Payout.Type') }}</label>
                        <div class="md-checkbox-inline">
                            <div class="md-checkbox">
                                <input type="checkbox" id="ewallet" name="module_data[ewallet]" value="1"
                                       @if(isset($config['ewallet'])) checked="" @endif class="md-check">
                                <label for="ewallet">
                                    <span class="inc"></span>
                                    <span class="check"></span>
                                    <span class="box"></span> {{ _mt($moduleId,'Payout.Manually') }} </label>
                            </div>
                            <div class="md-checkbox">
                                <input type="checkbox" id="user_request" name="module_data[user_request]" value="1"
                                       @if(isset($config['user_request'])) checked="" @endif class="md-check">
                                <label for="user_request">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span>{{ _mt($moduleId,'Payout.On_Request') }}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 restrictMultiRequestDiv"
                     @if(!isset($config['user_request'])) style="display: none" @endif >
                    <div class="form-md-checkboxes">
                        <div class="md-checkbox-inline">
                            {{--<div class="md-checkbox">--}}
                            <div>
                                <input type="checkbox" id="multiRequest" name="module_data[restrict_multi_request]"
                                       value="1"
                                       @if(isset($config['restrict_multi_request'])) checked=""
                                       @endif
                                       class="md-check"
                                >
                                <label for="multi_request">
                                    <span class="inc"></span>
                                    <span class="check"></span>
                                    <span class="box"></span> {{ _mt($moduleId,'Payout.restrict_multi_request') }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--<div class="row form-group ">--}}
            {{--<div class="col-md-8 indirectHead">--}}
            {{--<div class="row">--}}
            {{--<div class="col-md-3">--}}
            {{--<div class="sub">--}}
            {{--<h5>{{ _mt($moduleId,'Payout.User_levels') }}</h5>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
            {{--<div class="sub">--}}
            {{--<h5>{{ _mt($moduleId,'Payout.minimum_request') }}</h5>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
            {{--<div class="sub">--}}
            {{--<h5>{{ _mt($moduleId,'Payout.maximum_request') }}</h5>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4"></div>--}}
            {{--</div>--}}
            {{--<div class="row form-group" id="stage-value">--}}
            {{--<div class="col-md-8 col-xs-8">--}}
            {{--@foreach($config->get('stages', [])  as $stage => $value)--}}
            {{--<div class="row" id="field_{{ $stage }}">--}}
            {{--<div class="col-md-3">--}}
            {{--<label> {{ _mt($moduleId,'Payout.Stage') }} {{ $stage }} </label>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
            {{--<label>--}}
            {{--<input type="text" class="form-control input-small"--}}
            {{--name="module_data[stages][{{ $stage }}][minimum]"--}}
            {{--value="{{ $value["minimum"] }}">--}}
            {{--</label>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
            {{--<label>--}}
            {{--<input type="text" class="form-control input-small"--}}
            {{--name="module_data[stages][{{ $stage }}][maximum]"--}}
            {{--value="{{ $value["maximum"] }}">--}}
            {{--</label>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--@endforeach--}}
            {{--</div>--}}
            {{--<div class="col-md-3 col-xs-4">--}}
            {{--<div class="col-md-6">--}}
            {{--<input type="button" id="addStage" class="btn btn-sm green"--}}
            {{--value="{{ _mt($moduleId,'Payout.Add_Stage') }}"/>--}}
            {{--</div>--}}
            {{--<div class="col-md-6">--}}
            {{--<input type="button" id="removeStage" class="btn btn-sm red"--}}
            {{--value="{{ _mt($moduleId,'Payout.Remove_Stage') }}"/>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            <div class="form-group">
                <div class="col-md-6">
                    <button type="button" value="{{ __('save')}}"
                            class="form-control ladda-button btn dark button-submit" data-style="contract"
                            name="amount" style="display: inline-block;">{{ _mt($moduleId,'Payout.Save') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
</div>

<script>
    "use strict";
    $(function () {

        var form = $('#adminConfig');

        $('.payoutConfig .button-submit').click(function () {

            $('.ajaxValidationError').removeClass('ajaxValidationError');

            var successCallBack = function (response) {
                Ladda.stopAll();
                toastr.success("{{ _mt($moduleId,'Payout.Configuration_saved_sucessfully') }}");
            };

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
            }

            var options = {
                form: form,
                actionUrl: "{{ route('admin.module.save',['module_id' => $moduleId]) }}",
                successCallBack: successCallBack,
                failCallBack: failCallBack
            };
            sendForm(options);
        });
    });

    var jCnt = {{ count($config->get('stages', [])) - 1 }}
        //to add more levels
        $('#addStage').click(function () {
            jCnt = jCnt + 1;
            $('#stage-value').append('<div class="col-md-8 col-xs-8"><div class="row" id="field_' + jCnt + '"> <div class="col-md-3"> <label>Stage ' + jCnt + '</label> </div> <div class="col-md-4"> <label> <input type="text" class="form-control input-small" name="module_data[stages][' + jCnt + '][minimum]" id="stage_' + jCnt + '" value="0" /></label> </div><div class="col-md-4"> <label> <input type="text" class="form-control input-small" name="module_data[stages][' + jCnt + '][maximum]" id="stage_' + jCnt + '_matrix" value="0" /></label> </div> </div></div>');
        });

    //to remove levels
    $('#removeStage').click(function () {
        if (iCnt > 1) {
            $('#field_stage_' + iCnt).remove();
            iCnt = iCnt - 1;
        }
    });


    $('#user_request').change(function () {
        if ($(this).is(":checked")) {
            $('.restrictMultiRequestDiv').show();
        } else {
            $('.restrictMultiRequestDiv').hide();
        }
    });

</script>

<style>
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

    .moduleConfiq .form-group {
        margin: 10px 0px;
    }

    .moduleConfiq .control-label {
        text-align: right;
        margin-bottom: 10px;
        padding-top: 7px;
    }

    .indirectHead .sub {
        border-bottom: solid 1px #ddd;
        margin-bottom: 5px;
    }

    .indirectHead .sub h5 {
        font-weight: bold;
        color: #7f7f7f;
        font-size: 13px;
    }
</style>
