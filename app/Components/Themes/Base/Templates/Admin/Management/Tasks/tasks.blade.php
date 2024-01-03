@if ($includeHeader)
    <div class="headerData">
        <h2>Running tasks <span class="taskStats">Showing {{ $totalTasks }} tasks</span></h2>
        <div class="filterWrapper">
            <div class="inner">
                <label>Filter tasks</label>
                <div class="filters">
                    <div class="nameFilter filter">
                        <label>Search by name</label>
                        <input type="text" class="nameFilter" placeholder="Task name">
                    </div>
                    <div class="nameFilter filter">
                        <label>Finished tasks</label>
                        <input type="checkbox" class="statusFilter icheck" value="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="tasksContainer" id="{{ $containerId }}">
    @forelse($tasks as $task)
        @include('Admin.Management.Tasks.Partials.task')
    @empty
        <div class="noTasks"><i class="fa fa-cogs"></i> No active tasks</div>
    @endforelse
</div>

<script type="text/javascript">
    $(function () {
        function syncOperation(taskId, force) {
            if (window.operationSyncing == '{{ $containerId }}' && !force) return;

            window.operationSyncing = '{{ $containerId }}';

            return $.post('{{ route('admin.task.operation.view') }}', {taskId: taskId}, function (response) {
                window.operationSyncing = false;
                let targetTask = $('#{{ $containerId }} .eachTask[data-taskid="' + taskId + '"]');
                targetTask.find('.operationHolder').html(response);
            });
        }

        function deleteTask(taskId) {
            return $.post('{{ route('admin.tasks.delete') }}', {taskId: taskId}, function (response) {
                //loadSidebarTasks();
            });
        }

        $('.taskHeader .deleteTask').click(function () {
            $(this).addClass('fa-refresh fa-spin').removeClass('fa-trash');
            deleteTask($(this).data('id')).done(response => {
                $(this).closest('.eachTask').remove();
            })
        });

        function fetchTask(taskId) {
            $('.noTasks').remove();

            return $.post('{{ route('admin.task.view') }}', {taskId: taskId}, function (response) {
                $('#{{ $containerId }}.tasksContainer').prepend(response).promise().done(function () {
                    $('.select2').select2({
                        width: '100%',
                        allowClear: true
                    });
                });
            });
        }

        function finishTask(event) {
            let targetTask = $('#{{ $containerId }} .eachTask[data-taskid="' + event.task.taskId + '"]');
            targetTask.find('.barHolder .bar').css({width: '100%'});
            targetTask.find('span.taskStatus').addClass('done').removeClass('running')
                .html('<i class="fa fa-check"></i> done');
            targetTask.find('.taskHeader .actions button').remove();
            syncOperation(event.task.taskId, true);

            if (window.hasOwnProperty('taskFinishedCallback')) window.taskFinishedCallback();
        }

        function updateProgress(operationElement, operation, task) {
            let options = {
                useEasing: true,
                formattingFn: function (number) {
                    return number + '%';
                }
            };
            let percentProcessed = Number(operation.percentProcessed ? operation.percentProcessed : 0);
            let target = operationElement.find('.operationBody .progressBar .progressValue');
            let counter = new CountUp(target[0], Number(target.text().replace('%', '')), percentProcessed, 0, 2.5, options);

            counter.start();

            operationElement.find('.operationProgress').circleProgress({
                value: percentProcessed / 100,
                size: 90,
                fill: {
                    gradient: ["white", operation.errors ? "red" : "green"]
                }
            });

            let taskProcessed = task.totalOperations ? (task.processed / task.totalOperations) : 0;
            let targetTask = operationElement.closest('.eachTask');

            targetTask.find('.barHolder .bar').css({width: taskProcessed * 100 + '%'});
        }

        function updateOperation(event) {
            let task = event.task;
            let operation = event.operation;
            let targetTask = $('#{{ $containerId }} .eachTask[data-taskid="' + task.taskId + '"]');
            let targetOperation = targetTask.find('.currentOperation');

            targetTask.find('.statsHolder .summary p.success').text(task.processed);
            targetTask.find('.statsHolder .summary p.total').text(task.totalOperations);

            if (!targetOperation.length) return syncOperation(task.taskId);

            targetOperation.find('.updateHolder .update').html('<i class="fa ' +
                (operation.errors ? 'fa-close' : 'fa-spin fa-hourglass-1') + '"></i>' + operation.currentStage);
            targetOperation.find('.realTimeUpdate h3').html('<i class="fa fa-cube"></i>' + operation.operationName);
            targetOperation.find('.eachStat.success span').text(task.successJobs);
            targetOperation.find('.eachStat.failed span').text(task.failedJobs);
            targetOperation.find('.eachStat.pending span').text(task.pendingJobs);
            updateProgress(targetOperation, operation, task);
        }

        $('.taskHolder .icheck').iCheck({
            checkboxClass: 'icheckbox_flat',
            radioClass: 'iradio_flat'
        });

        window.taskBroadCastCallback.tasksManager{{ $containerId }} = (event) => {
            if (!$('#{{ $containerId }}').length) return;

            switch (event.type) {
                case 'taskUpdate':
                    if (!event.task.done)
                        fetchTask(event.task.taskId);
                    else
                        finishTask(event);
                    break;
                case 'operationUpdate':
                    updateOperation(event);
                    break;
            }
        };
        $('body').off('click', '.operationHistory')
            .on('click', '.operationHistory', function () {
                let targetTask = $(this).closest('.eachTask');
                simulateLoading(targetTask);

                $.post('{{ route('admin.task.history.view') }}', {taskId: $(this).data('taskid')}, function (response) {
                    Ladda.stopAll();
                    targetTask.find('.taskHistory').slideDown().html(response).siblings('.operationHolder').slideUp();
                    simulateLoading(targetTask, true);
                }).fail(function (response) {
                    Ladda.stopAll();
                    simulateLoading(targetTask, true);
                });
            });

        $('body').on('click', '.backToTask', function () {
            $(this).closest('.taskHistory').slideUp().siblings('.operationHolder').slideDown();
        });
    });
</script>