<?php

namespace App\Services;

use App\Models\DeliverySetting;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\StoreProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class OrderService
{
    /**
     * @param  array{store_id:int,payment_method_id:?int,fulfillment_type:string,items:array,delivery_address:?string,delivery_latitude:?float,delivery_longitude:?float,notes:?string}  $data
     */
    public function create(array $data, ?int $userId, string $source = 'app'): Order
    {
        return DB::transaction(function () use ($data, $userId, $source) {
            $store = Store::findOrFail($data['store_id']);

            $subtotal = 0;
            $itemsToCreate = [];

            foreach ($data['items'] as $line) {
                $product = Product::findOrFail($line['product_id']);
                $qty = (int) $line['quantity'];

                $storeProduct = StoreProduct::where('store_id', $store->id)
                    ->where('product_id', $product->id)
                    ->lockForUpdate()
                    ->first();

                if (! $storeProduct || $storeProduct->stock < $qty) {
                    throw ValidationException::withMessages([
                        'items' => "Stok {$product->name} di outlet {$store->name} tidak cukup.",
                    ]);
                }

                $price = $storeProduct->price_override ?? $product->price;
                $lineSubtotal = $price * $qty;
                $subtotal += $lineSubtotal;

                $storeProduct->decrement('stock', $qty);

                $itemsToCreate[] = [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'quantity' => $qty,
                    'price' => $price,
                    'subtotal' => $lineSubtotal,
                ];
            }

            $deliveryFee = 0;
            $distanceKm = null;
            $fulfillmentType = $data['fulfillment_type'] ?? 'delivery';

            if ($fulfillmentType === 'delivery') {
                $lat = $data['delivery_latitude'] ?? null;
                $lng = $data['delivery_longitude'] ?? null;
                if ($lat !== null && $lng !== null) {
                    $distanceKm = $store->distanceFrom((float) $lat, (float) $lng);
                    $pricePerKm = DeliverySetting::active()?->price_per_km ?? 3000;
                    $deliveryFee = round($distanceKm * $pricePerKm);
                }
            }

            $isOpen = $source === 'pos' ? true : $store->isOpenNow();

            $order = Order::create([
                'order_number' => 'BM-'.now()->format('ymd').'-'.strtoupper(substr(uniqid(), -6)),
                'user_id' => $userId,
                'store_id' => $store->id,
                'payment_method_id' => $data['payment_method_id'] ?? null,
                'fulfillment_type' => $fulfillmentType,
                'source' => $source,
                'status' => $source === 'pos' ? 'completed' : 'pending_confirmation',
                'subtotal' => $subtotal,
                'delivery_fee' => $deliveryFee,
                'distance_km' => $distanceKm,
                'total' => $subtotal + $deliveryFee,
                'delivery_address' => $data['delivery_address'] ?? null,
                'delivery_latitude' => $data['delivery_latitude'] ?? null,
                'delivery_longitude' => $data['delivery_longitude'] ?? null,
                'notes' => $data['notes'] ?? null,
                'confirm_by' => $isOpen ? null : now()->addMinutes(15),
            ]);

            foreach ($itemsToCreate as $item) {
                $order->items()->create($item);
            }

            return $order->load('items', 'store', 'paymentMethod');
        });
    }
}
