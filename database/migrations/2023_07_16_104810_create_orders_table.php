<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->decimal('total_amount', 8, 2);
            $table->decimal('discount_amount', 8, 2);
            $table->decimal('paid_amount', 8, 2);
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled', 'refunded']);
            $table->text('shipping_address')->default("");
            $table->text('billing_address')->default("");
            $table->string('payment_method')->nullable();
            $table->boolean('is_paid')->default(false);

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
