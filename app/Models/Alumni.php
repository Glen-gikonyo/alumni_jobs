<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'graduation_year',
        'major',
        'current_job_title',
    ];

    /**
     * Get the user record associated with the alumni.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the portfolio record associated with the alumni.
     */
    public function portfolio()
    {
        return $this->hasOne(Portfolio::class);
    }

    /**
     * Get the skills associated with the alumni.
     */
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    /**
     * Get the experiences associated with the alumni.
     */
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    /**
     * Get the endorsements associated with the alumni.
     */
    public function endorsements()
    {
        return $this->hasMany(Endorsement::class);
    }

    /**
     * Get the events associated with the alumni.
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
