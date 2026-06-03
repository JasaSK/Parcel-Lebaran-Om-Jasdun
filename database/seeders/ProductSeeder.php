<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
             [
                'name' => 'Mubarak Grandeur',
                'category_id' => 1,
                'badge' => 'Grand Series',
                'type' => 'Hampers Premium',
                'description' => 'Edisi eksklusif dengan wadah kotak beludru, kurma pilihan, dan cookies premium.',
                'price' => 1250000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
