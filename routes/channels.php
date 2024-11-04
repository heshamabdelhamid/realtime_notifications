<?php

use App\Broadcasting\AdminJoinRoom;
use App\Broadcasting\NewUserCannel;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });


// PRIVATE CHANNEL AUTHORIZATION
Broadcast::channel('new-user-channel', NewUserCannel::class, ['guards' => ['admin']]);


// PRESENCE CHANNEL AUTHORIZATION
Broadcast::channel('admin_room_channel', AdminJoinRoom::class, ['guards' => ['admin']]);
