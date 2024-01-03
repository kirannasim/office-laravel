<div class="downlineListWrapper">
    <div class="downlineListContainer">
        @if($downlines->count())
            <div class="table-scrollable">
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th><b>{{ _mt($moduleId, 'DownLineList.Sl_No') }}</b></th>
                        <th><b>{{ _mt($moduleId, 'DownLineList.username') }}</b></th>
                        <th><b>{{ _mt($moduleId, 'DownLineList.name') }}</b></th>
                        <th><b>{{ _mt($moduleId, 'DownLineList.Email') }}</b></th>
                        <th><b>{{ _mt($moduleId, 'DownLineList.Join_Date') }}</b></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($downlines as $downline)
                        <tr>
                            <td>{{ ($downlines->currentPage() * $downlines->perPage()) - $downlines->perPage() + $loop->iteration }}</td>
                            <td>
                                {{$downline->user->username}}
                            </td>
                            <td>{{$downline->user->metaData->firstname}} {{$downline->user->metaData->lastname}}</td>
                            <td>{{$downline->user->email}}</td>
                            <td>{{date('Y-m-d',strtotime($downline->created_at))}}</td>
                        </tr>
                    @empty
                        <div class="noUser">{{ _mt($moduleId,'DownLineList.noDownlines') }}</div>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="paginationWrapper">
                {{ $downlines->links() }}
            </div>
        @else
            {{ _mt($moduleId,'DownLineList.noDownlines') }}
        @endif
    </div>
</div>
<script>
    'use strict';

    $('body').on('click', '.paginationWrapper .pagination li a', function (e) {
        e.preventDefault();
        var route = $(this).attr('href');
        loadRefferalList(route);
    });
</script>

