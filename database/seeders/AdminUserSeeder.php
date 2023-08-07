<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Business;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a user with the specified attributes
        $user = User::create([
            'name' => 'thando',
            'email' => 'thando@kayiseit.co.za',
            'password' => Hash::make('thando@kayiseit.co.za'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // Attach the role with ID 1 to the user using Laratrust's attachRole method
        $user->attachRole(1);

        // Create a user with the specified attributes
        $business = Business::create([
            'company_rep' => $user->id,
            'business_name' => null,
            'business_number' => null,
            'business_bio' => null,
            'email' => null,
            'provinceId' => null,
            'districtId' => null,
            'municipalityId' => null,
            'town' => null,
            'address' => null,
            'company_reg' => null,
            'website' => null,
            'industryId' => null,
            'facebook' => null,
            'twitter' => null,
            'instagram' => null,
            'logo' => null,
            'marketingpic' => null,
            'activation_status' => null,
            'created_at' => now(),
            ]);
    }
}