@extends(ucfirst(getScope()).'.Layout.master')
@section('content')
    <script src="{{ asset('global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('global/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>
    <div class="moduleConfiq faqSection">
        <div class="row faqButton">
            <div class="col-sm-4 col-sm-offset-8">
                <button class="btn btn-gray loadFaq ladda-button"
                        data-style="contract">{{ _mt($moduleId,'Faq.faq') }}</button>
                <button class="btn btn-default loadCategory ladda-button"
                        data-style="contract">{{ _mt($moduleId,'Faq.category') }}</button>
            </div>
        </div>
        <div class="faqWrapper"></div>
    </div>
    <script>
        $(function () {
            Ladda.bind('.ladda-button')
            loadFaqList();
        });

        //load category list
        function loadCategoryList() {
            simulateLoading('.faqWrapper');
            $.post(' {{ scopeRoute('faq.category.list') }}', function (response) {
                $('.faqWrapper').html(response);
                Ladda.stopAll();
            });
        }

        //load category form
        function loadCategoryForm(id) {
            simulateLoading('.faqWrapper');
            var options = {id: id}
            $.post('{{ scopeRoute('faq.category.form') }}', options, function (response) {
                $('.faqWrapper').html(response);
                Ladda.stopAll();
            });
        }

        //load faq form
        function loadFaqForm(id) {
            simulateLoading('.faqWrapper');
            var options = {id: id}
            $.post('{{ scopeRoute('faq.question.form') }}', options, function (response) {
                $('.faqWrapper').html(response);
                Ladda.stopAll();
            });
        }

        //load faq list
        function loadFaqList() {
            simulateLoading('.faqWrapper');
            $.post(' {{ scopeRoute('faq.question.list') }}', function (response) {
                $('.faqWrapper').html(response);
                Ladda.stopAll();
            });
        }

        $('.loadFaq').click(function () {
            loadFaqList();
        });

        $('.loadCategory').click(function () {
            loadCategoryList();
        });
    </script>
    <style>
        .faqWrapper .panel-heading h3 {
            padding: 0px;
            font-size: 17px;
            margin: 0;
            margin-bottom: 0px;
            font-weight: 600;
            padding-bottom: 0px;
            cursor: pointer;
            border-bottom: 0px;
        }

        .moduleConfiq .panel-primary .panel-heading {
            color: #4d4d4d;
            background-color: #eeeeee;
            border-color: #eeeeee;
            font-weight: 600;
        }

        .moduleConfiq .panel-primary .panel-heading {
            color: #919191;
        }

        .moduleConfiq .panel-primary {
            border-color: #eeeeee;
        }

        .moduleConfiq .mt-radio-inline {
            padding: 0px;
        }

        .moduleConfiq input.form-control {
            margin-bottom: 10px;
        }

        .moduleConfiq .profileSection h3 {
            font-size: 17px;
            margin: 0;
            margin-bottom: 0px;
            font-weight: 600;
            padding-bottom: 0px;
            cursor: pointer;
            border-bottom: 0px;
        }

        .faqWrapper .panel-heading {
            color: #919191;
            background-color: #eeeeee;
            border-color: #eeeeee;
            font-weight: 600;
        }

        .faqWrapper .panel-heading span {
            padding-top: 4px;
            display: block;
        }

        .faqWrapper .panel-heading span i {
            font-size: 17px;
        }

        .faqWrapper .panel-heading button.addNewFaq {
            float: right;
        }

        .faqWrapper .panel-body table.table button.btn {
            width: 45px;
            display: inline-block !important;
        }

        .row.faqButton {
            margin: 0px;
        }

        .row.faqButton button.btn {
            float: right;
            margin-bottom: 10px;
            color: #8a8585;
        }

        .row.faqButton .col-sm-4 {
            padding: 0pc;
        }

        .moduleConfiq.faqSection button.btn.backtoFaqList, .moduleConfiq.faqSection button.btn.backtoCategoryList {
            float: right;
        }

        .moduleConfiq.faqSection .form-control {
            margin-bottom: 10px;
        }
    </style>
@endsection
