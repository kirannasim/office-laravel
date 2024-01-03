<div class="mailReader">
    <div class="readerHeader">
        <div class="mailSearch">
            <input type="text" placeholder="{{ _t('mail.Search_for_messages') }}">
        </div>
    </div>
    <div class="innerReader">
        <div class="mailLetter main @if(!$mail->replies->count()) noReplies @else minimized @endif">
            <div class="letterHeader">
                <div class="col-md-6">
                    <div class="fromMail">{{ $mail->mailOwner()->username }}</div>
                </div>
                <div class="col-md-6 metaInfo">
                    <div class="timereached">
                        {{ $mail->created_at->format('H:i:s a') }}
                        <span>({{ $mail->created_at->diffForHumans() }})</span>
                    </div>
                    <div class="star @if($mail->isStarred()) starred @endif">
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                <div class="mailHeading col-md-12">
                    <h2>{{ $mail->subject }}</h2>
                </div>
            </div>
            <div class="letterBody">
                <div class="mailContent">{!! $mail->content !!}</div>
            </div>
        </div>
        @foreach($mail->replies as $reply)
            <div class="mailLetter reply @if($loop->last) last @else minimized @endif">
                <div class="letterHeader">
                    <div class="col-md-6">
                        <div class="fromMail">{{ $reply->mailOwner()->username }}</div>
                    </div>
                    <div class="col-md-6 metaInfo">
                        <div class="timereached">
                            {{ $reply->created_at->format('H:i:s a') }}
                            <span>({{ $reply->created_at->diffForHumans() }})</span>
                        </div>
                        <div class="star @if($mail->isStarred()) starred @endif">
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="mailHeading col-md-12">
                        <h2>{{ $reply->subject }}</h2>
                    </div>
                </div>
                <div class="letterBody">
                    <div class="mailContent">{!! $reply->content !!}</div>
                </div>
            </div>
        @endforeach
        <div class="replyBox">
            <div class="replyTools">
				<span class="reply" data-target="reply">
					<i class="fa fa-reply"></i>{{ _t('mail.Reply') }}
				</span>
                @if($mail->replies->count())
                    <span class="replyAll" data-target="replyall">
						<i class="fa fa-reply"></i>{{ _t('mail.Reply_all') }}
					</span>
                @endif
                <span class="forward" data-target="forward">
					<i class="fa fa-forward"></i>{{ _t('mail.Forward') }}
				</span>
            </div>
            <div class="replyTypes">
				<span class="eachReplyType reply">
					<label class="col-md-2">{{ _t('mail.Reply_to') }}</label>
					<p>{{ $mail->mailOwner()->email }}</p>
					<div class="replyMails">
						<input type="hidden" value="{{ $mail->mailOwner()->id }}" name="recipient[]">
					</div>
				</span>
                <span class="eachReplyType replyall">
					<label class="col-md-2">{{ _t('mail.Reply_all') }} </label>
					<input type="text" placeholder="{{ _t('mail.Select_user') }}">
					<div class="replyMails">
						@foreach($mail->replies as $each)
                            <input type="hidden" value="{{ $each->mailOwner()->id }}" name="recipient[]">
                        @endforeach
					</div>
				</span>
            </div>
            <form class="replyContent">
                <input type="hidden" name="action" value="send">
                <input type="hidden" action="compose">
                <div class="composeHeader">
                    <div class="fromEmailField eachReplyType forward">
                        <div class="toIco">{{ _t('mail.To') }}</div>
                        <div class="recipientHolder"></div>
                        <input type="text" class="recepientSelect" placeholder="Recipients">
                    </div>
                    <div class="subject">
                        <div class="subjectIco">{{ _t('mail.Subject') }}</div>
                        <input type="text" name="subject" placeholder="Subject">
                    </div>
                </div>
                <textarea class="replyTextArea" name="content"></textarea>
                <div class="mailErrors"></div>
                <div class="composeTools">
                    <button type="button" class="btn green ladda-button replyMail" data-style="contract">
                        <i class="fa fa-paper-plane"></i>{{ _t('mail.Send') }}
                    </button>
                    <span class="attachFile">
						<i class="fa fa-link"></i>
					</span>
                    <span class="attachImage">
						<i class="fa fa-photo"></i>
					</span>
                    <span class="discardDraft">
						<i class="fa fa-trash"></i>
					</span>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    "use strict";

    $(function () {
        //Ladda
        Ladda.bind('.ladda-button');

        $('.replyTextArea').summernote({
            placeholder: "{{ _t('mail.Write_here') }}",
            height: 150
        });

        //Show reply options
        $('body')
            .off('click', '.replyTools > span')
            .on('click', '.replyTools > span', function () {
                $(this).addClass('active').siblings().removeClass('active');
                $('.letterBody').addClass('noMinHeight');
                $('.replyContent').slideDown();
                var target = $('.eachReplyType.' + $(this).attr('data-target'));
                $('.eachReplyType').not(target).hide().removeClass('active');
                target.show().addClass('active');
                $('.innerReader').animate({scrollTop: $('.innerReader').outerHeight()});

                switch ($(this).attr('data-target')) {
                    case 'reply':
                        $('form.replyContent .recipientHolder').empty().slideUp();
                        $('form.replyContent input[name="recipient[]"], form.replyContent input[name="reply_to"]').remove();
                        $('form.replyContent').prepend('<input type="hidden" name="recipient[]" value="{{ $mail->mailOwner()->id }}">');
                        $('form.replyContent').prepend('<input type="hidden" name="reply_to" value="{{ $mail->id }}">');
                        break;

                    case 'forward':
                        $('form.replyContent > input[name="recipient[]"], form.replyContent > input[name="reply_to"]').remove();
                        break;
                }
            });

        //Reply mail
        $('body')
            .off('click', '.replyMail')
            .on('click', '.replyMail', function () {
                $('form.replyContent .mailErrors').empty().slideUp();

                var options = $('form.replyContent').serialize();

                $.post(mailHandle, options, function (response) {
                    Ladda.stopAll();
                    toastr.success("{{ _t('mail.Sent_mail_sucessfully') }}");
                    $('.useNav.inbox .eachMail[data-id="{{ $mail->id }}"]').trigger('click');
                }).fail(function (response) {
                    Ladda.stopAll();
                    $('form.replyContent .mailErrors').empty().slideDown();
                    var errors = response.responseJSON;
                    for (key in errors) {
                        $('form.replyContent .mailErrors')
                            .append('<div class="eachMailError">' + errors[key] + '</div>');
                    }
                });
            });

        setupAjaxFill('.replyContent input.recepientSelect');

        //Mail threads toggling
        $('body').off('click', '.letterHeader').on('click', '.letterHeader', function () {
            var target = $(this).closest('.mailLetter');
            if (target.hasClass('minimized')) {
                target.removeClass('minimized');
            } else {
                target.addClass('minimized');
            }
        });
    });

</script>