<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalInoculationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();
        DB::table('animal_inoculation')->insert([
            'inoculation_id' =>rand(1,10),
            'animal_id' =>rand(1,10),
        ]);
    }
}
