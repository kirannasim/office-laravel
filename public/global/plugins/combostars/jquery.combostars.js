/**
 * jquery.combostars.js: Turn select widgets into star rating widgets.
 *
 * Copyright (c) 2015 John Parsons.
 *
 * This software may be modified and distributed under the terms of the MIT license. See the LICENSE file for details.
 */

/**
 * Determines the needed background position for a star with the specified height and fill state.
 *
 * @param starHeight the height of a star, in px.
 * @param isFilled whether or not the star image is filled in.
 */
var getBackgroundPosition = function (starHeight, isFilled) {
    return '0 ' + (isFilled ? '0' : '-' + (starHeight) + 'px');
};

$.fn.combostars = function (config) {
    'use strict';

    var options = {
        starUrl: '../src/img/stars.png',
        starWidth: 16,
        starHeight: 15,
        clickMiddle: true
    };

    $.extend(options, config);

    var numStars = this.children().length, // Number of stars = number of options in the combo box
        wrapper = $('<span />').addClass('combostar-wrapper'), // Wrapper for the stars
        i, // Counter variable
        newStar, // Newly created star
        select = this; // The select that combostars() is called on

    // Deal with multiple selects by recursively applying combostars to each one
    if (this.length > 1) {
        this.each(function () {
            $(this).combostars(config);
        });
        return this;
    }

    /** Handles a click on a star. Updates the value of the combo box and sets view state. */
    var starClickHandler = function () {
        var clickedStar = $(this).data('star-index'),
            newValue = select.find('option:nth-child(' + clickedStar + ')').attr('value');

        select.val(newValue);
        select.change();

        // Update star backgrounds
        wrapper.find('.combostar-star').each(function () {
            $(this).css('background-position', getBackgroundPosition(options.starHeight, $(this).data('star-index') <= clickedStar));
        });
    };

    wrapper = this.wrap(wrapper).parent(); // Wrap the widget with a star container
    this.hide(); // Hide the combobox so we can show the star widget

    // Add all the stars to the container
    for (i = 1; i <= numStars; i++) {
        newStar = $('<div />').css({
            display: 'inline',
            'padding-left' : options.starWidth + 'px', // Use padding to set the width and height
            'padding-top' : options.starHeight + 'px',
            'padding-right': 0,
            'padding-bottom' : 0,
            'background-image' : 'url(' + options.starUrl + ')', // Image to display as the star
            'background-position' : getBackgroundPosition(options.starHeight, false),
            'font-size' : 0, // Setting font size to 0 allows us to set the height exclusively with padding
            'cursor' : 'pointer'
        }).addClass('combostar-star')
            .data('star-index', i)
            .on('click', starClickHandler);

        wrapper.append(newStar);

        // Optionally, the middle star gets clicked by default, which provides an initial state.
        if (options.clickMiddle && i === Math.round(numStars / 2.0)) {
            newStar.click();
        }
    }

    return this;
};