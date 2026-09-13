<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\DeliverySetting;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@bottlemart.co.id'],
            ['name' => 'Bottlemart Admin', 'password' => Hash::make('password'), 'role' => 'admin']
        );

        $kotaLama = Store::firstOrCreate(
            ['slug' => 'kota-lama'],
            [
                'name' => 'Bottlemart Kota Lama',
                'address' => 'Jl. Letjen Suprapto, Kota Lama, Semarang',
                'latitude' => -6.9666,
                'longitude' => 110.4287,
                'phone' => '024-1234567',
                'opens_at' => '10:00:00',
                'closes_at' => '22:00:00',
                'is_active' => true,
            ]
        );

        $kedungmundu = Store::firstOrCreate(
            ['slug' => 'kedungmundu'],
            [
                'name' => 'Bottlemart Kedungmundu',
                'address' => 'Jl. Kedungmundu Raya, Semarang',
                'latitude' => -6.9889,
                'longitude' => 110.4547,
                'phone' => '024-7654321',
                'opens_at' => '10:00:00',
                'closes_at' => '22:00:00',
                'is_active' => true,
            ]
        );

        $categories = collect(['Wine', 'Whisky', 'Vodka', 'Beer', 'Sake'])->mapWithKeys(function ($name) {
            return [$name => Category::firstOrCreate(['slug' => Str::slug($name)], ['name' => $name])];
        });

        $products = [
            ['name' => 'Macallan 12 Double Cask', 'category' => 'Whisky', 'price' => 1850000, 'sku' => 'WHS-MAC12'],
            ['name' => 'Grey Goose Vodka 750ml', 'category' => 'Vodka', 'price' => 950000, 'sku' => 'VDK-GG750'],
            ['name' => 'Penfolds Bin 389', 'category' => 'Wine', 'price' => 1250000, 'sku' => 'WIN-PF389'],
            ['name' => 'Heineken 6-Pack', 'category' => 'Beer', 'price' => 150000, 'sku' => 'BER-HK6'],
            ['name' => 'Hakutsuru Junmai Sake', 'category' => 'Sake', 'price' => 420000, 'sku' => 'SAK-HTJ'],
        ];

        foreach ($products as $p) {
            $product = Product::firstOrCreate(
                ['sku' => $p['sku']],
                [
                    'category_id' => $categories[$p['category']]->id,
                    'name' => $p['name'],
                    'slug' => Str::slug($p['name']),
                    'description' => $p['name'].' - premium selection at Bottlemart.',
                    'price' => $p['price'],
                    'is_active' => true,
                ]
            );

            foreach ([$kotaLama, $kedungmundu] as $store) {
                $store->storeProducts()->firstOrCreate(
                    ['product_id' => $product->id],
                    ['stock' => random_int(5, 40)]
                );
            }
        }

        $paymentMethods = [
            ['name' => 'Transfer Bank BCA', 'type' => 'bank_transfer', 'provider' => 'bca'],
            ['name' => 'Transfer Bank Mandiri', 'type' => 'bank_transfer', 'provider' => 'mandiri'],
            ['name' => 'GoPay', 'type' => 'ewallet', 'provider' => 'gopay'],
            ['name' => 'OVO', 'type' => 'ewallet', 'provider' => 'ovo'],
            ['name' => 'DANA', 'type' => 'ewallet', 'provider' => 'dana'],
            ['name' => 'Bayar di Tempat (COD)', 'type' => 'cod', 'provider' => null],
            ['name' => 'Tunai (POS)', 'type' => 'cash', 'provider' => null],
        ];

        foreach ($paymentMethods as $pm) {
            PaymentMethod::firstOrCreate(['name' => $pm['name']], $pm);
        }

        DeliverySetting::firstOrCreate(
            ['provider' => 'maxim'],
            ['price_per_km' => 3000, 'is_active' => true]
        );
    }
}
