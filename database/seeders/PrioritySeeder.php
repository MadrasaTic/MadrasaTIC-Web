<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Priority;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Priority = Priority::create([
            'name' => 'Priority A',
            'weight' => 1,
        ]);
        $Priority = Priority::create([
            'name' => 'Priority B',
            'weight' => 2,
        ]);
    }
}
