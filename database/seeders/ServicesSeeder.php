<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            ['Cow Feed', 6],
            ['Chicken Feed', 6],
            ['Software Sales', 7],
            ['Hardware Sales', 7],
            ['Amazon Web Services', 7],
            ['Oil removal', 6],
            ['Kitchen Chemicals', 2],
            ['Butchery', 2],
            ['Fruit & Vegitables', 2],
            ['Squeezed juice', 2],
            ['Portfolio management', 1],
            ['Capital restructuring', 1],
            ['Tax/audit consulting', 1],
            ['Treasury/debt instruments', 1],
            ['Stock market', 1],
            ['Insurance', 1],
            ['Mutual funds', 1],
            ['Wealth management', 1],
            ['Professional advisory', 1],
            ['Banking', 1],
            ['Some e-commerce businesses', 2],
            ['Direct sales catalog and mail order companies', 2],
            ['Multichannel stores', 2],
            ['Discount stores', 2],
            ['Supermarkets and Hypermarkets', 2],
            ['Department stores', 2],
            ['Drug stores', 2],
            ['Home furnishing retailers', 2],
            ['Auto retailers', 2],
            ['Convenience stores', 2],
            ['Grocery stores', 2],
            ['Specialty retailers', 2],
            ['Clothing stores', 2],
            ['Hospitality and related services', 4],
            ['Travel and distribution systems', 3],
            ['Casinos', 3],
            ['Cruise', 3],
            ['Recreation', 3],
            ['Entertainment', 3],
            ['Attractions', 3],
            ['Meetings and events', 4],
            ['Tourism', 4],
            ['Travel and transportation', 4],
            ['Food and beverage', 2],
            ['Accommodation', 4],
            ['I.T', 7],
            ['Textile clothing and footwear', 2],
            ['Metals', 5],
            ['Electronics', 7],
            ['Food processing', 5],
            ['Agricultural production', 6],
            ['Pulp and paper', 5],
            ['Chemical, petrochemical, and pharmaceutical production', 5],
            ['Petroleum refining', 5],
            ['Oil and gas exploration and production', 5],
            ['Mining', 5],
            ['Crops', 6],
            ['Horticulture', 6],
            ['Livestock', 6],
            ['Forestry', 6],
            ['Telecom equipment', 7],
            ['Telecom services', 7],
            ['Wireless communication', 7],
            ['Orthadontist', 8],
            ['Optometrist', 8],
            ['General Practitionar', 8],
            ['Dentistry', 8]

        ];

        foreach ($services as $service) {
            DB::table('services')->insert([
                'service_name' => $service[0],
                'industryId' => $service[1],
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}