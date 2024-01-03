<div class="filters row" style="display: none">
    <form class="filterForm">
        <div class="eachFilter operation col-sm-3">
            <label>{{ _mt($moduleId,'HoldingTank.username') }}</label>
        </div>
        <div class="eachFilter operation col-sm-3">
            <input type="text" class="form-control userFiller"
                   placeholder="{{ _mt($moduleId,'HoldingTank.enter_username') }}">
            <input type="hidden" name="userId" id="user_id" value="{{ loggedId() }}">
        </div>
        <div class="eachFilter operation col-sm-3">
            <button type="button" class="btn blue filterRequest ladda-button" data-style="contract">
                            <span class="ladda-label">
                            <i class="fa fa-filter"></i>{{ _mt($moduleId,'HoldingTank.filter') }}
                            </span>
                <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
            </button>
            <button type="button" class="btn green clearFilter ladda-button" data-style="contract">
                            <span class="ladda-label">
                                <i class="fa fa-refresh"></i>{{ _mt($moduleId,'HoldingTank.reset') }}
                            </span>
                <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
            </button>
        </div>
    </form>
</div>

<script>

    $('.filterRequest').click(function () {
        loadHoldingTable();
    });

    $('.clearFilter').click(function () {
        loadHoldingFilter();
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

</script>