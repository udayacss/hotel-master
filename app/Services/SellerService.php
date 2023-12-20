<?php

namespace App\Services;

use App\Models\Seller;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SellerService
{
    public function createSeller(object $data)
    {
        dd($data);
    }

    public function getSellerAcount(): Seller
    {
        return Seller::where('user_id', Auth::user()->id)->first();
    }
}
