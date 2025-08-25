<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = ['applicant_id', 'repo_url', 'file_path', 'comments'];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
