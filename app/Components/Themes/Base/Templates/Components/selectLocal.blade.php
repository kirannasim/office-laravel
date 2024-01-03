<div class="btn-group localSwitcher">
    <a class="btn btn-circle btn-default btn-sm" href="javascript:;" data-toggle="dropdown"
       aria-expanded="false">
        <img src="{{ asset('images/flags/flags_iso/' .$slot. '/' .LaravelLocalization::getCurrentLocale(). '.png' ) }}">
        {{ LaravelLocalization::getCurrentLocaleNative() }}
        <i class="fa fa-angle-down"></i>
    </a>
    <ul class="dropdown-menu" role="menu">
        @php
            $lang = json_decode(getConfig('localization','manage_language'));
        @endphp
        @foreach(LaravelLocalization::getSupportedLocales() as $key => $local)
            @if(LaravelLocalization::getCurrentLocale()!= $key && in_array($key, $lang))
                <li>
                    <a rel="alternate" hreflang="{{ $key }}"
                       href="{{ LaravelLocalization::getLocalizedURL($key, null, [], true) }}">
                        <img src="{{ asset('images/flags/flags_iso/' .$slot. '/' .$key. '.png' ) }}">
                        {{ $local['native'] }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>