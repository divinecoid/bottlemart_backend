<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class AdminStoreController extends Controller
{
    public function index()
    {
        return response()->json(Store::all());
    }

    public function update(Request $request, Store $store)
    {
        $data = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'address' => ['sometimes', 'string'],
            'latitude' => ['sometimes', 'numeric'],
            'longitude' => ['sometimes', 'numeric'],
            'phone' => ['nullable', 'string'],
            'opens_at' => ['sometimes', 'date_format:H:i'],
            'closes_at' => ['sometimes', 'date_format:H:i'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        $store->update($data);

        return response()->json($store);
    }

    public function updateStock(Request $request, Store $store)
    {
        $data = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'stock' => ['required', 'integer', 'min:0'],
            'price_override' => ['nullable', 'numeric', 'min:0'],
        ]);

        $storeProduct = $store->storeProducts()->updateOrCreate(
            ['product_id' => $data['product_id']],
            ['stock' => $data['stock'], 'price_override' => $data['price_override'] ?? null]
        );

        return response()->json($storeProduct);
    }
}
