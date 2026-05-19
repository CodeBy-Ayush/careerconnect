<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_skills');
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_skills');
    }
}