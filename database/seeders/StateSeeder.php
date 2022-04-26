<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{

    public function run()
    {
        $State = State::create([
            'name' => 'Bleu',
            'color' => '#0000ff',
        ]);

        $State = State::create([
            'name' => 'Rouge',
            'color' => '#ff0000',
        ]);

        $State = State::create([
            'name' => 'Vert',
            'color' => '#00ff00',
        ]);
    }
}
