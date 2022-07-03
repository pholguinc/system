<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'name' => 'Inicial 3 años'
        ]);

        Level::create([
            'name' => 'Inicial 4 años'
        ]);

        Level::create([
            'name' => 'Inicial 5 años'
        ]);

        Level::create([
            'name' => '1° Primaria'
        ]);
        Level::create([
            'name' => '2° Primaria'
        ]);
        Level::create([
            'name' => '3° Primaria'
        ]);
        Level::create([
            'name' => '4° Primaria'
        ]);
        Level::create([
            'name' => '5° Primaria'
        ]);
        Level::create([
            'name' => '6° Primaria'
        ]);

        Level::create([
            'name' => '1° Secundaria'
        ]);
        Level::create([
            'name' => '2° Secundaria'
        ]);
        Level::create([
            'name' => '3° Secundaria'
        ]);
        Level::create([
            'name' => '4° Secundaria'
        ]);
        Level::create([
            'name' => '5° Secundaria'
        ]);
    }
}
