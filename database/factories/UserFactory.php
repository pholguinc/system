<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'code' => $this->faker->randomNumber(8),
			'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'dni' => $this->faker->randomNumber(8),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'birthday' => $this->faker->date(),
            'status' => $this->faker->randomElement(['Activo', 'Inactivo']),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',// password
            'remember_token' => Str::random(10),
        ];
    }
}
