<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Category = Category::create([
            'name' => 'Catégorie A',
            'service_id' => 1,
            'priority_id' => 1,
            'description' => 'La description de la categorie A',
            //'service_id' => null,
        ]);

        $Category = Category::create([
            'name' => 'Catégorie B',
            'service_id' => 1,
            'priority_id' => 1,
            'description' => 'La description de la categorie B',
            // 'service_id' => null,
        ]);

        $Category = Category::create([
            'name' => 'Catégorie C',
            'service_id' => 2,
            'priority_id' => 2,
            'description' => 'La description de la categorie C',
            // 'service_id' => null,
        ]);

        $Category = Category::create([
            'name' => 'Catégorie D',
            'service_id' => 2,
            'priority_id' => 2,
            'description' => 'La description de la categorie D',
            // 'service_id' => null,
        ]);
    }
}
