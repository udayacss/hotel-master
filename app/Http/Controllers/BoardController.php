<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BoardController extends Controller
{
    public function list()
    {
         $boards = Board::with([
            'one.referral',
            'two.referral',
            'three.referral',
            'four.referral',
            'five.referral',
            'six.referral',
            'seven.referral',
            'eight.referral',
            'nine.referral',
            'ten.referral',
            'eleven.referral',
            'twelve.referral',
            'thirteen.referral',
        ])
            ->get();
        return Inertia::render('Admin/Board/List', compact('boards'));
    }
}
