<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(ProvincesSeeder::class);
        $this->call(MunicipalDistrictsSeeder::class);
        $this->call(MunicipalitiesSeeder::class);
        $this->call(IndustriesSeeder::class);
        $this->call(ServicesSeeder::class);

    }
}