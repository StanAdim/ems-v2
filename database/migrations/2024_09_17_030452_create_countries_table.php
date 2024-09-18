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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();

            $table->string('num_code')
                ->nullable(false)->unique();
            $table->string('alpha_2_code')
                ->nullable(false)->unique();
            $table->string('alpha_3_code')
                ->nullable(false)->unique()->index();
            $table->string('en_short_name', 512)
                ->nullable(false)->unique()->index();
            $table->string('nationality', 512)
                ->nullable(false)->unique()->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
