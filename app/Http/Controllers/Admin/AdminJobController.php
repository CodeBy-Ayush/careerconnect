<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Category;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminJobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('category')->latest()->paginate(10);
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        $categories = Category::all();
        $skills = Skill::all();
        return view('admin.jobs.create', compact('categories', 'skills'));
    }

    public function edit(Job $job) {
    $categories = Category::all();
    $skills = Skill::all();
    return view('admin.jobs.edit', compact('job', 'categories', 'skills'));
   }

   public function update(Request $request, Job $job) 
{
    $job->update($request->all());
    // Skills sync karna zaroori hai
    $job->skills()->sync($request->skills ?? []); 
    return redirect()->route('admin.jobs.index')->with('success', 'Job updated successfully!');
}

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:150',
            'company' => 'required',
            'location' => 'required',
            'job_type' => 'required',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'requirements' => 'required',
        ]);

        $job = Job::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . rand(100, 999),
            'company' => $request->company,
            'location' => $request->location,
            'job_type' => $request->job_type,
            'category_id' => $request->category_id,
            'salary_min' => $request->salary_min,
            'salary_max' => $request->salary_max,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'posted_by' => auth()->id(),
            'is_active' => true,
        ]);

        

        $job->skills()->sync($request->skills);

        $service = new \App\Services\RecommendationService();
$service->notifyMatchingUsersForJob($job);

        return redirect()->route('admin.jobs.index')->with('success', 'Job posted successfully!');
    }
}