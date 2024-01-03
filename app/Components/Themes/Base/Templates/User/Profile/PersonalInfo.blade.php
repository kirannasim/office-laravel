@extends('User.Layout.master')
@section('content')
@include('_includes.profile_nav')
<div class="side-content-menu-up">
        <div class="row careerWrapper">
            @if ($message = Session::get('success'))
                <div class="success-session alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="col-md-4">
                <div class="personalInfoCol">
                    <h3 class="infoTitle mb-5">PERSONAL INFO</h3>
                    <form action="{{route('user.update')}}" method="post" data-form="personal-information">
                        @csrf
                        {{--Given Name--}}
                        <div class="form-group">
                            <label for="lastname">Given Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{old('lastname',$user->metaData->lastname)}}"/>
                        </div>
                        {{--Surname--}}
                        <div class="form-group">
                            <label for="firstname">Surname</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{old('firstname',$user->metaData->firstname)}}" />
                        </div>
                        {{--Gender--}}
                        <div class="form-group">
                            <label for="gender" style="margin-bottom: 15px;">Gender</label>
                            <div class="radio-list">
                                <label class="radio-container">
                                    <input type="radio" name="gender" value="M"
                                           data-title="Male" {{$user->metaData->gender == "M"?"checked":""}}/>
                                    <span class="checkbox-circle"></span>
                                    <span class="checkbox-name">Male</span>
                                </label>
                                <label class="radio-container">
                                    <input type="radio" name="gender" value="F"
                                           data-title="Female" {{$user->metaData->gender == "F"?"checked":""}}/>
                                    <span class="checkbox-circle"></span>
                                    <span class="checkbox-name">Female</span>
                                </label>
                            </div>
                            <!-- <input type="text" class="form-control" id="gender" name="gender"/> -->
                        </div>
                        {{--Street  Name--}}
                        <div class="form-group">
                            <label for="street_name">Street  Name</label>
                            <input type="text" class="form-control" id="street_name" name="street_name" value="{{old('street_name',$user->metaData->street_name)}}"/>
                        </div>
                        {{--House Number--}}
                        <div class="form-group">
                            <label for="house_no">House Number</label>
                            <input type="text" class="form-control" id="house_no" name="house_no" value="{{old('house_no',$user->metaData->house_no)}}"/>
                        </div>
                        {{--City--}}
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{old('city',$user->metaData->city)}}"/>
                        </div>
                        {{--Post Code--}}
                        <div class="form-group">
                            <label for="postcode">Post Code</label>
                            <input type="text" class="form-control" id="postcode" name="postcode" value="{{old('postcode',$user->metaData->postcode)}}"/>
                        </div>
                        {{--Country--}}
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select class="form-control" id="country_id" name="country_id">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                <option value="{{$country['id']}}" @if ($country['id'] == $user->metaData->country_id) selected @endif >{{$country['name']}}</option>
                                @endforeach
                            </select>
                            <!-- <input type="text" class="form-control" id="country" name="country"/> -->
                        </div>
                        {{--Mobile Number--}}
                        <div class="form-group">
                            <label for="phone">Mobile Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone',$user->phone)}}"/>
                        </div>
                        {{--E-mail Address--}}
                        <div class="form-group">
                            <label for="email_address">E-mail Address</label>
                            <input type="text" class="form-control" id="email_address" name="email" value="{{old('email',$user->email)}}"/>
                        </div>
                        <input type="hidden" value="personalinfo" name="update_type"/>
                        {{--Update--}}
                        <div class="form-group updateBtnBox mt-5">
                            <button class="btn button-submit" data-button="submit" tabindex="10">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="accountInfoCol">
                    <h3 class="infoTitle mb-5">ACCOUNT INFO</h3>
                    <form action="{{route('user.update')}}" method="post" data-form="accountform">
                        {{--Client ID--}}
                        <div class="form-group">
                            <label for="customer_id">Customer ID</label>
                            <input type="text" class="form-control" id="customer_id" name="customer_id" value="{{old('customer_id',$user->customer_id)}}" />
                        </div>
                        {{--Username--}}
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{old('username',$user->username)}}"/>
                        </div>

                        <h3 class="infoTitle mt-5 mb-5" style="margin-top: 70px;">PASSWORD</h3>
                        {{--Current Password--}}
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" class="form-control"  value="{{old('password',$user->password)}}" id="current_password" name="current_password"/>
                             <label id="current_password-error" class="has-error" for="current_password" style="display: none">This field is required</label>
                        </div>
                        {{--New Password--}}
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password"/>
                            <label id="new_password-error" class="has-error" for="new_password" style="display: none">This field is required</label>
                        </div>
                        {{--Re-type Password--}}
                        <div class="form-group">
                            <label for="re_type_password">Re-type Password</label>
                            <input type="password" class="form-control" id="re_type_password" name="re_type_password"/>
                            <label id="re_type_password-error" class="has-error" for="re_type_password" style="display: none">This field has to be equal to New Password</label>
                        </div>
                        <input type="hidden" value="accountinfo" name="update_type"/>
                        {{--Update--}}
                        <div class="form-group updateBtnBox mt-5">
                            <button class="btn button-submit" data-button="account-submit" tabindex="10">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="legalInfoCol careerWrapper">
                    <h3 class="infoTitle mb-5">LEGAL INFO</h3>
                    <form action="{{route('user.update')}}" method="post" data-form="legalform">
                        @csrf
                        {{--Passport Number--}}
                        <div class="form-group">
                            <label for="passport_number">Passport Number</label>
                            <input type="text" class="form-control" id="passport_number" name="passport_no" value="{{old('passport_no',$user->metaData->passport_no)}}"/>
                        </div>
                        {{--Date of Passport Issuance--}}
                        <div class="form-group">
                            <label for="date_passport_issuance">Date of Passport Issuance</label>
                            <input type="text" class="form-control" id="date_passport_issuance" name="date_of_passport_issuance" readonly tabindex="4" value="{{$user->metaData->date_of_passport_issuance}}" />
                        </div>
                        {{--Passport Expiration Date--}}
                        <div class="form-group">
                            <label for="passport_expiration_date">Passport Expiration Date</label>
                            <input type="text" class="form-control" id="passport_expiration_date" name="passport_expirition_date" readonly tabindex="4" value="{{isset($user->metaData->passport_expirition_date)?$user->metaData->passport_expirition_date:''}}"/>
                        </div>
                        {{--Date of Birth--}}
                        <div class="form-group">
                            <label for="date_birth">Date of Birth</label>
                            <input type="text" class="form-control" id="dob" name="dob" readonly="" tabindex="4" value="{{$user->metaData->dob}}"/>
                        </div>
                        {{--Place of Birth--}}
                        <div class="form-group">
                            <label for="place_of_birth">Place of Birth</label>
                            <select class="form-control" id="place_of_birth" name="place_of_birth">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{$country['id']}}" @if ($country['id'] == $user->metaData->place_of_birth) selected @endif >{{$country['name']}}</option>
                                @endforeach
                            </select>
                            {{--<input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="{{old('place_of_birth',$user->metaData->place_of_birth)}}"/>--}}
                        </div>
                        {{--Country of Passport Issuance--}}
                        <div class="form-group">
                            <label for="country_of_passport_issuance">Country of Passport Issuance</label>
                            <select class="form-control" id="country_of_passport_issuance" name="country_of_passport_issuance">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                <option value="{{$country['id']}}" @if ($country['id'] == $user->metaData->country_of_passport_issuance) selected @endif >{{$country['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{--Nationality--}}
                        <div class="form-group">
                            <label for="nationality">Nationality</label>
                            <select class="form-control" id="nationality" name="nationality">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{$country['id']}}" @if ($country['id'] == $user->metaData->nationality) selected @endif >{{$country['name']}}</option>
                                @endforeach
                            </select>
{{--                            <input type="text" class="form-control" id="nationality" name="nationality" value="{{old('nationality',$user->metaData->nationality)}}"/>--}}
                        </div>
                        <input type="hidden" value="legalinfo" name="update_type"/>
                        {{--Update--}}
                        <div class="form-group updateBtnBox mt-5">
                            <button class="btn button-submit" data-button="legal-submit" tabindex="10">Update</button>
                        </div>
                    </form>
                </div>
            </div>













            {{--<div class="col-lg-12">--}}
                {{--<form data-form="personal-information" action="{{route('user::personal_information')}}" method="post">--}}
                    {{--@if ($errors->any())--}}
                        {{--<div class="alert alert-danger">--}}
                            {{--<ul class="m-0">--}}
                                {{--@foreach ($errors->all() as $error)--}}
                                    {{--<li>{{ $error }}</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--@csrf--}}

                    {{--<div class="row">--}}
                        {{--<div class="col-lg-10 offset-lg-1 align-self-center text-center m-auto mt-5">--}}
                            {{--<h3 class="mb-2">Personal information</h3>--}}
                            {{--<p class="mb-5">(Account affiliated by: {{$affiliate}})</p>--}}
                            {{--<div class="row mb-4">--}}
                                {{--<div class="col-12">--}}
                                    {{--<div class="row">--}}

                                        {{--<div class="col-sm-6 pl-sm-2 mb-2">--}}
                                            {{--<div class="form-group text-left">--}}
                                                {{--<label class="label-title">First name *</label>--}}
                                                {{--<input type="text" name="first_name" class="form-control"--}}
                                                       {{--id="first_name" placeholder="Full legal first name(s)"--}}
                                                       {{--tabindex="1"--}}
                                                       {{--value="{{old('first_name', $user->first_name)}}">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="col-sm-6 pr-sm-2 mb-2">--}}
                                            {{--<div class="form-group position-relative text-left">--}}
                                                {{--<label class="label-title">Last name *</label>--}}
                                                {{--<input type="text" name="last_name" class="form-control"--}}
                                                       {{--id="last_name" placeholder="Full legal last name(s)"--}}
                                                       {{--tabindex="2"--}}
                                                       {{--value="{{old('last_name', $user->last_name)}}">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="col-sm-6 pl-sm-2 mb-2">--}}
                                            {{--<div class="form-group position-relative text-left mn-2">--}}
                                                {{--<label class="label-title">Phone number *</label>--}}
                                                {{--<input type="text" name="phone" class="form-control"--}}
                                                       {{--id="phone" placeholder="Phone number (e.g. +48 123 456 789)"--}}
                                                       {{--tabindex="3"--}}
                                                       {{--value="{{old('phone', $user->phone)}}">--}}
                                            {{--</div>--}}
                                            {{--<p class="description-paragraph text-left mb-0">--}}
                                                {{--To confirm your new mobile phone number,--}}
                                                {{--<a href="#" class="text-link">click here</a> (Optional)</p>--}}
                                        {{--</div>--}}

                                        {{--<div class="col-sm-6 pr-sm-2 mb-2">--}}
                                            {{--<div class="form-group position-relative text-left">--}}
                                                {{--<label class="label-title">Date of birth *</label>--}}
                                                {{--<input type="text" name="birth_date" class="form-control"--}}
                                                       {{--id="birth_date" placeholder="Date of birth (YYYY-mm-dd)"--}}
                                                       {{--readonly tabindex="4"--}}
                                                       {{--value="{{old('birth_date', $user->birth_date)}}">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="row mb-4">--}}

                                        {{--<div class="col-12 pl-sm-2">--}}
                                            {{--<h4 class="text-left mt-4">Your address</h4>--}}
                                            {{--<hr class="mt-0 mb-4">--}}
                                        {{--</div>--}}

                                        {{--<div class="col-sm-6 pl-sm-2 mb-2">--}}
                                            {{--<div class="form-group text-left">--}}
                                                {{--<label class="label-title">Country *<br>(Please note that we cannot accept--}}
                                                    {{--clients from the United States</label>--}}
                                                {{--<div class="select">--}}
                                                    {{--<select type="text" name="country_id" class="form-control"--}}
                                                            {{--id="country_id" style="height: 49px;" tabindex="5">--}}
                                                        {{--@foreach($countries as $country)--}}
                                                            {{--<option value="{{$country->id}}"--}}
                                                                    {{--{{ (collect(old('country_id', $user->country->id))->contains($country->id)) ? 'selected=selected':'' }}--}}
                                                            {{-->{{$country->name}}</option>--}}
                                                        {{--@endforeach--}}
                                                    {{--</select>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="col-sm-6 pr-sm-2 mb-2 d-flex flex-row align-items-end">--}}
                                            {{--<div class="form-group text-left w-100">--}}
                                                {{--<label class="label-title">State/Region</label>--}}
                                                {{--<input type="text" name="state" class="form-control"--}}
                                                       {{--id="state" placeholder="State/Region"--}}
                                                       {{--tabindex="6"--}}
                                                       {{--value="{{old('state', $user->state)}}">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="col-sm-6 pl-sm-2 mb-2">--}}
                                            {{--<div class="form-group position-relative text-left">--}}
                                                {{--<label class="label-title">Street address *</label>--}}
                                                {{--<input type="text" name="street_address" class="form-control"--}}
                                                       {{--id="street_address" placeholder="Street Address"--}}
                                                       {{--tabindex="7"--}}
                                                       {{--value="{{old('street_address', $user->street_address)}}">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="col-sm-6 pr-sm-2 mb-2">--}}
                                            {{--<div class="form-group position-relative text-left">--}}
                                                {{--<label class="label-title">City *</label>--}}
                                                {{--<input type="text" name="city" class="form-control"--}}
                                                       {{--id="city" placeholder="City"--}}
                                                       {{--tabindex="8"--}}
                                                       {{--value="{{old('city', $user->city)}}">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="col-sm-6 pl-sm-2 mb-2">--}}
                                            {{--<div class="form-group position-relative text-left">--}}
                                                {{--<label class="label-title">Postal/Zip Code *</label>--}}
                                                {{--<input type="text" name="postal_code" class="form-control" id="postal_code"--}}
                                                       {{--placeholder="Postal/Zip Code" tabindex="9"--}}
                                                       {{--value="{{old('postal_code', $user->postal_code)}}">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        </div>
    </div>

    <script src="{{ url('/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('/js/bootstrap-datepicker.min.js') }}"></script>

    <script type="text/javascript">
        const register = {
            init: function () {
                this.variables();
                this.addEventListeners();
                this.validateForms();
                this.datePicker();
            },
            variables: function () {
                this.form = $('[data-form="personal-information"]');
                this.accountform = $('[data-form="accountform"]');
                this.submitButton = $('[data-button="submit"]');
                this.updatebutton = $('[data-button="account-submit"]');
                this.dateBirthInput = $('#dob');
                this.passport_expiration_date = $('#passport_expiration_date');
                this.date_passport_issuance = $('#date_passport_issuance');
                this.legalform = $('[data-form="legalform"]');
                this.legalbutton = $('[data-button="legal-submit"]');
            },
            addEventListeners: function () {
                this.form.on('submit', function (event) {
                    // event.preventDefault();
                    this.validateForms();
                }.bind(this));
                this.accountform.on('submit',function(event){
                    this.validateForms();
                }.bind(this))
                this.submitButton.on('click', function () {
                    this.form.submit();
                }.bind(this));

                this.updatebutton.on('click',function(){
                    this.accountform.submit();
                }.bind(this))

                this.legalform.on('submit',function(event){
                    this.validateForms();
                }.bind(this))

                this.legalbutton.on('click',function(event){
                    this.legalform.submit();
                }.bind(this))

                $(document).on('keypress', function (e) {
                    if (e.which === 13) {
                        this.form.submit();
                    }
                }.bind(this));


            },
            firstInputFocus: function () {
                $('#firstname').focus();
            },
            adderror:function(element,errtext){
                $(element).closest('.form-group').find('label').addClass('error-text');
                $(element).closest('.form-group').find('label').removeClass('valid-text');
                $(element).closest('.form-group').find('input').addClass("has-error");
                $(element).closest('.form-group').find('input').removeClass('valid');
                $(element).closest('.form-group').find('label').show();
            },
            hideerror:function(element){
                $(element).closest('.form-group').find('label').removeClass('error-text');
                $(element).closest('.form-group').find('label').addClass('valid-text');
                $(element).closest('.form-group').find('input').removeClass("has-error");
                $(element).closest('.form-group').find('input').addClass('valid');
                $(element).closest('.form-group').find('label').hide();
            },
            validateForms: function () {
                this.form.validate({
                    errorClass: "has-error",
                    validClass: 'valid',
                    onkeyup: function (element) {
                        $(element).valid();
                    },
                    rules: {
                        firstname: {
                            required: true,
                            minlength: 3,
                            maxlength: 50
                        },
                        lastname: {
                            required: true,
                            minlength: 3,
                            maxlength: 50
                        },
                        phone: {
                            required: true,
                            phone_number: true,
                            minlength: 8,
                            maxlength: 17
                        },
                        dob: {
                            required: true,
                            birthday_date: true
                        },
                        passport_expiration_date:{
                            required:true,
                            birthday_date:true
                        },
                        date_passport_issuance:{
                            required:true,
                            date:true
                        },
                        country_id: {
                            required: true
                        },
                        state: {
                            required: true,
                            minlength: 2,
                            maxlength: 64
                        },
                        street_name: {
                            required: true,
                            minlength: 2,
                            maxlength: 100
                        },
                        city: {
                            required: true,
                            minlength: 2,
                            maxlength: 60
                        },
                        postal_code: {
                            required: true,
                            number: true,
                            minlength: 2,
                            maxlength: 10
                        },
                        email:{
                            required:true,
                            email:true
                        }


                    },
                    highlight: function (element, errorClass, validClass) {
                        $(element).closest('.form-group').find('label').addClass('error-text');
                        $(element).closest('.form-group').find('label').removeClass('valid-text');
                        $(element).closest('.form-group').find('input').addClass(errorClass);
                        $(element).closest('.form-group').find('input').removeClass(validClass);
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).closest('.form-group').find('label').removeClass('error-text');
                        $(element).closest('.form-group').find('label').addClass('valid-text');
                        $(element).closest('.form-group').find('input').removeClass(errorClass);
                        $(element).closest('.form-group').find('input').addClass(validClass);
                    }

                });

                this.legalform.validate({
                    errorClass: "has-error",
                    validClass: 'valid',
                    onkeyup: function (element) {
                        $(element).valid();
                    },
                    rules: {
                        passport_number: {
                            required: true,
                            number:true,
                            minlength: 3,
                            maxlength: 50
                        },
                        date_passport_issuance: {
                            required: true
                        },
                        passport_expiration_date: {
                            required: true
                        },
                        birth_date: {
                            required: true,
                            birthday_date: true
                        }

                    },
                    highlight: function (element, errorClass, validClass) {
                        $(element).closest('.form-group').find('label').addClass('error-text');
                        $(element).closest('.form-group').find('label').removeClass('valid-text');
                        $(element).closest('.form-group').find('input').addClass(errorClass);
                        $(element).closest('.form-group').find('input').removeClass(validClass);
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).closest('.form-group').find('label').removeClass('error-text');
                        $(element).closest('.form-group').find('label').addClass('valid-text');
                        $(element).closest('.form-group').find('input').removeClass(errorClass);
                        $(element).closest('.form-group').find('input').addClass(validClass);
                    }

                });

                this.accountform.validate({
                    errorClass: "has-error",
                    validClass: 'valid',
                    onkeyup: function (element) {
                        $(element).valid();
                    },
                    rules: {
                        client_id: {
                            required: true,
                            minlength: 3,
                            maxlength: 50
                        },
                        username: {
                            required: true,
                            minlength: 3,
                            maxlength: 50
                        }
                    },
                    highlight: function (element, errorClass, validClass) {
                        $(element).closest('.form-group').find('label').addClass('error-text');
                        $(element).closest('.form-group').find('label').removeClass('valid-text');
                        $(element).closest('.form-group').find('input').addClass(errorClass);
                        $(element).closest('.form-group').find('input').removeClass(validClass);
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).closest('.form-group').find('label').removeClass('error-text');
                        $(element).closest('.form-group').find('label').addClass('valid-text');
                        $(element).closest('.form-group').find('input').removeClass(errorClass);
                        $(element).closest('.form-group').find('input').addClass(validClass);
                    }
                });

                let self = this;
                this.accountform.on('submit',function(event){
                    self.hideerror($('#new_password')[0]);
                    self.hideerror($('#re_type_password')[0]);
                    self.hideerror($('#current_password')[0]);


                    if($('#new_password').val() && $('#new_password').val() != $('#re_type_password').val())
                    {
                        $('#re_type_password').focus();
                        self.adderror($('#re_type_password')[0],"This field has to be equal to Re Type Password");
                        return false;
                    }
                    else if(!$('#current_password').val() && $('#new_password').val())
                    {
                        $('#current_password').focus();
                        self.adderror($('#current_password')[0],'This field is required');
                        return false;
                    }
                    else if($('#current_password').val() && !$('#new_password').val())
                    {
                        $('#new_password').focus();
                        self.adderror($('#new_password')[0],"This field is required");
                        return false;
                    }
                    else if(!this.accountform.valid())
                    {
                        return false;
                    }

                }.bind(this))

                jQuery.validator.addMethod("phone_number", function (value, element) {
                    return this.optional(element) || /^[+]+[0-9 ]*$/.test(value);
                }, "Input valid phone number i.e. +48 123 456 789 or +48&nbsp;58&nbsp;123&nbsp;45&nbsp;67. Remember to use prefix.");

                jQuery.validator.addMethod("birthday_date", function (value, element) {
                    return this.optional(element) || /^([0-9][0-9][0-9][0-9])-(0[0-9]|1[0-2])-(0[0-9]|1[0-9]|2[0-9]|3[0-1])$/.test(value);
                }, "Please enter your birthday as MM/DD/YYYY.");

            },
            datePicker: function () {
                this.dateBirthInput.datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    endDate: '-18y',
                    format: 'yyyy-mm-dd',
                    showOnFocus: true
                }).on('hide', function () {
                    $('#dob').valid();
                    if (!this.firstHide) {
                        if (!$(this).is(":focus")) {
                            this.firstHide = true;
                            // this will inadvertently call show (we're trying to hide!)
                            this.focus();
                        }
                    } else {
                        this.firstHide = false;
                    }
                }).on('show', function () {
                    if (this.firstHide) {
                        // careful, we have an infinite loop!
                        $(this).datepicker('hide');
                    }
                });

                this.date_passport_issuance.datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    endDate: '-18y',
                    format: 'yyyy-mm-dd',
                    showOnFocus: true
                }).on('hide', function () {
                    $('#date_passport_issuance').valid();
                    if (!this.firstHide) {
                        if (!$(this).is(":focus")) {
                            this.firstHide = true;
                            // this will inadvertently call show (we're trying to hide!)
                            this.focus();
                        }
                    } else {
                        this.firstHide = false;
                    }
                }).on('show', function () {
                    if (this.firstHide) {
                        // careful, we have an infinite loop!
                        $(this).datepicker('hide');
                    }
                });

                this.passport_expiration_date.datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    endDate: '-18y',
                    format: 'yyyy-mm-dd',
                    showOnFocus: true
                }).on('hide', function () {
                    $('#passport_expiration_date').valid();
                    if (!this.firstHide) {
                        if (!$(this).is(":focus")) {
                            this.firstHide = true;
                            // this will inadvertently call show (we're trying to hide!)
                            this.focus();
                        }
                    } else {
                        this.firstHide = false;
                    }
                }).on('show', function () {
                    if (this.firstHide) {
                        // careful, we have an infinite loop!
                        $(this).datepicker('hide');
                    }
                })
            },
            addLoader: function () {
                this.submitButton.addClass('loader');
            },
            removeLoader: function () {
                this.submitButton.removeClass('loader');
            }
        };

        $(document).ready(function () {
            <?php Session::remove('success'); ?>
            $('.success-session').hide();
            register.init();
        });
    </script>
@endsection