<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $stores = Store::where('is_active', true)->get();

        $lat = $request->query('lat');
        $lng = $request->query('lng');

        $stores = $stores->map(function (Store $store) use ($lat, $lng) {
            $data = $store->toArray();
            $data['is_open_now'] = $store->isOpenNow();
            if ($lat !== null && $lng !== null) {
                $data['distance_km'] = $store->distanceFrom((float) $lat, (float) $lng);
            }
            return $data;
        });

        if ($lat !== null && $lng !== null) {
            $stores = $stores->sortBy('distance_km')->values();
        }

        return response()->json($stores);
    }

    public function show(Store $store)
    {
        $data = $store->toArray();
        $data['is_open_now'] = $store->isOpenNow();

        return response()->json($data);
    }
}
