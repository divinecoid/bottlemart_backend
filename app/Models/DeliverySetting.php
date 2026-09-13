<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliverySetting extends Model
{
    protected $fillable = ['provider', 'price_per_km', 'is_active'];

    protected function casts(): array
    {
        return [
            'price_per_km' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    public static function active(): ?self
    {
        return static::where('is_active', true)->first();
    }
}
