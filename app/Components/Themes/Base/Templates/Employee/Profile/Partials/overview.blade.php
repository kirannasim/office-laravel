<div id='profile_edit' class="profile-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">{{ _t('profile.account_info') }}</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="eachField row">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">{{ _t('profile.username') }}</span> </label>
                        </div>
                        <div class="col-sm-6"><label>: {{ $profile->username }}</label></div>
                    </div>
                </div>
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">{{ _t('profile.personal_info') }}</span>
                    </div>
                </div>
                <div class="portlet-body row">

                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">{{ _t('profile.email') }}</span></label>
                        </div>
                        <div class="col-sm-3">
                            <label> : {{ $profile->email }} </label>
                        </div>
                    </div>
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">{{ _t('profile.firstname') }}</span></label>
                        </div>
                        <div class="col-sm-3">
                            <label> : {{ $profile->MetaData->firstname }}</label>
                        </div>
                    </div>
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">{{ _t('profile.lastname') }}</span></label>
                        </div>
                        <div class="col-sm-3">
                            <label> : {{ $profile->MetaData->lastname }}</label>
                        </div>
                    </div>
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">{{ _t('profile.phone') }}</span></label>
                        </div>
                        <div class="col-sm-3">
                            <label> : {{ $profile->phone }}</label>
                        </div>
                    </div>
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">{{ _t('profile.dob') }}</span></label>
                        </div>
                        <div class="col-sm-3">
                            <label> : {{ $profile->MetaData->dob }}</label>
                        </div>
                    </div>
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">{{ _t('profile.gender') }}</span></label>
                        </div>
                        <div class="col-sm-3">
                            <label>
                                : @if($profile->MetaData->gender == 'M') {{ _t('profile.male') }} @else {{ _t('profile.female') }} @endif</label>
                        </div>
                    </div>
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">{{ _t('profile.address') }}</span></label>
                        </div>
                        <div class="col-sm-3">
                            <label> : {{ $profile->MetaData->address }}</label>
                        </div>
                    </div>
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">{{ _t('profile.country') }}</span></label>
                        </div>
                        <div class="col-sm-3">
                            <label> : {{ $profile->country }}</label>
                        </div>
                    </div>
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">{{ _t('profile.state') }}</span></label>
                        </div>
                        <div class="col-sm-3">
                            <label> : {{ $profile->state }}</label>
                        </div>
                    </div>
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">{{ _t('profile.city') }}</span></label>
                        </div>
                        <div class="col-sm-3">
                            <label> : {{ $profile->city }}</label>
                        </div>
                    </div>
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">{{ _t('profile.pin') }}</span></label>
                        </div>
                        <div class="col-sm-3">
                            <label> : {{ $profile->MetaData->pin }}</label>
                        </div>
                    </div>
                </div>
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">{{ _t('profile.social_info') }}</span>
                    </div>
                </div>
                <div class="portlet-body row">
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">{{ _t('profile.about_me') }}</span> </label>
                        </div>
                        <div class="col-sm-9">
                            <label> : <span class=""> {!! $profile->MetaData->about_me !!}</span></label>
                        </div>
                    </div>
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">{{ _t('profile.facebook') }}</span></label>
                        </div>
                        <div class="col-sm-9">
                            <label> : <span class=""> {!! $profile->MetaData->facebook !!}</span></label>
                        </div>
                    </div>
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">{{ _t('profile.twitter') }}</span></label>
                        </div>
                        <div class="col-sm-9">
                            <label> : <span class=""> {!! $profile->MetaData->twitter !!}</span></label>
                        </div>
                    </div>
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label><span class="overviewContent">{{ _t('profile.linked_in') }}</span></label>
                        </div>
                        <div class="col-sm-9">
                            <label> : <span class=""> {!! $profile->MetaData->linked_in !!}</span></label>
                        </div>
                    </div>
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">{{ _t('profile.google_plus') }}</span></label>
                        </div>
                        <div class="col-sm-9">
                            <label> : <span class=""> {!! $profile->MetaData->google_plus !!}</span></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .overviewContent {
        font-weight: bold;
        color: #c56969
    }
</style>
