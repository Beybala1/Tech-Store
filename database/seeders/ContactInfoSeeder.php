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
                'description' => '+994',
            ],
            [
                'description' => '+994',
            ],
            [
                'description' => 'Lorem ipsum',
            ],
            [
                'description' => 'Lorem ipsum',
            ],
            [
                'description' => 'admin@mizuha.az',
            ],
        ];

        foreach ($infos as $info) {
            ContactInfo::create($info);
        }
    }
}
