<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // php artisan migrate --path=/database/migrations/2026_04_12_131343_update_merchant_outlet_table.php

    public function up(): void
    {
        //update cif_id on merchant_outlet to nullable and add foreign key constraint
        Schema::table('merchant_outlets', function (Blueprint $table) {
            $table->unsignedInteger('cif_id')->nullable()->change();
            $table->foreign('cif_id')->references('id')->on('cifs')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        
    }
};
