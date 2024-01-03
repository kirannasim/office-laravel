<script src="{{ asset('global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('global/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>
<script src="{{ asset('global/plugins/summernote/summernote.min.js') }}"></script>
<link href="{{ asset('global/plugins/summernote/summernote.css') }}" rel="stylesheet" type="text/css">
<div class="row FeedbackWrapper moduleConfig"></div>
<script>

    $(function () {
        loadFeedbackTable();
    });

    //load all feedback formss

    function loadFeedbackTable() {
        simulateLoading('.FeedbackWrapper');
        $.get('{{ route('feedback.table') }}', function (response) {
            $('.FeedbackWrapper').html(response);
        });
    }

    // load feedback add or edit form

    function loadConfigForm(id) {
        simulateLoading('.FeedbackWrapper');
        $.post('{{ route('feedback.configform') }}', {FeedbackFormId: id}, function (response) {
            $('.FeedbackWrapper').html(response);
        });
    }

    // add or edit question form

    function manageQuestion(id, questionId) {
        $.post('{{ route('feedback.questionConfigForm') }}', {
            feedbackFormId: id,
            questionId: questionId
        }, function (response) {
            $('.FeedbackWrapper').html(response);
        });
    }

    // add or edit option form

    function manageOption(id, optionID) {
        $.post('{{ route('feedback.optionConfigForm') }}', {
            FeedbackFormId: id,
            optionId: optionID
        }, function (response) {
            $('.FeedbackWrapper').html(response);
        });
    }
</script>

<style>
    .row.FeedbackWrapper {
        /* max-width: 800px;
         margin: auto;
         padding: 15px;
         overflow: hidden;*/
        /*background: white;
        box-shadow: 4px 6px 5px rgba(60, 60, 60, 0.1);*/
    }

    .page-content {
        background: #fff;
    }

    .row.FeedbackWrapper.moduleConfig .panel-primary .panel-heading {
        color: #919191;
        background-color: #eeeeee;
        border-color: #eeeeee;
        font-weight: 600;
    }

    .row.FeedbackWrapper.moduleConfig .panel-primary {
        border-color: #eeeeee;
    }

    .moduleConfiq .mt-radio-inline {
        padding: 0px;
    }

    .moduleConfiq input.form-control {
        margin-bottom: 10px;
    }

    button.btn.btn-transparent.blue.btn-outline.btn-circle.btn-sm.active.addNewConfig {
        border-color: #c1bebe;
        color: #FFF;
        background-color: #c1bebe;
    }

    .moduleConfiq .panel-primary > .panel-heading {
        color: #919191;
        overflow: hidden;
    }

    .moduleConfig .panel-primary {
        border-color: #eeeeee;
    }

    .moduleConfig .panel-heading span.actionButtonDiv button.btn.addNewConfig {
        margin-right: 0px !important;
        background-color: #c1c1c1;
        border-color: #c1c1c1;
    }

    .row.FeedbackWrapper.moduleConfig .portlet.box.blue-hoki {
        border: 0px;
        border-top: 0;
    }

    .row.FeedbackWrapper.moduleConfig .portlet.box.blue-hoki .portlet-title {
        background-color: white !important;
        color: #919191;
        border-bottom: solid 1px #eeeeeea8;
    }

    .row.FeedbackWrapper.moduleConfig .portlet.box.blue-hoki .portlet-title .caption, .row.FeedbackWrapper.moduleConfig .portlet.box.blue-hoki .portlet-title .caption i {
        color: #919191 !important;
    }

    .row.FeedbackWrapper.moduleConfig .portlet.box.blue-hoki .portlet-body {
        background-color: white !important;
    }

    .row.FeedbackWrapper.moduleConfig .portlet.box.blue-hoki .portlet-body .bg-blue-chambray {
        background: #2c3e5000 !important;
        color: #333 !important;
    }

    .mt-element-list .list-simple.mt-list-head {
        padding: 10px 0px;
    }

    .portlet.box.blue-hoki .mt-element-list .list-simple.group .list-toggle-container .list-toggle.done {
        background-color: #36c6d3;
    }

    .portlet.box.blue-hoki .mt-element-list .list-simple.ext-1.mt-list-container ul > .mt-list-item {
        padding: 15px;
        border: 1px solid #36c6d36b !important;
    }

    .portlet.box.blue-hoki .mt-element-list .list-simple.ext-1.mt-list-container ul > .mt-list-item.done:hover {
        background-color: #eeeeee8c;
    }

    .portlet.box.blue-hoki .mt-element-list .list-simple.ext-1.mt-list-container ul > .mt-list-item {
        padding: 15px;
        border: 1px solid #36c6d36b !important;
        color: #797979;
        font-size: 15px;
        overflow: auto;
    }

    .portlet.box.blue-hoki .mt-element-list .list-simple.ext-1.mt-list-container ul > .mt-list-item i {
        display: inline-block;
        font-size: 20px;
    }

    .portlet.box.blue-hoki .mt-element-list .list-item-content {
        display: inline-block;
    }

    .portlet.box.blue-hoki .mt-element-list .list-datetime {
        display: inline-block;
        text-align: right;
        float: right;
    }

    .row.FeedbackWrapper button.btn.editQuestion {
        width: 52px;
    }

    .row.FeedbackWrapper button.btn.deleteQuestion {
        width: 52px;
    }

    .row.FeedbackWrapper .portlet-body {
        padding: 0px;
    }
</style>

