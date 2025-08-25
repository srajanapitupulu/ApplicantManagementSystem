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
        'stage',
        'timer_started_at',
        'due_at',
        'extended_until',
        'submission_file',
        'submission_link',
        'submission_notes',
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

    public function getCurrentStageAttribute(): int
    {
        if ($this->submitted_at) {
            return 4; // Confirmation
        }

        if ($this->timer_started_at) {
            return 3; // Submission
        }

        if ($this->status === 'email_sent') {
            return 1; // Welcome
        }

        return 2; // Instructions
    }

    public function getTimeLeftAttribute(): ?\DateInterval
    {
        if ($this->status !== 'under_review' || !$this->due_at) {
            return null;
        }

        $now = now();
        $due = $this->due_at->copy();

        if ($this->extended_until && $this->extended_until->greaterThan($due)) {
            $due = $this->extended_until->copy();
        }

        return $now->diff($due);
    }

    public function getIsOverdueAttribute(): bool
    {
        if ($this->status !== 'under_review' || !$this->due_at) {
            return false;
        }

        $now = now();
        $due = $this->due_at->copy();

        if ($this->extended_until && $this->extended_until->greaterThan($due)) {
            $due = $this->extended_until->copy();
        }

        return $now->greaterThan($due);
    }

    public function getPortalUrlAttribute(): string
    {
        return route('applicant.portal', $this->portal_token);
    }
}
