<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Admin extends Authenticatable
{
    use Notifiable, HasApiTokens;
    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile',
        'phone_number',
        'password_reset_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function notes()
    {
        return $this->hasMany(Notes::class);
    }

    public function weeklyGoals()
    {
        return $this->hasMany(WeeklyGoal::class);
    }

    public function yourDays()
    {
        return $this->hasMany(YourDay::class);
    }

    public function getProfileAttribute($profile)
    {
        return url('storage/'.$profile);
    }

}
