<?php 
    use App\Eloquents\Package;
    use Illuminate\Support\Facades\Route;
?>
@php
    $user = loggedUser(); 
    $expires = false;
    if($user)
    {
        $package = Package::find($user->package_id);

        $valid_url = array("user.getGatewayitem","user.payment.handler","user.logout","user.getGateways","user.payment.callback");

        if($user->expiry_date && $user->expiry_date != '0000-00-00' && !in_array(Route::currentRouteName(),$valid_url))
        {
            if(Route::currentRouteName() != 'user.expirepayment')
            {
                $expiry_date = $user->expiry_date;
                $today = date('Y-m-d');


                if(!$expiry_date || strtotime($expiry_date) <= strtotime($today))
                {
                    $expires = true;
                    
                }
                
            }
        }
  
    }
   
    @endphp
@include('User.Layout.header')

<!-- BEGIN HEADER CLEARFIX-->
<div class="clearfix"></div>
@if($expires)
     <div class="modal fade in show" id="formular">

        <div class="modal-dialog">

          <div class="modal-content">

            <div class="modal-body">
                <div class="alert alert-block alert-danger">
                  <h4>Error !</h4>
                    
                    Hi there. Your account has been temporarily disabled for login.

                    Kindly click on the following link, 
                    <a href="{{route('user.expirepayment')}}">{{route('user.expirepayment')}}</a>

                    to make payment for your expired subscription, and regain access'.<br><br>
                    <span style="color: black">Bank code: (IBAN / BIC): TRWIBEB1XXX</span><br>
                    <span style="color: black">IBAN: BE21 9670 5753 4403</span><br>
                    <span style="color: black">REFERENCE: (your reference ID which we sent to your email, when your account was registered)</span><br><br>
                    <span style="color: black">For enquiries, please email: <a href="https://www.elysiumnetwork.io/">support@elysiumnetwork.io.</a></span>
                </div>
            </div>
          </div>
        </div>
    </div>  
@endif

@if(!loggedUser()->new)

@php
    $user = loggedUser();
    $user->new = true;
    $user->update(['new'=>true]);
@endphp
<div class="modal" tabindex="-1" role="dialog" id="starter">
    <div class="modal-dialog">
        <div class="modal-content" style="padding:20px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
    
            <div class="modal-body">
                <p>Hi {{loggedUser()->username}}</p>
                <p style="margin-bottom: 20px; margin-top:20px;">Welcome To Founders Launch, Please be aware of glitches and bugs but we're working hard to resolve them</p>
                <p>Please click NETWORK in the left bar and set your HOLDING TANK or settings (Top bar right) ASAP before you start to control others. ASK Your enroller for help if needed</p>
                <p style="margin-bottom: 20px;">Please don't mass email your link to your lists during this period</p>
                <p style="margin-bottom: 20px;">If you need assistance contact us at support@elysiumnetwork.io and let us know your 6-digit ID number (See welcome e-mail or at your profile).</p>
                <p style="margin-bottom: 20px;">Over the next few weeks you will see progress in your back office and our software. We'll keep you posted on any updates.</p>
                <p>We're happy to help you out!</p>
            </div>
            <div class="modal-footer">          
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>    
        </div>
        
    </div>
</div>
@endif
<div class="page-container">
@include('User.Layout.sideBar')
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
                        <div class="pageTitleRight">
                            {!! defineFilter('pageTitleRight', '', 'header'); !!}
                        </div>
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
    @include('User.Layout.quickSideBar')
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#starter').modal('show');
        $('button[data-dismiss=modal]').click(function(){
            $('#starter').modal('hide');
        })    
    })
    
</script>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
@include('User.Layout.footer')
<!-- END FOOTER -->