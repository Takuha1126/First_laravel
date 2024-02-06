<?php

namespace Database\Factories;
use App\Models\Address;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->SafeEmail(),
            'password' =>$this->faker->password()
        ];
    }
}
