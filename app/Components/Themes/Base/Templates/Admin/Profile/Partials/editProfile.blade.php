@component('Components.demoWarning') @endcomponent
<div id='profile_edit' class="profile-content">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light ">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">{{ _t('profile.profile') }}</span>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1" data-toggle="tab">{{ _t('profile.account_info') }}</a>
                        </li>
                        <li class="">
                            <a href="#tab_2" data-toggle="tab">{{ _t('profile.personal_info') }}</a>
                        </li>
                        <li>
                            <a href="#tab_4" data-toggle="tab">{{ _t('profile.change_password') }}</a>
                        </li>
                        <li>
                            <a href="#tab_6" data-toggle="tab">{{ _t('profile.change_pin') }}</a>
                        </li>
                        <li>
                            <a href="#tab_5" data-toggle="tab">{{ _t('profile.social_info') }}</a>
                        </li>
                        {{--<li>--}}
                        {{--<a href="#tab_7" data-toggle="tab">{{ _t('profile.localization') }}</a>--}}
                        {{--</li>--}}
                    </ul>
                </div>
                <div class="portlet-body">
                    <div class="formOuterWrap">
                        <form class="tab-content updateProfile" data-content="my-profile">
                            <!-- ACCOUNT INFO TAB -->
                            <div class="tab-pane active" id="tab_1">
                                <div class="echSection basicInfo">
                                    <div class="form-group">
                                        <label class="control-label">{{ _t('profile.username') }}</label>
                                        <input type="text" readonly name="profile[basic][username]"
                                               value="{{ $profile->username }}" class="form-control">
                                    </div>
                                    {{--  <div class="form-group">
                                          <label class="control-label">{{ _t('profile.sponsor_name') }}</label>
                                          <input type="text" readonly name="sponsor"
                                                 @if($profile->RepoData->sponsor_id) value="{{ idToUsername($profile->RepoData->sponsor_id) }}"  @endif   class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label">{{ _t('profile.placement') }}</label>
                                          <input type="text" readonly name="placement"
                                                 @if($profile->RepoData->placement_id) value="{{ idToUsername($profile->RepoData->placement_id) }}"  @endif  class="form-control">
                                      </div>
                                      <input type="hidden" value="{{ $profile->MetaData->profile_pic }}"
                                             name="profile[meta][profile_pic]" id="proPicInput">--}}
                                </div>
                            </div>
                            <!-- END ACCOUNT INFO TAB -->

                            <!-- PERSONAL INFO TAB -->
                            <div class="tab-pane" id="tab_2">
                                <div class="echSection metaInfo">
                                    <div class="form-group">
                                        <label class="control-label">{{ _t('register.country') }}</label>

                                        <select name="profile[meta][country_id]" id="country_list"
                                                class="form-control" style="width:100%;">
                                            @foreach($countries as $country)
                                                <option value="{{ $country['id'] }}"
                                                        @if($country['id'] == 101 ) selected @endif>{{ $country['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{ _t('profile.firstname') }}</label>
                                        <input type="text" name="profile[meta][firstname]"
                                               value="{{ $profile->MetaData->firstname }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{ _t('profile.lastname') }}</label>
                                        <input type="text" name="profile[meta][lastname]"
                                               value="{{ $profile->MetaData->lastname }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label ">{{ _t('profile.dob') }}</label>
                                        <input type="text" name="profile[meta][dob]"
                                               value="{{ $profile->MetaData->dob }}" data-date-format="yyyy-mm-dd"
                                               class="form-control dob">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label ">{{ _t('profile.document_no') }}</label>
                                        <input type="text" name="profile[meta][passport_no]"
                                               value="{{ $profile->MetaData->passport_no }}" class="form-control">
                                    </div>
                                    {{-- <div class="form-group">
                                         <label class="control-label ">{{ _t('profile.type_of_document') }}</label>
                                         <input type="text" name="profile[meta][type_of_document]"
                                                value="{{ $profile->MetaData->type_of_document }}" class="form-control dob">
                                     </div>

                                     <div class="form-group">
                                         <div class="radio-list">
                                             <label>
                                                 <input type="radio" @if($profile->MetaData->gender == 'M') checked
                                                        @endif name="profile[meta][gender]" value="M"
                                                        data-title="Male"> {{ _t('profile.male') }}
                                             </label>
                                             <label>
                                                 <input type="radio" @if($profile->MetaData->gender == 'F') checked
                                                        @endif name="profile[meta][gender]" value="F"
                                                        data-title="Female"> {{ _t('profile.female') }}
                                             </label>
                                         </div>
                                     </div>
                                     {{--<div class="form-group">
                                         <label class="control-label ">{{ _t('profile.nationality') }}</label>
                                         <input type="text" name="profile[meta][nationality]"
                                                value="{{ $profile->MetaData->nationality }}" class="form-control dob">
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label ">{{ _t('profile.place_of_birth') }}</label>
                                         <input type="text" name="profile[meta][place_of_birth]"
                                                value="{{ $profile->MetaData->place_of_birth }}" class="form-control dob">
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label ">{{ _t('profile.date_of_passport_issue') }}</label>
                                         <input type="text" name="profile[meta][date_of_passport_issuance]"
                                                value="{{ $profile->MetaData->date_of_passport_issuance }}" class="form-control dob">
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label ">{{ _t('profile.country_of_passprt_issue') }}</label>
                                         <select name="profile[meta][country_of_passport_issuance]" id="country_list"
                                                 class="form-control" style="width:100%;">
                                             @foreach($countries as $country)
                                                 <option value="{{ $country['id'] }}"
                                                         @if($country['id'] == $profile->metaData->country_of_passport_issuance ) selected @endif>{{ $country['name'] }}</option>
                                             @endforeach
                                         </select>
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label ">{{ _t('profile.passport_expirition_date') }}</label>
                                         <input type="text" name="profile[meta][passport_expirition_date]"
                                                value="{{ $profile->MetaData->passport_expirition_date }}" class="form-control dob">
                                     </div>--}}
                                    <div class="form-group">
                                        <label class="control-label">{{ _t('profile.email') }}</label>
                                        <input type="text" name="profile[basic][email]"
                                               value="{{ $profile->email }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{ _t('profile.phone') }}</label>
                                        <input type="text" name="profile[basic][phone]"
                                               value="{{ $profile->phone }}" class="form-control">
                                    </div>
                                    {{--  <div class="form-group">
                                          <label class="control-label ">{{ _t('profile.street_name') }}</label>
                                          <input type="text" name="profile[meta][street_name]"
                                                 value="{{ $profile->MetaData->street_name }}" class="form-control dob">
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label ">{{ _t('profile.house_no') }}</label>
                                          <input type="text" name="profile[meta][house_no]"
                                                 value="{{ $profile->MetaData->house_no }}" class="form-control">
                                      </div>--}}
                                    <div class="form-group">
                                        <label class="control-label ">Post Code</label>
                                        <input type="text" name="profile[meta][postcode]"
                                               value="{{ $profile->MetaData->postcode }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label ">{{ _t('profile.country') }}</label>
                                        <select name="profile[meta][address_country]" id="country_list"
                                                class="form-control" style="width:100%;">
                                            @foreach($countries as $country)
                                                <option value="{{ $country['id'] }}"
                                                        @if($country['id'] == $profile->metaData->address_country ) selected @endif>{{ $country['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label ">{{ _t('profile.city') }}</label>
                                        <input type="text" name="profile[meta][city]"
                                               value="{{ $profile->MetaData->city }}" class="form-control">
                                    </div>
                                    {{--<div class="form-group">
                                        <label class="control-label ">{{ _t('profile.additional_information') }}</label>
                                        <input type="text" name="profile[meta][additional_info]"
                                               value="{{ $profile->MetaData->additional_info }}" class="form-control">
                                    </div>--}}
                                </div>
                            </div>

                            <!-- END PERSONAL INFO TAB -->

                            <!-- CHANGE PASSWORD TAB -->
                            <div class="tab-pane" id="tab_4">
                                <div class="echSection credentials">
                                    <div class="form-group">
                                        <label class="control-label">{{ _t('profile.current_password') }}</label>
                                        <input type="password" name="current_password" id="current_password"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{ _t('profile.new_password') }}</label>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{ _t('profile.re_type_password') }}</label>
                                        <input name="password_confirmation" id="password_confirmation" type="password"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!-- END CHANGE PASSWORD TAB -->


                            <!-- CHANGE ABOUT ME -->
                            <div class="tab-pane" id="tab_5">
                                <label class="control-label">{{ _t('profile.about_me') }}</label>
                                <div class="echSection credentials">
                                    <textarea name="profile[meta][about_me]"
                                              class="form-control aboutMe">{{ $profile->MetaData->about_me }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{ _t('profile.facebook') }}</label>
                                    <input type="text" name="profile[meta][facebook]"
                                           value="{{ $profile->MetaData->facebook }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{ _t('profile.twitter') }}</label>
                                    <input type="text" name="profile[meta][twitter]"
                                           value="{{ $profile->MetaData->twitter }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{ _t('profile.linked_in') }}</label>
                                    <input type="text" name="profile[meta][linked_in]"
                                           value="{{ $profile->MetaData->linked_in }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{ _t('profile.google_plus') }}</label>
                                    <input type="text" name="profile[meta][google_plus]"
                                           value="{{ $profile->MetaData->google_plus }}" class="form-control">
                                </div>
                            </div>
                            <!-- END CHANGE ABOUT ME TAB -->

                            <!-- CHANGE PIN TAB -->
                            <div class="tab-pane" id="tab_6">
                                <div class="echSection credentials">
                                    <div class="form-group">
                                        <label class="control-label">{{ _t('profile.current_pin') }}</label>
                                        <input type="password" name="current_pin" id="current_pin" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{ _t('profile.new_pin') }}</label>
                                        <input type="password" name="pin" id="pin" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{ _t('profile.re_type_pin') }}</label>
                                        <input name="pin_confirmation" id="pin_confirmation" type="password"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!-- END CHANGE PIN TAB -->


                            <!-- CHANGE LOCALIZATION TAB -->
                        {{--<div class="tab-pane" id="tab_7">--}}
                        {{--<div class="echSection credentials">--}}
                        {{--<div class="form-group">--}}
                        {{--@php--}}
                        {{--$lang = json_decode(getConfig('localization','manage_language'));--}}
                        {{--@endphp--}}

                        {{--<label class="control-label">{{ _t('profile.default_language') }}</label>--}}
                        {{--<select name="profile[basic][language]" class="form-control">--}}
                        {{--@foreach(LaravelLocalization::getSupportedLocales() as $key => $local)--}}
                        {{--@if(in_array($key, $lang))--}}
                        {{--<option @if($profile->language == $key) selected @endif value="{{ $key }}">--}}
                        {{--<img src="{{ asset('images/flags/flags_iso/16/' .$key. '.png' ) }}">--}}
                        {{--{{ $local['name'] }}--}}

                        {{--</option>--}}
                        {{--@endif--}}
                        {{--@endforeach--}}
                        {{--</select>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                        {{--<label class="control-label">{{ _t('profile.default_currency') }}</label>--}}
                        {{--<select name="profile[basic][currency]" class="form-control">--}}
                        {{--@foreach(currency()->getCurrencies() as $currency)--}}
                        {{--<option @if($profile->language == $currency['code']) selected @endif  value="{{ $currency['code'] }}">--}}
                        {{--{{ $currency['symbol'] }} {{ $currency['code'] }}--}}
                        {{--</option>--}}
                        {{--@endforeach--}}
                        {{--</select>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <!-- END LOCALIZATION TAB -->


                            <!-- END PRIVACY SETTINGS TAB -->
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#buttonUpdateModal" style="min-width: 100px">
                                {{ _t('profile.save_changes') }}
                            </button>

                            <div class="modal fade" id="buttonUpdateModal" tabindex="-1" role="dialog"
                                 aria-labelledby="buttonUpdateModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>{{ _t('member.save_confirm') }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="javascript:;" class="btn green ladda-button buttonUpdate"
                                               data-style="contract"> {{ _t('profile.save_changes') }} </a>
                                            <a href="javascript:;" class="btn default ladda-button buttonCancel"
                                               data-style="contract"> {{ _t('profile.cancel') }} </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>"use strict";

    function format(state) {
        if (!state.id)
            return state.text; // optgroup
        return "<img class='flag' src='{{ themeAssetUrl('../../global/img/flags/" + state.id.toLowerCase() + ".png') }}/>&nbsp;&nbsp;" + state.text;
    }

    var form = $('form.updateProfile');

    $('[data-content="my-profile"]').on('keyup', 'input', function () {
        $('[data-target="#buttonUpdateModal"]').text('{{ _t('profile.save_changes') }}');
    });

    $('[data-content="my-profile"]').on('change', 'select', function () {
        $('[data-target="#buttonUpdateModal"]').text('{{ _t('profile.save_changes') }}');
    });

    //Document ready functions

    $(function () {
        //Ladda init

        Ladda.bind('.buttonUpdate, .buttonCancel');

        $('.aboutMe').summernote({
            height: 150
        });

        $('.dob').datepicker();

        //Country state city initialization

        $("#country_list,#state_list,#city_list").select2({
            placeholder: "Select",
            allowClear: true,
            formatResult: format,
            width: '100%',
            formatSelection: format,
            escapeMarkup: function (m) {
                return m;
            }
        });

        //Defines validator

        var form = $('.updateProfile');
        var error = $('.alert-danger', form);
        var success = $('.alert-success', form);

        var validateInstance = form.validate({
            doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                'profile[meta][firstname]': {
                    required: true
                },
                'profile[meta][lastname]': {
                    required: true
                },
                'profile[basic][email]': {
                    required: true,
                    email: true
                },
                'profile[basic][phone]': {
                    required: true,
                    number: true
                },
                'profile[meta][passport_no]': {
                    required: true,
                    alpha_numeric: true,
                },
                'profile[meta][gender]': {
                    required: true
                },
                /*  'profile[meta][type_of_document]': {
                      required: true
                  },
                  'profile[meta][passport_no]': {
                      required: true
                  },
                  'profile[meta][nationality]': {
                      required: true
                  },
                  'profile[meta][place_of_birth]': {
                      required: true
                  },
                  'profile[meta][date_of_passport_issuance]': {
                      required: true,
                  },
                  'profile[meta][country_of_passport_issuance]': {
                      required: true
                  },
                  'profile[meta][passport_expirition_date]': {
                      required: true
                  },
                  'profile[meta][street_name]': {
                      required: true
                  },
                  'profile[meta][house_no]': {
                      required: true
                  },*/
                'profile[meta][postcode]': {
                    required: true,
                },
                'profile[meta][address_country]': {
                    required: true
                },
                'profile[meta][city]': {
                    required: true
                },
                'password_confirmation': {
                    required: function (element) {
                        return $("#password").val() != "";
                    },
                    equalTo: "#password",
                },
                'current_password': {
                    required: function (element) {
                        return $("#password").val() != "";
                    }
                },
                'pin_confirmation': {
                    required: function (element) {
                        return $("#pin").val() != "";
                    },
                    equalTo: "#pin",
                },
                'current_pin': {
                    required: function (element) {
                        return $("#pin").val() != "";
                    }
                },

            },
            messages: {// custom messages for radio buttons and checkboxes
                'profile[meta][name]': {
                    required: "{{ _t('profile.please_enter_first_name') }}"
                },
                'profile[meta][lastname]': {
                    required: "{{ _t('profile.please_enter_last_name') }}"
                },
                'profile[basic][email]': {
                    required: "{{ _t('profile.please_enter_email') }}",
                    email: "{{ _t('profile.please_enter_valid_email') }}",
                },
                'profile[basic][phone]': {
                    required: "{{ _t('profile.please_enter_phone') }}",
                    number: "{{ _t('profile.please_enter_valid_phone') }}",
                },
                'profile[meta][gender]': {
                    required: "{{ _t('profile.please_enter_gender') }}",
                },
                'profile[meta][type_of_document]': {
                    required: "{{ _t('profile.please_enter_type_of_document') }}",
                },
                'profile[meta][passport_no]': {
                    required: "{{ _t('profile.please_enter_passport_no') }}",
                    alpha_numeric: "{{ _t('profile.please_enter_valid_phone') }}",
                },
                'profile[meta][nationality]': {
                    required: "{{ _t('profile.please_enter_nationality') }}",
                },
                'profile[meta][place_of_birth]': {
                    required: "{{ _t('profile.please_enter_place_of_birth') }}",
                },
                'profile[meta][date_of_passport_issuance]': {
                    required: "{{ _t('profile.please_enter_date_of_passport_issuance') }}",
                },
                'profile[meta][country_of_passport_issuance]': {
                    required: "{{ _t('profile.please_enter_country_of_passport_issuance') }}",
                },
                'profile[meta][passport_expirition_date]': {
                    required: "{{ _t('profile.please_enter_passport_expirition_date') }}",
                },
                'profile[meta][street_name]': {
                    required: "{{ _t('profile.please_enter_street_name') }}",
                },
                'profile[meta][house_no]': {
                    required: "{{ _t('profile.please_enter_house_no') }}",
                },
                'profile[meta][postcode]': {
                    required: "{{ _t('profile.please_enter_postcode') }}",
                },
                'profile[meta][address_country]': {
                    required: "{{ _t('profile.please_enter_country') }}",
                },
                'profile[meta][city]': {
                    required: "{{ _t('profile.please_enter_city') }}",
                },
                'password_confirmation': {
                    required: "{{ _t('profile.please_enter_confirm_password') }}",
                    equalTo: "{{ _t('profile.Password_missmatch') }}",
                },
                'current_password': {
                    required: "{{ _t('profile.please_enter_current_password') }}",
                },
                'pin_confirmation': {
                    required: "{{ _t('profile.please_enter_confirm_pin') }}",
                    equalTo: "{{ _t('profile.pin_missmatch') }}",
                },
                'current_pin': {
                    required: "{{ _t('profile.please_enter_current_pin') }}",
                },
            },
            errorPlacement: function (error, element) { // render error placement for each input type
                if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                    error.insertAfter("#form_gender_error");
                } else if (element.attr("name") == "payment[]") { // for uniform checkboxes, insert the after the given container
                    error.insertAfter("#form_payment_error");
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                Ladda.stopAll();
                success.hide();
                error.show();
                App.scrollTo(error, -200);
                $('#buttonUpdateModal').modal('hide');
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group
            }
        });

        //Initialize Ladd

        Ladda.bind('.cropMe');

        //Auto populate states on page loading

        getStates($('#country_list').val()).done(function () {
            {{--$('#country_list').val({{ $profile->MetaData->country_id }}).trigger('change.select2');--}}
            $('#state_list').val({{ $profile->MetaData->state_id }}).trigger('change.select2');
            getCities($('#state_list').val()).done(function () {
                $('#city_list').val({{ $profile->MetaData->city_id }}).trigger('change.select2');

            });
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

    //Profile Update

    $('.buttonUpdate').click(function () {

        if (!$('form.updateProfile').valid()) return false;

        var formDatas = $('form.updateProfile').serialize();
        var post = $.post('{{ route(strtolower(getScope()).".profile.update") }}', formDatas, function () {
            Ladda.stopAll();
            toastr.success('{{ _t('profile.updated_successfully') }}');
            $('.buttonUpdate .ladda-label').text('{{ _t('profile.saved') }}');
            $('#buttonUpdateModal').modal('hide');
        });

        post.fail(function (response) {

            Ladda.stopAll();

            var errors = response.responseJSON;
            var tabs = [];

            for (key in errors) {
                var errorOption = {};
                errorOption[key] = errors[key];
                $('[name="' + key + '"]').length ? (form.validate().showErrors(errorOption)) : '';
                tabs.push($('[name="' + key + '"]').closest('.tab-pane').index());
            }
            //console.log(tabs);
            var targetIndex = Math.min.apply(null, tabs);
            var targetId = form.find('.tab-pane').eq(targetIndex).attr('id');
            //alert(targetId);
            $('[href="#' + targetId + '"]').trigger('click');
            $('#buttonUpdateModal').modal('hide');
        })
    });

    preventReloadPageIfChangesNotSave($("form.updateProfile"));

</script>
