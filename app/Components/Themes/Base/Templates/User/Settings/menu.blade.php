@inject('menuFactory','App\Components\Themes\Base\ThemeCore\Services\MenuFactory')

@extends('Layout.master')

@section('title',$title)

@section('content')
    <!-- END PAGE HEADER-->
    <div class="portlet light bordered">
        <div class="portlet-body ">
            <div class="row">
                <div class="col-md-12">
                    <div class="margin-bottom-10" id="nestable_list_menu">
                        <button type="button" class="btn green btn-outline sbold uppercase" data-action="expand-all">
                            Expand All
                        </button>
                        <button type="button" class="btn red btn-outline sbold uppercase" data-action="collapse-all">
                            Collapse All
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bars font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">Left Menu</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;"
                               data-toggle="dropdown" data-hover="dropdown" data-close-others="true"
                               aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:;"> Option 1</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="javascript:;">Option 2</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Option 3</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Option 4</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="portlet-body ">
                    <div class="dd" id="nestable_list_1">
                        <ol class="dd-list">
                            {!! $menuFactory->listLeftMenu() !!}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bars font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">Top Menu</span>
                    </div>
                    <div class="tools">
                        <a href="" class="collapse" data-original-title="" title=""> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title=""
                           title=""> </a>
                        <a href="" class="reload" data-original-title="" title=""> </a>
                        <a href="" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body" style="display: block;">
                    <div class="dd" id="nestable_list_2">
                        <ol class="dd-list">
                            {!! $menuFactory->listLeftMenu() !!}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="" class="leftMenuData">
    <input type="hidden" value="" class="topMenuData">
    <div class="row submitMenus">
        <button class="btn btn-default ladda-button btn-outline" data-style="contract"><span
                    class="ladda-label">Save</span></button>
    </div>

    <script type="text/javascript">


        /**
         * Bootstrap switch init
         */

        $(function () {
            $('.admin_access,.user_access').bootstrapSwitch({
                size: 'mini'
            });
        });

        /**
         * Save all menus
         */


        function saveMenus() {

            var options = {data: $('.leftMenuData').val(), type: 'left'};
            var post = $.post('{!! route('admin.menu.update') !!}', options, function (response) {
                console.log(response);
            });
            return post;
        }

        /**
         * Menu details dropdown                                                                                            [description]
         */

        $('body').on('click', '.menuSettings', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).siblings('.menuDatas').slideToggle();
        });

        /**
         *
         */

        $('body').on('click', '.submitMenus button', function () {
            var l = Ladda.create(this);
            l.start();
            saveMenus().done(function () {
                refreshPart(['.page-sidebar-menu']);
                l.stop();
            });
        });

        /**
         * Save single menu data
         *
         */

        function saveSingleMenu(data) {

            var options = {single: true, data: data, type: data.type}

            var post = $.post('{{ route('admin.menu.update') }}', options);

            return post;
        }

        /**
         * Delete single menu defining function
         *
         */

        function deleteSingleMenu(id, type) {

            var options = {id: id, type: type}

            var post = $.post('{{ route('admin.menu.delete') }}', options);

            return post;
        }

        /**
         * update single menu
         */

        $('body').on('click', '.saveMenu', function () {

            var me = this;
            var l = Ladda.create(this);
            l.start();
            var menuData = {};
            menuData.type = 'left';
            menuData.label = $(this).closest('.menuDatas').find('.name').val();
            menuData.link = $(this).closest('.menuDatas').find('.link').val();
            menuData.admin_access = $(this).closest('.menuDatas').find('.admin_access').val();
            menuData.user_access = $(this).closest('.menuDatas').find('.user_access').val();
            menuData.id = $(this).attr('data-menuId');
            menuData.sort_order = 1;

            saveSingleMenu(menuData).done(function () {
                refreshPart(['.page-sidebar-menu', '#nestable_list_1']);
                l.stop();
            });

        });

        /**
         * Deleting menu in action
         */

        $('body').on('click', '.deleteMenu', function () {
            var me = this;
            var l = Ladda.create(this);
            l.start();
            deleteSingleMenu($(this).attr('data-menuId'), 'left').done(function () {
                refreshPart(['.page-sidebar-menu', '#nestable_list_1']);
                l.stop();
            });
        });

    </script>

@endsection
