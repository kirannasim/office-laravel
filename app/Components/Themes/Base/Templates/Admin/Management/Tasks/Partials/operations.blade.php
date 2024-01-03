<div class="operationsHistory">
    <h2>Operations in {{ $task->getTaskName() }}
        <span>Total {{ $task->getTotalOperations() }} Operations</span>
        <button class="backToTask btn btn-outline blue"><i class="fa fa-angle-left"></i> back</button>
    </h2>
    @forelse($histories as $operation)
        <div class="eachOperation">
            <div class="row">
                <div class="details col-md-6">
                    <h5>Information</h5>
                    <div class="eachDetail">
                        <label>Name</label>
                        <span>{{ $operation->getOperationName() }}</span>
                    </div>
                    <div class="eachDetail">
                        <label>Status</label>
                        @php
                            switch ($operation->getSTatus()){
                                case 'pending':
                                    $statusIcon = '<i class="fa fa-spin pending fa-hour-glass-1"></i>';
                                    break;
                                 case 'failed':
                                    $statusIcon = '<i class="fa failed fa-close"></i>';
                                    break;
                                 default:
                                    $statusIcon = '<i class="fa success fa-check"></i>';
                                 break;
                            }
                        @endphp
                        <span>{!! $statusIcon .' ' . $operation->getStatus() !!}</span>
                    </div>
                    <div class="eachDetail">
                        <label>Started</label>
                        <span>{{ $operation->getStartedAt()->format('M d, Y H:i:s a') }}</span>
                    </div>
                    <div class="eachDetail">
                        <label>Finished</label>
                        <span>{{ $operation->getFinishedAt()->format('M d, Y H:i:s a') }}</span>
                    </div>
                    <div class="eachDetail">
                        <label>Retries</label>
                        <span>{{ $operation->getRetries() }}</span>
                    </div>
                    <div class="eachDetail">
                        <label>Execution Time</label>
                        <span>{{ $operation->executionTime() }} minutes</span>
                    </div>
                </div>
                <div class="errors col-md-6">
                    <h5>Errors</h5>
                    @forelse($operation->errors() as $key => $error)
                        <div class="error">
                            <label>{{ $key }}</label>
                            <span>{{ $error }}</span>
                        </div>
                    @empty
                        <div class="noErrors">
                            <i class="fa fa-check"></i>No errors found
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    @empty
        <div class="noOperation">
            <i class="fa fa-exclamation"></i> No operations found
        </div>
    @endforelse
</div>