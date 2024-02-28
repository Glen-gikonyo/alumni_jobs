<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'alumni_id',
    ];

    /**
     * Get the alumni record associated with the skill.
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
