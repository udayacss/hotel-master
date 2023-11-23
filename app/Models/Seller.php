<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;


    public function refNo()
    {
        return $this->hasOne(Referral::class, 'id', 'my_referrel_id')->where('status', 1);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function referral()
    {
        return $this->hasOne(User::class, 'id', 'referrer_id');
    }
    
    //sponsor of me
    public function sponsor()
    {
        return $this->hasOne(Seller::class, 'id', 'my_reffer_seller_id');
    }

    public function earningsBalance()
    {
        return $this->hasMany(SellerEarning::class, 'seller_id', 'id')->where('status', SellerEarning::NOT_PAID);
    }
}
