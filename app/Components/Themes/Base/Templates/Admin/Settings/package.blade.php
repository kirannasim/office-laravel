@extends('Admin.Layout.master')
@section('content')
    @component('Components.demoWarning') @endcomponent
    <!-- END PAGE HEADER-->
    <div class="row packageWrapper" style="border:0px; ">
        <div class="packageContainer"></div>
    </div>

    <script type="text/javascript">
        "use strict";

        //Document ready functions
        $(function () {
            //loadForm();
            loadPackageList();

            $('.tabs .tab-links a').on('click', function (e) {
                var currentAttrValue = jQuery(this).attr('href');
                // Show/Hide Tabs
                $('.tabs ' + currentAttrValue).show().siblings().hide();
                // Change/remove current tab to active
                $(this).parent('li').addClass('active').siblings().removeClass('active');
                e.preventDefault();
            });

            Ladda.bind('.packageSubmit');
            Ladda.bind('.removePackage');
            Ladda.bind('.editPackage');

            $('body').on('click', '.showAdv', function () {
                $(this).siblings('.showBasic').removeClass('hideMe');
                $(this).addClass('hideMe');
                $(this).closest('.packageWrapper').addClass('expanded').find('.packageAdvInfo').slideDown();
                $(this).closest('.packageWrapper').find('.packageBasicInfo').slideUp();
            });

            $('body').on('click', '.showBasic', function () {
                $(this).siblings('.showAdv').removeClass('hideMe');
                $(this).addClass('hideMe');
                $(this).closest('.packageWrapper').removeClass('expanded').find('.packageAdvInfo').slideUp();
                $(this).closest('.packageWrapper').find('.packageBasicInfo').slideDown();
            });

        });

        // view more details
        $('body').on('click', '.moreDetails', function () {
            if ($(this).hasClass('closed')) {
                $(this).removeClass('closed').closest('.details').find('.eachDetail.toggleable').removeClass('hidden');
                $(this).find('.toogleText').html('Less');
                $(this).find('i').removeClass('fa-angle-double-down');
                $(this).find('i').addClass('fa-angle-double-up');
            } else {
                $(this).addClass('closed').closest('.details').find('.eachDetail.toggleable').addClass('hidden');
                $(this).find('.toogleText').html('More');
                $(this).find('i').removeClass('fa-angle-double-up');
                $(this).find('i').addClass('fa-angle-double-down');
            }

        });

        $('body').on('click', '.changeStatus', function () {
            var id = $(this).attr('data-id');
            $.post("{{ route('package.changeStatus') }}", {'id': id}, function (response) {
                loadPackageList();
                toastr.success('{{ _t('settings.package_status_changed_successfully') }}');
            });

        });

        //Reset form
        function resetPckageForm() {
            $('.packageForm')[0].reset();
            $('#thumbnail').val('http://placehold.it/150x150');
            $('#holder').attr('src', 'http://placehold.it/150x150');
        }

        //Delete package
        function deletePackage(id) {
            var options = {action: 'delete', id: id};
            return $.post("{{ route('package.store') }}", options);
        }

        //edit package
        function editPackage(id) {
            var options = {action: 'edit', id: id};
            return $.post("{{ route('package.store') }}", options);
        }

        //Delete pckage in action
        $('body').on('click', '.removePackage', function () {
            var me = $(this);
            deletePackage($(this).attr('data-id')).done(function (response) {
                toastr.success('{{ _t('settings.package_deleted_successfully') }}');
                Ladda.stopAll();
                loadPackageList();
                Ladda.bind('.packageSubmit');
                Ladda.bind('.removePackage');
                Ladda.bind('.editPackage');

            });
        });
        //edit pckage in action
        $('body').on('click', '.editPackage', function () {
            var me = $(this);
            loadForm($(this).attr('data-id')).done(function (response) {
                Ladda.stopAll();
                $("html, body").animate({scrollTop: 0}, "slow");

                Ladda.bind('.packageSubmit');
                Ladda.bind('.removePackage');
                Ladda.bind('.editPackage');
            });
        });

        // Load form
        function loadForm(id) {
            simulateLoading($('.packageContainer'));
            var endPoint = "{{ route('package.form') }}";
            if (id) endPoint += '/' + id;

            return $.get(endPoint, function (response) {
                $('.packageContainer').html(response);
                Ladda.bind('.packageSubmit');
            });
        }

        //load package list
        function loadPackageList() {
            simulateLoading($('.packageContainer'));
            return $.get("{{route('package.show')}}", function (response) {
                $('.packageContainer').html(response);
                Ladda.bind('.packageSubmit');
                Ladda.bind('.removePackage');
                Ladda.bind('.editPackage');
            });
        }
    </script>
    <style>
        .packageContainer {
            min-height: 100px;
        }

        .packageContainer {
            min-height: 50px;
            position: relative;
        }

        .tabs {
            width: 100%;
            display: inline-block;
        }

        /*----- Tab Links -----*/
        /* Clearfix */
        .tab-links:after {
            display: block;
            clear: both;
            content: '';
        }

        .tab-links li {
            margin: 0px 5px;
            float: left;
            list-style: none;
        }

        .tab-links a {
            padding: 9px 15px;
            display: inline-block;
            border-radius: 3px 3px 0px 0px;
            background: #7FB5DA;
            font-size: 16px;
            font-weight: 600;
            color: #4c4c4c;
            transition: all linear 0.15s;
        }

        .tab-links a:hover {
            background: #a7cce5;
            text-decoration: none;
        }

        li.active a, li.active a:hover {
            background: #fff;
            color: #4c4c4c;
        }

        /*----- Content of Tabs -----*/
        .tab-content {
            /*padding: 15px;*/
            border-radius: 3px;
            /*box-shadow: -1px 1px 1px rgba(0, 0, 0, 0.15);*/
            background: #fff;
        }

        .tab {
            display: none;
        }

        .tab.active {
            display: block;
        }
    </style>

@endsection