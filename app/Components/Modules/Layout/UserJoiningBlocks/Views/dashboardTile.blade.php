@foreach($styles as $style)
    {!! $style !!}
@endforeach
@foreach($scripts as $script)
    {!! $script !!}
@endforeach
@php
    $businessBlockLabels = [
        'today' => _mt($moduleId, 'UserJoiningBlocks.today'),
        'week' => _mt($moduleId, 'UserJoiningBlocks.this_week'),
        'month' => _mt($moduleId, 'UserJoiningBlocks.this_month'),
        'year' => _mt($moduleId, 'UserJoiningBlocks.this_year'),
        'all' => _mt($moduleId, 'UserJoiningBlocks.all_time'),
    ];
    $usersTypeLabel = [
        'normal' => _mt($moduleId, 'UserJoiningBlocks.all_joinings'),
        'descendants' => _mt($moduleId, 'UserJoiningBlocks.my_downlines'),
        'referral' => _mt($moduleId, 'UserJoiningBlocks.my_referral'),
    ];
@endphp
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2 statInner" data-target="joining">
        <div class="dropdown filterGroup dateFilter filterGear" data-block="joining">
            <div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <i class="icon-settings"></i>
            </div>
            <ul class="dropdown-menu dropdown-menu-default pull-right">
                <li data-from="{{ \Carbon\Carbon::today() }}" data-filter="today" data-groupBy="hour"
                    class="{{ ($filterBy == 'today') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i>{{ _mt($moduleId, 'UserJoiningBlocks.today') }}</a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfWeek() }}" data-filter="week" data-groupBy="day"
                    class="{{ ($filterBy == 'week') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'UserJoiningBlocks.this_week') }}</a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfMonth() }}" data-filter="month" data-groupBy="day"
                    class="{{ ($filterBy == 'month') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'UserJoiningBlocks.this_month') }}</a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfYear() }}" data-filter="year" data-groupBy="month"
                    class="{{ ($filterBy == 'year') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'UserJoiningBlocks.this_year') }}</a>
                </li>
                <li data-from="" data-filter="all" data-groupBy="year"
                    class="{{ ($filterBy == 'all') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'UserJoiningBlocks.all_time') }}</a>
                </li>
            </ul>
        </div>
        <div class="display">
            <div class="number dropdown">
                <h3 class="font-blue-sharp">
                    <span class="counter" data-value="{{ $total }}"></span>
                </h3>
                <small class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    {{ $usersTypeLabel[$usersType] }} <span>({{ $businessBlockLabels[$filterBy] }})</span>
                    <i class="fa fa-angle-down"></i>
                </small>
                <ul class="dropdown-menu dropdown-menu-default pull-right allOrDescendants"
                    data-usertype="{{ $usersType }}">
                    @if(strtolower(getScope()) == 'user')
                        <li data-userType="{{ $usersType == 'referral' ? 'descendants' : 'referral' }}">
                            <a href="#">
                                {{ $usersTypeLabel[($usersType == 'referral') ? 'descendants' : 'referral'] }}
                            </a>
                        </li>
                    @else
                        <li data-userType="{{ $usersType == 'normal' ? 'descendants' : 'normal' }}">
                            <a href="#">
                                {{ $usersTypeLabel[($usersType == 'normal') ? 'descendants' : 'normal'] }}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
        </div>
        <div class="progress-info">
            <div class="progress">
                    <span style="width: {{ $progress }}%;" class="progress-bar progress-bar-success blue-sharp">
                    </span>
            </div>
            {{-- <div class="status">
                 <div class="status-title">{{ _mt($moduleId, 'UserJoiningBlocks.progress') }}
                     <div class="difference">
                         (<span class="grantTotal">{{ _mt($moduleId, 'UserJoiningBlocks.total') }} {{ $grandTotal }}</span>
                         - <span
                                 class="target">{{ _mt($moduleId, 'UserJoiningBlocks.target') }} {{ $target }}</span>)
                     </div>
                 </div>
                 <div class="status-number"> {{ $progress }}%</div>
             </div>--}}
        </div>
        <canvas class="userJoiningGraphHolder chartjs-render-monitor" data-graph="joining"></canvas>
        <input type="hidden" class="usersGraphLabels" value="{{ $graph->keys() }}">
        <input type="hidden" class="usersGraphData" value="{{ $graph->values() }}">
    </div>
</div>


<script type="text/javascript">
    "use strict";

    function userGraphOptions() {
        return {
            dataSetLabel: "{{ _mt($moduleId, 'UserJoiningBlocks.total_joinings') }}",
            element: '.userJoiningGraphHolder[data-graph="joining"]',
            labels: JSON.parse($('.usersGraphLabels').val()),
            data: JSON.parse($('.usersGraphData').val())
        };
    }

    // Load wallets block with filters
    function loadUser(options, me, returnOptions) {
        var block = 'joining';
        var userBlock = $('.statInner[data-target="' + block + '"]');
        var defaults = {usersType: userBlock.find('.allOrDescendants').data('usertype')};
        var postData = $.extend({}, defaults, options);

        if (returnOptions) return postData;

        loadBlock(postData, block, me, function () {
            setupBusinessBlockSummaryGraph(userGraphOptions());
            countupStats(userBlock.find('.counter')[0], 0, userBlock.find('.counter').data('value'));
        });
    }

    $(function () {
        setupBusinessBlockSummaryGraph(userGraphOptions());
        $('.businessInfo .counter').each(function () {
            countupStats(this, 0, $(this).data('value'));
        });
        applyWindowCallback(function (block) {
            switch (block) {
                case 'joining':
                    setupBusinessBlockSummaryGraph(userGraphOptions());
                    $('.businessInfo .statInner[data-target="joining"] .counter').each(function () {
                        countupStats(this, 0, $(this).data('value'));
                    });
                    return;
                    break;
                default:
                    return;
                    break;
            }
        }, 'bizBlockChangeCallbacks');

        applyWindowCallback(function (element) {
            if (jQuerize(element).closest('.statInner').data('target') == 'joining') {
                return {usersType: $('.allOrDescendants').data('usertype')};
            }
        }, 'bizBlockParams');
    });

    // load users data on user type chooser
    $('body')
        .off('click', '.statInner[data-target="joining"] ul.allOrDescendants li')
        .on('click', '.statInner[data-target="joining"] ul.allOrDescendants li', function (e) {
            e.preventDefault();
            loadUser({usersType: $(this).data('usertype')}, $(this));
        });

</script>
