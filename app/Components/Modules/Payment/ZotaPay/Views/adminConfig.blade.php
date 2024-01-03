@foreach($scripts as $script)
    <script type="text/javascript" src="{{ $script }}"></script>
@endforeach
@foreach($styles as $style)
    <link href="{{ $style }}" rel="stylesheet" type="text/css"/>
@endforeach
<div class="row moduleConfig">
    <div class="col-sm-12">
        {!! Form::open(['route' => ['admin.module.configure',$moduleId],'class' => 'form-horizontal adminconfig','id' => 'adminconfig']) !!}
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span aria-hidden="true"
                      class="icon-note"></span> B2BPay Configuration
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-md-3">Domain
                        <span class="required" aria-required="true"> * </span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" value="{{ $config->get('url') }}" class="form-control"
                               name="module_data[url]">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Mechanic ID
                        <span class="required" aria-required="true"> * </span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" value="{{ $config->get('mechanicid') }}" class="form-control"
                               name="module_data[mechanicid]">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Mechanic Secret
                        <span class="required" aria-required="true"> * </span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" value="{{ $config->get('mechanicsecret') }}" class="form-control"
                               name="module_data[mechanicsecret]">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">EndPointIDS
                        <span class="required" aria-required="true"> * </span>
                    
                    </label>
                    <div class="col-md-4">
                        <input type="number" value="{{ $config->get('endpointid') }}" class="form-control"
                               name="module_data[endpointid]">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-offset-3 col-md-3">
                        <button type="button" value="save"
                                class="form-control ladda-button btn green button-submit" data-style="contract"
                                name="amount">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="errorWrapper" style="display: none"></div>
        {!! Form::close() !!}
    </div>
</div>
<script>

    $(function () {

        var form = $('#adminconfig');

        $('.button-submit').click(function () {

            let errorWrapper = $('.errorWrapper').slideUp().empty();

            var successCallBack = function (response) {
                Ladda.stopAll();
                toastr.success("Configuration saved");
            };

            var failCallBack = function (response) {
                Ladda.stopAll();
                let errors = response.responseJSON;

                for (let key in errors)
                    errorWrapper.append('<div class="error">' + errors[key] + '</div>');

                errorWrapper.slideDown();
            };

            var options = {
                form: form,
                actionUrl: "{{ route('admin.module.save',['module_id' => $moduleId]) }}",
                successCallBack: successCallBack,
                failCallBack: failCallBack
            };
            sendForm(options);
        });
    });



</script>

<style>
    .errorWrapper {
        padding-bottom: 10px;
        background: #e73f38;
        color: white;
        border: none;
    }

    .moduleConfig .panel-primary > .panel-heading {
        color: #4d4d4d;
        background-color: #eeeeee;
        border-color: #eeeeee;
        font-weight: 600;
    }

    .moduleConfig .panel-primary > .panel-heading {
        color: #919191;
    }

    .moduleConfig .panel-primary {
        border-color: #eeeeee;
    }

    .moduleConfig .mt-radio-inline {
        padding: 0px;
    }

    .moduleConfig input.form-control {
        /*margin-bottom: 10px;*/
    }

    .ajaxValidationError.has-error .help-block-error {
        opacity: 1 !important;
    }
</style>
