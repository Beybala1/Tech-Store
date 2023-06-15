<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StatisticTranslation;
use App\Models\Statistic;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 4) as $key => $index) {
            $statistic = new Statistic();
            $statistic->number = '100';
            $statistic->save();
            foreach (lang() as $lang) {
                $langCode = $lang->code; 
                
                StatisticTranslation::create([
                    'title' => 'Lorem-ipsum' . $langCode,
                    'locale' => $langCode,
                    'statistic_id' => $statistic->id,
                ]);
            }
        }
    }
}