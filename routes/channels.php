<?php

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

Broadcast::channel('user.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) decodeId($userId);
});

Broadcast::channel('taskBroadcast__{userType}', function ($user, $userType) {
    /** @var \App\Eloquents\User $user */
    return $user->userType->title == $userType;
});