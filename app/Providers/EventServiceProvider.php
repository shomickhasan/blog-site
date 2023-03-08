<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\PostCreatedEvent;
use App\Events\NewPostEventAllUserNotify;
use App\Listeners\PostApproveAdminLitsener;
use App\Listeners\NewPostEventUserLitsener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        
        PostCreatedEvent::class=>[PostApproveAdminLitsener::class],
        NewPostEventAllUserNotify::class=>[NewPostEventUserLitsener::class],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
