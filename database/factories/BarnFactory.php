<?php

namespace Database\Factories;

use App\Models\Barn;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarnFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Barn::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->address,
            'farmer_id' => 1,
        ];
    }
}
