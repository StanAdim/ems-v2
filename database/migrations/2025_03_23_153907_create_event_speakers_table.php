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

        Schema::create('event_speakers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_model_id')
                ->nullable(false)
                ->constrained(table: 'event_models');
            $table->string('name', 512)->nullable(false);
            $table->string('position', 255)->nullable(false);
            $table->string('company', 255)->nullable(false);
            $table->string('topic', 512)->nullable(true);
            $table->boolean('is_key_speaker')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('event_speakers');
        throw new Exception('This migration cannot be rolled back.');
    }
};
