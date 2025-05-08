<?php

namespace App\Providers;

use Illuminate\Auth\Events\Authenticated;
use App\Listeners\CheckDeviceAfterLogin;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Authenticated::class => [
            CheckDeviceAfterLogin::class,
        ],
    ];

    public function shouldDiscoverEvents(): bool
    {
        return false; // ✅ Tắt auto-discovery ở đây
    }
}
