<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $links = [
            [
                'platform' => 'twitter',
                'url' => 'https://twitter.com',
                'icon' => 'bi-twitter-x',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'platform' => 'facebook',
                'url' => 'https://facebook.com',
                'icon' => 'bi-facebook',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'platform' => 'linkedin',
                'url' => 'https://linkedin.com',
                'icon' => 'bi-linkedin',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'platform' => 'instagram',
                'url' => 'https://instagram.com',
                'icon' => 'bi-instagram',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($links as $link) {
            SocialLink::firstOrCreate(
                ['platform' => $link['platform']],
                $link
            );
        }
    }
}
