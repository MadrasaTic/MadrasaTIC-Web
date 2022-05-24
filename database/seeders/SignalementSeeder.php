<?php

namespace Database\Seeders;

use App\Models\Signalement;
use App\Models\SignalementVersionControl;
use Illuminate\Database\Seeder;

class SignalementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $signalement = Signalement::create([
            'title' => 'Problème de Sécurité',
            'description' => 'Ceci est la description du signalement 01',
            'annexe_id' => '1',
            'creator_id' => '1',
            'published' => '1',
        ]);

        $signalementVersionControl = SignalementVersionControl::create([
            'signalement_id' => '1',
            'state_id' => '1',
            'category_id' => '27',
            'attachement' => 'i don\'t really what this is',
            'service_id' =>'1',
            'priority_id' => '1',
            'updated_by' => '1',
        ]);
    }
}
