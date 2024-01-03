<div class="eachTask {{ $randClass = randomString() }}" data-taskid="{{ $task->getTaskId() }}">
    <div class="taskHeader">
        <h3>
            <span>
                <span class="icon">
                    <i class="fa fa-server"></i>
                </span>{{ $task->getTaskName() }}
                <i class="fa fa-trash deleteTask" data-id="{{ $task->getTaskId() }}"></i>
            </span>
            <div class="actions">
                <span class="taskStatus {{ $task->isDone() ? 'done' : 'running' }}">
                    <i class="fa fa-{{ $task->isDone() ? 'check' : 'spin fa-refresh' }}"></i>
                    {{ $task->isDone() ? 'Finished' : 'Running' }}
                </span>
                @if (!$task->isDone())
                    <button class="btn blue btn-circle pauseTask">
                        <i class="fa fa-pause"></i>Pause
                    </button>
                    <button class="btn btn-circle red stopTask">
                        <i class="fa fa-power-off"></i>Stop
                    </button>
                @endif
                <span class="showOperations fa fa-ellipsis-h"></span>
            </div>
        </h3>
        <div class="taskProgress">
            <div class="barHolder">
                <div class="bar"
                     style="width: @if ($task->isDone()) 100% @else {{ ($task->getTotalOperations() ? ($task->getProcessed() / $task->getTotalOperations()) : 0) * 100 . '%' }} @endif "></div>
            </div>
            <div class="statsHolder">
                 <span class="summary">
                    <p class="success">{{ $task->getProcessed() }}</p> of <p class="total">
                        {{ $task->getTotalOperations() }}</p> Operations has completed
                </span>
                <div class="row">
                    <div class="col-md-7">
                        <div class="taskAddedAt">
                            <label>Added at</label> {{ $task->startedAt->format('Y M d h:i:s a') }}
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="taskAddedBy">
                            Added by <label>{{--{{ $task->getUser()->username }}--}} System</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="taskBody">
        <div class="operationSearch">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" placeholder="Operation name">
                </div>
                <div class="col-md-4">
                    <select class="operationStatus select2">
                        <option value="pending">Pending</option>
                        <option value="pending">Success</option>
                        <option value="pending">Failed</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button class="filterOperation btn blue">
                        <i class="fa fa-filter"></i>Filter
                    </button>
                </div>
            </div>
        </div>
        <div class="operationHolder">
            @include('Admin.Management.Tasks.Partials.operation')
        </div>
        <div class="taskHistory"></div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $('.{{ $randClass }} .currentOperation .operationProgress').circleProgress({
            value: Number('{{ $task->currentOperation() ? $task->currentOperation()->percentProcessed() : 0 }}') / 100,
            size: 90,
            fill: {
                gradient: ["white", "green"]
            }
        });
        Ladda.bind('.ladda-button');
    });
</script>