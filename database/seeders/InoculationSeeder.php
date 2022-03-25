<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class InoculationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();
        DB::table('inoculations')->insert([
            'name' =>$this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'created_at'=>$this->faker->dateTime,
            'updated_at'=>$this->faker->dateTime
        ]);
    }
}

