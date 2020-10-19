<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::all()->random()->id,
            'name' => $this->faker->word,
            'flavour' => $this->faker->word(3, false),
            'weight' => $this->faker->numberBetween(0,100),
            'unit' => $this->faker->numberBetween(0,100),
            'pack_size' => $this->faker->numberBetween(0,100),
            'is_new' => $this->faker->boolean(50)
        ];
    }
}
