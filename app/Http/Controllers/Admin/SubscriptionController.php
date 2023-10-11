<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\Seller;
use App\Models\SellerSubcription;
use App\Services\EncryptService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubscriptionController extends Controller
{
    public function list()
    {
        $subs = SellerSubcription::with('seller')
            ->join('sellers', 'sellers.id', 'seller_subcriptions.seller_id')
            ->where('seller_subcriptions.status', Status::SUBSCRIPTION_INACTIVE)
            ->select(
                'sellers.id',
                'sellers.first_name',
                'sellers.last_name',
                'seller_subcriptions.level_id',
                'seller_subcriptions.created_at',
                'seller_subcriptions.id as sub_id'
            )
            ->get();

        foreach ($subs as $sub) {
            $sub->sub_id = (new EncryptService())->encryptUsingRandom($sub->sub_id);
        }

        return Inertia::render('Admin/Subscription/List', compact('subs'));
    }

    public function approve(Request $request)
    {

        $rules = [
            'subscription_id' => 'required',
        ];

        $request->validate($rules);

        $subscription_id = (new EncryptService())->decryptUsingRandom($request->subscription_id);

        $subscription = SellerSubcription::where('id', $subscription_id)->first();

        $available_board = Board::where('owner_seller_id', $subscription->seller_id)
            ->where('level_id', $subscription->level_id)
            ->where('status', Status::BOARD_ACTIVE)
            ->first();

        dd($available_board);

        $this->assignToBoard($seller->referrer_id, $seller->id);
    }

    public function assignToBoard($referrer_id, $seller_id)
    {
        $active_board = Board::where('owner_seller_id', $seller_id)
            ->where('status', Status::BOARD_ACTIVE)
            ->first();
    }
}
