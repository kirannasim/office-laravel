@foreach($scripts as $script)
    <script src="{{ $script }}" type="text/javascript"></script>
@endforeach
<div class="cacheManager">
    <h3>Cache stats</h3>
    <div class="cacheGraphHolder"></div>
    <div class="stats">
        @foreach($graph as $item)
            <div class="eachStat"><label>{{ $item['name'] }}</label><span>{{ $item['y'] }} {{ $options['as'] }}</span>
            </div>
        @endforeach
    </div>
    <div class="actions">
        <div class="btn-group refreshCache">
            <button type="button" class="btn blue ladda-button refreshCacheInit" data-style="contract">
                <i class="fa fa-refresh"></i> Refresh
            </button>
            <button type="button" class="btn blue dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-angle-down"></i>
                <span class="sr-only">Refresh</span>
            </button>
            <div class="dropdown-menu" x-placement="top-start">
                @foreach($graph as $item)
                    <div class="dropdown-item">
                        <label>{{ $item['name'] }}</label>
                        <input type="checkbox" checked name="{{ $item['name'] }}" class="icheck">
                    </div>
                @endforeach
            </div>
        </div>
        <div class="btn-group clearCache">
            <button type="button" class="btn red ladda-button clearCacheInit" data-style="contract">
                <i class="fa fa-trash"></i> Clear
            </button>
            <button type="button" class="btn red dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-angle-down"></i>
                <span class="sr-only">Clear</span>
            </button>
            <div class="dropdown-menu pull-right" x-placement="top-start">
                @foreach($graph as $item)
                    <div class="dropdown-item">
                        <label>{{ $item['name'] }}</label>
                        <input type="checkbox" checked name="{{ $item['name'] }}" class="icheck">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    "use strict";

    function clearCache(target) {
        return $.post('{{ route('optimizer.cache.clear') }}', {target: target}, function (response) {
            refreshCachePartial();
        }).fail(function (response) {
            Ladda.stopAll();
        });
    }

    function refreshCache(target) {
        return $.post('{{ route('optimizer.cache.refresh') }}', {target: target}, function (response) {
            refreshCachePartial();
        }).fail(function (response) {
            Ladda.stopAll();
        });
    }

    $(function () {
        Ladda.bind('.ladda-button');
        //i-check
        $('.cacheManager .icheck').iCheck({
            checkboxClass: 'icheckbox_minimal',
            radioClass: 'iradio_minimal',
            increaseArea: '20%' // optional
        });

        $('.clearCacheInit').click(function () {
            var repos = {!! json_encode(collect($graph)->pluck('name')) !!};
            var target = [];

            repos.forEach(function (value, index) {
                if ($('.clearCache [name="' + value + '"]').prop('checked'))
                    target.push(value);
            });

            clearCache(target);
        });

        $('.refreshCacheInit').click(function () {
            var repos = {!! json_encode(collect($graph)->pluck('name')) !!};
            var target = [];

            repos.forEach(function (value, index) {
                if ($('.clearCache [name="' + value + '"]').prop('checked'))
                    target.push(value);
            });

            refreshCache(target);
        });

        $('.cacheGraphHolder').highcharts({
            chart: {
                backgroundColor: '',
                tooltip: {
                    pointFormat: 'mb'
                },
                height: 250,
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: ''
            },
            plotOptions: {
                pie: {
                    innerSize: 35,
                    depth: 30,
                    tooltip: {
                        valueSuffix: ' {{ $options['as'] }}'
                    },
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b> {point.y} {{ $options['as'] }}',
                        style: {
                            color: '#eee',
                            'textShadow': '',
                            'textOutline': ''
                        }
                    }
                }
            },
            series: [{
                name: 'Cache status',
                data: {!! json_encode($graph) !!},
                showInLegend: true
            }],
            legend: {
                itemStyle: {
                    color: '#eee'
                }
            }
        });
    });
</script>