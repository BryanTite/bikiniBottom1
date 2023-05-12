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
                'name'           => 'AccesoAdmin',

            ],
            [
                'id'             => 2,
                'name'           => 'AccesoModerador',

            ],
            [
                'id'             => 3,
                'name'           => 'AccesoUser',

            ],
            [
                'id'             => 4,
                'name'           => 'Añadir',

            ],
            [
                'id'             => 5,
                'name'           => 'Actualizar',

            ],
            [
                'id'             => 6,
                'name'           => 'Eliminar',

            ],

        ];

        Role::insert($roles);


        User::all()->each(function($user) {
            if ($user->id == 1) {
                $user->roles()->sync([1,2,3,4,5,6]);
            } elseif ($user->id == 2) {
                $user->roles()->sync([2,3,4,5,6]);
            } else {
                $user->roles()->sync([3]);
            }
        });

    }
}
