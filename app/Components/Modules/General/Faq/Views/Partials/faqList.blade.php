<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="row">
            <div class="col-sm-9"><span><i class="fa fa-question-circle"></i> {{ _mt($moduleId,'Faq.faq') }}</span>
            </div>
            <div class="col-sm-3">
                <button type="button" class="btn btn-transparent btn-outline btn-circle addNewFaq"><i
                            class="fa fa-plus-circle" aria-hidden="true"></i> {{ _mt($moduleId,'Faq.add_new_faq') }}
                </button>
            </div>
        </div>
    </div>
    <div class="panel-body" style="display: block">
        @if($faqs->count())
            <div class="table-scrollable">
                <table class="table table-striped table-hover">
                    <thead>
                    <th>{{ _mt($moduleId,'Faq.sl_no') }}</th>
                    <th>{{ _mt($moduleId,'Faq.question') }}</th>
                    <th>{{ _mt($moduleId,'Faq.category') }}</th>
                    <th>{{ _mt($moduleId,'Faq.sort_order') }}</th>
                    <th>{{ _mt($moduleId,'Faq.action') }}</th>
                    </thead>
                    <tbody>
                    @foreach($faqs as $faq)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{!! isset($faq->title[Lang::locale()]) ? $faq->title[Lang::locale()] : '' !!}</td>
                            <td>{{ $faq->faqCategory ? ( isset($faq->faqCategory->title[Lang::locale()]) ? $faq->faqCategory->title[Lang::locale()] : '' ) : 'NA'  }}</td>
                            <td>{{ $faq->sort_order }}</td>
                            <td style="width: 110px;">
                                <button class="btn btn-primary editFaq ladda-button" data-style="contract"
                                        data-id="{{ $faq->id }}"><i
                                            class="fa fa-pencil-square-o"></i>{{--{{ _mt($moduleId,'Faq.edit') }}--}}
                                </button>
                                <button class="btn btn-danger deleteFaq ladda-button" data-style="contract"
                                        data-id="{{ $faq->id }}"><i
                                            class="fa fa-trash-o"></i> {{--{{ _mt($moduleId,'Faq.delete') }} --}}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            {{ _mt($moduleId,'Faq.no_faq_available') }}
        @endif
    </div>
</div>
<script>
    'use strict';

    $(function () {
        Ladda.bind('.ladda-button');
    });
    $('.addNewFaq').click(function () {
        loadFaqForm();
    });

    $('.editFaq').click(function () {
        loadFaqForm($(this).attr('data-id'))
    });

    $('.deleteFaq').click(function () {
        var options = {id: $(this).attr('data-id')}
        $.post('{{ scopeRoute('faq.question.delete') }}', options, function (response) {
            toastr.success('{{ _mt($moduleId,'Faq.faq_deleted_successfully') }}');
            loadFaqList();
        })
    });
</script>
