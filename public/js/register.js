"use strict";

/**
 * Show cart summary
 *
 * @return string
 */
function refreshSummary(target) {
    target = target ? jQuerize(target) : $('.orderSummary');

    return $.get(cartSummary, function (response) {
        target.html(response);
    });
}

function loadPackages(style) {
    style = style ? style : 'grid';
    simulateLoading('.packageLoader');

    return $.get(packages + '/' + style, function (response) {
        $('.packageLoader').html(response);
    });
}

/**
 * Show cart summary
 *
 * @return string
 */
function loadGateways() {
    var context = isLogged ? 'registration' : 'public_registration';
    return $.get(gateways, function (response) {
        $('.paymentGatewaysWrapper').html(response);
    });
}

/**
 * addPackage
 * @param elem
 * @param packageId
 */
function addPackage(elem, packageId) {
    var options = {};
    options.productId = packageId;
    options.quantity = 1;
    options.isPackage = true;

    return $.post(cartAddRoute, options, function (response) {
        $('.fixed.cart .bubble').html(response.total).removeClass('shake').addClass('shake');
        setTimeout(function () {
            $('.fixed.cart .bubble').removeClass('shake');
            refreshSummary('.fixed.registration.cart .summary');
        }, 500);

        var dispatch = response.item;
        dispatch.quantity = response.quantity;
        dispatch.lang_you_have_added = $('#lang_you_have_added').val();
        dispatch.lang_to_cart = $('#lang_to_cart').val();
        //showCartPopup(dispatch);
        //elem.addClass('chosen').removeClass('stickOverlay');
        Ladda.stopAll();
        //$('.packageWrapper').not(elem).removeClass('chosen');
        $('[name="selectedPackage"]').val(packageId);
        $('[name="packageName"]').val(elem.find('.packageBasicInfo > h2').text());
        $('p.packageNameReview').text(elem.find('.packageBasicInfo > h2').text());
        $('[name="selectedPackage"]').attr('formnovalidate', true);
        //forceRemoveValidationError($('#registrationForm').validate(), $('[name="selectedPackage"]'));
        refreshSummary();
        loadGateways();
    }).fail(function () {
        Ladda.stopAll();
    });
}

//Document ready actions
$(function () {
    window.bankWareSuccessCallback = function () {
        $('.button-previous, .gatewayNavWrap').remove();
        $('.paymentContainerWrap').addClass('fullWidth');
    };

    Ladda.bind('.packageSelector');
    $('.date-picker').datepicker("setDate", '');
    refreshSummary();
    loadGateways();
    loadPackages();
    // toggle more data
    $('body').on('click', '.moreDetails', function () {
        if ($(this).hasClass('closed'))
        {
            $(this).removeClass('closed').closest('.details').find('.eachDetail.toggleable').removeClass('hidden');
            $(this).find('.toogleText').html('Less');
            $(this).find('i').removeClass('fa-angle-double-down');
            $(this).find('i').addClass('fa-angle-double-up');
        }else {
            $(this).addClass('closed').closest('.details').find('.eachDetail.toggleable').addClass('hidden');
            $(this).find('.toogleText').html('More');
            $(this).find('i').removeClass('fa-angle-double-up');
            $(this).find('i').addClass('fa-angle-double-down');
        }
    });
    //binding registration form
    window.targetForm = $('#registrationForm form');
    // binding gateway callbacks
    window.paymentSuccessCallback = function (response) {
        //console.log(response);
        postRegistration(response);
    };

    window.paymentFailureCallback = function (response) {
        var errors = response.responseJSON;

        switch (response.status) {
            case 422:
                var tabs = [];
                for (var key in errors) {
                    var elemKey = key;
                    if (key.search(sessionKey) !== -1) {
                        elemKey = sessionKey + '[' + key.split('.')[1] + ']';
                        //console.log(elemKey);
                    }
                    var errElem = $('[name="' + elemKey + '"]');
                    //console.log(errElem);

                    if (!errElem.length) continue;

                    var errorOption = {};
                    errorOption[elemKey] = errors[key];
                    errElem.length ? ($('#registrationForm').validate().showErrors(errorOption)) : '';
                    tabs.push(Number(errElem.closest('.tab-pane').attr('id').split('tab')[1]) - 1);
                }

                var targetIndex = Math.min.apply(null, tabs);
                //console.log('targetIndex is ' + targetIndex);
                var actionLink = $('.form-actions a');
                var form = $('#registrationForm');
                form.bootstrapWizard({});
                switch (targetIndex) {
                    case 0:
                        actionLink.hide().removeClass('disabled');
                        actionLink.first().hide().addClass('disabled');
                        actionLink.eq(1).show();
                        form.bootstrapWizard('show', 0);
                        break;
                    case 1:
                        actionLink.show();
                        //actionLink.last().hide();
                        form.bootstrapWizard('show', 1);
                        break;
                    case 2:
                        actionLink.show();
                        //actionLink.last().hide();
                        form.bootstrapWizard('show', 2);
                        break;
                    case 3:
                        actionLink.show();
                        //actionLink.last().hide();
                        form.bootstrapWizard('show', 3);
                        break;
                    case 4:
                        actionLink.show();
                        //actionLink.last().hide();
                        form.bootstrapWizard('show', 4);
                        form.bootstrapWizard('show', 4);
                        $('.proceed').show();
                        break;
                }
                break;

            case 301:
                location.href = errors.location;
                break;
        }
    };
});

//Show order summary table
$('body').on('click', '.orderSummaryButton', function () {
    $('.orderSummary').slideToggle();
});

//Package selection
$('body').on('click', '.product .addToCart button', function () {
    var target = $(this).closest('.packageWrapper').addClass('stickOverlay');
    $(this).addClass('selected').find('span.text').text('Selected');
    $('.product .addToCart button').not(this).removeClass('selected');
    $('.product .addToCart button').not(this).find('span.text').text('Select');
    addPackage(target, $(this).attr('data-id'));
});

//Function to retrieve states of country
function getStates(country) {
    var options = {action: 'getStates', data: {country: country}};
    var post = $.post(localApi, options);
    var states;

    post.done(function (response) {
        response.forEach(function (value, index) {
            states += '<option value="' + value.id + '">' + value.name + '</option>';
        });
        $('#state_list').html(states);
    });

    return post;
}

function getPhoneCode(country) {
    var options = {action: 'getPhoneCode', data: {country: country}};
    $.post(localApi, options).done(function (response) {
        $('#phone_code').val('+' + response);
    });

    options = {action: 'getphonemask', data: {country: country}};

    $.post(localApi, options).done(function (response) {
        $('#phone').mask(response);
    });
}

//States retrieval in action
$('body').on('change', '#country_list', function () {
    var country = $(this).val();
    getStates(country).done(function (response) {
        var states = '';
        response.forEach(function (value, index) {
            states += '<option value="' + value.id + '">' + value.name + '</option>';
        });
        $('#state_list').html(states).promise().done(function () {
            getCities($('#state_list').val());
        });
    });
    getPhoneCode(country);
});

//Auto populate states on page loading
$(function () {
    getStates($('#country_list').val());
    getPhoneCode($('#country_list').val());
});

//Function to retrieve cities of states
function getCities(state) {
    var options = {action: 'getCities', data: {state: state}};
    var post = $.post(localApi, options);

    post.done(function (response) {
        var cities = '';
        response.forEach(function (value, index) {
            cities += '<option value="' + value.id + '">' + value.name + '</option>';
        });
        $('#city_list').html(cities);
    });

    return post;
}

//Cities retrieval in action
$('body').on('change', '#state_list', function () {
    var state = $(this).val();
    getCities(state).done(function (response) {
        var cities = '';
        response.forEach(function (value, index) {
            cities += '<option value="' + value.id + '">' + value.name + '</option>';
        });
        $('#city_list').html(cities);
    });
});

//Auto populate states on page loading
$(function () {
    getCities($('#state_list').val());
    if (($('[name="sponsor"]')).val() === '') {
        $('.form-actions .button-next').attr('disabled', 1);
    }
});

/*//ajax validation
function ajaxValidateMe(elem) {
    var jQ = $(elem);
    jQ.removeClass('ajaxValidationError');
    var value = jQ.val();
    var action = jQ.attr('data-action');
    var needle = jQ.attr('name');
    var route = jQ.attr('route') ? elem.attr('route') : userApi;
    jQ.siblings('.ajaxVerified, .validating').remove();
    jQ.addClass('ajaxValidating').before('<i class="validating fa fa-spin fa-refresh"></i>');
    //var lf = loadingField({elem: jQ, text: 'Please wait let me check ', times: 10});
    //var lb = loadingBorder({elem: elem});
    var needleObj = {};
    needleObj[needle] = value;
    var options = {action: action, data: needleObj};

    $.post(route, options, function (response) {
        if (jQ.attr('name') === 'sponsor')
            /!*$('[name="sponsor"]').webuiPopover({
                placement: $(window).width() > 500 ? 'right' : 'top',
                content: response.name
            });*!/
        if (!jQ.valid()) {
            markError(jQ, needle);
            return;
        }

        // if (jQ.attr('name') === 'sponsor') {
        //     jQ.next('.help-block').remove();
        // }
        //loadingBorder({reset: lb, elem: elem});
        jQ.siblings('.error, .validating').remove();
        //loadingField({reset: lf, elem: elem, value: value});
        jQ.removeClass('ajaxValidating');
        $('.form-actions .button-next').addClass('disabled');
    }).done(function () {
        if (jQ.attr('name') === 'sponsor' || jQ.attr('name') === 'email') {
            jQ.parent('.form-group').addClass('has-success');
        }
        $('.form-actions .button-next').removeClass('disabled');
        return true;
    }).fail(function (response) {
        $('.form-actions .button-next').attr('disabled', 1);
        $('.form-actions .button-next').addClass('disabled');
        // if (jQ.attr('name') == 'sponsor') jQ.popover('destroy');
        if (jQ.attr('name') === 'sponsor' || jQ.attr('name') === 'email') {
            jQ.parent('.form-group').addClass('has-error').removeClass('has-success');
        }

        if ($('[name="username"]')) {
            jQ.parent('.form-group').addClass('has-error').removeClass('has-success');
        }
        var error = response.responseJSON['message'];
        console.log(jQ);
        jQ.addClass('ajaxValidationError');
        jQ.siblings('.validating').remove();
        //console.log(jQ.siblings());
        markError(jQ, needle, error, true);
    });
}*/

//ajax validation
function ajaxValidateMe(elem) {
    var jQ = $(elem);
    jQ.addClass('ajaxValidating');
    jQ.removeClass('ajaxValidationError');
    var value = jQ.val();
    var action = jQ.attr('data-action');
    var needle = jQ.attr('name');
    var route = jQ.attr('route') ? elem.attr('route') : userApi;
    jQ.siblings('.ajaxVerified, .validating').remove();
    jQ.before('<i class="validating fa fa-spin fa-refresh"></i>');
    $('.form-actions .button-next').attr('disabled', 1);
    $('.form-actions .button-next').addClass('disabled');
//var lf = loadingField({elem: jQ, text: 'Please wait let me check ', times: 10});
    //var lb = loadingBorder({elem: elem});
    var needleObj = {};
    needleObj[needle] = value;
    var options = {action: action, data: needleObj};

    $.post(route, options, function (response) {
        if (jQ.attr('name') === 'sponsor')
            $('[name="sponsor"]').webuiPopover({
                placement: $(window).width() > 500 ? 'right' : 'top',
                content: response.name
            });
        if (!jQ.valid()) {
            markError(jQ, needle);
            return;
        }
        jQ.siblings('.help-block.help-block-error, .error, .validating').remove();
        //loadingField({reset: lf, elem: elem, value: value});
        //loadingBorder({reset: lb, elem: elem});
    }).success(function () {
        jQ.removeClass('ajaxValidating');
        jQ.closest('.form-group').addClass('has-success-ajax').removeClass('has-error-ajax');
        $('.form-actions .button-next').removeAttr('disabled');
        $('.form-actions .button-next').removeClass('disabled');
    }).fail(function (response) {
        jQ.addClass('ajaxValidating');
        if (jQ.attr('name') == 'sponsor') jQ.popover('destroy');

        jQ.closest('.form-group').addClass('has-error-ajax').removeClass('has-success-ajax');
        var error = response.responseJSON['message'];
        console.log(jQ);
        jQ.addClass('ajaxValidationError');
        jQ.siblings('.validating, .help-block').remove();
        //console.log(jQ.siblings());
        markError(jQ, needle, error, true);
    });
}

//show regular jquery validate error upon ajax validation
function markError(jQ, needle, error, ajax) {
    var errOptions = {};
    errOptions[needle] = error;//console.log(errOptions);

    if (ajax) $('#registrationForm').validate().showErrors(errOptions);

    jQ.webuiPopover('destroy');

    jQ.prev('.ajaxVerified').remove();
}

$('input').on('keyup', function () {
    $(this).valid();
});

//Ajax validation in action
$('body').on('focusout', '.ajaxValidate', function () {
    ajaxValidateMe(this);
    $(this).valid();
});

//Ajax validation in action
$('body').on('keyup', '.ajaxValidate', function () {
    clearTimeout(this.activeTimeout);
    this.activeTimeout = setTimeout(function() {
        ajaxValidateMe(this);
        $(this).valid();
    }.bind(this), 750);
});

//Grid and list view

$('body').on('click', '.viewSwitcher > span', function () {
    $(this).addClass('active').siblings().removeClass('active');

    if ($(this).hasClass('list'))
        loadPackages('list');
    else
        loadPackages('grid');
});

//Post registration actions
function postRegistration(data) {
    console.log(data);
   // var orderId = data.result['orderId'];
    var options = {};
    $('.postRegistrationBox').slideDown().promise().done(function () {
        $('.postRegistrationBox span.check').addClass('success');
    });
    $('#registrationForm').slideUp();
    $('body').off('click', '.registrationReceipt')
        .on('click', '.registrationReceipt', function () {
            // if ($('.invoiceHolder .email_table').length){
            //     $('.invoiceHolder').slideToggle();
            //     Ladda.stopAll();
            //     return;
            // }
            // $.get(baseUrl + '/order/invoice/' + orderId, options).done(function (response) {
            //     Ladda.stopAll();
            //     $('.row.registrationWrapper form').slideUp();
            //     $('.invoiceHolder').html(response);
            // }).fail(function () {
            //     Ladda.stopAll();
            // });
        });
    var redirectCountdown = setInterval(function () {
        var currentCount = Number($('.countDown').text());
        if (currentCount === 0) {
            clearInterval(redirectCountdown);
            // location.href = redirect;
        }
        $('.countDown').text(currentCount - 1);
    }, 1000);
}