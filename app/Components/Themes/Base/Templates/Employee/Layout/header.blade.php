<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    @include('Employee.Layout.head')
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<div class="page-wrapper">
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="#">
                    <img src="{{ logo() }}" alt="logo" style="width: 136px;padding-left: 13px;" class="logo-default">
                </a>
                <div class="menu-toggler sidebar-toggler">
                    <span></span>
                </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
               data-target=".navbar-collapse">
                <span></span>
            </a>
            <button class="topMenuButton"><i class="fa fa-user"></i></button>
            <li class="timePieceHolder">
                <div class="month">{{ date('M') }}<span>{{ date('Y') }}</span></div>
                <div class="icon">
                    <i class="fa fa-clock-o"></i>
                    <span class="day">
                        <span class="string">{{ date('D') }}</span>
                        <span class="numeric">{{ date('m') }}</span>
                    </span>
                </div>
                <div class="local timePiece">
                    <div class="tag">Local</div>
                    <div class="innerContainer">
                        <div class="hours">00</div>
                        <div class="separator">:</div>
                        <div class="minutes">00</div>
                        <div class="seconds">00</div>
                        <div class="ampm">AM</div>
                    </div>
                </div>
                <div class="server timePiece">
                    <div class="tag">Server</div>
                    <div class="innerContainer">
                        <div class="hours">00</div>
                        <div class="separator">:</div>
                        <div class="minutes">00</div>
                        <div class="seconds">00</div>
                        <div class="ampm">PM</div>
                    </div>
                </div>
            </li>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="currencyPicker header"> @component('Components.selectCurrency') 16 @endcomponent</li>
                    <li class="languagePicker header"> @component('Components.selectLocal') 16 @endcomponent</li>
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after "dropdown-extended" to change the dropdown styte -->
                    <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                    <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <i class="fas fa-bell"></i>
                            <span class="badge badge-default"> {{ loggedUser()->unreadNotifications()->count() }} </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>
                                    <span class="bold">{{ loggedUser()->unreadNotifications()->count() }} {{ _t('general.pending') }}</span>
                                    {{ _t('general.notifications') }}</h3>
                                <a href="page_user_profile_1.html">{{ _t('general.view_all') }}</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller notificationHolder" data-handle-color="#637283"
                                    data-initialized="1">
                                    @forelse(loggedUser()->unreadNotifications()->get() as $notification)
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">{{ $notification->created_at->diffForHumans() }}</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="{{ collect($notification->data)->get('icon', 'fa fa-bell') }}"
                                                           style="color: {{ collect($notification->data)->get('iconColor') }}"></i>
                                                    </span> {{ collect($notification->data)->get('subject') }} </span>
                                            </a>
                                        </li>
                                    @empty
                                        <div class="noNotification">
                                            <i class="fa fa-exclamation-circle"></i>{{ _t('general.No_notifications') }}
                                        </div>
                                    @endforelse
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true" aria-expanded="false">
                            <i class="fas fa-envelope-open-text"></i>
                            <span class="badge badge-default">{{ getUnreadMail()->count() }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>{{ _t('general.You_have') }}
                                    <span class="bold">{{ getUnreadMail()->count() }}{{ _t('general.New') }}</span> {{ _t('general.Messages') }}
                                </h3>
                                @if(count(getUnreadMail()))
                                    <a href="mail">{{ _t('general.view_all') }}</a>
                                @endif
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" data-handle-color="#637283"
                                    data-initialized="1">
                                    @forelse(getUnreadMail() as $key => $mail)
                                        <li>
                                            <a href="mail">
                                                <span class="photo">{{ getUserData($mail->mailOwner()) }}
                                                    <img src="{{ asset(getUserData($mail->mailOwner()->id)->profile_pic) }}"
                                                         class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> {{ $mail->mailOwner()->username }} </span>
                                                    <span class="time">{{ $mail->created_at }} </span>
                                                </span>
                                                <span class="message">{{ $mail->subject }} </span>
                                            </a>
                                        </li>
                                    @empty
                                        <div class="noUnreadMail">
                                            <i class="fa fa-exclamation-circle"></i>{{ _t('general.No_unread_mails') }}
                                        </div>
                                    @endforelse
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <img alt="" class="img-circle"
                                 src="{{ getProfilePic(loggedUser()) }}">
                            <span class="username username-hide-on-mobile"> {{  loggedUser()->username }} </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{ route(strtolower(getScope()).'.profile') }}">
                                    <i class="icon-user"></i> {{ _t('general.My_Profile') }} </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route(strtolower(getScope()).'.lockScreen') }}">
                                    <i class="fa fa-desktop"></i> {{ _t('general.Lock_Screen') }} </a>
                            </li>
                            <li>
                                <a href="{{ route(strtolower(getScope()).'.logout') }}">
                                    <i class="icon-key"></i> {{ _t('general.Log_Out') }} </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
    <script>
        $(document).ready(function () {
            $("button.topMenuButton").click(function () {
                $(".top-menu").toggle();
            });
        });
    </script>
