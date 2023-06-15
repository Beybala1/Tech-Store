<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $infos = [
            [
                'image' => 'backend/images/image.jpg',
                'link' => 'https://www.zara.com/',
            ],
            [
                'image' => 'backend/images/image.jpg',
                'link' => 'https://www.zara.com/',
            ],
            [
                'image' => 'backend/images/image.jpg',
                'link' => 'https://www.zara.com/',
            ],
        ];
        
        foreach ($infos as $info) {
            Partner::create($info);
        }
    }
}