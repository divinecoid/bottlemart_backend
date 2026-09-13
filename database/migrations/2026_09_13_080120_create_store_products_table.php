<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('store_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('stock')->default(0);
            $table->decimal('price_override', 12, 2)->nullable();
            $table->timestamps();
            $table->unique(['store_id', 'product_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('store_products');
    }
};
