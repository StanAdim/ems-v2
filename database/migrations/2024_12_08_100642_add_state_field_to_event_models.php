<?php

use App\Enums\EventState;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('event_models', function (Blueprint $table) {
            $table->string('state')->default(EventState::Created);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_models', function (Blueprint $table) {
            //
        });
    }
};
