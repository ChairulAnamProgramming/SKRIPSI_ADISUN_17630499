<?php

namespace Database\Factories;

use App\Models\FoodItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FoodItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'food_category_id' => 1,
            'barn_id' => 1,
            'title' => $this->faker->title(),
            'stock' => 8,
            'description' => $this->faker->text(),
            'price' => '100000',
            'image' => 'default.png',
        ];
    }
}
