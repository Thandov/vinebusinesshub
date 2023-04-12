<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('businesses')->insert([
            [
                'company_rep' => null,
                'business_name' => 'KayiseIT',
                'business_number' => '1234567890',
                'business_bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'email' => 'john.smith@acme.com',
                'provinceId' => 5,
                'districtId' => 27,
                'municipalityId' => 96,
                'town' => 'Example Town',
                'address' => '123 Main St',
                'company_reg' => 'ABC123',
                'website' => 'https://www.acme.com',
                'industryId' => 4,
                'facebook' => 'https://www.facebook.com/acme',
                'twitter' => 'https://www.twitter.com/acme',
                'instagram' => 'https://www.instagram.com/acme',
                'logo' => 'acme_logo.png',
                'marketingpic' => 'acme_marketing.png',
                'activation_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_rep' => null,
                'business_name' => 'Zamo LLC',
                'business_number' => '0987654321',
                'business_bio' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                'email' => 'Zamo.doe@widgets.com',
                'provinceId' => 1,
                'districtId' => 6,
                'municipalityId' => 7,
                'town' => 'Another Town',
                'address' => '456 Elm St',
                'company_reg' => 'DEF456',
                'website' => 'https://www.widgets.com',
                'industryId' => 8,
                'facebook' => 'https://www.facebook.com/widgets',
                'twitter' => 'https://www.twitter.com/widgets',
                'instagram' => 'https://www.instagram.com/widgets',
                'logo' => 'widgets_logo.png',
                'marketingpic' => 'widgets_marketing.png',
                'activation_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_rep' => null,
                'business_name' => 'Widgets Kagiso LLC',
                'business_number' => '0987654321',
                'business_bio' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                'email' => 'janea.doe@widgets.com',
                'provinceId' => 2,
                'districtId' => 6,
                'municipalityId' => 7,
                'town' => 'Another Town',
                'address' => '456 Elm St',
                'company_reg' => 'DEF456',
                'website' => 'https://www.widgets.com',
                'industryId' => 8,
                'facebook' => 'https://www.facebook.com/widgets',
                'twitter' => 'https://www.twitter.com/widgets',
                'instagram' => 'https://www.instagram.com/widgets',
                'logo' => 'widgets_logo.png',
                'marketingpic' => 'widgets_marketing.png',
                'activation_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_rep' => null,
                'business_name' => 'Widgets osCorp',
                'business_number' => '0987654321',
                'business_bio' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                'email' => 'janed.doe@widgets.com',
                'provinceId' => 3,
                'districtId' => 6,
                'municipalityId' => 7,
                'town' => 'Another Town',
                'address' => '456 Elm St',
                'company_reg' => 'DEF456',
                'website' => 'https://www.widgets.com',
                'industryId' => 8,
                'facebook' => 'https://www.facebook.com/widgets',
                'twitter' => 'https://www.twitter.com/widgets',
                'instagram' => 'https://www.instagram.com/widgets',
                'logo' => 'widgets_logo.png',
                'marketingpic' => 'widgets_marketing.png',
                'activation_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_rep' => null,
                'business_name' => 'Kenosi Market LLC',
                'business_number' => '0987654321',
                'business_bio' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                'email' => 'janesa.doe@widgets.com',
                'provinceId' => 4,
                'districtId' => 6,
                'municipalityId' => 7,
                'town' => 'Another Town',
                'address' => '456 Elm St',
                'company_reg' => 'DEF456',
                'website' => 'https://www.widgets.com',
                'industryId' => 8,
                'facebook' => 'https://www.facebook.com/widgets',
                'twitter' => 'https://www.twitter.com/widgets',
                'instagram' => 'https://www.instagram.com/widgets',
                'logo' => 'widgets_logo.png',
                'marketingpic' => 'widgets_marketing.png',
                'activation_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_rep' => null,
                'business_name' => 'Thapelo Doe',
                'business_number' => '0987654321',
                'business_bio' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                'email' => 'janeqd.doe@widgets.com',
                'provinceId' => 6,
                'districtId' => 6,
                'municipalityId' => 7,
                'town' => 'Another Town',
                'address' => '456 Elm St',
                'company_reg' => 'DEF456',
                'website' => 'https://www.widgets.com',
                'industryId' => 8,
                'facebook' => 'https://www.facebook.com/widgets',
                'twitter' => 'https://www.twitter.com/widgets',
                'instagram' => 'https://www.instagram.com/widgets',
                'logo' => 'widgets_logo.png',
                'marketingpic' => 'widgets_marketing.png',
                'activation_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_rep' => null,
                'business_name' => 'Rea Segodi Attorneys',
                'business_number' => '0987654321',
                'business_bio' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                'email' => 'janedqd.doe@widgets.com',
                'provinceId' => 7,
                'districtId' => 6,
                'municipalityId' => 7,
                'town' => 'Another Town',
                'address' => '456 Elm St',
                'company_reg' => 'DEF456',
                'website' => 'https://www.widgets.com',
                'industryId' => 8,
                'facebook' => 'https://www.facebook.com/widgets',
                'twitter' => 'https://www.twitter.com/widgets',
                'instagram' => 'https://www.instagram.com/widgets',
                'logo' => 'widgets_logo.png',
                'marketingpic' => 'widgets_marketing.png',
                'activation_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_rep' => null,
                'business_name' => 'Maggies 2 Min',
                'business_number' => '0987654321',
                'business_bio' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                'email' => 'janefew.doe@widgets.com',
                'provinceId' => 8,
                'districtId' => 6,
                'municipalityId' => 7,
                'town' => 'Another Town',
                'address' => '456 Elm St',
                'company_reg' => 'DEF456',
                'website' => 'https://www.widgets.com',
                'industryId' => 8,
                'facebook' => 'https://www.facebook.com/widgets',
                'twitter' => 'https://www.twitter.com/widgets',
                'instagram' => 'https://www.instagram.com/widgets',
                'logo' => 'widgets_logo.png',
                'marketingpic' => 'widgets_marketing.png',
                'activation_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_rep' => null,
                'business_name' => 'Alexa Amazon',
                'business_number' => '0987654321',
                'business_bio' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                'email' => 'janvwe.doe@widgets.com',
                'provinceId' => 9,
                'districtId' => 6,
                'municipalityId' => 7,
                'town' => 'Another Town',
                'address' => '456 Elm St',
                'company_reg' => 'DEF456',
                'website' => 'https://www.widgets.com',
                'industryId' => 8,
                'facebook' => 'https://www.facebook.com/widgets',
                'twitter' => 'https://www.twitter.com/widgets',
                'instagram' => 'https://www.instagram.com/widgets',
                'logo' => 'widgets_logo.png',
                'marketingpic' => 'widgets_marketing.png',
                'activation_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

                ]);
    }
}