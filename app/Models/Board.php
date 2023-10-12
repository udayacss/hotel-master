<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Board extends Model
{
    use HasFactory;

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

    public function one()
    {
        return $this->hasOne(BoardSlot::class, 'seller_id', 'slot_one')->where('board_id', $this->id);
    }
    public function two()
    {
        return $this->hasOne(BoardSlot::class, 'seller_id', 'slot_two')->where('board_id', $this->id);
    }
    public function three()
    {
        return $this->hasOne(BoardSlot::class, 'seller_id', 'slot_three')->where('board_id', $this->id);
    }
    public function four()
    {
        return $this->hasOne(BoardSlot::class, 'seller_id', 'slot_four')->where('board_id', $this->id);
    }
    public function five()
    {
        return $this->hasOne(BoardSlot::class, 'seller_id', 'slot_five')->where('board_id', $this->id);
    }
    public function six()
    {
        return $this->hasOne(BoardSlot::class, 'seller_id', 'slot_six')->where('board_id', $this->id);
    }
    public function seven()
    {
        return $this->hasOne(BoardSlot::class, 'seller_id', 'slot_seven')->where('board_id', $this->id);
    }
    public function eight()
    {
        return $this->hasOne(BoardSlot::class, 'seller_id', 'slot_eight')->where('board_id', $this->id);
    }
    public function nine()
    {
        return $this->hasOne(BoardSlot::class, 'seller_id', 'slot_nine')->where('board_id', $this->id);
    }
    public function ten()
    {
        return $this->hasOne(BoardSlot::class, 'seller_id', 'slot_ten')->where('board_id', $this->id);
    }
    public function eleven()
    {
        return $this->hasOne(BoardSlot::class, 'seller_id', 'slot_eleven')->where('board_id', $this->id);
    }
    public function twelve()
    {
        return $this->hasOne(BoardSlot::class, 'seller_id', 'slot_twelve')->where('board_id', $this->id);
    }
    public function thirteen()
    {
        return $this->hasOne(BoardSlot::class, 'seller_id', 'slot_thirteen')->where('board_id', $this->id);
    }
}
