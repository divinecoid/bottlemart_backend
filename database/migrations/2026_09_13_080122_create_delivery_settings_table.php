<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('delivery_settings', function (Blueprint $table) {
            $table->id();
            $table->string('provider')->default('maxim');
            $table->decimal('price_per_km', 10, 2)->default(3000);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('delivery_settings');
    }
};
