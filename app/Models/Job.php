<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title', 'slug', 'company', 'company_logo', 'location', 'job_type', 
        'category_id', 'salary_min', 'salary_max', 'salary_currency', 
        'description', 'requirements', 'responsibilities', 'experience_required', 
        'deadline', 'is_active', 'is_featured', 'posted_by', 'views_count'
    ];

    protected $casts = ['deadline' => 'date', 'is_active' => 'boolean', 'is_featured' => 'boolean'];

    // Relationships
    public function category() { return $this->belongsTo(Category::class); }
    public function postedBy() { return $this->belongsTo(User::class, 'posted_by'); }
    public function applications() { return $this->hasMany(Application::class); }
    public function savedJobs() { return $this->hasMany(SavedJob::class); }
    public function skills() { return $this->belongsToMany(Skill::class, 'job_skills'); }

    // Scopes
    public function scopeActive($query) { return $query->where('is_active', true); }
    public function scopeFeatured($query) { return $query->where('is_featured', true); }
}