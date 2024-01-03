<section class="management-hierarchy">
    <div class="hv-container">
        <div class="hv-wrapper">
            {!! $downLines !!}
        </div>
    </div>
</section>

<script>
    "use strict";

    function resetTree() {
        return $('.hv-wrapper').css({transform: ''});
    }

    //refresh
    function refreshTree(userId, appendTo) {
        if (!appendTo) $('.hv-item img').attr('src', '{!! asset("reload.gif") !!}');

        return $.get('{!! route(strtolower(getScope()).".tree.genealogyTree.reload") !!}/' + userId, {
            markupOnly: true,
            type: '{{ $type }}'
        }, function (response) {
            if (appendTo) {
                appendTo.html(response);
                return;
            }
            $('.hv-wrapper').html(response);

            $('.treeWrapper img').each(function () {
                var me = $(this);
                var userId = me.attr('data-id');
                $(this).webuiPopover({
                    trigger: 'hover',
                    type: 'async',
                    url: "{{ scopeRoute('tree.genealogyTree.tooltip',['id'=> false]) }}/" + userId,
                });
            });
        });
    }

    //Adjust tree horizontal scroll
    function adjustScroll() {
        $('.hv-container').scrollLeft(($('.hv-item').first().width() - $('.hv-wrapper').width()) / 2);
    }

    //init zoom
    function initZoomSCroll() {
        var $section = $('.hv-container');
        //var elem = $section.find('.hv-item').first();
        var elem = $section.find('.hv-wrapper').first();
        var disableZoom = '{{ $moduleData->get("tree_zoom_in") }}' == 1 ? false : true;
        var disablePan = '{{ $moduleData->get("tree_dragging") }}' == 1 ? false : true;
        var animation = '{{ $moduleData->get("tree_animation") }}' == 1 ? true : false;

        var $panzoom = elem.panzoom({
            // Whether or not to transition the scale
            transition: true,

            // Default cursor style for the element
            cursor: "move",

            // There may be some use cases for zooming without panning or vice versa
            // NOTE: disablePan also disables focal point zooming
            disablePan: false,
            disableZoom: disableZoom,

            // Pan only on the X or Y axes
            disableXAxis: false,
            disableYAxis: false,

            // Set whether you'd like to pan on left (1), middle (2), or right click (3)
            //which: 2,

            // The increment at which to zoom
            // Should be a number greater than 0
            increment: 0.1,

            // When no scale is passed, this option tells
            // the `zoom` method to increment
            // the scale *linearly* based on the increment option.
            // This often ends up looking like very little happened at larger zoom levels.
            // The default is to multiply/divide the scale based on the increment.
            linearZoom: false,

            // Pan only when the scale is greater than minScale
            panOnlyWhenZoomed: false,

            // min and max zoom scales
            minScale: 0.4,
            maxScale: 1.2,

            // The default step for the range input
            // Precendence: default < HTML attribute < option setting
            rangeStep: 0.05,

            // Animation duration (ms)
            duration: 500,
            // CSS easing used for scale transition
            easing: "ease-in-out",

            // Indicate that the element should be contained within its parent when panning
            // Note: this does not affect zooming outside of the parent
            // Set this value to 'invert' to only allow panning outside of the parent element (the opposite of the normal use of contain)
            // 'invert' is useful for a large Panzoom element where you don't want to show anything behind it
            contain: false,

            // Transform value to which to always reset (string)
            // Defaults to the original transform on the element when Panzoom is initialized
            startTransform: 'scale(0.9)',
        });
        var scrollLeft = elem.width() / 2 - $section.width() / 2;

        if (elem.width() > $section.width()) elem.panzoom("setMatrix", [1, 0, 0, 1, -scrollLeft, 0]);

        $panzoom.parent().on('mousewheel.focal', function (e) {
            e.preventDefault();
            var delta = e.delta || e.originalEvent.wheelDelta;
            var zoomOut = delta ? delta < 0 : e.originalEvent.deltaY > 0;
            $panzoom.panzoom('zoom', zoomOut, {
                increment: 0.1,
                animate: animation,
                focal: e
            });
        });
    }

    //Document ready functions
    $(document).ready(function () {
        $('.treeSwitches .switch').click(function () {
            switch ($(this).data('action')) {
                case 'reset':
                    return resetTree();
                    break;
            }
        });
        $('body').addClass('page-sidebar-closed');
        $('.page-sidebar-menu').addClass('page-sidebar-menu-closed');
        adjustScroll();
        initZoomSCroll();

        if ('{{ $moduleData->get("view_tooltip") }}' == 1) {
            $('.treeWrapper img').each(function () {
                var me = $(this);
                var userId = me.attr('data-id');
                $(this).webuiPopover({
                    trigger: 'hover',
                    type: 'async',
                    url: "{{ scopeRoute('tree.genealogyTree.tooltip',['id'=> false]) }}/" + userId,
                });
            });
        }

        //$('.hv-item').first().addClass('ui-widget-content').draggable();
        //Select one ajax option
        $('body')
            .off('click', '.hv-item-parent img')
            .on('click', '.hv-item-parent img', function () {
                refreshTree($(this).attr('data-id')).done(function () {
                    adjustScroll();
                    initZoomSCroll();
                });
                $('.ajaxDropDown').slideUp().find('.innerWrap').empty();
                $('.userFilter input[type="text"]').val($(this).text()).next().val($(this).attr('data-id'));
            });

        //deferred loading
        $('body').on('click', '.expandNode', function () {
            $(this).find('i').addClass('fa-spin fa-refresh').removeClass('fa-level-down');
            refreshTree($(this).attr('data-parent'), $(this).closest('.hv-item-child'));
        });

        //Collapses children
        $('body').on('click', '.childCollapse', function () {
            if ($(this).hasClass('closed')) {
                $(this).removeClass('closed').find('i')
                    .removeClass('fa-plus-square-o').addClass('fa-minus-square-o');
                $(this).closest('.hv-item').find('.hv-item-children')
                    .removeClass('closed').find(' > .hv-item-child').slideDown();
            } else {
                //console.log($(this).closest('.hv-item'));
                $(this).addClass('closed').find('i')
                    .addClass('fa-plus-square-o').removeClass('fa-minus-square-o');
                $(this).closest('.hv-item').find('.hv-item-children')
                    .addClass('closed').find(' > .hv-item-child').slideUp();
            }
        });

        $('body')
            .on('click', '.data-up', function () {
                refreshTree($(this).attr('data-id')).done(function () {
                    adjustScroll();
                    initZoomSCroll();
                });
                $('.ajaxDropDown').slideUp().find('.innerWrap').empty();
                $('.userFilter input[type="text"]').val($(this).text()).next().val($(this).attr('data-id'));
            });

        $('body').on('keyup', '.userFilter input[type="text"]', function () {
            var me = this;
            var options = {
                keyword: $(this).val()
            };
            getUsers(options).done(function (response) {
                $('.ajaxDropDown .innerWrap').empty();
                if (response.length) {
                    response.forEach(function (value, key) {
                        $('.ajaxDropDown .innerWrap').append('<div class="eachResult user" data-id="' + value.id + '">' + value.username + '</div>');
                    });
                } else {
                    $('.ajaxDropDown .innerWrap').html('<div class="ajaxNoResult"><i class="fa fa-meh-o"></i> No result !</div>');
                }

                adjustPosition($('.ajaxDropDown'), $(me));
            });
        });
        $(function () {
            //User fetcher
            var selectedCallback = function (target, id, name) {
                $('.userFiller').val(name);
                refreshTree(id)

            };

            var options = {
                target: '.userFiller',
                route: '{{ route("user.api") }}',
                action: 'getUsers',
                name: 'username',
                ajaxData: {downlineRelation: '{{ $type }}', includeSelf: true},
                selectedCallback: selectedCallback
            };
            $('.userFiller').ajaxFetch(options);
        });
    });
</script>
