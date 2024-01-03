@foreach($styles as $style)
    {!! $style !!}
@endforeach
@foreach($scripts as $script)
    {!! $script !!}
@endforeach
<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 userListPane topSponsors">
    <div class="innerHolder">
        <div class="portlet light portlet-fit userListPortlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-directions font-green hide"></i>
                    <span class="caption-subject bold font-dark uppercase ">{{ _mt($moduleId, 'TopEarnersAndTopSponsors.top_sponsors') }}</span>
                    <span class="caption-helper">{{ _mt($moduleId, 'TopEarnersAndTopSponsors.last_sponsors') }}</span>
                </div>
            </div>
            <div class="portlet-body">
                @forelse($topSponsors as $user)
                    <div class="user" data-id="{{ $user->id }}">
                        <img src="{{ getProfilePic($user) }}">
                        <h5>{{ $user->username }}</h5>
                        @if(strtolower(getScope()) == 'admin')  <span class="referrals"><i>{{ $user->downlines }}</i> {{ _mt($moduleId, 'TopEarnersAndTopSponsors.referrals') }}</span> @endif
                    </div>
                @empty
                    <div class="noUser">{{ _mt($moduleId, 'TopEarnersAndTopSponsors.no_users_to_show') }}</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 userDetailsPane">
    <div class="innerHolder"><span class="noInfo">{{ _mt($moduleId, 'TopEarnersAndTopSponsors.no_info') }}</span></div>
</div>
<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 topEarnersListPane">
    <div class="innerHolder">
        <div class="portlet light portlet-fit userListPortlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-directions font-green hide"></i>
                    <span class="caption-subject bold font-dark uppercase ">{{ _mt($moduleId, 'TopEarnersAndTopSponsors.top_earners') }}</span>
                    <span class="caption-helper">{{ _mt($moduleId, 'TopEarnersAndTopSponsors.last_users') }}</span>
                </div>
            </div>
            <div class="portlet-body">
                @forelse($topEarners as $user)
                    <div class="user @if ($loop->first) active @endif" data-id="{{ $user->id }}">
                        <img src="{{ getProfilePic($user) }}">
                        <h5>{{ $user->username }}</h5>
                        @if(strtolower(getScope()) == 'admin')  <span
                                class="earning">{{ prettyCurrency($user->earnings) }}</span> @endif
                    </div>
                @empty
                    <div class="noUser">{{ _mt($moduleId, 'TopEarnersAndTopSponsors.no_users_to_show') }}</div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<script>
    //"use strict";

    $(function () {
        // Fetch data of first user from latest joining's
        var userId = $('.topEarnersListPane .userListPortlet .user.active').data('id');
        if (userId)
            getUnit('.userDetailsPane .innerHolder', 'userEarningsInfo', {}, {userId: userId}).done(function () {
                equalizeHeight('.earnersAndSponsors .userListPane .innerHolder, .topEarnersListPane .innerHolder, .earnersAndSponsors .userDetailsPane .innerHolder');
            });
        equalizeHeight('.earnersAndSponsors .userListPane .innerHolder, .topEarnersListPane .innerHolder, .earnersAndSponsors .userDetailsPane .innerHolder');
    });

    $('body').off('click', '.earnersAndSponsors .userListPortlet .user')
        .on('click', '.earnersAndSponsors .userListPortlet .user', function () {
            $('.userListPortlet .user').not(this).removeClass('active');
            $(this).addClass('active');

            if ($(this).closest('.userListPane').hasClass('topSponsors'))
                getUnit('.userDetailsPane .innerHolder', 'sponsorInfo', {}, {userId: $(this).data('id')});
            else
                getUnit('.userDetailsPane .innerHolder', 'userEarningsInfo', {}, {userId: $(this).data('id')});
        });
</script>