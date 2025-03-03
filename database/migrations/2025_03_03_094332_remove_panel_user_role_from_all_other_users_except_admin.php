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
        $panelUserRole = DB::table('roles')
            ->select('id')
            ->where('name', '=', 'panel_user')
            ->first();

        if ($panelUserRole) {
            DB::table(table: 'model_has_roles')
                ->where('role_id', '=', $panelUserRole->id)
                ->delete();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('all_other_users_except_admin', function (Blueprint $table) {
            //
        });
    }
};
