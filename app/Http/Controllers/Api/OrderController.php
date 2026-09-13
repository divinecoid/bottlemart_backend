<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(private OrderService $orderService) {}

    public function index(Request $request)
    {
        return response()->json(
            $request->user()->orders()->with('items', 'store', 'paymentMethod')->latest()->get()
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'store_id' => ['required', 'exists:stores,id'],
            'payment_method_id' => ['nullable', 'exists:payment_methods,id'],
            'fulfillment_type' => ['required', 'in:pickup,delivery'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.product_id' => ['required', 'exists:products,id'],
            'items.*.quantity' => ['required', 'integer', 'min:1'],
            'delivery_address' => ['nullable', 'string'],
            'delivery_latitude' => ['nullable', 'numeric'],
            'delivery_longitude' => ['nullable', 'numeric'],
            'notes' => ['nullable', 'string'],
        ]);

        $order = $this->orderService->create($data, $request->user()->id, 'app');

        return response()->json($order, 201);
    }

    public function show(Request $request, Order $order)
    {
        abort_unless($order->user_id === $request->user()->id, 403);

        return response()->json($order->load('items', 'store', 'paymentMethod'));
    }
}
