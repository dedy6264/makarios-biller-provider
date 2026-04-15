<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // php artisan migrate --path=/database/migrations/2026_04_13_224923_add_field_in_cif_table.php
    public function up(): void
    {
        Schema::table('cifs', function (Blueprint $table) {
            $table->string('cif_phone',100)->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cif', function (Blueprint $table) {
            $table->dropColumn('cif_phone');
        });
    }
};
