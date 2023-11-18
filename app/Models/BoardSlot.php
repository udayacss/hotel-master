<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardSlot extends Model
{
    use HasFactory;

    protected $fillable = ['seller_id', 'board_id', 'ref_seller_id'];
}
