<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'code' => '16101052',
            'first_name' => 'Pedro',
            'last_name' => 'Holguín',
            'email' => 'holguinpedro90@gmail.com',
            'dni' => '73317273',
            'phone'=> '123456789',
            'address' => 'Jr. una dirección',
            'birthday' => '1998-09-02',
            'status' => 'Activo',
            'password' => bcrypt('12345'),
            ]);

        User::factory(99)->create();
    }
}
