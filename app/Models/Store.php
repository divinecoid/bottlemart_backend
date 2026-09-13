<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Store extends Model
{
    protected $fillable = [
        'name', 'slug', 'address', 'latitude', 'longitude',
        'phone', 'opens_at', 'closes_at', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
            'is_active' => 'boolean',
        ];
    }

    public function storeProducts(): HasMany
    {
        return $this->hasMany(StoreProduct::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'store_products')
            ->withPivot(['stock', 'price_override'])
            ->withTimestamps();
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function isOpenNow(): bool
    {
        $now = now()->format('H:i:s');
        return $this->is_active && $now >= $this->opens_at && $now <= $this->closes_at;
    }

    public function distanceFrom(float $lat, float $lng): float
    {
        $earthRadius = 6371;
        $dLat = deg2rad($this->latitude - $lat);
        $dLng = deg2rad($this->longitude - $lng);
        $a = sin($dLat / 2) ** 2 + cos(deg2rad($lat)) * cos(deg2rad($this->latitude)) * sin($dLng / 2) ** 2;
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return round($earthRadius * $c, 2);
    }
}
