<div class="portlet box red-sunglo">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i>Email Settings
        </div>
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

            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <ul class="nav nav-tabs tabs-left">
                        <li class="active">
                            <a href="#tab_welcome_mail" data-toggle="tab"
                               aria-expanded="true"> {{ _t('general.welcome_mail') }}</a>
                        </li>
                        <li class="">
                            <a href="#tab_payout_mail" data-toggle="tab"
                               aria-expanded="false">{{ _t('general.payout_mail')}}  </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-9">
                    <div class="tab-content">
                        <div class="tab-pane active in" id="tab_welcome_mail">
                            <b> {{ _t('general.welcome_mail') }} </b>
                            <div class="form-group form-md-line-input form-md-floating-label">
                                <textarea class="email_view" name="welcome_mail"
                                          placeholder="Welcome Mail"> {{ $meta_value['welcome_mail'] }}</textarea>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="tab_payout_mail">
                            <b> {{ _t('general.payout_mail') }} </b>
                            <div class="form-group form-md-line-input form-md-floating-label">
                                <textarea class="email_view" name="payout_mail"
                                          placeholder="Welcome Mail"> {{ $meta_value['payout_mail'] }} </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="config_id" id='config_id' value='{{ $id }}'>
            </div>

            <div class="row">
                <button type="button" class="btn green ladda-button configSubmit" data-style="contract">Save</button>
            </div>
        </form>

    </div>
</div>

<script>
    $("[name='status']").bootstrapSwitch();

    $(function () {

        tinymce.init({
            selector: '.email_view',
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            }
        });
    });
</script>
