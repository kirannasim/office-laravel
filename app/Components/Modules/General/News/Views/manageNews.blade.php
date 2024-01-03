@extends(ucfirst(getScope()).'.Layout.master')
@section('content')
    <script src="{{ asset('global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('global/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>
    <div class="row">
        <div class="portletHousing col-md-5">
            <div class="portlet light bordered fieldWizard newsManagerForm">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-info font-grey-gallery"></i>
                        <span class="caption-subject bold font-grey-gallery uppercase">{{ _mt($moduleId,'News.Add_News') }}</span>
                    </div>
                </div>
                <div class="newsForm"></div>
            </div>
        </div>
        <div class="portletHousing col-md-7">
            <div class="portlet light bordered fieldWizard">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list font-grey-gallery"></i>
                        <span class="caption-subject bold font-grey-gallery uppercase">{{ _mt($moduleId,'News.News_List') }}</span>
                    </div>
                    <div class="inputs">
                        <button type="button"
                                class="btn btn-circle dark btn-outline sbold addNewNews">{{ _mt($moduleId,'News.Add_New') }}
                        </button>
                    </div>
                </div>
                <div class="newsList"></div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        "use strict";

        // Load form
        function loadForm() {
            simulateLoading($('.newsForm'));
            var endPoint = "{{ scopeRoute('news.form') }}";
            return $.get(endPoint, function (response) {
                $('.newsForm').html(response);
                Ladda.bind('.submitForm');
            });
        }

        //load news list
        function LoadList(route) {
            simulateLoading($('.newsList'));
            route = route ? route : "{{scopeRoute('news.list')}}";
            return $.get(route, function (response) {
                $('.newsList').html(response);
                Ladda.bind('.editNews');
                Ladda.bind('.deleteNews');
            });
        }

        function editNews(id) {
            var options = {id: id};
            $.post('{{ scopeRoute("news.get") }}', options, function (response) {
                Ladda.stopAll();
                var news_data = JSON.parse(response);


                for (let key in news_data.content) {

                    $('.NewsForm [name="content[' + key + ']"]').val(news_data.content[key]);
                }

                for (let key in news_data.title) {
                    $('.NewsForm input[name="title[' + key + ']"]').val(news_data.title[key]);
                }

                $("[name='dispatch_date']").val(news_data['dispatch_date']).addClass('edited');
                $("#id").val(news_data['id']);
                $('body, html').animate({scrollTop: 0}, 1000);
            });
        }

        function deleteNews(id) {
            var options = {id: id};
            $.post('{{ scopeRoute("news.delete") }}', options, function (response) {
                toastr.success('{{ _mt($moduleId,'News.news_deleted_successfully') }}');
                Ladda.stopAll();
                LoadList();
                loadForm();
            });
        }

        $(function () {

            loadForm().done(function () {
                LoadList();
            });

        });

        $('.addNewNews').click(function () {
            loadForm();
        });
    </script>
@endsection
