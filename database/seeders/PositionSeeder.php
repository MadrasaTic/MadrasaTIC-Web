<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            [
                'name' => 'Etudiant',
            ],
            [
                'name' => 'Professeur',
            ],
            [
                'name' => 'ATS',
            ],
        ];

        foreach ($positions as $key => $value) {
            $position = Position::create([
                'name' => $value['name'],
            ]);
        }
    }
}
