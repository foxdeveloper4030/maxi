<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EventOrderSentPost
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $postUUID, $reference, $buyerMobile, $msg)
    {
        $this->user = $user;
        $this->postUUID = $postUUID;
        $this->reference = $reference;
        $this->buyerMobile = $buyerMobile;
        $this->msg = $msg;
    }

    public $user;
    public $field;
    public $postUUID;
    public $reference;
    public $buyerMobile;
    public $msg;

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
