<?php

namespace App\Services;

use App\Enums\Status;
use App\Enums\StatusEnum;
use App\Models\Referral;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReferralService
{
    public function getReferral($ref)
    {
        return Referral::where('ref_no', $ref)->first();
    }

    public function createReferral($user_id)
    {

        return Referral::create([
            'user_id' => $user_id,
            'ref_no' => $this->generateReferral(),
            'status' => Status::REFERRAL_ACTIVE
        ]);
    }

    public function generateReferral()
    {
        $key = 'HMLK';
        $number = mt_rand(1000000000, 2000000000); // better than rand()

        $unique = $key  . $number;

        // call the same function if the unique id exists already
        if ($this->uniqueIdExists($unique, 'referrals', 'ref_no')) {
            return $this->generateReferral();
        }

        // otherwise, it's valid and can be used
        return $unique;
    }

    function uniqueIdExists($number, $table, $column)
    {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return DB::table($table)->where($column, $number)->exists();
    }
}
