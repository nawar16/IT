<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\User;

class newMark implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user;
    public $message;
    
    public function __construct(User $user,$message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('std_'.$this->user->stdID());
    }

    public function broadcastAs()
    {
        return 'my-mark';
    }

}
