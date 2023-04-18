<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //Te crea 10 usuarios aleatorios
        // \App\Models\User::factory(10)->create();

        //Te crea un usuario aleatorio
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            CategorieSeeder::class,
            RolesSeeder::class,
            TicketsSeeder::class,
            RolesUserSeeder::class
        ]);
    }
}
