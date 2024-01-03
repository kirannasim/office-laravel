/*
 * Copyright (c)
 * Hybrid MLM
 * @author HybridMLM
 * @link http://www.hybridmlmsoftware.com
 */

function initiatePassResetRequest(validator) {
    console.log(validator);
    if (!validator.valid()) {
        Ladda.stopAll();
        return false;
    }
    ;
    $.post($('.passwordResetForm').attr('action'), $('.passwordResetForm').serialize(), function (response) {
        Ladda.stopAll();
        $('.passwordResetForm').hide().siblings().slideDown();
    }).fail(function (response) {
        Ladda.stopAll();
        var errors = response.responseJSON;
        for (var key in errors) {
            var errOption = {};
            errOption[key] = errors[key];
            validator.showErrors(errOption);
        }
    });
}

//Document ready functions
$(function () {

    Ladda.bind('.loggMe, .ladda-button');
    var validator = setupValidation();

    //Password reset submission
    $('body').on('click', '.passwordResetButton', function () {
        initiatePassResetRequest(validator);
    });

    //Enter key to login
    $('body').keyup(function (e) {
        if (e.which != 13)
            return false;
        Ladda.create($('.passwordResetButton')[0]).start();
        initiatePassResetRequest(validator);
    });
});

//Setup validation
function setupValidation() {
    var resetForm = $('#passwordResetForm');
    if (!resetForm.length) return;
    return resetForm.validate({
        doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        rules: {
            email: {
                minlength: 5,
                required: true,
                email: true
            },
            password: {
                minlength: 5,
                required: true
            },
            password_confirmation: {
                minlength: 5,
                required: true
            }
        },
        errorPlacement: function (error, element) { // render error placement for each input type
            error.insertAfter(element);
        },
        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        }
    });
}