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
        $this->call(ProvincesTableSeeder::class);
        
        $this->call(MunicipalDistrictsTableSeeder::class);
        $this->call(MunicipalitiesTableSeeder::class);
        $this->call(IndustriesTableSeeder::class);
        $this->call(ServicesTableSeeder::class);

    
    }
}
