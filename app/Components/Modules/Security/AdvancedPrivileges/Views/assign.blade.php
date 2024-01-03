@extends(ucfirst(getScope()).'.Layout.master')
@section('content')
    @component('Components.demoWarning') @endcomponent
    <div class="privilageWrapper"></div>
    <script type="text/javascript">
        "use strict"
        //Document ready scripts
        $(function () {
            fetchAssignForm(3);
        });

        //Fetch form
        function fetchAssignForm(userGroup) {
            if (!userGroup) return false;

            simulateLoading($('.privilageWrapper'));
            $.get("{{ route('privilages.assign.form') }}", {user_group: userGroup}, function (response) {
                $('.privilageWrapper').html(response);
            });
        }

        //Search items
        $('body').off('keyup', '.searchItem input[type="text"]')
            .on('keyup', '.searchItem input[type="text"]', function () {
                var me = $(this);
                $(this).closest('.itemGroup').find('.eachItem').each(function () {
                    //console.log($(this).text().indexOf(me.val()));
                    if ($(this).text().toLowerCase().indexOf(me.val().toLowerCase()) === -1)
                        $(this).addClass('hidden');
                    else
                        $(this).removeClass('hidden');
                });
            });

        //Check all
        $('body').off('click', '.eachPrivilageGroup .itemMetaWrap button')
            .on('click', '.eachPrivilageGroup .itemMetaWrap button', function () {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                    $(this).closest('.itemGroup').find('.eachItem').find('input.iCheck').iCheck('uncheck');
                } else {
                    $(this).addClass('active');
                    $(this).closest('.itemGroup').find('.eachItem').not('.hidden').find('input.iCheck').iCheck('check');
                }
            });
    </script>

    <style type="text/css">
        .page-content {
            background: #fff;
        }
    </style>
@endsection
