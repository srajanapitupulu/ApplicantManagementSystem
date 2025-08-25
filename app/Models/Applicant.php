<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'first_name',
        'last_name',
        'email',
        'status',
        'timer_started_at',
        'due_at',
        'extended_until',
        'submitted_at',
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

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'email_sent' => 'Email Sent',
            'under_review' => 'Under Review',
            'submitted' => 'Submitted',
            default => ucfirst($this->status),
        };
    }
    public function getPortalUrlAttribute(): string
    {
        return route('applicant.portal', $this->portal_token);
    }
}
