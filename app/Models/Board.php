<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Board extends Model
{
    use HasFactory;

    const BOARD_ACTIVE = 1;
    const BOARD_COMPLETED = 2;

    protected $fillable = [
        'id',
        'code',
        'name',
        'owner_seller_id',
        'slot_one',
        'slot_two',
        'slot_three',
        'slot_four',
        'slot_five',
        'slot_six',
        'slot_seven',
        'slot_eight',
        'slot_nine',
        'slot_ten',
        'slot_eleven',
        'slot_twelve',
        'slot_thirteen',
    ];

    public function owner()
    {
        return $this->hasOne(Seller::class, 'id', 'owner_seller_id');
    }

    public function one()
    {
        return $this->hasOne(Seller::class, 'id', 'slot_one');
    }
    public function two()
    {
        return $this->hasOne(Seller::class, 'id', 'slot_two');
    }
    public function three()
    {
        return $this->hasOne(Seller::class, 'id', 'slot_three');
    }
    public function four()
    {
        return $this->hasOne(Seller::class, 'id', 'slot_four');
    }
    public function five()
    {
        return $this->hasOne(Seller::class, 'id', 'slot_five');
    }
    public function six()
    {
        return $this->hasOne(Seller::class, 'id', 'slot_six');
    }
    public function seven()
    {
        return $this->hasOne(Seller::class, 'id', 'slot_seven');
    }
    public function eight()
    {
        return $this->hasOne(Seller::class, 'id', 'slot_eight');
    }
    public function nine()
    {
        return $this->hasOne(Seller::class, 'id', 'slot_nine');
    }
    public function ten()
    {
        return $this->hasOne(Seller::class, 'id', 'slot_ten');
    }
    public function eleven()
    {
        return $this->hasOne(Seller::class, 'id', 'slot_eleven');
    }
    public function twelve()
    {
        return $this->hasOne(Seller::class, 'id', 'slot_twelve');
    }
    public function thirteen()
    {
        return $this->hasOne(Seller::class, 'id', 'slot_thirteen');
    }

    public function slots(): HasMany
    {
        return $this->hasMany(BoardSlot::class);
    }
}
