<?php

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

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
///In this way we can setup witch user is going to the private channel
Broadcast::channel('std_{userId}', function ($user, $userId) {
    // $user    User model instance passed by Auth authentication
    // $userId   The userId value to which the channel rule matches
    $cuser = User::findOrFail($userId);
    return $user->stdID() == $cuser->stdID();
});
