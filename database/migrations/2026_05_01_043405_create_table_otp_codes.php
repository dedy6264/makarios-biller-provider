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
    // php artisan migrate --path=/database/migrations/2026_05_01_043405_create_table_otp_codes.php

        Schema::create('otp_codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('merchant_outlet_id')->nullable();
            $table->string('identifier', 255);
            $table->string('otp_code', 255);
            $table->string('otp_type', 50);
            $table->string('reference_number', 100)->nullable();
            $table->dateTime('expired_at');
            // $table->dateTime('used_at')->nullable();
            $table->string('is_used', 1)->default('N');
            $table->integer('attempt_count')->default(0);
            $table->integer('max_attempt')->default(5);
            $table->timestamps();
        });
         Schema::table('merchant_outlets', function (Blueprint $table) {
            $table->string('device_uid', 255)->nullable();//setelah migrasi isi value lalu ubah jadi unique
            $table->string('is_verified')->default("N");
            $table->string('verified_at')->nullable();
            $table->unsignedInteger('cif_id')->nullable();
            $table->foreign('cif_id')->references('id')->on('cifs');
        });
         Schema::table('transactions', function (Blueprint $table) {
            $table->string('device_uid')->default("");
        });
         Schema::table('accounts', function (Blueprint $table) {
            $table->unsignedInteger('cif_id');
            $table->foreign('cif_id')->references('id')->on('cifs');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otp_codes');
         Schema::table('merchant_outlets', function (Blueprint $table) {
            $table->dropColumn('device_uid');
            $table->dropColumn('is_verified');
            $table->dropColumn('verified_at');
            $table->dropColumn('cif_id');
            
            
        });
         Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('device_uid');
        });
         Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn('cif_id');
        });
    }
};

