<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);

        for ($i = 0; $i < 10; $i++) {
            $this->call([
                AnimalTypeSeeder::class,
                InoculationSeeder::class,
                DiseaseSeeder::class,
                UserSeeder::class
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            $this->call([
                BreedSeeder::class,
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            $this->call([
                AnimalSeeder::class,
                ImageSeeder::class,
            ]);
        }

        $this->call([
            ProfileSeeder::class,
            AnimalInoculationSeeder::class,
            AnimalDiseaseSeeder::class,
            AnimalImagesSeeder::class,
            AnimalUserSeeder::class,
        ]);
    }
}
