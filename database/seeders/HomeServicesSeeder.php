<?php

namespace Database\Seeders;

use App\Models\HomeService;
use Illuminate\Database\Seeder;

class HomeServicesSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            [
                'title' => 'Ask Free Query',
                'short_text' => 'Some quick example text Some quick example text Some quick example text',
                'image_path' => 'images/services/question.jpg',
                'link_url' => '/query',
                'sort_order' => 10,
            ],
            [
                'title' => 'Horoscope Report',
                'short_text' => 'Some quick example text Some quick example text Some quick example text',
                'image_path' => 'images/services/question.jpg',
                'link_url' => '/horoscope/report',
                'sort_order' => 20,
            ],
            [
                'title' => 'Book Astrologer',
                'short_text' => 'Some quick example text Some quick example text Some quick example text',
                'image_path' => 'images/services/question.jpg',
                'link_url' => '/astrologer/book',
                'sort_order' => 30,
            ],
            [
                'title' => 'Match Making Report',
                'short_text' => 'Some quick example text Some quick example text Some quick example text',
                'image_path' => 'images/services/match_making.jpg',
                'link_url' => '/horoscope/matching',
                'sort_order' => 40,
            ],
            [
                'title' => 'Order Gemstones',
                'short_text' => 'Some quick example text Some quick example text Some quick example text',
                'image_path' => 'images/services/gems.png',
                'link_url' => '/gemstone/buy',
                'sort_order' => 50,
            ],
            [
                'title' => 'Book Panditji',
                'short_text' => 'Some quick example text Some quick example text Some quick example text',
                'image_path' => 'images/services/pt2.jpg',
                'link_url' => '/panditji/book',
                'sort_order' => 60,
            ],
            [
                'title' => 'Vastu Consultancy',
                'short_text' => 'Some quick example text Some quick example text Some quick example text',
                'image_path' => 'images/services/vastu_shastra.jpg',
                'link_url' => '/vastu',
                'sort_order' => 70,
            ],
            [
                'title' => 'Our Puja',
                'short_text' => 'Some quick example text Some quick example text Some quick example text',
                'image_path' => 'images/services/vst.jpg',
                'link_url' => '/panditji/services',
                'sort_order' => 80,
            ],
            [
                'title' => 'Team Activity',
                'short_text' => 'Some quick example text Some quick example text Some quick example text',
                'image_path' => 'images/services/team_activity.jpg',
                'link_url' => '/teamactivity',
                'sort_order' => 90,
            ],
        ];

        foreach ($defaults as $row) {
            HomeService::updateOrCreate(
                ['title' => $row['title']],
                [
                    'short_text' => $row['short_text'],
                    'image_path' => $row['image_path'],
                    'link_url' => $row['link_url'],
                    'sort_order' => $row['sort_order'],
                    'is_active' => true,
                ]
            );
        }
    }
}

