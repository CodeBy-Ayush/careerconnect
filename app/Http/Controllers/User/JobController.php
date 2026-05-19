<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Category;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        
        // Search & Filter Logic
        $query = Job::with('category')->where('is_active', true);

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('company', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        $jobs = $query->latest()->paginate(9);

        return view('user.jobs.index', compact('jobs', 'categories'));
    }

    public function show($slug)
    {
        $job = Job::with(['category', 'skills'])->where('slug', $slug)->firstOrFail();
        return view('user.jobs.show', compact('job'));
    }

    public function courses() {
    $courses = \App\Models\Course::with('category')->where('is_active', true)->get();
    return view('user.courses.index', compact('courses'));
}
}