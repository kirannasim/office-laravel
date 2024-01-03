@if ('admin' == getScope())
    <form class="filterForm">
        <div class="filters row">
            <div class="eachFilter operation col-md-3 col-sm-3">
                <label>{{ _mt($moduleId, 'ClientReport.user') }}</label>
                <input type="text" class="userFiller" placeholder="Enter user name"/>
                <input type="hidden" name="user" id="user_id">
            </div>
            <div class="eachFilter operation col-md-3 col-sm-3">
                <label>{{ _mt($moduleId, 'ClientReport.member_id') }}</label>
                <input type="text" class="form-control" name="filters[memberId]" placeholder="Enter Member ID"/>
            </div>
            <div class="eachFilter operation col-md-3 col-sm-3">
                <button type="button" class="btn dark filterRequest ladda-button" data-style="contract">
                    <i class="fa fa-filter"></i>{{ _mt($moduleId, 'ClientReport.filter') }}
                </button>
            </div>
        </div>
    </form>
@endif
<script>
    'use strict';
    $(function () {
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
            fetchclientReport();
        });

        Ladda.bind('.ladda-button');

        $('.clearFilter').click(function () {
            loadreportFilters();
        });
    })
</script>
