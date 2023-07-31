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
                'image' => 'backend/images/news.jpg',
            ]);

            foreach (lang() as $lang) {
                $langCode = $lang->code;

                BlogTranslation::create([
                    'title' => 'lorem_ipsum_' . $langCode."-".$key,
                    'description' => 'lorem_ipsum_' . $langCode."-".$key,
                    'slug' => 'lorem_ipsum__' . $langCode."-".$key,
                    'alt' => 'lorem_ipsum__' . $langCode."-".$key,
                    'locale' => $langCode,
                    'blog_id' => $blog->id,
                ]);
            }
        }
    }
}
