<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create([
            'name'  => 'Rio de Janeiro'
        ]);

        State::create([
            'name'  => 'São Paulo'
        ]);

        State::create([
            'name'  => 'Porto Alegre'
        ]);

        State::create([
            'name'  => 'Minas Gerais'
        ]);

        State::create([
            'name'  => 'Paraíba'
        ]);
    }
}
