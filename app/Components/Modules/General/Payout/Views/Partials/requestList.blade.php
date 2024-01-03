<div class="portlet light col-md-12">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-speech"></i>
            <span class="caption-subject bold uppercase">{{ _mt($moduleId,'Payout.request_list') }}</span>
        </div>
        <div class="actions">
            <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"
               data-original-title="" title=""> </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="PayoutRequestWrapper">
            @if($requests->count())
                <div class="table-scrollable">
                    <table class="table table-striped table-hover">
                        <thead>
                        <th>{{ _mt($moduleId,'Payout.sl_no') }}</th>
                        <th>{{ _mt($moduleId,'Payout.amount') }}</th>
                        <th>{{ _mt($moduleId,'Payout.wallet') }}</th>
                        <th>{{ _mt($moduleId,'Payout.status') }}</th>
                        <th>{{ _mt($moduleId,'Payout.date') }}</th>
                        </thead>
                        <tbody>
                        @foreach($requests as $request)
                            <tr>
                                <td>{{ ($requests->currentPage() * $requests->perPage()) - $requests->perPage() + $loop->iteration }}</td>
                                <td>{{ $request->request_amount }}</td>
                                <td>{{ getModule((int)$request->wallet)->registry['name'] }}</td>
                                <td>{{ $request->status }}</td>
                                <td>{{ $request->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="paginationWrapper">
                    {{ $requests->links() }}
                </div>
            @else
                {{ _mt($moduleId,'Payout.no_data_found') }}
            @endif
        </div>
    </div>
</div>
<script>
    $('.paginationWrapper .pagination li a').click(function (e) {
        e.preventDefault();
        var route = $(this).attr('href');
        loadUnit('requestList', '.payoutPanel', route);
    });
</script>


