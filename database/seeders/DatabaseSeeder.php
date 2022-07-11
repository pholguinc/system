<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LevelSeeder::class);
        Semester::factory(100)->create();
        Student::factory(100)->create();
        Course::factory(100)->create();
        Teacher::factory(100)->create();
        $this->call(UserSeeder::class);
    }
}
