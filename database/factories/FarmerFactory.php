<?php

namespace Database\Factories;

use App\Models\Farmer;
use Illuminate\Database\Eloquent\Factories\Factory;

class FarmerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Farmer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'nik' => $this->faker->buildingNumber(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'place_of_birth' => $this->faker->city(),
            'date_of_birth' => $this->faker->dateTime(),
        ];
    }
}
