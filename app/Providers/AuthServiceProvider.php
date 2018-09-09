<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Groupe' => 'App\Policies\GroupePolicy',
        'App\Qcm' => 'App\Policies\QcmPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('isAdmin', function($user){
            return $user->user_type=='admin';
        });


        $gate->define('isTeacher', function($user){
            return $user->user_type=='teacher';
        });


        $gate->define('isUser', function($user){
            return $user->user_type=='user';
        });



    }
}
