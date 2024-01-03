<div class="col-sm-12">
    {!! Form::open(['route' =>  ['advancedRank.rankConfigurationSave'],'class' => 'adminConfig ajaxSave','id' => 'adminConfig', 'novalidate' => 'novalidate']) !!}
    <div class="form-body">
        <div class="rankContainer">
            <div class="col-sm-12">
                <div class="col-sm-10">
                </div>
                <div class="col-sm-2">
                    <button type="button"
                            class="btn btn-transparent blue btn-outline btn-circle btn-sm active rankBenefitConfiguration">
                        <i class="fa fa-cog" aria-hidden="true"></i> {{ _mt($moduleId,'AdvancedRank.Manage_Benefits') }}
                    </button>
                </div>
            </div>
            @foreach($ranks->take(5) as $rank)
                <div class="eachrow row" data-id="{{$rank->id}}">
                    <input type="hidden" name="ranks[{{$rank->id}}][id]" value="{{$rank->id}}">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">{{ _mt($moduleId,'AdvancedRank.Rank_Name') }}</label>
                                    <input type="text" class="form-control" name="ranks[{{$rank->id}}][name]"
                                           value="{{$rank->name}}">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <div class="input-group col-sm-3">
                                <span class="input-group-btn">
                                    <a id="fmTrigger" data-input="thumbnail" data-preview="holder"
                                       class="btn btn-outline dark fmTrigger_{{$rank->id}}">
                                       <i class="fa fa-picture-o"></i> {{ _t('settings.choose') }}
                                    </a>
                                </span>
                                    <img id="holder" class="fmImage_{{ $rank->id }}"
                                         src="{{ asset($rank->image) }}">
                                    <input id="thumbnail"
                                           value="{{ asset($rank->image ? :'http://placehold.it/150x150') }}"
                                           class="form-control"
                                           name="ranks[{{$rank->id}}][image]" type="hidden">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">{{ _mt($moduleId,'AdvancedRank.Status') }}</label>
                                    <select class="form-control" name="ranks[{{$rank->id}}][is_active]">
                                        <option value="1"
                                                @if($rank->is_active == 1) selected @endif >{{ _mt($moduleId,'AdvancedRank.Enabled') }}
                                        </option>
                                        <option value="0"
                                                @if($rank->is_active == 0) selected @endif >{{ _mt($moduleId,'AdvancedRank.Disabled') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">{{ _mt($moduleId,'AdvancedRank.referral_rank') }}</label>
                                    <select class="form-control" name="ranks[{{$rank->id}}][referral_rank]">
                                        <option value="">{{ _mt($moduleId,'AdvancedRank.select_rank') }}</option>
                                        @foreach($ranks as $referralRank)
                                            <option @if($referralRank->id == $rank->referral_rank) selected
                                                    @endif value="{{ $referralRank->id }}">{{ $referralRank->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">{{ _mt($moduleId,'AdvancedRank.referral_rank_count') }}</label>
                                    <input type="number" class="form-control"
                                           name="ranks[{{$rank->id}}][referral_rank_count]"
                                           value="{{$rank->referral_rank_count}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">{{ _mt($moduleId,'AdvancedRank.minimum_leg') }}</label>
                                    <input type="number" class="form-control"
                                           name="ranks[{{$rank->id}}][minimum_leg_count]"
                                           value="{{$rank->minimum_leg_count}}">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            @endforeach

            <h4><b>Executive Positions</b></h4>
            @foreach($ranks->slice(5)->take(3) as $rank)
                <div class="eachrow row" data-id="{{$rank->id}}">
                    <input type="hidden" name="ranks[{{$rank->id}}][id]" value="{{$rank->id}}">
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _mt($moduleId,'AdvancedRank.Rank_Name') }}</label>
                                    <input type="text" class="form-control" name="ranks[{{$rank->id}}][name]"
                                           value="{{$rank->name}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <div class="input-group col-sm-3">
                                <span class="input-group-btn">
                                    <a id="fmTrigger" data-input="thumbnail" data-preview="holder"
                                       class="btn btn-outline dark fmTrigger_{{$rank->id}}">
                                       <i class="fa fa-picture-o"></i> {{ _t('settings.choose') }}
                                    </a>
                                </span>
                            <img id="holder" class="fmImage"
                                 src="{{ asset($rank->image) }}">
                            <input id="thumbnail"
                                   value="{{ asset($rank->image ? :'http://placehold.it/150x150') }}"
                                   class="form-control"
                                   name="ranks[{{$rank->id}}][image]" type="hidden" name="filepath">
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">{{ _mt($moduleId,'AdvancedRank.Status') }}</label>
                                    <select class="form-control" name="ranks[{{$rank->id}}][is_active]">
                                        <option value="1"
                                                @if($rank->is_active == 1) selected @endif >{{ _mt($moduleId,'AdvancedRank.Enabled') }}
                                        </option>
                                        <option value="0"
                                                @if($rank->is_active == 0) selected @endif >{{ _mt($moduleId,'AdvancedRank.Disabled') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Cycle Accm In Month</label>
                                    <input type="number" class="form-control"
                                           name="ranks[{{$rank->id}}][accumulated_cycle]"
                                           value="{{$rank->accumulated_cycle}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">{{ _mt($moduleId,'AdvancedRank.referral_rank') }}</label>
                                    <select class="form-control" name="ranks[{{$rank->id}}][referral_rank]">
                                        <option value="">{{ _mt($moduleId,'AdvancedRank.select_rank') }}</option>
                                        @foreach($ranks as $referralRank)
                                            <option @if($referralRank->id == $rank->referral_rank) selected
                                                    @endif value="{{ $referralRank->id }}">{{ $referralRank->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">{{ _mt($moduleId,'AdvancedRank.referral_rank_count') }}</label>
                                    <input type="number" class="form-control"
                                           name="ranks[{{$rank->id}}][referral_rank_count]"
                                           value="{{$rank->referral_rank_count}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">{{ _mt($moduleId,'AdvancedRank.minimum_leg') }}</label>
                                    <input type="number" class="form-control"
                                           name="ranks[{{$rank->id}}][minimum_leg_count]"
                                           value="{{$rank->minimum_leg_count}}">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            @endforeach


            <h4><b>Director Positions</b></h4>
            @foreach($ranks->slice(8)->take(2) as $rank)
                <div class="eachrow row" data-id="{{$rank->id}}">
                    <input type="hidden" name="ranks[{{$rank->id}}][id]" value="{{$rank->id}}">
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _mt($moduleId,'AdvancedRank.Rank_Name') }}</label>
                                    <input type="text" class="form-control" name="ranks[{{$rank->id}}][name]"
                                           value="{{$rank->name}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <div class="input-group col-sm-3">
                                <span class="input-group-btn">
                                    <a id="fmTrigger" data-input="thumbnail" data-preview="holder"
                                       class="btn btn-outline dark fmTrigger_{{$rank->id}}">
                                       <i class="fa fa-picture-o"></i> {{ _t('settings.choose') }}
                                    </a>
                                </span>
                            <img id="holder" class="fmImage"
                                 src="{{ asset($rank->image) }}">
                            <input id="thumbnail"
                                   value="{{ asset($rank->image ? :'http://placehold.it/150x150') }}"
                                   class="form-control"
                                   name="ranks[{{$rank->id}}][image]" type="hidden" name="filepath">
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">{{ _mt($moduleId,'AdvancedRank.Status') }}</label>
                                    <select class="form-control" name="ranks[{{$rank->id}}][is_active]">
                                        <option value="1"
                                                @if($rank->is_active == 1) selected @endif >{{ _mt($moduleId,'AdvancedRank.Enabled') }}
                                        </option>
                                        <option value="0"
                                                @if($rank->is_active == 0) selected @endif >{{ _mt($moduleId,'AdvancedRank.Disabled') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Cycle Accm In Month</label>
                                    <input type="number" class="form-control"
                                           name="ranks[{{$rank->id}}][accumulated_cycle]"
                                           value="{{$rank->accumulated_cycle}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">{{ _mt($moduleId,'AdvancedRank.referral_rank') }}</label>
                                    <select class="form-control" name="ranks[{{$rank->id}}][referral_rank]">
                                        <option value="">{{ _mt($moduleId,'AdvancedRank.select_rank') }}</option>
                                        @foreach($ranks as $referralRank)
                                            <option @if($referralRank->id == $rank->referral_rank) selected
                                                    @endif value="{{ $referralRank->id }}">{{ $referralRank->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">{{ _mt($moduleId,'AdvancedRank.referral_rank_count') }}</label>
                                    <input type="number" class="form-control"
                                           name="ranks[{{$rank->id}}][referral_rank_count]"
                                           value="{{$rank->referral_rank_count}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">{{ _mt($moduleId,'AdvancedRank.minimum_leg') }}</label>
                                    <input type="number" class="form-control"
                                           name="ranks[{{$rank->id}}][minimum_leg_count]"
                                           value="{{$rank->minimum_leg_count}}">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            @endforeach


            <h4><b>Board Positions</b></h4>
            @foreach($ranks->slice(10)->take(2) as $rank)
                <div class="eachrow row" data-id="{{$rank->id}}">
                    <input type="hidden" name="ranks[{{$rank->id}}][id]" value="{{$rank->id}}">
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _mt($moduleId,'AdvancedRank.Rank_Name') }}</label>
                                    <input type="text" class="form-control" name="ranks[{{$rank->id}}][name]"
                                           value="{{$rank->name}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <div class="input-group col-sm-3">
                                <span class="input-group-btn">
                                    <a id="fmTrigger" data-input="thumbnail" data-preview="holder"
                                       class="btn btn-outline dark fmTrigger">
                                       <i class="fa fa-picture-o"></i> {{ _t('settings.choose') }}
                                    </a>
                                </span>
                            <img id="holder" class="fmImage"
                                 src="{{ asset($rank->image) }}">
                            <input id="thumbnail"
                                   value="{{ asset($rank->image ? :'http://placehold.it/150x150') }}"
                                   class="form-control"
                                   name="ranks[{{$rank->id}}][image]" type="hidden" name="filepath">
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">{{ _mt($moduleId,'AdvancedRank.Status') }}</label>
                                    <select class="form-control" name="ranks[{{$rank->id}}][is_active]">
                                        <option value="1"
                                                @if($rank->is_active == 1) selected @endif >{{ _mt($moduleId,'AdvancedRank.Enabled') }}
                                        </option>
                                        <option value="0"
                                                @if($rank->is_active == 0) selected @endif >{{ _mt($moduleId,'AdvancedRank.Disabled') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Cycle Accm In Month</label>
                                    <input type="number" class="form-control"
                                           name="ranks[{{$rank->id}}][accumulated_cycle]"
                                           value="{{$rank->accumulated_cycle}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Cycle Accm In Pre Month</label>
                                    <input type="number" class="form-control"
                                           name="ranks[{{$rank->id}}][accumulated_cycle_preceding]"
                                           value="{{$rank->accumulated_cycle_preceding}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">{{ _mt($moduleId,'AdvancedRank.referral_rank') }}</label>
                                    <select class="form-control" name="ranks[{{$rank->id}}][referral_rank]">
                                        <option value="">{{ _mt($moduleId,'AdvancedRank.select_rank') }}</option>
                                        @foreach($ranks as $referralRank)
                                            <option @if($referralRank->id == $rank->referral_rank) selected
                                                    @endif value="{{ $referralRank->id }}">{{ $referralRank->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">{{ _mt($moduleId,'AdvancedRank.referral_rank_count') }}</label>
                                    <input type="number" class="form-control"
                                           name="ranks[{{$rank->id}}][referral_rank_count]"
                                           value="{{$rank->referral_rank_count}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">{{ _mt($moduleId,'AdvancedRank.minimum_leg') }}</label>
                                    <input type="number" class="form-control"
                                           name="ranks[{{$rank->id}}][minimum_leg_count]"
                                           value="{{$rank->minimum_leg_count}}">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn green button-submit ladda-button"
                            data-style="contract">{{ _mt($moduleId,'AdvancedRank.Save') }}
                    </button>
                </div>
                {{-- <div class="col-sm-6">
                     <button type="button"
                             class="btn blue btn-primary addnewRow"
                             style="float: right;"><i class="fa fa-plus"></i> {{ _mt($moduleId,'AdvancedRank.Add_new') }}
                     </button>
                 </div>--}}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<script>
    "use strict";

    $('.rankBenefitConfiguration').click(function () {
        loadRankBenefitConfiguration();
    });

    var domain = '{{ asset('filemanage') }}';

    $('.fmTrigger_1').filemanager('image', {prefix: domain});
    $('.fmTrigger_3').filemanager('image', {prefix: domain});
    $('.fmTrigger_5').filemanager('image', {prefix: domain});
    $('.fmTrigger_6').filemanager('image', {prefix: domain});


    $(function () {
        //select2
        $('select').select2({});

        $('.addnewRow').click(function () {
            var lastId = Number($('.rankContainer .eachrow').last().attr('data-id')) + 1;
            var html = '<div class="eachrow row" data-id="' + lastId + '">\n' +
                '<input type="hidden" name="ranks[' + lastId + '][id]" value="' + (lastId + 1) + '">\n' +
                '                        <div class="col-sm-3"><div class="row"><div class="col-sm-12">\n' +
                '                            <div class="form-group">\n' +
                '                                <label class="control-label">{{ _mt($moduleId,"AdvancedRank.Rank_Name") }}</label>\n' +
                '                                <input type="text" class="form-control" name="ranks[' + lastId + '][name]"\n' +
                '                                       value="">\n' +
                '                            </div>\n' +
                '                        </div></div></div>\n' +
                '                       <div class="col-sm-9">\n' +
                '                       <div class="row">\n' +
                '                        <div class="col-sm-4">\n' +
                '                            <div class="form-group">\n' +
                '                               <label class="control-label">{{ _mt($moduleId,"AdvancedRank.Status") }}</label>\n' +
                '                               <select class="form-control" name="ranks[' + lastId + '][is_active]">\n' +
                '                                   <option value="1">{{ _mt($moduleId,"AdvancedRank.Enabled") }}</option>\n' +
                '                                   <option value="0">{{ _mt($moduleId,"AdvancedRank.Disabled") }}</option>\n' +
                '                               </select>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        </div>\n' +
                '                       <div class="row">\n' +
                '                           <div class="col-sm-4">\n' +
                '                                    <div class="form-group">\n' +
                '                                        <label class="control-label">{{ _mt($moduleId,'AdvancedRank.referral_rank') }}</label>\n' +
                '                                        <select class="form-control" name="ranks[' + lastId + '][referral_rank]">\n' +
                '                                            <option value="">{{ _mt($moduleId,'AdvancedRank.select_rank') }}</option>\n' +
                '                                            @foreach($ranks as $referralRank)\n' +
                '                                                <option value="{{ $referralRank->id }}">{{ $referralRank->name }}</option>\n' +
                '                                            @endforeach\n' +
                '                                        </select>\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                                <div class="col-sm-4">\n' +
                '                                    <div class="form-group">\n' +
                '                                        <label class="control-label">{{ _mt($moduleId,"AdvancedRank.referral_rank_count") }}</label>\n' +
                '                                        <input type="number" class="form-control"\n' +
                '                                               name="ranks[' + lastId + '][referral_rank_count]"\n' +
                '                                               value="0">\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                                <div class="col-sm-4">\n' +
                '                                    <div class="form-group">\n' +
                '                                        <label class="control-label">{{ _mt($moduleId,"AdvancedRank.minimum_leg") }}</label>\n' +
                '                                        <input type="number" class="form-control"\n' +
                '                                               name="ranks[' + lastId + '][minimum_leg_count]"\n' +
                '                                               value="0">\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                        <div class="col-sm-2">\n' +
                '                            <div class="form-group removeRank">\n' +
                '                                <button type="button" class="btn btn-danger removeRow" style="margin-top:25px;">\n' +
                '                                    <i class="fa fa-trash"></i>\n' +
                '                                </button>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        </div>\n' +
                '                        </div>\n' +
                '                    </div>';
            $('.rankContainer').append(html);

            //select2
            $('select').select2({});
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

            $('.form-body .button-submit').click(function () {

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
                    for (var key in errors) {
                        var elemKey = 'ranks' + '[' + key.split('.')[1] + ']' + '[' + key.split('.')[2] + ']';
                        $('#adminConfig [name="' + elemKey + '"]').parent().addClass('ajaxValidationError');
                        var errorOption = {};
                        errorOption[elemKey] = errors[key];
                        validator.showErrors(errorOption);
                    }
                };

                var options = {
                    form: form,
                    actionUrl: "{{ route('advancedRank.rankConfigurationSave') }}",
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
        background-color: transparent;
        color: red;
        font-size: 18px;
        padding: 3px 8px;
    }
</style>




