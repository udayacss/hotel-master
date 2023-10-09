<?php

namespace App\Services;

use App\Models\Board;
use App\Models\Referral;
use Illuminate\Support\Facades\DB;

class BoardService
{
    public function assignToBoard($ref)
    {
        return Referral::where('ref_no', $ref)->first()->id;
    }

    public function createNewBoard($owner_id)
    {
        return Board::create([
            'code' => $this->generateBoardCode($owner_id),
            'name' => $this->generateBoardCode($owner_id),
            'owner_seller_id' => $owner_id,
            'slot_one' => $owner_id
        ]);
    }

    public function generateBoardCode($owner_id)
    {
        $key = 'HMB';
        $number = mt_rand(100, 1000); // better than rand()

        $unique = $key . $owner_id . '-' . $number;
        return $unique;
    }

    function uniqueIdExists($number, $table, $column)
    {
        return DB::table($table)->where($column, $number)->exists();
    }

    public function findReferrerBoard($rferral_id){
        
    }
}
