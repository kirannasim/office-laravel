<div class="heading">
    <h3>{{ _t('member.personalized_settings') }}</h3>
</div>
<div class="personalizedManagement" data-user="{{ $user->id }}">
    <div class="col-md-3 personalizedNavWrapper">
        <div class="navInner">
            {!! defineFilter('personalizedSettingsMenu', '', 'memberManagement') !!}
        </div>
    </div>
    <div class="col-md-9 personalizedPanelWrapper">
        <div class="personalizedPanelInner">
            {!! defineFilter('personalizedSettingsContent', '', 'memberManagement', $user->id) !!}
        </div>
    </div>
</div>

<script>
    "use strict";
    $('.personalizedNavWrapper .navInner .nav').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
        $('.personalizedPanel[data-target="' + $(this).data('target') + '"]')
            .addClass('active').siblings().removeClass('active');
    });
</script>