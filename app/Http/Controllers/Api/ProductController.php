<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query()->where('is_active', true)->with('category');

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->query('category_id'));
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%'.$request->query('search').'%');
        }

        if ($request->filled('store_id')) {
            $storeId = $request->query('store_id');
            $query->whereHas('stores', fn ($q) => $q->where('stores.id', $storeId))
                ->with(['stores' => fn ($q) => $q->where('stores.id', $storeId)]);

            $products = $query->get()->map(function (Product $product) {
                $pivot = $product->stores->first()?->pivot;
                $data = $product->toArray();
                unset($data['stores']);
                $data['stock'] = $pivot?->stock ?? 0;
                $data['price'] = $pivot?->price_override ?? $product->price;
                return $data;
            });

            return response()->json($products);
        }

        return response()->json($query->get());
    }

    public function show(Request $request, Product $product)
    {
        $product->load('category');

        if ($request->filled('store_id')) {
            $pivot = $product->stores()->where('stores.id', $request->query('store_id'))->first()?->pivot;
            $data = $product->toArray();
            $data['stock'] = $pivot?->stock ?? 0;
            $data['price'] = $pivot?->price_override ?? $product->price;
            return response()->json($data);
        }

        return response()->json($product);
    }
}
