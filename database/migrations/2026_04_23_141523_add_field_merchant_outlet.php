<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // php artisan migrate --path=/database/migrations/2026_04_23_141523_add_field_merchant_outlet.php

    public function up(): void
    {
       Schema::create('referals', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('merchant_outlet_id');
            $table->string('referal_code',100);
            $table->string('referal_parrent',100)->default('');
              $table->string('created_by',100);
            $table->string('updated_by',100);
            $table->timestamps();
            $table->foreign('merchant_outlet_id')->references('id')->on('merchant_outlets');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referals');
    }
};
