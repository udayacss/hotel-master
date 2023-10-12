<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\BoardSlot;
use App\Models\Seller;
use App\Models\SellerSubcription;
use App\Models\User;
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

        $seller = Seller::whereId($subscription->seller_id)->first();

        $ref_user = User::whereId($seller->referrer_id)->first();

        $ref_seller = Seller::where('user_id', $ref_user->id)->first();

        $available_board = BoardSlot::join('boards', 'boards.id', 'board_slots.board_id')
            ->where('board_slots.seller_id', $ref_seller->id)
            ->where('boards.level_id', $subscription->level_id)
            ->where('boards.status', Status::BOARD_ACTIVE)
            ->first();

        $board_closed = false;

        $available_board = Board::whereId($available_board->board_id)->first();

        if (!isset($available_board->slot_two)) {
            $available_board->slot_two = $seller->id;
        } else if (!isset($available_board->slot_three)) {
            $available_board->slot_three = $seller->id;
        } else if (!isset($available_board->slot_four)) {
            $available_board->slot_four = $seller->id;
        } else if (!isset($available_board->slot_five)) {
            $available_board->slot_five = $seller->id;
        } else if (!isset($available_board->slot_six)) {
            $available_board->slot_six = $seller->id;
        } else if (!isset($available_board->slot_seven)) {
            $available_board->slot_seven = $seller->id;
        } else if (!isset($available_board->slot_eight)) {
            $available_board->slot_eight = $seller->id;
        } else if (!isset($available_board->slot_nine)) {
            $available_board->slot_nine = $seller->id;
        } else if (!isset($available_board->slot_ten)) {
            $available_board->slot_ten = $seller->id;
        } else if (!isset($available_board->slot_eleven)) {
            $available_board->slot_eleven = $seller->id;
        } else if (!isset($available_board->slot_twelve)) {
            $available_board->slot_twelve = $seller->id;
        } else if (!isset($available_board->slot_thirteen)) {
            $available_board->slot_thirteen = $seller->id;
            $board_closed = true;
        }

        $available_board->save();

        $seller->is_active = Status::SELLER_ACTIVE;
        $seller->save();

        $subscription->status = Status::SUBSCRIPTION_CHECKED;
        $subscription->save();

        BoardSlot::create([
            'board_id' => $available_board->id,
            'seller_id' => $seller->id,
            'ref_seller_id' => $ref_seller->id,
        ]);

        return response()->json(['success' => true, 'data' => $this->getPendingSubscriptions()], 200);
    }

    public function assignToBoard($referrer_id, $seller_id)
    {
        $active_board = Board::where('owner_seller_id', $seller_id)
            ->where('status', Status::BOARD_ACTIVE)
            ->first();
    }

    public function getPendingSubscriptions()
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

        return $subs;
    }
}
