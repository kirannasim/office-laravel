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
                    <div class="eachField row">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">{{ _t('profile.sponsor_name') }}</span></label>
                        </div>
                        <div class="col-sm-6">
                            <label>
                                : @if($profile->RepoData->sponsor_id){{ idToUsername($profile->RepoData->sponsor_id) }}@else
                                    NA @endif</label>
                        </div>
                    </div>
                    {{-- <div class="eachField row">
                         <div class="col-sm-3">
                             <label> <span class="overviewContent">{{ _t('profile.placement') }}</span> </label>
                         </div>
                         <div class="col-sm-6">
                             <label>
                                 : @if($profile->RepoData->placement_id){{ idToUsername($profile->RepoData->placement_id) }}@else
                                     NA @endif</label>
                         </div>
                     </div>--}}

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
                            <label> <span class="overviewContent">Given Name</span></label>
                        </div>
                        <div class="col-sm-3">
                            <label> : {{ $profile->MetaData->firstname }}</label>
                        </div>
                    </div>
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">Surname</span></label>
                        </div>
                        <div class="col-sm-3">
                            <label> : {{ $profile->MetaData->lastname }}</label>
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
                    {{--  <div class="eachField">
                          <div class="col-sm-3">
                              <label> <span class="overviewContent">Passport Number</span></label>
                          </div>
                          <div class="col-sm-3">
                              <label> : {{ $profile->MetaData->passport_no }}</label>
                          </div>
                      </div>
                      <div class="eachField">
                          <div class="col-sm-3">
                              <label> <span class="overviewContent">Date of Passport Issuance</span></label>
                          </div>
                          <div class="col-sm-3">
                              <label> : {{ $profile->MetaData->date_of_passport_issuance }}</label>
                          </div>
                      </div>
                      <div class="eachField">
                          <div class="col-sm-3">
                              <label> <span class="overviewContent">Passport Expiration Date</span></label>
                          </div>
                          <div class="col-sm-3">
                              <label> : {{ $profile->MetaData->passport_expirition_date }}</label>
                          </div>
                      </div>--}}
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">Date of birth</span></label>
                        </div>
                        <div class="col-sm-3">
                            <label> : {{ $profile->MetaData->dob }}</label>
                        </div>
                    </div>
                    {{-- <div class="eachField">
                         <div class="col-sm-3">
                             <label> <span class="overviewContent">Place of Birth</span></label>
                         </div>
                         <div class="col-sm-3">
                             <label> : {{ $profile->MetaData->place_of_birth }}</label>
                         </div>
                     </div>
                     <div class="eachField">
                         <div class="col-sm-3">
                             <label> <span class="overviewContent">Nationality</span></label>
                         </div>
                         <div class="col-sm-3">
                             <label> : {{ $profile->MetaData->nationality }}</label>
                         </div>
                     </div>--}}
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">Mobile Number</span></label>
                        </div>
                        <div class="col-sm-3">
                            <label> : {{ $profile->phone }}</label>
                        </div>
                    </div>
                    {{-- <div class="eachField">
                         <div class="col-sm-3">
                             <label> <span class="overviewContent">Street Name</span></label>
                         </div>
                         <div class="col-sm-3">
                             <label> : {{ $profile->MetaData->street_name }}</label>
                         </div>
                     </div>
                     <div class="eachField">
                         <div class="col-sm-3">
                             <label> <span class="overviewContent">House Number</span></label>
                         </div>
                         <div class="col-sm-3">
                             <label> : {{ $profile->MetaData->house_no }}</label>
                         </div>
                     </div>
                     <div class="eachField">
                         <div class="col-sm-3">
                             <label> <span class="overviewContent">{{ _t('profile.city') }}</span></label>
                         </div>
                         <div class="col-sm-3">
                             <label> : {{ $profile->MetaData->city }}</label>
                         </div>
                     </div>--}}
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">Post Code</span></label>
                        </div>
                        <div class="col-sm-3">
                            <label> : {{ $profile->MetaData->postcode }}</label>
                        </div>
                    </div>
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">{{ _t('profile.country') }}</span></label>
                        </div>
                        <div class="col-sm-3">
                            <label> : {{ getCountryName($profile->MetaData->country_id) }}</label>
                        </div>
                    </div>
                    {{--<div class="eachField">
                        <div class="col-sm-3">
                            <label> <span
                                        class="overviewContent">{{ _t('profile.additional_information') }}</span></label>
                        </div>
                        <div class="col-sm-3">
                            <label> : {{ $profile->MetaData->additional_info }}</label>
                        </div>
                    </div>
                    <div class="eachField">
                        <div class="col-sm-3">
                            <label> <span class="overviewContent">Country of Passport Issuance</span></label>
                        </div>
                        <div class="col-sm-3">
                            <label> : {{ getCountryName($profile->MetaData->country_of_passport_issuance) }}</label>
                        </div>
                    </div>--}}
                </div>
                {{--   <div class="portlet-title">
                       <div class="caption caption-md">
                           <i class="icon-globe theme-font hide"></i>
                           <span class="caption-subject font-blue-madison bold uppercase">{{ _t('profile.social_info') }}</span>
                       </div>
                   </div>--}}
                {{--   <div class="portlet-body row">
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
                   </div>--}}
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
