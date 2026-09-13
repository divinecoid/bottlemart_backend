<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DeliverySetting;
use App\Models\Store;
use Illuminate\Http\Request;

class DeliveryFeeController extends Controller
{
    public function calculate(Request $request)
    {
        $request->validate([
            'store_id' => ['required', 'exists:stores,id'],
            'lat' => ['required', 'numeric'],
            'lng' => ['required', 'numeric'],
        ]);

        $store = Store::findOrFail($request->store_id);
        $distanceKm = $store->distanceFrom((float) $request->lat, (float) $request->lng);

        $setting = DeliverySetting::active();
        $pricePerKm = $setting?->price_per_km ?? 3000;

        $fee = round($distanceKm * $pricePerKm);

        return response()->json([
            'distance_km' => $distanceKm,
            'price_per_km' => $pricePerKm,
            'delivery_fee' => $fee,
        ]);
    }
}
