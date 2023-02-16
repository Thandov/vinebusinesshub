<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class MunicipalDistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipal_districts = [ 
            ['municipal_district' => 'Nkangala District', 'provinceId' => 5],
            ['municipal_district' => 'Gert Sibande District', 'provinceId' => 5],
            ['municipal_district' => 'Ehlanzeni District', 'provinceId' => 5],
            ['municipal_district' => 'Mangaung Metropolitan', 'provinceId' => 1],
            ['municipal_district' => 'Xhariep District', 'provinceId' => 1],
            ['municipal_district' => 'Thabo Mofutsanyana District', 'provinceId' => 1],
            ['municipal_district' => 'Lejweleputswa District', 'provinceId' => 1],
            ['municipal_district' => 'Fezile Dabi District', 'provinceId' => 1],
            ['municipal_district' => 'West Rand District', 'provinceId' => 2],
            ['municipal_district' => 'Sedibeng District', 'provinceId' => 2],
            ['municipal_district' => 'City of Ekurhuleni Metropolitan', 'provinceId' => 2],
            ['municipal_district' => 'City of Johannesburg Metropolitan', 'provinceId' => 2],
            ['municipal_district' => 'City of Tshwane Metropolitan', 'provinceId' => 2],
            ['municipal_district' => 'Zululand District', 'provinceId' => 3],
            ['municipal_district' => 'uThukela District', 'provinceId' => 3],
            ['municipal_district' => 'uMzinyathi District', 'provinceId' => 3],
            ['municipal_district' => 'uMkhanyakude District', 'provinceId' => 3],
            ['municipal_district' => 'uMgungundlovu District', 'provinceId' => 3],
            ['municipal_district' => 'Ugu District', 'provinceId' => 3],
            ['municipal_district' => 'King Cetshwayo District', 'provinceId' => 3],
            ['municipal_district' => 'iLembe District', 'provinceId' => 3],
            ['municipal_district' => 'Harry Gwala District', 'provinceId' => 3],
            ['municipal_district' => 'Amajuba District', 'provinceId' => 3],
            ['municipal_district' => 'eThekwini Metropolitan', 'provinceId' => 3],
            ['municipal_district' => 'Capricorn District', 'provinceId' => 4],
            ['municipal_district' => 'Waterberg District', 'provinceId' => 4],
            ['municipal_district' => 'Vhembe District', 'provinceId' => 4],
            ['municipal_district' => 'Sekhukhune District', 'provinceId' => 4],
            ['municipal_district' => 'Mopani District', 'provinceId' => 4],
            ['municipal_district' => 'Buffalo City Metropolitan', 'provinceId' => 9],
            ['municipal_district' => 'Nelson Mandela Bay Metropolitan', 'provinceId' => 9],
            ['municipal_district' => 'Alfred Nzo District', 'provinceId' => 9],
            ['municipal_district' => 'Amathole District', 'provinceId' => 9],
            ['municipal_district' => 'Chris Hani District', 'provinceId' => 9],
            ['municipal_district' => 'Joe Gqabi District', 'provinceId' => 9],
            ['municipal_district' => 'OR Tambo District', 'provinceId' => 9],
            ['municipal_district' => 'Sarah Baartman District', 'provinceId' => 9],
            ['municipal_district' => 'West Coast District', 'provinceId' => 8],
            ['municipal_district' => 'City of Cape Town Metropolitan', 'provinceId' => 8],
            ['municipal_district' => 'Cape Winelands District',                'provinceId' => 8,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipal_district' => 'Central Karoo District',                'provinceId' => 8,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipal_district' => 'Garden Route District',                'provinceId' => 8,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipal_district' => 'Overberg District',                'provinceId' => 8,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipal_district' => 'ZF Mgcawu District',                'provinceId' => 6,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipal_district' => 'Pixley Ka Seme District',                'provinceId' => 6,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipal_district' => 'Namakwa District',                'provinceId' => 6,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipal_district' => 'John Taolo Gaetsewe District',                'provinceId' => 6,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipal_district' => 'Frances Baard District',                'provinceId' => 6,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipal_district' => 'Bojanala Platinum District',                'provinceId' => 7,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipal_district' => 'Dr Kenneth Kaunda District',                'provinceId' => 7,                'created_at' => now(),                'updated_at' => now(),            ],
            [
                'municipal_district' => 'Dr Ruth Segomotsi Mompati District',
                'provinceId' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipal_district' => 'Ngaka Modiri Molema District',
                'provinceId' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ];

        foreach ($municipal_districts as $municipal_district) {
            \DB::table('municipal_districts')->insert([
                'municipal_district' => $municipal_district['municipal_district'],
                'provinceId' => $municipal_district['provinceId'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
