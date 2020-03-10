<?php

namespace App\Policies;

use App\Models\Club;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClubPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any clubs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {

    }

    /**
     * Determine whether the user can view the club.
     *
     * @param  \App\User  $user
     * @param  \App\Club  $club
     * @return mixed
     */
    public function view(User $user, Club $club)
    {

    }

    /**
     * Determine whether the user can create clubs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
           
    }

    /**
     * Determine whether the user can update the club.
     *
     * @param  \App\User  $user
     * @param  \App\Club  $club
     * @return mixed
     */
    public function update(User $user, Club $club)
    {
        return $user->id == $club->user_id;
    }

    /**
     * Determine whether the user can delete the club.
     *
     * @param  \App\User  $user
     * @param  \App\Club  $club
     * @return mixed
     */
    public function delete(User $user, Club $club)
    {
        return $user->id == $club->user_id;
    }

    /**
     * Determine whether the user can restore the club.
     *
     * @param  \App\User  $user
     * @param  \App\Club  $club
     * @return mixed
     */
    public function restore(User $user, Club $club)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the club.
     *
     * @param  \App\User  $user
     * @param  \App\Club  $club
     * @return mixed
     */
    public function forceDelete(User $user, Club $club)
    {
        //
    }
}
