<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewUserRegisteredEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    /**
     * Create a new event instance.
     */
    public function __construct(public User $user)
    {
        $this->message = "New User Registered called {$user->name}";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('new-user-channel'), // public channel

            // new PresenceChannel('admin_room_channel'), //presence channel
            // new PrivateChannel('channel-name'), //private channel
        ];
    }

    public function broadcastAs(): string
    {
        return 'new_user_register';
    }


    // This method should return the array of data that you wish to broadcast as the event payload:
    public function broadcastWith(): array
    {
        return ['name' => $this->user->name];
    }

    // public function broadcastWhen(): bool
    // {
    //     return $this->user->id == 1;
    // }
}
