@if($userData->count())
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTable dtr-inline reporttable" role="grid"
               aria-describedby="sample_1_info" style="width: 1028px;">
            <thead>
            <tr>
                <th> {{ _mt($moduleId, 'EmailBroadCasting.select') }}</th>
                <th> {{ _mt($moduleId, 'EmailBroadCasting.sl_no') }}</th>
                <th> {{ _mt($moduleId, 'EmailBroadCasting.username') }}</th>
                <th> {{ _mt($moduleId, 'EmailBroadCasting.firstname') }}</th>
                <th> {{ _mt($moduleId, 'EmailBroadCasting.lastname') }}</th>
                <th> {{ _mt($moduleId, 'EmailBroadCasting.sponsor') }}</th>
                <th> {{ _mt($moduleId, 'EmailBroadCasting.email') }}</th>
                <th> {{ _mt($moduleId, 'EmailBroadCasting.joining_date') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($userData as $user)
                <tr>
                    <td align="center">
                        <input type="checkbox" class="selectUser" name="userCheck{{$user->id}}"
                               value="{{$user->id}}"></td>
                    <td>{{ ($userData->currentPage() * $userData->perPage()) - $userData->perPage() + $loop->iteration }}</td>
                    <td> {{ $user->username }} </td>
                    <td> {{ $user->metaData->firstname }} </td>
                    <td> {{ $user->metaData->lastname }} </td>
                    <td> {{ $user->repoData ? usernameFromId($user->repoData->sponsor_id) : ''}} </td>
                    <td> {{ $user->email }} </td>
                    <td> {{ date('Y-m-d',strtotime($user->created_at)) }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="paginationWrapper">
        {!! $userData->links() !!}
    </div>
@else
    <th> {{ _mt($moduleId, 'EmailBroadCasting.no_user') }}</th>
@endif
<script type="text/javascript">
    $(function () {
        $('.selectUser').prettySwitch({
            checkedCallback: (element) => {
                addUserToQueue($(element).val());
            },
            unCheckedCallback: (element) => {
                deleteUserFromQueue($(element).val());
            }
        });
        $('.paginationWrapper .pagination li a').click(function (e) {
            e.preventDefault();
            let route = $(this).attr('href');
            fetchUserTable(route);
        });
    });
</script>