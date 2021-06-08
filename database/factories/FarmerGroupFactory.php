<?php

namespace Database\Factories;

use App\Models\FarmerGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class FarmerGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FarmerGroup::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'farmer_id' => 1,
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
        ];
    }
}
