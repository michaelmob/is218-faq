<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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


    /**
     * Get User Profile.
     *
     * @var App\Profile
     */
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }


    /**
     * Get Questions user created
     *
     * @var array
     */
    public function questions()
    {
        return $this->hasOne('App\Question');
    }


    /**
     * Get Answers user created
     *
     * @var array
     */
    public function answers()
    {
        return $this->hasOne('App\Answer');
    }
}
