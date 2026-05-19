<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\RecommendationService; // Import service

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $recommendationService;

    // Constructor recommendation service ko load karta hai
    public function __construct(RecommendationService $service)
    {
        $this->recommendationService = $service;
    }

    public function index()
    {
        $user = auth()->user();
        
        // Match user skills with jobs and interests with courses
        $recommendedJobs = $this->recommendationService->getRecommendedJobs($user);
        $recommendedCourses = $this->recommendationService->getRecommendedCourses($user);
        
        $stats = [
            'applied_count' => $user->applications()->count(),
            'skills_count' => $user->skills()->count(),
        ];

        return view('user.dashboard', compact('user', 'recommendedJobs', 'recommendedCourses', 'stats'));
    }
}