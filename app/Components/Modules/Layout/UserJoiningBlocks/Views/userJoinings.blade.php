<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 userListPane latestJoinings">
    <div class="innerHolder row">
        <div class="portlet light portlet-fit userListPortlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-directions font-green hide"></i>
                    <span class="caption-subject bold font-dark uppercase ">{{ _mt($moduleId, 'UserJoiningBlocks.recent_joining') }}</span>
                    <span class="caption-helper">{{ _mt($moduleId, 'UserJoiningBlocks.last_7_users') }}</span>
                </div>
            </div>
            <div class="portlet-body">
                @forelse($users as $user)
                    <div class="user  @if ($loop->first) active @endif" data-id="{{ $user->id }}">
                        <img src="{{ getProfilePic($user) }}">
                        <h5>{{ $user->username }}</h5>
                        <span class="tinyTimestamp">{{ $user->created_at->diffForHumans() }}</span>
                    </div>
                @empty
                    <div class="noUser">{{ _mt($moduleId, 'UserJoiningBlocks.no_users_to_show') }}</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 userDetailsHolder">
    <div class="innerHolder row"></div>
</div>
<script>
    "use strict";

    $(function () {
        // Fetch data of first user from latest joining's
        getUnit('.userDetailsHolder .innerHolder', 'userInfo', {}, {userId: $('.latestJoinings .userListPortlet .user.active').data('id')});
    });

    $('body').off('click', '.latestJoinings .userListPortlet .user')
        .on('click', '.latestJoinings .userListPortlet .user', function () {
            $('.userListPortlet .user').not(this).removeClass('active');
            $(this).addClass('active');

            getUnit('.userDetailsHolder .innerHolder', 'userInfo', {}, {userId: $(this).data('id')});
        });
</script>