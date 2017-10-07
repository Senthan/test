<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EventNotification extends Event implements ShouldBroadcast
{
    use SerializesModels;
    public $userId;

    public function __construct($userId = null)
    {
        $this->userId = $userId;
    }

    
    public function broadcastOn()
    {
        if(isset($this->userId)) {
            return ['event-notification-user-'.$this->userId];
        }
        return ['event-notification'];

    }

    public function broadcastAs()
    {
        return 'event';
    }
}
