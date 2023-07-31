<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FaqTranslation;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 5) as $key => $index) {
            $faq = new Faq();
            $faq->save();
            foreach (lang() as $lang) {
                $langCode = $lang->code;
                FaqTranslation::create([
                    'title' => 'Faq_' . $langCode,
                    'description' => 'Faq_' . $langCode,
                    'locale' => $langCode,
                    'faq_id' => $faq->id,
                ]);
            }
        }
    }
}
