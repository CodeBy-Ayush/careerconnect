<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use App\Models\Application;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_jobs' => Job::count(),
            'total_users' => User::where('role', 'user')->count(),
            'total_apps' => Application::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}