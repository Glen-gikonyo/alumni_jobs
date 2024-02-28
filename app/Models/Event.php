<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'location', 'start_date', 'end_date', 'alumni_id',
    ];

    /**
     * Get the alumni record associated with the event.
     */
    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }

    public function scopeDuring(Builder $query, $startDate, $endDate)
{
    return $query->whereBetween('start_date', [$startDate, $endDate])
                ->orWhereBetween('end_date', [$startDate, $endDate])
                ->orWhere(function (Builder $query) use ($startDate, $endDate) {
                    $query->whereNull('end_date')
                         ->where('start_date', '<=', $endDate);
                });
}
}
