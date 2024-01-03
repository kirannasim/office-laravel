@extends('User.Layout.master')
@section('content')
    <script type="text/javascript">
        $(".page-content").css("padding", "0px");
        $(".page-content").css("display", "flex");
        $(".page-content").css("background-color", "#384253");
        $(".mainBreadcrumb").css("display", "none");

        // //Document ready scripts
        $(function () {
            $('body').addClass('page-sidebar-closed');
            $('.page-sidebar-menu').addClass('page-sidebar-menu-closed');
        });
    </script>
    <style>
        .page-content-wrapper .page-content {
            position: relative;
            padding: 0px !important;
        }
        .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu > li.active > a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu > li.active.open > a, .page-sidebar .page-sidebar-menu > li.active > a, .page-sidebar .page-sidebar-menu > li.active.open > a 
        {
            background-color: #00a6e0 !important;   
        }

        .active
        {
           background-color: #00a6e0; 
        }
    </style>
    <div class="lds-spinner">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    @if ($xoom_autologin_token)
        {{-- https://{{ ltrim(ltrim(rtrim(strtolower($moduleData['XOOM_APP_DOMAIN']), '/'), 'https://'), 'http://') }}/auth/login/subaccount?t={{ $xoom_autologin_token }}  --}}
        <iframe style="align-items:stretch;width:100%;border:0;z-index:1;" frameborder="0"
                src="https://{{ ltrim(ltrim(rtrim(strtolower($moduleData['XOOM_APP_DOMAIN']), '/'), 'https://'), 'http://') }}/auth/login/{{ $xoom_autologin_token }}"></iframe>
    @else
        <div class="row">
            {{ _t('xoom.no_xoom_account') }}
        </div>
    @endif
@endsection
