<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('store_id')->constrained();
            $table->foreignId('payment_method_id')->nullable()->constrained();
            $table->enum('fulfillment_type', ['pickup', 'delivery'])->default('delivery');
            $table->enum('source', ['app', 'pos'])->default('app');
            $table->enum('status', [
                'pending_confirmation',
                'confirmed',
                'preparing',
                'out_for_delivery',
                'ready_for_pickup',
                'completed',
                'cancelled',
                'expired',
            ])->default('pending_confirmation');
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('delivery_fee', 12, 2)->default(0);
            $table->decimal('distance_km', 8, 2)->nullable();
            $table->decimal('total', 12, 2)->default(0);
            $table->string('delivery_address')->nullable();
            $table->decimal('delivery_latitude', 10, 7)->nullable();
            $table->decimal('delivery_longitude', 10, 7)->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('confirm_by')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
