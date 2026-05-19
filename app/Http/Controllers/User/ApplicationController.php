<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request, Job $job)
    {
        $user = auth()->user();

        // 1. Check if user has a resume
        if ($user->resumes()->count() == 0) {
            return back()->with('error', 'Please upload a resume in your profile before applying.');
        }

        // 2. Check if already applied
        if ($user->hasApplied($job)) {
            return back()->with('error', 'You have already applied for this position.');
        }

        // 3. Create Application
        Application::create([
            'user_id' => $user->id,
            'job_id' => $job->id,
            'resume_id' => $user->resumes()->where('is_primary', true)->first()->id ?? $user->resumes()->first()->id,
            'status' => 'pending',
            'applied_at' => now(),
        ]);

        return back()->with('success', 'Application submitted successfully!');
    }

    public function index()
    {
        $applications = auth()->user()->applications()->with('job')->latest()->get();
        return view('user.applications.index', compact('applications'));
    }
}