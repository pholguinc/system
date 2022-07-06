<?php

namespace Database\Factories;

use App\Models\Level;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->randomDigit(),
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'dni' => $this->faker->domainName(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'birthday' => $this->faker->date(),
            'parents_name' => $this->faker->name(),
            'phone_home' => $this->faker->phoneNumber(),
            'phone_parent' => $this->faker->phoneNumber(),
            'status' =>  $this->faker->randomElement(['Activo', 'Inactivo']),
            'level_id' =>  Level::all()->random()->id,
        ];
    }
}
