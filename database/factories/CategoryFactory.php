<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = ['Meat',
        'Chips','Beer','Cofeee','Wine','Fruit','Candy','Bakery',
        'Salty','Lottery','Sweet','Water','Energy Drink',
        'Cheese','Canned Food','Hot Food','Snacks','Soda',
        'NewsPaper','Oils','Fountain','Dairy','Toys','Novelty','New','Medicine','Gas','Cleaning Supplies',
        'Gifts','Ice'];

        foreach ($categories as $category) {
            // return [
            //     'name' => $category,
            // ];
            Category::create([
                'name' => $category
            ]);
        }

        return [

        ];

        
    }
}
