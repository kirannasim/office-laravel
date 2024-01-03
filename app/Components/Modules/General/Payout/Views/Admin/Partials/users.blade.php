<div class="selectAll">
    <input type="checkbox" class="icheck">Check all
</div>
<form class="filterForm">
    @forelse($users->chunk(3) as $chunk)
        <div class="row">
            @foreach($chunk as $user)
                <div class="col-md-4 outerWrapper">
                    <div class="userContainer">
                        <img src="{{ getProfilePic($user) }}">
                        <div class="meta">
                            <h3>{{ $user->username }}</h3>
                            @foreach($user->wallet as $each)
                                <span class="balance">{{ currency($each['balance']) }}</span>
                            @endforeach
                            <span class="tools">
                            <i class="fa fa-info profileView"
                               data-url="{{ scopeRoute('payout.basicProfile', ['user' => $user->id]) }}"></i>
                            <input type="checkbox" class="icheck" value="{{ $user->id }}">
                        </span>
                        </div>
                        <div class="amount">
                            <input type="number" placeholder="amount" name="payout[{{ $user->id }}]">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @empty
        <div class="noUsers">{{ _mt($moduleId,'Payout.no_users') }}</div>
    @endforelse
</form>

<script>
    "use strict";
    $(function () {
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
            radioClass: 'iradio_flat'
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
