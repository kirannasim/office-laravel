@foreach($scripts as $script)
    <script type="text/javascript" src="{{ $script }}"></script>
@endforeach
@foreach($styles as $style)
    <link href="{{ $style }}" rel="stylesheet" type="text/css"/>
@endforeach
<form class="filterForm">
    <div class="filters row">
        <div class="eachFilter operation col-md-3">
            <label>{{ _mt($moduleId, 'Payout.Status') }}</label>
            <select name="filters[status]">
                @foreach($statuses  as $status)
                    <option value="{{ $status->id }}">{{ $status->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="eachFilter operation col-md-3">
            <label>{{ _mt($moduleId, 'Payout.from_date') }}</label>
            <input type="text" class="date" value="" name="filters[from_date]"/>
        </div>
        <div class="eachFilter operation col-md-3">
            <label>{{ _mt($moduleId, 'Payout.to_date') }}</label>
            <input type="text" class="date" value="" name="filters[to_date]"/>
        </div>
        <div class="eachFilter operation col-md-3">
            <button type="button" class="btn dark filterRequest ladda-button" data-style="contract">
                <i class="fa fa-filter"></i>{{ _mt($moduleId, 'Payout.filter') }}
            </button>
        </div>
    </div>
</form>
<div class="listContainer"></div>

<script>
    "use strict";

    $(function () {
        fetchRequestList();
    });

    $(function () {

        Ladda.bind('.ladda-button');

        $('.filterRequest').click(function () {
            fetchRequestList();
        });

        $('.date').datepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            autoApply: true,
            autoUpdateInput: true
        });

        //select2
        $('select').select2({});
    });

    function fetchRequestList(route) {
        simulateLoading('.listContainer')
        route = route ? route : '{{ scopeRoute('payout.requestList') }}';
        $.post(route, $('.filterForm').serialize(), function (response) {
            $('.listContainer').html(response);
            Ladda.stopAll();
        })
    }
</script>