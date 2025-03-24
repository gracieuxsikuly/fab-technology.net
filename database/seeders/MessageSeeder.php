<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('fr_FR'); // Configuration pour le français

        foreach (range(1, 10) as $index) {
            Contact::create([
                'nom' => $faker->lastName . ' ' . $faker->firstName,
                'object' => $faker->sentence,
                'message' => $faker->realText(100), // Texte plus réaliste
                'email' => $faker->unique()->safeEmail,
            ]);
        }
    }
}
