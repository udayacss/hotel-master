<?php

namespace App\Services;

use App\Enums\Variables;
use App\Models\SellerEarning;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;

class SellerEarningService
{
    public function getEarnings($sellerId): Collection
    {
        return SellerEarning::where('seller_id', $sellerId)
            ->where('status', SellerEarning::NOT_PAID)
            ->get();
    }
}
