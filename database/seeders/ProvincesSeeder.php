<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProvincesSeeder extends Seeder
{
    public function run()
    {
        $provinces = [
            ['province' => 'Free State',                'created_at' => now(),                'updated_at' => now(),],
            ['province' => 'Gauteng',                'created_at' => now(),                'updated_at' => now(),],
            ['province' => 'KwaZulu-Natal',                'created_at' => now(),                'updated_at' => now(),],
            ['province' => 'Limpopo',                'created_at' => now(),                'updated_at' => now(),],
            ['province' => 'Mpumalanga',                'created_at' => now(),                'updated_at' => now(),],
            ['province' => 'Northern Cape',                'created_at' => now(),                'updated_at' => now(),],
            ['province' => 'North West',                'created_at' => now(),                'updated_at' => now(),],
            ['province' => 'Western Cape',                'created_at' => now(),                'updated_at' => now(),],
            ['province' => 'Eastern Cape',                'created_at' => now(),                'updated_at' => now(),],
        ];

        DB::table('provinces')->insert($provinces);
    }
}