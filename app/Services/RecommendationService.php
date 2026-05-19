<?php

namespace App\Services;

use App\Models\Job;
use App\Models\Course;
use App\Models\User;
use App\Notifications\JobMatchNotification;
use Illuminate\Support\Facades\Log;

class RecommendationService
{
    public function getRecommendedJobs(User $user, $limit = 6)
    {
        $userSkillIds = $user->skills->pluck('id');
        $userInterestCategoryIds = $user->interests->pluck('category_id')->unique();

        return Job::with(['category', 'skills'])
            ->where('is_active', true)
            ->where(function ($query) use ($userSkillIds, $userInterestCategoryIds) {
                $query->whereHas('skills', function ($q) use ($userSkillIds) {
                    $q->whereIn('skills.id', $userSkillIds);
                })
                ->orWhereIn('category_id', $userInterestCategoryIds);
            })
            ->latest()
            ->take($limit)
            ->get();
    }

    public function getRecommendedCourses(User $user, $limit = 4)
    {
        $userInterestCategoryIds = $user->interests->pluck('category_id')->unique();

        return Course::where('is_active', true)
            ->whereIn('category_id', $userInterestCategoryIds)
            ->latest()
            ->take($limit)
            ->get();
    }

    public function notifyMatchingUsersForJob(Job $job)
    {
        $jobSkillIds = $job->skills->pluck('id');
        $categoryId = $job->category_id;

        $matchedUsers = User::where('role', 'user')
            ->where(function ($query) use ($jobSkillIds, $categoryId) {
                $query->whereHas('skills', function ($q) use ($jobSkillIds) {
                    $q->whereIn('skills.id', $jobSkillIds);
                })
                ->orWhereHas('interests', function ($q) use ($categoryId) {
                    $q->where('interests.category_id', $categoryId);
                });
            })
            ->get();

        Log::info("Matching Users Found: " . $matchedUsers->count());

        foreach ($matchedUsers as $user) {
            $user->notify(new JobMatchNotification($job));
        }
    }

    public function notifyMatchingUsersForCourse($course)
{
    $categoryId = $course->category_id;

    $matchedUsers = \App\Models\User::whereHas('interests', function ($q) use ($categoryId) {
        $q->where('category_id', $categoryId);
    })->get();

    foreach ($matchedUsers as $user) {
        $user->notify(new \App\Notifications\CourseMatchNotification($course));
    }
}
}