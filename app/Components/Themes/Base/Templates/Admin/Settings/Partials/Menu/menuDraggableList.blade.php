<div class="dd" id="leftMenuList">
    <ol class="dd-list">
        {!! $menuList !!}
    </ol>
</div>
<input type="hidden" value="" class="leftMenuData">
<script>
    "use strict";

    $(function () {
        Ladda.bind('.ladda-button');
        // nestable init
        UINestable.init();
        //Init select2
        $('.select2').select2({
            width: '100%',
            allowClear: true
        });
        //i-check
        $('.privilegeOptions input[type="radio"]').iCheck({
            checkboxClass: 'icheckbox_minimal',
            radioClass: 'iradio_minimal',
            increaseArea: '20%' // optional
        });
    });
</script>
