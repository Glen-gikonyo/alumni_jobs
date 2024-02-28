<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'image', 'website',
    ];

    /**
     * Get the jobs associated with the employer.
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function scopeWithNameOrDescription(Builder $query, $searchTerm)
{
    return $query->where('name', 'like', "%$searchTerm%")
                ->orWhere('description', 'like', "%$searchTerm%");
}
}
