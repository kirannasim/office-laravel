<html>
<link href="{{ asset('global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<script src="{{ asset('global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<link href="{{ asset('global/plugins/line-awesome-master/dist/css/line-awesome-font-awesome.css') }}" rel="stylesheet"
      type="text/css"/>
<title>{!! getConfig('company_information','company_name') !!} @if(isset($title)) -  {{ $title }}@endif</title>
<body class="blueprintLockWrapper">
<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <img class="login-logo" src="{{ logo() }}"/>
    </div>
    @php
        $user =  loggedUser();
    @endphp
    <div class="lockscreen-name">{{ $user->metaData->firstname.' '.$user->metaData->lastname }}</div>
    <div class="lockscreen-item">
        <div class="lockscreen-image">
            <img src="{{ getProfilePic($user) }}" alt="User Image">
        </div>
        {!! Form::open(['route' => getScope().'.unlock', 'class' => 'lockscreen-credentials', 'method' => 'post']) !!}
        <div class="input-group">
            <input type="password" name="password" class="form-control" placeholder="password">

            <div class="input-group-btn">
                <button type="submit" value="Unlock" class="btn"><i class="fa fa-arrow-right text-muted"></i>
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="help-block text-center">
        Enter your password to retrieve your session
    </div>
    <div class="text-center">
        <a href="{{ route(strtolower(getScope()).'.logout') }}">Or sign in as a different user</a>
    </div>

</div>
</body>
</html>


<style>
    body.blueprintLockWrapper {
        background-color: #47525d;
    }

    .lockscreen-wrapper {
        max-width: 400px;
        margin: 0 auto;
        margin-top: 10%;
        color: #eee;
    }

    .lockscreen-logo {
        font-size: 35px;
        text-align: center;
        margin-bottom: 25px;
        font-weight: 300;
    }

    .lockscreen-logo img.login-logo {
        width: 200px;
    }

    .lockscreen-logo a {
        color: #444;
    }

    .lockscreen-wrapper .lockscreen-name {
        text-align: center;
        font-weight: 600;
    }

    .lockscreen-credentials input.form-control {
        border: 0px;
    }

    .lockscreen-item {
        border-radius: 4px;
        padding: 0;
        background: #fff;
        position: relative;
        margin: 10px auto 30px auto;
        width: 290px;
    }

    .lockscreen-image {
        border-radius: 50%;
        position: absolute;
        left: -10px;
        top: -25px;
        background: #fff;
        padding: 5px;
        z-index: 10;
    }

    .lockscreen-image > img {
        border-radius: 50%;
        width: 70px;
        height: 70px;
    }

    .lockscreen-credentials {
        margin-left: 70px;
    }

    .lockscreen-wrapper .input-group {
        position: relative;
        display: table;
        border-collapse: separate;
    }

    .lockscreen-wrapper .input-group-btn {
        position: relative;
        font-size: 0;
        white-space: nowrap;
    }

    .lockscreen-wrapper .help-block {
        display: block;
        margin-top: 5px;
        margin-bottom: 10px;
        color: #c2bdbd;
    }

    .lockscreen-wrapper .text-center {
        text-align: center;
    }

    .lockscreen-wrapper .text-center a {
        color: #d9d9d9;
    }
</style>