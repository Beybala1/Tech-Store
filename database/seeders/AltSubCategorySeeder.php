<?php

namespace Database\Seeders;

use App\Models\AltCategory;
use App\Models\AltCategoryTranslation;
use App\Models\AltSubCategory;
use App\Models\AltSubCategoryTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AltSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specificStrings = [
            'az' => [
                'title' => ['Power Bank', 'Oyun', 'PlayStation konsolları'],
                'slug' => ['slug-az-1', 'slug-az-2', 'slug-az-3'],
            ],
            'us' => [
                'title' => ['Power Bank', 'Game', 'PlayStation consoles'],
                'slug' => ['slug-us-1', 'slug-us-2', 'slug-us-3'],
            ],
            'ru' => [
                'title' => ['Внешний аккумулятор', 'Игра', 'консоли PlayStation'],
                'slug' => ['slug-ru-1', 'slug-ru-2', 'slug-ru-3'],
            ],
            // Add more languages as needed
        ];

        foreach (range(1, 3) as $key => $index) {
            $altCategory = new AltSubCategory();
//            $altCategory->category_id = $index;
            $altCategory->alt_category_id = $index;
            $altCategory->save();

            foreach (lang() as $lang) {
                $langCode = $lang->code;
                $specificIndex = $key % count($specificStrings[$langCode]['title']); // Use modulo to repeat strings if there are fewer than 5 specific strings

                AltSubCategoryTranslation::create([
                    'title' => $specificStrings[$langCode]['title'][$specificIndex],
                    'slug' => $specificStrings[$langCode]['slug'][$specificIndex],
                    'locale' => $langCode,
                    'alt_sub_category_id' => $altCategory->id,
                ]);
            }
        }
    }
}
