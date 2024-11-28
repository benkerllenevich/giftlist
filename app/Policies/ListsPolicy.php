<?php

namespace App\Policies;

use App\Models\Lists;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ListsPolicy
{
    public function view(User $user, Lists $list): bool
    {
        return $user->lists->contains($list);
    }

    public function update(User $user, Lists $list): bool
    {
        return $user->lists->contains($list);
    }

    public function delete(User $user, Lists $list): bool
    {
        return $user->lists->contains($list);
    }
}
