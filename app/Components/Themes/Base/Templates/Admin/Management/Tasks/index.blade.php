@extends('Admin.Layout.master')
@section('content')
    <div class="tasksWrapper">
        <div class="row">
            <div class="col-md-4 tasksInfo">
                <div class="inner">
                    <div class="tile taskSummary">
                        <span class="icon">
                           <i class="fa fa-tasks"></i>
                        </span>
                        <div class="data">
                            <h2><span>{{ prettyNumber($totalTasks, 0) }}</span> total tasks</h2>
                            <h4><span>{{ prettyNumber($totalOperations, 0) }}</span> total operations</h4>
                        </div>
                    </div>
                    <div class="tasksGraph">
                        <div class="taskGraphHolder"></div>
                    </div>
                    <div class="tile tasksSuccess">
                        <span class="icon">
                           <i class="fa fa-check"></i>
                        </span>
                        <div class="data">
                            <h4><span>{{ prettyNumber($totalSuccessOperations, 0) }}</span> success operations</h4>
                        </div>
                    </div>
                    <div class="tile tasksPending">
                        <span class="icon">
                           <i class="fa fa-hourglass-2"></i>
                        </span>
                        <div class="data">
                            <h4><span>{{ prettyNumber($totalPendingOperations, 0) }}</span> pending operations</h4>
                        </div>
                    </div>
                    <div class="tile tasksFailed">
                        <span class="icon">
                           <i class="fa fa-close"></i>
                        </span>
                        <div class="data">
                            <h4><span>{{ prettyNumber($totalFailedOperations, 0) }}</span> failed operations</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 taskViewer">
                <div class="taskHolder"></div>
            </div>
        </div>
    </div>

    <style>
        .page-content {
            background: #eee;
        }
    </style>

    <script type="text/javascript">
        function loadTasks(filter) {
            simulateLoading('.taskHolder');

            return $.post('{{ route('admin.tasks.view') }}', {filter: filter}, function (response) {
                $('.taskHolder').html(response);
            });
        }

        $(function () {
            loadTasks();

        });
    </script>
@endsection