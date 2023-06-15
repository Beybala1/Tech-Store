<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogTranslation;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 5) as $key => $index) {
            $blog = Blog::create([
                'image' => 'backend/images/image.jpg',
            ]);

            foreach (lang() as $lang) {
                $langCode = $lang->code; 
                
                BlogTranslation::create([
                    'title' => 'Lorem ipsum_' . $langCode,
                    'content' => 'Lorem ipsum_' . $langCode,
                    'slug' => 'Lorem ipsum_' . $langCode,
                    'alt' => 'Lorem ipsum_' . $langCode,
                    'locale' => $langCode,
                    'blog_id' => $blog->id,
                ]);
            }
        }
    }
}