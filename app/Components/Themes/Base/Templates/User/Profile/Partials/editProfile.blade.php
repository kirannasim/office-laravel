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
                            <a href="#tab_5" data-toggle="tab">{{ _t('profile.social_info') }}</a>
                        </li>
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
                                        <input type="text" name="profile[basic][username]"
                                               value="{{ $profile->username }}" class="form-control">
                                    </div>
                                    {{--<div class="form-group">
                                        <label class="control-label">{{ _t('profile.sponsor_name') }}</label>
                                        <input type="text" readonly name="sponsor"
                                               @if($profile->RepoData->sponsor_id) value="{{ idToUsername($profile->RepoData->sponsor_id) }}"
                                               @endif   class="form-control">
                                    </div>--}}
                                    {{--<div class="form-group">
                                        <label class="control-label">{{ _t('profile.placement') }}</label>
                                        <input type="text" readonly name="placement"
                                               @if($profile->RepoData->placement_id) value="{{ idToUsername($profile->RepoData->placement_id) }}"
                                               @endif  class="form-control">
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
                                        <label class="control-label">{{ _t('profile.email') }}</label>
                                        <input type="text" name="profile[basic][email]"
                                               value="{{ $profile->email }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Given Name</label>
                                        <input type="text" name="profile[meta][firstname]"
                                               value="{{ $profile->MetaData->firstname }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Surname</label>
                                        <input type="text" name="profile[meta][lastname]"
                                               value="{{ $profile->MetaData->lastname }}" class="form-control">
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
                                    <div class="form-group">
                                        <label class="control-label ">Passport Number</label>
                                        <input type="text" name="profile[meta][passport_no]"
                                               onkeyup="this.value = this.value.toUpperCase();"
                                               value="{{ $profile->MetaData->passport_no }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label ">Date of Passport Issuance</label>
                                        <input type="text" name="profile[meta][date_of_passport_issuance]"
                                               value="{{ $profile->MetaData->date_of_passport_issuance }}"
                                               data-date-format="yyyy-mm-dd" class="form-control datepick">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label ">Passport Expiration Date</label>
                                        <input type="text" name="profile[meta][passport_expirition_date]"
                                               value="{{ $profile->MetaData->passport_expirition_date }}"
                                               data-date-format="yyyy-mm-dd" class="form-control datepick">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label ">Date of birth</label>
                                        <input type="text" name="profile[meta][dob]"
                                               value="{{ $profile->MetaData->dob }}" data-date-format="yyyy-mm-dd"
                                               class="form-control datepick">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Place of Birth</label>
                                        <select name="profile[meta][place_of_birth]" id="country_list"
                                                class="form-control" style="width:100%;">
                                            <option value="">choose</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country['id'] }}"
                                                        @if($country['id'] == $profile->metaData->place_of_birth ) selected @endif>{{ $country['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label ">Country of Passport Issuance</label>
                                        <select name="profile[meta][country_of_passport_issuance]" id="country_list"
                                                class="form-control" style="width:100%;">
                                            <option value="">choose</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country['id'] }}"
                                                        @if($country['id'] == $profile->metaData->country_of_passport_issuance ) selected @endif>{{ $country['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label ">Nationality</label>
                                        <select name="profile[meta][nationality]" id="country_list"
                                                class="form-control" style="width:100%;">
                                            <option value="">choose</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country['id'] }}"
                                                        @if($country['id'] == $profile->MetaData->nationality ) selected @endif>{{ $country['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Mobile Number</label>
                                        <input type="text" name="profile[basic][phone]"
                                               value="{{str_replace(' ', '', $profile->phone)}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label ">Street Name</label>
                                        <input type="text" name="profile[meta][street_name]"
                                               value="{{ $profile->MetaData->street_name }}" class="form-control dob">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label ">House Number</label>
                                        <input type="text" name="profile[meta][house_no]"
                                               value="{{ $profile->MetaData->house_no }}" class="form-control dob">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{ _t('profile.city') }}</label>
                                        <input type="text" name="profile[meta][city]"
                                               value="{{ $profile->MetaData->city }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Post Code</label>
                                        <input type="text" name="profile[meta][postcode]"
                                               value="{{ $profile->MetaData->postcode }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{ _t('register.country') }}</label>
                                        <select name="profile[meta][country_id]" id="country_list"
                                                class="form-control" style="width:100%;">
                                            @foreach($countries as $country)
                                                <option value="{{ $country['id'] }}"
                                                        @if($country['id'] == $profile->MetaData->country_id ) selected @endif>{{ $country['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Additional Information</label>
                                        <input type="text" name="profile[meta][additional_info]"
                                               value="{{ $profile->MetaData->additional_info }}" class="form-control">
                                    </div>
                                </div>
                            </div>


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

        $('.datepick').datepicker({
            endDate: '-18y'
        });

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

        jQuery.validator.addMethod("passport_nr_regex", function (value, element) {
            return this.optional(element) || /^(?!^0+$)[A-Z0-9]{3,20}$/.test(value);
        }, "Please enter valid Document Number");

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
                'profile[basic][username]': {
                    required: true,
                    minlength: 5
                },
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
                'profile[meta][passport_no]': {
                    required: true,
                    passport_nr_regex: true
                },

                'profile[meta][date_of_passport_issuance]': {
                    required: true
                },
                'profile[meta][passport_expirition_date]': {
                    required: true
                },
                'profile[meta][country_of_passport_issuance]': {
                    required: true
                },
                'profile[meta][dob]': {
                    required: true
                },
                'profile[meta][place_of_birth]': {
                    required: true
                },
                'profile[meta][nationality]': {
                    required: true
                },
                'profile[basic][phone]': {
                    required: true,
                    number: true
                },
                'profile[meta][street_name]': {
                    required: true
                },
                'profile[meta][house_no]': {
                    required: true
                },
                'profile[meta][city]': {
                    required: true
                },
                'profile[meta][postcode]': {
                    required: true
                },
                'profile[meta][gender]': {
                    required: true
                },
                'profile[meta][country_id]': {
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

            },
            messages: {// custom messages for radio buttons and checkboxes
                'profile[basic][username]': {
                    required: "{{ _t('profile.please_enter_username') }}",
                    minlength: "Please enter atleast 5 charecter"
                },
                'profile[meta][firstname]': {
                    required: "{{ _t('profile.please_enter_first_name') }}"
                },
                'profile[meta][lastname]': {
                    required: "{{ _t('profile.please_enter_last_name') }}"
                },
                'profile[basic][email]': {
                    required: "{{ _t('profile.please_enter_email') }}",
                    email: "{{ _t('profile.please_enter_valid_email') }}",
                },

                'profile[meta][gender]': {
                    required: "{{ _t('profile.please_enter_gender') }}",
                },

                'profile[meta][passport_no]': {
                    required: "Please Enter Passport Number",
                },
                'profile[meta][date_of_passport_issuance]': {
                    required: "Please Enter Date of Passport Issuance",
                },
                'profile[meta][passport_expirition_date]': {
                    required: "Please Enter Passport Expiry Date",
                },
                'profile[meta][country_of_passport_issuance]': {
                    required: "Please Select Country of Passport Issuance",
                },
                'profile[meta][dob]': {
                    required: "Please Enter Your Date Of Birth",
                },
                'profile[meta][place_of_birth]': {
                    required: "Please Enter Your Place Of Birth",
                },
                'profile[meta][nationality]': {
                    required: "Enter Nationality",
                },
                'profile[basic][phone]': {
                    required: "{{ _t('profile.please_enter_phone') }}",
                    number: "{{ _t('profile.please_enter_valid_phone') }}",
                },
                'profile[meta][street_name]': {
                    required: "Enter Street Name",
                },
                'profile[meta][house_no]': {
                    required: "Enter House Number",
                },
                'profile[meta][city]': {
                    required: "Enter City",
                },
                'profile[meta][country_id]': {
                    required: "{{ _t('profile.please_enter_country') }}",
                },
                'profile[meta][postcode]': {
                    required: "{{ _t('profile.please_enter_pin') }}"
                },
                'password_confirmation': {
                    required: "{{ _t('profile.please_enter_confirm_password') }}",
                    equalTo: "{{ _t('profile.Password_missmatch') }}",
                },
                'current_password': {
                    required: "{{ _t('profile.please_enter_current_password') }}",
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
            {{--getCities($('#state_list').val()).done(function () {--}}
            {{--$('#city_list').val({{ $profile->MetaData->city_id }}).trigger('change.select2');--}}
            {{--});--}}
        });


    });

    $('#country_list').change(function () {
        getStates($(this).val());
    });
    // $('#state_list').change(function () {
    //     getCities($(this).val());
    // });


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
        var post = $.post('{{ route("user.profile.update") }}', formDatas, function () {
            Ladda.stopAll();
            toastr.success("{{ _t('profile.updated_successfully') }}");
            $('[data-target="#buttonUpdateModal"]').text('{{ _t('profile.saved') }}');
            $('#buttonUpdateModal').modal('hide');
        });

        post.fail(function (response) {

            Ladda.stopAll();

            var errors = response.responseJSON;
            var tabs = [];

            for (var key in errors.errors) {

                console.log(key);
                var errorOption = {};
                errorOption[key] = errors[key];
                $('[name="' + key + '"]').length ? (form.validate().showErrors(errorOption)) : '';
                tabs.push($('[name="' + key + '"]').closest('.tab-pane').index());
            }
            //console.log(tabs);
            var targetIndex = Math.min.apply(null, tabs);
            var targetId = form.find('.tab-pane').eq(targetIndex).attr('id');
            //alert(targetId);
            //$('[href="#' + targetId + '"]').trigger('click');
            $('#buttonUpdateModal').modal('hide');
        })
    });

    preventReloadPageIfChangesNotSave($("form.updateProfile"));

</script>
