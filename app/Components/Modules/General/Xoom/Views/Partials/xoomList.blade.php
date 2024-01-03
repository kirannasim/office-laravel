<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="row">
            <div class="col-sm-9"><span><i class="fa fa-question-circle"></i> {{ _mt($moduleId,'Xoom.xoom') }}</span>
            </div>
            <div class="col-sm-3">
                {{--                <button type="button" class="btn btn-transparent btn-outline btn-circle addNewXoom"><i class="fa fa-plus-circle" aria-hidden="true"></i> {{ _mt($moduleId,'Xoom.add_new_xoom') }}</button>--}}
            </div>
        </div>
    </div>

    <div class="panel-body" style="display: block">
        @if($xoom_users->count())
            <div class="table-scrollable">
                <table class="table table-striped table-hover">
                    <thead>
                    <th>{{ _mt($moduleId,'Xoom.user_id') }}</th>
                    <th>{{ _mt($moduleId,'Xoom.api_email') }}</th>

                    <th>{{ _mt($moduleId,'Xoom.api_updated_at') }}</th>
                    <th>{{ _mt($moduleId,'Xoom.action') }}</th>
                    </thead>
                    <tbody>
                    @foreach($xoom_users as $xoom)
                        <tr>
                            <td>{{ $xoom->user_id }}</td>
                            <td>
                                {{ $xoom->user->email }} <strong>&bullet;</strong>
                                Package ({{ $xoom->user->package->id }}): {{ $xoom->user->package->name }} <strong>&bullet;</strong>
                                ArchieBot Package: {{ $config->get('packages_map')[$xoom->user->package->id] ?? '' }}
                            </td>
                            <td>
                                {{ $xoom->updated_at }}
                            </td>
                            <td style="width: 180px;">
                                <button style="width:120px;" class="btn btn-primary authorizeXoom ladda-button"
                                        data-style="contract" data-id="{{ $xoom->id }}"><i
                                            class="fa fa-pencil-square-o"></i>{{ _mt($moduleId,'Xoom.re_authorise') }}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            {{ _mt($moduleId,'Xoom.no_xoom_available') }}
        @endif
    </div>
</div>
<script>
    'use strict';

    $(function () {
        Ladda.bind('.ladda-button');
    });

    $('.authorizeXoom').click(function () {
        var options = {id: $(this).attr('data-id')}
        $.post('{{ scopeRoute('xoom.users.authorize') }}', options, function (response) {
            toastr.success('{{ _mt($moduleId,'Xoom.xoom_authorized_successfully') }}');
            loadXoomList();
        })
    });
</script>
