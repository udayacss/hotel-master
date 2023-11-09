<?php

namespace App\Services;

use Spatie\Permission\Models\Role;

class RoleService
{
    public function getGuestRole()
    {
        return Role::where('name', 'GUEST')->first()->name;
    }
}
