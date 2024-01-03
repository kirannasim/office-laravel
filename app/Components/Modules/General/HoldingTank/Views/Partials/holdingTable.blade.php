@if($totalHoldingUsers->count())
    <div class="holdingTable table-responsive">
        <div class="table">
            <table class="table">
                <thead>
                <tr>
                    <th>{{ _mt($moduleId,'HoldingTank.join_date') }}</th>
                    <th>{{ _mt($moduleId,'HoldingTank.username') }}</th>
                    <th>{{ _mt($moduleId,'HoldingTank.fullname') }}</th>
                    <th>{{ _mt($moduleId,'HoldingTank.email') }}</th>
                    <th>Timer</th>
                    <th></th>
                    <th>{{ _mt($moduleId,'HoldingTank.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($totalHoldingUsers as $user)
                    <tr>

                        <td>{{ date('Y-m-d',strtotime($user->created_at)) }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->metaData?$user->metaData->firstname:'' }} {{ $user->metaData?$user->metaData->lastname:'' }}</td>
                        <td>{{ $user->email }}</td>
                        <td><p class="timer"
                               data-todate="{{ $user->created_at->addHours($holdingTime)->format('M d, Y h:i:s') }}"></p>
                        </td>
                        @if($user->is_confirmed)
                            <td colspan="2"> Confirmed already waiting for parent placing</td>
                        @else
                            <td>
                                <select class="form-control select" name="position{{ $user->id }}"
                                        id="position{{ $user->id }}">
                                    <option value="1">{{ _mt($moduleId,'HoldingTank.left') }}</option>
                                    <option value="2">{{ _mt($moduleId,'HoldingTank.right') }}</option>
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-green blue placeUser ladda-button"
                                        data-id="{{ $user->id }}">{{ _mt($moduleId,'HoldingTank.place') }}</button>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@else
    <div>{{ _mt($moduleId,'HoldingTank.no_holding_users') }}</div>
@endif

<script type="text/javascript">
    $(function () {
        Ladda.bind('.ladda-button');
        //Select2
        $('.select').select2({
            width: '100%'
        });

        $('.placeUser').click(function () {
            var id = $(this).attr('data-id');
            var position = $('#position' + id).val();
            simulateLoading('.holdingTable');
            $.post('{{ scopeRoute('holdingTank.placeUser') }}', {userId: id, position: position}, function (response) {
                Ladda.stopAll();
                toastr.success("{{ _mt($moduleId,'HoldingTank.successfully_placed') }}");
                loadHoldingTable();
            });
        });

        $('.holdingTable .timer').each(function () {
            let endDate = new Date($(this).data('todate')).getTime();
            let element = $(this);
            // Update the count down every 1 second

            var x = setInterval(function () {
                var startDate = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = endDate - startDate;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Output the result in an element with id="demo"
                //element.html(days + "Day " + hours + "Hour " + minutes + "Minute " + seconds + "s ");
                element.html(days + "Day " + hours + "h " + minutes + "m " + seconds + "s ");
                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(x);
                    $(this).html('<span class=-"expired">{{ _mt($moduleId,'HoldingTank.expired') }}</span>');
                }
            }, 1000);
        });
        @if(getScope() == 'admin')
            $('.filters').show();
        @endif
    });
</script>