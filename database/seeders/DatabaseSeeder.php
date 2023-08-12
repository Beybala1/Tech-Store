<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            LanguageSeeder::class,
            SliderSeeder::class,
            CategorySeeder::class,
            AltCategorySeeder::class,
            AltSubCategorySeeder::class,
//            ProductSeeder::class,
            ServiceSeeder::class,
            StatisticSeeder::class,
            PartnerSeeder::class,
            BlogSeeder::class,
            AboutSeeder::class,
            ContactInfoSeeder::class,
            SocialSeeder::class,
            FaqSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
