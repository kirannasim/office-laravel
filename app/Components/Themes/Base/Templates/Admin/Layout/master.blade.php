@include('Admin.Layout.header')
<!-- BEGIN HEADER CLEARFIX-->
<div class="clearfix"></div>
<div class="page-container">
@include('Admin.Layout.sideBar')
<!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content" style="min-height: 1001px;">
            <div class="row mainBreadcrumb">
                <div class="col-sm-12">
                    <div class="col-sm-5 BreadcrumbLeft">
                        @section('pageTitle')
                            <h1 class="page-title"> @if(isset($heading_text)){{ $heading_text }}@endif</h1>
                        @show
                        @if(isset($breadcrumbs))
                            <div class="page-bar">
                                <ul class="page-breadcrumb">
                                    @foreach($breadcrumbs as $key=> $value)
                                        <li>
                                            <a href="@if(isset($value)  && $value != '#'){{  route($value) }}@endif">{{ $key }}</a>

                                            @if($loop->iteration!=count($breadcrumbs))
                                                <i class="fa fa-angle-right"></i>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-7 BreadcrumbRight">
                        <div class="pageTitleRight"></div>
                    </div>
                </div>
            </div>
            @section('notification')
            @show
            @yield('content')
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    @include('Admin.Layout.quickSideBar')
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
@include('Admin.Layout.footer')
<!-- END FOOTER -->