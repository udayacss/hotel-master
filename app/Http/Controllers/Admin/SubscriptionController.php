<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\BoardSlot;
use App\Models\Seller;
use App\Models\SellerSubcription;
use App\Models\User;
use App\Services\BoardService;
use App\Services\EncryptService;
use DB;
use Excel;
use Exception;
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
                'seller_subcriptions.bank_ref',
                'seller_subcriptions.seller_id',
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

        try {

            $subscription_id = (new EncryptService())->decryptUsingRandom($request->subscription_id);


            (new BoardService())->updateAvailableBoardAndAssign(
                subscription_id: $subscription_id
            );

            return response()->json(['success' => true, 'data' => (new BoardService())->getPendingSubscriptions()], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'data' => $e->getMessage()], 200);
        }
    }
}
