<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	
    //un Question peut appartient a plusieurs qcms
    public function qcm()
    {
        return $this->belongsTo('App\Qcm');
    }
    
    //un Qcm peut avoir plusieurs questions
    public function propositions()
    {
        return $this->hasMany('App\Proposition');
    }
}
