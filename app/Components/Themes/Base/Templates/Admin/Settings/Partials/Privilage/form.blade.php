<div class="innerWrapper">
    {!! Form::open(['route' => 'user.login','class' => 'privilage-form','id' => 'privilage_form']) !!}
    <div class="userGroupPicker row">
        <div class="col-md-4">
            <label>Choose User type</label>
        </div>
        <div class="col-md-8">
            <select class="select2" name="user_group">
                @foreach($userTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="privilagedItemsWrapper">
        <div class="eachPrivilageGroup">
            <div class="privilageHead">
                <h3><i class="fa fa-cubes"></i>Modules</h3>
                <span class="togglers">
						<i class="fa fa-plus" style="display:none"></i>
						<i class="fa fa-minus"></i>
					</span>
            </div>
            <div class="eachPrivilageInner">
                @forelse($modules as $key => $group)
                    <div class="moduleGroup">
                        <h4>{{ $key }}</h4>
                        @forelse($group as $module)
                            <div class="eachItem module row">
                                <div class="col-md-8">
                                    <label><i class="fa fa-cube"></i>{{ $module['name'] }}</label>
                                </div>
                                <div class="col-md-4">
                                    <input class="iCheck" value="{{ $module['moduleId'] }}" name="modules[]"
                                           type="checkbox">
                                </div>
                            </div>
                        @empty
                            <div class="noItems">There are no modules found in this group!</div>
                        @endforelse
                    </div>
                @empty
                    <div class="noItems">There are no modules found!</div>
                @endforelse
            </div>
        </div>
        <div class="eachPrivilageGroup">
            <div class="privilageHead">
                <h3><i class="fa fa-desktop"></i>Themes</h3>
                <span class="togglers">
						<i class="fa fa-plus" style="display:none"></i>
						<i class="fa fa-minus"></i>
					</span>
            </div>
            <div class="eachPrivilageInner">
                <div class="themeGroup">
                    @forelse($themes as $theme)
                        <div class="eachItem module row">
                            <div class="col-md-8">
                                <label><i class="fa fa-paint-brush"></i>{{ $theme['name'] }}</label>
                            </div>
                            <div class="col-md-4">
                                <input class="iCheck" value="{{ $theme['id'] }}" name="themes[]" type="checkbox">
                            </div>
                        </div>
                    @empty
                        <div class="noItems">There are no modules found!</div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="eachPrivilageGroup">
            <div class="privilageHead">
                <h3><i class="fa fa-bars"></i>Menus (Routes)</h3>
                <span class="togglers">
						<i class="fa fa-plus" style="display:none"></i>
						<i class="fa fa-minus"></i>
					</span>
            </div>
            <div class="eachPrivilageInner">
                <div class="themeGroup">
                    @forelse($menus as $menu)
                        <div class="eachItem module row">
                            <div class="col-md-8">
                                <label><i class="fa fa-th"></i>{{ $menu['label'] }}</label>
                            </div>
                            <div class="col-md-4">
                                <input class="iCheck" value="{{ $menu['id'] }}" name="themes[]" type="checkbox">
                            </div>
                        </div>
                    @empty
                        <div class="noItems">There are no modules found!</div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="formSubmitWrap">
            <button type="button" class="btn dark ladda-button submitPrivilage" data-style="contract">Save</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>

<script type="text/javascript">

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

    $('body').on('click', '.submitPrivilage', function () {
        var options = $('form.privilage-form').serialize();
        $.post("{{ route('save.privilages.shortlist') }}", options, function (response) {
            Ladda.stopAll();
        }).fail(function (response) {
            Ladda.stopAll();
        });
    });

</script>
