<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class PosOrderController extends Controller
{
    public function __construct(private OrderService $orderService) {}

    public function index(Request $request)
    {
        $query = Order::where('source', 'pos')->with('items', 'store', 'paymentMethod')->latest();

        if ($request->filled('store_id')) {
            $query->where('store_id', $request->query('store_id'));
        }

        return response()->json($query->paginate(30));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'store_id' => ['required', 'exists:stores,id'],
            'payment_method_id' => ['nullable', 'exists:payment_methods,id'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.product_id' => ['required', 'exists:products,id'],
            'items.*.quantity' => ['required', 'integer', 'min:1'],
            'notes' => ['nullable', 'string'],
        ]);

        $data['fulfillment_type'] = 'pickup';

        $order = $this->orderService->create($data, null, 'pos');

        return response()->json($order, 201);
    }
}
