<?php

namespace Database\Factories;

use App\Models\Level;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
			'code' => $this->faker->randomNumber(8),
			'first_name' => $this->faker->name,
			'last_name' => $this->faker->name,
			'dni' => $this->faker->randomNumber(8),
			'email' => $this->faker->email(),
			'address' => $this->faker->address(),
			'birthday' => $this->faker->date(),
			'parents_name' => $this->faker->name,
			'phone' => $this->faker->phoneNumber(),
			'status' => $this->faker->randomElement(['Activo', 'Inactivo']),
			'level_id' => Level::all()->random()->id,
        ];
    }
}
