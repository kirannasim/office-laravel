<div class="userInfoHolder">
    @if($user)
        <div class="headerData">
            <div class="profilePic">
                <img src="{{ getProfilePic($user) }}">
            </div>
            <div class="meta">
                <h3 class="name">{{ $user->metaData->firstname . ' ' . $user->metaData->lastname }}</h3>
                <div class="timestamp">
                    {{ _mt($moduleId, 'UserJoiningBlocks.joined') }}
                    <span>{{ $user->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
        <div class="bodyData">
            <div class="eachSeries username">
                <label>{{ _mt($moduleId, 'UserJoiningBlocks.username') }}</label>
                <div class="dataValue">{{ $user->username }}</div>
            </div>
            <div class="eachSeries">
                <label>{{ _mt($moduleId, 'UserJoiningBlocks.package') }}</label>
                <div class="dataValue">
                    {{ getPackageInfo($user->package_id)['name'] }}
                </div>
            </div>
            <div class="eachSeries">
                <label>{{ _mt($moduleId, 'UserJoiningBlocks.sponsor') }}</label>
                <div class="dataValue">{{ usernameFromId($user->repoData->sponsor_id) }}</div>
            </div>
            <div class="eachSeries">
                <label>{{ _mt($moduleId, 'UserJoiningBlocks.parent') }}</label>
                <div class="dataValue">{{ usernameFromId($user->repoData->parent_id) }}</div>
            </div>
            <div class="eachSeries">
                <label>{{ _mt($moduleId, 'UserJoiningBlocks.joined_date') }}</label>
                <div class="dataValue">{{ $user->created_at->format('F d Y') }}</div>
            </div>
        </div>
    @else
        <span class="noInfo">{{ _mt($moduleId, 'UserJoiningBlocks.no_info') }}</span>
    @endif
</div>
<script>
    "use strict";

    $(function () {
        $('.userInfoHolder').css('min-height', $('.userListPane.latestJoinings').height());
    });
</script>