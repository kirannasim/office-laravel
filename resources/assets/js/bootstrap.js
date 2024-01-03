
//window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

//window.$ = window.jQuery = require('jquery');

//require('bootstrap-sass');

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

//window.Vue = require('vue');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

/*window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};*/

window.moment = require('moment-timezone');

function blueprintToast(data, options){
    let notify;
    let defaults = {
        timeout: 5000,
        position: 'right bottom'
    };
    options = $.extend({}, defaults, options);

    if ((notify = $('.blueprintNotify')) && notify.length) {
        notify.find('h3.subject').text(data.subject);
        notify.find('.body').text(data.body);

        if (data.anchor)
            notify.find('.anchor').href(data.anchor).text(data.anchorText);
    }else{
        notify = '<div class="blueprintNotify ' + options.position + '">';
        notify += '<h3 class="subject">';
        notify += data.icon ? '<i class="' + data.icon + '" style="color:' +data.iconColor+ '"></i>' : '';
        notify += data.subject + '</h3>';
        notify += '<div class="body">' + data.body + '</div>';
        notify += data.hasOwnProperty('anchor') ? '<a class="anchor" href="' + data.anchor + '"><button class="btn green"></button>' + data.anchorText + '</a>' : '';
        notify += '</div>';

        $('body').append(notify);

        setTimeout(function(){
            $('.blueprintNotify').fadeOut().delay('2000').remove();
        }, options.timeout);
    }
}

function syncNotifications(data){
    $('li#header_notification_bar > a span, li#header_notification_bar .external h3 span.bold').text(data.toRead);
    var notification = '<li>\n' +
        '                                            <a href="javascript:;">\n' +
        '                                                <span class="time">' + data.time + '</span>\n' +
        '                                                <span class="details">\n' +
        '                                                    <span class="label label-sm label-icon label-success">\n' +
        '                                                        <i class="' + data.icon + '"></i>\n' +
        '                                                    </span> ' + data.subject + ' </span>\n' +
        '                                            </a>\n' +
        '                                        </li>';
    $('.noNotification').remove();
    $('.notificationHolder').prepend(notification);
}

$('body').on('click', '.blueprintNotify span.close', function(){
   $('.blueprintNotify').delay('2000').remove();
});

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

