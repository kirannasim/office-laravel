@foreach($styles as $style)
    {!! $style !!}
@endforeach

<div class="freeJoinWrap">
    <div class="formWrapper">
        <div class="error"></div>
        <div class="freejoinBox col-sm-10 col-sm-offset-1">
            <div class="col-sm-3 freejoinIcon">
                <img src="{{asset('images/free-join.png')}}" class="img-responsive">
            </div>
            <div class="col-sm-9">
                <div class="freejoinInstruction">
                    <i class="fa fa-exclamation"></i>
                    <div class="freejoinDescription">
                        {{_mt($id,'Freejoin.click_here_ro_proceed_free_join')}}
                    </div>
                    <button class="btn green ladda-button registerMeFreeJoin" type="button" data-style="contract">
                        <span class="ladda-label">{{_mt($id,	'Freejoin.proceed')}}</span>
                        <span class="ladda-spinner"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="success">
        <h2><i class="fa fa-check"></i>Payment success</h2>
        <div class="description">
            You have done payment successfully.
        </div>
    </div>
</div>

<input type="hidden" name="moduleId" value="{{ $id }}">

<script type="text/javascript">
    "use strict";
    Ladda.bind('.ladda-button');
    //Send registration

    $(document).on('click','.proceed',function(){
        
    })
    
    $('.registerMeFreeJoin').click('.registerMeFreeJoin', function () {

        var options = {
            actionUrl: '{{ scopeRoute("payment.handler") }}',
            successCallBack: function (response) {
                Ladda.stopAll();
                if (window.hasOwnProperty('paymentSuccessCallback')) {
                    window.paymentSuccessCallback(response, 'freejoin');
                } else {
                    $('.freeJoinWrap .formWrapper').slideUp()
                        .siblings('.success').slideDown().promise().done(function () {
                        $('.freeJoinWrap .formWrapper').addClass('done');
                    });
                }
            },
            failCallBack: function (response) {
                Ladda.stopAll();
                switch (response.status) {
                    case 422:
                        var error = response.responseJSON;
                        var errElem = $('.freeJoinWrap').find('.error');
                        if (errElem.length) {
                            errElem.text(error.message).slideDown();
                        } else {
                            errElem = '<div class="error">' + error.message + '</div>';
                            $('.freeJoinWrap').append(errElem);
                        }
                        break;
                    default:
                        break;
                }
            }
        };
        sendForm(options);
    });


</script>
