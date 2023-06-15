<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Social;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socials = [
            [
                'icon' => 'fab fa-instagram',
                'link'  => 'https://www.instagram.com/',
            ],
            [
                'icon' => 'fab fa-facebook',
                'link'  => 'https://www.facebook.com/',
            ],
            [
                'icon' => 'fab fa-whatsapp',
                'link'  => 'https://web.whatsapp.com/',
            ],
            [
                'icon' => 'fab fa-twitter',
                'link'  => 'https://www.twitter.com/',
            ],
            [
                'icon' => 'fab fa-youtube',
                'link'  => 'https://www.youtube.com/',
            ],
        ];
        
        foreach ($socials as $social) {
            Social::create($social);
        }
    }
}