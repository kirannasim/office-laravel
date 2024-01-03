<?php

namespace App\Jobs;

use App\Blueprint\Support\Tasks\Operation;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Task implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//    public $job;

    public $task;

    public $operation;

    public $tries;

    public $timeout;

    /**
     * Create a new job instance.
     *
     * @param Operation $operation
     */
    public function __construct(Operation $operation)
    {
        $this->setOperation($operation)->setTries($operation->maxTries())->setTimeout($operation->getTimeout());
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->getTask()->run();
    }

    /**
     * @param mixed $task
     * @return Task
     */
    public function setTask($task): Task
    {
        $this->task = $task;

        return $this;
    }

    /**
     * @return \App\Blueprint\Support\Tasks\Task
     */
    public function getTask(): \App\Blueprint\Support\Tasks\Task
    {
        return $this->task;
    }

    /**
     * @return Operation
     */
    public function getOperation(): Operation
    {
        return $this->operation;
    }

    /**
     * @param mixed $operation
     * @return Task
     */
    public function setOperation($operation): Task
    {
        $this->operation = $operation;

        return $this;
    }

    /**
     * @param mixed $tries
     * @return Task
     */
    public function setTries($tries): Task
    {
        $this->tries = $tries;

        return $this;
    }

    /**
     * @param mixed $timeout
     * @return Task
     */
    public function setTimeout($timeout): Task
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * @param null $exception
     * @return mixed
     */
    public function failed($exception = null)
    {
        return $this->getOperation()->failed($exception);
    }
}
