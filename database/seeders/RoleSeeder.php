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
                'name'           => 'CreateUser',
                'slug'          => 'create_user',
            ],
            [
                'id'             => 3,
                'name'           => 'UpdateUser',
                'slug'          => 'update_user',
            ],
        ];

        Role::insert($roles);

        User::all()
            ->each(function($user){
                $user->roles()->sync([1,3]);
            });
    }
}
