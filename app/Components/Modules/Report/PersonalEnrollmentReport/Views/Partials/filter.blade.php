<form class="filterForm">
    <div class="filters row">
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'PersonalEnrollmentReport.type') }}</label>
            <select name="filters[type]">
                <option value="affiliate">Affiliates</option>
                <option value="ib">IB</option>
                <option value="client">Clients</option>
            </select>
        </div>

        <div class="eachFilter operation col-md-3 col-sm-3">
            <button type="button" class="btn dark filterRequest ladda-button" data-style="contract">
                <i class="fa fa-filter"></i>{{ _mt($moduleId, 'PersonalEnrollmentReport.filter') }}
            </button>
            {{--<button type="button" class="btn dark clearFilter ladda-button" data-style="contract">--}}
            {{--<i class="fa fa-refresh"></i>{{ _mt($moduleId, 'JoiningReport.reset') }}--}}
            {{--</button>--}}
        </div>
    </div>
</form>

<style>
    @media (max-width: 767px) {
        .reportFilters .eachFilter.operation.col-md-3.col-sm-3 {
            width: 50%;
            float: left;
        }
    }

    @media (max-width: 480px) {
        .reportFilters .eachFilter.operation.col-md-3.col-sm-3 {
            width: 100%;
            float: none;
        }

        .reportFilters .filters .eachFilter button {
            margin: 10px 0px;
        }
    }
</style>
<script>
    "use strict";
    $(function () {
        Ladda.bind('.ladda-button');

        //fetch report table while filter is clicked
        $('.filterRequest').click(function () {
            fetchPersonalEnroleeReport();
        });

        // $('.clearFilter').click(function () {
        //     fetchIbEnroleeReport();
        // });

        //select2
        $('select').select2({});
    });
</script>
