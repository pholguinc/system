<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    public function definition()
    {
        return [
			'code' => $this->faker->randomNumber(8),
			'first_name' => $this->faker->name,
			'last_name' => $this->faker->name,
			'email' => $this->faker->email(),
			'dni' => $this->faker->randomNumber(8),
			'phone' => $this->faker->phoneNumber(),
			'address' => $this->faker->address(),
			'birthday' => $this->faker->date(),
			'status' => $this->faker->randomElement(['Activo', 'Inactivo']),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',// password
            'remember_token' => Str::random(10),
            'course_id' => Course::all()->random()->id,
        ];
    }
}
