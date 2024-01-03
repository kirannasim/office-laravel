"use strict";

var FormWizard = function () {
    return {
        //main function to initiate the module
        init: function () {

            if (!jQuery().bootstrapWizard) {
                return;
            }

            function format(state) {
                if (!state.id)
                    return state.text; // optgroup
                return "<img class='flag' src='../../assets/global/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
            }

            $("#country_list,#state_list,#city_list,#parents,#position").select2({
                placeholder: "Select",
                allowClear: true,
                formatResult: format,
                width: 'auto',
                formatSelection: format,
                escapeMarkup: function (m) {
                    return m;
                }
            });

            var form = $('form#registrationForm');
            var error = $('.alert-danger', form);
            var success = $('.alert-success', form);

            $.validator.addMethod('ajaxValidate', function (value, element, param) {
                return !$(element).hasClass('ajaxValidationError'); // return bool here if valid or not.
            }, function (param, element) {
                return $(element).siblings('.help-block-error').text();
            });

            var validateInstance = form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    //account
                    selectedPackage: {
                        required: true
                    },
                    sponsor: {
                        minlength: 5,
                        required: true
                    },
                    /*packages: {
                        required: true,
                        ajaxValidate: true,
                    },*/
                    username: {
                        minlength: 6,
                        alphanumeric : true,
                        required: true
                    },
                    password: {
                        password_check_regex: true,
                        minlength: 5,
                        required: true,
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 5,
                        equalTo: "#submit_form_password"
                    },
                    //profile
                    firstname: {
                        required: true
                    },
                    lastname: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true
                    },
                    gender: {
                        required: true
                    },
                    /*type_of_document: {
                        required: true
                    },*/
                    dob: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    nationality: {
                        required: true
                    },
                    place_of_birth: {
                        required: true
                    },
                    date_of_passport_issuance: {
                        required: true
                    },
                    country_of_passport_issuance: {
                        required: true
                    },
                    passport_expirition_date: {
                        required: true
                    },
                    street_name: {
                        required: true
                    },
                    house_no: {
                        required: true
                    },
                    postcode: {
                        required: true
                    },
                    address_country: {
                        required: true
                    },
                    passport_no: {
                        required: true,
                        passport_nr_regex: true,
                        alphanumeric: true
                    },
                    country_id :{
                        required: true
                    }
                },
                messages: {
                    selectedPackage: 'Please select one package !',
                    // custom messages for radio buttons and checkboxes
                    /*'payment[]': {
                        required: "Please select at least one option",
                        minlength: jQuery.validator.format("Please select at least one option")
                    },*/
                    'username': {
                        required: lang_err_enter_username,
                        minlength: lang_err_enter_atleast_6_character
                    },
                    'sponsor': {
                        required: lang_err_enter_sponsor,
                        minlength: lang_err_enter_atleast_5_character
                    },
                    /*'packages': {
                        required: lang_err_enter_package
                    },*/
                    'password': {
                        required: lang_err_enter_password,
                        minlength: lang_err_enter_atleast_6_character
                    },
                    'password_confirmation': {
                        required: lang_err_enter_confirm_password,
                        equalTo: lang_err_confirm_password_missmatch
                    },
                    'firstname': {
                        required: lang_err_enter_firstname
                    },
                    'lastname': {
                        required: lang_err_enter_lastname
                    },
                    'email': {
                        required: lang_err_enter_email
                    },
                    'phone': {
                        required: lang_err_enter_phone
                    },
                    'dob': {
                        required: lang_err_enter_dob
                    },
                    'gender': {
                        required: lang_err_enter_gender
                    },
                    /*'type_of_document': {
                        required: lang_err_enter_type_of_document
                    },*/
                    'city': {
                        required: lang_err_enter_city
                    },
                    'nationality': {
                        required: lang_err_enter_nationality
                    },
                    'place_of_birth': {
                        required: lang_err_enter_place_of_birth
                    },
                    'date_of_passport_issuance': {
                        required: lang_err_enter_date_of_passport_issuance
                    },
                    'country_of_passport_issuance': {
                        required: lang_err_enter_country_of_passport_issuance
                    },
                    'passport_expirition_date': {
                        required: lang_err_enter_passport_expirition_date
                    },
                    'street_name': {
                        required: lang_err_enter_street_name
                    },
                    'house_no': {
                        required: lang_err_enter_house_no
                    },
                    'postcode': {
                        required: lang_err_enter_postcode
                    },
                    'address_country': {
                        required: lang_err_enter_address_country
                    }
                },
                onkeyup: function () {
                    if (form.validate().valid() === true) {
                        error.hide();
                    }
                },
                errorPlacement: function (error, element) {
                    //console.log(error);
                    if (element.parent().hasClass('flex')) {
                        error.insertAfter(element.parent());
                        return;
                    }
                    if (element.attr("name") === "gender") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_gender_error");
                    } else if (element.attr("name") === "payment[]") { // for uniform checkboxes, insert the after the given container
                        error.insertAfter("#form_payment_error");
                    } else {
                        if (!element.siblings('.help-block.help-block-error').length)
                            error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit
                    success.hide();
                    error.show();
                    App.scrollTo(error, -200);
                },
                highlight: function (element) { // hightlight error inputs
                    if ($(element).hasClass('optional')) {
                        $(element).closest('.form-group').removeClass('has-error').removeClass('has-success');
                    } else {
                        $(element)
                            .closest('.form-group').addClass('has-error').removeClass('has-success'); // set error class to the control group
                    }
                },
                unhighlight: function (element) { // revert the change done by hightlight
                    if ($(element).hasClass('optional')) {
                        $(element).closest('.form-group').removeClass('has-error').removeClass('has-success');
                    } else {
                        $(element)
                            .closest('.form-group').addClass('has-error'); // set error class to the control group
                    }
                },
                success: function (label) {
                    if (label.attr("for") == "gender" || label.attr("for") == "payment[]") { // for checkboxes and radio buttons, no need to show OK icon
                        label
                            .closest('.form-group').removeClass('has-error').addClass('has-success');
                        label.remove(); // remove error label here
                    } else { // display success icon for other inputs
                        label
                            .addClass('valid') // mark the current input as valid and display OK icon
                            .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    }
                },
                submitHandler: function (form) {
                    success.show();
                    error.hide();
                    form[0].submit();
                    //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
                }
            });

            jQuery.validator.addMethod("passport_nr_regex", function(value, element) {
                return this.optional(element) || /^(?!^0+$)[A-Z0-9]{3,20}$/.test(value);
            }, "Please enter valid Document Number");




            $("#submit_form_password").after("<div id=\"password-strength\" class=\"strength\"><span></span></div>");

            $("#password-strength").css({
                "height": "0px",
                "width": "100%",
                "background": "#ccc",
                "margin-top": "-2px",
                "border-bottom-left-radius": "4px",
                "border-bottom-right-radius": "4px",
                "overflow": "hidden",
                "-webkit-transition":  "height 0.15s",
                "transition":  "height 0.15s",
            });

            $("#password-strength span").css({
                "width": "0px",
                "height": "7px",
                "display": "block",
                "border-radius": "10px",
                "-webkit-transition":  "width 0.15s",
                "transition":  "width 0.15s",
            });

            $("#submit_form_password").focus(function() {
                $("#password-strength").css({
                    "height": "7px",
                });
                $("#password-strength span").css({
                    "height": "7px",
                });
            }).blur(function() {
                $("#password-strength").css({
                    "height": "0px"
                });
                $("#password-strength span").css({
                    "height": "0px"
                });
            });
            jQuery.validator.addMethod("password_check_regex", function(value, element) {
                var Excellente = new RegExp("^(?=.{9,})((?=.*\\w)(?=.*\\W)|(?=.*\\W)(?=.*\\w)).*$", "g");
                var Good = new RegExp("^(?=.{8,})((?=.*\\w)(?=.*\\d)|(?=.*\\d)(?=.*\\w)).*$", "g");
                var Medium = new RegExp("^(?=.{7,})(?=.*\\w).*$", "g");
                var Poor = new RegExp("^(?=.{6,})(?=.*[a-z]).*$", "g");
                var enoughRegex = new RegExp("(?=.{6,}).*", "g");
                var username = $(".username input")[0].value ?$(".username input")[0].value: '';
                var email = $(".email input")[0].value ?$(".email input")[0].value: '';


                if (false == enoughRegex.test(value)) {
                    console.log("Enter more than 6 symbols!");
                    $("#password-strength span").css({
                        "width": "0",
                        "background": "#de1616"
                    });
                    return false;
                } else if(username == value || email == value){
                    console.log("Password doesn't match username or email");
                    return false;
                } else if (Excellente.test(value)) {
                    $("#password-strength span").css({
                        "width": "100%",
                        "background": "#06bf06",
                    });
                    return true;
                } else if (Good.test(value)) {
                    $("#password-strength span").css({
                        "width": "75%",
                        "background": "#FFA200"
                    });
                    return true;
                } else if (Medium.test(value)) {
                    $("#password-strength span").css({
                        "width": "50%",
                        "background": "#de782b"
                    });
                    return true;
                } else if(Poor.test(value)) {
                    $("#password-strength span").css({
                        "width": "25%",
                        "background": "#de1616"
                    });
                    return true;
                }else {
                    return false;
                }

                // return this.optional(element) || /[a-z]{6,}$/.test(value);
            }, "Please enter at least 6 characters");


            var displayConfirm = function () {
                $('#tab5 .form-control-static', form).each(function () {
                    var input = $('[name="' + $(this).attr("data-display") + '"]', form);
                    if (input.is(":radio")) {
                        input = $('[name="' + $(this).attr("data-display") + '"]:checked', form);
                    }
                    if (input.is(":text") || input.is("textarea")) {
                        $(this).html(input.val());
                    } else if (input.is("select")) {
                        $(this).html(input.find('option:selected').text());
                    } else if (input.is(":radio") && input.is(":checked")) {
                        $(this).html(input.attr("data-title"));
                    } else if ($(this).attr("data-display") == 'payment[]') {
                        var payment = [];
                        $('[name="payment[]"]:checked', form).each(function () {
                            payment.push($(this).attr('data-title'));
                        });
                        $(this).html(payment.join("<br>"));
                    }
                });
            };

            var getparrents = function () {
                var username = $('input[name="sponsor"]').val();
                var options = {action:'getSponsorNodes',data: {username:username}};
                $.post(userApi, options, function (response) {
                    $('#parents').html('<option value="">Select Parent</option>');
                    $.each( response, function( key, value ) {
                        $('#parents').append('<option value="'+key+'">'+value+'</option>');
                    });
                    simulateLoading('#placement',true);
                });
            };

            var handleTitle = function (tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                // set wizard title
                $('.step-title', $('#registrationForm')).text('Step ' + (index + 1) + ' of ' + total);
                // set done steps
                jQuery('li', $('#registrationForm')).removeClass("done");
                var li_list = navigation.find('li');

                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
                    form.find('.button-previous').hide();
                } else {
                    form.find('.button-previous').show();
                }
                if( index === 3 && $('ul.steps li').eq(index).attr('data-id') === 'placement_details'){
                    simulateLoading('#placement');
                    getparrents();
                }

                if (current >= total) {
                    form.find('.button-next').hide();
                    form.find('.button-submit').show();
                    displayConfirm();
                    form.find('.proceed').show();
                } else {
                    form.find('.button-next').show();
                    form.find('.button-submit').hide();
                    form.find('.proceed').hide();
                }
                App.scrollTo($('.page-title'));
            };

            var reValidateField = function (validator, elem) {

                /*use internal code of a plugin to clear the field*/
                if (validator.settings.unhighlight) {
                    validator.settings.unhighlight.call(validator, elem[0], validator.settings.errorClass, validator.settings.validClass);
                }

                validator.hideThese(validator.errorsFor(elem[0]));
            };

            // default form wizard
            form.bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                onTabClick: function (tab, navigation, index, clickedIndex) {
                    return false;

                    success.hide();
                    error.hide();

                    if (validateInstance.valid() === false) {
                        return false;
                    }

                    handleTitle(tab, navigation, clickedIndex);
                },

                onNext: function (tab, navigation, index) {

                    success.hide();
                    error.hide();

                    if ((validateInstance.form() === false) && ajaxValidateMe($('[name="email"]'))) {
                        $('[name="email"]').closest('.form-group').addClass('has-error').removeClass('has-success');
                        return false;
                    }

                    if (validateInstance.form() === false) {
                        return false;
                    }

                    if ($('.tab-pane.active').find('.ajaxValidating').length) {
                        console.log('ajaxValidating error');
                        return false;
                    }

                    var validationRules = validateInstance.settings.rules;
                    var validationMessages = validateInstance.settings.messages;

                    for (var key in validationRules) {
                        var ruleElem = $('.tab-pane.active [name="' + key + '"]');
                        if (ruleElem.length) {
                            if (validationRules[key].required == true && !ruleElem.val()) {
                                var defaultMessage = 'The field should not be empty !';
                                var errToShow = {};
                                errToShow[key] = validationMessages.hasOwnProperty(key) ? (typeof validationMessages[key] == 'object' ? validationMessages[key].required : validationMessages[key]) : defaultMessage;
                                validateInstance.showErrors(errToShow);
                            }
                        }
                    }

                    if (form.validate().valid() == false) {
                        form.validate.err;
                        return false;
                    }

                    handleTitle(tab, navigation, index);
                },
                onPrevious: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    handleTitle(tab, navigation, index);
                },
                onTabShow: function (tab, navigation, index) {
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    form.find('.progress-bar').css({
                        width: $percent + '%'
                    });
                }
            });

            form.find('.button-previous').hide();

            $('#registrationForm .button-submit').click(function () {}).hide();

            //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
            $('#country_list', form).change(function () {
                form.validate().element($(this));
            });

            return validateInstance;
        }
    };
}();

jQuery(document).ready(function () {
    FormWizard.init();
});