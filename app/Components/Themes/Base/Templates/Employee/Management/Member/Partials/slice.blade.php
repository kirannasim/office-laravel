<div class="slice" data-user="{{ $user->id }}">
    <form class="panelForm unit active" data-unit="profile" data-target="profile"></form>
    <form class="panelForm" data-unit="wallets" data-target="wallets"></form>
    <form class="panelForm" data-unit="commissions" data-target="commissions"></form>
    <form class="panelForm" data-unit="referralList" data-target="referralList"></form>
    <form class="panelForm" data-unit="personalized" data-target="personalized"></form>
    {!! defineFilter('memberManagement', '', 'slice') !!}
</div>