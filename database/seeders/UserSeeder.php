<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        $users = [
/*
            [
                'id'             => 1,
                'email'          => 'admin@admin.com',
                'name'           => 'Admin',
                'surname'        => 'Admin',
                'password'       => bcrypt('1234'),
                'phone'          => '652145874'
            ],

            [
                'id'             => 2,
                'email'          => 'moderator@gmail.com',
                'name'           => 'Moderator',
                'surname'        => 'Moderator',
                'password'       => bcrypt('1234'),
                'phone'          => '652145874'
            ],
                */
            [
                'id'             => 3,
                'email'          => 'user@gmail.com',
                'name'           => 'User',
                'surname'        => 'User',
                'password'       => bcrypt('1234'),
                'phone'          => '652145874'
            ],

        ];

        User::insert($users);

    }
}
