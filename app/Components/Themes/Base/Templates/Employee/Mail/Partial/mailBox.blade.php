<div class="innerWrapper">
    <div class="col-md-2 mailNavWrapper">
        <div class="mailNavHeader">
            <div class="email">{{ $email[0] }}<span>{{ '@'.$email[1] }}</span></div>
        </div>
        <div class="composeMail">
            <i class="fa fa-edit"></i>{{ _t('mail.Compose') }}
        </div>
        <div class="mailNav">
            <div class="eachMailNav active" data-target="inbox">
                <i class="fa fa-inbox"></i>
                <p>{{ _t('mail.Inbox') }}</p>
                <span class="notify">{{ $inbox->count() }}</span>
            </div>
            <div class="eachMailNav" data-target="sentMails">
                <i class="fa fa-paper-plane"></i>
                <p>{{ _t('mail.Sent_mails') }}</p>
                <span class="notify">{{ $sentMails->count() }}</span>
            </div>
            <div class="eachMailNav" data-target="drafts">
                <i class="fa fa-folder-open"></i>
                <p>{{ _t('mail.Drafts') }}</p>
                <span class="notify">{{ $drafts->count() }}</span>
            </div>
            <div class="eachMailNav" data-target="starred">
                <i class="fa fa-star"></i>
                <p>{{ _t('mail.Starred') }}</p>
                <span class="notify">{{ $starredMails->count() }}</span>
            </div>
            <div class="eachMailNav" data-target="trash">
                <i class="fa fa-trash"></i>
                <p>{{ _t('mail.Trash') }}</p>
                <span class="notify">{{ $trashedMails->count() }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-10 composeMailWrapper">
        <form class="composeNew">
            <div class="composeHeader">
                <h3>{{ _t('mail.Compose_mail') }}</h3>
                <div class="fromEmailField">
                    <div class="toIco">{{ _t('mail.To') }}</div>
                    <div class="recipientHolder"></div>
                    <input type="text" class="recipientSelect" placeholder="{{ _t('mail.Recipients') }}">
                </div>
                <div class="subject">
                    <input type="text" name="subject" placeholder="{{ _t('mail.Subject') }}">
                </div>
            </div>
            <div class="composeBody">
                <textarea name="content"></textarea>
            </div>
            <div class="attachmentBox">
                <div class="dropzone image" id="dropzoneImage"></div>
                <div class="dropzone file" id="dropzoneFile"></div>
            </div>
            <div class="mailErrors"></div>
            <div class="composeTools">
                <button type="button" class="btn green ladda-button sendMail" data-style="contract">
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
            <input type="hidden" name="action" value="compose">
            <input type="hidden" name="mailId" value="">
        </form>
    </div>
    <div class="col-md-10 mailListWrapper">
        <div class="mailTools">
            <div class="col-md-6 toolWrap">
                <div class="martkAll">
                    <input type="checkbox" class="mailCheckBox" value="">
                </div>
                <div class="refresh">
                    <i class="fa fa-refresh"></i>
                </div>
                <div class="trash">
                    <i class="fa fa-trash"></i>
                </div>
                <div class="starred">
                    <i class="fa fa-star"></i>
                </div>
            </div>
        </div>
        <div class="mailList useNav inbox active" id="inbox" style="display:block;">
            @forelse($inbox as $key => $mail)
                <div class="eachMail @if($mail->pivot->is_read) read @endif" data-id="{{ $mail->id }}"
                     data-route="{{ route('employee.mail.mailreader', ['mail' => $mail->id]) }}">
                    <div class="mailListHeader">
                        <input class="selectMail mailCheckBox" value="" type="checkbox">
                        @if($mail->replies->count())
                            <div class="senders">
                                @foreach($mail->repliedUsers() as $user)
                                    <span class="senderName">{{ $user->id == loggedId()?'Me':$user->username }}</span>@if(!$loop->last)
                                        , @endif
                                @endforeach
                                <span class="replyCount">({{ $mail->replies->count() + 1 }})</span>
                            </div>
                        @else
                            <div class="sendBy">{{ $mail->mailOwner()->username }}</div>
                        @endif
                    </div>
                    <div class="mailListBody">
						<span class="star @if($mail->pivot->starred) starred @endif">
							<i class="fa fa-star"></i>
						</span>
                        <span class="subject">@if($mail->replies->count() && ($mail->mailOwner()->id == loggedId()))
                                {{ _t('mail.Re') }}: @endif {{ $mail->subject }}</span>
                    </div>
                </div>
            @empty
                <div class="noMails">{{ _t('mail.Your_inbox_is_empty') }}</div>
            @endforelse
        </div>
        <div class="mailList useNav sentMails" id="sentMails">
            @forelse($sentMails as $key => $mail)
                <div class="eachMail @if($mail->pivot->is_read) read @endif" data-id="{{ $mail->id }}"
                     data-route="{{ route('employee.mail.mailreader', ['mail' => $mail->id]) }}">
                    <div class="mailListHeader">
                        <input class="selectMail mailCheckBox" value="" type="checkbox">
                        <div class="sendTo">
                            To:
                            @foreach($mail->recipients as $recipient)
                                @if(!$loop->first),@endif
                                <span>{{ ($recipient->id == loggedId())?'Me':$recipient->username }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="mailListBody">
						<span class="star @if($mail->pivot->starred) starred @endif">
							<i class="fa fa-star"></i>
						</span>
                        <span class="subject">{{ $mail->subject }}</span>
                    </div>
                </div>
            @empty
                <div class="noMails">{{ _t('mail.There_are_no_sent_mails') }}</div>
            @endforelse
        </div>
        <div class="mailList useNav drafts" id="drafts">
            @forelse($drafts as $key => $mail)
                <div class="eachMail @if($mail->pivot->is_read) read @endif" data-id="{{ $mail->id }}"
                     data-route="{{ route('employee.mail.mailreader', ['mail' => $mail->id]) }}">
                    <div class="mailListHeader">
                        <span class="draft">Draft</span>
                    </div>
                    <div class="mailListBody">
						<span class="star @if($mail->starred) starred @endif">
							<i class="fa fa-star"></i>
						</span>
                        <span class="subject">{{ $mail->subject?$mail->subject: _t('mail.No_subject') }}</span>
                    </div>
                </div>
            @empty
                <div class="noMails">{{ _t('mail.There_are_no_sent_mails') }}</div>
            @endforelse
        </div>
        <div class="mailList useNav starred" id="starred">
            @forelse($starredMails as $key => $mail)
                <div class="eachMail @if($mail->pivot->is_read) read @endif" data-id="{{ $mail->id }}"
                     data-route="{{ route('employee.mail.mailreader', ['mail' => $mail->id]) }}">
                    <div class="mailListHeader">
                        <input class="selectMail mailCheckBox" value="" type="checkbox">
                        <span class="mailIn">
							@php
                                switch($mail->status){
                                    case 1:
                                    echo 'draft';
                                    break;

                                    case 2:
                                    echo 'inbox';
                                    break;

                                    case 3:
                                    echo 'sent';
                                    break;

                                    case 4:
                                    echo 'fwd';
                                    break;
                                }
                            @endphp
						</span>
                        @if($mail->replies->count())
                            <div class="senders">
                                @foreach($mail->repliedUsers() as $user)
                                    <span class="senderName">{{ $user->id == loggedId()?'Me':$user->username }}</span>@if(!$loop->last)
                                        , @endif
                                @endforeach
                                <span class="replyCount">({{ $mail->replies->count() + 1 }})</span>
                            </div>
                        @else
                            <div class="sendBy">{{ $mail->mailOwner()->username }}</div>
                        @endif
                    </div>
                    <div class="mailListBody">
						<span class="star @if($mail->pivot->starred) starred @endif">
							<i class="fa fa-star"></i>
						</span>
                        <span class="subject">@if($mail->replies->count()) Re: @endif {{ $mail->subject }}</span>
                    </div>
                </div>
            @empty
                <div class="noMails">Your inbox is empty</div>
            @endforelse
        </div>
        <div class="mailList useNav trash" id="trash">
            @forelse($trashedMails as $key => $mail)
                <div class="eachMail @if($mail->pivot->is_read) read @endif" data-id="{{ $mail->id }}"
                     data-route="{{ route('employee.mail.mailreader', ['mail' => $mail->id]) }}">
                    <div class="mailListHeader">
                        <input class="selectMail mailCheckBox" value="" type="checkbox">
                        <span class="mailIn">inbox</span>
                        @if($mail->replies->count())
                            <div class="senders">
                                Me,
                                @foreach($mail->replies as $reply)
                                    <span class="senderName">{{ $reply->mailOwner()->username }}</span>@if(!$loop->last)
                                        , @endif
                                @endforeach
                                <span class="replyCount">({{ $mail->replies->count() }})</span>
                            </div>
                        @else
                            <div class="sendBy">{{ $mail->mailOwner()->username }}</div>
                        @endif
                    </div>
                    <div class="mailListBody">
						<span class="star @if($mail->pivot->starred) starred @endif">
							<i class="fa fa-star"></i>
						</span>
                        <span class="subject">@if($mail->replies->count()) Re: @endif {{ $mail->subject }}</span>
                    </div>
                </div>
            @empty
                <div class="noMails">{{ _t('mail.Trash_is_clean') }}</div>
            @endforelse
        </div>
    </div>
    <div class="col-md-7 mailReadWrapper"></div>
</div>

<script type="text/javascript">
    "use strict";

    //iCheck
    function icheckInit() {
        $('.mailCheckBox').iCheck({
            checkboxClass: 'icheckbox_flat',
            radioClass: 'iradio_flat'
        });
    }

    //Document ready actions
    $(function () {
        setupAjaxFill('.composeNew input.recipientSelect');

        //Slim scroll
        $('.mailList.inbox').slimScroll({
            height: $('.mailNavWrapper').outerHeight() - $('.mailTools').outerHeight(),
            width: '100%'
        });

        //Summer-note
        $('.composeBody textarea').summernote({
            placeholder: 'Write here...',
            height: 150
        });

        icheckInit();

        //Ladda
        Ladda.bind('.ladda-button');

        //Refresh inbox in defined interval
        setInterval(function () {
            var checkedMails = [];
            $('.useNav.active .eachMail .mailCheckBox').each(function () {
                if ($(this).prop("checked")) checkedMails.push($(this).closest('.eachMail').attr('data-id'));
            });
            var readingMail = $('.useNav.active .eachMail.reading').attr('data-id');
            refreshSet(['.useNav#' + $('.useNav.active').attr('id'), '.mailNav'], false).done(function () {
                icheckInit();
                setNavActive();
                setMailChecked(checkedMails);
                setMailReading(readingMail);
            });
        }, 7000);

        //Attachments
        $('span.attachImage').click(function () {
            $('.attachmentBox .dropzone.image').addClass('active').siblings().removeClass('active')
                .parent().slideDown().promise().done(function () {
                equalizeHeight(['.composeMailWrapper', '.mailNavWrapper']);
            });
        });

        $('span.attachFile').click(function () {
            $('.attachmentBox .dropzone.file').addClass('active').siblings().removeClass('active')
                .parent().slideDown().promise().done(function () {
                equalizeHeight(['.composeMailWrapper', '.mailNavWrapper']);
            });
        });

        //Dropzone
        $('.dropzone.image').dropzone({
            url: '{{ route('employee.mail.attachment') }}',
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            headers: {'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content')},
            maxFilesize: 10,
            paramName: 'attachment',
            acceptedFiles: 'image/*',
            dictDefaultMessage: 'Add/Drop images',
            params: {
                type: 'image'
            },
            init: function () {
                this.on('success', function (file, response) {
                    var html = '<div class="wrap">' +
                        '<img src="' + assetUrl + '">' +
                        '<i class="fa fa-close"></i>'
                    '</div>'
                    $('.attachments').find('.image').append('');
                });
            }
        });

        $('.dropzone.file').dropzone({
            url: '{{ route('employee.mail.attachment') }}',
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            headers: {'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content')},
            maxFilesize: 10,
            dictDefaultMessage: 'Add/Drop files',
            paramName: 'attachment',
            acceptedFiles: 'application/pdf,.psd,.doc,.docx',
            params: {
                type: 'file'
            }
        });
    });

    //set nav active as per active mail box
    function setNavActive() {
        $('.eachMailNav[data-target="' + $('.useNav.active').attr('id') + '"')
            .addClass('active').siblings().removeClass('active');
    }

    //set nav active as per active mail box
    function setMailChecked(mails) {
        mails.forEach(function (value) {
            $('.useNav.active .eachMail[data-id="' + value + '"] .mailCheckBox').iCheck('check');
        });
    }

    //set mail read
    function setMailReading(id) {
        $('.useNav.active .eachMail[data-id="' + id + '"]').addClass('reading');
    }

    //Remove one recipient
    $('body').on('click', '.eachRecipient .close', function () {
        $(this).closest('.eachRecipient').remove();
        if (!$('.eachRecipient').length) $('.recipientHolder').hide();
    });

    //Adjust composer textarea height
    function adjustComposerArea() {
        $('.composeNew .note-editable.panel-body').slimScroll({destroy: true});
        $('.composeNew .note-editable.panel-body').slimScroll({}).promise().done(function () {
            equalizeHeight(['.composeMailWrapper', '.mailNavWrapper']);
        });
    }

    //Display compose mail
    $('body').on('click', '.composeMail', function () {
        $('.mailListWrapper, .mailReadWrapper').fadeOut().siblings('.composeMailWrapper').slideDown().promise().done(function () {
            adjustComposerArea();
        });
    });

    //reset inbox
    function resetInbox() {
        $('.mailListWrapper').addClass('col-md-10').removeClass('.col-md-3').slideDown();
        $('.mailReadWrapper,.composeMailWrapper').slideUp();
    }

    //send mail
    function handleMail(action) {
        $('form.composeNew input[name="action"]').val(action);
        $('.mailErrors').empty().slideUp();
        adjustComposerArea();
        var datas = $('form.composeNew').serialize();
        var post = $.post(mailHandle, datas, function (response) {
            Ladda.stopAll();

            switch (action) {

                case 'compose':
                    if (response.status == true) $('form.composeNew input[name="mailId"]').val(response.mail.id);
                    break;

                case 'send':
                    if (response.status == true) {
                        clearComposer();
                        resetInbox();
                        toastr.success('Sent mail sucessfully');
                        refreshSet('.useNav.inbox').done(function () {
                            icheckInit();
                        });
                    }
            }
        });

        post.fail(function (response) {
            Ladda.stopAll();
            $('.mailErrors').empty().slideDown();
            var errors = response.responseJSON;
            for (key in errors) {
                $('.mailErrors').append('<div class="eachMailError">' + errors[key] + '</div>').promise().done(function () {
                    adjustComposerArea();
                });
            }
        });
    }

    //send mail in action
    $('body').on('click', '.sendMail', function () {
        handleMail('send');
    });

    //Save mail
    var timer = null;

    $('body').on('keyup', '.composeBody textarea', function () {
        clearTimeout(timer);
        timer = setTimeout(function () {
            $('form.composeNew input[name="mailId"]').val() ? handleMail('draft') : handleMail('compose');
        }, 500);
    });

    //Clear mail form
    function clearComposer() {
        $('.composeNew')[0].reset();
        $('.composeNew .eachRecipient').remove();
        $('.mailErrors').slideUp().empty();
    }

    //Refresh mailbox
    function refreshMailReader(route) {
        simulateLoading($('.emailWrapper .mailReadWrapper'));

        return $.post(route, function (response) {
            $('.emailWrapper .mailReadWrapper').html(response);
        });
    }

    //Refresh mail set
    function refreshSet(elem, loading) {
        if (loading) simulateLoading($(elem));
        return refreshPart(elem, "{{ route('employee.mail.mailbox') }}");
    }

    //Read receipt
    function sentReadReciept(id) {
        var options = {action: 'updateStatus', is_read: 1, mail_id: id};
        var post = $.post(mailHandle, options, function (response) {

        });
    }

    //Add star
    function updateStar(id, star) {
        var options = {action: 'updateStatus', info: 'starred', starred: star, mail_id: Number(id)};
        var post = $.post(mailHandle, options, function (response) {
            $('.eachMailNav[data-target="starred"] .notify').text(response.info);
            refreshPart(['.mailList.starred']).done(function () {
                icheckInit();
            });
        });
    }

    //Star mail in action
    $('body').on('click', '.eachMail .star', function (e) {
        e.stopPropagation();

        if ($(this).hasClass('starred')) {
            updateStar($(this).closest('.eachMail').attr('data-id'), '0');
            $(this).removeClass('starred');
        } else {
            updateStar($(this).closest('.eachMail').attr('data-id'), 1);
            $(this).addClass('starred');
        }

        refreshSet('.useNav.starred').done(function () {
            icheckInit();
        });
    });

    //Open mail
    $('body').on('click', '.eachMail', function () {
        var me = $(this);

        if (!$(this).hasClass('read')) {
            me.addClass('read');
            sentReadReciept(me.attr('data-id'));
        }

        $('.mailListWrapper').addClass('col-md-3').removeClass('col-md-10')
            .siblings('.composeMailWrapper').fadeOut();

        refreshMailReader(me.attr('data-route')).done(function () {
            $('.emailWrapper .innerWrapper > div').css('min-height', '');
            $('.innerReader').slimScroll({destroy: true}).css('height', '');
            me.addClass('reading').siblings().removeClass('reading').promise().done(function () {
                equalizeHeight(['.mailReadWrapper', '.mailNavWrapper', '.mailListWrapper']);
                //$('.innerReader').slimScroll({destroy:true});
                $('.innerReader').slimScroll({
                    height: $('.mailNavWrapper').outerHeight() - $('.mailTools').outerHeight(),
                    width: '100%'
                });
            });
        });

        setTimeout(function () {
            $('.mailReadWrapper').fadeIn();
        }, 700);
    });

    //Mail navigation
    $('body').on('click', '.eachMailNav', function () {
        $('.composeMailWrapper').slideUp().siblings('.mailListWrapper').slideDown();
        $('.mailListWrapper').hasClass('col-md-3') ? $('.mailReadWrapper').slideDown() : $('.mailReadWrapper').slideUp();
        $(this).addClass('active').siblings().removeClass('active');
        var target = $('.useNav.' + $(this).attr('data-target'));
        $('.useNav').not(target).hide().removeClass('active').slimScroll({destroy: true});
        target.fadeIn().addClass('active').slimScroll({
            height: $('.mailNavWrapper').outerHeight() - $('.mailTools').outerHeight(),
            width: '100%'
        });
    });

    //Mark all
    $('body').on('ifUnchecked', '.martkAll input', function (event) {
        $('.useNav.active input.mailCheckBox').iCheck('uncheck');
    });

    //Uncheck all
    $('body').on('ifChecked', '.martkAll input', function (event) {
        $('.useNav.active input.mailCheckBox').iCheck('check');
    });

    //Refresh leaf
    $('body').on('click', '.mailTools .refresh', function () {
        var me = $(this);
        me.addClass('fa-spin');

        refreshSet('.useNav#' + $('.useNav.active').attr('id'), true).done(function () {
            me.removeClass('fa-spin');
            icheckInit();
        });
    });

    //Trash Mail
    function trashMails(ids) {
        var options = {mail_ids: ids, action: 'delete'};
        var post = $.post(mailHandle, options, function (response) {

        });
    }

    $('body').on('click', '.mailTools .trash', function () {
        var me = $(this);
        var ids = [];
        $('.useNav.active .mailCheckBox').each(function () {
            if ($(this).prop("checked")) ids.push($(this).closest('.eachMail').attr('data-id'));
        });
        trashMails(ids);
    });
</script>
