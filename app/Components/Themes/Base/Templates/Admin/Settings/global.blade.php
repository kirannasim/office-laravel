@extends('Admin.Layout.master')
@section('content')
    @component('Components.demoWarning') @endcomponent
    @inject('htmlHelper', 'App\Blueprint\Facades\HtmlServer')
    <!-- END PAGE HEADER-->
    <div class="row globalSettingsWrapper">
        <div class="portlet light globalSettingsPortlet">
            <div class="portlet-title globalSettingsPortletTitle">
                <div class="globalSettingsNavToggler">
                    <i class="fa fa-bars"></i>
                </div>
                <div class="caption">
                    <span class="caption-subject bold font-grey-gallery uppercase"> {{_t('settings.Global_configuration')}} </span>
                </div>
                {{--<div class="tools">
                    <a href="" class="collapse" data-original-title="" title=""> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                    <a href="" class="reload" data-original-title="" title=""> </a>
                    <a href="" class="fullscreen" data-original-title="" title=""> </a>
                    <a href="" class="remove" data-original-title="" title=""> </a>
                </div>--}}
            </div>
            <div class="portlet-body">
                {!! $htmlHelper::renderConfigForm($configOptions) !!}
            </div>
        </div>
    </div>

    <style type="text/css">
        .page-content {
            background: #eceeef;
        }

        .portlet.light {
            background-color: transparent;
        }
    </style>

    <script>
        "use strict";

        //Document ready scripts
        $(function () {
            //Summer note
            $('textarea.richText').summernote({
                height: 150
            });

            //IconPicker Initialize
            iconPickerInit({trigger: '.fayis', target: '.fayisput'});

            //Ladda initialize
            Ladda.bind('.configSubmit');

            //select2 Initialize
            $('.select2select').select2({
                placeholder: "Select",
                allowClear: true,
                width: '100%',
                escapeMarkup: function (m) {
                    return m;
                }
            });
        });

        $('body').on('click', '.eachConfigNav', function () {
            $(this).addClass('active').siblings().removeClass('active');
            $('.configGroup[data-groupId="' + $(this).attr('data-id') + '"]')
                .addClass('active').show().siblings('.configGroup').removeClass('active').hide();
        });

        //Show error
        function showError(targetElem, error) {
            var errElem = targetElem.parent().find('.error');

            if (!errElem.length) {
                var output = '<div class="error">' + error + '</div>';
                targetElem.parent().append($(output));
            }
            errElem.text(error).fadeIn();
        }

        $('body').on('click', '.saveConfig', function () {
            $('.htmlElement .error').remove();
            var form = $('form.configGroup.active');
            var successCallback = function (response) {
                Ladda.stopAll();
                toastr.success("{{_t('settings.Updated_sucessfully')}}");
            };
            var failCallback = function (response) {
                Ladda.stopAll();
                var errors = response.responseJSON;
                var tabs = [];

                for (var key in errors) {
                    var sessionKey = "{{ session('advFieldName') }}";
                    if (key.search(sessionKey) !== -1) {
                        var elemKey = sessionKey + '[' + key.split('.')[1] + ']';
                        //console.log(elemKey);
                    }
                    var targetElem = $('[name="' + elemKey + '"]');
                    targetElem = (targetElem.attr('type') == 'radio') ? targetElem.closest('.htmlElementInput').find('.eachRadio').last() : targetElem;

                    if (!targetElem.length) continue;

                    tabs.push(targetElem.closest('.configGroup').index());
                    showError(targetElem, errors[key]);
                    //tabs.push(Number($('[name="' + key + '"]').closest('.tab-pane').attr('id').split('tab')[1]) - 1);
                }
                //console.log(tabs);
                if ($('.configGroup.active .htmlElement .error').length) return true;
                var targetIndex = Math.min.apply(null, tabs);
                $('.configGroup').eq(targetIndex).slideDown().addClass('active')
                    .siblings('.configGroup').slideUp().removeClass('active');
                var groupId = $('.configGroup').eq(targetIndex).attr('data-groupId');
                $('.eachConfigNav[data-id="' + groupId + '"]').addClass('active').siblings().removeClass('active');
            };
            var options = {
                form: form,
                successCallBack: successCallback,
                failCallBack: failCallback
            };
            //console.log(options);
            sendForm(options);
        });
        //Toggle nav menu
        $('.globalSettingsNavToggler').click(function () {
            if ($(this).hasClass('collapsed')) {
                $(this).removeClass('collapsed');
                $('.configNavigation').removeClass('collapsed col-md-1').addClass('col-md-3');
                $('.configFieldWrapper').removeClass('col-md-11').addClass('col-md-9');
            } else {
                $(this).addClass('collapsed');
                $('.configNavigation').addClass('collapsed col-md-1').removeClass('col-md-3');
                $('.configFieldWrapper').addClass('col-md-11').removeClass('col-md-9');
            }
        })
    </script>
@endsection
