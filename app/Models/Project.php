<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'image', 'github_url', 'live_url', 'alumni_id',
    ];

    /**
     * Get the alumni record associated with the project.
     */
    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }

    public function scopeByAlumni(Builder $query, $alumniId)
{
    return $query->where('alumni_id', $alumniId);
}
}
