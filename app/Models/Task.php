<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'is_active'];

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
}
