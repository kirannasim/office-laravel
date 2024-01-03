<div class="businessInfo">
    {!! defineFilter('dashboardBlock', '', 'dashboardTile') !!}
</div>

<script type="text/javascript">
    "use strict";

    function userGraphOptions() {
        return {
            dataSetLabel: "{{ _t('index.total_joinings') }}",
            element: '.userJoiningGraphHolder[data-graph="joining"]',
            labels: JSON.parse($('.usersGraphLabels').val()),
            data: JSON.parse($('.usersGraphData').val())
        };
    }

    function walletGraphOptions() {
        var prefix = $('.creditOrDebit').data('action');
        prefix = (prefix == 'balance') ? "{{ _t('index.credit_vs_debit') }}" : prefix;
        return {
            dataSetLabel: prefix + ' amount',
            element: '.walletGraphHolder[data-graph="wallets"]',
            labels: JSON.parse($('.walletGraphLabels').val()),
            data: JSON.parse($('.walletGraphData').val()),
            gradient: {
                bg: [0, 0, 0, 240],
                start: '#9b57de',
                stop: '#e4ffe5'
            },
            borderColor: '#9b57de'
        };
    }

    // Load wallets block with filters
    function loadWallet(options, me, returnOptions) {
        var block = 'wallets';
        var walletBlock = $('.statInner[data-target="' + block + '"]');
        var defaults = {
            txnType: walletBlock.find('.creditOrDebit').data('action'),
            walletId: walletBlock.find('.walletChooser').data('wallet')
        };
        var postData = $.extend({}, defaults, options);

        if (returnOptions) return postData;

        loadBlock(postData, block, me, function () {
            setupBusinessBlockSummaryGraph(walletGraphOptions());
            var formatFn = function (value) {
                return '$' + value;
            };
            countupStats($('.walletBalance')[0], 0, $('.walletBalance').data('value'), formatFn);
        })
    }

    // Load wallets block with filters
    function loadUser(options, me, returnOptions) {
        var block = 'joining';
        var userBlock = $('.statInner[data-target="' + block + '"]');
        var defaults = {usersType: userBlock.find('.allOrDescendants').data('usertype')};
        var postData = $.extend({}, defaults, options);

        if (returnOptions) return postData;

        loadBlock(postData, block, me, function () {
            setupBusinessBlockSummaryGraph(userGraphOptions());
            countupStats(userBlock.find('.counter')[0], 0, userBlock.find('.counter').data('value'));
        });
    }

    $(function () {
        var formatFn = function (value) {
            return '$' + value;
        };
        countupStats($('.walletBalance')[0], 0, $('.walletBalance').data('value'), formatFn);
        setupBusinessBlockSummaryGraph(userGraphOptions());
        setupBusinessBlockSummaryGraph(walletGraphOptions());
        $('.businessInfo .counter').each(function () {
            countupStats(this, 0, $(this).data('value'));
        });
        applyWindowCallback(function (block) {
            switch (block) {
                case 'joining':
                    setupBusinessBlockSummaryGraph(userGraphOptions());
                    $('.businessInfo .statInner[data-target="joining"] .counter').each(function () {
                        countupStats(this, 0, $(this).data('value'));
                    });
                    return;
                    break;
                case 'wallets':
                    setupBusinessBlockSummaryGraph(walletGraphOptions());
                    var formatFn = function (value) {
                        return '$' + value;
                    };
                    countupStats($('.walletBalance')[0], 0, $('.walletBalance').data('value'), formatFn);
                    return;
                    break;
                default:
                    return;
                    break;
            }
        }, 'bizBlockChangeCallbacks');

        applyWindowCallback(function (element) {
            if (jQuerize(element).closest('.statInner').data('target') == 'wallets') {
                var options = loadWallet(null, null, true);
                delete options['filters'];
                //console.log(options);
                return options;
            }
        }, 'bizBlockParams');

        applyWindowCallback(function (element) {
            if (jQuerize(element).closest('.statInner').data('target') == 'joining') {
                return {usersType: $('.allOrDescendants').data('usertype')};
            }
        }, 'bizBlockParams');
    });

    // load wallet data on wallet chooser
    $('body')
        .off('click', '.statInner[data-target="wallets"] .walletChooser ul li')
        .on('click', '.statInner[data-target="wallets"] .walletChooser ul li', function (e) {
            e.preventDefault();
            loadWallet({walletId: $(this).data('id')}, $(this));
        });

    // load wallet data on txn type chooser
    $('body')
        .off('click', '.statInner[data-target="wallets"] ul.creditOrDebit li')
        .on('click', '.statInner[data-target="wallets"] ul.creditOrDebit li', function (e) {
            e.preventDefault();
            loadWallet({txnType: $(this).data('action')}, $(this));
        });

    // load users data on user type chooser
    $('body')
        .off('click', '.statInner[data-target="joining"] ul.allOrDescendants li')
        .on('click', '.statInner[data-target="joining"] ul.allOrDescendants li', function (e) {
            e.preventDefault();
            loadUser({usersType: $(this).data('usertype')}, $(this));
        });

    $('body')
        .off('click', '.businessInfo .filterGear > ul.dropdown-menu li')
        .on('click', '.businessInfo .filterGear > ul.dropdown-menu li', function (e) {
            e.preventDefault();
            var me = $(this);
            var block = $(this).closest('.filterGear').data('block');
            var filters = {
                groupBy: $(this).data('groupby'),
                filterBy: $(this).data('filter'),
                fromDate: $(this).data('from')
            };
            var postData = {filters: filters};

            if ($.isArray(window.bizBlockParams))
                window.bizBlockParams.forEach(function (action, key) {
                    postData = $.extend({}, postData, action(me));
                });

            fetchBizBlock(postData, block, me);
        });
</script>
