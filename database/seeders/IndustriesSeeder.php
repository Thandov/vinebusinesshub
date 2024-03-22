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
    "Agriculture and Food Production",
    "Artificial Intelligence and Data Analytics",
    "Creative Industries",
    "Education",
    "Energy",
    "Environmental Services",
    "Finance",
    "Government Services",
    "Healthcare",
    "Hospitality and Tourism",
    "Manufacturing",
    "Media and Entertainment",
    "Nonprofit and Social Services",
    "Professional Services",
    "Real Estate",
    "Retail",
    "Technology",
    "Telecommunications",
    "Transportation and Logistics",
    "Biotechnology and Life Sciences",
    "Other"
];


        foreach ($industries as $industry) {
            DB::table('industries')->insert([
                'industry' => $industry,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}