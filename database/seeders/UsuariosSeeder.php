<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Admin',
               'email'=>'admin2@gmail.com',
                'role'=>'2',
               'password'=> bcrypt('123456'),
                'tel'=>' ',
                'dir'=>' '
            ],
            [
               'name'=>'Socio',
               'email'=>'socio2@gmail.com',
                'role'=>'1',
               'password'=> bcrypt('123456'),
                'tel'=>' ',
                'dir'=>' '
            ],
            [
               'name'=>'User',
               'email'=>'user2@gmail.com',
                'role'=>'0',
               'password'=> bcrypt('123456'),
               'tel'=>'56481256984',
               'dir'=>'Plan sexenal 51'
            ],            
        ];

        User::insert($users);
    }
}
