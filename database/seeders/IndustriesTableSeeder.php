<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;


class IndustriesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('industries')->insert([
            [
                'industry' => 'Finance',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'industry' => 'Wholesale and Retail',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'industry' => 'Tourism',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'industry' => 'Hospitality',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'industry' => 'Manufacturing',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'industry' => 'Agricultural',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'industry' => 'Telecommunications',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'industry' => 'Medical',
                'created_at' => now(),
                'updated_at' => now()
            ]
            
            
        ]);
    }
}
