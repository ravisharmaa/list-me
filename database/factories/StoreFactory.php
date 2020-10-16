<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Faker\Provider\Address;

class StoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Store::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name,
            'state' => $this->faker->state,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'zip_code' => Address::postCode(),
            'phone_number' => $this->faker->phoneNumber
        ];
    }
}
