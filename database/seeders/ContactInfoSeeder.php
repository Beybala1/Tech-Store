<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactInfo;

class ContactInfoSeeder extends Seeder
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
                'content' => '+994',
            ],
            [
                'content' => '+994',
            ],
            [
                'content' => 'Lorem ipsum',
            ],
            [
                'content' => 'Lorem ipsum',
            ],
            [
                'content' => 'admin@mizuha.az',
            ],
        ];
        
        foreach ($infos as $info) {
            ContactInfo::create($info);
        }
    }
}