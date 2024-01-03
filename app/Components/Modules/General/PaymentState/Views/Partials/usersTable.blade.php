@if($userData->count())
<style type="text/css">
    .sendBroadcast{
        display: none;
    }
    .mainBreadcrumb{
        display: none;
    }
    .emailBroadcaster{
        max-width: unset;
    }
    .page-content-wrapper .page-content{
        padding: 0px 20px 0px 20px;
    }
    button{
        border-radius: 3px !important;
    }
    #example_filter label{
        display: flex;
        align-items: center;
    }

    #example_filter label input{
        margin-left: 10px;
    }
    table.dataTable.no-footer{
        border-bottom:unset !important;
    }
    #example_wrapper{
        width: 99% !important;
    }
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <div class="table-responsive">
        {{--<div class="btn-area" style="position: absolute;right: 0; margin-right: 300px;z-index: 100;">--}}
            {{--<button class="btn btn-success btn_paid">Paid</button>--}}
            {{--<button class="btn btn-primary btn_not_paid">Not Paid</button>--}}
        {{--</div>--}}
        <table style="margin-top: 10px; margin-bottom: 10px" id="example" class="table table-striped table-bordered table-hover dataTable dtr-inline reporttable" role="grid"
               aria-describedby="sample_1_info" style="width: 1028px;">
            <thead>
            <tr>
                <th style="text-align: center;"> No </th>
                <th> Reference ID </th>
                <th> UserName </th>
                <th> FirstName </th>
                <th> LastName </th>
                <th> Created Date </th>
                <th style="text-align: center;"> Status </th>
            </tr>
            </thead>
            <?php $number = 1; ?>
            <tbody>
            @foreach($userData as $user)
                <tr>
                    <td align="center"></td>
                    <td>{{ $user->customer_id }}<input class="myid" type="text" style="display: none;" value="{{ $user->customer_id }}" name="">  </td>
                    <td> {{ $user->username }} </td>
                    <td> {{ $user->metaData->firstname }} </td>
                    <td> {{ $user->metaData->lastname }} </td>
                    <td> <?php echo $create = date('Y-m-d',strtotime($user->created_at)); ?>
                         <?php  $current = now()->toDateString('Y-m-d'); 
                         $date1=date_create($create);
                         $date2=date_create($current);
                         $diff=date_diff($date1,$date2);
                         $result = $diff->format("%R%a");// echo $result;?>   </td>
                    <td class="btn-area"> 
                       
                        <button class="btn btn-primary pre-delete" data-toggle="modal" data-target="#myModal"  style="display: {{in_array($user->customer_id,$customer_id)?'':'none !important'}}">Mark as Paid</button>
                       
                        <button class="btn btn-success"  style="display: {{in_array($user->customer_id,$customer_id)?'none !important':''}}">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>  Paid</button> 
                    </td>
                </tr>
                <?php $number ++ ; ?>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Trigger the modal with a button -->

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div><h3 style="text-align: center">Are you sure ? </h3></div>
                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary delete" data-dismiss="modal">Mark as Paid</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
                </div>

          </div>
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
         $('.pre-delete').click(function(){
            var pre_delete = $(this).parent().parent().find('.myid').eq(0).val();
            $('.delete').attr('attr-id', pre_delete);
            $(this).addClass(pre_delete);
         })

         $('.delete').click(function(){
            $.get('{{ scopeRoute("email.paymentstate.delete") }}', {data:$(this).attr('attr-id')}, function (response){

            });

            $('.'+$(this).attr('attr-id')).attr('style', 'display:none !important');
            $('.'+$(this).attr('attr-id')).parent().children().eq(1).attr('style', 'display:block !important');
        })
         $('.btn_paid').click(function(){
            $.get('{{ scopeRoute("email.paymentstate.paid") }}', {data:"paid"}, function (response){
                response = JSON.parse(response);
                var html = '';
                for(let item in response)
                {
                    html += `<tr>
                    <td align="center"></td>
                    <td>` + response[item]['reference'] + `<input class="myid" type="text" style="display: none;" value="` + response[item]['customer_id'] + `" name="">  </td>
                    <td> ` + response[item].data.orderData['username'] +　` </td>
                    <td>` + response[item].data.orderData['firstname'] + ` </td>
                    <td>` + response[item].data.orderData['lastname'] + ` </td>
                    <td>` + response[item].created_at.split(" ")[0] + ` </td>
                    <td class="btn-area">
                        <button class="btn btn-success">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>  Paid</button> 
                    </td>
                </tr>`;
                }

                $('#example tbody').html(html);
                $('#example').DataTable().ajax.reload();
            });
         })
    });
</script>
<script type="text/javascript" src="{{asset('js/datatable.js')}}"></script>
<script>
  $(function(){
    $("#example").dataTable();
  })
  var t = $('#example').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
</script>

