<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the ' post'.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $Post
     * @return mixed
     */
    public function update(User $user, Post $Post)
    {
		return true;
    }

    /**
     * Determine whether the user can delete the ' post'.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $Post
     * @return mixed
     */
    public function delete(User $user, Post $Post)
    {
        //
    }

    /**
     * Determine whether the user can restore the ' post'.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $Post
     * @return mixed
     */
    public function restore(User $user, Post $Post)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the ' post'.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $Post
     * @return mixed
     */
    public function forceDelete(User $user, Post $Post)
    {
        //
    }
}
