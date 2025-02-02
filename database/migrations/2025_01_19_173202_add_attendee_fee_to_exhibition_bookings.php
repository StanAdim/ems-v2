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
        Schema::table('exhibition_bookings', function (Blueprint $table) {
            $table->decimal('booth_attendee_fee', 10, 2)->default(450_000)->after('booth_size');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exhibition_bookings', function (Blueprint $table) {
            //
        });
    }
};
