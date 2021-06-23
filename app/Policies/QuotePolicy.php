<?php

namespace App\Policies;

use App\Quote;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class QuotePolicy
{
    use HandlesAuthorization;

   

    public function browse(User $user)
    {
        return true;
    }
    public function read(User $user)
    {
        return true;
    }
    public function edit(User $user)
    {
        return true;
    }
    public function add(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Quote  $quote
     * @return mixed
     */
    public function view(User $user, Quote $quote)
    {
        //
        return $user->id === $quote->user_id ?
            Response::allow()
            : Response::deny('Unauthorized Action');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Quote  $quote
     * @return mixed
     */
    public function update(User $user, Quote $quote)
    {
        //
        //
        return $user->id === $quote->user_id ?
            Response::allow()
            : Response::deny('Unauthorized Action');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Quote  $quote
     * @return mixed
     */
    public function delete(User $user, Quote $quote)
    {
        //
        //
        if (Auth::id() == 1) {
            return true;
        }
        return $user->id === $quote->user_id ?
            Response::allow()
            : Response::deny('Unauthorized Action');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Quote  $quote
     * @return mixed
     */
    public function restore(User $user, Quote $quote)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Quote  $quote
     * @return mixed
     */
    public function forceDelete(User $user, Quote $quote)
    {
        //
        return $user->id === $quote->user_id ?
            Response::allow()
            : Response::deny('Unauthorized Action');
    }
}