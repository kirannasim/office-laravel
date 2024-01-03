@php
    $user = \App\Eloquents\User::find($slot)
@endphp
<div class="navCard" data-user="{{ $user->id }}">
    <div class="headerDetails">
        <img src="{{ getProfilePic($user) }}">
        <label class="username"><span>{{ strtoupper($user->username[0]) }}</span> {{ $user->username }}</label>
        <h3>{{ fullName($user) }}</h3>
    </div>
    <div class="metaData">
        <ul class="memberOptions">
            <li class="active" data-target="profile">
                <i class="icon-user"></i>
                <p>{{ _t('member.profile') }}</p>
            </li>
            <li data-target="wallets">
                <i class="icon-wallet"></i>
                <p>{{ _t('member.wallets') }}</p>
            </li>
            <li data-target="commissions">
                <i class="icon-pie-chart"></i>
                <p>{{ _t('member.commissions') }}</p>
            </li>
            <li data-target="personalized">
                <i class="icon-wrench"></i>
                <p>{{ _t('member.perzonalised_settings') }}</p>
            </li>
            {!! defineFilter('memberManagement', '', 'nav') !!}
        </ul>
    </div>
</div>