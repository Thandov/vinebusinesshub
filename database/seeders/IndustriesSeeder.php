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
            'Agriculture, Forestry, Fishing, and Hunting',
            'Mining, Quarrying, and Oil and Gas Extraction',
            'Utilities',
            'Construction',
            'Manufacturing',
            'Wholesale Trade',
            'Retail Trade',
            'Transportation and Warehousing',
            'Information and Cultural Industries',
            'Finance and Insurance',
            'Real Estate and Rental and Leasing',
            'Professional, Scientific, and Technical Services',
            'Management of Companies and Enterprises',
            'Administrative and Support, Waste Management and Remediation Services',
            'Educational Services',
            'Health Care and Social Assistance',
            'Arts, Entertainment, and Recreation',
            'Accommodation and Food Services',
            'Other Services (except Public Administration)',
            'Public Administration',
            'Healthcare and Medical',
            'Technology',
            'Telecommunications',
            'Tourism and Travel',
            'Hospitality',
            'Automotive',
            'Energy',
            'Environmental',
            'Fashion and Apparel',
            'Food and Beverage',
            'Retail',
            'E-commerce',
            'Education',
            'Transport and Logistics',
            'Media and Entertainment',
            'Construction and Engineering',
            'Architecture',
            'Finance and Investments',
            'Legal Services',
            'Consulting Services',
            'Marketing and Advertising',
            'Aerospace and Defense',
            'Biotechnology and Pharmaceuticals',
            'Chemical',
            'Consumer Goods',
            'Electronics',
            'Gaming',
            'Insurance',
            'Internet',
            'Oil and Gas',
            'Renewable Energy',
            'Sports',
            'Textiles',
            'Toys',
            'Wine and Spirits',
            'Other'
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