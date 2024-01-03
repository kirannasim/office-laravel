<form class="filterForm">
    <div class="row">
        <div class="filters eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'InfluencersReport.user') }}</label>
            <input type="text" class="userFiller" placeholder="Enter user name"/>
            <input type="hidden" name="filters[user_id]" id="user_id">
        </div>
        <div class="filters eachFilter operation col-md-3">
            <label>{{ _mt($moduleId,'InfluencersReport.sponsor') }}</label>
            <input type="text" class="sponsorFiller" placeholder="Enter sponsor name"/>
            <input type="hidden" name="filters[sponsor_id]" id="sponsor_id">
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'InfluencersReport.country') }}</label>
            <select name="filters[country_ids][]" id="country_ids" class="form-control"  multiple="multiple" >
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="filters eachFilter operation col-md-3 col-sm-3">
            <button type="button" class="btn dark filterRequest ladda-button" data-style="contract">
                <i class="fa fa-filter"></i>{{ _mt($moduleId, 'InfluencersReport.filter') }}
            </button>
            <button type="button" class="btn dark clearFilter ladda-button" data-style="contract">
                <i class="fa fa-refresh"></i>{{ _mt($moduleId, 'InfluencersReport.reset') }}
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
            fetchInfluncersReport();
        });

        $('.clearFilter').click(function () {
            loadreportFilters();
        });

        $('#country_ids').select2({
            // multiple:true,
            placeholder: "Select a country",
            // allowClear: true
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


        // Ladda.bind('.ladda-button');
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
