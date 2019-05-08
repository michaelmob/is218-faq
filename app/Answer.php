<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Answer extends Model
{
    /*
     * Answer belongs to User.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /*
     * Answer belongs to Question.
     */
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
