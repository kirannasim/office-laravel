@extends('Employee.Layout.master')
@section('content')
    <div class="pendingRegistrations">
        <form class="filterForm">
            <div class="filters row">
                <div class="eachFilter col-md-3 col-sm-3">
                    <label>{{ _t('pendingRegistration.status') }}</label>
                    <select name="filters[status]" class="select2">
                        <option value="0">{{ _t('pendingRegistration.Pending') }}</option>
                        <option value="1">{{ _t('pendingRegistration.Approved') }}</option>
                        <option value="all">{{ _t('pendingRegistration.All') }}</option>
                    </select>
                </div>
                <div class="eachFilter col-md-3 col-sm-3">
                    <label>{{ _t('pendingRegistration.Type') }}</label>
                    <select name="filters[key]" class="select2">
                        <option value="all">{{ _t('pendingRegistration.All') }}</option>
                        @foreach($key as $type)
                            <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="eachFilter col-md-3 col-sm-3">
                    <button type="button" class="btn blue filterRequest ladda-button" data-style="contract">
                        <i class="fa fa-filter"></i>{{ _t('pendingRegistration.Filter') }}
                    </button>
                </div>
            </div>
        </form>
        <div class="reportContainer"></div>
    </div>
    <script>
        "use strict";

        $(function () {
            $('.filterRequest').trigger('click');
            $('.select2').select2({
                width: '100%'
            });
        });

        $('body').on('click', '.reportContainer .listHolder .eachList', function () {
            $(this).addClass('active').siblings().removeClass('active');
        });

        $('body').on('click', '.cardNav .navEach', function () {
            $(this).addClass('active').siblings().removeClass('active');
            $('.cardBody[data-target="' + $(this).attr('data-target') + '"]').addClass('active').siblings().removeClass('active');
        });


        $('.filterRequest').click(function () {
            fetchData();
        });

        function fetchData(route) {
            simulateLoading('.reportContainer');
            route = route ? route : '{{ route('employee.management.pendingRegistrationList') }}';
            $.post(route, $('.filterForm').serialize(), function (response) {
                $('.reportContainer').html(response);
                Ladda.stopAll();
            })
        }
    </script>
@endsection
