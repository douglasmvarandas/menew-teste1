<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            [
                'name' => 'Rio Grande do Sul',
                'slug' => 'rio-grande-do-sul',
            ],
            [
                'name' => 'Santa Catarina',
                'slug' => 'santa-catarina',
            ],
            [
                'name' => 'Paraná',
                'slug' => 'parana',
            ],
            [
                'name' => 'São Paulo',
                'slug' => 'sao-paulo',
            ],
            [
                'name' => 'Rio de Janeiro',
                'slug' => 'rio-de-janeiro',
            ]
        ]);
    }
}
