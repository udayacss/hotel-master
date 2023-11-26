<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerEarning extends Model
{
    use HasFactory;

    protected $fillable = ['board_slot_id', 'type', 'status', 'points', 'paid_at', 'seller_id'];

    const DIRECT_SALE = 'DIRECT_SALE';

    const NOT_PAID = 0;
    const PAID = 1;

    const DIRECT_SALE_VALUE = 1000;
}
