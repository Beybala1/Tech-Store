<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\CategoryTranslation;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specificStrings = [
            'az' => [
                'title' => ['Smartfonlar', 'Notbuklar, PK, planşetlər', 'Hobbi və əyləncə'],
                'slug' => ['slug-az-1', 'slug-az-2', 'slug-az-3'],
            ],
            'us' => [
                'title' => ['Smartphones', 'Notebooks, PCs, tablets', 'Hobbies and entertainment'],
                'slug' => ['slug-us-1', 'slug-us-2', 'slug-us-3'],
            ],
            'ru' => [
                'title' => ['Смартфоны', 'Ноутбуки, ПК, планшеты', 'Хобби и развлечения'],
                'slug' => ['slug-ru-1', 'slug-ru-2', 'slug-ru-3'],
            ],
            // Add more languages as needed
        ];

        foreach (range(1, 3) as $key => $index) {
            $category = new Category();
            $category->save();

            foreach (lang() as $lang) {
                $langCode = $lang->code;
                $specificIndex = $key % count($specificStrings[$langCode]['title']); // Use modulo to repeat strings if there are fewer than 5 specific strings

                CategoryTranslation::create([
                    'title' => $specificStrings[$langCode]['title'][$specificIndex],
                    'slug' => $specificStrings[$langCode]['slug'][$specificIndex],
                    'locale' => $langCode,
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
