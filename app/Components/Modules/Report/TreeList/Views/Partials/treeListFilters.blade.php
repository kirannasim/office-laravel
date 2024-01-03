<form class="filterForm">
    <div class="row">
        <div class="filters ">
            <div class="eachFilter operation col-md-3 col-sm-3">
                <label>{{ _mt($moduleId, 'TreeList.user') }}</label>
                <input type="text" class="userFiller" placeholder="Enter user name"/>
                <input type="hidden" name="filters[user_id]" id="user_id">
            </div>
            <div class="eachFilter operation col-md-3 col-sm-3">
                <label>{{ _mt($moduleId, 'TreeList.rank') }}</label>
                    <select name="filters[type]" id="rank_id" class="form-control rankFiller">
                        <option value=""> Select rank ...</option>
                        @foreach($ranks as $key=>$value)
                            <option value="{{ $value }}">{{ $key }}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'TreeList.country') }}</label>
            <select name="filters[country_ids][]" id="country_ids" class="form-control"   multiple="multiple" >
                <option value=""> {{ _mt($moduleId, 'TreeList.select_country') }}</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="filters ">
            <div class="eachFilter operation col-md-3 col-sm-3">
                <label>{{ _mt($moduleId, 'TreeList.member_id') }}</label>
                <input type="text" name="filters[memberId]" placeholder="Enter Member ID"/>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="eachFilter operation col-md-3 col-sm-3">
            <button type="button" class="btn dark filterRequest ladda-button" data-style="contract">
                <i class="fa fa-filter"></i>{{ _mt($moduleId, 'TreeList.filter') }}
            </button>
        </div>
    </div>

</form>
<script>
    'use strict';

    $(function () {

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


        //fetch downline table while filter is clicked
        $('.filterRequest').click(function () {
            fetchTreeList();
        });

        Ladda.bind('.ladda-button');

        $('.clearFilter').click(function () {
            loadreportFilters();
        });
    })
</script>
