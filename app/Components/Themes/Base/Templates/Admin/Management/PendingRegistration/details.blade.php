@if(isset($details))
    <div class="card">
        <div class="cardNav">
            <div class="navEach active" data-target="gateway">
                <i class="fa fa-google-wallet"></i> {{ _t('pendingRegistration.Order_Data') }}
            </div>
            <div class="navEach" data-target="userData">
                <i class="fa fa-user"></i> {{ _t('pendingRegistration.User_Data') }}
            </div>
            @if(!$details->status)
                <div class="approve">
                    <button class="btn green ladda-button activateUser" data-id="{{  $details->id }}"
                            data-style="contract">
                        <i class="fa fa-check"></i> {{ _t('pendingRegistration.Approve') }}
                    </button>
                </div>
            @endif
            <div class="approve">
                <button class="btn red ladda-button rejectUser" data-id="{{  $details->id }}"
                        data-style="contract">
                    <i class="fa fa-close"></i> Reject
                </button>
            </div>
        </div>
        <div class="cardBody active" data-target="gateway">
            <div class="eachData">
                {!! $cartSummery !!}
            </div>
        </div>
        <div class="cardBody" data-target="userData">
            @if(isset($details->value['orderData']['username']))
                <div class="eachData">
                    <label>{{ _t('profile.username') }}</label>
                    <span>{{ $details->value['orderData']['username'] }}</span>
                </div>
            @endif
            <div class="eachData">
                <label>{{ _t('profile.sponsor') }}</label>
                <span>{{ $details->value['orderData']['sponsor'] }}</span>
            </div>
            <div class="eachData">
                <label>{{ _t('profile.email') }}</label>
                <span>{{ $details->value['orderData']['email'] }}</span>
            </div>
            <div class="eachData">
                <label>{{ _t('profile.firstname') }}</label>
                <span>{{ $details->value['orderData']['firstname'] }}</span>
            </div>
            <div class="eachData">
                <label>{{ _t('profile.lastname') }}</label>
                <span>{{ $details->value['orderData']['lastname'] }}</span>
            </div>
            <div class="eachData">
                <label>{{ _t('profile.gender') }}</label>
                <span>{{ $details->value['orderData']['gender'] }}</span>
            </div>
            <div class="eachData">
                <label>{{ _t('profile.address') }}</label>
                <span>{{ $details->value['orderData']['address'] }}</span>
            </div>
            <div class="eachData">
                <label>{{ _t('profile.country') }}</label>
                <span>{{ getCountryName($details->value['orderData']['country_id']) }}</span>
            </div>
            <div class="eachData">
                <label>{{ _t('profile.state') }}</label>
                <span>{{ getStateName($details->value['orderData']['state_id']) }}</span>
            </div>
            <div class="eachData">
                <label>{{ _t('profile.city') }}</label>
                <span>{{ getCityName($details->value['orderData']['city_id']) }}</span>
            </div>
        </div>
    </div>
@else
    <h4>{{ _t('pendingRegistration.no_data_found') }}</h4>
@endif
<script>
    'use strict';

    $(function () {

        Ladda.bind('.ladda-button');

        $('.activateUser').click(function () {
            var id = $(this).attr('data-id');
            $.post('{{ route('management.pendingRegistrationActivate') }}', {bankWireRegId: id}, function () {
                toastr.success("{{ _t('pendingRegistration.Registration_activated_successfully') }}");
                fetchData();
            })
        });
    });
    //delete autoresponder form

</script>
<style>
    .approve .rejectUser {
        margin-left: 6px;
    }
</style>