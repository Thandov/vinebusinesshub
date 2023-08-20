<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            ['province' => 'Free State'],
            ['province' => 'Gauteng'],
            ['province' => 'KwaZulu-Natal'],
            ['province' => 'Limpopo'],
            ['province' => 'Mpumalanga'],
            ['province' => 'Northern Cape'],
            ['province' => 'North West'],
            ['province' => 'Western Cape'],
            ['province' => 'Eastern Cape'],
        ];

        foreach ($provinces as $provinceData) {
            DB::table('provinces')->insert([
                'province' => $provinceData['province'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
