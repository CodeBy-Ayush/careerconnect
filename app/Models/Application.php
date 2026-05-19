<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    // Ye line add karne se mass assignment error solve ho jayega
    protected $fillable = ['user_id', 'job_id', 'resume_id', 'cover_letter', 'status', 'applied_at', 'notes'];

    protected $casts = [
        'applied_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}