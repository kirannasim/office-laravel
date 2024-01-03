<div class="card">
    <div class="card-top">
        <div class="tooltip-photo">
            <img src="{{ asset($profile->metaData->profile_pic) }}"
                 onerror=this.src="{{ asset('photos/MaleUser.jpg') }}">
        </div>
    </div>
    <div class="col-sm-12 tooltip-table">
        <div class="col-sm-12 col-xs-12">
            <div class="tooltip-name">
                {{ $profile->username }}
            </div>
        </div>
        <table id="table" class="table table-striped table-hover">
            @if(in_array('fullname', $moduleData['tooltip_info']))
                <tr>
                    <td>{{ _mt($moduleId,'TabularTree.fullname') }}</td>
                    <td>{{ $profile->metaData->firstname }} {{ $profile->metaData->lastname }}</td>
                </tr>
            @endif
            @if(in_array('firstname', $moduleData['tooltip_info']))
                <tr>
                    <td>{{ _mt($moduleId,'TabularTree.firstname') }}</td>
                    <td>{{ $profile->metaData->firstname }}</td>
                </tr>
            @endif
            @if(in_array('lastname', $moduleData['tooltip_info']))
                <tr>
                    <td>{{ _mt($moduleId,'TabularTree.lastname') }}</td>
                    <td>{{ $profile->metaData->lastname }}</td>
                </tr>
            @endif
            @if(in_array('email', $moduleData['tooltip_info']))
                <tr>
                    <td>{{ _mt($moduleId,'TabularTree.email') }}</td>
                    <td>{{ $profile->email }}</td>
                </tr>
            @endif
            @if(in_array('phone', $moduleData['tooltip_info']))
                <tr>
                    <td>{{ _mt($moduleId,'TabularTree.phone') }}</td>
                    <td>{{ getPhoneCode($profile->metaData->country_id) }} {{ $profile->phone }}</td>
                </tr>
            @endif
            @if(in_array('joining_date', $moduleData['tooltip_info']))
                <tr>
                    <td>{{ _mt($moduleId,'TabularTree.joining_date') }}</td>
                    <td>{{ date('Y-m-d',strtotime($profile->creted_at)) }}</td>
                </tr>
            @endif
            @if(in_array('parent_user', $moduleData['tooltip_info']))
                <tr>
                    <td>{{ _mt($moduleId,'TabularTree.parent_user') }}</td>
                    <td>{{ usernameFromId($profile->repoData->parent_id) }}</td>
                </tr>
            @endif
            @if(in_array('sponsor_user', $moduleData['tooltip_info']))
                <tr>
                    <td>{{ _mt($moduleId,'TabularTree.sponsor_user') }}</td>
                    <td>{{ usernameFromId($profile->repoData->sponsor_id) }}</td>
                </tr>
            @endif
            @if(in_array('package', $moduleData['tooltip_info']))
                <tr>
                    <td>{{ _mt($moduleId,'TabularTree.package') }}</td>
                    <td>{{ getPackageInfo($profile->package_id)['name'] }}</td>
                </tr>
            @endif
            @if(in_array('country', $moduleData['tooltip_info']))
                <tr>
                    <td>{{ _mt($moduleId,'TabularTree.country') }}</td>
                    <td>{{ getCountryName($profile->metaData->country_id) }}</td>
                </tr>
            @endif
        </table>
    </div>
</div>
