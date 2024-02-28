<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'location',
        'salary',
        'employer_id',
        'alumni_id',
    ];

    /**
     * Get the employer record associated with the job.
     */
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    /**
     * Get the alumni record associated with the job.
     */
    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }

    public function scopeByEmployer(Builder $query, $employerId)
    {
        return $query->where('employer_id', $employerId);
    }

    public function scopeByAlumni(Builder $query, $alumniId)
    {
        return $query->where('alumni_id', $alumniId);
    }
}
