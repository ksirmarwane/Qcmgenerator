<?php

namespace App\Policies;

use App\User;
use App\Qcm;
use Illuminate\Auth\Access\HandlesAuthorization;

class QcmPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the qcm.
     *
     * @param  \App\User  $user
     * @param  \App\Qcm  $qcm
     * @return mixed
     */
    public function view(User $user, Qcm $qcm)
    {
        //
    }

    /**
     * Determine whether the user can create qcms.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the qcm.
     *
     * @param  \App\User  $user
     * @param  \App\Qcm  $qcm
     * @return mixed
     */
    public function update(User $user, Qcm $qcm)
    {
        return $user->id === $qcm->user_id;
    }

    /**
     * Determine whether the user can delete the qcm.
     *
     * @param  \App\User  $user
     * @param  \App\Qcm  $qcm
     * @return mixed
     */
    public function delete(User $user, Qcm $qcm)
    {
        //
    }

    /**
     * Determine whether the user can restore the qcm.
     *
     * @param  \App\User  $user
     * @param  \App\Qcm  $qcm
     * @return mixed
     */
    public function restore(User $user, Qcm $qcm)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the qcm.
     *
     * @param  \App\User  $user
     * @param  \App\Qcm  $qcm
     * @return mixed
     */
    public function forceDelete(User $user, Qcm $qcm)
    {
        //
    }
}
