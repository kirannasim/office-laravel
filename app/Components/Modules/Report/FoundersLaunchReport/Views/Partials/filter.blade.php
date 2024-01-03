<!-- @if ('admin' == getScope())
    <form class="filterForm">
        <div class="filters row">
            <div class="eachFilter operation col-md-3 col-sm-3">
                <label>{{ _mt($moduleId, 'FoundersLaunchReport.email') }}</label>
                <input type="text" class="userFiller" placeholder="Enter email"/>
                <input type="hidden" name="user" id="user_id">
            </div>
            <div class="eachFilter operation col-md-3 col-sm-3">
                <button type="button" class="btn dark filterRequest ladda-button" data-style="contract">
                    <i class="fa fa-filter"></i>{{ _mt($moduleId, 'FoundersLaunchReport.filter') }}
                </button>
            </div>
        </div>
    </form>
@endif -->
<script>
    'use strict';
    $(function () {


        //fetch downline table while filter is clicked
        // $('.filterRequest').click(function () {
            fetchfoundersLaunchReport();
        // });

        // Ladda.bind('.ladda-button');

        // $('.clearFilter').click(function () {
        //     loadreportFilters();
        // });
    })
</script>
