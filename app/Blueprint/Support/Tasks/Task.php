<?php
/**
 *  -------------------------------------------------
 *  Hybrid MLM  Copyright (c) 2018 All Rights Reserved
 *  -------------------------------------------------
 *
 * @author Acemero Technologies Pvt Ltd
 * @link https://www.acemero.com
 * @see https://www.hybridmlm.io
 * @version 1.00
 * @api Laravel 5.4
 */

namespace App\Blueprint\Support\Tasks;

use App\Blueprint\Support\Collection;
use App\Eloquents\User;
use App\Events\TaskBroadcaster;
use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Support\Facades\Redis;

/**
 * Class Activity
 * @package App\Events
 */
class Task
{
    /**
     * @var String $taskName
     */
    public $taskName;
    /**
     * @var String $taskDescription
     */
    public $taskDescription;
    /**
     * @var String $taskId
     */
    public $taskId;
    /**
     * @var String $startedAt
     */
    public $startedAt;
    /**
     * @var String $done
     */
    public $done = false;
    /**
     * @var $user User|bool
     */
    public $user = false;
    /**
     * @var String $channelIdentifier
     */
    public $channelIdentifier;
    /**
     * @var int $operations
     */
    public $failedJobs = 0;
    /**
     * @var int $operations
     */
    public $successJobs = 0;
    /**
     * @var int $operations
     */
    public $pendingJobs = 0;
    /**
     * @var int $totalOperations
     */
    public $totalOperations;
    /**
     * @var $currentOperation Operation
     */
    public $currentOperation;
    /**
     * @var $processed int
     */
    public $processed = 0;
    /**
     * @var int $retries
     */
    protected $retries = 3;
    /**
     * @var String $channel
     */
    protected $channel;
    /**
     * @var String $attributes
     */
    protected $attributes = [
        'taskName', 'startedAt', 'broadcastAs', 'channel',
        'done', 'inQueue', 'channelIdentifier', 'taskId',
        'totalOperations', 'taskDescription', 'retries'
    ];
    /**
     * @var array $operations
     */
    protected $operations = [];
    /**
     * @var Channel $channelInstance
     */
    protected $channelInstance;
    /**
     * @var int $broadcastAs
     */
    protected $broadcastAs = 'taskBroadcast';
    /**
     * @var $broadcaster TaskBroadcaster
     */
    protected $broadcaster;
    /**
     * @var $verbose
     */
    protected $verbose = true;
    /**
     * @var $useQueue bool
     */
    protected $useQueue = false;
    /**
     * @var $queueDelay mixed|Carbon
     */
    protected $queueDelay = 0;
    /**
     * @var $onQueue string
     */
    protected $onQueue;
    /**
     * @var $queueConnection string
     */
    protected $queueConnection;

    /**
     * Create a new event instance.
     *
     * @param array $attributes
     * @param bool $useQueue
     */
    protected function __construct($attributes = [], $useQueue = false)
    {
        $this->setAttributes($attributes)
            ->setBroadcaster()
            ->setStartedAt(Carbon::now())
            ->setTaskId()
            ->setUser();
    }

    /**
     * @param String $startedAt
     * @return Task
     */
    public function setStartedAt($startedAt)
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    /**
     * @param $taskId
     * @param array $attributes
     * @param bool $useQueue
     * @return \Illuminate\Foundation\Application|Task
     */
    static function getInstance($taskId, $attributes = [], $useQueue = false)
    {
        if (app()->resolved($abstract = ($taskId ?: $attributes['taskName']))) return app($abstract);

        app()->singleton($abstract, function () use ($useQueue, $attributes) {
            return new static($attributes, $useQueue);
        });

        return app($abstract);
    }

    /**
     * @param $name
     * @return string
     */
    static function generateTaskId($name)
    {
        return $name . '-' . Carbon::now()->getTimestamp();
    }

    /**
     * @param $name
     * @param \Closure $job
     * @return Task|array|null
     */
    function addJob($name, \Closure $job)
    {
        return $this->pushOrUpdateOperation($operation = (new Operation($name, $this, $job))->setTask($this))
            ->setCurrentOperation($operation)
            ->taskUpdate($operation->setCurrentStage('preparing'));
    }

    /**
     * @param Operation $operation
     * @return Task|array|null
     */
    function taskUpdate(Operation $operation = null)
    {
        $this->syncStats()->broadcast($operation);

        return $this;
    }

    /**
     * @param Operation $operation
     * @return array|null
     */
    function broadcast(Operation $operation = null)
    {
        return event($this->getBroadcaster($operation));
    }

    /**
     * @param Operation|null $operation
     * @return mixed
     */
    function getBroadcaster(Operation $operation = null)
    {
        return tap($this->broadcaster->setBroadcastType($operation ? 'operationUpdate' : 'taskUpdate'), function ($broadcaster) use ($operation) {
            if ($operation) /** @var TaskBroadcaster $broadcaster */
                $broadcaster->setCurrentOperation($operation);
        });
    }

    /**
     * @return Task
     */
    public function setBroadcaster()
    {
        $this->broadcaster = new TaskBroadcaster($this);

        return $this;
    }

    /**
     * @return Task|bool
     */
    function syncStats()
    {
        $this->resetCounter()->getOperations()->groupBy(function ($operation) {
            /** @var Operation $operation */
            return $operation->getStatus();
        })->each(function ($group, $status) {
            /** @var Collection $group */
            $this->{"{$status}Jobs"} = $group->count();
        });

        return $this->setToRedis();
    }

    /**
     * @param bool $returnCollect
     * @return array|Collection
     */
    public function getOperations($returnCollect = true)
    {
        return $returnCollect ? collect($this->operations) : $this->operations;
    }

    /**
     * @param array $operations
     * @return Task
     */
    public function setOperations($operations)
    {
        $operations = isNumericArray($operations) ? $operations : [$operations];

        foreach ($operations as $operation) $this->pushOrUpdateOperation($operation);

        return $this;
    }

    /**
     * @return Task
     */
    protected function resetCounter()
    {
        return $this->setFailedJobs(0)->setPendingJobs(0)->setSuccessJobs(0);
    }

    /**
     * @param int $successJobs
     * @return Task
     */
    public function setSuccessJobs($successJobs)
    {
        $this->successJobs = $successJobs;

        return $this;
    }

    /**
     * @return int
     */
    function pendingJobs()
    {
        return $this->getTotalOperations() - $this->getProcessed();
    }

    /**
     * @param int $pendingJobs
     * @return Task
     */
    public function setPendingJobs($pendingJobs)
    {
        $this->pendingJobs = $pendingJobs;

        return $this;
    }

    /**
     * @param int $failedJobs
     * @return Task
     */
    public function setFailedJobs($failedJobs)
    {
        $this->failedJobs = $failedJobs;

        return $this;
    }

    /**
     * @return $this
     */
    function setToRedis()
    {
        Redis::hset('tasks', $this->getTaskId(), serialize($this));

        return $this;
    }

    /**
     * @return String
     */
    public function getTaskId()
    {
        return $this->taskId;
    }

    /**
     * @return Task
     */
    public function setTaskId()
    {
        $this->taskId = $this->getTaskId() ?: static::generateTaskId($this->getTaskName());

        return $this;
    }

    /**
     * @param Operation|bool $currentOperation
     * @return Task
     */
    public function setCurrentOperation($currentOperation)
    {
        $this->currentOperation = $currentOperation;

        return $this;
    }

    /**
     * @param $operation
     * @return Task
     */
    function pushOrUpdateOperation($operation)
    {
        $operation = $operation instanceof Operation ? $operation : Operation::getSelf($operation);

        return $this->setOperation($operation->setTask($this));
    }

    /**
     * @param Operation $operation
     * @return $this
     */
    function setOperation(Operation $operation)
    {
        $this->operations[$operation->getOperationName()] = $operation->setTask($this);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param $attributes
     * @return Task
     */
    function setAttributes($attributes)
    {
        foreach ($attributes as $attribute => $value) {
            if (!in_array($attribute, ($this->getAttributes()))) continue;

            $this->{$attribute} = $value;
        }

        return $this;
    }

    /**
     * @return string
     */
    function broadcastAs()
    {
        return $this->broadcastAs;
    }

    /**
     * @return Operation
     */
    public function currentOperation()
    {
        return $this->currentOperation;
    }

    /**
     * @param null $numberOfOperations
     * @return $this
     */
    public function flushOperations($numberOfOperations = null)
    {
        if (!$numberOfOperations) $this->setOperations([]);

        $this->getOperations()->take($numberOfOperations)->each(function ($operation) {
            /** @var Operation $operation */
            $this->getOperations()->forget($operation->getOperationName());
        });

        return $this;
    }

    /**
     * @return array
     */
    function __sleep()
    {
        return array_keys(array_except(get_object_vars($this), ['socket', 'broadcaster']));
    }

    /**
     * @return String
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param String $channel
     * @return Task
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * @return String
     */
    function isDone()
    {
        return $this->done;
    }

    /**
     * @return \App\Eloquents\Task|\Illuminate\Database\Eloquent\Model
     */
    public function finish()
    {
        if (!$this->useQueue)
            while ($this->operationsWithRetries()->count()) $this->run(true);
        // Clean-up Task
        $this->cleanup();

        return (new \App\Eloquents\Task)->create([
            'name' => $this->getTaskName(),
            'task_id' => $this->getTaskId(),
            'description' => $this->getTaskDescription(),
            'failed' => $this->failedJobs,
            'success' => $this->successJobs,
            'data' => $this->getProgress($this->verbose),
            'started_at' => $this->startedAt,
        ]);
    }

    /**
     * @return Collection
     */
    function operationsWithRetries()
    {
        return $this->getOperationsByStatus(['failed'])->filter(function ($operation) {
            /** @var Operation $operation */
            return isset($operation->maxTries) ? ($operation->maxTries > $operation->retries) : $operation->retries < $this->retries;
        });
    }

    /**
     * @return Task
     */
    function cleanup()
    {
        return $this->done(true)->setCurrentOperation(false)->taskUpdate()->flushRedis();
    }

    /**
     * @param bool $retryFailed
     * @return Task
     */
    function run($retryFailed = false)
    {
        $this->getOperationsByStatus($retryFailed ? ['failed'] : 'pending')
            ->each(function ($operation) {
                if ($this->shouldUseQueue()) {
                    dispatch((new \App\Jobs\Task($operation))->delay($this->queueDelay)
                        ->onQueue($this->onQueue)->onConnection($this->queueConnection)
                    );
                } else {
                    /** @var Operation $operation */
                    if ($operation->retries <= (isset($operation->maxTries) ? $operation->maxTries : $this->retries))
                        $operation->run();
                }
            });

        return $this;
    }

    /**
     * @param $status
     * @return Collection
     */
    function getOperationsByStatus($status)
    {
        return $this->getOperations()->filter(function ($operation) use ($status) {
            /** @var Operation $operation */
            return is_array($status) ? in_array($operation->getStatus(), $status) : ($status == $operation->getStatus());
        });
    }

    /**
     * @return bool
     */
    public function shouldUseQueue()
    {
        return $this->useQueue;
    }

    /**
     * @return $this
     */
    function flushRedis()
    {
        //Redis::hdel('tasks', $this->getTaskId(), serialize($this));

        return $this;
    }

    /**
     * @param $status
     * @return Task
     */
    function done($status)
    {
        $this->done = $status;

        return $this;
    }

    /**
     * @return String
     */
    public function getTaskName()
    {
        return $this->taskName;
    }

    /**
     * @return String
     */
    public function getTaskDescription()
    {
        return $this->taskDescription;
    }

    /**
     * @param String $taskDescription
     * @return Task
     */
    public function setTaskDescription($taskDescription)
    {
        $this->taskDescription = $taskDescription;

        return $this;
    }

    /**
     * @param bool $includeOperations
     * @param bool $useCachedCounter
     * @return array|bool
     */
    function getProgress($includeOperations = true, $useCachedCounter = false)
    {
        if (!$this->getOperations(false)) return false;

        $values = $percentage = [];

        foreach (['pending', 'failed', 'success'] as $status) {
            $values[$status] = $jobs = $this->getOperations()->filter(function ($operation) use ($status) {
                /** @var Operation $operation */
                return $operation->getStatus() == $status;
            });
            $total = $useCachedCounter ? $this->{"{$status}Jobs"} : ($jobs ? $jobs->count() : 0);
            $percentage[$status] = $total ? (($total / $this->getTotalOperations()) * 100) : 0;
        }

        return [
            'values' => $includeOperations ? $values : null,
            'percentage' => $percentage
        ];
    }

    /**
     * @return int
     */
    public function getTotalOperations()
    {
        return $this->totalOperations ?: $this->getOperations()->count();
    }

    /**
     * @param int $totalOperations
     * @return Task
     */
    public function setTotalOperations($totalOperations)
    {
        $this->totalOperations = $totalOperations;

        return $this;
    }

    /**
     * @param bool $useQueue
     */
    public function setUseQueue($useQueue)
    {
        $this->useQueue = $useQueue;
    }

    /**
     * @return $this
     */
    public function addToProcessed()
    {
        $this->processed += 1;

        return $this;
    }

    /**
     * @return int
     */
    public function getProcessed()
    {
        return $this->processed;
    }

    /**
     * @return User|bool
     */
    public function getUser()
    {
        return $this->user ?: companyUser();
    }

    /**
     * @param User|bool $user
     * @return Task
     */
    public function setUser($user = null)
    {
        $this->user = $user ?: loggedUser();

        return $this;
    }
}