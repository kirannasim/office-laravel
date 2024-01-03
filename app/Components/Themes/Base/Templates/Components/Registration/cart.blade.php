<div class="fixed registration cart">
    <div class="bubble pulse-button animated hidden">
        {{--<span></span>--}}
        {{ $cartTotal }}
    </div>
    <div class="summary"></div>
</div>
<script>
    "use strict";

    $(function () {
        refreshSummary('.registration.cart .summary').done(function () {
            $('.fixed.cart .bubble').removeClass('hidden');
        });
    });

    $('body').on('click', '.fixed.cart .bubble', function () {
        if ($(this).hasClass('open')) {
            $(this).removeClass('open');
            $('.fixed.cart').removeClass('open');
        } else {
            $(this).addClass('open');
            $('.fixed.cart').addClass('open');
        }
    });
</script>
