<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title', 'slug', 'provider', 'provider_logo', 'category_id', 'level', 
        'duration_hours', 'price', 'is_free', 'url', 'thumbnail', 'description', 
        'skills_covered', 'rating', 'is_active', 'is_featured', 'posted_by'
    ];

    protected $casts = ['is_active' => 'boolean', 'is_featured' => 'boolean', 'is_free' => 'boolean'];

    // Relationships
    public function category() { return $this->belongsTo(Category::class); }
    public function postedBy() { return $this->belongsTo(User::class, 'posted_by'); }
    public function savedCourses() { return $this->hasMany(SavedCourse::class); }

    // Scopes
    public function scopeActive($query) { return $query->where('is_active', true); }
    public function scopeFree($query) { return $query->where('is_free', true); }
}