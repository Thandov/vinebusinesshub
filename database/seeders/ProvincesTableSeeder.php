<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;


class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->insert([
            [
                'province' => 'Free State',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'province' => 'Gauteng',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'province' => 'KwaZulu-Natal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'province' => 'Limpopo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'province' => 'Mpumalanga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'province' => 'Northern Cape',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'province' => 'North West',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'province' => 'Western Cape',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'province' => 'Eastern Cape',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
