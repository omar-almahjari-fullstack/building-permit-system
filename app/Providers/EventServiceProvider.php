<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        \App\Events\BeneficiaryAction::class => [
            \App\Listeners\WriteActivityLog::class,
        ],
    ];

    public function boot(): void
    {
        parent::boot();   // <-- لا تُحذف هذا السطر
    }
}