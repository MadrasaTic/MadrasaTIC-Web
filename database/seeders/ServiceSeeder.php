<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Service = Service::create([
            'name' => 'Service A',
            'parent_id' => 1,
            'description' => 'La description de le Service A',
            //'service_id' => null,
        ]);
        $Service = Service::create([
            'name' => 'Service B',
            'parent_id' => 1,
            'description' => 'La description de le Service B',
            //'service_id' => null,
        ]);
    }
}
