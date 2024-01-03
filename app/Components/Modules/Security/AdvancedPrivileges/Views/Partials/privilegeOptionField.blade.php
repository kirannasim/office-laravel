<div class="form-group privilegeOptions row">
    <h3>{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.Menu_allowance') }}</h3>
    <div class="eachField row">
        <div class="col-md-4">
            <label>{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.Enable_for') }}</label>
            <input class="iradio restricted" type="radio" @if(isset($menu)) @if ($menu->protected == 0) checked
                   @endif  name="menus[{{ $type }}menu][{{ $menu->id }}][restricted]"
                   @else name="{{ $type }}menu[restricted]" @endif value="0">
        </div>
        <div class="col-md-4">
            <label>{{ _mt('Security-AdvancedPrivileges','AdvancedPrivileges.Disable_for_all') }}</label>
            <input class="iradio restricted" type="radio" @if(isset($menu)) @if ($menu->protected == 1) checked
                   @endif  name="menus[{{ $type }}menu][{{ $menu->id }}][restricted]"
                   @else name="{{ $type }}menu[restricted]" @endif value="1">
        </div>
    </div>
</div>
<div class="form-group userTypeSelection row" @if($privileges) style="display: block;" @endif>
    <select class="select2 userTypes" multiple
            @if(isset($menu)) name="menus[{{ $type }}menu][{{ $menu->id }}][privilegedUserType][]"
            @else name="leftmenu[privilegedUserType][]" @endif>
        @foreach(\App\Eloquents\UserType::all() as $key => $type)
            <optgroup label="{{ $type->title }}">
                @foreach($type->subTypes as $k => $subType)
                    <option @if(in_array($type->id.'-'.$subType->id, $privileges)) selected
                            @endif value="{{ $type->id }}-{{ $subType->id }}">{{ $subType->title }}</option>
                @endforeach
            </optgroup>
        @endforeach
    </select>
</div>

<script>
    "use strict";

    $(function () {
        $('.privilegeOptions input[type="radio"]').on('ifChecked', function () {
            if (Number($(this).val()) === 0)
                $('.userTypeSelection').show();
            else
                $('.userTypeSelection').hide();
        });
    });
</script>
