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
        /*
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
        */

        /*User::all()
            ->each(function($user){
                $user->roles()->sync([3]);
            });
        */
    }
}
