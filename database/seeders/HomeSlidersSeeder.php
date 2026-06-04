<?php

namespace Database\Seeders;

use App\Models\HomeSlider;
use Illuminate\Database\Seeder;

class HomeSlidersSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            [
                'title' => 'Buy Gemstones',
                'subtitle' => "Order powerful certified gemstones.",
                'button_text' => 'Check it out',
                'button_url' => '/gemstone/buy',
                'image_path' => 'images/slider/gemstones.jpg',
                'sort_order' => 10,
            ],
            [
                'title' => 'Book Pandit Ji',
                'subtitle' => "Consult pandit ji online instantly.",
                'button_text' => 'Check it out',
                'button_url' => '/panditji/book',
                'image_path' => 'images/slider/panditji.png',
                'sort_order' => 20,
            ],
            [
                'title' => 'Book Astrologer',
                'subtitle' => "Consult astrologer online instantly.",
                'button_text' => 'Check it out',
                'button_url' => '/astrologer/book',
                'image_path' => 'images/slider/online_communication.jpg',
                'sort_order' => 30,
            ],
        ];

        foreach ($defaults as $row) {
            HomeSlider::updateOrCreate(
                ['title' => $row['title']],
                [
                    'subtitle' => $row['subtitle'],
                    'button_text' => $row['button_text'],
                    'button_url' => $row['button_url'],
                    'image_path' => $row['image_path'],
                    'sort_order' => $row['sort_order'],
                    'is_active' => true,
                ]
            );
        }
    }
}

