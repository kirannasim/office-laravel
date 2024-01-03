<div class="extras">
    <div class="paginationInfo">
        Showing <span>{{ $pagination['from'] }}</span> - <span>{{ $pagination['to'] }}</span> of <span
                class="totalNumbers">{{ $pagination['total'] }}</span> requests
    </div>
    <div class="selectAll">
        <input type="checkbox" class="icheck">Check all
    </div>
</div>
<form class="payoutRequests">
    @forelse($requests->chunk(3) as $chunk)
        <div class="row">
            @foreach($chunk as $user)
                <div class="col-md-4 outerWrapper">
                    <div class="userContainer">
                        <img src="{{ getProfilePic(null, $user->user_id) }}">
                        <div class="meta">
                            <h3>{{ idToUsername($user->user_id)  }}</h3>
                            <span class="balance">{{ currency($user->request_amount) }}</span>
                            <span class="tools">
                            <i class="fa fa-info profileView"
                               data-url="{{ scopeRoute('payout.basicProfile', ['user' => $user->user_id]) }}"></i>
                            <input type="checkbox" class="icheck" value="{{ $user->user_id }}">
                                 <input type="hidden" name='wallet' value="{{ $user->wallet }}">
                        </span>
                        </div>
                        <div class="amount">
                            <input type="number" placeholder="amount" readonly value="{{ $user->request_amount }}"
                                   name="payout[{{ $user->id }}]">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @empty
        <div class="noUsers">No users</div>
    @endforelse
    <div class="paginationHolder">{{ $requests->links() }}</div>
</form>

<script>
    //"use strict";
    $(function () {
        $('.paginationHolder li a').click(function (e) {
            e.preventDefault();
            getPayoutRequests($(this).attr('href'));
        });
        //webui popver init
        $('.userContainer span.tools i').each(function () {
            $(this).webuiPopover({
                type: 'async',
                trigger: 'click',
                padding: false,
                width: 250
            });
        });
        //iCheck
        $('.icheck').iCheck({
            checkboxClass: 'icheckbox_minimal',
            radioClass: 'iradio_minimal'
        });
        //Select payout
        $('.userContainer .tools input[type="checkbox"]').on('ifToggled', function (event) {
            $(this).closest('.userContainer').toggleClass('selected');
        });
        //Select payout
        $('.selectAll input[type="checkbox"]').on('ifClicked', function () {
            if ($(this).prop('checked'))
                $('.allUsers input[type="checkbox"]').iCheck('uncheck');
            else
                $('.allUsers input[type="checkbox"]').iCheck('check');
        });
    });
</script>
