<form class="filterForm">
    <div class="filters row">
        @if(getScope() == 'admin')
            <div class="eachFilter operation col-md-3 col-sm-3">
                <label>{{ _mt($moduleId, 'BinaryPointReport.user') }}</label>
                <input type="text" class="userFiller"
                       placeholder="{{ _mt($moduleId, 'BinaryPointReport.Enter_user_name') }}"/>
                <input type="hidden" name="filters[userId]" id="userId">
            </div>
        @endif
        <div class="eachFilter type col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'BinaryPointReport.type') }}</label>
            <select name="filters[isCredit]">
                <option value="">{{ _mt($moduleId,'BinaryPointReport.all') }}</option>
                <option value="1">{{ _mt($moduleId,'BinaryPointReport.credited') }}</option>
                <option value="0">{{ _mt($moduleId,'BinaryPointReport.debited') }}</option>
            </select>
        </div>
        <div class="eachFilter type col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'BinaryPointReport.position') }}</label>
            <select name="filters[position]">
                <option value="">{{ _mt($moduleId,'BinaryPointReport.all') }}</option>
                <option value="1">{{ _mt($moduleId,'BinaryPointReport.left') }}</option>
                <option value="2">{{ _mt($moduleId,'BinaryPointReport.right') }}</option>
            </select>
        </div>
        {{-- <div class="eachFilter operation col-md-3 col-sm-3">
             <label>{{ _mt($moduleId, 'BinaryPointReport.member_id') }}</label>
             <input type="text" class="form-control"  name="filters[memberId]" placeholder="Member ID"/>
         </div>--}}
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'BinaryPointReport.date') }}</label>
            {{--<input type="text" class="joinDate" value="" name="filters[date]"/>--}}
            <input class="form-control" name="dates" id="dates" placeholder="Pick Date"   >
            <input type="hidden" name="filters[dateStart]" id="dateStart">
            <input type="hidden" name="filters[dateEnd]" id="dateEnd">
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <button type="button" class="btn dark filterRequest ladda-button" data-style="contract">
                <i class="fa fa-filter"></i>{{ _mt($moduleId, 'BinaryPointReport.filter') }}
            </button>
            <button type="button" class="btn dark clearFilter ladda-button" data-style="contract">
                <i class="fa fa-refresh"></i>{{ _mt($moduleId, 'BinaryPointReport.reset') }}
            </button>
        </div>
    </div>
</form>

<script>
    "use strict"
    $(function () {

        Ladda.bind('.ladda-button');

        //fetch report table while filter is clicked
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
            fetchReport();
        });

        $('.clearFilter').click(function () {
            loadReportFilters();
        });

        //User fetcher
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

        // Ladda.bind('.ladda-button');


        if($('input[name="dates"]').length > 0){
            $('input[name="dates"]').daterangepicker({
                keepEmptyValues: true,
                autoUpdateInput: false
            }, function(start_date,end_date) {
                let chosen_date = start_date.format('YYYY-MM-DD')+' - '+end_date.format('YYYY-MM-DD');
                $("#dates").val(chosen_date);
            });
        }

        {{--$('.joinDate').daterangepicker({--}}
            {{--locale: {--}}
                {{--format: 'YYYY-MM-DD'--}}
            {{--},--}}
            {{--startDate: '{{ $default_filter['startDate'] }}',--}}
            {{--endDate: '{{ $default_filter['endDate'] }}',--}}
            {{--autoApply: true,--}}
            {{--autoUpdateInput: true--}}
        {{--});--}}
    });
</script>
<style>
    @media (max-width: 991px) {
        .eachFilter.operation.col-md-3.col-sm-3:last-child {
            width: 50%;
        }
    }

    @media (max-width: 767px) {
        .reportFilters .eachFilter.operation.col-md-3.col-sm-3 {
            width: 50%;
            float: left;
        }
    }

    @media (max-width: 480px) {
        .reportFilters .eachFilter.operation.col-md-3.col-sm-3 {
            width: 100% !important;
            float: none;
        }

        .reportFilters .filters .eachFilter button {
            margin: 10px 0px;
        }
    }

    @media (max-width: 360px) {
        .reportOptions button.btn {
            margin-right: 0px;
            margin-bottom: 5px;
        }
    }
</style>
