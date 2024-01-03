@extends(ucfirst(getScope()).'.Layout.master')
@section('content')

    @if(Request::route()->getName() == 'user.ReferralList.myReferral')
        @include('_includes.network_nav')
    @elseif(Request::route()->getName() == 'user.report.ReferralList.myReferral')
        @include('_includes.reports_nav')
    @endif
    <div class="heading" style="margin-top: 50px">
        <h3>{{ _mt('General-ReferralList','ReferralList.referralList') }}</h3>
    </div>
    <div class="referralListWrapper" data-user="{{ $user->id }}">
        <div class="summaryData row" style="margin-bottom: 15px;">
            <div class="col-md-6">
                <div class="referralSummary">
                    <!-- STAT -->
                    <div class="row list-separated profile-stat">
                        <div class="col-md-6 col-sm-6 col-xs-12 refCountFirst">
                            <div class="uppercase profile-stat-title alignCenter" >
                                <b>{{ _mt('General-ReferralList','ReferralList.Total') }}</b></div>
                            <div class="uppercase profile-stat-text alignCenter"> {{ $downlines->count() }} </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 refCountSecond">
                            <div class="uppercase profile-stat-title alignCenter">
                                <b>{{ _mt('General-ReferralList','ReferralList.Today') }}</b></div>
                            <div class="uppercase profile-stat-text alignCenter"> {{ $todayJoined }} </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 refCountSecond">
                            <div class="uppercase profile-stat-title alignCenter">
                                <b>{{ _mt('General-ReferralList','ReferralList.thisMonth') }}</b></div>
                            <div class="uppercase profile-stat-text alignCenter"> {{ $thisMonthJoined }} </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 refCountFirst">
                            <div class="uppercase profile-stat-title alignCenter">
                                <b>{{ _mt('General-ReferralList','ReferralList.thisYear') }}</b></div>
                            <div class="uppercase profile-stat-text alignCenter"> {{ $thisYearJoined }} </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="chartContainer" class="chartContainer"></div>
            </div>
        </div>
        <div class="referralListContainer">

        </div>
    </div>
    <script>
        'use strict';

        $('body').on('click', '.paginationWrapper .pagination li a', function (e) {
            e.preventDefault();
            var route = $(this).attr('href');
            loadRefferalList(route);
        });

        $(function () {
            loadRefferalGraph();
        });

        function loadRefferalGraph() {
            simulateLoading('.chartContainer');
            var id = '{{ $user->id }}'
            var options = {id: id}
            $.post('{{ route(strtolower(getScope()).'.ReferralList.graph') }}', options, function (response) {
                $('.chartContainer').html(response);
            }).done(function () {
                loadRefferalList();
            });
        }

        function loadRefferalList(route) {
            simulateLoading('.referralListContainer');
            route = route ? route : '{{ route(strtolower(getScope()).'.ReferralList.list') }}';
            var id = '{{ $user->id }}';
            var options = {id: id}
            $.post(route, options, function (response) {
                $('.referralListContainer').html(response);
            });
        }
    </script>
@endsection
