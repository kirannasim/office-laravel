@component('mail::message')
    {!! $letter_body !!}
    @component('mail::panel')
        Your Transaction Password : {{ $tran_password }}
    @endcomponent
    @component('mail::button', ['url' => $login_link])
        {{_t('register.click_to_login')}}
    @endcomponent
    {{_t('register.thanks')}}<br>
    {{ config('app.name') }}
@endcomponent
