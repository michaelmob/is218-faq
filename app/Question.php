<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{


    /**
     * Get User, question belongs to User.
     *
     * @var App\User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * Get User, question belongs to User.
     *
     * @var App\User
     */
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
