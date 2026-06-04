<?php

namespace Database\Seeders;

use App\Models\AdBanner;
use Illuminate\Database\Seeder;

class AdBannersSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $defaults = [
            [
                'title' => 'Sponsored Ad',
                'placement' => 'sidebar',
                'content_type' => 'image',
                'image_path' => 'images/offers/off_1.png',
                'link_url' => 'https://example.com',
                'sort_order' => 10,
                'is_active' => true,
                'starts_at' => null,
                'ends_at' => null,
            ],
            [
                'title' => 'Home Sponsored',
                'placement' => 'home_top',
                'content_type' => 'image',
                'image_path' => 'images/offers/off_2.png',
                'link_url' => 'https://example.com',
                'sort_order' => 10,
                'is_active' => true,
                'starts_at' => null,
                'ends_at' => null,
            ],
            [
                'title' => 'Query Sponsored',
                'placement' => 'query_sidebar',
                'content_type' => 'image',
                'image_path' => 'images/offers/off_1.png',
                'link_url' => 'https://example.com',
                'sort_order' => 10,
                'is_active' => true,
                'starts_at' => null,
                'ends_at' => null,
            ],
        ];

        foreach ($defaults as $row) {
            AdBanner::updateOrCreate(
                ['title' => $row['title'], 'placement' => $row['placement']],
                [
                    'content_type' => $row['content_type'],
                    'image_path' => $row['image_path'],
                    'link_url' => $row['link_url'],
                    'sort_order' => $row['sort_order'],
                    'is_active' => $row['is_active'],
                    'starts_at' => $row['starts_at'],
                    'ends_at' => $row['ends_at'],
                    'updated_at' => $now,
                    'created_at' => $now,
                ]
            );
        }
    }
}

