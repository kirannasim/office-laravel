@extends('Admin.Layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="profile-sidebar">
                <div class="portlet light profile-sidebar-portlet">
                    <div class="profile-userpic mt-element-overlay mt-scroll-right">
                        <div class="userPicInner mt-overlay-1">
                            <div class="mt-overlay">
                                <ul class="mt-info">
                                    <li>
                                        <a class="btn default btn-outline fmTrigger uploadProPic"
                                           data-input="proPicInput" data-preview="proPicImg" href="javascript:;"
                                           id="fmTrigger">
                                            <i class="fa fa-upload"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <input type="hidden" name="proPicInput" id="proPicInput">

                            <img id="proPicImg"
                                 @if(isset($profile->MetaData->profile_pic) && $profile->MetaData->profile_pic != null )
                                 src="{{ asset($profile->MetaData->profile_pic) }}"
                                 @else
                                 src="{{ asset('photos/maleUser.jpg') }}"
                                 @endif
                                 class="img-responsive">
                        </div>
                    </div>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> {{ $profile->MetaData->name.' '. $profile->MetaData->lastname }} </div>
                    </div>
                    <div class="profile-userbuttons saveProfilePic" style="display: none">
                        <button type="button" class="btn btn-circle green btn-sm">save</button>
                    </div>
                    <div class="profile-usermenu">
                        <ul class="nav profileMenu">
                            <li class="ProfilemeuItem active Overview" data-action="overview">
                                <a>
                                    <i class="icon-home viewProfile"></i> {{_t('profile.overview')}}
                                </a>
                            </li>
                            <li class="ProfilemeuItem" data-action="editProfile">
                                <a>
                                    <i class="icon-settings"></i> {{_t('profile.edit_profile')}}
                                </a>
                            </li>
                            {!! defineFilter('profileMenuItem', '', 'adminProfile') !!}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="partialContent" name="partialContent" id="partialContent" style="overflow: hidden;"></div>
        </div>
    </div>

    <script type="text/javascript">"use strict";
        $(function () {
            $(".ProfilemeuItem").click(function () {
                $(".ProfilemeuItem").removeClass("active");
                $(this).addClass("active");
                simulateLoading('.partialContent')
                var unitAction = $(this).attr('data-action');
                $.post('{{ route(strtolower(getScope()).'.profile.requestUnit') }}', {unit: unitAction}, function (data) {
                    $('.partialContent').html(data);
                });
            });

            //trigger overview
            $('.viewProfile').trigger('click');

            //Initialize file manager

            var domain = '{{ asset('filemanage') }}';

            $('.uploadProPic').filemanager('image', {prefix: domain});

            $('.uploadProPic').click(function () {
                $('.saveProfilePic').show();
            });


        });

        //save profile pic

        $('.saveProfilePic').click(function () {
            if ($('#proPicInput').val()) {
                $.post('{{ route(strtolower(getScope()).'.profile.saveProfileImage') }}', {proPicInput: $('#proPicInput').val()}, function () {
                    // toastr.success('Profile Picture Saved Succesfully');
                    $('.saveProfilePic').hide();
                    location.reload();
                })
            }

        });

    </script>
@endsection
