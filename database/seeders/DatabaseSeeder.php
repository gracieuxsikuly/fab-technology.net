<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

    //    appel messageseeder et admin seeders
        $this->call([
            SiteSettingSeeder::class,
            MenuSeeder::class,
            FooterInfoSeeder::class,
            SocialLinkSeeder::class,
            MessageSeeder::class,
        ]);

    }
}
