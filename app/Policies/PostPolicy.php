<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use App\Models\KhcModel;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    public function view(User $user, Post $post)
    {
        return $user->id == $post->user_id;
    }
 
}
