<?php

namespace App\Http\Controllers\Seller;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\Seller;
use App\Models\SellerSubcription;
use App\Models\User;
use App\Rules\ReferralRule;
use App\Services\BoardService;
use App\Services\ReferralService;
use App\Services\RoleService;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SellerController extends Controller
{
    public function list()
    {
        $sellers = Seller::with('referral', 'user','refNo')
            ->where('is_active', Status::SELLER_ACTIVE)
            ->get();
        return Inertia::render('Admin/Seller/List', compact('sellers'));
    }

    public function create()
    {

        return Inertia::render('Admin/Seller/Add');
    }

    public function store(Request $request)
    {
        $rules = [
            'referral' => ['required', new ReferralRule()],
            'first_name' => 'required',
            'last_name' => 'required',
            // 'level_id' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
        ];

        $request->validate($rules);

        $this->saveSeller($request);
        
        return response()->json(['success' => true]);
    }
    public function storeGuest(Request $request)
    {
        $rules = [
            'referral' => ['required', new ReferralRule()],
            'first_name' => 'required',
            'last_name' => 'required',
            // 'level_id' => 'required',
            'email' => 'required',
            'bank_ref' => 'required',
            'mobile_no' => 'required',
        ];

        $request->validate($rules);

        $this->saveSeller($request);

        return response()->json(['success' => true]);
    }

    private function saveSeller(Request $request)
    {

        DB::beginTransaction();
        $user = User::create([
            'name' => $request->first_name,
            'email' => $request->email,
            'name' => $request->first_name,
            'password' => Hash::make('Abcd@1234'),
        ]);
        $user->assignRole((new RoleService)->getGuestRole());
        $referral = (new ReferralService())->createReferral($user->id);

        $seller = new Seller();
        $seller->user_id =  $user->id;
        $seller->first_name =  $request->first_name;
        $seller->last_name =  $request->last_name;
        $seller->mobile_no =  $request->mobile_no;
        $seller->my_referrel_id =  $referral->id;

        $referral = (new ReferralService())->getReferral($request->referral);
        $seller->referrer_id = $referral->user_id;
        $ref_seller = Seller::where('user_id', $referral->user_id)->first();
        $seller->my_reffer_seller_id = $ref_seller->id;
        $seller->save();

        $subscription = SellerSubcription::create([
            'code' => '123',
            'seller_id' =>  $seller->id,
            'level_id' => 1,
            // 'level_id' => $request->level_id,
            'ref_no' => $request->referral,
            'status' => Status::SUBSCRIPTION_INACTIVE
        ]);

        DB::commit();
    }
}
