<form class="filterForm">
    <div class="filters row">
        <div class="eachFilter operation col-md-3">
            <label>{{ _mt($moduleId,'ChangePlacement.user') }}</label>
            <input type="text" class="userFiller" placeholder="Enter user name"/>
            <input type="hidden" name="filters[user_id]" id="user_id">
        </div>
        <div class="eachFilter operation col-md-3">
            <label>{{ _mt($moduleId,'ChangePlacement.sponsor') }}</label>
            <input type="text" class="sponsorFiller" placeholder="Enter sponsor name"/>
            <input type="hidden" name="filters[sponsor_id]" id="sponsor_id">
        </div>
        <div class="eachFilter operation col-md-3">
            <label>{{ _mt($moduleId,'ChangePlacement.date') }}</label>
            <input type="text" class="joinDate" value="" name="filters[date]"/>
        </div>
        <div class="eachFilter operation col-md-3">
            <button type="button" class="btn dark filterRequest ladda-button" data-style="contract">
                <i class="fa fa-filter"></i>{{ _mt($moduleId,'ChangePlacement.filter') }}
            </button>
            <button type="button" class="btn dark clearFilter ladda-button" data-style="contract">
                <i class="fa fa-refresh"></i>{{ _mt($moduleId, 'ChangePlacement.reset') }}
            </button>
        </div>
    </div>
</form>

<script>
    "use strict"

    $(function () {
        Ladda.bind('.ladda-button');
        //User fetcher
        var selectedCallback = function (target, id, name) {
            $('.userFiller').val(name);
            $('#user_id').val(id);
        };
        var options = {
            target: '.userFiller',
            route: '{{ route("user.api") }}',
            action: 'getUsers',
            name: 'username',
            selectedCallback: selectedCallback,
            clearCallback: function (element) {
                element.siblings('input[name="filters[user_id]"]').val('')
            }
        };
        $('.userFiller').ajaxFetch(options);

        //sponsor fetcher
        var selectedCallback = function (target, id, name) {
            $('.sponsorFiller').val(name);
            $('#sponsor_id').val(id);
        };
        var options = {
            target: '.userFiller',
            route: '{{ route("user.api") }}',
            action: 'getSponsors',
            name: 'username',
            selectedCallback: selectedCallback,
            clearCallback: function (element) {
                element.siblings('input[name="filters[sponsor_id]"]').val('')
            }
        };
        $('.sponsorFiller').ajaxFetch(options);

        //fetch report table while filter is clicked
        $('.filterRequest').click(function () {
            fetchPlacementChangeReport();
        });

        $('.clearFilter').click(function () {
            loadreportFilters();
        });

        // Ladda.bind('.ladda-button');

        //initialize date range picker
        $('.joinDate').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            startDate: '{{ $default_filter['startDate'] }}',
            endDate: '{{ $default_filter['endDate'] }}',
            autoApply: true,
            autoUpdateInput: true
        });
    })
</script>
