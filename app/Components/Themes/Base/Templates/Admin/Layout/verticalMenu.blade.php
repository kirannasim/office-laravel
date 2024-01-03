@inject('menuFactory','App\Blueprint\Services\MenuServices')

<ul class="page-sidebar-menu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true"
    data-slide-speed="200">
    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <li class="sidebar-toggler-wrapper hide">
        <div class="sidebar-toggler">
            <span></span>
        </div>
    </li>
    <!-- END SIDEBAR TOGGLER BUTTON -->
    <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
    <li class="sidebar-search-wrapper">
        <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
        <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
        <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
        <form class="sidebar-search" action="#" method="POST">
            <a href="javascript:;" class="remove">
                <i class="icon-close"></i>
            </a>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <a href="javascript:;" class="btn submit">
                        <i class="icon-magnifier"></i>
                    </a>
                </span>
            </div>
        </form>
        <!-- END RESPONSIVE QUICK SEARCH FORM -->
    </li>
    {!! $menuFactory->renderLeftMenu() !!}
</ul>

<script type="text/javascript">
    "use strict";

    $(function () {
        $('.page-sidebar-menu > li span.favourite').click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            var me = $(this);
            var parentLi = me.closest('li.nav-item');
            me.find('i').addClass('fa-spin');

            if (!me.hasClass('bookmarked')) {
                var clone = parentLi.clone();
                var floatingConfig = {
                    float: clone,
                    startPoint: parentLi,
                    width: parentLi.outerWidth(),
                    enableFloat: true
                };
                var bookmarkAttributes = {
                    type: 'leftMenu',
                    entity_id: parentLi.data('id'),
                    data: {
                        id: parentLi.data('id')
                    }
                };
                addToBookMarks(bookmarkAttributes, floatingConfig).done(function (response) {
                    me.addClass('bookmarked').find('i').removeClass('fal fa-spin').addClass('fa');
                    parentLi.attr('data-bookmarkid', response.bookmark['id']);
                }).fail(function () {
                    me.find('i').removeClass('fa-spin');
                });
            } else
                removeBookmark(parentLi.attr('data-bookmarkid'), 'leftMenu').done(function () {
                    parentLi.removeAttr('data-bookmarkid');
                });
        });

        window.leftMenuBookmarkRemovalCallback = function (id) {
            $('.page-sidebar .page-sidebar-menu > li[data-bookmarkid="' + id + '"]')
                .removeAttr('data-bookmarkid').find('span.favourite').removeClass('bookmarked')
                .find('i').addClass('fal').removeClass('fa fa-spin');
        }
    });
</script>
