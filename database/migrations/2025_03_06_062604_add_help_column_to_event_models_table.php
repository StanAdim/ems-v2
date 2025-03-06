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
        Schema::table('event_models', function (Blueprint $table) {
            $table
                ->string('helpTitle', 2048)
                ->after('aboutDescription')
                ->nullable();

            $table
                ->longText('helpDescription')
                ->after('helpTitle')
                ->nullable();
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
