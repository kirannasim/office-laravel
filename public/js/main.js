/*
 * Copyright (c)
 * Hybrid MLM
 * @author HybridMLM
 * @link http://www.hybridmlmsoftware.com
 */

"use strict";

//Setting CSRF Token in ajax header
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//jQuery array chunk
$.fn.chunk = function (size) {
    var arr = [];
    for (var i = 0; i < this.length; i += size) {
        arr.push(this.slice(i, i + size));
    }
    return this.pushStack(arr, "chunk", size);
};

function dotToBrackets(dotString) {
    return dotString.replace(/\.(.+?)(?=\.|$)/g, (m, s) => `[${s}]`);
}

function printHtml(options) {
    options = $.extend({
        filename: 'file',
        x: 50,
        y: 100,
        imageFormat: 'PNG',
    }, options);

    domtoimage.toPng(options.target)
        .then(function (dataUrl) {
            var img = new Image();
            img.src = dataUrl;
            let pdf = new jsPDF({
                orientation: 'landscape',
                unit: 'px',
                //format: [8, 5]
            });
            pdf.addImage(dataUrl, options.imageFormat, options.x, options.y, options.width, options.height);
            pdf.save('file');
        })
        .catch(function (error) {
            console.error('oops, something went wrong!', error);
        });
}

function addToBookMarks(bookMarkAttributes, floatingConfig) {
    console.log(bookMarkAttributes);
    bookMarkAttributes = $.extend({
        data: {},
        label: '',
        action: 'link'
    }, bookMarkAttributes);

    return $.post(baseUrl + '/misc/bookmarks/add', {bookmark: bookMarkAttributes}, function (response) {
        $('.bookmarks.dropdown').addClass('open').promise().done(function () {
            floatingConfig = $.extend({
                float: '<span>' + bookMarkAttributes.label + '</span>',
                startPoint: 'body',
                width: '200',
                enableFloat: false
            }, floatingConfig);

            if (!floatingConfig.enableFloat) return;

            var float = jQuerize(floatingConfig.float);
            var startPoint = jQuerize(floatingConfig.startPoint);
            float.offset({left: startPoint.offset().left, top: startPoint.offset().top});

            $('.bookmarksBody').outerHeight() > 375 ? $('.bookmarksBody')
                .slimScroll({height: '375px', width: '100%'}) : '';
            float.addClass('flyToBookmarks').width(floatingConfig.width)
                .find(' > ul, span.favourite').remove();
            float.find(' > a').append(
                '<button type="button" class="deleteBookmark btn btn-circle btn-outline red ladda-button" data-style="contract" data-spinner-color="red" data-bookmarkId="' + response.bookmark['id'] + '">\n' +
                '                    <i class="fa fa-close"></i>\n' +
                '                </button>'
            ).attr('class', '');
            startPoint.after(float).promise().done(function () {
                var lastLi = $('.bookmarkList.menu > li').last();
                var offsetTop = lastLi.length ? (lastLi.offset().top + lastLi.outerHeight()) : ($('.bookmarkList.menu').length ? $('.bookmarkList.menu').offset().top : $('.bookmarksBody').offset().top);
                var offsetLeft = $('.bookmarkList.menu').length ? $('.bookmarkList.menu').offset().left : $('.bookmarksBody').offset().left;
                float.offset({top: offsetTop, left: offsetLeft}).promise().done(function () {
                    setTimeout(function () {
                        if ($('.bookmarkList.menu').length)
                            $('.bookmarkList.menu').append(
                                float.attr('class', 'bookmarkItem').css({
                                    left: '',
                                    top: '',
                                    width: '',
                                    padding: ''
                                })
                            );
                        else {
                            float.fadeOut().remove();
                            refreshBookmarks();
                        }
                    }, 700);
                });
            });
        });
    });
}

function removeBookmark(id, type) {
    return $.post(baseUrl + '/misc/bookmarks/remove', {bookmarkId: id}, function (response) {
        refreshBookmarks();
        //console.log(window[type + 'BookmarkRemovalCallback']);
        if (window[type + 'BookmarkRemovalCallback'])
            window[type + 'BookmarkRemovalCallback'](id);
    });
}

function refreshBookmarks() {
    simulateLoading('.top-menu .bookmarksBody');

    return $.get(baseUrl + '/misc/bookmarks/view', function (response) {
        $('.top-menu .bookmarksBody').html(response);
    });
}

//Ajax info retrieval
function loadUnit(unit, elem, route, args, postParams) {
    simulateLoading(elem);

    elem = jQuerize(elem);
    let options = {unit: (unit ? unit : elem.attr('data-unit')), args: args};

    if (postParams) $.extend(options, postParams);

    return $.post(route, options, function (response) {
        elem.html(response);
        Ladda.stopAll();
    }).fail(function (response) {
        simulateLoading(elem, true);
        Ladda.stopAll();
    });
}

$.fn.timePiece = function (options) {
    if (!window.moment || !moment().tz) return console.log('please load moment first');

    options = $.extend({
        timezone: window.moment.tz.guess(),
        seconds: '.seconds',
        minutes: '.minutes',
        hours: '.hours',
        ampm: '.ampm'
    }, options);

    return $(this).each(function () {
        let me = $(this);
        setInterval(function () {
            let seconds = me.find(options.seconds);
            let minutes = me.find(options.minutes);
            let hours = me.find(options.hours);
            let ampm = me.find(options.ampm);
            let timeFragments = moment().tz(options.timezone).format('hh:mm:ss:a').split(':');
            seconds.text(timeFragments[2]);
            minutes.text(timeFragments[1]);
            hours.text(timeFragments[0]);
            ampm.text(timeFragments[3]);
        }, 1000);
    });
};

function openQuickSettings(target, callback) {
    if (!$('.page-quick-sidebar-wrapper').hasClass('active')) $('.quickSidebarSwitch').trigger('click');

    $('.quickSideBarInner .panelNav[data-target="' + target + '"]').trigger('click');

    if (callback) callback();
}

// Attachment uploader
$.fn.attachmentInit = function (options) {
    let defaults = {
        attachmentEndpoint: attachmentEndpoint,
        paramName: 'attachment',
        dropzoneClass: 'dropzoneBox',
        attachmentInputClass: 'attachmentInput',
        attachmentInputName: 'attachment',
        defaultMessage: 'Drop your attachment',
        maxFiles: 1,
        maxFilesize: 3,
        thumbnailWidth: 50,
        thumbnailHeight: 50,
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        acceptedFiles: 'text/csv, application/vnd.ms-office',
        successCallback: () => {
        }
    };
    options = $.extend(defaults, options);

    return this.each(function () {
        let me = $(this);
        me.append('<div class="dropzone bluePrintAttachment ' + options.dropzoneClass + '"></div>')
            .append('<span class="removeAttachment"><i class="fa fa-trash"></i> Remove</span>')
            .promise()
            .done(function () {
                me.find('.dropzone').dropzone({
                    url: options.attachmentEndpoint,
                    maxFilesize: options.maxFilesize, // MB,
                    paramName: options.paramName,
                    maxFiles: options.maxFiles,
                    //acceptedFiles: options.acceptedFiles,
                    dictDefaultMessage: options.defaultMessage,
                    thumbnailWidth: options.thumbnailWidth,
                    thumbnailHeight: options.thumbnailHeight,
                    headers: options.headers,
                    params: options.params,
                    init: function () {
                        let dropzone = this;

                        $('.removeAttachment').click(function () {
                            dropzone.removeAllFiles(true);
                        });

                        if (options.initCallback) options.initCallback();
                    },
                    success: function (file, response) {
                        me.append('<input type="hidden" name="' + options.attachmentInputName + (options.maxFiles > 1 ? '[]' : '') + '" class="' + options.attachmentInputClass + '" value="' + response.attachment['id'] + '">');

                        if (options.successCallback) options.successCallback(response);
                    }
                });
            });
    });
};

function taskNotify(task) {
    $('.taskNotify').remove();

    let wrapper = '<div class="taskNotify">' +
        '<span class="close"><i class="fa fa-close"></i></span>' +
        '<h3><i class="fa fa-tasks"></i> ' + (task.done ? ' Task finished' : ' New task added') + ' (' + task.taskName + ')</h3>' +
        '<p>' + task.taskDescription + '</p>' +
        '<div class="notifyBottom">' +
        '<button class="btn blue vewTask" data-task="' + task.taskId + '">' +
        '<i class="fa fa-angle-double-right"></i>View task' +
        '</button>' +
        '<span class="addedBy">Added by <p>' + task.user.username + '</p></span>' +
        '</div>' +
        '</div>';
    $('body').append(wrapper).promise().done(function () {
        setTimeout(function () {
            $('.taskNotify').addClass('active');
        }, 300);
    });
}

//Document ready
$(function () {
    $('body').on('click', 'span.showOperations', function () {
        $(this).closest('.taskHeader').next().slideToggle();
    }).on('click', '.taskNotify .close', function () {
        $('.taskNotify').removeClass('active').promise().done(function () {
            setTimeout(function () {
                $('.taskNotify').remove();
            }, 300);
        });
    });

    $('body').on('click', '.taskNotify button', function () {
        let taskId = $(this).data('task');

        openQuickSettings('tasks', function () {
            loadSidebarTasks({taskId: taskId});
        });

    });

    // Initialize broadcast callback container
    window.taskBroadCastCallback = {};

    if (typeof loggedId !== 'undefined') {
        if (window.Echo)
        // Setup universal task viewer
            window.Echo.private('taskBroadcast__admin')
                .listen('.taskBroadcast', (e) => {
                    if (e.type == 'taskUpdate') taskNotify(e.task);
                    console.log(e);
                    for (let key in window.taskBroadCastCallback)
                        window.taskBroadCastCallback[key](e);
                });
    }
    $('.page-quick-sidebar-wrapper .quickSideBarInner')
        .slimScroll({
            height: '80vh', width: 'auto', color: '#eee', wheelStep: 8,
            touchScrollStep: 70
        });

    if ($('.timePiece').length) {
        $('.local.timePiece').timePiece();
        $('.server.timePiece').timePiece({
            timezone: 'America/New_York'
        });
    }

    if ($('.notificationHolder').length)
        $('.notificationHolder').slimScroll({height: '350px', width: '100%'});

    $('body').on('keyup', '.transactionPassWrapper input[type="password"]', function (e) {
        if (e.which == 13) {
            e.preventDefault();
            $(this).closest('.transactionPass').find('button.submitTransactionPass').trigger('click');
        }
    });

    refreshBookmarks().done(function () {
        $('.bookmarksBody').outerHeight() > 375 ? $('.bookmarksBody').slimScroll({height: '375px', width: '100%'}) : '';
    });

    $('.quickSidebarSwitch').click(function () {
        $('.page-quick-sidebar-wrapper').toggleClass('active').css({top: $('.page-header').outerHeight()});
    });

    function collapseLeftMenu() {
        $('.page-sidebar .page-sidebar-menu li').removeClass('open hidden');
        $('.page-sidebar .page-sidebar-menu .sub-menu').hide();
    }

    function showMenu(menu) {
        menu = jQuerize(menu);

        if (menu.parent('.sub-menu').length) {
            menu.parents('.sub-menu').show()
                .parent('.nav-item').addClass('open')
                .closest('.page-sidebar .page-sidebar-menu > li')
                .addClass('open').removeClass('hidden');
        } else {
            menu.addClass('open').removeClass('hidden');
        }
    }

    showMenu('.page-sidebar .page-sidebar-menu .sub-menu li.active');

    $('.sidebar-search input[type="text"]').keyup(function () {
        var me = $(this);

        if (!me.val()) {
            collapseLeftMenu();
            return;
        }

        $('.page-sidebar .page-sidebar-menu > li').not('.sidebar-search-wrapper').addClass('hidden');
        $('.page-sidebar .page-sidebar-menu li').each(function () {
            $(this).find('.sub-menu').hide();

            if ($(this).find(' > a .title').text().toLowerCase().match(me.val().toLowerCase())) {
                showMenu($(this));
            }
        });
    });

    //Time piece
    //let timezone =
    setInterval(function () {

    }, 1000);
});

//Array chunk operation
function array_chunk(input, size, preserveKeys) {
    var x;
    var p = '';
    var i = 0;
    var c = -1;
    var l = input.length || 0;
    var n = [];
    if (size < 1) {
        return null;
    }
    if (Object.prototype.toString.call(input) === '[object Array]') {
        if (preserveKeys) {
            while (i < l) {
                (x = i % size)
                    ? n[c][i] = input[i]
                    : n[++c] = {};
                n[c][i] = input[i];
                i++
            }
        } else {
            while (i < l) {
                (x = i % size)
                    ? n[c][x] = input[i]
                    : n[++c] = [input[i]];
                i++
            }
        }
    } else {
        if (preserveKeys) {
            for (p in input) {
                if (input.hasOwnProperty(p)) {
                    (x = i % size)
                        ? n[c][p] = input[p]
                        : n[++c] = {};
                    n[c][p] = input[p];
                    i++
                }
            }
        } else {
            for (p in input) {
                if (input.hasOwnProperty(p)) {
                    (x = i % size)
                        ? n[c][x] = input[p]
                        : n[++c] = [input[p]];
                    i++
                }
            }
        }
    }
    return n;
}

//Basic form functions
function sendForm(options) {
    var defaults = {
        form: jQuerize(window.targetForm)
    };
    options = $.extend({}, defaults, options);
    var formOptions = options.form.serialize();
    var actionUrl = options.actionUrl ? options.actionUrl : options.form.attr('action');
    var post = $.post(actionUrl, formOptions, options.successCallBack);
    post.fail(options.failCallBack);
}

// Prepare element attrs
function extractAttrs(elem) {
    elem = jQuerize(elem);
    var attributes = '';
    var classes = elem.attr('class');
    var id = elem.attr('id');

    if (classes)
        classes.split(' ').forEach(function (value) {
            if (!value) return;
            attributes += '.' + value;
        });

    if (id)
        attributes += '#' + id;

    return attributes;
}

//Refresh part by ajax
function refreshPart(elems, url, options) {
    url = url ? url : location.href;

    return $.get(url, options, function (response) {
        if ($.isArray(elems)) {
            elems.forEach(function (elem, key) {
                elem = jQuerize(elem);
                var target = extractAttrs(elem);
                console.log(target);
                elem.html($(response).find(target).html());
            });
        } else {
            elems = (elems instanceof jQuery) ? elems : $(elems);
            elems.html($(response).find(elems).html());
        }
    });
}

//Loading text animation
function loadingField(options) {
    var defaults = {
        elem: null,
        text: 'loading',
        tail: '.',
        times: 4,
        interval: '500'
    };

    if (options.hasOwnProperty('reset')) {
        clearInterval(options.reset);
        $(options.elem).val(options.value);
        return;
    }

    options = $.extend({}, defaults, options);
    var i = 1;
    return setInterval(function () {
        $(options.elem).val(options.text + Array(i).join(options.tail));
        i = (i == options.times + 1) ? 1 : i + 1;
    }, options.interval);
}

//Element random height
function randomSizes(elem, type) {
    switch (type) {
        case 'width':
            return Math.floor((Math.random() * elem.outerWidth()) + 1);
            break;
        case 'height':
            return Math.floor((Math.random() * elem.outerHeight()) + 1);
            break;
        default:
            return Math.floor((Math.random() * elem.outerHeight()) + 1);
            break;
    }
}

//Random colors
function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

//Loading border animations
function loadingBorder(options) {
    var defaults = {
        elem: null,
        interval: 1000
    };

    if (options.hasOwnProperty('reset')) {
        clearInterval(options.reset);
        $(options.elem).removeClass('noBorders').closest('.outerBorderAnimator').addClass('hideMyBorder');
        return;
    }

    var elem = $(options.elem);
    elem.addClass('noBorders').siblings('.help-block').remove();
    options = $.extend({}, defaults, options);
    var outerWrapper = '<div class="outerBorderAnimator">';
    outerWrapper += '</div>';
    var borders = '<div class="leftBorder borders"></div>';
    borders += '<div class="rightBorder borders"></div>';
    borders += '<div class="topBorder borders"></div>';
    borders += '<div class="bottomBorder borders"></div>';

    if (!elem.parent('.outerBorderAnimator').length) {
        elem.wrap(outerWrapper);
        elem.after($(borders));
    } else {
        elem.closest('.outerBorderAnimator').removeClass('hideMyBorder');
    }

    return setInterval(function () {
        $(elem).parent().find('.leftBorder').css({height: randomSizes(elem, 'height'), background: getRandomColor()});
        $(elem).parent().find('.rightBorder').css({height: randomSizes(elem, 'height'), background: getRandomColor()});
        $(elem).parent().find('.topBorder').css({width: randomSizes(elem, 'width'), background: getRandomColor()});
        $(elem).parent().find('.bottomBorder').css({width: randomSizes(elem, 'width'), background: getRandomColor()});
    }, options.interval);
}

// Equalize height for specific elements by analyzing highest element
function equalizeHeight(elements) {
    var maxHeight = 0;
    var highestElement;

    if ($.isArray(elements)) {
        elements.forEach(function (value) {
            if (maxHeight < jQuerize(value).outerHeight()) {
                maxHeight = jQuerize(value).outerHeight();
                highestElement = jQuerize(value);
            }
        });
        elements.forEach(function (value) {
            jQuerize(value).css('cssText', jQuerize(value).attr('style') + ';min-height:' + maxHeight + 'px !important');
        });
    } else {
        jQuerize(elements).each(function () {
            if (maxHeight < $(this).outerHeight()) {
                maxHeight = $(this).outerHeight();
                highestElement = $(this);
            }
        });
        //console.log(highestElement);
        jQuerize(elements).css('min-height', maxHeight);
    }

    return elements;
}

//Initialize file-manager
(function ($) {
    $.fn.filemanager = function (type, options) {
        type = type || 'file';
        //console.log(options);
        this.on('click', function (e) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
            localStorage.setItem('target_input', $(this).data('input'));
            localStorage.setItem('target_preview', $(this).data('preview'));
            window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
            return false;
        });
    };
})(jQuery);

function SetUrl(url, file_path) {
    //set the value of the desired input to image url
    var target_input = $('#' + localStorage.getItem('target_input'));
    target_input.val(file_path);
    //set or change the preview image src
    var target_preview = $('#' + localStorage.getItem('target_preview'));
    target_preview.attr('src', url);
}

function roundToBtc(amount) {
    let parts = String(amount).split('.');
    let first = parts[0];
    let decimal = parts[1];
    decimal = decimal ? decimal : '';
    let decimalLength = decimal.length > 8 ? 8 : decimal.length;
    let toAppend = 8 - decimalLength;

    return first + '.' + decimal + '0'.repeat(toAppend);
}

//Cart popup
function showCartPopup(options) {
    var defaults = {
        image: assetPath + 'place_holder.png',
        type: 'package',
        timespan: 3000
    };
    $('.cartPopup').removeClass('active').delay('5000').remove();
    options = $.extend({}, defaults, options);
    var html = '<div class="cartPopup">';
    html += '		<div class="cartPopupInner">';
    html += '			<div class="cartPopupImg">';
    html += '				<img src="' + options.image + '">';
    html += '			</div>';
    html += '			<div class="title">' + lang_you_have_added + '<span>' + options.name + '</span>' + ' ' + lang_to_cart + '</div>';
//    html += '			<div class="cartPopupFooter">';
//    html += '				<div class="qtyBox">Qty :' + options.quantity + '</div>';
//    html += '			</div>';
    html += '		</div>';
    html += '	</div>';

    var popupInstance = $(html);

    $('body').prepend(popupInstance).delay(500).queue(function (next) {
        popupInstance.addClass('active');
        next();
    });

    setTimeout(function () {
        popupInstance.removeClass('active').delay(500).queue(function (next) {
            popupInstance.remove();
            next();
        });
    }, options.timespan);
}

//editable field
$.fn.editableField = function () {
    return this.each(function () {
        var target = $(this);
        var defaults = {};
        //console.log(target.clone()[0]);
        var wrapper = $('<div class="toggleableField">\n' +
            '               <div class="inputHolder">\n' + target.clone()[0].outerHTML +
            '                   <span class="fieldValue">' + (target.val() ? target.val() : 'Null') + '</span>\n' +
            '               </div>\n' +
            '               <i class="editField fa fa-pencil"></i>' +
            '           </div>');
        target.replaceWith(wrapper);
        wrapper.find('.fieldValue').click(function () {
            $(this).hide().siblings('input, textarea').addClass('active');
        });
    });
};

//ajax fetch items
$.fn.ajaxFetch = function (options) {
    return this.each(function () {
        $(this).bindWithDelay('keyup', function () {
            var target = $(this);

            var defaults = {
                wrapperTag: 'ul',
                outerWrapperTag: 'div',
                wrapperClass: 'ajaxFetcher',
                outerWrapperClass: 'ajaxFetcherWrapper',
                listTag: 'li',
                listClass: 'eachItem',
                id: 'id',
                dropDownTopOffset: 0,
                name: 'name',
                width: target.outerWidth(),
                ajaxData: {},
                offset: {
                    left: target.offset().left,
                    top: target.offset().top
                }
            };
            options = $.extend({}, defaults, options);

            if (!$(target).val()) {
                if (options.hasOwnProperty('clearCallback')) options.clearCallback($(this));
                return;
            }

            if (!$(this).parent().find('.' + options.outerWrapperClass).length) {
                var html = '<' + options.outerWrapperTag + ' class="' + options.outerWrapperClass + '">';
                html += '<div class="topPointer"></div>';
                html += '<' + options.wrapperTag + ' class="' + options.wrapperClass + '">';
                html += '</' + options.wrapperTag + '>';
                html += '</' + options.outerWrapperTag + '>';
                $(this).after($(html));
            }
            var fetcher = $(this).parent().find('.' + options.wrapperClass);

            $('body').on('click', function () {
                fetcher.closest('.ajaxFetcherWrapper').slideUp();
            });

            var dispatch = $.extend({}, {keyword: target.val()}, options.ajaxData);

            fetcher.slimScroll({destroy: true}).css({height: ''})
                .html('<i class="fa fa-spin fa-circle-o-notch loadingIco"></i>')
                .parent().slideDown().width(options.width)
                .offset({
                    left: options.offset.left,
                    top: (options.offset.top + options.dropDownTopOffset + target.outerHeight())
                });

            $.post(options.route, {action: options.action, data: dispatch}, function (response) {
                fetcher.empty();

                if (!response.length)
                    return fetcher.slideDown().html('<' + options.listTag + ' class="404 ' + options.listClass + '"><i class="fa fa-meh-o"></i> No result !</' + options.listTag + '>');

                response.forEach(function (value, key) {
                    var exists = false;

                    fetcher.find(options.listTag).each(function () {
                        if ($(this).attr('data-id') == value[options.id]) exists = true;
                    });

                    var meta_data = value.meta_data;
                    var profile_pic = ($(meta_data).length && meta_data.hasOwnProperty('profile_pic') && (meta_data.profile_pic)) ? '<img src="' + assetPath + meta_data.profile_pic + '" />' : '<i class="fa fa-user"></i>';
                    if (!exists) fetcher.append('<' + options.listTag + ' class="' + options.listClass + '" data-id="' + value[options.id] + '">' + profile_pic + value[options.name] + '</' + options.listTag + '>');
                });

                if (response.length > 7)
                    fetcher.slimScroll({height: '400px'});

                $(target.parent().find('.' + options.outerWrapperClass + ' ' + options.listTag)).click(function (e) {
                    e.stopPropagation();
                    fetcher.closest('.ajaxFetcherWrapper').slideUp();
                    if (options.hasOwnProperty('selectedCallback')) options.selectedCallback(target, $(this).attr('data-id'), $(this).text());
                });
            });
        }, 500);
    });
};

function resetForm(form) {
    let targetForm = jQuerize(form);
    targetForm.find('input, textarea').each(function () {
        //console.log(this);
        $(this).val('').text('').empty();
    });
}

/**
 * Show cart summary
 *
 * @return string
 */
function loadPaymentGateways(context, container, paymentAmount) {
    simulateLoading(container);

    return $.get(gateways, {'context': context, paymentAmount: paymentAmount}, function (response) {
        jQuerize(container).html(response);
    });
}

//Icon Picker
function iconPickerInit(options) {
    //console.log(options);
    let defaults = {};
    options = $.extend({}, defaults, options);

    if (!$('.iconPickerModal').length) {

        let html = '<div class="modal fade" id="iconPickerModal" tabindex="-1" role="dialog" aria-labelledby="iconPickerModalLabel" aria-hidden="true">';
        html += '	<div class="modal-dialog modal-lg" role="document">';
        html += '		<div class="modal-content">';
        html += '			<div class="modal-header">';
        html += '				<h3 class="modal-title" id="iconPickerModalLabel">Icon Picker</h3>';
        html += '				<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        html += '				<span aria-hidden="true">&times;</span></button>';
        html += '			</div>';
        html += '			<div class="modal-body">';
        html += '				<div class="ajaxWrapper"></div>';
        html += '			</div>';
        html += '			<div class="modal-footer">';
        html += '				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
        html += '				<button type="button" class="btn btn-primary">Save changes</button>';
        html += '			</div>';
        html += '		</div>';
        html += '	</div>';
        html += '</div>';

        $('body').append(html);
    }

    let ajaxTarget = $('#iconPickerModal .ajaxWrapper');

    simulateLoading(ajaxTarget);

    $('body').off('click', options.trigger).on('click', options.trigger, function () {

        let me = $(this);

        $('#iconPickerModal').modal('show');
        ajaxTarget.load(baseUrl + '/misc/icons/font').promise().done(function () {
            //ajaxTarget.slimScroll({height: '250px', width: '100%'});
        });

        let fontAwesomeItem = '#iconPickerModal .fontawesome-icon-list .fa-item';

        $('body').off('click', fontAwesomeItem).on('click', fontAwesomeItem, function () {
            $('#iconPickerModal').modal('hide');
            $(options.target).val($(this).find('i').attr('class'));
            if (options.hasOwnProperty('callback')) options.callback(me, $(this).find('i').attr('class'));
        });
    });
}

//simulate loading
function simulateLoading(elem, remove, centerImg) {
    let defaultBg = 'rgba(255, 255, 255, 0.73)';

    if ($.isArray(elem)) {
        elem.forEach(function (value, key) {
            var bg = jQuerize(value).attr('data-loader-bg') ? jQuerize(value).attr('data-loader-bg') : defaultBg;
            if (!remove)
                jQuerize(value).css({position: 'relative'}).append(loaderImg(bg));
            else
                jQuerize(value).find('.loader').remove();

            centralizeItem(jQuerize(value).find('.loader img'), jQuerize(value).find('.loader'));
        });

        return elem;
    }

    if (!remove)
        jQuerize(elem).css({position: 'relative'})
            .append(loaderImg(jQuerize(elem).attr('data-loader-bg') ? jQuerize(elem).attr('data-loader-bg') : defaultBg));
    else
        jQuerize(elem).find('.loader').remove();

    centralizeItem(jQuerize(elem).find('.loader img'), jQuerize(elem).find('.loader'));

    return jQuerize(elem);
}

function centralizeItem(item, parent) {
    item = jQuerize(item);
    parent = jQuerize(parent);

    item.css({top: (parent.outerHeight() / 2) - (item.outerHeight() / 2), margin: 'auto', position: 'relative'});

    return item;
}

function loaderImg(bg) {
    var loader = '<div class="loader" style="background:' + bg + '">';
    loader += '<img src="' + assetPath + '/ajax-loader.gif"/>';
    loader += '</div>';

    return loader;
}

//Create jquery object if not
function jQuerize(elem) {
    return (elem instanceof jQuery) ? elem : $(elem);
}

function formValues(form) {
    form = jQuerize(form);
    var dispatch = {};
    var formData = form.serializeArray();

    formData.forEach(function (value, key) {
        if (value.name.indexOf('[]') == -1)
            dispatch[value.name] = value.value;
        else {
            dispatch[value.name] = dispatch.hasOwnProperty(value.name) ? dispatch[value.name] : [];
            dispatch[value.name].push(value.value);
        }
    });

    return dispatch;
}

//Render ajax errors
function showAjaxErrors(validator, response, key) {
    var errors = response.responseJSON;
    if (key) errors = errors[key];
    for (var i in errors) {
        if (validator.hasOwnProperty('errorList')) {
            if ($(validator.currentForm).find('[name="' + i + '"]').length) {
                var errOption = {};
                errOption[i] = errors[i];
                validator.showErrors(errOption);
            } else {
                var output = '<div class="error">' + errors[i] + '</div>';
                $(validator.currentForm).prepend(output);
            }
        } else {
            var targetInput = validator.find('[name="' + i + "']");
            var errElem = targetInput.next('.error');
            if (errElem.length) {
                errElem.text(errors[i]);
            } else {
                var output = '<div class="error">' + errors[i] + '</div>';
                targetInput.length ? targetInput.after($(output)) : validator.prepend(output);
            }
        }
    }
}

function popupOverlay(callback) {
    let overlay = $('html').find('popupOverlay');

    if (overlay.length) overlay.remove();
    let overlayElem = '<div class="popupOverlay active">' +
        '<span class="closePopup"><i class="fa fa-close"></i></span>' +
        '<div class="popupContent"></div>' +
        '</div>';

    $('html').prepend($(overlayElem)).promise().done(function () {
        if (callback){
            callback($(overlayElem));
        }
        $('.popupOverlay .closePopup').click(() => {
            $('.popupOverlay').fadeOut('slow').remove();
        });
    });
}

/**
 * @param var1
 * @param op
 * @param var2
 * @return bool
 */
function dynamicCompare(var1, op, var2) {
    switch (op) {
        case "==":
            return var1 == var2;
        case "!=":
            return var1 != var2;
        case ">=":
            return var1 >= var2;
        case "<=":
            return var1 <= var2;
        case ">":
            return var1 > var2;
        case "<":
            return var1 < var2;
        default:
            return true;
    }
}

$(function () {
    //mfkToggle
    $('body')
        .off('click', '.mfkToggle')
        .on('click', '.mfkToggle', function () {
            var wrapper = $(this).closest('.mfkToggleOuterWrap');
            var innerWrapper = $(this).closest('.mfkToggleWrap');

            if (innerWrapper.data('toggle-type') != 'class')
                wrapper.find('> .mfkToggleWrap > .mfkToggle').removeClass('active').next('.toggleBody').slideUp();
            else
                wrapper.find('> .mfkToggleWrap > .mfkToggle').removeClass('active').next('.toggleBody').addClass('hidden');

            if ($(this).hasClass('open')) {
                if (innerWrapper.data('toggle-type') != 'class')
                    $(this).removeClass('open').next('.toggleBody').slideUp();
                else
                    $(this).removeClass('open').next('.toggleBody').addClass('hidden');
            } else {
                if (innerWrapper.data('toggle-type') != 'class')
                    $(this).addClass('open').next('.toggleBody').slideDown();
                else
                    $(this).addClass('open').next('.toggleBody').removeClass('hidden');
            }
        });
});

function preventReloadPageIfChangesNotSave(formName) {
    var dirty = false;
    formName.on('change', 'input', function() {
        dirty = true;
    });
    formName.on('change', 'select', function() {
        dirty = true;
    });
    window.onbeforeunload = function() {
        if (dirty) {
            return 'You have unsaved changes! If you leave this page, your changes will be lost.';
        }
    };
}

$.fn.prettySwitch = function (options) {
    options = $.extend({
        checkedClass: '',
        unCheckedClass: '',
        background: '#ffffff',
        activeSwitchColor: '#01cce9',
        switchColor: '#fbfbfb',
        checkedCallback: null,
        unCheckedCallback: null,
        checkedValue: null,
        unCheckedValue: null,
    }, options);

    $(this).each(function () {
        if ($(this).closest('.hybridMLMPrettySwitch').length) return;
        // if (this.type !== 'radio' || this.type !== 'radio') console.log('Sorry element is not supported!');

        let checked = $(this).prop('checked');
        let checkedClass = checked ? ($.isArray(options.checkedClass) ? options.checkedClass.join(' ') : options.checkedClass + 'active') : ($.isArray(options.unCheckedClass) ? options.unCheckedClass.join(' ') : options.unCheckedClass);
        let inputElement = this;
        let button = '<div class="hybridMLMPrettySwitch ' + checkedClass + '" style="background: ' + options.background + '">' +
            '<div class="switchInner">' +
            '   <span class="switch" style="background: ' + options[checked ? 'activeSwitchColor' : 'switchColor'] + '"></span>' +
            '</div>';

        $(this).wrap(button).promise().done(function () {
            let switchWrapper = $(inputElement).closest('.hybridMLMPrettySwitch');
            let switchElement = $(inputElement).siblings('.switch');

            switchWrapper.click(function () {
                if ($(this).hasClass('active')) {
                    if (options.unCheckedCallback) {
                        options.unCheckedCallback(inputElement);
                    }
                    $(this).removeClass('active');
                    switchElement.css({background: options.switchColor});
                    $(inputElement).prop('checked', false);

                    if (options.unCheckedValue !== null) $(inputElement).val(options.unCheckedValue);
                } else {
                    if (options.checkedCallback) {
                        options.checkedCallback(inputElement);
                    }
                    $(this).addClass('active');
                    switchElement.css({background: options.activeSwitchColor});
                    $(inputElement).prop('checked', true);

                    if (options.checkedValue !== null) $(inputElement).val(options.checkedValue);
                }
            });
        });
    });

    return $(this);
};