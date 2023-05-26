<?php

namespace Database\Factories;

use App\Models\Business;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Business::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::factory()->create();

        $digits = 12;
        $id = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
        $contact = 7;
        $numb = rand(pow(10, $contact - 1), pow(10, $contact) - 1);
        $name = $this->faker->name();
        $arr = explode(' ', trim($name));

        $company_name = $this->faker->company();
        $website = explode(' ', trim(str_replace(',', '', $company_name)));
        $company_rep = 1;

        return [
            'company_rep' => $user->id,
            'business_name' => $this->faker->word(),
            'business_number' => '0' . rand(1, 8) . rand(1, 9) . $numb,
            'business_bio' => $this->faker->text($maxNbChars = 255),
            'email' => $arr[0] . '@' . $website[0] . '.co.za',
            'provinceId' => rand(1, 9),
            'town' => $this->faker->city(),
            'address' => $this->faker->city(),
            'company_reg' => 1,
            'website' => 'wwww.' . $website[0] . '.co.za',
            'industryId' => rand(1, 8),
            'facebook' => 'facebook',
            'twitter' => 'twitter',
            'instagram' => 'instagram',
            'logo' => 'a.png',
            'marketingpic' => 'a.png',
            'activation_status' => 1,
        ];
    }
}