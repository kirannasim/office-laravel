@include('GuestLayout.header')

<!-- BEGIN HEADER CLEARFIX-->
<div class="clearfix"></div>
<!-- BEGIN HEADER CLEARFIX-->

<!-- BEGIN PAGE CONTAINER -->
<div class="page-container container">
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">

        @section('pageTitle')
            <!-- BEGIN PAGE TITLE-->
                <h1 class="page-title"> Home page
                    <small>Hybrid MLM </small>
                </h1>
                <!-- END PAGE TITLE-->
            @show

            @yield('content')
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
@include('GuestLayout.footer')
<!-- END FOOTER -->
