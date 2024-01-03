<div class="heading">
    <h3><i class='fa fa-sitemap'></i> {{ _mt('General-DownLineList','DownLineList.downlineList') }}</h3>
</div>
<div class="row downlineUsers">
    <div class="col-md-12 levelFilter">
    </div>
    <div class="col-md-12 container">
    </div>
</div>

<script>
    "use strict";

    $(function () {
        loadLevelFilters();
    });

    function loadLevelFilters() {
        simulateLoading('.levelFilter');
        var userId = '{{ $userId }}';
        $.post('{{ scopeRoute('downlineUsers.filter') }}', {userId: userId}, function (response) {
            $('.levelFilter').html(response);
            $('.filterRequest').trigger('click')
        });
    }
</script>
