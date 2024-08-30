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
        Schema::create('event_conversations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_model_id')
                ->nullable(false)
                ->constrained(table: 'event_models');
            $table->foreignId('user_id')
                ->nullable(false)
                ->constrained(table: 'users');
            $table->foreignId('parent_conversation_id')
                ->nullable()
                ->constrained(table: 'event_conversations');
            $table->mediumText('message')->fulltext();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_conversations');
    }
};
