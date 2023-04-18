<?php

namespace Database\Seeders;

use App\Models\Tickets;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tickets = [
            [
                'id_ticket' => 9,
                'id_categorie' => 3,
                'name' => 'actPinguinos',
                'price' => 3,
                'image' => 'null'

            ],
        ];

        Tickets::insert($tickets);
    }
}
