<form class="filterForm">
    <div class="row">
        <div class="col-md-7">
            <div class="filters row">
                <div class="eachFilter operation col-md-4">
                    <label>{{ _mt($moduleId,'AdvancedRank.user') }}</label>
                    <input type="text" class="userFiller" placeholder="{{ _mt($moduleId,'AdvancedRank.enter_username') }}"/>
                    <input type="hidden" name="filters[user_id]" id="user_id">
                </div>
                <div class="eachFilter operation col-md-4">
                    <label>{{ _mt($moduleId, 'AdvancedRank.date') }}</label>
                    <input type="text" class="joinDate" value="" name="filters[date]"/>
                </div>
                <div class="eachFilter operation col-md-4">
                    <label>{{ _mt($moduleId, 'AdvancedRank.member_id') }}</label>
                    <input type="text" name="filters[memberId]" placeholder="Enter Member ID"/>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="eachFilter operation">
                        <label>{{ _mt($moduleId,'AdvancedRank.rank') }}</label>
                        <select name="filters[ranks][]" id="ranks_ids" style="width: 100%"  multiple="multiple">
                            @foreach($default_filter['ranks'] as $rank)
                                <option value="{{ $rank->id }}"> {{ $rank->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="eachFilter operation">
                        <label>{{ _mt($moduleId,'AdvancedRank.country') }}</label>
                        <select name="filters[countries][]" id="country_ids" multiple="multiple">
                            @foreach($default_filter['countries'] as $country)
                                <option value="{{ $country->id }}"> {{ $country->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="eachFilter operation">
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
    "use strict";
    $(function () {

        Ladda.bind('.ladda-button');
        $('.joinDate').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            startDate: '{{ $default_filter['startDate'] }}',
                endDate:   '{{ $default_filter['endDate']   }}',
            autoApply: true,
            autoUpdateInput: true
        });

        $('#ranks_ids').select2({
            placeholder: "Select a rank",
        });

        $('#country_ids').select2({
            placeholder: "Select a country",
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
            fetchRankReport();
        });

        $('.clearFilter').click(function () {
            loadreportFilters();
        });
    });
</script>