<?php

namespace App\Http\Controllers\API\Admin\Seller;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\SellerEarning;
use App\Models\SellerWithdrawal;
use App\Services\SellerEarningService;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class SellerController extends Controller
{
    public function searchSeller(Request $request)
    {
        $sellers = Seller::with('referral', 'user', 'refNo')
            ->withSum('earningsBalance', 'points')
            ->where('is_active', Status::SELLER_ACTIVE);

        if (strlen($request->keyword) > 0) {
            $sellers = $sellers->where('first_name', 'LIKE', '%' .  $request->keyword . '%')
                ->orWhere('last_name', 'LIKE', '%' .  $request->keyword . '%')
                ->orWhere('mobile_no', 'LIKE', '%' .  $request->keyword . '%')
                ->orWhereRelation('refNo', 'ref_no', 'LIKE', '%' .  $request->keyword . '%');
        }
        $sellers = $sellers->orderBy('id', 'desc')->paginate(20);

        return response()->json(['data' => $sellers]);
    }

    public function withdraw(Request $request)
    {
        try {

            DB::beginTransaction();
            $withdrawal = SellerWithdrawal::create([
                'seller_id' => $request->sellerId,
                'amount' => $request->amount,
                'paid_at' => Carbon::now(),
                'paid_by' => Auth::user()->id
            ]);
            $amount = $request->amount;
            $earnings = (new SellerEarningService())->getEarnings($request->sellerId);

            foreach ($earnings as $earning) {
                if ($amount >= $earning->points) {
                    $earning->status = SellerEarning::PAID;
                    $earning->paid_by =  $withdrawal->paid_by;
                    $earning->paid_at =  $withdrawal->paid_at;
                    $earning->save();

                    $amount -= $earning->points;
                }
            }
            DB::commit();
            return response()->json(['data' => $request->amount, 'success' => true]);
        } catch (Throwable $e) {
            DB::rollBack();
            Log::channel('withdrawals')->info('WITHDRAWAL FAILED : ' . $request->sellerId . '::' . $request->amount . ' | ' . $e->getMessage());
            return response()->json(['data' => [], 'success' => false]);
        }
    }
}
