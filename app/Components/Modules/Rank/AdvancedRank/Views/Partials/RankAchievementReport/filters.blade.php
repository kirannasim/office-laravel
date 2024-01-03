<form class="filterForm">
    <div class="row">
        <div class="col-md-3 col-sm-3">
            <div class="filters eachFilter operation">
                <label>{{ _mt($moduleId,'AdvancedRank.user') }}</label>
                <input type="text" class="userFiller" placeholder="{{ _mt($moduleId,'AdvancedRank.enter_username') }}"/>
                <input type="hidden" name="filters[user_id]" id="user_id">
            </div>
        </div>
        <div class="col-md-3 col-sm-3">
            <div class="filters row eachFilter operation">
                <label>{{ _mt($moduleId,'AdvancedRank.rank') }}</label>
                <select name="filters[rank]">
                    <option value=""> {{ _mt($moduleId,'AdvancedRank.all') }} </option>
                    @foreach($default_filter['ranks'] as $rank)
                        <option value="{{ $rank->id }}"> {{ $rank->name }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3 col-sm-3">
            <div class="filters eachFilter operation">
                <label>{{ _mt($moduleId, 'AdvancedRank.member_id') }}</label>
                <input type="text" name="filters[memberId]" placeholder="Enter Member ID"/>
            </div>
        </div>
        <div class="col-md-3 col-sm-3">
            <div class="eachFilter operation">
                <label>{{ _mt($moduleId,'AdvancedRank.country') }}</label>
                <select name="filters[country_ids][]" id="country_ids" class="form-control"   multiple="multiple" >
                    <option value=""> {{ _mt($moduleId,'AdvancedRank.select') }} </option>
                    @foreach($default_filter['countries'] as $country)
                        <option value="{{ $country->id }}"> {{ $country->name }} </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-3 col-sm-3">
            <div class="filters eachFilter operation">
                <label>{{ _mt($moduleId, 'AdvancedRank.date') }}</label>
                <input type="text" class="date" value="" name="filters[date]"/>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-3 col-sm-3">
            <div class="eachFilter operation">
                <button type="button" class="btn dark filterRequest ladda-button" data-style="contract">
                    <i class="fa fa-filter"></i>{{ _mt($moduleId,'AdvancedRank.filter') }}
                </button>
                <button type="button" class="btn dark clearFilter ladda-button" data-style="contract">
                    <i class="fa fa-refresh"></i>{{ _mt($moduleId,'AdvancedRank.reset') }}
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
            fetchRankAchievementReport();
        });

        $('.clearFilter').click(function () {
            loadreportFilters();
        });


        $('.date').daterangepicker({
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