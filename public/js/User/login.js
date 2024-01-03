//Initiate pass reset email request
function initiateRequestPass(e) {
    $.post($('.forget-form').attr('action'), $('.forget-form').serialize(), function (response) {
        Ladda.stopAll();
        $('.requestSent').slideDown().siblings().hide();
    }).fail(function (response) {
        Ladda.stopAll();
        if (response.responseJSON['errors'] === undefined) {
            $('.requestPassWrap .error').remove();
            $('.requestPassWrap p').after($('<div class="error">' + 'The e-mail entered do not match any records found in our system' + '</div>'));
        } else {
            var error = response.responseJSON['errors'].email;
            $('.requestPassWrap .error').remove();
            $('.requestPassWrap p').after($('<div class="error">' + error + '</div>'));
        }
    });
}

//Document ready functions
$(function () {
    Ladda.bind('.loggMe, .ladda-button');

    setupValidation();

    //Login in action
    $('body').on('click', '.loggMe', function (e) {
        attemptLogin(e);
    });

    //Show forget password form
    $('body').on('click', '.forget-password', function () {
        $('.forget-form').slideDown().siblings('form').hide();
    });

    //Back to login form
    $('body').on('click', '.backToLogin', function () {
        $('.requestSent').hide().siblings().show().parent('.forget-form').hide().siblings('form').slideDown();
    });

    //Password reset email request
    $('body').on('click', '.requestPassword', function () {
        initiateRequestPass();
    });

    //Enter key to login
    $('body').keypress(function (e) {
        if (e.which == 13) {
            e.preventDefault();
            e.stopPropagation();
            switch ($('form:visible').attr('id')) {
                case 'login_form':
                    Ladda.create($('.loggMe')[0]).start();
                    attemptLogin(e);
                    break;
                case 'forget_form':
                    Ladda.create($('.requestPassword')[0]).start();
                    initiateRequestPass(e);
                    break;
            }
        }
    });
});

//Attempt login
function attemptLogin(e) {
    var loginForm = $('#login_form');
    e.preventDefault();
    var options = loginForm.serialize();// {username: $("[name='username']").val(), password: $("[name='password']").val()};
    var post = $.post(loginForm.attr('action'), options);

    post.done(function (obj) {
        if (obj.hasOwnProperty('status') && obj.status == true) {
            location.href = obj.redirect;
        } else {
            for (key in obj) {
                var option = {};
                option[key] = $.isArray(obj[key])?obj[key][0]:obj[key];
                loginForm.validate().showErrors(option);
            }
        }
        // Ladda.stopAll();
    }).fail(function (response) {

        if (window.hasOwnProperty('additionalValidationReset'))
            window.additionalValidationReset();

        var obj = response.responseJSON;
        console.log(obj);
        for (var key in obj) {
            console.log(key);
            var option = {};
            option[key] = $.isArray(obj[key])?obj[key][0]:obj[key];
            loginForm.validate().showErrors(option);
        }
        Ladda.stopAll();
    });
}

//Setup validation
function setupValidation() {
    var loginForm = $('#login_form');
    if (!loginForm.length) return;
    loginForm.validate({
        doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        rules: {
            username: {
                minlength: 5,
                required: true
            },
            password: {
                minlength: 5,
                required: true
            }
        },
        errorPlacement: function (error, element) { // render error placement for each input type
            error.insertAfter(element);
        },
        invalidHandler: function (event, validator) { //display error alert on form submit
            success.hide();
            error.show();
            App.scrollTo(error, -200);
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
