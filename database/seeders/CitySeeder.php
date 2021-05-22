<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            [
                'name' => 'Cachoeira do Sul',
                'slug' => 'cachoeira-do-sul',
                'country_id' => 1,
            ],
            [
                'name' => 'Caxias do sul',
                'slug' => 'caxias-do-sul',
                'country_id' => 1,
            ],
            [
                'name' => 'Porto Alegre',
                'slug' => 'porto-alegre',
                'country_id' => 1,
            ],
            // --------------
            [
                'name' => 'Florianópolis',
                'slug' => 'florianopolis',
                'country_id' => 2,
            ],
            [
                'name' => 'São Francisco do Sul',
                'slug' => 'sao-francisco-do-sul',
                'country_id' => 2,
            ],
            [
                'name' => 'Laguna',
                'slug' => 'laguna',
                'country_id' => 2,
            ],
            // --------------
            [
                'name' => 'Curitiba',
                'slug' => 'curitiba',
                'country_id' => 3,
            ],
            [
                'name' => 'Londrina',
                'slug' => 'londrina',
                'country_id' => 3,
            ],
            [
                'name' => 'Maringá',
                'slug' => 'maringa',
                'country_id' => 3,
            ],
            // --------------
            [
                'name' => 'Jundiaí',
                'slug' => 'jundiai',
                'country_id' => 4,
            ],
            [
                'name' => 'Guarulhos',
                'slug' => 'guarulhos',
                'country_id' => 4,
            ],
            [
                'name' => 'Campinas',
                'slug' => 'campinas',
                'country_id' => 4,
            ],
            // --------------
            [
                'name' => 'Niterói',
                'slug' => 'niteroi',
                'country_id' => 5,
            ],
            [
                'name' => 'São Gonçalo',
                'slug' => 'sao-goncalo',
                'country_id' => 5,
            ],
            [
                'name' => 'Duque de Caxias',
                'slug' => 'duque-de-caxias',
                'country_id' => 5,
            ]
        ]);
    }
}
