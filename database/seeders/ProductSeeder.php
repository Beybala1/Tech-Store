<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductTranslation;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $categoryIds = [1, 2, 3, 4, 5]; // Define your desired category IDs

        foreach ($categoryIds as $key => $categoryId) {
            $product = new Product();
            $product->image = 'backend/images/image.jpg';
            $product->category_id = $categoryId;
            $product->save();

            foreach (lang() as $lang) {
                $langCode = $lang->code;
                $translation = new ProductTranslation();
                $translation->title = 'Lorem ipsum_' . $langCode;
                $translation->content = 'Lorem ipsum_' . $langCode;
                $translation->alt = 'Lorem ipsum_' . $langCode;
                $translation->slug = 'Lorem ipsum_' . $langCode;
                $translation->locale = $langCode;
                $translation->product_id = $product->id;
                $translation->save();
            }
        }
    }
}