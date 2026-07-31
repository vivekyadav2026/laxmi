<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceCategory;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = config('services_data.categories');

        if (!$categories) {
            $this->command->info('No data found in config/services_data.php');
            return;
        }

        foreach ($categories as $catData) {
            $category = ServiceCategory::create([
                'name' => $catData['name'],
                'slug' => $catData['slug'],
                'count' => $catData['count'],
                'page_content' => $catData['page_content'] ?? null,
            ]);

            foreach ($catData['services'] as $serviceData) {
                Service::create([
                    'service_category_id' => $category->id,
                    'name_en' => $serviceData['name_en'],
                    'name_hi' => $serviceData['name_hi'] ?? null,
                    'price' => $serviceData['price'] ?? null,
                    'old_price' => $serviceData['old_price'] ?? null,
                    'time' => $serviceData['time'] ?? null,
                    'slug' => $serviceData['slug'],
                    'icon' => $serviceData['icon'] ?? null,
                    'best_for_en' => $serviceData['best_for_en'] ?? null,
                    'best_for_hi' => $serviceData['best_for_hi'] ?? null,
                    'badge_en' => $serviceData['badge_en'] ?? null,
                    'badge_hi' => $serviceData['badge_hi'] ?? null,
                ]);
            }
        }
    }
}
