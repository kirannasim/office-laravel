<div class="row">
    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption caption-md">
                <i class="icon-globe theme-font hide"></i>
                <span class="caption-subject bold uppercase">{{ _mt($moduleId,'Feedback.User_Feedback') }}</span>
            </div>
        </div>
        <div class="portlet-body">
            @if($userFeedbacks->count())
                <div class="table-scrollable">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th> {{ _mt($moduleId,'Feedback.No') }}</th>
                            <th> {{ _mt($moduleId,'Feedback.Username') }}</th>
                            <th> {{ _mt($moduleId,'Feedback.Form_Title') }}</th>
                            <th> {{ _mt($moduleId,'Feedback.Rating') }}</th>
                            <th> {{ _mt($moduleId,'Feedback.Date') }}</th>
                            <th> {{ _mt($moduleId,'Feedback.View') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($userFeedbacks as $feedback)
                            <tr>
                                <td>{{ ($userFeedbacks->currentPage() * $userFeedbacks->perPage()) - $userFeedbacks->perPage() + $loop->iteration }}</td>
                                <td> {{ idToUsername($feedback->user_id) }}</td>
                                <td> {{ $feedback->feedBckForm->name }}</td>
                                <td>
                                    @for ($i = 0; $i < 5; $i++)
                                        @if($i < $feedback->rating) &#9733; @else &#9734; @endif
                                    @endfor
                                </td>
                                <td> {{ date('Y-m-d',strtotime($feedback->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('feedback.userForm',['id' =>$feedback->form_id ,'user_id'=>$feedback->user_id  ]) }}"
                                       target="_blank">
                                        <button type="button" class="btn gray" style="float: left;"><i
                                                    class="fa fa-eye"></i></button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="paginationWrapper">
                    {{ $userFeedbacks->links() }}
                </div>
            @else
                {{ _mt($moduleId,'Feedback.no_feedback') }}
            @endif
        </div>
    </div>
</div>
<script>
    'use strict';

    $('.paginationWrapper .pagination li a').click(function (e) {
        e.preventDefault();
        var route = $(this).attr('href');
        loadFeedbackDocsTable(route);
    });
</script>