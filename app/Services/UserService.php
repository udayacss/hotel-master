<?php

namespace App\Services;


use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function changePassword(object $data)
    {
        dd($data);
    }

    public function getUserRole(): int
    {
        return Auth::user()->role;
    }
}
