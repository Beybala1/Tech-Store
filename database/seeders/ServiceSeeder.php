<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceTranslation;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 3) as $key => $index) {
            $service = new Service();
            $service->icon = 'fas fa-wrench';
            $service->save();
            foreach (lang() as $lang) {
                $langCode = $lang->code;

                ServiceTranslation::create([
                    'title' => 'Service_' . $langCode,
                    'description' => 'Service_' . $langCode,
                    'locale' => $langCode,
                    'service_id' => $service->id,
                ]);
            }
        }
    }
}
