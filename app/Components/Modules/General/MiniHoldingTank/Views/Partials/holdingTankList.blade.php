@if($holdingUserData->count())
    <table class="table table-striped table-bordered table-hover dataTable dtr-inline" role="grid"
           aria-describedby="sample_1_info">
        <thead>
        <tr>
            <th> {{ _mt($moduleId, 'MiniHoldingTank.sl_no') }}</th>
            <th> {{ _mt($moduleId, 'MiniHoldingTank.user') }}</th>
            <th> {{ _mt($moduleId, 'MiniHoldingTank.data') }}</th>
            <th> {{ _mt($moduleId, 'MiniHoldingTank.date') }}</th>
            <th> {{ _mt($moduleId, 'MiniHoldingTank.position') }}</th>
            <th> {{ _mt($moduleId, 'MiniHoldingTank.action') }}</th>

        </tr>
        </thead>
        <tbody>
        @foreach($holdingUserData as $key => $holdingTank)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ idToUsername($holdingTank->sponsor_id) }}</td>
                <td>
                    {{ _mt($moduleId, 'MiniHoldingTank.username') }}
                    : {{ $holdingTank->data['orderData']['username'] }} </br>
                    {{ _mt($moduleId, 'MiniHoldingTank.email') }} : {{ $holdingTank->data['orderData']['email'] }} </br>
                    {{ _mt($moduleId, 'MiniHoldingTank.firstname') }}
                    : {{ $holdingTank->data['orderData']['firstname'] }} </br>
                    {{ _mt($moduleId, 'MiniHoldingTank.lastname') }}
                    : {{ $holdingTank->data['orderData']['lastname'] }} </br>
                </td>
                <td>
                    {{ date('Y-m-d',strtotime($holdingTank->created_at)) }}
                </td>
                <td>
                    <select class="form-control" name="position{{ $holdingTank->id }}"
                            id="position{{ $holdingTank->id }}">
                        <option value="">Select</option>
                        <option value="L">{{ _mt($moduleId, 'MiniHoldingTank.left') }}</option>
                        <option value="R">{{ _mt($moduleId, 'MiniHoldingTank.right') }}</option>
                    </select>
                </td>
                <td>
                    <button class="btn green btn-outline registerUser ladda-button" data-style="contract"
                            data-id="{{ $holdingTank->id }}">{{ _mt($moduleId, 'MiniHoldingTank.register') }}</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="paginationWrapper">
        {!! $holdingUserData->links() !!}
    </div>
@else
    <div class="noData">
        <i class="fa fa-exclamation"></i>
        {{ _mt($moduleId, 'MiniHoldingTank.No_data') }}
    </div>
@endif


<script>
    $(function () {
        Ladda.bind('.ladda-button');

        $('.registerUser').click(function () {

            var id = $(this).attr('data-id');
            var position = $('#position' + id).val();

            if (position != 'L' && position != 'R') {
                Ladda.stopAll();
                toastr.error('Please Select a Position');
                return;
            }


            $.post("{{ scopeRoute('miniHoldingTank.add') }}", {id: id, position: position}, function (response) {
                Ladda.stopAll();
                toastr.success('User Added Successfully');
                fetchHoldingUsers();
            }).fail(function () {
                Ladda.stopAll();
                toastr.error('cant Add User');
            });
        });
    });
</script>
