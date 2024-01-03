@if($topEarners->count())
    <table class="table table-striped table-bordered table-hover dataTable dtr-inline reporttable" role="grid"
           aria-describedby="sample_1_info">
        <thead>
        <tr>
            <th>{{  _mt($moduleId, 'TopEarnersReport.sl_no') }}</th>
            <th> {{ _mt($moduleId, 'TopEarnersReport.username') }}</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($topEarners as $key => $topEarner)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $topEarner->username }}</td>
                <td class="header"><i class="fa fa-plus" data-id="{{$topEarner->id}}"></i>
                    <div class="userEarningInfo" style=" display:none"></div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="paginationWrapper">
        {!! $topEarners->links() !!}
    </div>
@else
    <div class="noData">
        <i class="fa fa-exclamation"></i>
        {{ _mt($moduleId, 'TopEarnersReport.no_user_found') }}
    </div>
@endif
<script>
    $(function () {
        $('.topEarnersReportWrapper .pagination li a').click(function (e) {
            e.preventDefault();
            fetchTopEarnersData({page: $(this).text()});
        });
    });

    $('.header i').click(function () {
        let section = $(this).closest('.header');
        let id = $(this).data('id')
        if ($(this).hasClass('fa-plus')) {
            loadTopEarnersUnit('userEarningsInfo', '.userEarningInfo', {userId: id});
            section.find('.userEarningInfo').slideDown();

            $(this).addClass('fa-minus').removeClass('fa-plus');
        } else {
            section.find('.userEarningInfo').slideUp();
            $(this).addClass('fa-plus').removeClass('fa-minus');
        }
    });
</script>
