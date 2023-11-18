<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerSubcription extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'seller_id', 'level_id', 'ref_no', 'status', 'achieved'];

    public function seller()
    {
        return $this->hasOne(Seller::class, 'id', 'seller_id');
    }
}
