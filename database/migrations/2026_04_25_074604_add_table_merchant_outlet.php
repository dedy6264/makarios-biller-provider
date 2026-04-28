<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // php artisan migrate --path=/database/migrations/2026_04_25_074604_add_table_merchant_outlet.php

    public function up(): void
    {
         Schema::table('cifs', function (Blueprint $table) {
            $table->string('cif_birthdate',100)->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
