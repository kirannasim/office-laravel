<form class="filterForm">
    <div class="filters row">
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'EmailBroadCasting.user') }}</label>
            <input type="text" class="userFiller"
                   placeholder="{{ _mt($moduleId,'EmailBroadCasting.Enter_user_name') }}">
            <input type="hidden" name="filters[user_id]" id="user_id">
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'EmailBroadCasting.email') }}</label>
            <input type="text" name="filters[email]" placeholder="{{ _mt($moduleId,'EmailBroadCasting.Enter_Email') }}">
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'EmailBroadCasting.firstname') }}</label>
            <input type="text" name="filters[firstname]"
                   placeholder="{{ _mt($moduleId,'EmailBroadCasting.Enter_First_name') }}">
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'EmailBroadCasting.lastname') }}</label>
            <input type="text" name="filters[lastname]"
                   placeholder="{{ _mt($moduleId,'EmailBroadCasting.Enter_Last_name') }}">
        </div>
    </div>
    <div class="row filters">
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'EmailBroadCasting.joining_date') }}</label>
            <input type="text" class="joinDate" value="" name="filters[date]"/>
        </div>
        <div class="eachFilter operation col-md-5 col-sm-5 filterActions">
            <button type="button" class="btn dark filterRequest ladda-button" data-style="contract">
                <i class="fa fa-filter"></i>{{ _mt($moduleId, 'EmailBroadCasting.filter') }}
            </button>
            <button type="button" class="btn dark clearFilter ladda-button" data-style="contract">
                <i class="fa fa-refresh"></i>{{ _mt($moduleId, 'EmailBroadCasting.reset') }}
            </button>
        </div>
    </div>
</form>
<style>
    @media (max-width: 767px) {
        .userFilters .eachFilter.operation.col-md-3.col-sm-3 {
            width: 50%;
            float: left;
        }
    }

    @media (max-width: 480px) {
        .userFilters .eachFilter.operation.col-md-3.col-sm-3 {
            width: 100%;
            float: none;
        }

        .userFilters .filters .eachFilter button {
            margin: 10px 0px;
        }
    }

    .userFilters .filters.row input {
        min-height: 35px;
        width: 100%;
        margin-bottom: 15px;
        border: solid 1px #eee;
        padding: 5px 10px;
    }
</style>
<script>
    "use strict";
    $(function () {
        $('select').select2({
            width: '100%'
        });
        Ladda.bind('.ladda-button');

        //fetch report table while filter is clicked
        $('.filterRequest').click(function () {
            fetchUserTable();
        });

        $('.clearFilter').click(function () {
            loaduserFilters();
        });

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

        $('.joinDate').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            startDate: '{{ $default_filter['startDate'] }}',
            endDate: '{{ $default_filter['endDate'] }}',
            autoApply: true,
            autoUpdateInput: true
        });
    });
</script>