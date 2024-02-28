<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'alumni_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['alumni'];

    /**
     * Get the alumni record associated with the user.
     */
    public function alumni()
    {
        return $this->hasOne(Alumni::class);
    }

    /**
     * Get the role name of the user.
     */
    public function getRoleNameAttribute()
    {
        return $this->role == 'A' ? 'Alumni' : 'Employer';
    }
}
