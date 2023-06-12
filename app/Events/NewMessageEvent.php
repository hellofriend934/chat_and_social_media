<?php

namespace App\Events;

use App\Models\group;
use App\Models\message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public mixed $message;
    public mixed $group_id;
    public function __construct( $message, $group_id)
    {
        $this->message = $message;
        $this->group_id = $group_id;


    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('notification'),
        ];
    }

    public function broadcastWith()
    {
        $users = collect(json_decode(group::query()->where('id',$this->group_id)->select('users')->value('users')));
        if ($users){
            if ($users->contains(auth()->id())){
                return ['message' => $this->message, 'group_id'=>$this->group_id];
            }
        }
    }
}
