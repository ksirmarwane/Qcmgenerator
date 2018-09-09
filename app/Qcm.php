<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qcm extends Model
{
    //un qcm peut etre creer par un et un seul prof
    public function user()
    {
	   return $this->belongsTo('App\User');
    }

    //un Qcm peut appartient a plusieurs groupes
    public function groupes()
    {
        return $this->belongsToMany('App\Groupe');
    }

    //un Qcm peut avoir plusieurs questions
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
   
}
