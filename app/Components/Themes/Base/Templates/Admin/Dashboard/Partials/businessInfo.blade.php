<div class="businessInfo">
    {!! defineFilter('dashboardBlock', '', 'dashboardTile') !!}
</div>

<script type="text/javascript">
    "use strict";

    $('body')
        .off('click', '.businessInfo .filterGear > ul.dropdown-menu li')
        .on('click', '.businessInfo .filterGear > ul.dropdown-menu li', function (e) {
            e.preventDefault();
            var me = $(this);
            var block = $(this).closest('.filterGear').data('block');
            var filters = {
                groupBy: $(this).data('groupby'),
                filterBy: $(this).data('filter'),
                fromDate: $(this).data('from')
            };
            var postData = {filters: filters};

            if ($.isArray(window.bizBlockParams))
                window.bizBlockParams.forEach(function (action, key) {
                    postData = $.extend({}, postData, action(me));
                });

            fetchBizBlock(postData, block, me);
        });
</script>