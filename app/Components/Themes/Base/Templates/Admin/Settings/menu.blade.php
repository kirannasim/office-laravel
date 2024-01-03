@inject('menuFactory','App\Blueprint\Services\MenuServices')
@extends('Admin.Layout.master')
@section('content')
    @component('Components.demoWarning') @endcomponent
    <!-- END PAGE HEADER-->
    <div class="portlet light">
        <div class="portlet-body leftMenuBody menuBody">
            <div class="row">
                <div class="col-md-12">
                    <div class="margin-bottom-10" id="nestable_list_menu">
                        <button type="button" class="btn blue btn-outline sbold uppercase" data-action="expand-all">
                            {{_t('settings.Expand_All')}}
                        </button>
                        <button type="button" class="btn red btn-outline sbold uppercase" data-action="collapse-all">
                            {{_t('settings.Collapse_All')}}
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
                        <span class="caption-subject font-green sbold uppercase">{{_t('settings.Left_Menu')}}</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;"
                               data-toggle="dropdown" data-hover="dropdown" data-close-others="true"
                               aria-expanded="false"> {{_t('settings.Actions')}}
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a class="addMenu leftMenu" href="javascript:;"> {{_t('settings.Add_Menu')}}</a>
                                </li>
                                <li>
                                    <a class="backToMenus" href="javascript:;"> {{_t('settings.Back_to_menus')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="portlet-body leftMenuBody">
                    <form class="newMenuForm leftMenuForm col-md-12">
                        <div class="form-group currentLanguage">
                            <div class="eachField row">
                                <div class="form-group">
                                    <div class="fieldCover">
                                        <i class="fa fa-font"></i>
                                        <input type="text" name="leftmenu[label][{{ currentLocal() }}]"
                                               placeholder="{{_t('settings.Name')}} ({{ currentLocalName() }})"
                                               class="form-control title">
                                    </div>
                                </div>
                                <button type="button"
                                        class="btn lite btn-outline btn-circle showAllLanguages">{{_t('settings.All_languages')}}</button>
                            </div>
                        </div>
                        @foreach($locals as $key => $local)
                            @if ($key == currentLocal())
                                @continue
                            @endif
                            <div class="form-group otherLanguages">
                                <div class="eachField row">
                                    <div class="form-group">
                                        <div class="fieldCover">
                                            <i class="fa fa-font"></i>
                                            <input type="text" name="leftmenu[label][{{ $key }}]"
                                                   placeholder="{{_t('settings.Name')}} ({{ $key }})"
                                                   class="form-control title">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="form-group">
                            <div class="eachField row">
                                <div class="form-group">
                                    <div class="fieldCover">
                                        <i class="fa fa-file-text"></i>
                                        <input type="text" name="leftmenu[description]"
                                               placeholder="{{_t('settings.Meta_description')}}"
                                               class="form-control description">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="eachField row">
                                <div class="form-group">
                                    <div class="fieldCover">
                                        <i class="fa fa-link"></i>
                                        <input type="text" name="leftmenu[link]" placeholder="{{_t('settings.Link')}}"
                                               class="form-control form_control_link">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="formFieldNotice row">
                            Setting a direct link above will override the route
                        </div>
                        <div class="form-group">
                            <div class="eachField row">
                                <select style="width: 100%" class="selectRoutes select2" name="leftmenu[route]">
                                    <option value="">-- {{_t('settings.Select_Route')}} --</option>
                                    @foreach($routes as $route)
                                        <option value="{{ $route->id }}"
                                                data-params="{{ implode('|', (array)$route->route_params) }}">
                                            {{ $route->title?:'No name specified' }}
                                            ({{ $route->route_name }})
                                        </option>
                                    @endforEach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="eachField row">
                                <select style="width: 100%" class="selectParent select2" name="leftmenu[parent_id]">
                                    <option value="">-- {{_t('settings.Select_Parent')}} --</option>
                                    @foreach($leftMenus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->getLabel() }}</option>
                                    @endforEach
                                </select>
                            </div>
                        </div>
                        <div class="form-group routeParams"></div>
                        <div class="form-group">
                            <div class="eachField row">
                                <input type="hidden" name="type" value="leftmenu">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="eachfield iconGroup row">
                                <div class="row">
                                    <div class="col-md-3">
                                        <button type="button"
                                                class="btn green iconFont">{{_t('settings.Font')}}</button>
                                        <div class="icon_font_holder">
                                            <i class="fa fa-cube"></i>
                                        </div>
                                        <input type="hidden" class="icon_font" name="leftmenu[icon_font]"
                                               value="fa fa-cube">
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="iconImage btn blue" data-input="icon_image_thumb"
                                                data-preview="icon_image_holder">{{_t('settings.image')}}
                                        </button>
                                        <img src="" class="icon_image_holder" id="icon_image_holder">
                                        <input type="hidden" id="icon_image_thumb" class="icon_image"
                                               name="leftmenu[icon_image]" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! defineFilter('menuFormBottom', '', 'root', ['type' => 'left']) !!}
                    </form>
                    <div class="menuHolder leftMenu" data-type="left"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bars font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">{{_t('settings.Top_Menu')}}</span>
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
                    <div class="menuHolder leftMenu" data-type="left"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row submitMenus">
        <button class="btn btn-default ladda-button btn-outline" data-style="contract">
            <span class="ladda-label">{{_t('settings.Save')}}</span>
        </button>
    </div>

    <script type="text/javascript">
        "use strict";

        function loadMenus(type) {
            $('.menuHolder').each(function () {
                if (type && (type != $(this).data('type'))) return;

                var me = $(this);

                simulateLoading(me);

                $.post('{{ route('admin.menu.list') }}', {type: $(this).data('type')}, function (response) {
                    me.html(response);
                });
            });
        }

        //Document ready actions
        $(function () {
            // Load menus
            loadMenus();
            //Init select2
            $('.select2').select2({
                width: '100%',
                allowClear: true
            });
            //show route params in new menu form
            $('body').on('select2:select', 'select.selectRoutes', function (e) {
                let routes = $(this).find('option:selected').attr('data-params');

                appendRouteInput(routes.split('|'));
            });
            //show route params in menu edit form
            $('body').on('select2:select', '.menuData select.route', function (e) {
                let routes = $(this).find('option:selected').attr('data-params');

                appendRouteInput(routes.split('|'), $(this).closest('form.menuData').find('.routeParams'));
            });
            //i-check
            $('.privilegeOptions input[type="radio"]').iCheck({
                checkboxClass: 'icheckbox_minimal',
                radioClass: 'iradio_minimal',
                increaseArea: '20%' // optional
            });
            //Initialize icon picker
            let callback = function (trigger, icon) {
                trigger.next('.icon_font_holder').html('<i class="' + icon + '"></i>').next('input').val(icon);
            };
            //Toggle all languages
            $('body').on('click', '.showAllLanguages', function () {
                $(this).closest('form').find('.otherLanguages').slideToggle();
            });

            let options = {trigger: '.iconFont', callback: callback};

            iconPickerInit(options);

            //bind file-manager to button
            let domain = '{{ asset('filemanage') }}';

            $('.iconImage').filemanager('image', {prefix: domain});

            //Bootstrap switch init
            $('.admin_access,.user_access').bootstrapSwitch({
                size: 'mini'
            });

            let form = $('.newMenuForm.leftmenu');
            let rules = {};

                    @foreach($locals as $key => $local)
            var needle = 'leftmenu[name][{{ $key }}]';
            rules.needle = {
                minlength: 2,
                required: true
            };
                    @endforeach

            let link = 'leftmenu[link]';
            let admin_access = 'leftmenu[admin_access]';
            let user_access = 'leftmenu[user_access]';
            rules.link = {
                minlength: 2,
                required: true
            };

            form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: rules,
                errorPlacement: function (error, element) { // render error placement for each input type
                    error.insertAfter(element);
                },
                invalidHandler: function (event, validator) { //display error alert on form submit
                    success.hide();
                    error.show();
                    App.scrollTo(error, -200);
                },
                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },
                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                }
            });
        });

        //Back to menus
        $('body').on('click', '.backToMenus', function () {
            $('.newMenuForm').slideUp().siblings('.menuHolder').slideDown();
            $('.submitMenus button').removeAttr('data-target');
        });

        //Reset environment
        function resetWizard(position) {
            position = position ? position : 'left';

            refreshPart(['.page-sidebar-menu', '.' + position + 'MenuForm']).done(function () {
                /*$(".select2").select2('destroy');*/
                $(".select2").select2({
                    allowClear: true,
                    width: '100%'
                });
                //icheck
                $('.privilegeOptions input[type="radio"]').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal',
                    increaseArea: '20%' // optional
                });
                $('.admin_access,.user_access').bootstrapSwitch({
                    size: 'mini'
                });
                UINestable.init();
                $('.submitMenus button').attr('data-target', '');
            });
        }

        // Save all menus

        function saveMenus() {
            var options = {
                menus: {
                    leftmenu: JSON.parse($('.leftMenuData').val())
                }
            };

            return $.post('{!! route('admin.menu.update') !!}', options, function (response) {
                resetWizard();
                Ladda.stopAll();
                loadMenus();
            }).fail(function () {
                Ladda.stopAll();
            });
        }

        function appendRouteInput(routes, target) {
            target = target ? target : $('.form-group.routeParams');
            var output = '';

            routes.forEach(function (value) {
                if (!value) return;
                output += '<div class="eachRouteInput eachField row" data-key="' + value + '">';
                output += '     <input type="text" placeholder="Enter ' + value + '" value="" name="leftmenu[routeParams][' + value + ']">';
                output += '</div>';
            });

            target.empty().html(output);
        }

        //Add right menu
        function addMenu(menu) {
            var form = (menu == 'left') ? $('.leftMenuForm') : $('.rightMenuForm');
            var formDatas = form.serialize();
            return $.post("{{ route('admin.menu.insert') }}", formDatas, function (response) {
                resetWizard();
                loadMenus();
                form.slideUp().siblings().slideDown();
                Ladda.stopAll();
            }).fail(function (response) {
                Ladda.stopAll();
                var errors = response.responseJSON;
                for (var key in errors) {
                    var errOptions = {};
                    var theKey = key.split('.')[0] + '[' + key.split('.')[1] + ']';
                    theKey += (key.split('.').length > 2) ? '[' + key.split('.')[2] + ']' : '';
                    errOptions[theKey] = errors[key];
                    console.log(errOptions);
                    form.validate().showErrors(errOptions);
                }
            });
        }

        //Menu details drop-down
        $('body').on('click', '.menuSettings', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).siblings('.menuData').slideToggle();
        });

        //submit menu action handler
        $('body').on('click', '.submitMenus button', function () {

            UINestable.updateOutput($('#leftMenuList').data('output', $('.leftMenuData')));

            switch ($(this).attr('data-target')) {
                case 'addLeftMenu':
                    addMenu('left');
                    break;

                case 'addRightMenu':
                    addMenu('right');
                    break;

                default:
                    saveMenus();
                    break;
            }
        });

        /**
         * Save single menu data
         */
        function saveSingleMenu(data) {
            return $.post('{{ route('admin.menu.update') }}', data);
        }

        /**
         * Delete single menu defining function
         */
        function deleteSingleMenu(id, type) {
            var options = {id: id, type: type}

            return $.post('{{ route('admin.menu.delete') }}', options, function () {

            });
        }

        /**
         * update single menu
         */
        $('body').on('click', '.saveMenu', function () {
            saveSingleMenu(formValues($(this).closest('.menuData'))).done(function () {
                resetWizard();
                Ladda.stopAll();
                loadMenus();
            }).fail(function () {
                Ladda.stopAll();
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
                resetWizard();
                l.stop();
                loadMenus();
            });
        });

        //Toggle menu wizard
        $('body').on('click', '.addMenu', function () {
            if ($(this).hasClass('leftMenu')) {
                $('.leftMenuForm').slideDown().siblings().slideUp();
                $('.submitMenus button').attr('data-target', 'addLeftMenu');
            } else {
                $('.rightMenuForm').slideDown().siblings().slideUp();
                $('.submitMenus button').attr('data-target', 'addRightMenu');
            }
        });

        //A small bug fix
        $('body').on('focusin', '.eachField input[type="text"]', function () {
            $('label.error').hide();
        });

        $('body').on('focusout', '.eachField input[type="text"]', function () {
            $('label.error').show();
        });

        //Reset image

        $('body').on('click', 'img#icon_image_holder', function () {
            $(this).attr('src', '').next().val('');
        });
    </script>
@endsection
