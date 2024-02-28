<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endorsement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'alumni_id',
        'endorsed_alumni_id',
        'endorsement',
    ];

    /**
     * Get the alumni record associated with the endorsement.
     */
    public function endorser()
    {
        return $this->belongsTo(Alumni::class, 'alumni_id');
    }

    /**
     * Get the alumni record associated with the endorsed alumni.
     */
    public function endorsedAlumni()
    {
        return $this->belongsTo(Alumni::class, 'endorsed_alumni_id');
    }

    public function scopeByEndorser(Builder $query, $endorserId)
    {
        return $query->where('alumni_id', $endorserId);
    }

    public function scopeByEndorsedAlumni(Builder $query, $endorsedAlumniId)
    {
        return $query->where('endorsed_alumni_id', $endorsedAlumniId);
    }
}
