<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industries = [
            ['Other'],
            ['Finance'],
            ['Wholesale and Retail'],
            ['Tourism'],
            ['Hospitality'],
            ['Manufacturing'],
            ['Agricultural'],
            ['Telecommunications'],
            ['Medical']
        ];

        foreach ($industries as $industry) {
            DB::table('industries')->insert([
                'industry' => $industry[0],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}