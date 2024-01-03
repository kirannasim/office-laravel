@extends('User.Layout.master')
@section('content')
    <script type="text/javascript">
        $(".page-content").css("padding", "0px");
        $(".page-content").css("display", "flex");
        $(".page-content").css("background-color", "#384253");
        $(".mainBreadcrumb").css("display", "none");

        //Document ready scripts
       
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
    @if ($soho_autologin_user)
        <iframe style="align-items:stretch;width:100%;border:0;z-index:1;" frameborder="0"
                src="{{ $soho_autologin_user }}"></iframe>
    @else
        <div class="row">
            {{ _t('soho.no_soho_account') }}
        </div>
    @endif
@endsection
