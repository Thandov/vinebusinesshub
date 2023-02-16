<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('industries')->insert([
            [
                'industry' => 'Finance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'industry' => 'Wholesale and Retail',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'industry' => 'Tourism',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'industry' => 'Hospitality',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'industry' => 'Manufacturing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'industry' => 'Agricultural',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'industry' => 'Telecommunications',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'industry' => 'Medical',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
