<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    public function run(): void
    {
        $infos = [
            [
                'name' => 'Azərbaycan',
                'code'  => 'az',
                'status'  => 1,
            ],
            [
                'name' => 'English',
                'code'  => 'us',
                'status'  => 1,
            ],
            [
                'name' => 'Русский',
                'code'  => 'ru',
                'status'  => 1,
            ],
          
        ];
        
        foreach ($infos as $info) {
            Language::create($info);
        }
    }
}
