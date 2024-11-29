<?php

namespace App\Policies;

use App\Enums\ListVisibility;
use App\Models\Lists;
use App\Models\User;

class ListsPolicy
{
    public function view(User $user, Lists $list): bool
    {
        if ($list->visibility == ListVisibility::Public) {
            return true;
        }

        if ($list->visibility == ListVisibility::Private) {
            return $user->lists->contains($list);
        }

        if ($list->visibility == ListVisibility::InviteOnly) {
            return $user->lists->contains($list); // todo - sharing logic
        }
    }

    public function manage(User $user, Lists $list): bool
    {
        return $user->lists->contains($list);
    }
}
