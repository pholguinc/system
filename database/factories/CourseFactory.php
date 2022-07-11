<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Level;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'code' => $this->faker->randomNumber(8),
			'course_name' => $this->faker->name,
			'course_description' => $this->faker->text(),
			'status' => $this->faker->randomElement(['Activo', 'Inactivo']),
            'level_id' => Level::all()->random()->id,
        ];
    }
}
