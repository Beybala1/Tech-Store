<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SliderTranslation;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 5) as $key => $index) {
            $slider = Slider::create([
                'image' => 'backend/images/image.jpg',
            ]);

            foreach (lang() as $lang) {
                $langCode = $lang->code; 
                
                SliderTranslation::create([
                    'title' => 'Lorem ipsum_' . $langCode,
                    'content' => 'Lorem ipsum_' . $langCode,
                    'alt' => 'Lorem ipsum_' . $langCode,
                    'locale' => $langCode,
                    'slider_id' => $slider->id,
                ]);
            }
        }
    }
}