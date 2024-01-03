@extends('Admin.Layout.master')
@section('content')
    <div class="row">
        <div class="col-md-3 moduleNavigator">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cubes font-purple-plum"></i>
                        <span class="caption-helper">{{_t('settings.Module_Pools')}}</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="modulePoolContainer">
                        @foreach($pools->sort() as $pool)
                            <div class="modulePool @if ($loop->first) active @endif" data-pool="{{ $pool }}">
                                <p>{{ $pool }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 moduleWrapper">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold font-purple-plum uppercase"> {{_t('settings.Modules')}} </span>
                        <span class="caption-helper">{{_t('settings.Belongs_to')}} <p
                                    class="pool">{{ $pools->first() }}</p></span>
                    </div>
                    <div class="inputs">
                        <button type="button"
                                class="btn btn-circle dark btn-outline sbold uploadModuleButton">{{_t('settings.Upload_Module')}}

                        </button>
                        <div class="portlet-input input-inline input-small">
                            <div class="input-icon right">
                                <i class="icon-magnifier"></i>
                                <input type="text" class="form-control input-circle"
                                       placeholder="{{_t('settings.search')}}"></div>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    @component('Components.demoWarning') @endcomponent
                    <div class="moduleUploader">
                        <div class="m-heading-1 m-bordered moduleDropNote">
                            <h3>{{_t('settings.Upload_module')}}</h3>
                            <p> {{_t('settings.upload_text')}}</p>
                            <p class="themeDropNoteCaution">
                                <span class="label label-danger">{{_t('settings.NOTE')}}
                                    :</span>{{_t('settings.NOTE_text')}}
                            </p>
                        </div>
                        <div class="moduleDropper">
                            {!! Form::open(['route' => 'admin.module.upload','class' => 'dropzone','id' => 'moduleDropper']) !!}{!! Form::close() !!}
                            <div class="moduleUploadOptions">
                                <div class="col-md-6">
                                    <div class="moduleUploadOptionsInner">
                                        <div class="eachOption">
                                            <label class="mt-checkbox mt-checkbox-outline">
                                                {{_t('settings.after_install_text')}}
                                                <input type="checkbox" name="installAfterUpload" value="0">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade in" id="moduleUploadModal" tabindex="-1" role="basic"
                                 aria-hidden="true" style="padding-right: 17px;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true"></button>
                                            <h4 class="modal-title">{{_t('settings.Module_Wizard')}} </h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="moduleModalInner">
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
                                                            <span class="stepText">{{_t('settings.Uploading_module')}}</span>
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
                                                            <span class="stepText">{{_t('settings.Extracting_module')}}</span>
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
                                                            <span class="stepText">{{_t('settings.Checking_module_integrity')}}</span>
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
                                                            <span class="stepText">{{_t('settings.Installing_module')}}</span>
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
                                            <div class="moduleUploadErrors">
                                                <i class="fa fa-exclamation"></i>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">
                                                {{_t('settings.Close')}}
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>
                    </div>
                    <div class="moduleContainer"></div>
                </div>
            </div>
            <!-- END Portlet PORTLET-->
        </div>
        <div class="col-md-9 configHolder">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold font-purple-plum uppercase"> <i
                                    class="icon-settings"></i>{{_t('settings.Modules_Configuration')}} </span>
                        <span class="caption-helper"></span>
                    </div>
                </div>
                @component('Components.demoWarning') @endcomponent
                <div class="portlet-body innerHolder"></div>
                <button class="btn dark btn-outline backToModules">
                    <i class="icon-arrow-left"></i> {{_t('settings.Back_to_modules')}}
                </button>
            </div>
        </div>
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
            $('#moduleUploadModal').modal({show: false});
            Ladda.bind('.ladda-button');
            // Load module list
            loadModules();
        });

        /**
         * open meta information
         */
        $('body').on('click', '.moduleInfo', function () {
            $(this).closest('.moduleHead').next().slideToggle();
            $(this).parents('.slimScrollDiv,.scroller').css('height', 'auto');
        });

        //Show ModuleUploader
        function showModuleUploader() {
            $('.moduleUploader').slideDown().siblings().slideUp();
            $('.uploadModuleButton').addClass('backToModules').text("{{_t('settings.Back_to_modules')}}");
        }

        //Show Module Listing
        function showModuleIndex() {
            $('.moduleUploader, .configHolder').slideUp().siblings().slideDown();
            $('.configHolder .innerHolder').empty();
            $('.uploadModuleButton').removeClass('backToModules').text("{{_t('settings.Upload_Modules')}}");
        }

        /**
         * pool switcher
         */
        $('body').on('click', '.modulePool', function () {
            showModuleIndex();
            $(this).addClass('active').siblings().removeClass('active');
            var targetId = $(this).attr('data-pool');
            $('[name="poolSelect"]').val(targetId);
            $('.moduleWrapper .caption-helper .pool').text(targetId);
            $('.moduleContainer #' + targetId).addClass('active').siblings().removeClass('active');
            //console.log('.moduleContainer #' + targetId);
        });

        /**
         * install module
         */
        function installModule(slug) {
            var options = {slug: slug};

            return $.post('{{ route("admin.module.install") }}', options);
        }

        /**
         * activate module
         */
        function activateModule(id) {
            var options = {id: id};

            return $.post('{{ route("admin.module.activate") }}', options);
        }

        /**
         * deactivate module
         */
        function deactivateModule(id) {
            var options = {id: id};

            return $.post('{{ route("admin.module.deactivate") }}', options);
        }

        /**
         * uninstall module
         */
        function uninstallModule(id) {
            var options = {id: id};

            return $.post('{{ route("admin.module.uninstall") }}', options);
        }

        /**
         * install module in action
         */
        $('body').on('click', '.moduleInstall', function () {
            var me = this;

            installModule($(this).attr('data-module')).done(function (response) {
                loadModules().done(function () {
                    showModuleIndex();
                });
                Ladda.stopAll();
            }).fail(function () {
                Ladda.stopAll();
                alert('Ooops something wrong happened !!!');
            });
        });

        /**
         * uninstall module in action
         */
        $('body').on('click', '.moduleUninstall', function () {
            var l = Ladda.create(this);
            var me = this;

            uninstallModule($(this).attr('data-id')).done(function (response) {
                loadModules().done(function () {
                    showModuleIndex();
                });
                Ladda.stopAll();
                $(me).find('.ladda-spinner').remove();
            }).fail(function () {
                Ladda.stopAll();
                $(me).find('.ladda-spinner').remove();
                alert('Ooops something wrong happened !!!');
            });
        });

        /**
         * activate module in action
         */
        $('body').on('click', '.moduleActivate', function () {
            var l = Ladda.create(this);
            var me = this;
            activateModule($(this).attr('data-id')).done(function (response) {
                loadModules().done(function () {
                    showModuleIndex();
                });
                Ladda.stopAll();
                $(me).find('.ladda-spinner').remove();
            }).fail(function () {
                Ladda.stopAll();
                $(me).find('.ladda-spinner').remove();
                alert('Ooops something wrong happened !!!');
            });
        });

        /**
         * deactivate module in action
         */
        $('body').on('click', '.moduleDeactivate', function () {
            var me = this;

            deactivateModule($(this).attr('data-id')).done(function (response) {
                loadModules().done(function () {
                    showModuleIndex();
                });
                Ladda.stopAll();
                $(me).find('.ladda-spinner').remove();
            }).fail(function () {
                Ladda.stopAll();
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

        function loadModules() {
            simulateLoading($('.moduleContainer'));

            return $.get("{{ route('admin.module.list') }}", function (response) {
                $('.moduleContainer').html(response).promise().done(function () {
                    var targetId = $('.modulePool.active').attr('data-pool');
                    $('.moduleContainer #' + targetId).addClass('active').siblings().removeClass('active');
                });
            });
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

        //Module integrity verification
        function moduleIntegrityVerify(options) {
            return $.post("{{ route('admin.module.upload') }}", options);
        }

        //Show module uploader
        $('body').on('click', '.uploadModuleButton', function () {
            if (!$(this).hasClass('backToModules')) {
                showModuleUploader();
            } else {
                showModuleIndex();
            }
        });

        //Show error messages during module upload
        function throwModuleError(message) {
            $('.moduleUploadErrors').show().find('span').text(message);
        }

        //Process Module
        function processModule(install) {
            var options = {install: install, action: 'processModule'};
            return $.post("{{ route('admin.module.upload') }}", options);
        }

        //Reset module uploader interface
        function resetUploader() {
            $('.moduleUploadErrors').hide().find('span').empty();
            $('.eachStep').removeClass('loading finished error');
            var progressBar = initProgressBar();
            progressBar.animate(0);
            progressBar.setText(0 + '%');
        }

        //Open module config
        $('body').on('click', 'a.moduleConfig', function (e) {
            if ($(this).data('open-as') != 'async') {
                window.open($(this).data('href'));
                return;
            }

            e.preventDefault();
            $('.moduleWrapper').slideUp();
            $('.configHolder').fadeIn();
            simulateLoading('.configHolder .innerHolder');
            $.get($(this).data('href'), function (response) {
                $('.configHolder .innerHolder').html(response);
            });
        });

        //Back to modules list
        $('.backToModules').click(function () {
            $('.moduleWrapper').fadeIn();
            $('.configHolder').slideUp().find('.innerHolder').empty();
        });

        //Finish upload
        function finishModuleUpload() {
            setTimeout(function () {
                resetUploader();
                $('#moduleUploadModal').modal('hide');
                $('.backToModules').trigger('click');
                refreshPart(['.moduleContainer']);
            }, 1000);
        }

        //Dropzone configuration
        Dropzone.options.moduleDropper = {
            maxFilesize: 5, // MB
            paramName: 'module',
            parallelUploads: 1,
            autoProcessQueue: true,
            maxFiles: 1,
            acceptedFiles: '.zip',
            init: function () {
                this.on("processing", function (file) {
                    resetUploader();
                    $('#moduleUploadModal').modal('show');
                    initUploadStep('upload');
                    var progressBar = initProgressBar();
                    progressBar.animate(0);
                    progressBar.setText('0%');
                });

                this.on('sending', function (file, xhr, formData) {

                });

                this.on("uploadprogress", function (file, progress) {
                    let currentProgress = (progress / 2) / 100;
                    let progressBar = initProgressBar();
                    progressBar.animate(currentProgress);
                    progressBar.setText(currentProgress * 100 + '%');
                });

                this.on('success', function (file, response) {
                    if (response.status == false)
                        throwModuleError(response.error);

                    markStepDone('upload');
                    initUploadStep('extract');

                    let progressBar = initProgressBar();

                    progressBar.animate(0.65);
                    progressBar.setText('65%');

                    setTimeout(function () {
                        markStepDone('extract');
                    }, 1000);

                    initUploadStep('integrityCheck');

                    let integrityOptions = {key: response.key, action: 'checkIntegrity'};
                    let integrityReq = moduleIntegrityVerify(integrityOptions);

                    integrityReq.fail(function (response) {
                        let error = response.responseJSON;
                        throwModuleError(error.error);
                        markStepError('integrityCheck');
                        Dropzone.instances[0].removeAllFiles();
                    });

                    integrityReq.done(function (integrityReqresponse) {
                        markStepDone('integrityCheck');
                        if ($('[name="installAfterUpload"]').prop('checked')) {
                            initUploadStep('install');
                            progressBar.animate(0.75);
                            progressBar.setText('90%');
                            processModule(true).done(function (response) {
                                if (response.status == false) {
                                    throwModuleError(response.error);
                                } else {
                                    markStepDone('install');
                                    progressBar.animate(1);
                                    progressBar.setText('100%');
                                    finishModuleUpload();
                                }
                            });
                        } else {
                            processModule().done(function (response) {
                                progressBar.animate(1);
                                progressBar.setText('100%');
                                finishModuleUpload();
                            });
                        }
                        Dropzone.instances[0].removeAllFiles();
                    });
                });
            }
        };
    </script>
@endsection