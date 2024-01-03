<form class="filterForm">
    <div class="row">
        <div class="filters">
            <div class="eachFilter operation col-md-3 col-sm-3">
                <label>{{ _mt($moduleId, 'JoiningReport.user') }}</label>
                <input type="text" class="userFiller" placeholder="Enter user name"/>
                <input type="hidden" name="filters[user_id]" id="user_id">
            </div>
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'JoiningReport.country') }}</label>
            <select name="filters[country_ids][]" id="country_ids" class="form-control"  multiple="multiple" >
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="filters">
            <div class="eachFilter operation col-md-3 col-sm-3">
                <label>{{ _mt($moduleId, 'JoiningReport.member_id') }}</label>
                <input type="text" class="memberIdFiller" placeholder="Enter Member ID"/>
                <input type="hidden" name="filters[customer_id]" id="member_id"/>
            </div>
            <div class="eachFilter operation col-md-3 col-sm-3">
                <label>{{ _mt($moduleId, 'JoiningReport.email') }}</label>
                <input type="text" name="filters[email]" placeholder="Enter Email"/>
            </div>
            <div class="eachFilter operation col-md-3 col-sm-3">
                <label>{{ _mt($moduleId, 'JoiningReport.joining_date') }}</label>
                <input type="text" class="joinDate" value="" name="filters[date]"/>
            </div>
            <div class="eachFilter operation col-md-3 col-sm-3">
                <label>{{ _mt($moduleId, 'JoiningReport.select_package') }}</label>
                <select name="filters[package]">
                    <option value="">{{ _mt($moduleId,'JoiningReport.select_package') }}</option>
                    @foreach($package as $pack)
                        <option value="{{ $pack->id }}"> {{ $pack->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="eachFilter operation col-md-3 col-sm-3">
                <button type="button" class="btn dark filterRequest ladda-button" data-style="contract">
                    <i class="fa fa-filter"></i>{{ _mt($moduleId, 'JoiningReport.filter') }}
                </button>
                <button type="button" class="btn dark clearFilter ladda-button" data-style="contract">
                    <i class="fa fa-refresh"></i>{{ _mt($moduleId, 'JoiningReport.reset') }}
                </button>
            </div>
        </div>
        {{--<div class="eachFilter operation col-md-3 col-sm-3">--}}
            {{--<label>{{ _mt($moduleId, 'JoiningReport.country') }}</label>--}}
            {{--<input type="text" class="countryFiller" placeholder="Enter country"/>--}}
            {{--<input type="hidden" name="filters[country_id]" id="country_id">--}}
        {{--</div>--}}
        {{-- <div class="eachFilter operation col-md-3 col-sm-3">
             <label>{{ _mt($moduleId, 'JoiningReport.firstname') }}</label>
             <input type="text" name="filters[firstname]" placeholder="Enter Firstname"/>
         </div>
         <div class="eachFilter operation col-md-3 col-sm-3">
             <label>{{ _mt($moduleId, 'JoiningReport.lastname') }}</label>
             <input type="text" name="filters[lastname]" placeholder="Enter Lastname"/>
         </div>--}}

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
        Ladda.bind('.ladda-button')

        $('#country_ids').select2({
            // multiple:true,
            placeholder: "Select a country",
            // allowClear: true
        });

        //fetch report table while filter is clicked
        $('.filterRequest').click(function () {
            fetchJoiningReport();
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





        {{--//Country fetcher--}}
        {{--var selectedCallbackCountry = function (target, id, name) {--}}

            {{--$('.countryFiller').val(name);--}}
            {{--$('#country_id').val(id);--}}
        {{--};--}}
        {{--var options = {--}}
            {{--target: '.countryFiller',--}}
            {{--route: '{{ route("user.api") }}',--}}
            {{--action: 'getCountries',--}}
            {{--name: 'name',--}}
            {{--selectedCallback: selectedCallbackCountry,--}}
            {{--clearCallback: function (element) {--}}
                {{--element.siblings('input[name="filters[country_id]"]').val('')--}}
            {{--}--}}
        {{--};--}}
        {{--$('.countryFiller').ajaxFetch(options);--}}


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





        //Member ID fetcher
        var selectedIdCallback = function (target, id, name) {

            $('.memberIdFiller').val(name);
            $('#member_id').val(name);

        };
        var options = {
            target: '.memberIdFiller',
            route: '{{ route("user.api") }}',
            action: 'getMembersId',
            name: 'customer_id',
            selectedCallback: selectedIdCallback,
            clearCallback: function (element) {
                element.siblings('input[name="filters[customer_id]"]').val('')
            }
        };
        $('.memberIdFiller').ajaxFetch(options);
        //select2
        $('select').select2({});
    });
</script>
