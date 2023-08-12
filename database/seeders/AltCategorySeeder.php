<?php

namespace Database\Seeders;

use App\Models\AltCategory;
use App\Models\AltCategoryTranslation;
use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AltCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specificStrings = [
            'az' => [
                'title' => ['Aksesuarlar', 'Notebooklar', 'PlayStation'],
                'slug' => ['slug-az-1', 'slug-az-2', 'slug-az-3'],
            ],
            'us' => [
                'title' => ['Accessories', 'Notebooks', 'PlayStation'],
                'slug' => ['slug-us-1', 'slug-us-2', 'slug-us-3'],
            ],
            'ru' => [
                'title' => ['Аксессуары', 'Ноутбук', 'Игровая приставка'],
                'slug' => ['slug-ru-1', 'slug-ru-2', 'slug-ru-3'],
            ],
            // Add more languages as needed
        ];

        foreach (range(1, 3) as $key => $index) {
            $altCategory = new AltCategory();
            $altCategory->category_id = $index; // Set the category_id to 1, 2, or 3 sequentially
            $altCategory->save();

            foreach (lang() as $lang) {
                $langCode = $lang->code;
                $specificIndex = $key % count($specificStrings[$langCode]['title']); // Use modulo to repeat strings if there are fewer than 5 specific strings

                AltCategoryTranslation::create([
                    'title' => $specificStrings[$langCode]['title'][$specificIndex],
                    'slug' => $specificStrings[$langCode]['slug'][$specificIndex],
                    'locale' => $langCode,
                    'alt_category_id' => $altCategory->id,
                ]);
            }
        }
    }
}
