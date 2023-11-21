<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Seller;
use Auth;
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

    public function listPreview()
    {

        $user  = Auth::user();
        if (!$user) {
            abort(403);
        }
        $my_seller_account = null;
        $boards = Board::with([
            'owner.user',
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
            'one.refNo',
            'two.refNo',
            'three.refNo',
            'four.refNo',
            'five.refNo',
            'six.refNo',
            'seven.refNo',
            'eight.refNo',
            'nine.refNo',
            'ten.refNo',
            'eleven.refNo',
            'twelve.refNo',
            'thirteen.refNo',
            'slots.seller.refNo'
        ])
            ->get();


        return Inertia::render('Admin/Board/ListPreview', compact('boards','my_seller_account'));
    }
}
