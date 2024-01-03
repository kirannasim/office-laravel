<form class="filterForm">
    <div class="filters row">
        <div  class="eachFilter col-md-2 col-sm-2">
            <label> Select Date </label>
            <input class="form-control" name="dates" id="dates" placeholder="MM.YYYY.DD"   >
            <input type="hidden" name="filters[dateStart]" id="dateStart" value="">
            <input type="hidden" name="filters[dateEnd]" id="dateEnd" value="">
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'PackageSalesReport.select_country') }}</label>
            <select name="filters[country][]"  multiple="multiple">
                <option value="">{{ _mt($moduleId,'PackageSalesReport.select') }}</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}"> {{ $country->name }} </option>
                @endforeach
            </select>
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <button type="button" class="btn dark filterRequest ladda-button" data-style="contract">
                <i class="fa fa-filter"></i>{{ _mt($moduleId, 'PackageSalesReport.filter') }}
            </button>
            <button type="button" class="btn dark clearFilter ladda-button" data-style="contract">
                <i class="fa fa-refresh"></i>{{ _mt($moduleId, 'PackageSalesReport.reset') }}
            </button>
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
    "use strict"
    $(function () {
        Ladda.bind('.ladda-button');

        $('select').select2({
            placeholder: "Select a country",
        });

        if($('input[name="dates"]').length > 0){
            $('input[name="dates"]').daterangepicker({
                keepEmptyValues: true,
                autoUpdateInput: false
            }, function(start_date,end_date) {
                let chosen_date = start_date.format('YYYY-MM-DD')+' - '+end_date.format('YYYY-MM-DD');
                $("#dates").val(chosen_date);
            });
        }

        //fetch report table while filter is clicked
        $('.filterRequest').click(function () {
            if ($('input[name="dates"]').length>0) {
                if ($("#dates").val() != '') {
                    document.getElementById('dateStart').value = ($("#dates").data('daterangepicker').startDate);
                    document.getElementById('dateEnd').value = ($("#dates").data('daterangepicker').endDate);
                } else {
                    document.getElementById('dateStart').value = '';
                    document.getElementById('dateEnd').value = '';
                }
            }
            fetchPackageSalesReport();
        });

        $('.clearFilter').click(function () {
            loadreportFilters();
        });

    });
</script>
