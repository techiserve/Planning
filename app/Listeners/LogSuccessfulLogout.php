<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Logout;
use Spatie\Activitylog\Models\Activity;

class LogSuccessfulLogout
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Logout $event): void
    {
        $user = $event->user;

        // Log the logout activity
        Activity::create([
            'causer_type' => get_class($user),
            'causer_id' => $user->id,
            'log_name' => 'default',
            'description' => "User '{$user->name}' logged out",
            'user_name' => $user->name,
            'user_email' => $user->email,
        ]);
    }
}
