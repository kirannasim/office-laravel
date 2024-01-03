<form class="filterForm">
    <div class="row filters">
        <div class="eachFilter operation col-md-5 col-sm-5 filterActions">
            <div class="filterRequest" data-style="contract">                
            </div>
            <div class="clearFilter" data-style="contract">
                
            </div>
        </div>
    </div>
</form>
<style>
    @media (max-width: 767px) {
        .userFilters .eachFilter.operation.col-md-3.col-sm-3 {
            width: 50%;
            float: left;
        }
    }

    @media (max-width: 480px) {
        .userFilters .eachFilter.operation.col-md-3.col-sm-3 {
            width: 100%;
            float: none;
        }

        .userFilters .filters .eachFilter button {
            margin: 10px 0px;
        }
    }

    .userFilters .filters.row input {
        min-height: 35px;
        width: 100%;
        margin-bottom: 15px;
        border: solid 1px #eee;
        padding: 5px 10px;
    }
</style>
<script>
    "use strict";
    $(function () {
        $('select').select2({
            width: '100%'
        });
        Ladda.bind('.ladda-button');

        //fetch report table while filter is clicked
        $('.filterRequest').click(function () {
            fetchUserTable();
        });

        $('.clearFilter').click(function () {
            loaduserFilters();
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

        $('.joinDate').daterangepicker({
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