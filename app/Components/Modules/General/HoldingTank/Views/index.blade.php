@extends(ucfirst(getScope()).'.Layout.master')

@section('content')
    @include('_includes.network_nav')
    <div class="row holdingTankWrapper" style="margin-top: 80px;">
        <div class="col-sm-3">
            <form class="changeStatusForm" action="">
                <div class="row holdingSettings">
                    <div class="col-sm-12">
                        <h3 class="title">{{ _mt($moduleId,'HoldingTank.settings') }}</h3>
                    </div>
                    <div class="col-sm-12">
                        <div class="holdingSwitch checkbox">
                            <label>{{ _mt($moduleId,'HoldingTank.register_automatically') }}</label>
                            <div class="toggleSwitchWrapper">
                                <label>{{ _mt($moduleId,'HoldingTank.off') }}</label>
                                <div class="switch" data-target="holding_tank">
                                    <span class="trigger @if($userConfig && $userConfig->status == 0) left @else  right @endif"></span>
                                </div>
                                <label>{{ _mt($moduleId,'HoldingTank.on') }}</label>
                                <input type="hidden" class="holding_tank" name="registerAutomatically">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 defaultPosition" @if($userConfig && $userConfig->status == 0) style="display: none" @endif>
                        <label>{{ _mt($moduleId,'HoldingTank.default_position') }}</label>
                        <select class="form-control select" name="default_position">
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}" @if($userConfig && $userConfig->default_position == $position->id) selected="selected" @endif>{{ $position->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn btn-green green pull-left ladda-button saveStatus">{{ _mt($moduleId,'HoldingTank.Save') }}</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-6">
            <div class="row holdingSummery">
                <div class="col-sm-12">
                    <div class="holdingGrid">
                        <i class="fa fa-users"></i>
                        <h3>{{ _mt($moduleId,'HoldingTank.total_holding_users') }}</h3>
                        <H4><span id="totalHoldingUsers">{{ $totalHoldingUsers }}</span></H4>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="holdingGrid">
                        <h3>{{ _mt($moduleId,'HoldingTank.total_left') }}</h3>
                        <H4><span id="total_left">{{ $binaryInfo['leftpoints'] ?:0 }}</span></H4>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="holdingGrid">
                        <h3>{{ _mt($moduleId,'HoldingTank.total_right') }}</h3>
                        <H4><span id="total_right">{{ $binaryInfo['rightpoints'] ?:0 }}</span></H4>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="holdingGrid">
                        <h3>{{ _mt($moduleId,'HoldingTank.total_left_carry') }}</h3>
                        <H4><span id="left_Carry">{{ $binaryInfo['leftCarry'] ?:0  }}</span></H4>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="holdingGrid">
                        <h3>{{ _mt($moduleId,'HoldingTank.total_right_carry') }}</h3>
                        <H4><span id="right_Carry">{{ $binaryInfo['rightCarry'] ?: 0 }}</span></H4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="row holdingNote">
                <form class="placementForm" action="">
                    <div class="col-sm-12">
                        <h3 class="title">{{ _mt($moduleId,'HoldingTank.place_all_users') }}</h3>
                    </div>
                    <div class="col-sm-12">
                        <div class="Note">
                            <p>*All enrollees will be place on a particular position </p>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label>{{ _mt($moduleId,'HoldingTank.position') }}</label>
                        <select class="form-control select" name="position">
<<<<<<< HEAD
                            {{--<option value="">{{ _mt($moduleId,'HoldingTank.select') }}</option>--}}
=======
>>>>>>> e0b1f16394a256bda62d3ab3ddc6ade7059b8d9b
                            <option value="1">{{ _mt($moduleId,'HoldingTank.left') }}</option>
                            <option value="2">{{ _mt($moduleId,'HoldingTank.right') }}</option>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn btn-green green pull-right ladda-button placeAllUsers" disabled>{{ _mt($moduleId,'HoldingTank.proceed') }}</button>
                    </div>
               </form>
            </div>
        </div>
    </div>
    <div class="row holdingTank-tableWrapper">
        <div class="col-sm-12">
            <h3 class="title">{{ _mt($moduleId,'HoldingTank.holding_tank_table') }}</h3>
        </div>
        <div class="col-sm-12">
            <div class="holdingFilterWrapper">
            </div>
        </div>
        <div class="col-sm-12 holdingUserTable">
        </div>
    </div>

    <div class="holdingTankWrapper">
        <div class="col-md-12 filterByUser">
        </div>
        <div class="col-md-12 holdingTankList">
        </div>
    </div>

    <script type="text/javascript">

        $(function () {
            Ladda.bind('.ladda-button');

            loadHoldingFilter();

            //Select2
            $('.select').select2({
                width: '100%'
            });

            $('.toggleSwitchWrapper .switch').click(function () {
                let trigger = $(this).find('.trigger');
                switch ($(this).data('target')) {
                    case 'holding_tank':
                        if (trigger.hasClass('right')) {
                            trigger.removeClass('right');
                            $('.holding_tank').val(0);
                            $('.defaultPosition').hide();
                        } else {
                            trigger.addClass('right');
                            $('.holding_tank').val(1);
                            $('.defaultPosition').show();
                        }
                        break;
                }
            });
        });

        function loadHoldingFilter() {
            simulateLoading('.holdingFilterWrapper');
            $.post('{{ scopeRoute('holdingTank.filter') }}', function (response) {
                $('.holdingFilterWrapper').html(response);
                $('.filterRequest').trigger('click')
            });
        }

        function loadHoldingTable() {
            simulateLoading('.holdingUserTable');
            $.post('{{ scopeRoute('holdingTank.table') }}', $('.filterForm').serialize(), function (response) {
                $('.holdingUserTable').html(response);
                Ladda.stopAll();
            });
        }

        $('.changeStatusForm .saveStatus').click(function (e) {
            e.preventDefault();
            $.post('{{ scopeRoute('holdingTank.status') }}', $('.changeStatusForm').serialize(), function (response) {
                Ladda.stopAll();
                toastr.success("{{ _mt($moduleId,'HoldingTank.registration_status_changed_successfully') }}");
            });
        });

        $('.placeAllUsers').click(function (e) {
            e.preventDefault();
            $.post('{{ scopeRoute('holdingTank.placeAllUsers') }}', $('.placementForm').serialize(), function (response) {
                document.getElementById('totalHoldingUsers').innerHTML = response['holdingUsers'];
                document.getElementById('total_left').innerHTML = response['binaryInfo']['leftpoints'];
                document.getElementById('total_right').innerHTML = response['binaryInfo']['rightpoints'];
                document.getElementById('left_Carry').innerHTML = response['binaryInfo']['leftCarry'];
                document.getElementById('right_Carry').innerHTML = response['binaryInfo']['rightCarry'];
                Ladda.stopAll();
                //toastr.success("{{ _mt($moduleId,'HoldingTank.successfully_placed_all_users') }}");
                loadHoldingTable();
            });
        });
    </script>
@endsection
