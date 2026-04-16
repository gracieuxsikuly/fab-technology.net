<?php

namespace Database\Seeders;

use App\Models\FooterInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $infos = [
            [
                'description' => 'Fab-Technology est une entreprise spécialisée dans les services et solutions informatiques complètes.',
                'address' => 'Goma, Nord-Kivu, République Démocratique du Congo',
                'email' => 'info@fab-technology.net',
                'phone' => '+243847451389',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'description' => 'Nous offrons des solutions technologiques innovantes pour vos besoins professionnels.',
                'address' => 'Lubumbashi, Haut-Katanga, République Démocratique du Congo',
                'email' => 'info@fab-technology.net',
                'phone' => '+243995502421',
                'order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($infos as $info) {
            FooterInfo::firstOrCreate(
                ['address' => $info['address']],
                $info
            );
        }
    }
}
