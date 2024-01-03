@extends('Admin.Layout.master')
@section('content')
    <div class="moduleWrapper">
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold font-purple-plum uppercase"> {{_t('settings.Modules')}} </span>
                    <span class="caption-helper">{{_t('settings.Belongs_to')}} <p class="pool">{{ $pools->first() }}</p></span>
                </div>
                <div class="inputs">
                    <div class="portlet-input input-inline input-small">
                        <div class="input-icon right">
                            <i class="icon-magnifier"></i>
                            <input type="text" class="form-control input-circle"
                                   placeholder="{{_t('settings.search')}}"></div>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
            </div>
        </div>
        <!-- END Portlet PORTLET-->
    </div>
@endsection