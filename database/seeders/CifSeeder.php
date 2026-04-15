<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Cif};

class CifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // php artisan db:seed --class=CifSeeder
    public function run(): void
    {
        Cif::create([
            'cif_name'=>'Dedy Kusworo',
            'cif_no_id'=>'1234567890',
            'cif_type_id'=>'KTP',
            'cif_email'=>'dedy@example.com',
            'cif_address'=>'Jl. Contoh No. 123',
            'created_by'=>'admin',
            'updated_by'=>'admin',
        ]);
    }
}
