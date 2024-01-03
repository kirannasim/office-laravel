@inject('menuFactory','App\Blueprint\Services\MenuServices')
<ul class="page-sidebar-menu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true"
    data-slide-speed="200" style="padding-top: 20px">
    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <li class="sidebar-toggler-wrapper hide">
        <div class="sidebar-toggler">
            <span></span>
        </div>
    </li>
    <!-- END SIDEBAR TOGGLER BUTTON -->
    <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
    <li class="sidebar-search-wrapper">
        <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
        <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
        <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
        <form class="sidebar-search" action="page_general_search_3.html" method="POST">
            <a href="javascript:;" class="remove">
                <i class="icon-close"></i>
            </a>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <a href="javascript:;" class="btn submit">
                        <i class="fas fa-search"></i>
                    </a>
                </span>
            </div>
        </form>
        <!-- END RESPONSIVE QUICK SEARCH FORM -->
    </li>
    {!! $menuFactory->renderLeftMenu() !!}
    <div class="container-fluid slideBarClockBox">
        <div class="row">
            <div class="col-12 col-sm-6">
                <canvas id="canvas-clock" width="90" height="90"></canvas>
                <span class="timeText" style="color: white;">LOCAL TIME</span>
            </div>
            <div class="col-12 col-sm-6">
                <canvas id="canvas-clock-server" width="90" height="90"></canvas>
                <span class="timeText" style="color: white;">SERVER TIME</span>
            </div>
        </div>
    </div>
</ul>


<style type="text/css">
    .page-sidebar-menu-closed .slideBarClockBox
    {
        display: none;
    }
</style>

<script type="text/javascript">
    "use strict";

    $(function () {
        var local_time = moment("<?=date('l, d-M-Y H:i:s e',$shareTime['localTimeStamp'])?>");
        var server_time = moment("<?=date('l, d-M-Y H:i:s e',$shareTime['serverTimeStamp'])?>");



        var canvas_clock = document.getElementById("canvas-clock");
        var ctx_clock = canvas_clock.getContext("2d");
        var radius_clock = canvas_clock.height / 2;
            ctx_clock.translate(radius_clock, radius_clock);
            radius_clock = radius_clock * 0.90;

        setInterval( function(){
            local_time = moment(local_time).tz("<?=$shareTime['localTimeZone']?>").add(1,'seconds');
            drawClock(ctx_clock, radius_clock,local_time);
        }, 1000);


        var canvas_clock_server = document.getElementById("canvas-clock-server");
        var ctx_clock_server = canvas_clock_server.getContext("2d");
        var radius_clock_server = canvas_clock_server.height / 2;
        ctx_clock_server.translate(radius_clock_server, radius_clock_server);
        radius_clock_server = radius_clock_server * 0.90;
        
        setInterval( function(){
            server_time = moment(server_time).tz("<?=$shareTime['serverTimeZone']?>").add(1,'seconds');
            drawClock(ctx_clock_server, radius_clock_server, server_time);
        }, 1000);

        function drawClock(ctx, radius,time) {
            drawFace(ctx, radius);
            drawNumbers(ctx, radius);
            drawTime(ctx, radius,time);
        }

        function drawFace(ctx, radius) {
        var grad;
        ctx.beginPath();
        ctx.arc(0, 0, radius, 0, 2*Math.PI);
        ctx.fillStyle = 'white';
        ctx.fill();
        grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
        grad.addColorStop(0, '#333');
        grad.addColorStop(0.5, 'white');
        grad.addColorStop(1, '#333');
        ctx.strokeStyle = grad;
        ctx.lineWidth = radius*0.1;
        ctx.stroke();
        ctx.beginPath();
        ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
        ctx.fillStyle = '#333';
        ctx.fill();
    }

    function drawNumbers(ctx, radius) {
        var ang;
        var num;
        ctx.font = radius*0.15 + "px arial";
        ctx.textBaseline="middle";
        ctx.textAlign="center";
        for(num = 1; num < 13; num++){
            ang = num * Math.PI / 6;
            ctx.rotate(ang);
            ctx.translate(0, -radius*0.85);
            ctx.rotate(-ang);
            ctx.fillText(num.toString(), 0, 0);
            ctx.rotate(ang);
            ctx.translate(0, radius*0.85);
            ctx.rotate(-ang);
        }
    }

    function drawTime(ctx, radius, time){
        var now =moment(time);
        var hour = now.format('hh');
        var  minute= now.format('mm');
        var second = now.format('ss');

        hour=hour%12;
        hour=(hour*Math.PI/6)+
            (minute*Math.PI/(6*60))+
            (second*Math.PI/(360*60));
        drawHand(ctx, hour, radius*0.5, radius*0.07);
        //minute
        minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
        drawHand(ctx, minute, radius*0.8, radius*0.07);
        // second
        second=(second*Math.PI/30);
        drawHand(ctx, second, radius*0.9, radius*0.02);
    }

    function drawHand(ctx, pos, length, width) {
        ctx.beginPath();
        ctx.lineWidth = width;
        ctx.lineCap = "round";
        ctx.moveTo(0,0);
        ctx.rotate(pos);
        ctx.lineTo(0, -length);
        ctx.stroke();
        ctx.rotate(-pos);
    }
        $('.page-sidebar-menu > li span.favourite').click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            var me = $(this);
            var parentLi = me.closest('li.nav-item');
            console.log(parentLi);
            me.find('i').addClass('fa-spin');

            if (!me.hasClass('bookmarked')) {
                var clone = parentLi.clone();
                var floatingConfig = {
                    float: clone,
                    startPoint: parentLi,
                    width: parentLi.outerWidth(),
                    enableFloat: true
                };
                var bookmarkAttributes = {
                    type: 'leftMenu',
                    entity_id: parentLi.data('id'),
                    data: {
                        id: parentLi.data('id')
                    }
                };
                addToBookMarks(bookmarkAttributes, floatingConfig).done(function (response) {
                    me.addClass('bookmarked').find('i').removeClass('fal fa-spin').addClass('fa');
                    parentLi.attr('data-bookmarkid', response.bookmark['id']);
                }).fail(function () {
                    me.find('i').removeClass('fa-spin');
                });
            } else
                removeBookmark(parentLi.attr('data-bookmarkid'), 'leftMenu').done(function () {
                    parentLi.removeAttr('data-bookmarkid');
                });
        });

        window.leftMenuBookmarkRemovalCallback = function (id) {
            $('.page-sidebar .page-sidebar-menu > li[data-bookmarkid="' + id + '"]')
                .removeAttr('data-bookmarkid').find('span.favourite').removeClass('bookmarked')
                .find('i').addClass('fal').removeClass('fa fa-spin');
        }
    });
</script>
