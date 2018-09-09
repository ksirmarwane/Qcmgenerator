<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposition extends Model
{
    //un propositon peut appartient a un question
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
