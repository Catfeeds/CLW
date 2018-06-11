<?php

namespace App\Providers;

use App\Models\QueryTime;
use App\Observers\QueryObservers;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Models\Bespeak;
use App\Models\ThrowIn;
use App\Observers\BespeakObservers;
use App\Observers\ThrowInObservers;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ThrowInCreated' => [
            'App\Listeners\SaveDataToCache',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        ThrowIn::observe(ThrowInObservers::class);
        Bespeak::observe(BespeakObservers::class);
    }
}
