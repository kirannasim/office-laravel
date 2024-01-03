<?php
/**
 *  -------------------------------------------------
 *  Hybrid MLM  Copyright (c) 2018 All Rights Reserved
 *  -------------------------------------------------
 *
 *  @author Acemero Technologies Pvt Ltd
 *  @link https://www.acemero.com
 *  @see https://www.hybridmlm.io
 *  @version 1.00
 *  @api Laravel 5.4
 */

namespace App\Events;

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
class AdminBroadcaster implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;

    public $context;

    protected $channelIdentifier = 'adminBroadcast';

    protected $channel;

    protected $attributes = ['data', 'context', 'channel'];

    protected $channelInstance;

    /**
     * Create a new event instance.
     *
     * @param array $attributes
     * @param Channel|null $channel
     */
    public function __construct($attributes = [], Channel $channel = null)
    {
        foreach ($this->getAttributes() as $attribute)
            $this->{$attribute} = collect($attributes)->get($attribute, $this->{$attribute});

        $identifier = $this->channelIdentifier;

        $this->channelInstance = $channel ? (new $channel($identifier)) : (new PrivateChannel($identifier));
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel($this->channel);
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }
}
