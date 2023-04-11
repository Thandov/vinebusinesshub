<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipalDistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipalDistricts = [
            ['Nkangala District', 5],
            ['Gert Sibande District', 5],
            ['Ehlanzeni District', 5],
            ['Mangaung Metropolitan', 1],
            ['Xhariep District', 1],
            ['Thabo Mofutsanyana District', 1],
            ['Lejweleputswa District', 1],
            ['Fezile Dabi District', 1],
            ['West Rand District', 2],
            ['Sedibeng District', 2],
            ['City of Ekurhuleni Metropolitan', 2],
            ['City of Johannesburg Metropolitan', 2],
            ['City of Tshwane Metropolitan', 2],
            ['Zululand District', 3],
            ['uThukela District', 3],
            ['uMzinyathi District', 3],
            ['uMkhanyakude District', 3],
            ['uMgungundlovu District', 3],
            ['Ugu District', 3],
            ['King Cetshwayo District', 3],
            ['iLembe District', 3],
            ['Harry Gwala District', 3],
            ['Amajuba District', 3],
            ['eThekwini Metropolitan', 3],
            ['Capricorn District', 4],
            ['Waterberg District', 4],
            ['Vhembe District', 4],
            ['Sekhukhune District', 4],
            ['Mopani District', 4],
            ['Buffalo City Metropolitan', 9],
            ['Nelson Mandela Bay Metropolitan', 9],
            ['Alfred Nzo District', 9],
            ['Amathole District', 9],
            ['Chris Hani District', 9],
            ['Joe Gqabi District', 9],
            ['OR Tambo District', 9],
            ['Sarah Baartman District', 9],
            ['West Coast District', 8],
            ['City of Cape Town Metropolitan', 8],
            ['Cape Winelands District', 8],
            ['Central Karoo District', 8],
            ['Garden Route District', 8],
            ['Overberg District', 8],
            ['ZF Mgcawu District', 6],
            ['Pixley Ka Seme District', 6],
            ['Namakwa District', 6],
            ['John Taolo Gaetsewe District', 6],
            ['Frances Baard District', 6],
            ['Bojanala Platinum District', 7],
            ['Dr Kenneth Kaunda District', 7],
            ['Dr Ruth Segomotsi Mompati District', 7],
            ['Ngaka Modiri Molema District', 7],
        ];

        foreach ($municipalDistricts as $district) {
            DB::table('municipal_districts')->insert([
                'municipal_district' => $district[0],
                'provinceId' => $district[1],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}