<div class="row cronFormWrapper">
    {!! Form::open(['route' => 'cron.save','class' => 'cronForm ajaxSave','id' => 'cronForm', 'novalidate' => 'novalidate']) !!}
    <input type="hidden" name="id" id="id" class="form-control"/>
    <div class="col-sm-12 cronBox">
        <div class="" id="" name="">
            <div class="portlet-body fieldFormUnitHolder" style="position: relative;">
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="title">{{ _t('settings.common_settings') }}</label>
                    </div>
                    <div class="col-sm-12">
                        <select class="form-control commonSettings common_options">
                            <option value="--">-- {{ _t('settings.common_settings') }} --</option>
                            <option value="* * * * *">{{ _t('settings.once_per_minute') }}(* * * * *)</option>
                            <option value="*/5 * * * *">{{ _t('settings.once_per_five_minutes') }}(*/5 * * * *)</option>
                            <option value="0,30 * * * *">{{ _t('settings.twice_per_hour') }}(0,30 * * * *)</option>
                            <option value="0 * * * *">{{ _t('settings.once_per_hour') }}(0 * * * *)</option>
                            <option value="0 0,12 * * *">{{ _t('settings.twice_per_day') }}(0 0,12 * * *)</option>
                            <option value="0 0 * * *">{{ _t('settings.once_per_day') }}(0 0 * * *)</option>
                            <option value="0 0 * * 0">{{ _t('settings.once_per_week') }}(0 0 * * 0)</option>
                            <option value="0 0 1,15 * *">
                                {{ _t('settings.on_the_1st_and_15th_of_the_month') }}(0 0 1,15 * *)
                            </option>
                            <option value="0 0 1 * *">{{ _t('settings.once_per_month') }}(0 0 1 * *)</option>
                            <option value="0 0 1 1 *">{{ _t('settings.once_per_year') }}(0 0 1 1 *)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="title">{{ _t('settings.minute') }}<span class="required"
                                                                            aria-required="true"> * </span></label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="minute" id="minute" value="" class="form-control"/>
                    </div>
                    <div class="col-sm-8">
                        <select class="form-control commonSettings select_single_option" id="minute_options"
                                data-id="minute">
                            <option value="--">-- {{ _t('settings.common_settings') }} --</option>
                            <option value="*">{{ _t('settings.once_per_minute') }}(*)</option>
                            <option value="*/2">{{ _t('settings.once_per_two_minutes') }}(*/2)</option>
                            <option value="*/5">{{ _t('settings.once_per_five_minutes') }}(*/5)</option>
                            <option value="*/10">{{ _t('settings.once_per_ten_minutes') }}(*/10)</option>
                            <option value="*/15">{{ _t('settings.once_per_fifteen_minutes') }}(*/15)</option>
                            <option value="0,30">{{ _t('settings.once_per_thirty_minutes') }}(0,30)</option>
                            <option value="--">-- {{ _t('settings.minutes') }} --</option>
                            <option value="0">:00 ({{ _t('settings.at_the_beginning_of_the_hour') }}.) (0)</option>
                            <option value="1">:01 (1)</option>
                            <option value="2">:02 (2)</option>
                            <option value="3">:03 (3)</option>
                            <option value="4">:04 (4)</option>
                            <option value="5">:05 (5)</option>
                            <option value="6">:06 (6)</option>
                            <option value="7">:07 (7)</option>
                            <option value="8">:08 (8)</option>
                            <option value="9">:09 (9)</option>
                            <option value="10">:10 (10)</option>
                            <option value="11">:11 (11)</option>
                            <option value="12">:12 (12)</option>
                            <option value="13">:13 (13)</option>
                            <option value="14">:14 (14)</option>
                            <option value="15">:15 ({{ _t('settings.at_one_quarter_past_the_hour') }}.) (15)</option>
                            <option value="16">:16 (16)</option>
                            <option value="17">:17 (17)</option>
                            <option value="18">:18 (18)</option>
                            <option value="19">:19 (19)</option>
                            <option value="20">:20 (20)</option>
                            <option value="21">:21 (21)</option>
                            <option value="22">:22 (22)</option>
                            <option value="23">:23 (23)</option>
                            <option value="24">:24 (24)</option>
                            <option value="25">:25 (25)</option>
                            <option value="26">:26 (26)</option>
                            <option value="27">:27 (27)</option>
                            <option value="28">:28 (28)</option>
                            <option value="29">:29 (29)</option>
                            <option value="30">:30 ({{ _t('settings.at_half_past_the_hour') }}.) (30)</option>
                            <option value="31">:31 (31)</option>
                            <option value="32">:32 (32)</option>
                            <option value="33">:33 (33)</option>
                            <option value="34">:34 (34)</option>
                            <option value="35">:35 (35)</option>
                            <option value="36">:36 (36)</option>
                            <option value="37">:37 (37)</option>
                            <option value="38">:38 (38)</option>
                            <option value="39">:39 (39)</option>
                            <option value="40">:40 (40)</option>
                            <option value="41">:41 (41)</option>
                            <option value="42">:42 (42)</option>
                            <option value="43">:43 (43)</option>
                            <option value="44">:44 (44)</option>
                            <option value="45">:45 ({{ _t('settings.at_one_quarter_until_the_hour') }}.) (45)</option>
                            <option value="46">:46 (46)</option>
                            <option value="47">:47 (47)</option>
                            <option value="48">:48 (48)</option>
                            <option value="49">:49 (49)</option>
                            <option value="50">:50 (50)</option>
                            <option value="51">:51 (51)</option>
                            <option value="52">:52 (52)</option>
                            <option value="53">:53 (53)</option>
                            <option value="54">:54 (54)</option>
                            <option value="55">:55 (55)</option>
                            <option value="56">:56 (56)</option>
                            <option value="57">:57 (57)</option>
                            <option value="58">:58 (58)</option>
                            <option value="59">:59 (59)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="title">{{ _t('settings.hour') }}<span class="required"
                                                                          aria-required="true"> * </span></label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="hour" id="hour" value="" class="form-control"/>
                    </div>
                    <div class="col-sm-8">
                        <select class="form-control commonSettings select_single_option" id="hour_options"
                                data-id="hour">
                            <option value="--">-- {{ _t('settings.common_settings') }} --</option>
                            <option value="*">{{ _t('settings.every_hour') }} (*)</option>
                            <option value="*/2">{{ _t('settings.every_other_hour') }} (*/2)</option>
                            <option value="*/3">{{ _t('settings.every_third_hour') }} (*/3)</option>
                            <option value="*/4">{{ _t('settings.every_forth_hour') }} (*/4)</option>
                            <option value="*/6">{{ _t('settings.every_sixth_hour') }} (*/6)</option>
                            <option value="0,12">{{ _t('settings.every_twelve_hour') }} (0,12)</option>
                            <option value="--">-- {{ _t('settings.hours') }} --</option>
                            <option value="0">12:00 {{ _t('settings.am') }} {{ _t('settings.midnight') }} (0)
                            </option>
                            <option value="1">1:00 {{ _t('settings.am') }} (1)</option>
                            <option value="2">2:00 {{ _t('settings.am') }} (2)</option>
                            <option value="3">3:00 {{ _t('settings.am') }} (3)</option>
                            <option value="4">4:00 {{ _t('settings.am') }} (4)</option>
                            <option value="5">5:00 {{ _t('settings.am') }} (5)</option>
                            <option value="6">6:00 {{ _t('settings.am') }} (6)</option>
                            <option value="7">7:00 {{ _t('settings.am') }} (7)</option>
                            <option value="8">8:00 {{ _t('settings.am') }} (8)</option>
                            <option value="9">9:00 {{ _t('settings.am') }} (9)</option>
                            <option value="10">10:00 {{ _t('settings.am') }} (10)</option>
                            <option value="11">11:00 {{ _t('settings.am') }} (11)</option>
                            <option value="12">12:00 {{ _t('settings.pm') }} {{ _t('settings.noon') }} (12)</option>
                            <option value="13">1:00 {{ _t('settings.pm') }} (13)</option>
                            <option value="14">2:00 {{ _t('settings.pm') }} (14)</option>
                            <option value="15">3:00 {{ _t('settings.pm') }} (15)</option>
                            <option value="16">4:00 {{ _t('settings.pm') }} (16)</option>
                            <option value="17">5:00 {{ _t('settings.pm') }} (17)</option>
                            <option value="18">6:00 {{ _t('settings.pm') }} (18)</option>
                            <option value="19">7:00 {{ _t('settings.pm') }} (19)</option>
                            <option value="20">8:00 {{ _t('settings.pm') }} (20)</option>
                            <option value="21">9:00 {{ _t('settings.pm') }} (21)</option>
                            <option value="22">10:00 {{ _t('settings.pm') }} (22)</option>
                            <option value="23">11:00 {{ _t('settings.pm') }} (23)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="title">{{ _t('settings.day') }}<span class="required"
                                                                         aria-required="true"> * </span></label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="day" id="day" value="" class="form-control"/>
                    </div>
                    <div class="col-sm-8">
                        <select class="form-control commonSettings select_single_option" id="day_options" data-id="day">
                            <option value="--">-- {{ _t('settings.common_settings') }} --</option>
                            <option value="*">{{ _t('settings.every_day') }} (*)</option>
                            <option value="*/2">{{ _t('settings.every_other_day') }} (*/2)</option>
                            <option value="1,15">{{ _t('settings.on_first_and_15th') }} (1,15)</option>
                            <option value="--">-- {{ _t('settings.days') }} --</option>
                            <option value="1">1st (1)</option>
                            <option value="2">2nd (2)</option>
                            <option value="3">3rd (3)</option>
                            <option value="4">4th (4)</option>
                            <option value="5">5th (5)</option>
                            <option value="6">6th (6)</option>
                            <option value="7">7th (7)</option>
                            <option value="8">8th (8)</option>
                            <option value="9">9th (9)</option>
                            <option value="10">10th (10)</option>
                            <option value="11">11th (11)</option>
                            <option value="12">12th (12)</option>
                            <option value="13">13th (13)</option>
                            <option value="14">14th (14)</option>
                            <option value="15">15th (15)</option>
                            <option value="16">16th (16)</option>
                            <option value="17">17th (17)</option>
                            <option value="18">18th (18)</option>
                            <option value="19">19th (19)</option>
                            <option value="20">20th (20)</option>
                            <option value="21">21st (21)</option>
                            <option value="22">22nd (22)</option>
                            <option value="23">23rd (23)</option>
                            <option value="24">24th (24)</option>
                            <option value="25">25th (25)</option>
                            <option value="26">26th (26)</option>
                            <option value="27">27th (27)</option>
                            <option value="28">28th (28)</option>
                            <option value="29">29th (29)</option>
                            <option value="30">30th (30)</option>
                            <option value="31">31st (31)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="title">{{ _t('settings.month') }}<span class="required"
                                                                           aria-required="true"> * </span></label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="month" id="month" value="" class="form-control"/>
                    </div>
                    <div class="col-sm-8">
                        <select class="form-control commonSettings select_single_option" id="month_options"
                                data-id="month">
                            <option value="--">-- {{ _t('settings.common_settings') }} --</option>
                            <option value="*">{{ _t('settings.every_month') }} (*)</option>
                            <option value="*/2">{{ _t('settings.every_other_month') }} (*/2)</option>
                            <option value="*/4">{{ _t('settings.every_third_month') }} (*/4)</option>
                            <option value="1,7">{{ _t('settings.every_six_month') }} (1,7)</option>
                            <option value="--">-- {{ _t('settings.months') }} --</option>
                            <option value="1">{{ _t('settings.january') }} (1)</option>
                            <option value="2">{{ _t('settings.february') }} (2)</option>
                            <option value="3">{{ _t('settings.march') }} (3)</option>
                            <option value="4">{{ _t('settings.april') }} (4)</option>
                            <option value="5">{{ _t('settings.may') }} (5)</option>
                            <option value="6">{{ _t('settings.june') }} (6)</option>
                            <option value="7">{{ _t('settings.july') }} (7)</option>
                            <option value="8">{{ _t('settings.august') }} (8)</option>
                            <option value="9">{{ _t('settings.september') }} (9)</option>
                            <option value="10">{{ _t('settings.october') }} (10)</option>
                            <option value="11">{{ _t('settings.november') }} (11)</option>
                            <option value="12">{{ _t('settings.december') }} (12)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="title">{{ _t('settings.weekday') }}<span class="required"
                                                                             aria-required="true"> * </span></label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="weekday" id="weekday" value="" class="form-control"/>
                    </div>
                    <div class="col-sm-8">
                        <select class="form-control commonSettings select_single_option" id="weekday_options"
                                data-id="weekday">
                            <option value="--">-- {{ _t('settings.common_settings') }} --</option>
                            <option value="*">{{ _t('settings.every_day') }} (*)</option>
                            <option value="1-5">{{ _t('settings.every_weekday') }} (1-5)</option>
                            <option value="0,6">{{ _t('settings.every_weekend_day') }} (6,0)</option>
                            <option value="1,3,5">{{ _t('settings.every_m_w_f') }} (1,3,5)</option>
                            <option value="2,4">{{ _t('settings.every_tt') }} (2,4)</option>
                            <option value="--">-- {{ _t('settings.weekdays') }} --</option>
                            <option value="0">{{ _t('settings.sunday') }} (0)</option>
                            <option value="1">{{ _t('settings.monday') }} (1)</option>
                            <option value="2">{{ _t('settings.tuesday') }} (2)</option>
                            <option value="3">{{ _t('settings.wednesday') }} (3)</option>
                            <option value="4">{{ _t('settings.thursday') }} (4)</option>
                            <option value="5">{{ _t('settings.friday') }} (5)</option>
                            <option value="6">{{ _t('settings.saturday') }} (6)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="title">{{ _t('settings.task') }}</label>
                    </div>
                    <div class="col-sm-12">
                        <select class="form-control" name="task" id="task">
                            <option value=""> {{ _t('settings.select_task') }} </option>
                            @foreach($cronJobs as $key => $value)
                                <option value="{{ $key }}">{{ $value['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="title">{{ _t('settings.route') }}</label>
                    </div>
                    <div class="col-sm-12">
                        <select class="form-control" name="route" id="route">
                            <option value=""> {{ _t('settings.select_route') }} </option>
                            @foreach($routes as $route)
                                <option value="{{ $route->id }}">{{ $route->route_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="title">{{ _t('settings.url') }}</label>
                    </div>
                    <div class="col-sm-12">
                        <input type="text" name="url" id="url" value="" class="form-control"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="title">{{ _t('settings.status') }}<span class="required"
                                                                            aria-required="true"> * </span></label>
                    </div>
                    <div class="col-sm-12">
                        <select class="form-control status" id="status" name="status">
                            <option value="1">{{ _t('settings.enable') }}</option>
                            <option value="0">{{ _t('settings.disable') }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="button" class="btn green button-submit"
                                data-style="contract"><i class="fa fa-check"></i> {{ _t('settings.save') }}
                        </button>
                        <button type="button" class="btn black resetForm"
                                data-style="contract"><i class="fa fa-refresh"></i> {{ _t('settings.reset') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>


<script type="text/javascript">
    "use strict";

    //Document ready functions
    $(function () {

        $('.commonSettings').select2({
            width: '100%',
        });

        $('select').select2({
            width: '100%',
        });

        $('.common_options').change(function () {
            var arg = $(this).val().split(" ");
            $('#minute_options').val(arg[0]).trigger('change');
            $('#hour_options').val(arg[1]).trigger('change');
            $('#day_options').val(arg[2]).trigger('change');
            $('#month_options').val(arg[3]).trigger('change');
            $('#weekday_options').val(arg[4]).trigger('change');
        });

        $('.select_single_option').change(function () {
            $('#' + $(this).attr('data-id')).val($(this).val());
        });

        $('.resetForm').click(function () {
            loadForm();
        });

        var form = $('#cronForm');
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
                'minute': {
                    required: true,
                    ajaxValidate: true,
                },
                'hour': {
                    required: true,
                    ajaxValidate: true,
                },
                'day': {
                    required: true,
                    ajaxValidate: true,
                },
                'month': {
                    required: true,
                    ajaxValidate: true,
                },
                'weekday': {
                    required: true,
                    ajaxValidate: true,
                },
            },
            messages: {
                'minute': {
                    required: "{{ _t('settings.time_format_error') }}",
                },
                'hour': {
                    required: "{{ _t('settings.time_format_error') }}",
                },
                'day': {
                    required: "{{ _t('settings.time_format_error') }}",
                },
                'month': {
                    required: "{{ _t('settings.time_format_error') }}",
                },
                'weekday': {
                    required: "{{ _t('settings.time_format_error') }}",
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
                loadList();
                loadForm();
                toastr.success("{{ _t('settings.cron_updated_successfully') }}");
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
                    $('#cronForm [name="' + elemKey + '"]').parent().addClass('ajaxValidationError');
                    var errorOption = {};
                    errorOption[elemKey] = errors[key];
                    validator.showErrors(errorOption);
                }
            };

            var options = {
                form: form,
                actionUrl: "{{ route('cron.save') }}",
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