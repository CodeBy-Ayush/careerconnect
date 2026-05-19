<?php

namespace App\Observers;

use App\Models\Job;
use App\Services\RecommendationService;

class JobObserver
{
    public function created(Job $job): void
    {
        if ($job->is_active) {
            $service = new RecommendationService();
            $service->notifyMatchingUsersForJob($job);
        }
    }
}