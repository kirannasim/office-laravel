<div class="col-sm-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-sm-10">
                        <span style="padding-top: 4px; display: block;"><span aria-hidden="true"
                                                                              class="icon-tag"></span>
                            {{ _mt($moduleId,'Feedback.Feedback_Forms') }}</span>
                </div>
                <div class="col-sm-2">
                        <span class="actionButtonDiv">
                            <button class="btn btn-transparent blue btn-outline btn-circle btn-sm active addNewConfig">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i> {{ _mt($moduleId,'Feedback.Add') }}
                            </button>
                        </span>
                </div>
            </div>
        </div>
        <div class="panel-body">
            @if($feedbackForms->count())
                @foreach($feedbackForms as $form)
                    <div class=" ">
                        <div class="portlet box blue-hoki">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>{{ $form->name }} </div>
                                <div class="actions">
                                    <a href="javascript:;" class="btn btn-default btn-sm addQuestion"
                                       data-id="{{ $form->id }}">
                                        <i class="fa fa-plus"></i> {{ _mt($moduleId,'Feedback.Add_Question') }}
                                    </a>
                                    <a href="javascript:;" class="btn btn-default btn-sm addOption"
                                       data-id="{{ $form->id }}">
                                        <i class="fa fa-plus"></i> {{ _mt($moduleId,'Feedback.Add_Options') }}
                                    </a>
                                    <a href="javascript:;" class="btn btn-default btn-sm editFeedbackForm"
                                       data-id="{{ $form->id }}">
                                        <i class="fa fa-pencil"></i> {{ _mt($moduleId,'Feedback.Edit') }}
                                    </a>
                                    <a href="javascript:;" class="btn btn-default btn-sm deleteFeedbackForm"
                                       data-id="{{ $form->id }}">
                                        <i class="fa fa-close"></i> {{ _mt($moduleId,'Feedback.Delete') }}
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="slimScrollDiv">
                                    <div class="scroller"
                                         data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd"
                                         data-initialized="1">
                                        <br>
                                        <div class="mt-element-list">
                                            <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                                                <div class="list-head-title-container">
                                                    <div class="list-date">{{ date('Y-m-d',strtotime($form->created_at)) }}</div>
                                                    <h3 class="list-title">{{ $form->name }}</h3>
                                                    <hr>
                                                    <p>{!! $form->description !!}</p>
                                                </div>
                                            </div>
                                            <div class="mt-list-container list-simple ext-1 group">
                                                @if(isset($form->questions))
                                                    <a class="list-toggle-container collapsed" data-toggle="collapse"
                                                       href="#feedback_question_{{ $form->id }}" aria-expanded="false">
                                                        <div class="list-toggle done uppercase"> Questions
                                                            <span class="badge badge-default pull-right bg-white font-green bold">{{ $form->questions->count() }}</span>
                                                        </div>
                                                    </a>
                                                    <div class="panel-collapse collapse"
                                                         id="feedback_question_{{ $form->id }}" aria-expanded="false"
                                                         style="height: 0px;">
                                                        <ul>
                                                            @foreach($form->questions as $question)
                                                                <li class="mt-list-item done">
                                                                    <div class="row">
                                                                        <div class="col-sm-9">
                                                                            <i class="fa fa-question-circle"></i>
                                                                            <div class="list-item-content">
                                                                                {!! $question->question !!}
                                                                            </div>
                                                                            <div class="list-datetime"> {{ date('n M',strtotime($question->created_at)) }} </div>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <input type="hidden" class="formIdClass"
                                                                                   data-id="{{ $form->id }}">
                                                                            <button class="btn btn-primary ladda-button editQuestion"
                                                                                    data-style="contract"
                                                                                    data-id="{{ $question->id }}"
                                                                                    title="edit"><i
                                                                                        class="fa fa-pencil"></i>
                                                                            </button>
                                                                            <button class="btn btn-danger ladda-button deleteQuestion"
                                                                                    data-style="contract"
                                                                                    data-id="{{ $question->id }}"
                                                                                    title="delete"><i
                                                                                        class="fa fa-trash-o"></i>
                                                                            </button>
                                                                        </div>

                                                                    </div>

                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                @if(isset($form->options))
                                                    <a class="list-toggle-container collapsed" data-toggle="collapse"
                                                       href="#feed_back_option_{{ $form->id }}" aria-expanded="false">
                                                        <div class="list-toggle uppercase"> Options
                                                            <span class="badge badge-default pull-right bg-white font-dark bold">{{ $form->options->count() }}</span>
                                                        </div>
                                                    </a>
                                                    <div class="panel-collapse collapse"
                                                         id="feed_back_option_{{ $form->id }}"
                                                         aria-expanded="false" style="height: 0px;">
                                                        <ul>
                                                            @foreach($form->options as $option)
                                                                <li class="mt-list-item">
                                                                    <div class="row">
                                                                        <div class="col-sm-9">
                                                                            <i class="fa fa-circle"></i>
                                                                            <div class="list-datetime"> {{ date('n M',strtotime($option->created_at)) }}</div>
                                                                            <div class="list-item-content">
                                                                                <a href="javascript:;">{{ $option->feedback_option }}</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <input type="hidden" class="formIdClass"
                                                                                   data-id="{{ $form->id }}">
                                                                            <button class="btn btn-primary ladda-button editOption"
                                                                                    data-style="contract"
                                                                                    data-id="{{ $option->id }}"
                                                                                    title="edit">
                                                                                <i class="fa fa-pencil"></i>
                                                                            </button>
                                                                            <button class="btn btn-danger ladda-button deleteOption"
                                                                                    data-style="contract"
                                                                                    data-id="{{ $option->id }}"
                                                                                    title="delete"><i
                                                                                        class="fa fa-trash-o"></i>
                                                                            </button>
                                                                        </div>

                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                {{ _mt($moduleId,'Feedback.no_available_feedback_Forms') }}
            @endif
        </div>
    </div>
</div>

<script>"use strict";

    $(function () {
        Ladda.bind('.ladda-button');

        // add new Feed back form
        $('.addNewConfig').click(function () {
            loadConfigForm();
        });

        // edit a feedbackform
        $('.editFeedbackForm').click(function () {
            simulateLoading('.FeedbackWrapper');
            loadConfigForm($(this).attr('data-id'));
        });

        //add new questions
        $('.addQuestion').click(function () {
            simulateLoading('.FeedbackWrapper');
            manageQuestion($(this).attr('data-id'));
        });

        //add new option
        $('.addOption').click(function () {
            simulateLoading('.FeedbackWrapper');
            manageOption($(this).attr('data-id'));
        });

        // edit question
        $('.editQuestion').click(function () {
            var formID = $(this).siblings('.formIdClass').attr('data-id');
            var questionId = $(this).attr('data-id');
            manageQuestion(formID, questionId);
        });

        //delete question
        $('.deleteQuestion').click(function () {
            var option = $(this).attr('data-id');
            $.post('{{ route('feedback.question.delete') }}', {questionId: option}, function () {
                toastr.success(' Question Deleted succesfully ');
                loadFeedbackTable();
            });
        });

        // edit option
        $('.editOption').click(function () {
            var formID = $(this).siblings('.formIdClass').attr('data-id');
            var optionId = $(this).attr('data-id');
            manageOption(formID, optionId);
        });

        //delete option
        $('.deleteOption').click(function () {
            var option = $(this).attr('data-id');
            $.post('{{ route('feedback.option.delete') }}', {optionId: option}, function () {
                toastr.success(' Question Deleted succesfully ');
                loadFeedbackTable();
            });
        });

        //delete feedback form
        $('.deleteFeedbackForm').click(function () {
            var id = $(this).attr('data-id');
            $.post('{{ route('feedback.delete') }}', {feedbackFormId: id}, function () {
                toastr.success(' Field deleted succesfully ');
                loadFeedbackTable();
            })
        })
    })
</script>
<style>


    .table-scrollable {
        overflow: visible !important;
    }
</style>
