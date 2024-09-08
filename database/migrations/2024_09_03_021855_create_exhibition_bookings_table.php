<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exhibition_bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_model_id')->constrained();
            $table->string('order_number', 128);
            $table->string('booth_name', 128);
            $table->string('booth_size', 128);
            $table->unsignedDecimal('total', 10, 2);
            $table->foreignId('payment_order_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exhibition_bookings');
    }
};
