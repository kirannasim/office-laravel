<div class="innerWrapper">
    {!! Form::open(['route' => 'user.login','class' => 'privilage-form','id' => 'privilage_form']) !!}
    <input type="hidden" name="action" value="assign">
    <div class="userGroupPicker row">
        <div class="col-md-4">
            <label>{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.Choose_user_type') }}</label>
        </div>
        <div class="col-md-4 col-md-offset-4">
            <select class="select2 userGroupSelect" name="user_group">
                <option value="">{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.Select_user_group') }}</option>
                @foreach($userTypes as $key => $group)
                    <optgroup label="{{ $group->title }}">
                        @forelse($group->subTypes as $type)
                            <option @if($userGroup == $type->id) selected
                                    @endif value="{{ $type->id }}">{{ $type->title }}</option>
                        @empty
                            <option value="">{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.No_user_types_under_this_group') }}</option>
                        @endforelse
                    </optgroup>
                @endforeach
            </select>
        </div>
    </div>
    <div class="privilagedItemsWrapper">
        <div class="eachPrivilageGroup" data-scope="modules">
            <div class="privilageHead">
                <h3><i class="fa fa-cubes"></i>{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.Modules') }}
                </h3>
                <span class="togglers">
						<i class="fa fa-plus" style="display:none"></i>
						<i class="fa fa-minus"></i>
					</span>
            </div>
            <div class="eachPrivilageInner">
                @if(isset($modules))
                    @forelse($modules as $key => $group)
                        <div class="itemGroup moduleGroup">
                            <h4 class="col-md-12">{{ $key }}</h4>
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
                            @forelse((array)$group as $module)
                                <div class="eachItem module row">
                                    <div class="col-md-8">
                                        <label><i class="fa fa-cube"></i>{{ $module['name'] }}</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="iCheck"
                                               {{ in_array($module['slug'], (array)$privileges->get('modules', []))?'checked':'' }} value="{{ $module['slug'] }}"
                                               name="modules[]" type="checkbox">
                                    </div>
                                </div>
                            @empty
                                <div class="noItems">{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.There_are_no_modules_found_in_this_group') }}</div>
                            @endforelse
                        </div>
                    @empty
                        <div class="noItems">{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.There_are_no_modules_found') }}</div>
                    @endforelse
                @endif
            </div>
        </div>
        <div class="eachPrivilageGroup" data-scope="themes">
            <div class="privilageHead">
                <h3><i class="fa fa-desktop"></i>{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.Themes') }}
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
                                <input type="text" placeholder="Search in themes ...">
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
                    @if(isset($themes))
                        @forelse($themes as $theme)
                            <div class="eachItem module row">
                                <div class="col-md-8">
                                    <label><i class="fa fa-paint-brush"></i>{{ $theme['name'] }}</label>
                                </div>
                                <div class="col-md-4">
                                    <input {{ in_array($theme['slug'], $privileges->get('themes', []))?'checked':'' }} class="iCheck"
                                           value="{{ $theme['slug'] }}" name="themes[]" type="checkbox">
                                </div>
                            </div>
                        @empty
                            <div class="noItems">There are no modules found!</div>
                        @endforelse
                    @endif
                </div>
            </div>
        </div>
        <div class="eachPrivilageGroup" data-scope="menus">
            <div class="privilageHead">
                <h3>
                    <i class="fa fa-bars"></i>{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.MenusRoutes') }}
                </h3>
                <span class="togglers">
						<i class="fa fa-plus" style="display:none"></i>
						<i class="fa fa-minus"></i>
					</span>
            </div>
            <div class="eachPrivilageInner">
                <div class="itemGroup menuGroup">
                    <div class="itemMetaWrap">
                        <div class="col-md-11 itemMeta">
                            <div class="searchItem">
                                <input type="text" placeholder="Search in menus ...">
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
                                <label><i class="fa fa-th"></i>{{ $menu->getLabel() }}</label>
                            </div>
                            <div class="col-md-4">
                                <input {{ in_array($menu['id'], (array)$privileges->get('menus', []))?'checked':'' }} class="iCheck"
                                       value="{{ $menu['id'] }}" name="menus[]" type="checkbox">
                            </div>
                        </div>
                    @empty
                        <div class="noItems">{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.There_are_no_modules_found') }}</div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="eachPrivilageGroup" data-scope="routes">
            <div class="privilageHead">
                <h3><i class="fa fa-plug"></i>{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.Routes') }}</h3>
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
                                <input type="text" placeholder="Search in routes ...">
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
                                    {{ $route['title']?:'No title ' }}
                                    ({{ $route['route_name'] }})
                                </label>
                            </div>
                            <div class="col-md-4">
                                <input {{ in_array($route['id'], (array) $privileges->get('routes'))?'checked':'' }} class="iCheck"
                                       value="{{ $route['id'] }}" name="routes[]" type="checkbox">
                            </div>
                        </div>
                    @empty
                        <div class="noItems col-md-12">{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.There_are_no_routes_found') }}</div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="formSubmitWrap">
            <button type="button" class="btn dark ladda-button submitPrivilage"
                    data-style="contract">{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.Save') }}</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>

<script type="text/javascript">
    "use strict";

    //iCheck
    function icheckInit() {
        $('.iCheck').iCheck({
            checkboxClass: 'icheckbox_flat',
            radioClass: 'iradio_flat'
        });

        $("select.userGroupSelect").select2({
            allowClear: true,
            width: '100%',
            escapeMarkup: function (m) {
                return m;
            }
        });
    }

    //Document ready scripts
    $(function () {
        icheckInit();
        Ladda.bind('.ladda-button');
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

    // Save privileges
    $('body').off('click', '.submitPrivilage')
        .on('click', '.submitPrivilage', function () {
            var options = $('form.privilage-form').serialize();
            $.post("{{ route('save.privilages') }}", options, function (response) {
                Ladda.stopAll();
            }).fail(function (response) {
                Ladda.stopAll();
            });
        });

    // Query shortlist and update modules, themes and menus when changing user group
    function updateShortList(userGroupId) {
        var options = {id: userGroupId};
        $.post("{{ route('privilages.query') }}", options, function (response) {
            if (response == false) {
                $('.iCheck').iCheck('uncheck');
                return false
            }
            for (key in response) {
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
            $('.iCheck').iCheck('uncheck');
        });
    }

    //Shortlist updation in action
    $('body').off('change', 'select.userGroupSelect')
        .on('change', 'select.userGroupSelect', function () {
            fetchAssignForm($(this).val());
        });
</script>
