@extends('Admin.Layout.master')
@section('content')
    <div class="row">
        <div class="emailBroadcaster">
            <div class="col-md-12 userFilters"></div>
            <div class="col-md-12 userContainer"></div>
            <div class="emailSender">
               
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary sendBroadcast ladda-button" data-style="contract"
                            style="float: right">
                        {{ _mt($moduleId,'PaymentState.send') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        let selectedUserArray = [];
        $(function () {
            $('.selectAllUser').prettySwitch({
                checkedCallback: () => {
                    $('.userFilters').hide();
                    $('.userContainer').hide();
                },
                unCheckedCallback: () => {
                    $('.userFilters').show();
                    $('.userContainer').show();
                }
            });
            Ladda.bind('.ladda-button');
            loaduserFilters();
            $(".mailcontent").summernote({
                placeholder: "{{ _mt($moduleId,'PaymentState.Write_here') }}",
                height: 150
            });
        });

        $('.sendBroadcast').click(function () {
            if (selectedUserArray.length || ($('.selectAllUser').prop("checked") == true)) {
                if (!$('.mailcontent').summernote('isEmpty')) {

                    if ($('.selectAllUser').prop("checked") == true)
                        var selecteAll = true;
                    else
                        var selecteAll = false;

                    $.post("{{ scopeRoute("email.broadcast.send") }}", {
                        users: selectedUserArray,
                        mailcontent: $('.mailcontent').val(),
                        subject: $('.mailSubject').val(),
                        selectAllUser: selecteAll
                    }, function () {
                        toastr.success("{{ _mt($moduleId,'PaymentState.Emails_has_been_sent_successfully') }}");
                        fetchUserTable();
                        selectedUserArray.length = 0;
                        $('.mailcontent').summernote('code', '');
                        $('.mailSubject').val('');
                        $(".selectAllUser").prop("checked", false);
                        setTimeout(() => {
                            Ladda.stopAll();
                        });
                    }).fail(function () {
                        setTimeout(() => {
                            Ladda.stopAll();
                        });
                        toastr.success("{{ _mt($moduleId,'PaymentState.cant_sent') }}");
                    });
                } else {
                    setTimeout(() => {
                        Ladda.stopAll();
                    });
                    toastr.error("{{ _mt($moduleId,'PaymentState.please_select_a_text') }}");
                }
            } else {
                setTimeout(() => {
                    Ladda.stopAll();
                });
                toastr.error("{{ _mt($moduleId,'PaymentState.please_select_at_least_one_user') }}");
            }
        });

        function loaduserFilters() {
            simulateLoading('.userFilters');
            $.get('{{ scopeRoute("email.paymentstate.filters") }}', function (response) {
                $('.userFilters').html(response);
                $('.filterRequest').trigger('click')
            });
        }

        function fetchUserTable(route) {
            simulateLoading('.userContainer');
            route = route ? route : '{{ scopeRoute('email.paymentstate.fetch') }}';
            $.get(route, $('.filterForm').serialize(), function (response) {
                $('.userContainer').html(response);
                Ladda.stopAll();
            })
        }

        function addUserToQueue(id) {
            selectedUserArray.push(id);
        }

        function deleteUserFromQueue(id) {
            selectedUserArray.pop(id);
        }
    </script>
    <style>
        .page-content {
            background: #eee;
        }
    </style>
@endsection