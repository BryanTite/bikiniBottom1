<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [

            [
                'id'             => 1,
                'name'           => 'Admin',

            ],

            [
                'id'             => 2,
                'name'           => 'Moderator',

            ],
            [
                'id'             => 3,
                'name'           => 'User',

            ],

        ];

        Role::insert($roles);


        User::all()->each(function($user) {
            if ($user->id == 1) {
                $user->roles()->sync([1]);
            } elseif ($user->id == 2) {
                $user->roles()->sync([2]);
            } else {
                $user->roles()->sync([3]);
            }
        });

    }
}
