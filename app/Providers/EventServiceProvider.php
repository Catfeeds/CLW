<?php

namespace App\Providers;

use App\Models\WorkOrder;
use App\Observers\WorkOrderObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
         WorkOrder::observe(WorkOrderObserver::class); //模型监听
    }
}
