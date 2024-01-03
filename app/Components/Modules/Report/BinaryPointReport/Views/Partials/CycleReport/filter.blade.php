<form class="filterForm">
    <div class="filters row">
        @if(getScope() == 'admin')
            <div class="eachFilter operation col-md-2 col-sm-2">
                <label>{{ _mt($moduleId, 'BinaryPointReport.user') }}</label>
                <input type="text" class="userFiller form-control"
                       placeholder="{{ _mt($moduleId, 'BinaryPointReport.Enter_user_name') }}"/>
                <input type="hidden" name="filters[userId]" id="userId">
            </div>
        @endif
        @if(getScope() == 'admin' || getScope() == 'user' )
            <div  class="eachFilter col-md-2 col-sm-2">
                <label> {{ _mt($moduleId, 'BinaryPointReport.daterange') }}  </label>
                {{--<input type="text" class=" form-control"  name="dates"/>--}}
                <input class="form-control" name="dates" id="dates" placeholder="Pick Date"   >
                <input type="hidden" name="filters[dateStart]" id="dateStart">
                <input type="hidden" name="filters[dateEnd]" id="dateEnd">
            </div>
        @endif
        <div class="eachFilter operation col-md-3 col-sm-3">
            <button type="button" class="btn dark filterRequest ladda-button" data-style="contract">
                <i class="fa fa-filter"></i>{{ _mt($moduleId, 'BinaryPointReport.filter') }}
            </button>
            @if(getScope() == 'admin' || getScope() == 'user')
                <button type="button" class="btn dark clearFilter ladda-button" data-style="contract">
                    <i class="fa fa-refresh"></i>{{ _mt($moduleId, 'BinaryPointReport.reset') }}
                </button>
            @endif
        </div>
    </div>
</form>
<script>
    "use strict";
    $(function () {

        if($('input[name="dates"]').length > 0){
            $('input[name="dates"]').daterangepicker({
            keepEmptyValues: true,
            autoUpdateInput: false
        }, function(start_date,end_date) {
                console.log(start_date);
                let chosen_date = start_date.format('YYYY-MM-DD')+' - '+end_date.format('YYYY-MM-DD');
                $("#dates").val(chosen_date);
            });
        }

        Ladda.bind('.ladda-button');
        $('.filterRequest').click(function () {
            if ($('input[name="dates"]').length>0) {
                if ($("#dates").val() != '') {
                    document.getElementById('dateStart').value = ($("#dates").data('daterangepicker').startDate);
                    document.getElementById('dateEnd').value = ($("#dates").data('daterangepicker').endDate);
                } else {
                    document.getElementById('dateStart').value = '';
                    document.getElementById('dateEnd').value = '';
                }
            }
            fetchCycleReport();
        });

        $('.clearFilter').click(function () {
            loadReportFilters();
        });
        var selectedCallback = function (target, id, name) {

            $('.userFiller').val(name);
            $('#userId').val(id);

        };
        var options = {
            target: '.userFiller',
            route: '{{ route("user.api") }}',
            action: 'getUsers',
            name: 'username',
            selectedCallback: selectedCallback,
            clearCallback: function (element) {
                element.siblings('input[name="filters[userId]"]').val('')
            }
        };
        $('.userFiller').ajaxFetch(options);
    });
</script>
