@if (!$task->isDone())
    @if ($operation = $task->currentOperation())
        <div class="currentOperation" data-operationid="{{ $operation->getOperationId() }}"
             style="display: {{ $operation ? 'block' : 'none' }} ;">
            {{--<div class="operationHeader">
                --}}{{--<div class="actions">
                    <button class="btn red stopOperation">
                        <i class="fa fa-power-off"></i>
                    </button>
                </div>--}}{{--
            </div>--}}
            <div class="operationBody">
                <div class="row">
                    <div class="progressBar col-md-4">
                        <div class="operationProgress">
                            <span class="progressValue">
                                {{ $operation->percentProcessed() }}%
                            </span>
                        </div>
                    </div>
                    <div class="progressUpdates col-md-8">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="operationStats">
                                    <div class="eachStat success">
                                        <i class="fa fa-check"></i>
                                        Success - <span>{{ $task->successJobs }}</span>
                                    </div>
                                    <div class="eachStat failed">
                                        <i class="fa fa-close"></i>
                                        Failed - <span>{{ $task->failedJobs }}</span>
                                    </div>
                                    <div class="eachStat pending">
                                        <i class="fa fa-hourglass-1"></i>
                                        Pending - <span>{{ $task->pendingJobs() }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="realTimeUpdate">
                                    <h3>
                                        <i class="fa fa-cube"></i>{{ $operation->getOperationName() }}
                                    </h3>
                                    @if (!$task->isDone())
                                        <div class="updateHolder">
                                            <div class="update">
                                                <i class="fa fa-spin fa-hourglass-2"></i>
                                                {{ $operation->getCurrentStage() }}
                                            </div>
                                        </div>
                                    @else
                                        <div class="taskFinished">
                                            <h4>Task has finished</h4>
                                            <button class="btn operationHistory green">
                                                <i class="fa fa-pagelines"></i>View history
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="syncingOperations" style="display: {{ $operation ? 'none' : 'block' }} ;">
            <i class="fa fa-hourglass-1 fa-spin"></i>Syncing operations
        </div>
    @endif
@else
    <div class="taskFinished">
        <div class="row">
            <div class="col-md-12">
                <div class="operationStats">
                    <div class="eachStat success">
                        <i class="fa fa-check"></i>
                        Success - <span>{{ $task->successJobs }}</span>
                    </div>
                    <div class="eachStat failed">
                        <i class="fa fa-close"></i>
                        Failed - <span>{{ $task->failedJobs }}</span>
                    </div>
                    <div class="eachStat pending">
                        <i class="fa fa-hourglass-1"></i>
                        Pending - <span>{{ $task->pendingJobs() }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="notice">
                    <h4>Task has finished</h4>
                    <button class="btn green operationHistory ladda-button" data-style="contract"
                            data-taskid="{{ $task->getTaskId() }}">
                        <i class="fa fa-inbox"></i>View history
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
