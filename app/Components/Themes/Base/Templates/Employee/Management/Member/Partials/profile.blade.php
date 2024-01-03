<div class="heading">
    <h3>{{ _t('member.profile') }}</h3>
</div>
<div class="profileManagement row">
    <div class="col-md-3 col-sm-3 profileNavWrapper">
        <div class="navInner">
            <div class="profileNav active" data-target="account">
                <i class="fa fa-at"></i>{{ _t('member.accountInfo') }}
            </div>
            <div class="profileNav" data-target="profile">
                <i class="fa fa-user"></i>{{ _t('member.profileInfo') }}
            </div>
            <div class="profileNav" data-target="password">
                <i class="fa fa-lock"></i>{{ _t('member.securityInfo') }}
            </div>
            <div class="profileNav" data-target="social">
                <i class="fa fa-facebook"></i>{{ _t('member.socialInfo') }}
            </div>
        </div>
    </div>
    <div class="col-md-9 col-sm-9 profilePanelWrapper">
        <div class="profilePanelInner">
            <div class="profilePanel active" data-target="account">
                <div class="profileSection mfkToggleWrap">
                    <h3 class="mfkToggle">{{ _t('member.accountInfo') }}</h3>
                    <div class="profileSectionBody toggleBody" style="display: block">
                        <fieldset>
                            <legend>{{ _t('member.basic_info') }}</legend>
                            <div class="eachField row">
                                <div class="col-md-5">
                                    <label>{{ _t('member.username') }}</label>
                                </div>
                                <div class="col-md-7">
                                    <label>{{ $user->username }}</label>
                                </div>
                            </div>
                            <div class="eachField row">
                                <div class="col-md-5">
                                    <label>{{ _t('member.sponsor') }}</label>
                                </div>
                                <div class="col-md-7">
                                    <label>{{ $user->sponsor()->username }}</label>
                                </div>
                            </div>
                            <div class="eachField row">
                                <div class="col-md-5">
                                    <label>{{ _t('member.parent') }}</label>
                                </div>
                                <div class="col-md-7">
                                    <label>{{ $user->parent()->username }}</label>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>{{ _t('member.placement_info') }}</legend>
                            <div class="eachField row">
                                <div class="col-md-5">
                                    <label>{{ _t('member.global_level') }}</label>
                                </div>
                                <div class="col-md-7">
                                    <label>{{ $user->repoData->level }}</label>
                                </div>
                            </div>
                            <div class="eachField row">
                                <div class="col-md-5">
                                    <label>{{ _t('member.sponsorBasedLevel') }}</label>
                                </div>
                                <div class="col-md-7">
                                    <label>{{ $user->repoData->level - (isset($user->repoData->sponsorUser->repoData) ? $user->repoData->sponsorUser->repoData->level : 0) }}</label>
                                </div>
                            </div>
                            <div class="eachField row">
                                <div class="col-md-5">
                                    <label>{{ _t('member.position') }}</label>
                                </div>
                                <div class="col-md-7">
                                    <label>{{ $user->repoData->position }}</label>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="profilePanel" data-target="profile">
                <div class="profileSection mfkToggleWrap">
                    {!! Form::open(['route' =>  ['employee.management.members.profileProfile'],'class' => 'form ajaxSave','id' => 'profileForm']) !!}
                    <input type="hidden" name="userId" value="{{ $user->id }}" readonly>
                    <h3 class="mfkToggle">{{ _t('member.personal') }}</h3>
                    <div class="profileSectionBody toggleBody" style="display: block">
                        <div class="eachField row">
                            <div class="col-md-5">
                                <label>{{ _t('member.firstName') }}<span class="required"
                                                                         aria-required="true"> * </span></label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" placeholder="{{ _t('member.firstName') }}" name="firstname"
                                       value="{{ $user->metaData->firstname }}">
                            </div>
                        </div>
                        <div class="eachField row">
                            <div class="col-md-5">
                                <label>{{ _t('member.lastName') }}<span class="required" aria-required="true"> * </span></label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" placeholder="{{ _t('member.lastName') }}" name="lastname"
                                       value="{{ $user->metaData->lastname }}">
                            </div>
                        </div>
                        <div class="eachField row">
                            <div class="col-md-5">
                                <label>{{ _t('member.dateOfBirth') }}<span class="required"
                                                                           aria-required="true"> * </span></label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="datePicker dob" data-date-format="yyyy-mm-dd" name="dob"
                                       value="{{ $user->metaData->dob }}">
                            </div>
                        </div>
                        <div class="eachField row">
                            <div class="col-md-5">
                                <label>{{ _t('member.gender') }}<span class="required"
                                                                      aria-required="true"> * </span></label>
                            </div>
                            <div class="col-md-7 mt-radio-inline" style="padding: 0px 10px;">
                                <label class="mt-radio">
                                    <input type="radio" name="gender" id="optionsRadios25" value="M"
                                           @if($user->MetaData->gender == 'M') checked @endif> {{ _t('member.male') }}
                                    <span></span>
                                </label>
                                <label class="mt-radio">
                                    <input type="radio" name="gender" id="optionsRadios26" value="F"
                                           @if($user->MetaData->gender == 'F') checked @endif> {{ _t('member.female') }}
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="eachField row">
                            <div class="col-md-5">
                                <label>{{ _t('member.address') }}<span class="required" aria-required="true"> * </span></label>
                            </div>
                            <div class="col-md-7">
                                <textarea class="profileAddress"
                                          name="address">{{ $user->metaData->address }}</textarea>
                            </div>
                        </div>
                        <div class="eachField row">
                            <div class="col-md-5">
                                <label>{{ _t('member.country') }}<span class="required" aria-required="true"> * </span></label>
                            </div>
                            <div class="col-md-7">
                                <select name="country_id" id="country_list"
                                        class="form-control" style="width:100%;">
                                    @foreach($countries as $country)
                                        <option value="{{ $country['id'] }}"
                                                @if($country['id'] == $user->metaData->country_id ) selected @endif>{{ $country['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="eachField row">
                            <div class="col-md-5">
                                <label>{{ _t('member.state') }}
                                    <span class="required" aria-required="true"> * </span></label>
                            </div>
                            <div class="col-md-7">
                                <select name="state_id" id="state_list"
                                        class="form-control" style="width:100%;">
                                    @foreach($states as $state)
                                        <option value="{{ $state['id'] }}"
                                                @if($state['id'] == $user->metaData->state_id ) selected @endif>{{ $state['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="eachField row">
                            <div class="col-md-5">
                                <label>{{ _t('member.city') }}<span class="required"
                                                                    aria-required="true"> * </span></label>
                            </div>
                            <div class="col-md-7">
                                <select name="city_id" id="city_list" class="form-control" style="width:100%;">
                                    @foreach($cities as $city)
                                        <option value="{{ $city['id'] }}"
                                                @if($city['id'] == $user->metaData->city_id ) selected @endif>{{ $city['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="eachField row">
                            <div class="col-md-5">
                                <label>{{ _t('member.zipcode') }}<span class="required" aria-required="true"> * </span></label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" placeholder="{{ _t('member.zipcode') }}" name="pin"
                                       value="{{ $user->metaData->pin }}">
                            </div>
                        </div>
                        <div class="eachField row">
                            <div class="col-md-5">
                                <label>{{ _t('member.mobilePhone') }}<span class="required"
                                                                           aria-required="true"> * </span></label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" placeholder="{{ _t('member.mobilePhone') }}" name="phone"
                                       value="{{ $user->phone }}">
                            </div>
                        </div>
                        <div class="eachField row">
                            <div class="col-md-5">
                                <label>{{ _t('member.email') }}<span class="required"
                                                                     aria-required="true"> * </span></label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" placeholder="{{ _t('member.email') }}" name="email"
                                       value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="eachField row">
                            <div class="col-md-5">
                                <button type="button" class="btn btn-success ladda-button profileSave"
                                        data-style="contract">
                                    {{ _t('member.save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <div class="profilePanel" data-target="password">
                <div class="profileSection mfkToggleWrap">
                    {!! Form::open(['route' =>  ['employee.management.members.profilePassword'],'class' => 'form ajaxSave','id' => 'passwordForm']) !!}
                    <input type="hidden" name="userId" value="{{ $user->id }}" readonly>
                    <h3 class="mfkToggle">{{ _t('member.changePassword') }}</h3>
                    <div class="profileSectionBody toggleBody" style="display: block">
                        <div class="eachField row">
                            <div class="col-md-5">
                                <label>{{ _t('member.password') }}<span class="required" aria-required="true"> * </span></label>
                            </div>
                            <div class="col-md-7">
                                <input type="password" name="password" id="password">
                            </div>
                        </div>
                        <div class="eachField row">
                            <div class="col-md-5">
                                <label>{{ _t('member.confirmPassword') }}<span class="required"
                                                                               aria-required="true"> * </span></label>
                            </div>
                            <div class="col-md-7">
                                <input type="password" name="confirm_password">
                            </div>
                        </div>
                        <div class="eachField row">
                            <div class="col-md-5">
                                <button type="button" class="btn btn-success ladda-button passwordSave"
                                        data-style="contract">
                                    {{ _t('member.save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
            <div class="profilePanel" data-target="social">
                <div class="profileSection mfkToggleWrap">
                    {!! Form::open(['route' =>  ['employee.management.members.profileSocial'],'class' => 'form ajaxSave','id' => 'social']) !!}
                    <input type="hidden" name="userId" value="{{ $user->id }}" readonly>
                    <h3 class="mfkToggle">{{ _t('member.social_precense') }}</h3>
                    <div class="profileSectionBody toggleBody" style="display: block">
                        <div class="eachField row">
                            <div class="col-md-5">
                                <label>{{ _t('member.about_me') }}</label>
                            </div>
                            <div class="col-md-7">
                                <textarea class="profileAddress" placeholder="{{ _t('member.about_me') }}"
                                          name="about_me">{{ $user->metaData->about_me }}</textarea>
                            </div>
                        </div>
                        <div class="eachField row">
                            <div class="col-md-5">
                                <label>{{ _t('member.faebook') }}</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" placeholder="{{ _t('member.faebook') }}" name="facebook"
                                       value="{{ $user->metaData->facebook }}">
                            </div>
                        </div>
                        <div class="eachField row">
                            <div class="col-md-5">
                                <label>{{ _t('member.twitter') }}</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" placeholder="{{ _t('member.twitter') }}" name="twitter"
                                       value="{{ $user->metaData->twitter }}">
                            </div>
                        </div>
                        <div class="eachField row">
                            <div class="col-md-5">
                                <label>{{ _t('member.linkedIn') }}</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" placeholder="{{ _t('member.linkedIn') }}" name="linked_in"
                                       value="{{ $user->metaData->linked_in }}">
                            </div>
                        </div>
                        <div class="eachField row">
                            <div class="col-md-5">
                                <label>{{ _t('member.googlePlus') }}</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" placeholder="{{ _t('member.googlePlus') }}" name="google_plus"
                                       value="{{ $user->metaData->google_plus }}">
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="eachField row">
                    <div class="col-md-5">
                        <button type="button" class="btn btn-success ladda-button socialSave"
                                data-style="contract">{{ _t('member.save') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<style>
    .eachField .required {
        color: #e02222;
        font-size: 12px;
        padding-left: 2px;
    }
</style>
<script>
    "use strict";

    $('body').on('click', '.profileNav', function () {
        $(this).addClass('active').siblings().removeClass('active');
        var target = $('.profilePanel[data-target="' + $(this).attr('data-target') + '"]');
        target.addClass('active').siblings().removeClass('active');
    });

    $(function () {
        /*// init editable field
        $('form.panelForm input[type="text"], form.panelForm textarea').each(function () {
            $(this).editableField();
        });*/


        $('.socialSave').click(function () {
            var formData = $('#social').serialize();
            $.post('{{ route("employee.management.members.profileSocial") }}', formData, function (response) {
                toastr.success('Profile updated sucessfully');
            });

        });

        $('.payoutSave').click(function () {
            var formData = $('#payout').serialize();
            $.post('{{ route("employee.management.members.profilePayout") }}', formData, function (response) {
                toastr.success('Profile updated sucessfully');
            });

        });

        $('#country_list').change(function () {
            getStates($(this).val());
        });
        $('#state_list').change(function () {
            getCities($(this).val());
        });


        //Function to retrieve states of country

        function getStates(country) {

            var options = {action: 'getStates', data: {country: country}};

            return $.post("{{ route('local.api') }}", options, function (response) {
                var states = '';
                response.forEach(function (value, index) {
                    states += '<option value="' + value.id + '">' + value.name + '</option>';
                });
                $('#state_list').html(states);
            });
        }

        //Function to retrieve cities of states

        function getCities(state) {

            var options = {action: 'getCities', data: {state: state}};
            var post = $.post("{{ route('local.api') }}", options);

            post.done(function (response) {
                var cities = '';
                response.forEach(function (value, index) {
                    cities += '<option value="' + value.id + '">' + value.name + '</option>';
                });
                $('#city_list').html(cities);
            });

            return post;
        }

        $('select').select2({
            width: '100%'
        });

        $('.dob').datepicker();
    })
</script>
<script type="text/javascript">
    'use strict';

    $(function () {

        var form = $('#passwordForm');
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
                'password': {
                    required: true,
                    ajaxValidate: true,
                },
                'confirm_password': {
                    required: true,
                    equalTo: "#password",
                    ajaxValidate: true,
                },
            },
            messages: {
                'password': {
                    required: "{{ _t('member.please_enter_password') }}",
                },
                'confirm_password': {
                    required: "{{ _t('member.Please_enter_confirm_password') }}",
                    equalTo: "{{ _t('member.Password_missmatch') }}",
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

        //SecurityInfo
        $('.passwordSave').click(function () {

            $('.ajaxValidationError').removeClass('ajaxValidationError');

            var successCallBack = function (response) {
                Ladda.stopAll();
                toastr.success("{{ _t('members.password_updated_successfully') }}");
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
                    $('#passwordForm [name="' + elemKey + '"]').parent().addClass('ajaxValidationError');
                    var errorOption = {};
                    errorOption[elemKey] = errors[key];
                    validator.showErrors(errorOption);
                }
            }

            var options = {
                form: form,
                actionUrl: "{{ route("employee.management.members.profilePassword") }}",
                successCallBack: successCallBack,
                failCallBack: failCallBack
            };
            sendForm(options);
        });


        //Profile Save

        var profileForm = $('#profileForm');
        var error1 = $('.alert-danger', profileForm);
        var success1 = $('.alert-success', profileForm);

        $.validator.addMethod('ajaxValidate', function (value, element, param) {
            var isValid = !$(element).parent().hasClass('ajaxValidationError');
            return isValid; // return bool here if valid or not.
        }, function (param, element) {
            return $(element).siblings('.help-block-error').text();
        });

        var ProfileValidator = profileForm.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
                'firstname': {
                    required: true
                },
                'lastname': {
                    required: true
                },
                'dob': {
                    required: true,
                },
                'email': {
                    required: true,
                    email: true
                },
                'phone': {
                    required: true,
                    number: true
                },
                'gender': {
                    required: true
                },
                'address': {
                    required: true
                },
                'city_id': {
                    required: true
                },
                'country_id': {
                    required: true
                },
                'state_id': {
                    required: true
                },
                'pin': {
                    required: true,
                    number: true
                },

            },
            messages: {
                'firstname': {
                    required: "{{ _t('member.please_enter_first_name') }}"
                },
                'lastname': {
                    required: "{{ _t('member.please_enter_last_name') }}"
                },
                'dob': {
                    required: "{{ _t('member.please_enter_dob') }}"
                },
                'email': {
                    required: "{{ _t('member.please_enter_email') }}",
                    email: "{{ _t('member.please_enter_valid_email') }}",
                },
                'phone': {
                    required: "{{ _t('member.please_enter_phone') }}",
                    number: "{{ _t('member.please_enter_valid_phone') }}",
                },
                'gender': {
                    required: "{{ _t('member.please_enter_gender') }}",
                },
                'address': {
                    required: "{{ _t('member.please_enter_address') }}",
                },
                'city_list': {
                    required: "{{ _t('member.please_enter_city') }}",
                },
                'country_list': {
                    required: "{{ _t('member.please_enter_country') }}",
                },
                'state_list': {
                    required: "{{ _t('member.please_enter_state') }}",
                },
                'pin': {
                    required: "{{ _t('member.please_enter_pin') }}",
                    number: "{{ _t('member.please_enter_valid_pin') }}",
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

        $('.profileSave').click(function () {

            $('.ajaxValidationError').removeClass('ajaxValidationError');

            var successCallBack = function (response) {
                Ladda.stopAll();
                toastr.success("{{ _t('member.profile_updated_successfully') }}");
            }

            if (!profileForm.valid()) {
                Ladda.stopAll();
                return false;
            }

            var failCallBack = function (response) {
                Ladda.stopAll();
                var errors = response.responseJSON;

                for (var key in errors) {
                    var elemKey = key;
                    $('#profileForm [name="' + elemKey + '"]').parent().addClass('ajaxValidationError');
                    var errorOption = {};
                    errorOption[elemKey] = errors[key];
                    ProfileValidator.showErrors(errorOption);
                }
            }

            var options = {
                form: profileForm,
                actionUrl: "{{ route("employee.management.members.profileProfile") }}",
                successCallBack: successCallBack,
                failCallBack: failCallBack
            };
            sendForm(options);
        });
    });

    $('body').on('keyup click', '.ajaxValidationError input', function () {
        $(this).parent().removeClass('ajaxValidationError');
    });

    preventReloadPageIfChangesNotSave($("form.profileForm"));

</script>