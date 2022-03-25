<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();
        DB::table('animals')->insert([
            'type_id' =>rand(1,10),
            'breed_id' =>rand(1,10),
            'name' =>$this->faker->lastName,
            'description' =>$this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'birthday_at' =>$this->faker->date(),
            'created_at'=>$this->faker->dateTime,
            'updated_at'=>$this->faker->dateTime,
        ]);
    }
}
