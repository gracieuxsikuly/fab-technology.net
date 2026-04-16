<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Accueil',
                'name_en' => 'Home',
                'url' => '/',
                'url_en' => '/',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'À Propos',
                'name_en' => 'About',
                'url' => '/#about',
                'url_en' => '/#about',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Services',
                'name_en' => 'Services',
                'url' => '/#services',
                'url_en' => '/#services',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Galerie',
                'name_en' => 'Gallery',
                'url' => '/#portfolio',
                'url_en' => '/#portfolio',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Équipe',
                'name_en' => 'Team',
                'url' => '/#team',
                'url_en' => '/#team',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Contact',
                'name_en' => 'Contact',
                'url' => '/#contact',
                'url_en' => '/#contact',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($menus as $menu) {
            Menu::firstOrCreate(
                ['name' => $menu['name']],
                $menu
            );
        }
    }
}
