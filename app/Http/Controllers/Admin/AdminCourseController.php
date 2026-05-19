<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Services\RecommendationService;

class AdminCourseController extends Controller
{
    public function index() {
        $courses = Course::latest()->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    public function create() {
        $categories = Category::all();
        return view('admin.courses.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'provider' => 'required',
            'url' => 'required|url',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'description' => 'required'
        ]);

        $course = Course::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . rand(10, 99),
            'provider' => $request->provider,
            'url' => $request->url,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'is_free' => $request->price == 0,
            'level' => $request->level ?? 'beginner',
            'description' => $request->description,
            'posted_by' => auth()->id(),
        ]);

        // Notification trigger
        $service = new RecommendationService();
        $service->notifyMatchingUsersForCourse($course);

        return redirect()->route('admin.courses.index')->with('success', 'Course added & users notified!');
    }
}