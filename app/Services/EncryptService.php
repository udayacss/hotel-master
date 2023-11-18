<?php

namespace App\Services;

use App\Enums\Status;
use App\Enums\StatusEnum;
use App\Models\Referral;
use Illuminate\Support\Facades\DB;

class EncryptService
{

    public function encryptUsingRandom($value)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString_1 = substr(str_shuffle($characters), 0, 10);
        $randomString_2 = substr(str_shuffle($characters), 0, 10);

        // otherwise, it's valid and can be used
        return $randomString_1 . $value;
    }

    public function decryptUsingRandom($value)
    {
       return substr($value, 10);
    }
}
