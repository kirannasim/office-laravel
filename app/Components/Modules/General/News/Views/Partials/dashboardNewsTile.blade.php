{!! $style !!}
<div class="col-sm-12">
    <div class="portlet light portlet-fit userListPortlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-directions font-green hide"></i>
                <span class="caption-subject bold font-dark uppercase ">{{ _mt($moduleId,'News.news') }}</span>
                <span class="caption-helper">{{ _mt($moduleId,'News.showing_last_10') }}</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="newsWrapper">
                @forelse($news as $eachNews)
                    <div class="eachActivity">
                        <div class="activityHeader">
                            <div class="newsUser">
                                <div class="profilePic">
                                    <img src="{{ getProfilePic(getAdminUser()) }}">
                                </div>
                                <span class="timestamp">{{ $eachNews->created_at->format('H:i A') }}</span>
                            </div>
                        </div>
                        <div class="activityCircleHolder">
                        <span class="activityCircle" style="border-color: teal">
                            <i class="fa fa-lock"></i>
                        </span>
                        </div>
                        <div class="activityBody">
                            <h3>{!! isset($eachNews->title[Lang::locale()]) ? $eachNews->title[Lang::locale()] : '' !!}</h3>
                            {!! isset($eachNews->content[Lang::locale()]) ? $eachNews->content[Lang::locale()] : '' !!}
                            <span class="timestamp">{{ $eachNews->created_at->format('D Y H:i A') }}
                                <span>({{ $eachNews->created_at->diffForHumans() }})</span></span>
                        </div>
                    </div>
                @empty
                    <div class="noActivity">{{ _mt($moduleId,'News.no_news_available') }}</div>
                @endforelse
            </div>
        </div>
    </div>
</div>

