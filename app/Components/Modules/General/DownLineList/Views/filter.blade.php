<form class="filterForm">
    <div class="filters row">
        <div class="eachFilter operation col-md-4 col-sm-4">
            <label>{{ _mt($moduleId, 'DownLineList.level') }}</label>
            <input type="hidden" name="filters[user_id]" value="{{ $userId }}">
            <select name="filters[level]" class="select2">
                @for ($level = 1; $level <= $depth; $level++)
                    <option value="{{ $level }}"> Level {{ $level }} </option>
                @endfor
            </select>
        </div>
        <div class="eachFilter col-md-3 col-sm-3">
            <button type="button" class="btn green filterRequest ladda-button" data-style="contract"
                    style="margin-top: 30px;">
                <i class="fa fa-filter"></i>{{ _mt($moduleId, 'DownLineList.filter') }}
            </button>
        </div>
    </div>
</form>

<script>
    "use strict";
    $(function () {
        Ladda.bind('.ladda-button');

        $('.select2').select2();

        //fetch report table while filter is clicked
        $('.filterRequest').click(function () {
            fetchDownlinesList();
        });

        function fetchDownlinesList(route) {
            simulateLoading('.container');
            route = route ? route : '{{ scopeRoute('downlineUsers.fetch') }}';
            $.post(route, $('.filterForm').serialize(), function (response) {
                $('.container').html(response);
                Ladda.stopAll();
            })
        }
    });
</script>
<style>
    .row.downlineUsers span.select2.select2-container {
        width: 100% !important;
    }

    .downlineListContainer {
        padding-top: 10px;
    }
</style>
