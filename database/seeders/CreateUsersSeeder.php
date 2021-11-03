<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
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
               'email'=>'admin@gmail.com',
                'role'=>'2',
               'password'=> bcrypt('123456'),
                'tel'=>' ',
                'dir'=>' '
            ],
            [
               'name'=>'Socio',
               'email'=>'socio@gmail.com',
                'role'=>'1',
               'password'=> bcrypt('123456'),
                'tel'=>' ',
                'dir'=>' '
            ],
            [
               'name'=>'User',
               'email'=>'user@gmail.com',
                'role'=>'0',
               'password'=> bcrypt('123456'),
               'tel'=>'56481256984',
               'dir'=>'Plan sexenal 51'
            ],            
        ];

        User::insert($users);


    }
}
