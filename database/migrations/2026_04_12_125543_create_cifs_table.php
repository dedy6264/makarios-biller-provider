<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // php artisan migrate --path=/database/migrations/2026_04_12_125543_create_cifs_table.php
    // php artisan db:seed --class=CifSeeder
    // php artisan migrate --path=/database/migrations/2026_04_12_131343_update_merchant_outlet_table.php
    // php artisan migrate --path=/database/migrations/2026_04_13_224923_add_field_in_cif_table.php

    public function up(): void
    {
        Schema::create('cifs', function (Blueprint $table) {
            $table->id();
            $table->string('cif_name',100);
            $table->string('cif_no_id',100);
            $table->string('cif_type_id',10);
            $table->string('cif_email',100)->unique();
            $table->string('cif_address',255);
            $table->string('created_by',100);
            $table->string('updated_by',100);
            $table->timestamps();
        });
        Schema::table('saving_accounts', function (Blueprint $table) {
            $table->string('account_pin',255)->default('');
        });
        Schema::table('merchant_outlets', function (Blueprint $table) {
            $table->unsignedInteger('cif_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cifs');
        Schema::table('saving_accounts', function (Blueprint $table) {
            $table->dropColumn('account_pin');
        });
        Schema::table('merchant_outlets', function (Blueprint $table) {
            $table->dropColumn('cif_id');
        });
    }
};
