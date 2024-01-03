@extends('User.Layout.master')
@section('content')
    <div class="row faqSection">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 faq bhoechie-tab-container">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 faqLeft bhoechie-tab-menu">
                <div class="list-group">
                    @foreach($categories as $category)
                        <a href="#"
                           class="list-group-item  text-center @if( $loop->iteration == 1) active @endif">
                            <i class="circle"></i>{{ isset($category->title[Lang::locale()]) ? $category->title[Lang::locale()] : $category->title['en'] }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 bhoechie-tab">
                @foreach($categories as $category)
                    <div class="faqRight bhoechie-tab-content @if( $loop->iteration == 1) active @endif">
                        <h3>{{ isset($category->title[Lang::locale()]) ? $category->title[Lang::locale()] : $category->title['en'] }}</h3>
                        <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
                            @forelse($category->faqs as $faq)
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading{{$faq->id}}">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse"
                                               data-parent="#accordion{{$faq->id}}"
                                               href="#collapse{{$faq->id}}" aria-expanded="true"
                                               aria-controls="collapse{{$faq->id}}">
                                                <i class="more-less glyphicon glyphicon-plus"></i>
                                                {{ isset($faq->title[Lang::locale()]) ? $faq->title[Lang::locale()] : $faq->title['en'] }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{$faq->id}}" class="panel-collapse collapse"
                                         role="tabpane{{$faq->id}}"
                                         aria-labelledby="heading{{$faq->id}}">
                                        <div class="panel-body">
                                            {!! isset($faq->content[Lang::locale()]) ? $faq->content[Lang::locale()] : $faq->content['en'] !!}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="nofaqs">
                                    <i class="fa fa-exclamation"></i> Sorry there are no FAQ's in this category.
                                </div>
                            @endforelse
                        </div><!-- panel-group -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <style>
        .page-content {
            background: #eee;
        }

        .pageTitleRight {
            display: none;
        }
    </style>
    <script>
        'use strict';
        $(document).ready(function () {
            $(".faqLeft.bhoechie-tab-menu>div.list-group>a").click(function (e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();
                $(".faq .bhoechie-tab>.faqRight.bhoechie-tab-content").removeClass("active");
                $(".faq .bhoechie-tab>.faqRight.bhoechie-tab-content").eq(index).addClass("active");
            });
        });

        function toggleIcon(e) {
            $(e.target)
                .prev('.panel-heading')
                .find(".more-less")
                .toggleClass('glyphicon-plus glyphicon-minus');
        }

        $('.panel-group').on('hidden.bs.collapse', toggleIcon);
        $('.panel-group').on('shown.bs.collapse', toggleIcon);
    </script>
@endsection
