<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('event_bookings')->truncate();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
