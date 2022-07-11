<?php

namespace Database\Factories;

use App\Models\Semester;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SemesterFactory extends Factory
{
    protected $model = Semester::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'status' => $this->faker->randomElement(['Activo', 'Inactivo']),
        ];
    }
}
