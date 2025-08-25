<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Applicant extends Model
{
    protected $fillable = [
        'task_id',
        'first_name',
        'last_name',
        'email',
        'status',
        'current_stage',
        'timer_started_at',
        'due_at',
        'extended_until',
        'submitted_at',
        // portal_token is set automatically on create
    ];

    protected $casts = [
        'timer_started_at' => 'datetime',
        'due_at' => 'datetime',
        'extended_until' => 'datetime',
        'submitted_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::creating(function (self $applicant) {
            if (empty($applicant->portal_token)) {
                $applicant->portal_token = (string) Str::uuid();
            }
        });
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function submission()
    {
        return $this->hasOne(Submission::class);
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
