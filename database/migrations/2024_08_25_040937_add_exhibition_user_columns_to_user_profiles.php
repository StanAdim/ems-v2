<?php

use App\Enums\ProfileType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->string('company_service_category', 256)->nullable()->after('address');
            $table->string('company_registration_number', 256)->nullable()->after('company_service_category');
            $table->string('vat_number', 256)->nullable()->after('company_registration_number');
            $table->json('type')->default(json_encode([ProfileType::User, ProfileType::Exhibitor]));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->dropColumn('company_service_category');
            $table->dropColumn('company_registration_number');
            $table->dropColumn('vat_number');
            $table->dropColumn('type');
        });
    }
};
