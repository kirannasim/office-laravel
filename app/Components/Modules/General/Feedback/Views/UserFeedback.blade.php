@extends(ucfirst(getScope()).'.Layout.master')
@section('content')
    <div class="row FeedbackWrapper userFeedback">
        <div class="feedbackFilter">
            <form class="filterForm">
                <div class="filters row">
                    <div class="eachFilter operation col-md-3 col-sm-3">
                        <label>{{ _mt($moduleId,'Feedback.User') }}</label>
                        <input type="text" class="form-control userFiller" name="user_name" id="user_name" value="">
                        <input type="hidden" name="filters[user_id]" id="user_id" value="">
                    </div>
                    <div class="eachFilter operation col-md-3 col-sm-3">
                        <label>{{ _mt($moduleId,'Feedback.Title') }} </label>
                        <select name="filters[form_id]">
                            <option value="">{{ _mt($moduleId,'Feedback.All') }}</option>
                            @foreach($feedbackForms as $feedbackForm)
                                <option value="{{ $feedbackForm->id }}">{{ $feedbackForm->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="eachFilter operation col-md-3 col-sm-3">
                        <label>{{ _mt($moduleId,'Feedback.From_date') }}</label>
                        <input type="text" class="datePicker" value="" name="filters[fromDate]">
                    </div>
                    <div class="eachFilter operation col-md-3 col-sm-3">
                        <label>{{ _mt($moduleId,'Feedback.To_date') }}</label>
                        <input type="text" class="datePicker" value="" name="filters[toDate]">
                    </div>
                </div>
                <div class="filters row">
                    <div class="filterButtonWrapper col-md-3 col-sm-3 col-sm-offset-9 filterButton">
                        <button type="button" class="btn  dark ladda-button feedbackFilterButton" data-style="contract">
                            <i class="fa fa-filter"></i>{{ _mt($moduleId,'Feedback.Filter') }}
                        </button>
                        <button type="button" class="btn  dark ladda-button clearFilter" data-style="contract">
                            <i class="fa fa-filter"></i>{{ _mt($moduleId,'Feedback.reset') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="feedbackTableDiv">
        </div>
    </div>

    <script>
        "use strict";
        $(function () {
            loadFeedbackDocsTable();

            Ladda.bind('.ladda-button');
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
            //init date-picker
            $('.datePicker').datepicker({
                format: 'yyyy-mm-dd'
            });

            //select2
            $('select').select2({
                width: '100%'
            });
            $('.feedbackFilterButton').click(function () {
                loadFeedbackDocsTable();
            });
            $('.clearFilter').click(function () {
                loadFeedbackFilters();
            });
        });

        function loadFeedbackDocsTable(route) {
            simulateLoading('.feedbackTableDiv');
            route = route ? route : '{{ route('feedback.user.list') }}';
            $.post(route, $('.filterForm').serialize(), function (responce) {
                $('.feedbackTableDiv').html(responce);
                Ladda.stopAll();
            });
        }

        function loadFeedbackFilters() {
            simulateLoading('.feedbackFilter');
            $.post('{{ route('feedback.user.filter') }}', function (responce) {
                $('.feedbackFilter').html(responce);
                Ladda.stopAll();
            }).done(function () {
                $('.feedbackFilterButton').trigger('click');
            });
        }
    </script>
@endsection


