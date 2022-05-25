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
        for ($i = 1; $i<=10; $i++){
            DB::table('animal_inoculation')->insert([
                'inoculation_id' =>$i,
                'animal_id' =>$i,
            ]);
        }
    }
}
