@extends('Admin.Layout.master')
@section('content')

    <!-- END PAGE HEADER-->
    <div class="row generalWraper">
        <div class="portlet light pckageWizard">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-puzzle font-grey-gallery"></i>
                    <span class="caption-subject bold font-grey-gallery uppercase"> general Wizard </span>
                    <span class="caption-helper">General Settings</span>
                </div>
                <div class="tools">
                    <a href="" class="collapse" data-original-title="" title=""> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                    <a href="" class="reload" data-original-title="" title=""> </a>
                    <a href="" class="fullscreen" data-original-title="" title=""> </a>
                    <a href="" class="remove" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="mt-element-list">
                    <div class="mt-list-container list-simple ext-1 group">
                        @foreach($active_settings as $settings)

                            <a class="list-toggle-container collapsed" data-toggle="collapse"
                               href="#settings_{{ $settings->id }}" aria-expanded="false"
                               onclick="getConfigView('{{ $settings->meta_key }}','{{ $settings->id }}')">
                                <div class="list-toggle done uppercase"> {{ $settings->meta_key }}
                                </div>
                            </a>
                            <div class="panel-collapse collapse" id="settings_{{ $settings->id }}" aria-expanded="false"
                                 style="height: 0px;">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script>
        function getConfigView(option_key, option_id) {
            var post = $.get('general/getconfigview/' + option_key, function (response) {
                $('#settings_' + option_id).html(response);
            });
        }

        $(function () {
            Ladda.bind('.configSubmit');
        });


        $('body').on('click', '.configSubmit', function () {

            var form = $(this).closest('form.configForm');

            var successCallback = function (response) {
                toastr.success('Updated sucessfully');
            }

            var failCallback = function (response) {
                var errors = response.responseJSON;
                for (key in errors) {
                    var errorOption = {};
                    errorOption[key] = errors[key];
                    $('[name="' + key + '"]').length ? (form.validate().showErrors(errorOption)) : '';
                }
            }

            var options = {
                form: form,
                successCallback: successCallback,
                failCallback: failCallback,
                actionUrl: '{{ route("saveconfig") }}',
            };

            sendForm(options);
        });
    </script>

@endsection
