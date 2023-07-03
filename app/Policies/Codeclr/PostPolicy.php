<?php

namespace App\Policies\Codeclr;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Post;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function update(User $user,Post $post):bool
    {
        if($user->role=='admin'||$post->user_id == $user->id)
        return true;
        else
        return false;
    }
    public function view(User $user,Post $post):bool
    {
        if($user->role=='admin'||$post->user_id == $user->id)
        return true;
        else
        return false;
    }
    public function delete(User $user,Post $post):bool
    {
        if($user->role=='admin'||$post->user_id == $user->id)
        return true;
        else
        return false;
    }
}
