<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
	//un groupe peut etre creer par un et un seul prof
    public function user()
    {
	   return $this->belongsTo('App\User');
    }

    //un groupe peut avoir plusieurs etudiants
    public function users()
    {
    	return $this->belongsToMany('App\User');
    }



    //un groupe peut avoir plusieurs qcms
    public function qcms()
    {
        return $this->belongsToMany('App\Qcm');
    }
}
