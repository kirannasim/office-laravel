@extends('Admin.Layout.master')
@section('content')
    <div class="emailWrapper">
        <div class="ajaxWrapper"></div>
    </div>

    <style type="text/css">
        .page-content {
            background: #d2d2d2;
            overflow: hidden;
        }

        .ajaxWrapper {
            min-height: 50vh;
            \ position: relative;
        }

        .ajaxWrapper .loader {
            background: none;
        }

        .icheckbox_flat {
            zoom: 0.7;
        }
    </style>

    <script type="text/javascript">
        "use strict";

        var mailHandle = "{{ route('admin.mail.handle') }}";

        //Refresh mailbox
        function refreshMailBox() {
            simulateLoading($('.emailWrapper .ajaxWrapper'));
            var get = $.get("{{ route('admin.mail.mailbox') }}", function (response) {
                $('.emailWrapper .ajaxWrapper').html(response);
            });
        }

        //Document ready scripts
        $(function () {
            $('body').addClass('page-sidebar-closed');
            $('.page-sidebar-menu').addClass('page-sidebar-menu-closed');
            refreshMailBox();
        });

        //Setup ajax userfill
        function setupAjaxFill(element) {
            //Ajax fetch
            var selectedCallback = function (target, id, name) {
                var exists = false;
                target.parent().find('.eachRecipient').each(function () {
                    if ($(this).attr('data-id') == id) exists = true;
                });

                if (exists) return false;

                target.parent().find('.recipientSelect').val('');

                var html = '<div class="eachRecipient" data-id="' + id + '">';
                html += '<span class="close fa fa-close"></span>';
                html += '<span class="name">' + name + '</span>';
                html += '<input type="hidden" name="recipient[]" value="' + id + '">';
                html += '<input type="hidden" name="type[]" value="user">';
                html += '</div>';

                target.parent().find('.recipientHolder').slideDown().append(html);
            };

            var options = {
                route: '{{ route("user.api") }}',
                action: 'getUsers',
                name: 'username',
                dropDownTopOffset: 5,
                selectedCallback: selectedCallback
            };

            jQuerize(element).ajaxFetch(options);

            $(element).keypress(function(e){
                if(e.which == 13)
                {
                    var email = $(this).val();
                    if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
                    {
                        var html = '<div class="eachRecipient" data-id="">';
                        html += '<span class="close fa fa-close"></span>';
                        html += '<span class="name">' + email + '</span>';
                        html += '<input type="hidden" name="recipient[]" value="' + email + '">';
                        html += '<input type="hidden" name="type[]" value="email">';
                        html += '</div>';
                        $(this).parent().find('.recipientHolder').slideDown().append(html);
                    }

                    $(this).val("");
                    return false;
                }
            })
        }
    </script>

@endsection
