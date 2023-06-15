<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\About;
use App\Models\AboutTranslation;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $about = About::create([
                'image' => 'backend/images/image.jpg',
            ]);

            foreach (lang() as $lang) {
                $langCode = $lang->code; 
                
                AboutTranslation::create([
                    'title' => 'Lorem ipsum_' . $langCode,
                    'content' => 'Lorem ipsum_' . $langCode,
                    'alt' => 'Lorem ipsum_' . $langCode,
                    'locale' => $langCode,
                    'about_id' => $about->id,
            ]);
        }
    }
}