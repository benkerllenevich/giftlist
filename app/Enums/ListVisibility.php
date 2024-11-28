<?php

namespace App\Enums;

enum ListVisibility : string
{
    case Public = 'public';
    case InviteOnly = 'invite-only';
    case Private = 'private';

    public function name() : string
    {
        return match ($this) {
            ListVisibility::Public => __('Public'),
            ListVisibility::InviteOnly => __('Invite Only'),
            ListVisibility::Private => __('Private'),
        };
    }
}
