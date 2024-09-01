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
        Schema::create('members', function (Blueprint $table) {
            $table->id();

            $table->date('registered_on');
            $table->string('registration_number');
            $table->string('name', 512);
            $table->string('employer', 512)->nullable();
            $table->string('professional_category', 512);
            $table->string('area_of_specialization', 512)->nullable();
            $table->string('email', 512);
            $table->string('phone_number', 13);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
