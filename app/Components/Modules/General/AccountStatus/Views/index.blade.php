<div class="heading">
    <h3>{{ _mt($moduleID,'AccountStatus.Activate_Deactivate') }}</h3>
</div>
<form name="accountStatusForm" id="accountStatusForm">

    <input type="hidden" name="member_id" id="member_id" value="{{ $user_id }}">
    <div class="eachField row">
        <div class="col-md-3">
            <label>{{ _mt($moduleID,'AccountStatus.member_status') }}</label>
        </div>
        <div class="col-md-9">
            <select class="form-control" name="member_status" id="member_status">
                <option value="active"
                        @if($userStatusData['title'] =='active') selected @endif >{{ _mt($moduleID,'AccountStatus.active') }}</option>
                <option value="inactive"
                        @if($userStatusData['title'] =='inactive') selected @endif >{{ _mt($moduleID,'AccountStatus.inactive') }}</option>
                <option value="terminated"
                        @if($userStatusData['title'] =='terminated') selected @endif >{{ _mt($moduleID,'AccountStatus.terminated') }}</option>
                <option value="custom"
                        @if($userStatusData['title'] =='custom') selected @endif >{{ _mt($moduleID,'AccountStatus.custom') }}</option>
            </select>
        </div>
    </div>
    <div class="eachField row">
        <div class="col-md-3">
            <label>{{ _mt($moduleID,'AccountStatus.Suspend_Login') }}</label>
        </div>
        <div class="col-md-1">
            <div class="md-checkbox">
                <input type="checkbox" id="login_status" name="login_status"
                       @if($userStatusData['title'] !='custom') disabled="true"
                       @endif  class="md-check statusOptionCheck" @if($userStatusData['login']) checked
                       @endif value="1">
                <label for="login_status">
                    <span class="inc"></span>
                    <span class="check"></span>
                    <span class="box"></span></label>
            </div>
        </div>
        <div class="col-md-8">
            <span class="alertText">{{ _mt($moduleID,'AccountStatus.block_the_users_login_access_to_the_system') }}</span>
        </div>
    </div>

    <div class="eachField row">
        <div class="col-md-3">
            <label>{{ _mt($moduleID,'AccountStatus.suspend_Commission') }}</label>
        </div>
        <div class="col-md-1">
            <div class="md-checkbox">
                <input type="checkbox" id="commission_status" name="commission_status"
                       @if($userStatusData['title'] !='custom') disabled="true"
                       @endif class="md-check statusOptionCheck" @if($userStatusData['commission']) checked
                       @endif value="1">
                <label for="commission_status">
                    <span class="inc"></span>
                    <span class="check"></span>
                    <span class="box"></span></label>
            </div>
        </div>
        <div class="col-md-8">
            <span class="alertText">{{ _mt($moduleID,'AccountStatus.block_the_users_in_getting_commission_from_the_system') }}</span>
        </div>
    </div>

    <div class="eachField row">
        <div class="col-md-3">
            <label>{{ _mt($moduleID,'AccountStatus.suspend_Payout') }}</label>
        </div>
        <div class="col-md-1">
            <div class="md-checkbox">
                <input type="checkbox" id="payout_status" name="payout_status"
                       @if($userStatusData['title'] !='custom') disabled="true"
                       @endif class="md-check statusOptionCheck" @if($userStatusData['payout']) checked
                       @endif value="1">
                <label for="payout_status">
                    <span class="inc"></span>
                    <span class="check"></span>
                    <span class="box"></span></label>
            </div>
        </div>
        <div class="col-md-8">
            <span class="alertText">{{ _mt($moduleID,'AccountStatus.block_the_users_in_getting_Payout_from_the_system') }}</span>
        </div>
    </div>

    <div class="eachField row">
        <div class="col-md-3">
            <label>{{ _mt($moduleID,'AccountStatus.suspend_Fund_Transfer') }}</label>
        </div>
        <div class="col-md-1">
            <div class="md-checkbox">
                <input type="checkbox" id="fund_transfer_status" name="fund_transfer_status"
                       @if($userStatusData['title'] !='custom') disabled="true"
                       @endif class="md-check statusOptionCheck" @if($userStatusData['fund_transfer']) checked
                       @endif value="1">
                <label for="fund_transfer_status">
                    <span class="inc"></span>
                    <span class="check"></span>
                    <span class="box"></span></label>
            </div>
        </div>
        <div class="col-md-8">
            <span class="alertText">{{ _mt($moduleID,'AccountStatus.block_the_users_from_transferring_wallet_balance') }}</span>
        </div>
    </div>


    <div class="eachField row">
        <div class="col-md-3">
            <button type="button" class="btn btn-success ladda-button submitForm"
                    data-style="contract">{{ _mt($moduleID,'AccountStatus.save') }}</button>
        </div>
    </div>
</form>
<script>"use strict";

    $(function () {
        Ladda.bind('.ladda-button');
    });
    $('#member_status').change(function () {
        if ($(this).val() == 'terminated') {
            $('.statusOptionCheck').prop('checked', true).attr('disabled', true);
        } else if ($(this).val() == 'active') {
            $('.statusOptionCheck').prop('checked', true).attr('disabled', true);
        } else if ($(this).val() == 'inactive') {
            $('.statusOptionCheck').prop('checked', false).attr('disabled', false);
            $('#commission_status').prop('checked', true);
            $('#login_status').prop('checked', true);
        } else if ($(this).val() == 'custom') {
            $('.statusOptionCheck').prop('checked', false).attr('disabled', false);
        }

    });
    $('.submitForm').click(function () {
        var formData = $('#accountStatusForm').serialize();
        $.post('{{ route("accountStatus.save") }}', formData, function (response) {
            toastr.success('{{ _mt($moduleID,'AccountStatus.member_status_updated') }}');
            Ladda.stopAll();
        }).fail(function () {
            Ladda.stopAll();
        });
    });
</script>
<style>
    .alertText {
        color: #999;
    }
</style>
