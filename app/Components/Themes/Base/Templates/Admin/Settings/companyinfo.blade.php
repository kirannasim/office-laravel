<div class="portlet box red-sunglo">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i>{{ _t('general.company_info') }} </div>
        <div class="tools">
            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
            <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
            <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
            <a href="" class="fullscreen" data-original-title="" title=""> </a>
            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
        </div>
    </div>
    <div class="portlet-body" style="height: auto;">

        <form class="configForm">
            <div class="form-group  col-sm-12">
                <label for="form_control_1">{{ _t('general.status') }}</label>
                <input type="checkbox" name="status" @if($status) checked @endif >
            </div>

            <input type="hidden" name="config_id" id='config_id' value='{{ $id }}'>

            <div class="form-group form-md-line-input form-md-floating-label">
                <input type="text" name="company_name" class="form-control" value="{{ $meta_value['company_name'] }}">
                <label for="company_name">{{ _t('general.company_name') }}</label>
                <span class="help-block"></span>
            </div>
            <div class="form-group form-md-line-input form-md-floating-label">
                <textarea class="form-control" name="company_address"> {{ $meta_value['company_address'] }} </textarea>
                <label for="company_addres">{{ _t('general.company_address') }}</label>
                <span class="help-block"></span>
            </div>
            <div class="form-group form-md-line-input form-md-floating-label">
                <input type="text" name="phone" class="form-control" value="{{ $meta_value['phone'] }}">
                <label for="phone">{{ _t('general.phone') }}</label>
                <span class="help-block"></span>
            </div>

            <div class="row">
                <button type="button" class="btn green ladda-button configSubmit" data-style="contract">Save</button>
            </div>
        </form>

    </div>
</div>

<script>
    $("[name='status']").bootstrapSwitch();
</script>
