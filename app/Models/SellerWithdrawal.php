<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerWithdrawal extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'amount',
        'paid_at',
        'paid_by'
    ];
}
