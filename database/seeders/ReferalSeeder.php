<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Referal};

class ReferalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    // php artisan db:seed --class=ReferalSeeder

         Referal::create([
            'merchant_outlet_id'=>14,
            'referal_code'=>'12345',
            'referal_parrent'=>'',
            'created_by'=>'sys',
            'created_at'=>now(),
            'updated_by'=>'sys',
            'updated_at'=>now(),
        ]);
    }
}
