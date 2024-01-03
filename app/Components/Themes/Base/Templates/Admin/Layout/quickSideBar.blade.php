<!-- BEGIN QUICK SIDEBAR -->
<a href="javascript:;" class="page-quick-sidebar-toggler">
    <i class="icon-login"></i>
</a>
<div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
    <div class="quickSideBarInner">
        <div class="panelNavWrapper">
            <div class="panelNav active" data-target="optimizer">
                <i class="fa fa-rocket"></i>Optimize
            </div>
            <div class="panelNav" data-target="tasks">
                <i class="fa fa-tasks"></i>Tasks
            </div>
        </div>
        <div class="panelWrapper">
            <div class="partialWrapper panel active" data-target="optimizer">
                <div class="partial" data-unit="cache"></div>
            </div>
            <div class="panel" data-target="tasks">
                <div class="partial taskHolder" data-unit="tasks"></div>
            </div>
        </div>
    </div>
</div>
<!-- END QUICK SIDEBAR -->

<script type="text/javascript">
    "use strict";

    function loadSidebarTasks(filters) {
        let target = $('.quickSideBarInner .partial[data-unit="tasks"]');
        simulateLoading(target);

        return $.post('{{ route('admin.tasks.view') }}', {filters: filters}, function (response) {
            target.html(response);
        });
    }

    function refreshCachePartial() {
        let options = {};
        let target = $('.partial[data-unit="cache"]');
        simulateLoading(target);

        return $.get('{{ route('optimizer.cache') }}', options, function (response) {
            target.html(response);
        });
    }

    $(function () {
        refreshCachePartial();
        loadSidebarTasks();

        $('.quickSideBarInner .panelNav').click(function () {
            $(this).addClass('active').siblings().removeClass('active');
            $('.quickSideBarInner .panel[data-target="' + $(this).data('target') + '"]')
                .addClass('active').siblings().removeClass('active');
        });
    });
</script>
