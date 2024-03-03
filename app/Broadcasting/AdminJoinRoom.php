<?php

namespace App\Broadcasting;

use App\Models\Admin;

class AdminJoinRoom
{
    /**
     * Create a new channel instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the Admin's access to the channel.
     */
    public function join(Admin $admin): array|bool
    {
        return ['name' => $admin->name];
    }
}
