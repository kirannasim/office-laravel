@extends(ucfirst(getScope()).'.Layout.master')
@section('content')
    <div class="row FeedbackWrapper">
        <h3>
            <div class="feedbackTitle">{{ $feedbackData->name }}</div>
        </h3>
        <hr>
        <div class="row" style="margin: 10px 0px;">
            <div class="col-sm-7">
                <div class="descriptionDiv">{!! $feedbackData->description !!}</div>
            </div>
            <div class="col-sm-5">
                <div class="dateRow">{{ _mt($moduleId,'Feedback.Date') }} : {{ date('Y-m-d') }}</div>
            </div>
        </div>
        {!! Form::open(['route' =>  [strtolower(getScope()).'.feedback.userFeedback.save'],'class' => 'feedbackConfigForm ajaxSave','id' => 'feedbackForm', 'novalidate' => 'novalidate']) !!}
        <input type="hidden" name="form_id" id="form_id" value="{{ $form_id }}">
        <div class="row formTableDiv">
            <div class="table-scrollable">
                <table class="table table table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="">{{ _mt($moduleId,'Feedback.Sl_No') }}</th>
                        <th class="">{{ _mt($moduleId,'Feedback.question') }}</th>
                        @foreach($feedbackData->options as $option)
                            <th class=""> {{ $option->feedback_option }} </th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($feedbackData->questions as $question)

                        <tr>
                            <td class=""> {{ $loop->iteration }} </td>
                            <td> {!! $question->question !!} </td>
                            @foreach($feedbackData->options as $option)
                                <td>
                                    <input type="radio"
                                           @if(isset($feedbackData->userFeed->first()->options[$question->id]))
                                           @if($feedbackData->userFeed->first()->options[$question->id] == $option->id)
                                           checked="true"
                                           @endif
                                           @endif name="options[{{ $question->id }}]" value="{{ $option->id }}"
                                           class="md-radiobtn">
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row submitButtonDiv">
            <div class="col-sm-6">
                <div class="starringDiv">
                    @if(isAdmin())
                        {{ _mt($moduleId,'Feedback.Rating') }} : &nbsp;&nbsp;
                    @else
                        {{ _mt($moduleId,'Feedback.Please_give_an_overAll_rating') }} &nbsp;&nbsp;
                    @endif
                    <select id="combostar" name="rating" autocomplete="off" style="display: none;">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <button type="button" class="btn green ladda-button submitForm" data-style="contract"
                        style="float: right;">{{ _mt($moduleId,'Feedback.Save') }}
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script>
        "use strict";
        $(function () {
            @php
                $rating = 3;
                if(isset($feedbackData->userFeed->first()->rating))
                {
                     $rating = $feedbackData->userFeed->first()->rating;
                }
            @endphp
            $('#combostar').barrating({
                theme: 'css-stars',
                showSelectedRating: false,
                hoverState: true,
                initialRating: {{ $rating }}
            });

            $('.submitForm').click(function () {
                var formData = $('#feedbackForm').serialize();
                $.post('{{ scopeRoute('feedback.userFeedback.save') }}', formData, function (response) {
                    toastr.success('feedback Saved Successfully');
                    Ladda.stopAll();
                });
            });
        })
    </script>
    <style>
        .row.FeedbackWrapper {
            margin: auto;
            overflow: hidden;
            background: white;
            border: solid 1px #ddd;
        }

        .page-content {
            background: #f1f1f1;
        }

        .feedbackTitle {
            text-align: center;
            color: #666;
            font-weight: bold;
        }

        .dateRow {
            text-align: right;
            font-weight: bold;
        }

        .descriptionDiv {
            text-align: left;
        }

        .formTableDiv {
            margin: 0px;
            padding: 0px 15px;
        }

        .alignCenter {
            text-align: center;
        }

        .submitButtonDiv {
            margin: 15px -15px;
            padding: 0px 15px;
        }

        .starringDiv {
            text-align: left;
        }
    </style>
@endsection
