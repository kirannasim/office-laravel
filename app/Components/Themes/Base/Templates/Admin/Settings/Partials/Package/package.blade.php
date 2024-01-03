<div class="portlet light packageListing">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-puzzle font-grey-gallery"></i>
            <span class="caption-subject bold font-grey-gallery uppercase"> {{ _t('settings.packages') }} </span>
            <span class="caption-helper">{{ _t('settings.existing_packages') }}</span>
        </div>
        <div class="tools">
            <button class="btn btn-circle dark btn-outline addNewPackage">{{ _t('settings.add_new_package') }}</button>
        </div>
    </div>
    <div class="form-group pckageSelect pricing-content-2">
        <div class="viewSwitcher">
         <span class="grid active">
             <i class="fa fa-th"></i>
         </span>
            <span class="list">
             <i class="fa fa-list"></i>
        </span>
        </div>
        <div class="packageLoader"></div>
    </div>
</div>

<script>
    'use strict';
    $('.addNewPackage').click(function () {
        loadForm();
    });

    loadPackages('grid');

    $('body').on('click', '.viewSwitcher > span', function () {
        $(this).addClass('active').siblings().removeClass('active');

        if ($(this).hasClass('list'))
            loadPackages('list');
        else
            loadPackages('grid');
    });

    function loadPackages(style) {
        style = style ? style : 'grid';
        simulateLoading('.packageLoader');
        var route = 'package/show/' + style;

        return $.get(route, function (response) {
            $('.packageLoader').html(response);
        });
    }
</script>
<style>
    .row.packageWrapper .portlet.light {
        margin-bottom: 0px;
        padding-bottom: 0px;
    }

    .row.packageWrapper .viewSwitcher {
        border-top: 0px;
    }

    .packageTable a.btn.red.ladda-button.removePackage.ladda-button {
        width: 45px !important;
        display: inline-block;
        float: left;
    }

    .packageTable a.btn.blue.ladda-button.editPackage.ladda-button {
        width: 45px;
        display: inline-block;
        float: left;
    }

    .packageTable.table-responsive tr.product td {
        vertical-align: middle;
    }
</style>
