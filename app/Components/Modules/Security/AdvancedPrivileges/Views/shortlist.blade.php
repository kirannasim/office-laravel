@extends(ucfirst(getScope()).'.Layout.master')
@section('content')
    @component('Components.demoWarning') @endcomponent
    <div class="privilageWrapper">
        <div class="innerWrapper">
            {!! Form::open(['route' => 'user.login','class' => 'privilage-form','id' => 'privilage_form']) !!}
            <input type="hidden" name="action" value="shortlist">
            <div class="userGroupPicker row">
                <div class="col-md-4">
                    <label>{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.Choose_user_type') }}</label>
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <select class="select2 userGroupSelect" name="user_group">
                        @foreach($userTypes as $type)
                            <option value="{{ $type->id }}">{{ $type->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="privilagedItemsWrapper">
                <div class="eachPrivilageGroup" data-scope="modules">
                    <div class="privilageHead">
                        <h3>
                            <i class="fa fa-cubes"></i>{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.Modules') }}
                        </h3>
                        <span class="togglers">
							<i class="fa fa-plus" style="display:none"></i>
							<i class="fa fa-minus"></i>
						</span>
                    </div>
                    <div class="eachPrivilageInner">
                        @forelse($modules as $key => $group)
                            <div class="itemGroup moduleGroup">
                                <h4>{{ $key }}</h4>
                                <div class="itemMetaWrap">
                                    <div class="col-md-11 itemMeta">
                                        <div class="searchItem">
                                            <input type="text" placeholder="Search in {{ $key }} ...">
                                            <button type="button" class="btn btn-outline grey searh" style="width:auto;"
                                                    data-style="contract">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-1 itemMeta">
                                        <button type="button" class="btn grey">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                </div>
                                @forelse($group as $module)
                                    <div class="eachItem module row">
                                        <div class="col-md-8">
                                            <label><i class="fa fa-cube"></i>{{ $module->registry['name'] }}</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="iCheck" value="{{ $module->registry['slug'] }}"
                                                   name="modules[]"
                                                   type="checkbox">
                                        </div>
                                    </div>
                                @empty
                                    <div class="noItems col-md-12">{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.There_are_no_modules_found_in_this_group!') }}</div>
                                @endforelse
                            </div>
                        @empty
                            <div class="noItems col-md-12">{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.There_are_no_modules_found') }}</div>
                        @endforelse
                    </div>
                </div>
                <div class="eachPrivilageGroup" data-scope="themes">
                    <div class="privilageHead">
                        <h3>
                            <i class="fa fa-desktop"></i>{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.Themes') }}
                        </h3>
                        <span class="togglers">
							<i class="fa fa-plus" style="display:none"></i>
							<i class="fa fa-minus"></i>
						</span>
                    </div>
                    <div class="eachPrivilageInner">
                        <div class="itemGroup themeGroup">
                            <div class="itemMetaWrap">
                                <div class="col-md-11 itemMeta">
                                    <div class="searchItem">
                                        <input type="text" placeholder="Search in {{ $key }} ...">
                                        <button type="button" class="btn btn-outline grey searh" style="width:auto;"
                                                data-style="contract">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-1 itemMeta">
                                    <button type="button" class="btn grey">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </div>
                            </div>
                            @forelse($themes as $theme)
                                <div class="eachItem module row">
                                    <div class="col-md-8">
                                        <label><i class="fa fa-paint-brush"></i>{{ $theme->registry['name'] }}</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="iCheck" value="{{ $theme->registry['slug'] }}" name="themes[]"
                                               type="checkbox">
                                    </div>
                                </div>
                            @empty
                                <div class="noItems col-md-12">{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.There_are_no_themes_found') }}</div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="eachPrivilageGroup" data-scope="menus">
                    <div class="privilageHead">
                        <h3>
                            <i class="fa fa-bars"></i>{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.Menus') }}
                        </h3>
                        <span class="togglers">
							<i class="fa fa-plus" style="display:none"></i>
							<i class="fa fa-minus"></i>
						</span>
                    </div>
                    <div class="eachPrivilageInner">
                        <div class="itemGroup themeGroup">
                            <div class="itemMetaWrap">
                                <div class="col-md-11 itemMeta">
                                    <div class="searchItem">
                                        <input type="text" placeholder="Search in {{ $key }} ...">
                                        <button type="button" class="btn btn-outline grey searh" style="width:auto;"
                                                data-style="contract">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-1 itemMeta">
                                    <button type="button" class="btn grey">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </div>
                            </div>
                            @forelse($menus as $menu)
                                <div class="eachItem module row">
                                    <div class="col-md-8">
                                        <label><i class="fa fa-th"></i>{{ $menu->getLabel() }}  @if($menu->description)
                                                <span class="description">{{ $menu->description }}</span>@endif</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="iCheck" value="{{ $menu['id'] }}" name="menus[]" type="checkbox">
                                    </div>
                                </div>
                            @empty
                                <div class="noItems col-md-12">{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.There_are_no_menus_found') }}</div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="eachPrivilageGroup" data-scope="routes">
                    <div class="privilageHead">
                        <h3>
                            <i class="fa fa-plug"></i>{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.Routes') }}
                        </h3>
                        <span class="togglers">
							<i class="fa fa-plus" style="display:none"></i>
							<i class="fa fa-minus"></i>
						</span>
                    </div>
                    <div class="eachPrivilageInner">
                        <div class="itemGroup routeGroup">
                            <div class="itemMetaWrap">
                                <div class="col-md-11 itemMeta">
                                    <div class="searchItem">
                                        <input type="text" placeholder="Search in {{ $key }} ...">
                                        <button type="button" class="btn btn-outline grey searh" style="width:auto;"
                                                data-style="contract">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-1 itemMeta">
                                    <button type="button" class="btn grey">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </div>
                            </div>
                            @forelse($routes as $route)
                                <div class="eachItem module row">
                                    <div class="col-md-8">
                                        <label>
                                            <i class="fa fa-exchange"></i>
                                            {{ $route['title']?:_mt('Security-AdvancedPrivileges','AdvancedPrivileges.No_title')  }}
                                            ({{ $route['route_name'] }})
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="iCheck" value="{{ $route['id'] }}" name="routes[]"
                                               type="checkbox">
                                    </div>
                                </div>
                            @empty
                                <div class="noItems col-md-12">{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.There_are_no_routes_found') }}
                                    )
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="formSubmitWrap">
                    <button type="button" class="btn dark ladda-button submitPrivilage"
                            data-style="contract">{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.Save') }}
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <script type="text/javascript">
        "use strict";

        //iCheck
        function icheckInit() {
            $('.iCheck').iCheck({
                checkboxClass: 'icheckbox_flat',
                radioClass: 'iradio_flat'
            });
        }

        //Document ready scripts
        $(function () {
            icheckInit();
            updateShortList($('.userGroupSelect').val());
            $('.itemGroup.routeGroup').slimScroll({height: '70vh'});
        });

        //Toggle module/theme wrappers
        $('body').on('click', '.privilageHead span.togglers i', function () {
            $(this).hide().siblings().show();
            if ($(this).hasClass('fa-minus'))
                $(this).closest('.privilageHead').addClass('collapsed').next().slideUp();
            else
                $(this).closest('.privilageHead').removeClass('collapsed').next().slideDown();
        });

        //Save privilages
        $('body').off('click', '.submitPrivilage')
            .on('click', '.submitPrivilage', function () {
                var options = $('form.privilage-form').serialize();
                $.post("{{ route('save.privilages') }}", options, function (response) {
                    Ladda.stopAll();
                }).fail(function (response) {
                    Ladda.stopAll();
                });
            });

        //Query shortlist and update modules, themes and menus when changing user group
        function updateShortList(userGroupId) {
            var options = {id: userGroupId};
            $.post("{{ route('privilages.shortlist.query') }}", options, function (response) {
                if (response == false) {
                    $('.iCheck').iCheck('uncheck');
                    return false
                }
                for (var key in response) {
                    var target = $('.eachPrivilageGroup[data-scope="' + key + '"] .eachItem .iCheck');
                    if (!response[key]) {
                        target.iCheck('uncheck');
                        continue;
                    }
                    target.each(function () {
                        if ($.inArray($(this).val(), response[key]) !== -1)
                            $(this).iCheck('check');
                        else
                            $(this).iCheck('uncheck');
                    });
                }
            }).fail(function (response) {

            });
        }

        //Shortlist updation in action
        $('body').off('change', 'select.userGroupSelect')
            .on('change', 'select.userGroupSelect', function () {
                updateShortList($(this).val());
            });

        //Search items
        $('body').off('keyup', '.searchItem input[type="text"]')
            .on('keyup', '.searchItem input[type="text"]', function () {
                var me = $(this);
                $(this).closest('.itemGroup').find('.eachItem').each(function () {
                    //console.log($(this).text().indexOf(me.val()));
                    if ($(this).text().toLowerCase().indexOf(me.val().toLowerCase()) === -1)
                        $(this).addClass('hidden');
                    else
                        $(this).removeClass('hidden');
                });
            });

        //Check all
        $('body').off('click', '.eachPrivilageGroup .itemMetaWrap button')
            .on('click', '.eachPrivilageGroup .itemMetaWrap button', function () {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                    $(this).closest('.itemGroup').find('.eachItem').find('input.iCheck').iCheck('uncheck');
                } else {
                    $(this).addClass('active');
                    $(this).closest('.itemGroup').find('.eachItem').not('.hidden').find('input.iCheck').iCheck('check');
                }
            });

    </script>

    <style type="text/css">
        .userGroupPicker label {
            font-weight: 400;
            line-height: 2;
            font-size: 17px;
        }

        .page-content {
            background: #fff;
        }
    </style>
@endsection
