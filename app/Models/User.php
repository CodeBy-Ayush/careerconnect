<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'avatar', 'bio', 
        'phone', 'location', 'linkedin_url', 'portfolio_url', 
        'is_active', 'profile_completed_at'
    ];

    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime', 'password' => 'hashed', 'is_active' => 'boolean'];

    // Relationships
    public function applications() { return $this->hasMany(Application::class); }
    public function savedJobs() { return $this->hasMany(SavedJob::class); }
    public function savedCourses() { return $this->hasMany(SavedCourse::class); }
    public function resumes() { return $this->hasMany(Resume::class); }
    public function skills() { return $this->belongsToMany(Skill::class, 'user_skills'); }
    public function interests() { return $this->belongsToMany(Interest::class, 'user_interests'); }

    // Helpers
    public function isAdmin(): bool { return $this->role === 'admin'; }
    public function profileCompleted(): bool { return !is_null($this->profile_completed_at); }
    public function hasApplied(Job $job): bool { return $this->applications()->where('job_id', $job->id)->exists(); }
    public function hasSavedJob(Job $job): bool { return $this->savedJobs()->where('job_id', $job->id)->exists(); }
    public function hasSavedCourse(Course $course): bool { return $this->savedCourses()->where('course_id', $course->id)->exists(); }
}