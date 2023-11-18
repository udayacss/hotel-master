<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\BoardSlot;
use App\Models\QuotationRequirement;
use App\Models\Seller;
use Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index2()
    {
        return Inertia::render('User/Quotation/Index');
    }

    public function index()
    {
        return Inertia::render('Admin/Dashboard');
    }
    public function my()
    {
        $user  = Auth::user();
        if (!$user) {
            abort(404);
        }
        $my_seller_account = Seller::where('user_id', $user->id)->first();
            if (!$my_seller_account) {
            abort(404);
        }
        $participating_boards = BoardSlot::where('seller_id', $my_seller_account->id)->pluck('board_id')->toArray();
         if (!$participating_boards) {
            abort(404);
        }
        $boards = Board::with([
            'owner',
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
            'slots'
        ])->whereIn('id', $participating_boards)
            ->get();
        return Inertia::render('User/Dashboard',compact('boards'));
    }
    public function guest()
    {

        return Inertia::render('Seller/Subscription/Guest');
    }
}
