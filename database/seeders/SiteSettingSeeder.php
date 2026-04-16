<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::firstOrCreate(
            ['id' => 1],
            [
                'site_name' => 'Fab-Technology',
                'site_description' => 'Fab-Technology est une entreprise qui a vu le jour en 2018, est un fournisseur indépendant et complet de services et de produits informatiques.',
                'email' => 'info@fab-technology.net',
                'phone' => '+243847451389',
                'metadata_description' => 'Fab-Technology - Services informatiques complets: maintenance, télécommunications, cybersécurité, hébergement web',
                'metadata_keywords' => 'informatique, services IT, maintenance informatique, cybersécurité, télécommunications',
            ]
        );
    }
}
