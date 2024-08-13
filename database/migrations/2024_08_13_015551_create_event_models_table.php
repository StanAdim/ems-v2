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
        Schema::create('event_models', function (Blueprint $t) {
            $t->id();

            $t->string('title', 1024);
            $t->text('bannerText')->nullable();
            $t->dateTime('startsOn');
            $t->dateTime('endsOn');
            $t->json('location')->nullable();
            $t->string('locationDescription', 1024)->nullable();
            $t->string('aboutTitle', 1024)->nullable();
            $t->longText('aboutDescription');

            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_models');
    }
};
