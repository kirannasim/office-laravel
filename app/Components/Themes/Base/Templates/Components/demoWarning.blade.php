@php
    $message = (isset($message) && $message) ? $message : 'You are not allowed to make changes in this area on demo mode';
@endphp
@if(isDemoVersion())
    <div class="demoWarning">
        <i class="fa fa-warning"></i>{{ $message }}
        <div class="contactUs">
            If you are interested in custom demo please contact us
            <div class="options">
                <span class="email">
                    <i class="fa fa-at"></i>
                    <a href="mailto:info@hybridmlm.io?Subject=Custom%20demo" target="_top">Info@hybridmlm.io</a>
                </span>
                <span class="skype">
                    <i class="fa fa-skype"></i>
                    <a href="skype:Hybridmlmsoftware" target="_top">Hybridmlmsoftware</a>
                </span>
            </div>
        </div>
    </div>
@endif