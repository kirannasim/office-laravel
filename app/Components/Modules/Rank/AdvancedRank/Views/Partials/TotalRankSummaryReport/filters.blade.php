<form class="filterForm" >
    <div class="row">
        <div class="eachFilter operation col-md-3">
            <label>{{ _mt($moduleId, 'AdvancedRank.country') }}</label>
            <select name="filters[country_ids][]" id="country_ids" class="form-control"  multiple="multiple" >
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="filters">
            <div class="eachFilter operation col-md-3">
                <label>{{ _mt($moduleId, 'AdvancedRank.Status') }}</label>
                <select name="filters[status]" id="status" class="form-control" size="1">
                    <option value=""> {{ _mt($moduleId, 'AdvancedRank.All') }}</option>
                    <option value="1"> {{ _mt($moduleId, 'AdvancedRank.active_only') }}</option>
                    <option value="0"> {{ _mt($moduleId, 'AdvancedRank.inactive') }}</option>
                </select>
            </div>
            <div class="eachFilter operation col-md-4">
                <button type="button" class="btn dark filterRequest ladda-button" data-style="contract">
                    <i class="fa fa-filter"></i>{{ _mt($moduleId,'AdvancedRank.filter') }}
                </button>
                <button type="button" class="btn dark clearFilter ladda-button" data-style="contract">
                    <i class="fa fa-filter"></i>{{ _mt($moduleId,'AdvancedRank.reset') }}
                </button>
            </div>
        </div>
    </div>

</form>

<script>
    'use strict';

    $(function () {

        Ladda.bind('.ladda-button');
        $('#country_ids').select2({
            // multiple:true,
            placeholder: "Select a country",
            // allowClear: true
        });
        //fetch report table while filter is clicked
        $('.filterRequest').click(function () {
            fetchTotalRankSummary();
        });
        $('.clearFilter').click(function () {
            loadreportFilters();
        });
    });
</script>