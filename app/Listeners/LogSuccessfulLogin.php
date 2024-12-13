<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Spatie\Activitylog\Models\Activity;

class LogSuccessfulLogin
{

    public function handle(Login $event): void
    {
        $user = $event->user;

        // Log the activity and store name and email in separate columns
        Activity::create([
            'causer_type' => get_class($user),
            'causer_id' => $user->id,
            'log_name' => 'default',
            'description' => "User '{$user->name}' logged in",
            'user_name' => $user->name,
            'user_email' => $user->email,
        ]);
    }

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }


}
