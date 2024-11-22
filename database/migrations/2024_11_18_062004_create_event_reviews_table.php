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
        Schema::create('event_reviews', function (Blueprint $table) {
            $table->id();

            $table
                ->foreignId('user_id')
                ->constrained('users');
            $table
                ->foreignId('event_model_id')
                ->constrained('event_models');
            $table->integer('rating', unsigned: true);
            $table->string('full_name', 256);
            $table->string('company_name', 256);
            $table->string('company_role', 256);
            $table->string('comment', 512);
            $table->string('status', 256);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_reviews');
    }
};
