/**
 *  -------------------------------------------------
 *  RTCLab sp. z o.o.  Copyright (c) 2019 All Rights Reserved
 *  -------------------------------------------------
 *
 * @author Christopher Milkowski, Arthur Milkowski
 * @link https://www.livewebinar.com
 * @see https://www.livewebinar.com
 * @version 1.00
 * @api Laravel 5.4
 */

jQuery(document).ready(function ($) {
    //update these values if you change these breakpoints in the style.css file (or _layout.scss if you use SASS)
    var MqM = 768,
        MqL = 1024;

    var xoomsSections = $('.cd-xoom-group'),
        xoomTrigger = $('.cd-xoom-trigger'),
        xoomsContainer = $('.cd-xoom-items'),
        xoomsCategoriesContainer = $('.cd-xoom-categories'),
        xoomsCategories = xoomsCategoriesContainer.find('a'),
        closeXoomsContainer = $('.cd-close-panel');


    //close xoom lateral panel - mobile only
    $('body').bind('click touchstart', function (event) {
        if ($(event.target).is('body.cd-overlay') || $(event.target).is('.cd-close-panel')) {
            closePanel(event);
        }
    });
    xoomsContainer.on('swiperight', function (event) {
        closePanel(event);
    });

    //show xoom content clicking on xoomTrigger
    xoomTrigger.on('click', function (event) {
        event.preventDefault();
        $(this).next('.cd-xoom-content').slideToggle(200).end().parent('li').toggleClass('content-visible');
    });

    //update category sidebar while scrolling
    $(window).on('scroll', function () {
        if ($(window).width() > MqL) {
            (!window.requestAnimationFrame) ? updateCategory() : window.requestAnimationFrame(updateCategory);
        }
    });

    $(window).on('resize', function () {
        if ($(window).width() <= MqL) {
            xoomsCategoriesContainer.removeClass('is-fixed').css({
                '-moz-transform': 'translateY(0)',
                '-webkit-transform': 'translateY(0)',
                '-ms-transform': 'translateY(0)',
                '-o-transform': 'translateY(0)',
                'transform': 'translateY(0)',
            });
        }
        if (xoomsCategoriesContainer.hasClass('is-fixed')) {
            xoomsCategoriesContainer.css({
                'left': xoomsContainer.offset().left,
            });
        }
    });

    function closePanel(e) {
        e.preventDefault();
        xoomsContainer.removeClass('slide-in').find('li').show();
        closeXoomsContainer.removeClass('move-left');
        $('body').removeClass('cd-overlay');
    }
});
