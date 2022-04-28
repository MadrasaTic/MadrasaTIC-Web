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
            'parent_id' => null,
            'priority_default' => 20,
            'description' => 'La description de la categorie A, les filles sont catégorie B, et C, ceci est une déscription statique',
            'service_id' => null,
        ]);

        $Category = Category::create([
            'name' => 'Catégorie B',
            'parent_id' => 1,
            'priority_default' => 10,
            'description' => 'La description de la categorie B, fille de catégorie A',
            'service_id' => null,
        ]);

        $Category = Category::create([
            'name' => 'Catégorie C',
            'parent_id' => 1,
            'priority_default' => 10,
            'description' => 'La description de la categorie C, fille de catégorie A',
            'service_id' => null,
        ]);
 
        $Category = Category::create([
            'name' => 'Catégorie D',
            'parent_id' => 2,
            'priority_default' => 10,
            'description' => 'La description de la categorie D, fille de catégorie B',
            'service_id' => null,
        ]);
    }
}
