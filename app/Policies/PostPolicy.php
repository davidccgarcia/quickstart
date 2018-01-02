<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
    *
    */
    public function before($user)
    {
        return $user->isAdmin();
    }

    /**
    *
    */
    public function update($user, $post)
    {
        return $user->isAuthor($post);
    }
}
