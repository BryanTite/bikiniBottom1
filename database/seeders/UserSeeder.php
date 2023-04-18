<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [

                'id_user' => 3,
                'email' => 'user@gmail.com',
                'name' => 'User',
                'surname' => 'User',
                'password' => bcrypt('User-1234'),
                'phone' => '666666666'

            ],
            [

                'id_user' => 1,
                'email' => 'admin@gmail.com',
                'name' => 'admin',
                'surname' => 'admin',
                'password' => bcrypt('admin-1234'),
                'phone' => '666666666'

            ],
        ];



        User::insert($users);

    }
}
