<?php

namespace App\Policies;

use App\Models\NewfeedPost;
use App\Models\User;

class NewfeedPostPolicy
{
    public function delete(User $user, NewfeedPost $post): bool
    {
        return $user->id === $post->user_id || $user->isAdmin();
    }
}
