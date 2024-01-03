<form class="filterForm">
    <div class="filters row">
        <div class="eachFilter operation col-md-3">
            <label>{{ _mt($moduleId,'AccountStatus.user') }}</label>
            <input type="text" class="userFiller" placeholder="Enter user name"/>
            <input type="hidden" name="filters[user_id]" id="user_id">
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'AccountStatus.member_id') }}</label>
            <input type="text" name="filters[memberId]" placeholder="Enter Member ID"/>
        </div>
        <div class="eachFilter operation col-md-3">
            <label>{{ _mt($moduleId,'AccountStatus.date') }}</label>
            <input type="text" class="joinDate" value="" name="filters[date]"/>
        </div>

        <div class="eachFilter operation col-md-3">
            <button type="button" class="btn dark filterRequest ladda-button" data-style="contract">
                <i class="fa fa-filter"></i>{{ _mt($moduleId,'AccountStatus.filter') }}
            </button>
            <button type="button" class="btn dark clearFilter ladda-button" data-style="contract">
                <i class="fa fa-refresh"></i>{{ _mt($moduleId, 'AccountStatus.reset') }}
            </button>
        </div>
    </div>
</form>

<script>
    'use strict';

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


        //fetch report table while filter is clicked
        $('.filterRequest').click(function () {
            fetchAccountStatusReport();
        });
        $('.clearFilter').click(function () {
            loadreportFilters();
        });

        // Ladda.bind('.ladda-button');

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
