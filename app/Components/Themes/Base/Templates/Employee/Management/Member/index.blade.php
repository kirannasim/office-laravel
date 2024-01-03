@extends('Employee.Layout.master')
@section('content')
    <div class="memberSearch col-md-offset-3">
        <div class="inputHolder">
            <i class="icon-magnifier"></i>
            <input type="text" placeholder="{{ _t('member.member_search') }}">
        </div>
        <div class="buttonGroup">
            <button class="btn btn-circle blue ladda-button advSearch" data-style="expand-left">
                <i class="icon-eyeglasses"></i> {{ _t('member.advanced') }}
            </button>
        </div>
    </div>
    <div class="advSearchResult col-md-12">
        <div class="resultSummary">
            <h3>
                {{ _t('member.found') }}<span>0</span> {{ _t('member.results') }}
                <button class="btn btn-circle btn-outline red closeAdvResults">{{ _t('member.close') }}</button>
            </h3>
        </div>
        <div class="resultHolder row"></div>
    </div>
    <div class="memberManagementWrapper row">
        <div class="memberNav col-md-3 col-sm-3">
            @component('Employee.Management.Member.Components.memberCard')
                {{ $user->id }}
            @endcomponent
        </div>
        <div class="memberPanel col-md-9 col-sm-9" data-unit="memberSlice"></div>
    </div>
    <style>
        .page-content {
            background: #dcddde;
        }
    </style>
    <script>
        "use strict";
        $(function () {
            // switching navs
            $('body').on('click', 'ul.memberOptions li', function () {
                var userId = $(this).closest('.navCard').attr('data-user');
                $(this).addClass('active').siblings().removeClass('active');
                var target = $('.slice[data-user="' + userId + '"] .panelForm[data-target="' + $(this).attr('data-target') + '"]');
                target.addClass('active').siblings().removeClass('active');
                // load unit on demand
                loadUnit(target, {user: userId});
            });
            // switching cards
            $('body').on('click', '.navCard', function () {
                $(this).removeClass('collapsed').siblings().addClass('collapsed');
                $('.slice[data-user="' + $(this).attr('data-user') + '"]').addClass('active').siblings().removeClass('active');
            });
            // load slice
            loadUserUnit({{ $user->id }});
            // slice switch
            $('body').on('click', '.navCard.collapsed img', function () {
                var userId = $(this).closest('.navCard').attr('data-user');
                //loadUserUnit(userId, true);
            });
            // Setup search
            setupUserSearch();
            // Advanced search
            $('button.advSearch').click(function () {
                var options = {
                    action: 'getUsers',
                    data: {
                        keyword: $('.memberSearch .inputHolder input[type="text"]').val(),
                        deepSearch: true
                    }
                };
                $.post('{{ route('user.api') }}', options, function (response) {
                    Ladda.stopAll();
                    $('.advSearchResult').slideDown().find('.resultHolder').empty().siblings('.resultSummary')
                        .find('h3 span').text(response.length);
                    if (!response.length) {
                        $('.advSearchResult .resultHolder').html("<div class='noAdvSearchResults'>{{ _t('member.no_results') }}</div>");
                    }
                    response.forEach(function (user) {
                        $('.advSearchResult .resultHolder').append('<div class="col-md-4 setHolder">\n' +
                            '                <div class="resultSet" data-user="' + user.id + '">\n' +
                            '                    <div class="headerData">\n' +
                            '                        <div class="profilePic">\n' +
                            "                            <img src='{{ getProfilePic($user) }}'>\n" +
                            '                        </div>\n' +
                            '                        <div class="data">\n' +
                            '                            <div class="username">' + user.username + '</div>\n' +
                            '                        </div>\n' +
                            '                    </div>\n' +
                            '                    <div class="bodyData">\n' +
                            '                        <div class="eachData">\n' +
                            "                           <label>{{ _t('member.full_name') }}</label>\n" +
                            '                            <span class="value">' + user.meta_data['firstname'] + ' ' + user.meta_data['lastname'] + '</span>\n' +
                            '                        </div>\n' +
                            '                        <div class="eachData">\n' +
                            "                          <label>{{ _t('member.email') }}</label>\n" +
                            '                            <span class="value">' + user.email + '</span>\n' +
                            '                        </div>\n' +
                            '                        <div class="eachData">\n' +
                            "                            <label>{{ _t('member.phone') }}</label>\n" +
                            '                            <span class="value">' + user.phone + '</span>\n' +
                            '                        </div>\n' +
                            '                    </div>\n' +
                            '                </div>\n' +
                            '            </div>');
                    });
                }).fail(function (response) {
                    Ladda.stopAll();
                });
            });
            // pick user card
            $('body').on('click', '.setHolder .resultSet', function () {
                getUserCard($(this).attr('data-user')).done(function () {
                    loadUserUnit($(this).attr('data-user'), true).done(function () {
                        $('.memberSearch .inputHolder input[type="text"]').val('');
                    });
                });
                $(this).closest('.advSearchResult').slideUp().find('.resultHolder').empty();
            });
            // close adv-search results
            $('body').on('click', 'button.closeAdvResults', function () {
                $('.advSearchResult').slideUp().find('.resultHolder').empty();
            });
        });

        function loadUserUnit(user, append) {
            var targetSlice = $('.slice[data-user="' + user + '"]');
            if (!targetSlice.length)
                return loadUnit('.memberPanel', {user: user}, append).done(function () {
                    $('.slice[data-user="' + user + '"]').addClass('active').siblings().removeClass('active');
                    loadUnit('.slice[data-user="' + user + '"] .panelForm.active', {user: user});
                });
        }

        //Ajax info retrieval
        function loadUnit(elem, postParams, appendOrPrepend, unit, route) {
            elem = jQuerize(elem);
            var options = {unit: unit ? unit : elem.attr('data-unit')};

            simulateLoading(elem);

            route = route ? route : '{{ route("employee.management.members.unit") }}';

            if (postParams) $.extend(options, postParams);

            return $.post(route, options, function (response) {
                if (appendOrPrepend)
                    if (appendOrPrepend == 'prepend')
                        elem.prepend(response);
                    else
                        elem.append(response);
                else
                    elem.html(response);

                simulateLoading(elem, true);
            });
        }

        function setupUserSearch() {
            var input = $('.memberSearch .inputHolder input[type="text"]');
            var options = {
                route: '{{ route("user.api") }}',
                action: 'getUsers',
                name: 'username',
                dropDownTopOffset: 5,
                width: $('.inputHolder').width(),
                offset: {
                    left: $('.inputHolder').offset().left,
                    top: $('.inputHolder').offset().top
                },
                selectedCallback: function (target, userId, name) {
                    getUserCard(userId).done(function () {
                        loadUserUnit(userId, true).done(function () {
                            $('.memberSearch .inputHolder input[type="text"]').val('');
                        });
                    });
                }
            };

            input.ajaxFetch(options);
        }

        function getUserCard(userId) {
            var targetCard = $('.navCard[data-user="' + userId + '"]');

            if (targetCard.length) return;

            return loadUnit('.memberNav', {user: userId}, 'prepend', 'userCard').done(function () {
                $('.navCard:not([data-user="' + userId + '"])').addClass('collapsed');
            });
        }
    </script>
@endsection
