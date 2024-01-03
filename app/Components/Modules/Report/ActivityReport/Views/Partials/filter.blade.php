<form class="filterForm">
    <div class="filters row">
        @if(getScope() == 'admin')
            <div class="eachFilter operation col-md-3 col-sm-3">
                <label>{{ _mt($moduleId, 'ActivityReport.user') }}</label>
                <input type="text" class="userFiller" placeholder="Enter user name"/>
                <input type="hidden" name="filters[user_id]" id="user_id">
            </div>
        @endif
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'ActivityReport.activity') }}</label>
            <select name="filters[activity_id]">
                <option value="">{{ _mt($moduleId,'ActivityReport.all') }}</option>
                @foreach($activities as $activity)
                    <option value="{{ $activity->id }}"> {{ ucfirst(trim(preg_replace(['/Member/','/member/'], '', $activity->description))) }} </option>
                @endforeach
            </select>
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'ActivityReport.member_id') }}</label>
            <input type="text" class="form-control" name="filters[memberId]" placeholder="Member ID"/>
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'ActivityReport.date') }}</label>
            <input type="text" class="joinDate" value="" name="filters[date]"/>
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <button type="button" class="btn dark filterRequest ladda-button" data-style="contract">
                <i class="fa fa-filter"></i>{{ _mt($moduleId, 'ActivityReport.filter') }}
            </button>
            <button type="button" class="btn dark clearFilter ladda-button" data-style="contract">
                <i class="fa fa-refresh"></i>{{ _mt($moduleId, 'ActivityReport.reset') }}
            </button>
        </div>
    </div>
</form>

<script>
    "use strict"
    $(function () {

        Ladda.bind('.ladda-button')

        //fetch report table while filter is clicked
        $('.filterRequest').click(function () {
            fetchActivityReport();
        });

        $('.clearFilter').click(function () {
            loadreportFilters();
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
    });
</script>
<style>
    @media (max-width: 991px) {
        .eachFilter.operation.col-md-3.col-sm-3:last-child {
            width: 50%;
        }
    }

    @media (max-width: 767px) {
        .reportFilters .eachFilter.operation.col-md-3.col-sm-3 {
            width: 50%;
            float: left;
        }
    }

    @media (max-width: 480px) {
        .reportFilters .eachFilter.operation.col-md-3.col-sm-3 {
            width: 100% !important;
            float: none;
        }

        .reportFilters .filters .eachFilter button {
            margin: 10px 0px;
        }
    }

    @media (max-width: 360px) {
        .reportOptions button.btn {
            margin-right: 0px;
            margin-bottom: 5px;
        }
    }
</style>
