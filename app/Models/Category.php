<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    // Add this relationship
    public function interests()
    {
        return $this->hasMany(Interest::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}