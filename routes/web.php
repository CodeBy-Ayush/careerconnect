<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, Auth\LoginController, Auth\RegisterController};
use App\Http\Controllers\User\{DashboardController, ProfileController, ResumeController, JobController, ApplicationController};
use App\Http\Controllers\Admin\{AdminDashboardController, AdminJobController, AdminCourseController, AdminUserController};

// Public Route
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{slug}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/courses', [JobController::class, 'courses'])->name('courses.index');

// Auth
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

// Authenticated User
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/resume/upload', [ResumeController::class, 'store'])->name('resume.store');
    Route::delete('/resume/{resume}', [ResumeController::class, 'destroy'])->name('resume.destroy');
    Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store'])->name('jobs.apply');
    Route::get('/my-applications', [ApplicationController::class, 'index'])->name('applications.index');
});

// Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('jobs', AdminJobController::class);
    Route::resource('courses', AdminCourseController::class);
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
});


Route::post('/notifications/{id}/read', [App\Http\Controllers\User\NotificationController::class, 'markRead'])->name('notifications.read');
Route::post('/notifications/read-all', [App\Http\Controllers\User\NotificationController::class, 'markAllRead'])->name('notifications.read-all');
