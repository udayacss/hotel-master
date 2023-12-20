<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerSubcription extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'seller_id', 'level_id', 'ref_no', 'status', 'achieved', 'bank_ref'];

    const SUBSCRIPTION_ACTIVE = 1;
    const PENGING_FOR_APPROVE = 0;
    const SUBSCRIPTION_ACHIEVED = 1;
    const SUBSCRIPTION_CHECKED = 1;

    public function seller()
    {
        return $this->hasOne(Seller::class, 'id', 'seller_id');
    }
}
