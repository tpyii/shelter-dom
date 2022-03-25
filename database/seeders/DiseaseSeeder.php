<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();
        DB::table('diseases')->insert([
            'name' =>$this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'created_at'=>$this->faker->dateTime,
            'updated_at'=>$this->faker->dateTime
        ]);
    }
}
