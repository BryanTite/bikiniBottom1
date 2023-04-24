<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = [
            [
                'id' => 1,
                'name' => 'Tickets'

            ],
            [
                'id' => 2,
                'name' => 'Packs'

            ],
            [
                'id' => 3,
                'name' => 'Activities'

            ],
        ];

        Categorie::insert($categories);


    }
}
