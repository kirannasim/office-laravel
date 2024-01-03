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

namespace App\Events;

use App\Blueprint\Support\Tasks\Operation;
use App\Blueprint\Support\Tasks\Task;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Class Activity
 * @package App\Events
 */
class TaskBroadcaster implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var String $channelIdentifier
     */
    public $channelIdentifier = 'taskBroadcast';
    /**
     * @var Channel $channelInstance
     */
    protected $channelInstance;
    /**
     * @var int $broadcastAs
     */
    protected $broadcastAs = 'taskBroadcast';
    /**
     * @var string $broadcastType
     */
    protected $broadcastType;
    /**
     * @var Task $broadcastAs
     */
    protected $task;
    /**
     * @var Operation $currentOperation
     */
    protected $currentOperation;

    /**
     * Create a new event instance.
     *
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        $this->setTask($task)->setChannelInstance();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return $this->channelInstance;
    }

    /**
     * @return string
     */
    function broadcastAs()
    {
        return $this->broadcastAs;
    }

    /**
     * @return array
     */
    function taskUpdate()
    {
        return [
            'type' => 'taskUpdate',
            'task' => $this->getTask(),
        ];
    }

    /**
     * @return Task
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param $task
     * @return TaskBroadcaster
     */
    protected function setTask($task)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * @return array
     */
    function operationUpdate()
    {
        return [
            'type' => 'operationUpdate',
            'operation' => $this->getCurrentOperation(),
            'task' => $this->getTask(),
        ];
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return $this->{$this->getBroadcastType()}();
    }

    /**
     * @return string
     */
    public function getBroadcastType()
    {
        return $this->broadcastType;
    }

    /**
     * @param $type
     * @return TaskBroadcaster
     */
    function setBroadcastType($type)
    {
        $this->broadcastType = $type;

        return $this;
    }

    /**
     * @return Channel
     */
    public function getChannelInstance()
    {
        return $this->channelInstance;
    }

    /**
     * @return TaskBroadcaster
     */
    public function setChannelInstance()
    {
        $identifier = $this->getTask()->channelIdentifier ?: $this->channelIdentifier;
        $identifier .= loggedUser() ? '__' . loggedUser()->userType->title : '';
        $this->channelInstance = $this->getTask()->getChannel() ?: (new PrivateChannel($identifier));

        return $this;
    }

    /**
     * @return Operation
     */
    public function getCurrentOperation()
    {
        return $this->currentOperation;
    }

    /**
     * @param Operation $currentOperation
     * @return TaskBroadcaster
     */
    public function setCurrentOperation($currentOperation)
    {
        $this->currentOperation = $currentOperation;

        return $this;
    }
}