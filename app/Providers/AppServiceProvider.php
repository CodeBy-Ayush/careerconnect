<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Job;
use App\Observers\JobObserver;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Job::observe(JobObserver::class); not using
    }
}
