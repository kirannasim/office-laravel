@extends('Admin.Layout.master')
@section('content')
    @component('Components.demoWarning') @endcomponent
    <div class="themeWrapper row">
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold font-purple-plum uppercase">
                    	<span class="themeIco">
        					<i class="fa fa-desktop"></i>
        				</span> {{_t('settings.Themes')}}
        			</span>
                    <span class="caption-helper">{{ $themes->first()->getRegistry()['name'] }}</span>
                </div>
                <div class="inputs">
                    <button type="button"
                            class="btn btn-circle dark btn-outline sbold uploadThemeButton">{{_t('settings.Upload_Theme')}}
                    </button>
                    <div class="portlet-input input-inline input-small">
                        <div class="input-icon right">
                            <i class="icon-magnifier"></i>
                            <input type="text" class="form-control input-circle"
                                   placeholder="{{_t('settings.search')}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="themeUploader">

                    <div class="m-heading-1 m-bordered themeDropNote">
                        <h3>{{_t('settings.Upload_Theme')}}</h3>
                        <p> {{_t('settings.upload_text')}}</p>
                        <p class="themeDropNoteCaution">
                            <span class="label label-danger">{{_t('settings.NOTE')}}:</span>{{_t('settings.NOTE_text')}}
                        </p>
                    </div>

                    <div class="themeDropper">
                        {!! Form::open(['route' => 'admin.theme.upload','class' => 'dropzone','id' => 'themeDropper']) !!}{!! Form::close() !!}
                        <div class="themeUploadOptions">
                            <div class="col-md-6">
                                <div class="themeUploadOptionsInner">
                                    <div class="eachOption">
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            {{_t('settings.after_install_text')}} <input type="checkbox"
                                                                                         name="installAfterUpload"
                                                                                         value="0">
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade in" id="themeUploadModal" tabindex="-1" role="basic" aria-hidden="true"
                             style="padding-right: 17px;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true"></button>
                                        <h4 class="modal-title">{{_t('settings.Theme_Wizard')}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="themeModalInner">
                                            <div class="col-md-6">
                                                <ol class="uploadDetails">
                                                    <li class="eachStep upload">
                                        				<span class="loadIco">
                                        					<i class="fa fa-spin fa-spinner"></i>
                                        				</span>
                                                        <span class="checkIco">
                                        					<i class="fa fa-check"></i>
                                        				</span>
                                                        <span class="errorIco">
                                        					<i class="fa fa-close"></i>
                                        				</span>
                                                        <span class="stepText">{{_t('settings.Uploading_theme')}}</span>
                                                    </li>
                                                    <li class="eachStep extract">
                                        				<span class="loadIco">
                                        					<i class="fa fa-spin fa-spinner"></i>
                                        				</span>
                                                        <span class="checkIco">
                                        					<i class="fa fa-check"></i>
                                        				</span>
                                                        <span class="errorIco">
                                        					<i class="fa fa-close"></i>
                                        				</span>
                                                        <span class="stepText">{{_t('settings.Extracting_theme')}}</span>
                                                    </li>
                                                    <li class="eachStep integrityCheck">
                                        				<span class="loadIco">
                                        					<i class="fa fa-spin fa-spinner"></i>
                                        				</span>
                                                        <span class="checkIco">
                                        					<i class="fa fa-check"></i>
                                        				</span>
                                                        <span class="errorIco">
                                        					<i class="fa fa-close"></i>
                                        				</span>
                                                        <span class="stepText">{{_t('settings.Checking_theme_integrity')}}</span>
                                                    </li>
                                                    <li class="eachStep install">
                                        				<span class="loadIco">
                                        					<i class="fa fa-spin fa-spinner"></i>
                                        				</span>
                                                        <span class="checkIco">
                                        					<i class="fa fa-check"></i>
                                        				</span>
                                                        <span class="errorIco">
                                        					<i class="fa fa-close"></i>
                                        				</span>
                                                        <span class="stepText">{{_t('settings.Installing_theme')}}</span>
                                                    </li>
                                                </ol>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="uploadProgress">
                                                    <div class="progressContainer">
                                                        <div id="container"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="themeUploadErrors">
                                            <i class="fa fa-exclamation"></i>
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn dark btn-outline"
                                                data-dismiss="modal">{{_t('settings.Close')}}
                                        </button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </div>
                </div>
                <div class="themeContainer">
                    @forelse(collect($themes)->chunk(4) as $themeSet)
                        <div class="row">
                            @foreach($themeSet as $theme)
                                <div class="col-md-3 themePickerOuter">
                                    <div class="themePickerInner" data-theme="{{ $theme->getRegistry()['slug'] }}">
                                        <img src="{{ $theme->getRegistry()['screenshot'] }}">
                                        <h4>{{ $theme->getRegistry()['name'] }}</h4>
                                        <div class="themeControls">
                                            <span class="btn btn-outline blue themeInfo"><i
                                                        class="fa fa-info"></i></span>
                                            @if(!$theme->themeId)
                                                <span data-theme="{{ $theme->getRegistry()['slug'] }}"
                                                      data-style="contract"
                                                      data-spinner-color="#32c5d2"
                                                      class="btn btn-outline ladda-button green themeInstall">{{_t('settings.Install')}}</span>
                                                <span data-theme="{{ $theme->getRegistry()['slug'] }}"
                                                      data-style="contract"
                                                      data-spinner-color="#eea236"
                                                      class="btn btn-outline ladda-button red themeUninstall">{{_t('settings.Uninstall')}}</span>
                                            @else
                                                <span data-id="{{ $theme->themeId }}" data-style="contract"
                                                      data-spinner-color="#eea236"
                                                      class="btn btn-outline ladda-button red themeUninstall">{{_t('settings.Uninstall')}}</span>
                                            @endif
                                        </div>
                                        <div class="themeMeta">
                                            <div class="eachMeta themeName">
                                                <label>{{_t('settings.Theme_Name')}}</label>
                                                <span class="metaValue">{{ $theme->getRegistry()['name'] }}</span>
                                            </div>
                                            <div class="eachMeta version">
                                                <label>{{_t('settings.Theme_Version')}}</label>
                                                <span class="metaValue">{{ $theme->getRegistry()['version'] }}</span>
                                            </div>
                                        </div>
                                        @if(isset($theme->getRegistry()['layouts']))
                                            <h5 class="showLayouts">{{_t('settings.Pick_layouts')}}</h5>
                                            <div class="layoutVarientsWrap">
                                                @forelse($theme->getRegistry()['layouts'] as $layout)
                                                    <div data-layout="{{ $layout['slug'] }}"
                                                         class="layoutVarients @if(($theme->getRegistry()['slug'] == $activeTheme)&& ($layout['slug'] == $activeLayout)) active @endif">
	            										<span class="color" style="background:{{ $layout['color'] }}">
	            												<i class="fa fa-check"></i>
	            										</span>
                                                    </div>
                                                @empty
                                                    <h5 class="noLayoutVarients">{{_t('settings.No_Layouts')}}</h5>
                                                @endforelse
                                            </div>
                                        @endif
                                        <div class="themeHandles">
                                            <button class="btn ladda-button green saveLayout"
                                                    @if(!$theme->themeId) disabled @endif data-action="save"
                                                    data-theme="{{ $theme->getRegistry()['slug'] }}"
                                                    data-style="contract">
                                                <i class="fa @if($theme->getRegistry()['slug'] == $activeTheme) fa-save @else fa-toggle-off @endif"></i>
                                            </button>
                                            <button class="btn ladda-button red preview" @if(!$theme->themeId) disabled
                                                    @endif data-action="preview"
                                                    data-theme="{{ $theme->getRegistry()['slug'] }}"
                                                    data-style="contract">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @empty
                        <div class="noThemes"><i class="fa fa-info"></i>{{_t('settings.sorry_no_theme')}} !</div>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- END Portlet PORTLET-->
    </div>

    <script type="text/javascript">
        "use strict";
        $.ajaxSetup({
            xhrFields: {
                withCredentials: true
            }
        });

        /**
         * document ready functions
         */
        $(function () {
            $('#themeUploadModal').modal({show: false});
            Ladda.bind('.ladda-button');
        });

        /**
         * open meta information
         */
        $('body').on('click', '.themeInfo', function () {
            $(this).closest('.themeHead').next().slideToggle();
            $(this).parents('.slimScrollDiv,.scroller').css('height', 'auto');
        });

        //Show ThemeUploader
        function showThemeUploader() {
            $('.themeUploader').slideDown().siblings().slideUp();
            $('.uploadThemeButton').addClass('backToThemes').text("{{_t('settings.Back_to_Themes')}}");
        }

        //Show Theme Listing
        function showThemeIndex() {
            $('.themeUploader').slideUp().siblings().slideDown();
            $('.uploadThemeButton').removeClass('backToThemes').text("{{_t('settings.Upload_Themes')}}");
        }

        /**
         * pool switcher
         */
        $('body').on('click', '.themeNav', function () {
            showThemeIndex();
            $(this).addClass('active').siblings().removeClass('active');
            var targetId = $(this).attr('data-pool');
            $('[name="poolSelect"]').val(targetId);
            $('.themeWrapper .caption-helper .pool').text(targetId);
            $('.themeContainer #' + targetId).slideDown().siblings().slideUp();
            //console.log('.themeContainer #' + targetId);
        });

        /**
         * install theme
         */
        function installTheme(slug) {
            var options = {slug: slug};

            return $.post('{{ route("admin.theme.install") }}', options);
        }

        /**
         * activate theme
         */
        function activateTheme(id) {
            var options = {id: id};

            return $.post('{{ route("admin.theme.activate") }}', options);
        }

        /**
         * deactivate theme
         */
        function deactivateTheme(id) {
            var options = {id: id};

            return $.post('{{ route("admin.theme.deactivate") }}', options);
        }

        /**
         * uninstall theme
         */
        function uninstallTheme(id) {
            var options = {id: id};

            return $.post('{{ route("admin.theme.uninstall") }}', options);
        }

        /**
         * install theme in action
         */
        $('body').on('click', '.themeInstall', function () {
            var me = this;

            installTheme($(this).attr('data-theme')).done(function (response) {
                refreshPart(['.themePickerInner[data-theme="' + $(this).attr('data-theme') + '"]']).done(function () {
                    Ladda.bind('.ladda-button');
                });
            }).fail(function () {
                alert('Ooops something wrong happened !!!');
            });
        });

        /**
         * uninstall theme in action
         */
        $('body').on('click', '.themeUninstall', function () {
            var l = Ladda.create(this);
            var me = this;

            uninstallTheme($(this).attr('data-id')).done(function (response) {
                refreshPart(['.eachTheme#' + $(me).closest('.eachTheme').attr('id')]).done(function () {
                    Ladda.bind('.ladda-button');
                });
                l.stop();
                $(me).find('.ladda-spinner').remove();
            }).fail(function () {
                $(me).find('.ladda-spinner').remove();
                alert('Ooops something wrong happened !!!');
            });
        });

        /**
         * activate theme in action
         */
        $('body').on('click', '.themeActivate', function () {
            var l = Ladda.create(this);
            var me = this;

            activateTheme($(this).attr('data-id')).done(function (response) {
                refreshPart(['.eachTheme#' + $(me).closest('.eachTheme').attr('id')]).done(function () {
                    Ladda.bind('.ladda-button');
                });
                l.stop();
                $(me).find('.ladda-spinner').remove();
            }).fail(function () {
                $(me).find('.ladda-spinner').remove();
                alert('Ooops something wrong happened !!!');
            });
        });

        /**
         * deactivate theme in action
         */
        $('body').on('click', '.themeDeactivate', function () {
            var l = Ladda.create(this);
            var me = this;

            deactivateTheme($(this).attr('data-id')).done(function (response) {
                refreshPart(['.eachTheme#' + $(me).closest('.eachTheme').attr('id')]).done(function () {
                    Ladda.bind('.ladda-button');
                });
                l.stop();
                $(me).find('.ladda-spinner').remove();
            }).fail(function () {
                alert('Ooops something wrong happened !!!');
                $(me).find('.ladda-spinner').remove();
            });
        });

        //Initialize progress bar
        function initProgressBar() {
            if (window.circlePercentage) return window.circlePercentage;

            window.circlePercentage = new ProgressBar.Circle('.progressContainer #container', {
                color: '#2499a3',
                strokeWidth: 3,
                trailWidth: 1,
                text: {
                    value: '0'
                }
            });

            return window.circlePercentage;
        }

        //init step
        function initUploadStep(step) {
            $('.eachStep.' + step).addClass('loading').siblings();
        }

        //Mark a step as finished
        function markStepDone(step) {
            $('.eachStep.' + step).addClass('finished').removeClass('loading error');
        }

        //Mark a step as finished
        function markStepError(step) {
            $('.eachStep.' + step).removeClass('loading finished').addClass('error');
        }

        //Theme integrity verification
        function themeIntegrityVerify(options) {
            return $.post("{{ route('admin.theme.upload') }}", options);
        }

        //Show theme uploader
        $('body').on('click', '.uploadThemeButton', function () {
            if (!$(this).hasClass('backToThemes'))
                showThemeUploader();
            else
                showThemeIndex();
        });

        //Show error messages during theme upload
        function throwThemeError(message) {
            $('.themeUploadErrors').show().find('span').text(message);
        }

        //Process Theme
        function processTheme(install) {
            var options = {install: install, action: 'processTheme'};

            return $.post("{{ route('admin.theme.upload') }}", options);
        }

        //Reset theme uploader interface
        function resetUploader() {
            $('.themeUploadErrors').hide().find('span').empty();
            $('.eachStep').removeClass('loading finished error');
            var progressBar = initProgressBar();
            progressBar.animate(0);
            progressBar.setText(0 + '%');
        }

        //Finish upload
        function finishThemeUpload() {
            setTimeout(function () {
                resetUploader();
                $('#themeUploadModal').modal('hide');
                $('.backToThemes').trigger('click');
                refreshPart(['.themeContainer']);
            }, 1000);
        }

        //Dropzone configuration
        Dropzone.options.themeDropper = {
            maxFilesize: 5, // MB
            paramName: 'theme',
            parallelUploads: 1,
            autoProcessQueue: true,
            maxFiles: 1,
            acceptedFiles: '.zip',
            init: function () {
                this.on("processing", function (file) {
                    resetUploader();
                    $('#themeUploadModal').modal('show');
                    initUploadStep('upload');
                    var progressBar = initProgressBar();
                    progressBar.animate(0);
                    progressBar.setText('0%');
                });

                this.on('sending', function (file, xhr, formData) {

                });

                this.on("uploadprogress", function (file, progress) {
                    currentProgress = (progress / 2) / 100;
                    var progressBar = initProgressBar();
                    progressBar.animate(currentProgress);
                    progressBar.setText(currentProgress * 100 + '%');
                });

                this.on('success', function (file, response) {
                    if (response.status == false) {
                        throwThemeError(response.error);
                    }

                    markStepDone('upload');
                    initUploadStep('extract');

                    var progressBar = initProgressBar();

                    progressBar.animate(0.65);
                    progressBar.setText('65%');

                    setTimeout(function () {
                        markStepDone('extract');
                    }, 1000);

                    initUploadStep('integrityCheck');

                    var integrityOptions = {key: response.key, action: 'checkIntegrity'};
                    var integrityReq = themeIntegrityVerify(integrityOptions);

                    integrityReq.fail(function (response) {
                        var error = response.responseJSON;
                        throwThemeError(error.error);
                        markStepError('integrityCheck');
                        Dropzone.instances[0].removeAllFiles();
                    });

                    integrityReq.done(function (integrityReqresponse) {
                        markStepDone('integrityCheck');
                        if ($('[name="installAfterUpload"]').prop('checked')) {
                            initUploadStep('install');
                            progressBar.animate(0.75);
                            progressBar.setText('90%');
                            processTheme(true).done(function (response) {
                                if (response.status == false) {
                                    throwThemeError(response.error);
                                } else {
                                    markStepDone('install');
                                    progressBar.animate(1);
                                    progressBar.setText('100%');
                                    finishThemeUpload();
                                }
                            });
                        } else {
                            processTheme().done(function (response) {
                                progressBar.animate(1);
                                progressBar.setText('100%');
                                finishThemeUpload();
                            });
                        }
                        Dropzone.instances[0].removeAllFiles();
                    });
                });
            }
        };

        //Color pick

        $('body').on('click', '.layoutVarients', function () {
            $(this).addClass('active').siblings().removeClass('active');
        });

        //save/preview theme layout

        $('body').on('click', '.themeHandles button', function () {
            var me = $(this), route;

            switch (me.attr('data-action')) {
                case 'preview':
                    route = '{{ route("admin.theme.preview") }}';
                    break

                case 'save':
                    route = '{{ route("admin.theme.savelayout") }}';
                    break;
            }

            var activeVarient = me.closest('.themePickerInner').find('.layoutVarients.active');
            var options = {
                theme: $(this).attr('data-theme'),
                layout: activeVarient.length ? activeVarient.attr('data-layout') : me.closest('.themePickerInner').find('.layoutVarients').first().attr('data-layout')
            };
            var post = $.post(route, options, function (response) {
                Ladda.stopAll();
                location.href = location.href;
            });
        });

    </script>
@endsection
