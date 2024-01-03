@foreach($scripts as $script)
    <script type="text/javascript" src="{{ $script }}"></script>
@endforeach

<div class="moduleSettingsWrapper">
    <h3>
        <img src="{{ $imagePath }}/email.svg">{{ _mt($moduleId,'EmailBroadCasting.email_broadcasting_configuration') }}
    </h3>
    {!! Form::open(['route' => ['admin.module.configure',$moduleId],'class' => 'form-horizontal adminConfig','id' => 'adminConfig']) !!}
    <input type="hidden" value="{{ $moduleId }}" name="module_id">

    <div class="formField row">
        <div class="col-md-4">{{ _mt($moduleId,'EmailBroadCasting.mailserver') }}<span class="required"> *</span></div>
        <div class="col-md-8">
            <div class="twoWaySwitch">
                <label>{{ _mt($moduleId, 'EmailBroadCasting.sendmail') }}</label>
                <input type="hidden" class="mailserver"
                       {{ $config->get('mailserver') == 'smtp' ? 'checked' : '' }} name="module_data[mailserver]">
                <label>{{ _mt($moduleId, 'EmailBroadCasting.smtp') }}</label>
            </div>
        </div>
    </div>
    <div class="formField row">
        <div class="col-md-4">{{ _mt($moduleId,'EmailBroadCasting.smtp_authentication') }}<span class="required"> *</span></div>
        <div class="col-md-8">
            <div class="twoWaySwitch">
                <label>{{ _mt($moduleId, 'EmailBroadCasting.disable') }}</label>
                <input type="hidden" class="smtp_authentication"
                       {{ $config->get('smtp_authentication') ? 'checked' : '' }} name="module_data[smtp_authentication]">
                <label>{{ _mt($moduleId, 'EmailBroadCasting.enable') }}</label>
            </div>
        </div>
    </div>
    <div class="formField row">
        <div class="col-md-4">{{ _mt($moduleId,'EmailBroadCasting.smtp_protocol') }}<span class="required"> *</span></div>
        <div class="col-md-8 emailRadio">
            <input type="radio" value="ssl"
                   name="module_data[smtp_protocol]"
                   @if($config->get('smtp_protocol')) checked="" @endif>
            <label for="smtp_protocol">
                <span class="box"></span> {{ _mt($moduleId,'EmailBroadCasting.ssl') }} </label>
            <input type="radio" value="tls"
                   name="module_data[smtp_protocol]"
                   @if($config->get('smtp_protocol')) checked="" @endif>
            <label for="smtp_protocol">
                <span class="box"></span> {{ _mt($moduleId,'EmailBroadCasting.tls') }} </label>
            <input type="radio" value="none"
                   name="module_data[smtp_protocol]"
                   @if($config->get('smtp_protocol')) checked="" @endif>
            <label for="smtp_protocol">
                <span class="box"></span> {{ _mt($moduleId,'EmailBroadCasting.none') }} </label>
        </div>
    </div>
    <div class="formField row">
        <div class="col-md-4">{{ _mt($moduleId,'EmailBroadCasting.smtp_host') }}<span class="required"> *</span></div>
        <div class="col-md-8">
            <div class="inputHolder flex">
                <i class="fa fa-key"></i>
                <input type="text" name="module_data[smtp_host]" value="{{ $config->get('smtp_host') }}">
            </div>
        </div>
    </div>
    <div class="formField row">
        <div class="col-md-4">{{ _mt($moduleId,'EmailBroadCasting.smtp_port') }}<span class="required"> *</span></div>
        <div class="col-md-8">
            <div class="inputHolder flex">
                <i class="fa fa-key"></i>
                <input type="text" name="module_data[smtp_port]" value="{{ $config->get('smtp_port') }}">
            </div>
        </div>
    </div>
    <div class="formField row">
        <div class="col-md-4">{{ _mt($moduleId,'EmailBroadCasting.smtp_username') }}<span class="required"> *</span></div>
        <div class="col-md-8">
            <div class="inputHolder flex">
                <i class="fa fa-key"></i>
                <input type="text" name="module_data[smtp_username]" value="{{ $config->get('smtp_username') }}">
            </div>
        </div>
    </div>
    <div class="formField row">
        <div class="col-md-4">{{ _mt($moduleId,'EmailBroadCasting.smtp_password') }}<span class="required"> *</span></div>
        <div class="col-md-8">
            <div class="inputHolder flex">
                <i class="fa fa-key"></i>
                <input type="text" name="module_data[smtp_password]" value="{{ $config->get('smtp_password') }}">
            </div>
        </div>
    </div>
    <div class="formField row">
        <div class="col-md-4">{{ _mt($moduleId,'EmailBroadCasting.smtp_timeout') }}</div>
        <div class="col-md-8">
            <div class="inputHolder flex">
                <i class="fa fa-key"></i>
                <input type="text" name="module_data[smtp_timeout]" value="{{ $config->get('smtp_timeout') }}">
            </div>
        </div>
    </div>
    <div class="errorWrapper" style="display: none"></div>
    {!! Form::close() !!}
</div>

<script type="text/javascript">

    $('.mailserver').prettySwitch({
        checkedValue: 'smtp',
        unCheckedValue: 'send_mail',
    });

    $('.smtp_authentication').prettySwitch({
        checkedValue: 1,
        unCheckedValue: 0,
    });

    //i-check
    $('.emailRadio input[type="radio"]').iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal',
        increaseArea: '20%' // optional
    });
</script>
