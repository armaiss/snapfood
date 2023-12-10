<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

        return true;
    }

    public function delete(User $user)
    {

        return $user->hasRole('admin');
    }

    public function approve(User $user)
    {

        return $user->hasRole('Shop_manager');
    }
    public function answer(User $user)
    {

        return $user->hasRole('Shop_manager');
    }
}
