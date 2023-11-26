<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SellerSubcription;
use Illuminate\Http\Request;
use Response;

class GeneralSettingsController extends Controller
{
    function getNavData()
    {
        $notifications = SellerSubcription::where('status', SellerSubcription::PENGING_FOR_APPROVE)->count('id');
        $data = [
            'sellerSubscriptions' => $notifications
        ];
        return response()->json(['data' => $data]);
    }
}
