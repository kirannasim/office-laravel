<?php
/**
 * Created by PhpStorm.
 * User: Muhammed Fayis
 * Date: 10/25/2018
 * Time: 6:29 PM
 */

namespace App\Blueprint\Support\Tasks;

use App\Blueprint\Interfaces\Tasks\Operation as OperationContract;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Str;

class Operation implements OperationContract, \JsonSerializable
{
    /**
     * @var int $retries
     */
    public $retries = 0;
    /**
     * @var $maxTries int
     */
    public $maxTries = 2;
    /**
     * @var $timeout int
     */
    public $timeout;
    /**
     * @var $operationId string
     */
    public $operationId;
    /**
     * @var String $startedAt
     */
    protected $startedAt;
    /**
     * @var String $lastUpdatedAt
     */
    protected $lastUpdatedAt;
    /**
     * @var String $finishedAt
     */
    protected $finishedAt;
    /**
     * @var array $errors
     */
    protected $errors = [];
    /**
     * @var String $currentStage
     */
    protected $currentStage;
    /**
     * @var String $operationName
     */
    protected $operationName;
    /**
     * @var String $percentProcessed
     */
    protected $percentProcessed = 0;
    /**
     * @var String $inQueue
     */
    protected $inQueue;
    /**
     * @var string $status
     */
    protected $status = 'pending';
    /**
     * @var $job \Closure
     */
    protected $job;
    /**
     * @var $task Task
     */
    protected $task;

    /**
     * TaskOperation constructor.
     * @param $operationName
     * @param Task $task
     * @param \Closure $job
     */
    function __construct($operationName, Task $task, \Closure $job)
    {
        $this->setOperationName($operationName)
            ->setTask($task)->setJob($job)->setOperationId();
    }

    /**
     * @param $attributes
     * @return Operation
     */
    static function getSelf($attributes)
    {
        return new static(...$attributes);
    }

    /**
     * @return mixed
     */
    function operationName()
    {
        return $this->operationName;
    }

    /**
     * @return mixed
     */
    function inQueue()
    {
        return $this->inQueue;
    }

    /**
     * @return mixed
     */
    function timePassed()
    {
        return Carbon::now()->diff($this->startedAt());
    }

    /**
     * @return mixed
     */
    function startedAt()
    {
        return $this->startedAt;
    }

    /**
     * @return mixed
     */
    function errors()
    {
        return $this->errors;
    }

    /**
     * @return String
     */
    public function getOperationName()
    {
        return $this->operationName;
    }

    /**
     * @param String $operationName
     * @return Operation
     */
    public function setOperationName($operationName)
    {
        $this->operationName = $operationName;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Operation
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Operation|Task|array
     */
    function run()
    {
        if (!$this->retries) $this->getTask()->addToProcessed();

        $this->setStartedAt(Carbon::now())->retries += 1;

        try {
            call_user_func($this->getJob()->bindTo($this, $this), $this);
            return $this->finish();
        } catch (\Exception $exception) {
            return $this->setErrors(['error' => $exception->getMessage()])
                ->setFinishedAt()
                ->abort('Error occurred !', round(($this->retries / $this->maxTries) * 100, 1));
        }
    }

    /**
     * @return Task
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param Task $task
     * @return Operation
     */
    public function setTask($task)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * @param Carbon $startedAt
     * @return Operation
     */
    public function setStartedAt(Carbon $startedAt = null)
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    /**
     * @return \Closure
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * @param \Closure $job
     * @return Operation
     */
    function setJob(\Closure $job)
    {
        $this->job = $job->bindTo($this, $this);

        return $this;
    }

    /**
     * @return Task|array|null
     */
    public function finish()
    {
        return $this->setStatus((($status = $this->getStatus()) == 'pending') ? 'success' : $status)
            ->setCurrentStage('finished')
            ->setFinishedAt(Carbon::now())
            ->setPercentProcessed(100)
            ->informStatus();
    }

    /**
     * @return Task|array|null
     */
    function informStatus()
    {
        return $this->getTask()->taskUpdate($this);
    }

    /**
     * @param String $percentProcessed
     * @return Operation
     */
    public function setPercentProcessed($percentProcessed)
    {
        $this->percentProcessed = $percentProcessed;

        return $this;
    }

    /**
     * @param String $finishedAt
     * @return Operation
     */
    public function setFinishedAt($finishedAt = null)
    {
        $this->finishedAt = $finishedAt ?: Carbon::now();

        return $this;
    }

    /**
     * @param null $currentStage
     * @param null $percentage
     * @return Task|array|null
     */
    public function abort($currentStage = null, $percentage = null)
    {
        return $this->setStatus('failed')
            ->setCurrentStage($currentStage ?: $this->getCurrentStage())
            ->setPercentProcessed($percentage ?: $this->percentProcessed())
            ->informStatus();
    }

    /**
     * @return String
     */
    public function getCurrentStage()
    {
        return $this->currentStage;
    }

    /**
     * @param String $currentStage
     * @return Operation
     */
    public function setCurrentStage($currentStage)
    {
        $this->currentStage = $currentStage;

        return $this;
    }

    /**
     * @return mixed
     */
    function percentProcessed()
    {
        return $this->percentProcessed ?: 0;
    }

    /**
     * @param array $errors
     * @return Operation
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;

        return $this;
    }

    /**
     * @return array
     */
    function __sleep()
    {
        return array_keys(array_except(get_object_vars($this), ['job', 'task']));
    }

    /**
     * @return int
     */
    public function maxTries()
    {
        return $this->maxTries;
    }

    /**
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param int $timeout
     * @return Operation
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * @param Exception $exception
     */
    function failed(Exception $exception)
    {
        $this->addError(['error' => $exception->getMessage()])->informStatus();
    }

    /**
     * @param $name
     * @param $message
     * @return $this
     */
    function addError($name, $message)
    {
        $this->errors[$name] = $message;

        return $this;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return array_except(get_object_vars($this), ['job', 'task']);
    }

    /**
     * @return string
     */
    public function getOperationId()
    {
        return $this->operationId;
    }

    /**
     * @return $this
     */
    function setOperationId()
    {
        $this->operationId = Str::slug($this->getTask()->getTaskId() . '--' . $this->getOperationName());

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxTries()
    {
        return $this->maxTries;
    }

    /**
     * @return String|Carbon
     */
    public function getStartedAt()
    {
        return $this->startedAt;
    }

    /**
     * @return String|Carbon
     */
    public function getFinishedAt()
    {
        return $this->finishedAt;
    }

    /**
     * @return int
     */
    public function getRetries()
    {
        return $this->retries;
    }

    /**
     * @return string
     */
    function executionTime()
    {
        return $this->getStartedAt()->diffInMinutes($this->getFinishedAt());
    }
}