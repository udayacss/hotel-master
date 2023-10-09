<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
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
        'slot_nine'
    ];
}
