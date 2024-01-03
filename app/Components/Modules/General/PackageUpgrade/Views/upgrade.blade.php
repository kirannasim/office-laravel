@inject('cart', 'App\Blueprint\Services\CartServices')
@extends(ucfirst(getScope()).'.Layout.master')
@section('content')
    <div class="col-md-12 packageUpgradeErrorWrapper">
        <div class="packageUpgrade error"></div>
    </div>
    <div class="row packageUpgradeContainer">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="fixed packageUpgrade cart">
                <div class="bubble pulse-button animated hidden">
                    {{ $cartTotal }}
                </div>
                <div class="summary"></div>
            </div>
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-layers font-green"></i>
                        <span class="caption-subject font-green bold uppercase">{{ _mt($moduleId,'PackageUpgrade.package_upgrade') }}

                    </span>
                    </div>
                </div>
                <div class="portlet-body form">


                    @if($packages->count())

                        {!! Form::open(['route' => 'user.packageUpgrade', 'method' => 'post', 'class' => 'packageUpgradeForm']) !!}
                        <input type="hidden" name="context" value="package_upgrade">
                        <div class="form-wizard">
                            <div class="packageWrapper">
                                <div class="packageCluster">
                                    @foreach ($packages->chunk(4) as $chunk)
                                        <div class="packageRow row">
                                            @foreach($chunk as $package)
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="product {{ strtolower($package->name) }}">
                                                        @if($package->image != null)
                                                            <div class="image">
                                                                <img src="{{ asset($package->image) }}">
                                                            </div>
                                                        @else
                                                            <div class="packageHeader">
                                                                <div class="icon">
                                                                    <i class="fa fa-dropbox"></i>
                                                                </div>
                                                                <h4>{{ $package->name }}</h4>
                                                            </div>
                                                        @endif
                                                        <div class="details">
                                                            <div class="eachDetail name">
                                                                <label>{{ _mt($moduleId,'PackageUpgrade.name') }}</label>
                                                                <span class="value">{{ $package->name }}</span>
                                                            </div>
                                                            <div class="eachDetail price">
                                                                <label>{{ _mt($moduleId,'PackageUpgrade.price') }}</label>
                                                                <span class="value">
                                                                    @if($moduleData->get('price_settings') == 'package_difference')
                                                                        {{ currency($package->price - $currentPackage->price) }}
                                                                    @elseif($moduleData->get('price_settings') == 'upgrade_price')
                                                                        {{ currency($package->upgrade_price) }}
                                                                    @else
                                                                        {{ currency($package->price) }}
                                                                    @endif
                                                                </span>
                                                            </div>
                                                            <div class="eachDetail pv">
                                                                <label>{{ _mt($moduleId,'PackageUpgrade.pv') }}</label>
                                                                <span class="value">
                                                                    @if($moduleData->get('price_settings') == 'package_difference')
                                                                        {{ $package->pv - $currentPackage->pv }}
                                                                    @elseif($moduleData->get('price_settings') == 'upgrade_price')
                                                                        {{ $package->upgrade_pv }}
                                                                    @else
                                                                        {{ $package->pv }}
                                                                    @endif</span>
                                                            </div>
                                                            <div class="eachDetail description toggleable hidden">
                                                                <label>{{ _mt($moduleId,'PackageUpgrade.description') }}</label>
                                                                <span class="value">
                                                                    {!! html_entity_decode($package->description) !!}
                                                                </span>
                                                            </div>
                                                            <div class="moreDetails closed">
                                                                <span class="toogleText">{{ _mt($moduleId,'PackageUpgrade.more') }}</span><i
                                                                        class="fa fa-angle-double-down"></i>
                                                            </div>
                                                            <div class="addToCart">
                                                                <button type="button" data-id="{{ $package->id }}"
                                                                        class="btn green ladda-button {{ $cartedPackage == $package->id ? 'selected' : '' }}"
                                                                        data-style="contract">
                                                                    <span class="iconGroup">
                                                                        <i class="icon-basket"></i>
                                                                        <span class="fa fa-check"></span>
                                                                    </span>
                                                                    <span class="text">{{ $cartedPackage == $package->id ? 'Selected' : 'Select' }}</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                    <input type="hidden" name="selectedPackage" value="{{ $cart->getCartedPackage() }}">
                                </div>
                            </div>

                            <div class="paymentGatewaysWrapper"></div>
                                
                            </div>
                            <div class="form-actions actionButtons">
                                <div class="row">
                                    <div class="col-offset-3 col-md-12">
                                        <a href="javascript:" class="btn default button-previous" style="display: none">
                                            <i class="fa fa-angle-left"></i>{{ _mt($moduleId,'PackageUpgrade.back') }}
                                        </a>
                                        <a href="javascript:"
                                           class="btn btn-outline green button-next">{{ _mt($moduleId,'PackageUpgrade.continue') }}
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                        <a href="javascript:"
                                           class="btn green proceed" style="display: none; float: right; width: 140px;">Pay Now
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="successWrapper">
                                <i class="fa fa-check-circle"></i>
                                <h3> {{ _mt($moduleId,'PackageUpgrade.package_upgraded') }} </h3>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    @else
                        <h3 align="center"> {{ _mt($moduleId,'PackageUpgrade.no_package_to_upgrade') }} </h3>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {

            if ("{{ $status }}" == 'success') {
                $('.packageUpgrade').hide();
                $('.packageWrapper').hide();
                $('.paymentGatewaysWrapper').hide();
                $('.actionButtons').hide();
                $('.successWrapper').show();
            }

            window.paymentSuccessCallback = function (response, wallet) {
                postPayment(response);
            };

            refreshSummary('.packageUpgrade.cart .summary').done(function () {
                $('.fixed.cart .bubble').removeClass('hidden');
            });

            //Package selection
            $('body').on('click', '.product .addToCart button', function () {
                var target = $(this).closest('.packageWrapper').addClass('stickOverlay');
                $(this).addClass('selected').find('span.text').text('Selected');
                $('.product .addToCart button').not(this).removeClass('selected');
                addPackage(target, $(this).attr('data-id'));
            });


            function addPackage(elem, packageId) {
                var options = {};
                options.productId = packageId;
                options.quantity = 1;
                options.isPackage = true;
                options.packagetype = "upgrade_price";
                return $.post("{{ route('cart.add') }}", options, function (response) {
                    $('.fixed.cart .bubble').html(response.total).removeClass('shake').addClass('shake');
                    setTimeout(function () {
                        $('.fixed.cart .bubble').removeClass('shake');
                        refreshSummary('.fixed.packageUpgrade.cart .summary');
                    }, 500);

                    var dispatch = response.item;
                    dispatch.quantity = response.quantity;
                    dispatch.lang_you_have_added = $('#lang_you_have_added').val();
                    dispatch.lang_to_cart = $('#lang_to_cart').val();
                    //showCartPopup(dispatch);
                    //elem.addClass('chosen').removeClass('stickOverlay');
                    Ladda.stopAll();
                    //$('.packageWrapper').not(elem).removeClass('chosen');
                    $('[name="selectedPackage"]').val(packageId);
                    $('[name="packageName"]').val(elem.find('.packageBasicInfo > h2').text());
                    $('p.packageNameReview').text(elem.find('.packageBasicInfo > h2').text());
                    $('[name="selectedPackage"]').attr('formnovalidate', true);
                    //forceRemoveValidationError($('#packageUpgradeForm').validate(), $('[name="selectedPackage"]'));
                    refreshSummary();
                }).fail(function () {
                    Ladda.stopAll();
                });
            }


            function refreshSummary(target) {
                target = target ? jQuerize(target) : $('.orderSummary');

                return $.get("{{ route('cart.summary') }}", function (response) {
                    target.html(response);
                });
            }


            $('body').on('click', '.fixed.cart .bubble', function () {
                if ($(this).hasClass('open')) {
                    $(this).removeClass('open');
                    $('.fixed.cart').removeClass('open');
                } else {
                    $(this).addClass('open');
                    $('.fixed.cart').addClass('open');
                }
            });

            $('.button-next').click(function () {
                $.post("{{ scopeRoute('package.validate') }}", function (response) {
                    loadGateways();
                    $('.paymentGatewaysWrapper').show();
                    $('.packageWrapper').hide();
                    $('.button-next').hide();
                    $('.button-previous').show();
                    $('.proceed').show();

                }).fail(function (response) {
                    showError("{{ _mt($moduleId,"PackageUpgrade.please_select_a_valid_package") }}");
                });


            });
            $('.button-previous').click(function () {
                $('.paymentGatewaysWrapper').hide();
                $('.packageWrapper').show();
                $('.button-next').show();
                $('.button-previous').hide();
                $('.proceed').hide();
            });

            function loadGateways() {
                simulateLoading('.paymentGatewaysWrapper');
                var context = 'package_upgrade';
                return $.get("{{ route('cart.payment') }}", function (response) {
                    window.targetForm = $('.packageUpgradeForm');
                    $('.paymentGatewaysWrapper').html(response);
                });
            }

            function postPayment() {
                $('.paymentGatewaysWrapper').hide();
                $('.actionButtons').hide();
                $('.successWrapper').show();
            }

            function showError(message) {
                $('.packageUpgradeErrorWrapper').slideDown().find('.error').html(message);

                setTimeout(function () {
                    $('.packageUpgradeErrorWrapper').slideUp();
                }, 5000);
            }

            $('body').on('click', '.moreDetails', function () {
                if ($(this).hasClass('closed')) {
                    $(this).removeClass('closed').closest('.details').find('.eachDetail.toggleable').removeClass('hidden');
                    $(this).find('.toogleText').html('Less');
                    $(this).find('i').removeClass('fa-angle-double-down');
                    $(this).find('i').addClass('fa-angle-double-up');
                } else {
                    $(this).addClass('closed').closest('.details').find('.eachDetail.toggleable').addClass('hidden');
                    $(this).find('.toogleText').html('More');
                    $(this).find('i').removeClass('fa-angle-double-up');
                    $(this).find('i').addClass('fa-angle-double-down');
                }
            });

        });
    </script>

    <style>
        .paymentGatewaysWrapper {
            display: none;
        }

        .fixed.packageUpgrade.cart .summary {
            background: white;
            padding: 10px;
            max-width: 700px;
            z-index: 999;
            box-shadow: -9px 14px 17px #4040403d;
            position: relative;
            border-left: 2px solid #359df7 !important;
            border: 1px solid #d4d4d4;
            border-right: 0;
        }

        .btn-proceed
        {
            background-color: #08b790;
            color: white;
            margin:auto;
            cursor:pointer;
            width: 50%;
            height: 50px;
        }
        .btn-proceed:hover{
            background-color: #59da76;
            color: white;
        }
        .successWrapper {
            display: none;
        }

        .packageUpgradeErrorWrapper {
            display: none;
            padding: 12px 30px;
        }

        .packageUpgrade.error {
            background: #f83f3f;
            padding: 1px 8px;
            border-radius: 3px !important;
            color: white;
        }

        .row.packageUpgradeContainer .successWrapper {
            text-align: center;
            padding: 35px 10px;
        }

        .row.packageUpgradeContainer .successWrapper i {
            font-size: 46px;
            color: #59c359;
        }

        .successWrapper h3 {
            text-align: center;
            /*padding: 20px;*/
            color: #3fbc3f;
            font-size: 22px;
        }

        .form-actions.actionButtons {
            margin-top: 10px;
        }

        .packageRow.row .eachDetail .value span.lineBreak {
            font-size: 10px;
            text-decoration: line-through;
            color: #f77474;
        }
    </style>

@endsection
