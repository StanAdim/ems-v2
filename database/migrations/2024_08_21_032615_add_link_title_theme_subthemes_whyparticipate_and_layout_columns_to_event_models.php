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
            $table->string('linkTitle', 128)->after('title');
            $table->text('theme')->after('linkTitle');
            $table->json('subThemes')->after('theme');
            $table->json('whyParticipate')->after('aboutDescription')->nullable();
            $table->string('layout', 100)->after('whyParticipate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_models', function (Blueprint $table) {
            $table->dropColumn('linkTitle');
            $table->dropColumn('theme');
            $table->dropColumn('subThemes');
            $table->dropColumn('layout');
            $table->dropColumn('whyParticipate');
        });
    }
};
