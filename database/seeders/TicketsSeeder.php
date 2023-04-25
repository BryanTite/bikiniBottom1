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
                'id' => 1,
                'id_categorie' => 1,
                'name' => 'Entrada Infantil',
                'description' => 'Entrada para los más pequeños, a partir de 3 a 12 años.',
                'price' => 5,
                'image' => '1.webp'

            ],
            [
                'id' => 2,
                'id_categorie' => 1,
                'name' => 'Entrada Adulto',
                'description' => 'Entrada individual para adultos.',
                'price' => 7,
                'image' => '2.webp'

            ],
            [
                'id' => 3,
                'id_categorie' => 1,
                'name' => 'Entrada +65 años',
                'description' => 'Entrada para los más adultos, mayor de 65 años.',
                'price' => 6,
                'image' => '3.webp'

            ],
            [
                'id' => 4,
                'id_categorie' => 2,
                'name' => 'Pack Familiar',
                'description' => 'Entradas para tu familia. 2 adultos y 2 niños.',
                'price' => 20,
                'image' => '4.webp'

            ],
            [
                'id' => 5,
                'id_categorie' => 2,
                'name' => 'Pack Grupo',
                'description' => 'Entradas para 8 personas. 4 adultos y 4 niños.',
                'price' => 37,
                'image' => '5.webp'

            ],
            [
                'id' => 6,
                'id_categorie' => 2,
                'name' => 'Pack Completo',
                'description' => 'Entrada individual e incluye las actividades.',
                'price' => 12,
                'image' => '6.webp'

            ],
            [
                'id' => 7,
                'id_categorie' => 3,
                'name' => 'Bucear con tiburones',
                'description' => 'Bucea con tiburones durante 10 min y disfruta!',
                'price' => 3,
                'image' => '7.webp'

            ],
            [
                'id' => 8,
                'id_categorie' => 3,
                'name' => 'Actividad con pingüinos',
                'description' => 'Da de comer a los pingüinos y poder estar cerca de ellos!',
                'price' => 3,
                'image' => '8.webp'

            ],
            [
                'id' => 9,
                'id_categorie' => 3,
                'name' => 'Bucear con medusas.',
                'description' => 'Bucea con medusas durante 10 min y disfruta!',
                'price' => 3,
                'image' => '9.webp'

            ],
        ];

        Tickets::insert($tickets);
    }
}
