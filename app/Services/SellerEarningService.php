<?php

namespace App\Services;

use App\Enums\Variables;
use Spatie\Permission\Models\Role;

class SellerEarningService
{
    public function getEarnings()
    {
        return Role::where('name', Variables::GUEST_ROLE_NAME)->first()->name;
    }
}
