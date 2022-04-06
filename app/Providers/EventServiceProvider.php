<?php

namespace App\Providers;

use App\Events\UserLoggedIn;
use App\Listeners\UserLoggedInHandler;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use function Illuminate\Events\queueable;

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
        /*Login::class => [
            UserLoggedInHandler::class
        ]*/
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        /*Event::listen(queueable(function (UserLoggedIn $event) {

        }));*/
    }

    public function shouldDiscoverEvents()
    {
        return true;
    }
}
