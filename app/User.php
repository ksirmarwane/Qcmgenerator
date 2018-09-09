<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'firstname','secondname','email', 'password','user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //teacher peut creer plusieurs groupes
    public function teachergroupes()
    {
        
       return $this->hasMany('App\Groupe');
    }


    public function studentgroupes()
    {
      //student peut joindre plusieurs groupes
        return $this->belongsToMany('App\Groupe');
    }

     //teacher peut creer plusieurs qcms
    public function qcms()
    {
       return $this->hasMany('App\Qcm');
    }
     //teacher peut creer plusieurs qcms
    public function propositions()
    {
       return $this->belongsToMany('App\Proposition');
    }

}
