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
        foreach (range(1, 5) as $key => $index) {
            $category = new Category();
            $category->save();
            foreach (lang() as $lang) {
                $langCode = $lang->code; 
                CategoryTranslation::create([
                    'title' => 'category_' . $langCode,
                    'slug' => 'slug_' . $langCode,
                    'locale' => $langCode,
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
