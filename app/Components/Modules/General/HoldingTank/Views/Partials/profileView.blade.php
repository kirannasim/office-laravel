<div class="">
    <div class="">
        <h4 class="">{{ _mt($moduleId, 'HoldingTank.user_profile') }}</h4>
    </div>
    <div class="profileView">
        <div class="form-group">
            <label class="control-label col-md-4 col-sm-5">{{ _mt($moduleId, 'HoldingTank.customer_id') }}
                :</label>
            <div class="col-md-5 col-sm-6">
                <p class="form-control-static">{{ $userData->customer_id}}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4 col-sm-5">{{ _mt($moduleId, 'HoldingTank.sponsor') }}
                :</label>
            <div class="col-md-5 col-sm-6">
                <p class="form-control-static">{{$userData->sponsor()->username}}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4 col-sm-5">{{ _mt($moduleId, 'HoldingTank.username') }}
                :</label>
            <div class="col-md-5 col-sm-6">
                <p class="form-control-static">{{$userData->username}}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4 col-sm-5">{{ _mt($moduleId, 'HoldingTank.email') }}
                :</label>
            <div class="col-md-5 col-sm-6">
                <p class="form-control-static">{{$userData->email}}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4 col-sm-5">{{ _mt($moduleId, 'HoldingTank.first_name') }}
                :</label>
            <div class="col-md-5 col-sm-6">
                <p class="form-control-static">{{$userData->metaData->name}}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4 col-sm-5">{{ _mt($moduleId, 'HoldingTank.last_name') }}
                :</label>
            <div class="col-md-5 col-sm-6">
                <p class="form-control-static">{{$userData->metaData->lastname}}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4 col-sm-5">{{ _mt($moduleId, 'HoldingTank.gender') }}
                :</label>
            <div class="col-md-5 col-sm-6">
                <p class="form-control-static">{{ $userData->metaData->gender }}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4 col-sm-5">{{ _mt($moduleId, 'HoldingTank.phone_number') }}
                :</label>
            <div class="col-md-5 col-sm-6">
                <p class="form-control-static">{{ $userData->phone }}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4 col-sm-5">{{ _mt($moduleId, 'HoldingTank.address') }}
                :</label>
            <div class="col-md-5 col-sm-6">
                <p class="form-control-static">{{ $userData->metaData->address }}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4 col-sm-5">{{ _mt($moduleId, 'HoldingTank.city') }}
                :</label>
            <div class="col-md-5 col-sm-6">
                <p class="form-control-static">{{ $userData->metaData->city }}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4 col-sm-5">{{ _mt($moduleId, 'HoldingTank.country') }}
                :</label>
            <div class="col-md-5 col-sm-6">
                <p class="form-control-static">{{ getCountryName($userData->metaData->address_country) }}</p>
            </div>
        </div>
    </div>
</div>


